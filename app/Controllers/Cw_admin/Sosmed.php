<?php namespace App\Controllers\Cw_admin;

use App\Controllers\BaseController;

class Sosmed extends BaseController {
	protected $dir = "Cw_admin/contents/sosmed/";
	protected $title = "Sosmed";
	
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
        $this->template->set_cw_admin(true);
        $this->template->set_class_name(strtolower(__class__));
        $this->template->display();
    }
	public function index()
	{
		$data = null;

		$where = null;
		$where["flag != 99"] = null;
		$data["table"] = $this->db->select("*")
							->from("sosmed")
							->where($where)
							->order_by("order_by asc")
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
						->from("sosmed")
						->where("id",$id)
						->get()->row_array();

			$data["row"] = json_decode_table($row);
		}

		$this->_template("edit", $data);
	}
	public function save($id)
	{
		// debug_pre($this->input->post());exit();
	    $this->form_validation->set_rules('title[id]', 'Content', 'required');
		

	    
        if ($this->form_validation->run() == FALSE) {
        	$this->show($id);
    	}else {
    		$data_post = $this->input->post();
    		
			
			$insert["title"] = json_encode($data_post["title"]);
			$insert["class"] = json_encode($data_post["class"]);
			$insert["link"] = json_encode($data_post["link"]);
			$insert["flag"] = $data_post["flag"];


			// debug_pre($insert);exit();
			
			if ($id){
				$this->db->update("sosmed", $insert, array("id"=>$id));
				set_flashdata("success_message", "Update Success");
			}else {
				$insert["created_at"] = date('Y-m-d H:i:s');
				$this->db->insert("sosmed", $insert);	
				$id = $this->db->insert_id();
				set_flashdata("success_message", "Save Success");
			}	
			
			redirect(PATH_CW .  'sosmed/edit/' . $id,'refresh');
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

		
		$this->db->update("sosmed", $set, $where);

		set_flashdata("success_message", ucwords(__class__) . " saved");

		if ( $ajax ){
			$json["success"] = true;
			$json["redirect"] = "sosmed";
			echo json_encode($json);
		}else{
			redirect(PATH_CW . 'sosmed');
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
	public function order()
	{
		$data = json_decode($this->input->post("data"));
		
		foreach ($data as $key => $value) {
			$value = (array) $value;
			$set = null;
			$set["order_by"] = $value["order"];	

			$where = null;
			$where["id in (".$value["id"].")"] = null;

			$this->db->update("sosmed", $set, $where);
		}
		$json["success"] = true;
		$json["redirect"] = "sosmed";
		echo json_encode($json);
		// $this->action("blocked", $id, true);
	}
}
