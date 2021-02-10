<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Section extends CI_Controller {
	protected $dir = "section/";
	protected $title = "";
	
	
	function __construct()
	{
		parent::__construct();

	}
	function _template($location, $data = null)
    {
    	$data = $data;
        $this->template->set_location_content($this->dir . $location);
        $this->template->set_data_template($data);
        $this->template->set_title($this->title);
        $this->template->display();
    }
    public function home()
    {
    	if (!get_session("lang")){
    		set_session("lang", "id");
    	}
    	redirect('home','refresh');
    }
	public function index($id='', $type = "publish", $where = '')
	{			
		set_session("where_link", $where);
		$type = ($type == "publish") ? 0 : 1;
		
		$this->template->set_class_name(__class__);
		
		$where = null;
		$where["flag"] = $type;
		$where["id"] = $id;
		$page = $this->db->select('*')
						->from("page")
						->where($where)
						->get()
						->row_array();

		$this->title = $this->pages->get_field($page["title"]);
		

		$where = null;
		$where["a.flag"] = $type;
		$where["a.page_id"] = $page["id"];
		$page_section = $this->db->select('a.id,b.view')
						->from("page_section a")
						->join("section b", "a.section_id=b.id")
						->where($where)
						->order_by("a.order_by")
						->get()
						->result_array();

		$data["page_section"] = $page_section;
		$this->_template("show", $data);
		
	}
	public function publish($id='', $where = '')
	{
		$this->index($id, "publish", $where);
	}
	public function error()
	{
		$this->load->view($this->dir . "error", null, FALSE);
	}
	public function lang($type = "id")
	{
		set_session("lang", $type);
		$this->home();
	}
}

