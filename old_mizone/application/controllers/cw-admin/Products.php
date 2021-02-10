<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller {
	protected $dir = "cw-admin/contents/products/";
	protected $title = "Products";
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
							->from("products")
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
		

		$where = null;
		$where["flag"] = 0;
		$products_sub_category = $this->db->select("*")
									->from("products_sub_category")
									->where($where)
									->get()
									->result_array();
	
		$data["products_sub_category"] = each_json_decode($products_sub_category);

		$where = null;
		$where["flag"] = 0;
		$video_section = $this->db->select("*")
									->from("video_section")
									->where($where)
									->get()
									->result_array();
		$data["video_section"] = each_json_decode($video_section);


		$where = null;
		$where["flag"] = 0;
		$machines = $this->db->select("*")
									->from("machines")
									->where($where)
									->get()
									->result_array();
	
		$data["machines"] = each_json_decode($machines);

		$where = null;
		$where["flag"] = 0;
		$recipe = $this->db->select("*")
									->from("recipe")
									->where($where)
									->get()
									->result_array();
	
		$data["recipe"] = each_json_decode($recipe);


		$where = null;
		$where["flag"] = 0;
		$brands = $this->db->select("*")
									->from("brands")
									->where($where)
									->get()
									->result_array();
	
		$data["brands"] = each_json_decode($brands);

		if ($id) {
			$row = $this->db->select("*")
						->from("products")
						->where("id",$id)
						->get()->row_array();

			$data["row"] = json_decode_table($row);
		}

		$this->_template("edit", $data);
	}
	public function save($id)
	{
		

		$this->form_validation->set_rules('title[id]', 'Title', 'required');
	    $this->form_validation->set_rules('content[id]', 'Content', 'required');
		

	    
        if ($this->form_validation->run() == FALSE) {
        	$this->show($id);
    	}else {
    		$data_post = $this->input->post();
    		
			$insert["title"] = json_encode($data_post["title"]);
			$insert["color"] = $data_post["color"];
			$insert["bg"] = $this->image_path->get_id($data_post["bg"]);
			$insert["desc"] = json_encode($data_post["desc"]);
			$insert["content"] = json_encode($data_post["content"]);
			$insert["excerpt"] = json_encode($data_post["excerpt"]);
			
			$insert["product_information_text"] = json_encode($data_post["product_information_text"]);
			$insert["nutrition_information"] = json_encode($data_post["nutrition_information"]);
			$insert["ingredients"] = json_encode($data_post["ingredients"]);
			$insert["product_details"] = json_encode($data_post["product_details"]);
			$insert["packaging_information"] = json_encode($data_post["packaging_information"]);
			
			$insert["image"] = json_encode($this->image_path->get_id_array($data_post["image"]));
			$insert["image_2"] = json_encode($this->image_path->get_id_array($data_post["image_2"]));
			$insert["icon"] = json_encode($this->image_path->get_id_array($data_post["icon"]));
			$insert["product_information"] = json_encode($this->image_path->get_id_array($data_post["product_information"]));
			
			$insert["products_sub_category_id"] = ($data_post["products_sub_category_id"]) ? implode(",", $data_post["products_sub_category_id"]) : "";
			$insert["related_id"] = isset($data_post["related_id"]) ? implode(",", $data_post["related_id"]) : "";
			$insert["recipe_id"] = isset($data_post["recipe_id"]) ? implode(",", $data_post["recipe_id"]) : "";
			$insert["brand_id"] = isset($data_post["brand_id"]) ? $data_post["brand_id"] : "";
			$insert["flag"] = $data_post["flag"];

			$insert["video_section_id"] = $data_post["video_section_id"];

			// debug_pre($insert);exit();
			
			if ($id){
				$this->db->update("products", $insert, array("id"=>$id));
				set_flashdata("success_message", "Update Success");
			}else {
				$insert["created_at"] = date('Y-m-d H:i:s');
				$this->db->insert("products", $insert);	
				$id = $this->db->insert_id();
				set_flashdata("success_message", "Save Success");
			}	
			
			// echo $this->db->last_query(); die();

			redirect(PATH_CW .  'products/edit/' . $id,'refresh');
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

		
		$this->db->update("products", $set, $where);

		set_flashdata("success_message", ucwords(__class__) . " saved");

		if ( $ajax ){
			$json["success"] = true;
			$json["redirect"] = "products";
			echo json_encode($json);
		}else{
			redirect(PATH_CW . 'products');
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

			$this->db->update("products", $set, $where);
		}
		$json["success"] = true;
		$json["redirect"] = "products";
		echo json_encode($json);
		// $this->action("blocked", $id, true);
	}
}
