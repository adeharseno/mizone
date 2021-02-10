<?php namespace App\Controllers\Cw_admin;

use App\Controllers\BaseController;

class Account extends BaseController {
	protected $dir = "Cw_admin/contents/account/";
	protected $title = "Account";
	
	function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
	{
		parent::initController($request, $response, $logger);
		if ( empty($this->session->get('user_id')) ){
			header('Location: '.base_url(PATH_CW . 'login')); exit();
		}
	}

	function _template($location, $data = null)
    {
        $this->template->set_location_content($this->dir . $location);
        $this->template->set_data_template($data);
        $this->template->set_title($this->title);
        $this->template->set_cw_admin(TRUE);
        $this->template->set_class_name($this->title);
        $this->template->display();
	}
	
	public function index()
	{
		$data = null;
		$where = null;

		$where["flag != 99"] = null;
		$data["table"] = $this->db->table("useradmin")
							->where($where)
							->get()->getResultArray();

		$this->_template("table", $data);
	}

	public function edit($id = '')
	{
		switch ($_SERVER["REQUEST_METHOD"]) {
			case 'GET':
				$this->show($id);
				break;
			case 'POST':
				$this->save($id);	
				break;
			default:
				echo "REQUEST_METHOD NOT FOUND";
				break;
		}
	}

	public function show($id)
	{
		$data["id"] = $id;
		$data["title_for"] = (!empty($id))?"Edit":"Add";
		$data["row"] = null;
		
		if ($id) {
			$row = $this->db->table("useradmin")
						->where("id",$id)
						->get()->getRowArray();
			$data["row"] = $row;
		}

		$this->_template("edit", $data);
	}

	public function save($id)
	{
		$where = null;
		if ($id){
			$where["id"] = $id;	
		}else{
			$where["id is not null"] = null;	
		}
		
		$username = $this->db->table("useradmin")
							->where($where)
							->get()
							->getRow()->username;

       	$is_unique =  ($this->input->getPost('username') != $username) ? '|is_unique[useradmin.username]' : "";
		
		$check = [
            'full_name' => 'required',
            'email' => 'required',
            'username'  => 'required' . $is_unique,
		];
        if ($id == null){
			$check['password'] = 'required';
		}

		$val = $this->validate($check);
		
		// dd(!$val);
        if (!$val) {
        	$this->show($id);
    	}else {
    		$data_post = $this->input->getPost();
    		
			$insert["full_name"] = $data_post["full_name"];
			$insert["username"] = $data_post["username"];
			$insert["email"] = $data_post["email"];
			$insert["flag"] = $data_post["flag"];
			$insert["role"] = $data_post["role"];
			$insert["password"] = password_hash(htmlspecialchars(trim($data_post["password"])), PASSWORD_ARGON2I);
			$insert["updated_at"] = date('Y-m-d H:i:s');
			
			if ($id){
				$this->db->table("useradmin")
							->where("id", $id)
							->update($insert);
				$this->session->setFlashdata("success_message", "Update Success");
			}else {
				$insert["created_at"] = date('Y-m-d H:i:s');
				$insert["updated_at"] = date('Y-m-d H:i:s');
				$query = $this->db->table("useradmin")
							->insert($insert);

				$id = $this->db->insertID();
				$this->session->setFlashdata("success_message", "Save Success");
			}

			// redirect(PATH_CW . 'account/edit/' . $id, 'refresh');
			// redirect()->to(base_url(PATH_CW . 'account/edit/' . $id));
			header('Location: '.base_url(PATH_CW . 'account/edit/' . $id)); exit();
    	}
	}

	public function action($type, $id, $ajax = false)
	{
		$set = null;
		switch ($type) {
			case "delete":
				$set["flag"] = 99;	
				break;
			case "active":
				$set["flag"] = 0;	
				break;
			case "blocked":
				$set["flag"] = 1;	
				break;
		}
		$where = null;
		$where["id in (".$id.")"] = null;

		
		// $this->db->update("useradmin", $set, $where);
		$this->db->table("useradmin")->where($where)->update($set);

		set_flashdata("success_message", ucwords(__class__) . " saved");

		if ( $ajax ){
			$json["success"] = true;
			$json["redirect"] = "account";
			echo json_encode($json);
		}else{
			redirect(PATH_CW . 'account');
		}

	}

	public function delete()
	{
		$id = $this->input->getPost("id");
		$this->action("delete", $id, true);
	}

	public function active()
	{
		$id = $this->input->getPost("id");
		$this->action("active", $id, true);
	}
	
	public function blocked()
	{
		$id = $this->input->getPost("id");
		$this->action("blocked", $id, true);
	}
}
