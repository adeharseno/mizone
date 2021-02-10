<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Example extends Controller {
	protected $dir = "cw-admin/contents/example/";
	protected $title = "Example";
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
							->from("example")
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
						->from("example")
						->where("id",$id)
						->get()->row_array();

			$data["row"] = json_decode_table($row);
		}

		$this->_template("edit", $data);
	}
	public function save($id)
	{
		// debug_pre($this->input->post());exit();
	    $this->form_validation->set_rules('content[id]', 'Content', 'required');
		

	    
        if ($this->form_validation->run() == FALSE) {
        	$this->show($id);
    	}else {
    		$data_post = $this->input->post();
    		
			
			$insert["title"] = json_encode($data_post["title"]);
			$insert["content"] = json_encode($data_post["content"]);
			$insert["icon"] = json_encode($this->image_path->get_id_array($data_post["icon"]));
			$insert["link"] =  str_replace("-", "", generate_link( $data_post["title"][default_language()] )) ;
			$insert["flag"] = $data_post["flag"];


			// debug_pre($insert);exit();
			
			if ($id){
				$this->db->update("example", $insert, array("id"=>$id));
				set_flashdata("success_message", "Update Success");
			}else {
				$insert["created_at"] = date('Y-m-d H:i:s');
				$this->db->insert("example", $insert);	
				$id = $this->db->insert_id();
				set_flashdata("success_message", "Save Success");
			}	
			
			redirect(PATH_CW .  'example/edit/' . $id,'refresh');
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

		
		$this->db->update("example", $set, $where);

		set_flashdata("success_message", ucwords(__class__) . " saved");

		if ( $ajax ){
			$json["success"] = true;
			$json["redirect"] = "example";
			echo json_encode($json);
		}else{
			redirect(PATH_CW . 'example');
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

			$this->db->update("example", $set, $where);
		}
		$json["success"] = true;
		$json["redirect"] = "example";
		echo json_encode($json);
		// $this->action("blocked", $id, true);
	}
}
