<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class recipes extends CI_Controller {
	protected $dir = "cw-admin/contents/recipes/";
	protected $title = "Recipes";
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
							->from("recipes")
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

		$where2 = null;
		$where2["flag != 99"] = null;
		$data["table"] = $this->db->select("*")
							->from("ingredients")
							->where($where2)
							->order_by("order_by asc")
							->get()
							->result_array();
		

		$where = null;
		$where["flag"] = 0;
		$recipes_sub_category = $this->db->select("*")
									->from("recipes_sub_category")
									->where($where)
									->get()
									->result_array();
		

		$data["recipes_sub_category"] = each_json_decode($recipes_sub_category);

		$where = null;
		$where["flag"] = 0;
		$products = $this->db->select("*")
									->from("products")
									->where($where)
									->get()
									->result_array();
		

		$data["products"] = each_json_decode($products);

		$where = null;
		$where["flag"] = 0;
		$recipes_festival = $this->db->select("*")
									->from("recipes_festival")
									->where($where)
									->get()
									->result_array();
		

		$data["recipes_festival"] = each_json_decode($recipes_festival);

		if ($id) {
			$row = $this->db->select("*")
						->from("recipes")
						->where("id",$id)
						->get()->row_array();

			$data["row"] = json_decode_table($row);
		}

		$this->_template("edit", $data);
	}
	public function save($id)
	{
		// debug_pre($this->input->post());exit();

		$this->form_validation->set_rules('title[id]', 'Title', 'required');
	    
		

	    
        if ($this->form_validation->run() == FALSE) {
        	$this->show($id);
    	}else {
    		$data_post = $this->input->post();
    		
			// $insert["product_id"] = $data_post["product_id"];
			$insert["product_id"] = isset($data_post["product_id"]) ? implode(",", $data_post["product_id"]) : "";
			$insert["recipes_sub_category_id"] = $data_post["recipes_sub_category_id"];
			$insert["festive_id"] = $data_post["festive_id"];
			$insert["title"] = json_encode($data_post["title"]);
			$insert["content"] = json_encode($data_post["content"]);
			$insert["icon"] = json_encode($this->image_path->get_id_array($data_post["icon"]));
			
			$insert["flag"] = $data_post["flag"];

			// debug_pre($insert);exit();
			
			if ($id){
				$this->db->update("recipes", $insert, array("id"=>$id));
				set_flashdata("success_message", "Update Success");
			}else {
				$insert["created_at"] = date('Y-m-d H:i:s');
				$this->db->insert("recipes", $insert);	
				$id = $this->db->insert_id();
				set_flashdata("success_message", "Save Success");
			}	
			
			redirect(PATH_CW .  'recipes/edit/' . $id,'refresh');
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

		
		$this->db->update("recipes", $set, $where);

		set_flashdata("success_message", ucwords(__class__) . " saved");

		if ( $ajax ){
			$json["success"] = true;
			$json["redirect"] = "recipes";
			echo json_encode($json);
		}else{
			redirect(PATH_CW . 'recipes');
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

			$this->db->update("recipes", $set, $where);
		}
		$json["success"] = true;
		$json["redirect"] = "recipes";
		echo json_encode($json);
		// $this->action("blocked", $id, true);
	}
}
