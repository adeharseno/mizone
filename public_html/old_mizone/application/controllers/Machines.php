<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Machines extends CI_Controller {
	protected $dir = "contents/";
	protected $title = "";
	function __construct()
	{
		parent::__construct();

	}
	public function get()
	{
		$data = null;

		$machines_category_id = $this->input->post("machines_category_id", TRUE);
		
		$where = null;
		$where["flag"] = 0;
		$where["machines_category_id"] = $machines_category_id;
		$machines = $this->db->select("*")
										->from("machines")
										->where($where)
										->order_by("order_by")
										->get()
										->result_array();
		
		$where = null;
		$where["flag"] = 0;
		$where["id"] = $machines_category_id;
		$machines_category = $this->db->select("*")
										->from("machines_category")
										->where($where)
										->order_by("order_by")
										->get()
										->row_array();
										
		$data["machines_category"] = json_decode_table($machines_category, language());
		$data["machines"] = each_json_decode($machines);

		
		$json["html"] = $this->load->view($this->dir . "machines/list-product", $data, TRUE);

		echo json_encode($json);
	}
	public function get_detail()
	{
		$data = null;

		$machines_id = $this->input->post("machines_id", TRUE);
		
		$where = null;
		$where["flag"] = 0;
		$where["id"] = $machines_id;
		$machine = $this->db->select("*")
										->from("machines")
										->where($where)
										->order_by("order_by")
										->get()
										->row_array();
		$data["machine"] = json_decode_table($machine, language());

		$where = null;
		$where["flag"] = 0;
		$where["id"] = $data["machine"]["machines_category_id"];
		$machines_category = $this->db->select("*")
										->from("machines_category")
										->where($where)
										->order_by("order_by")
										->get()
										->row_array();
		$data["machines_category"] = json_decode_table($machines_category, language());

		$data["related"] = null;


		


		if ($data["machine"]["id"]){
			$where = null;
			$where["a.flag"] = 0;
			$where["a.related_id like '%". $this->db->escape_str($data["machine"]["id"]) ."%'"] = null;
			
			
			
			$related = $this->db->select("a.*,b.title as sub_category,c.title as category")
											->from("products a")
											->join("products_sub_category b" , "a.products_sub_category_id=b.id")
											->join("products_category c" , "b.product_category_id=c.id")
											->where($where)
											->order_by("order_by")
											->get()
											->result_array();
			$data["related"] = each_json_decode($related);	
		}
		
		
		$where = null;
		$where["a.flag"] = 0;
		$where["a.id"] = $machines_id;
		$videom = $this->db->select("a.*, b.*")
										->from("machines a")
										->join("video_sub_section b" , "a.video_section_id=b.video_section_id")
										->where($where)
										->order_by("a.order_by")
										->get()
										->result_array();
		$data["videom"] = each_json_decode($videom);

		// print_r($videom);
		// exit();

		$json["html_detail"] = null;
		$json["html_detail_text"] = null;	

		if ($data["machine"]){
			$json["html_detail"] = $this->load->view($this->dir . "machines/detail", $data, TRUE);
			$json["html_detail_text"] = $this->load->view($this->dir . "machines/detail-text", $data, TRUE);	
		}

		echo json_encode($json);
	}
}