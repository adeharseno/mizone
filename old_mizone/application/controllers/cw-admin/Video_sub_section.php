<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class video_sub_section extends CI_Controller {
	protected $dir = "cw-admin/contents/video_sub_section/";
	protected $title = "Video Sub Section";
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
	
	public function edit($parent_id, $id = '')
	{
		switch ($_SERVER["REQUEST_METHOD"]) {
			case 'GET':
				$this->show($parent_id, $id);
				break;
			case 'POST':
				$this->save($parent_id, $id);	
				break;
			default:
				echo "REQUEST_METHOD NOT FOUND";
				break;
		}	
		
	}	

	public function show($parent_id, $id)
	{
		$data["id"] = $id;
		$data["title_for"] = (!empty($id))?"Edit":"Add";
		$data["row"] = null;
		
		$data["parent_id"] = $parent_id;
		
		if ($id) {
			$where = null;
			$where["video_section_id"] = $parent_id;
			$where["id"] = $id;
			$row = $this->db->select("*")
						->from("video_sub_section")
						->where($where)
						->get()->row_array();
			$data["row"] = json_decode_table( $row );

		}

		$this->_template("edit", $data);
	}
	public function save($parent_id, $id)
	{
		// debug_pre($this->input->post());exit();

		$this->form_validation->set_rules('title[id]', 'Title', 'required');
		
        if ($this->form_validation->run() == FALSE) {
        	$this->show($id);
    	}else {
    		$data_post = $this->input->post();
    		
			$insert["title"] = json_encode($data_post["title"]);
			$insert["link"] = json_encode($data_post["link"]);
			$insert["description"] = json_encode($data_post["description"]);
			$insert["thumb"] = json_encode($this->image_path->get_id_array($data_post["thumb"]));
			
			$insert["flag"] = $data_post["flag"];
			$insert["video_section_id"] = $parent_id;

			if ($id){
				$this->db->update("video_sub_section", $insert, array("id"=>$id));
				set_flashdata("success_message", "Update Success");
			}else {
				$insert["created_at"] = date('Y-m-d H:i:s');
				$this->db->insert("video_sub_section", $insert);	
				$id = $this->db->insert_id();
				set_flashdata("success_message", "Save Success");
			}	

    		
			
			redirect(PATH_CW .  'video_section/edit/'. $parent_id /*. "/" . $id*/,'refresh');
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

		
		$this->db->update("video_sub_section", $set, $where);
		
		$insert["set"] = $set;
		$insert["where"] = $where;
		
		$parent_id = $this->db->select("*")->from("video_sub_section")->where($where)->get()->row()->video_section_id;

		set_flashdata("success_message", ucwords(str_replace("_"," ",__class__)) . " saved");

		if ( $ajax ){
			$json["success"] = true;
			$json["redirect"] = "video_section/edit/" . $parent_id;
			echo json_encode($json);
		}else{
			redirect(PATH_CW . "video_section/edit/" . $parent_id);
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
			
			$this->db->update("video_sub_section", $set, $where);
		}
		$json["success"] = true;
		$json["redirect"] = "video_sub_section";
		echo json_encode($json);
		// $this->action("blocked", $id, true);
	}
}
