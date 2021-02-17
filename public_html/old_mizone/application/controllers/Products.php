<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class products extends CI_Controller {
	protected $dir = "contents/";
	protected $title = "";
	function __construct()
	{
		parent::__construct();

	}
	public function get_sub_category($value='')
	{
		$data = null;

		$product_category_id = $this->input->post("product_category_id", TRUE);
		$where = null;
		$where["flag"] = 0;
		$where["product_category_id"] = $product_category_id;
		$products_sub_category = $this->db->select("*")
										->from("products_sub_category")
										->where($where)
										->order_by("order_by")
										->get()
										->result_array();
		$data["products_sub_category"] = each_json_decode($products_sub_category);

		$json["html"] = $this->load->view($this->dir . "products/sub-category", $data, TRUE);

		echo json_encode($json);
	}
	public function get()
	{
		$data = null;

		$products_sub_category_id = $this->input->post("products_sub_category_id", TRUE);
		
		$where = null;
		$where["flag"] = 0;
		$where["products_sub_category_id like '%".$this->db->escape_str($products_sub_category_id)."%'"] = null;
		$products = $this->db->select("*")
										->from("products")
										->where($where)
										->order_by("order_by")
										->get()
										->result_array();
		
		$where = null;
		$where["flag"] = 0;
		$where["id"] = $products_sub_category_id;
		$products_category = $this->db->select("*")
										->from("products_sub_category")
										->where($where)
										->order_by("order_by")
										->get()
										->row_array();
		// debug_pre($products);exit();
		$data["products_category"] = json_decode_table($products_category, language());
		$data["products"] = each_json_decode($products);

		
		$json["html"] = $this->load->view($this->dir . "products/list-product", $data, TRUE);
		
		echo json_encode($json);
	}
	public function get_detail()
	{
		$data = null;

		$products_id = $this->input->post("products_id", TRUE);
		
		$where = null;
		$where["flag"] = 0;
		$where["id"] = $products_id;
		$product = $this->db->select("*")
										->from("products")
										->where($where)
										->order_by("order_by")
										->get()
										->row_array();
		$data["product"] = json_decode_table($product, language());
		
		$data["related"] = null;
		if ($data["product"]["related_id"]){
			$where = null;
			$where["a.flag"] = 0;
			$where["a.id in (". $this->db->escape_str($data["product"]["related_id"]) .")"] = null;
			
			
			
			$related = $this->db->select("a.*,b.title as category")
											->from("machines a")
											->join("machines_category b" , "a.machines_category_id=b.id")
											->where($where)
											->get()
											->result_array();
			$data["related"] = each_json_decode($related);	
		}
		
		
		

		$json["html_detail"] = null;
		$json["html_detail_text"] = null;	
		
		if ($data["product"]){
			$json["html_detail"] = $this->load->view($this->dir . "products/detail", $data, TRUE);
			$json["html_detail_text"] = $this->load->view($this->dir . "products/detail-text", $data, TRUE);	
		}

		echo json_encode($json);
	}
	public function get_modal_recipe()
	{
		$data = null;

		$recipe_id = $this->input->post("recipe_id", TRUE);
		
		$where = null;
		$where["flag"] = 0;
		$where["id"] = $recipe_id;
		$recipe = $this->db->select("*")
										->from("recipe")
										->where($where)
										->order_by("order_by")
										->get()
										->row_array();




		$data["recipe"] = json_decode_table($recipe, language());
		

		$img_q = $this->db->get_where("image_path",['id' => $data['recipe']['image']]);
		$img = $img_q->row_array();
		$data["image"] = $img["path"] . $img["name"];

		$json["html"] = null;
		
		
		if ($data["recipe"]){
			$json["html"] = $this->load->view($this->dir . "products/modal-recipe", $data, TRUE);
			
		}

		echo json_encode($json);
	}
}