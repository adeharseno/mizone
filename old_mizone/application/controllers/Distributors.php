<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class distributors extends CI_Controller {
	protected $dir = "contents/";
	protected $title = "";
	function __construct()
	{
		parent::__construct();

	}
	public function get_sub_category()
	{
		$data = null;

		$distributor_category_id = $this->input->post("distributor_category_id");
		
		$where = null;
		$where["flag"] = 0;
		$where["distributor_category_id"] = $distributor_category_id;
		$distributors_sub_category = $this->db->select("*")
										->from("distributors_sub_category")
										->where($where)
										->order_by("order_by")
										->get()
										->result_array();
		


		$data["distributors_sub_category"] = each_json_decode($distributors_sub_category);
		
		$json["html"] = $this->load->view($this->dir . "distributors/sub-category", $data, TRUE);

		echo json_encode($json);
	}
	public function get_detail()
	{
		$data = null;

		$distributors_sub_category_id = $this->input->post("distributors_sub_category_id");
		
		$where = null;
		$where["flag"] = 0;
		$where["distributors_sub_category_id"] = $distributors_sub_category_id;
		$distributor = $this->db->select("*")
										->from("distributors")
										->where($where)
										->order_by("order_by")
										->get()
										->row_array();
		


		$data["distributor"] = json_decode_table($distributor, language());
		
		$json["html"] = $this->load->view($this->dir . "distributors/detail-distributor", $data, TRUE);

		echo json_encode($json);
	}
}