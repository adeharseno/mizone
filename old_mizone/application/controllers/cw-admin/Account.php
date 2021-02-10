<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends CI_Controller {
	protected $dir = "cw-admin/contents/account/";
	protected $title = "Accounts";
	function __construct()
	{
		parent::__construct();
		if (!is_logged_in()){
			redirect(PATH_CW . 'login','refresh');
		}
		$this->load->library('form_validation');
	}
	function _template($location, $data = null)
    {
        $this->template->set_location_content($this->dir . $location);
        $this->template->set_data_template($data);
        $this->template->set_title($this->title);
        $this->template->set_cw_admin(TRUE);
        $this->template->set_class_name(strtolower(__class__));
        $this->template->display();
    }
	public function index()
	{
		$data = null;
		$where = null;

		$where["flag != 99"] = null;
		$data["table"] = $this->db->select("*")
							->from("useradmin")
							->where($where)
							->get()
							->result_array();

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
			$row = $this->db->select("*")
						->from("useradmin")
						->where("id",$id)
						->get()->row_array();
			$data["row"] = $row;
		}

		$this->_template("edit", $data);
	}
	public function save($id)
	{
		$this->form_validation->set_rules('full_name', 'Name', 'required');
	    $this->form_validation->set_rules('email', 'Email', 'required|valid_email');

		$where = null;
		if ($id){
			$where["id"] = $id;	
		}else{
			$where["id is not null"] = null;	
		}
		
		$username = $this->db->select("*")
							->from("useradmin")
							->where($where)
							->get()
							->row()->username;
       	$is_unique =  ($this->input->post('username') != $username) ? '|is_unique[useradmin.username]' : "";
		$this->form_validation->set_rules('username', 'Username', 'required' . $is_unique);
        
        if ($id == null){
        	$this->form_validation->set_rules('password', 'Password', 'required');
        }

        if ($this->form_validation->run() == FALSE) {
        	$this->show($id);
    	}else {
    		$data_post = $this->input->post();
    		
			$insert["full_name"] = $data_post["full_name"];
			$insert["username"] = $data_post["username"];
			$insert["email"] = $data_post["email"];
			$insert["flag"] = $data_post["flag"];
			$insert["role"] = $data_post["role"];
			$insert["password"] = md5(htmlspecialchars(trim($data_post["password"])));
			
			if ($id){
				$this->db->update("useradmin", $insert, array("id"=>$id));
				set_flashdata("success_message", "Update Success");
			}else {
				$insert["created_at"] = date('Y-m-d H:i:s');
				$this->db->insert("useradmin", $insert);	
				$id = $this->db->insert_id();
				set_flashdata("success_message", "Save Success");
			}	
			
			redirect(PATH_CW .  'account/edit/' . $id,'refresh');
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

		
		$this->db->update("useradmin", $set, $where);

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
		$id = $this->input->post("id");
		$this->action("delete", $id, true);
	}
	public function active()
	{
		$id = $this->input->post("id");
		$this->action("active", $id, true);
	}
	public function blocked()
	{
		$id = $this->input->post("id");
		$this->action("blocked", $id, true);
	}
}
