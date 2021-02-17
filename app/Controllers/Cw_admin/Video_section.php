<?php namespace App\Controllers\Cw_admin;

use App\Controllers\BaseController;

class Video_section extends BaseController {
	protected $dir = "Cw_admin/contents/video_section/";
	protected $title = "Video Section";
	
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
        $this->template->set_class_name('video_section');
        $this->template->display();
    }
	public function index()
	{
		$data = null;

		$where = null;
		$where["flag != 99"] = null;
		$data["table"] = $this->db->table("video_section")->where($where)->get()->getResultArray();

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
			$row = $this->db->table("video_section")->where("id",$id)->get()->getRowArray();
			$data["row"] = json_decode_table($row);	
		}

		$this->_template("edit", $data);
	}
	public function save($id)
	{
		// debug_pre($this->input->getPost());exit();
		// $this->form_validation->set_rules('title[id]', 'Title', 'required');
	    
        // if ($this->form_validation->run() == FALSE) {
        // 	$this->show($id);
    	// }else {
    		$data_post = $this->input->getPost();
    		
			$insert["title"] = json_encode($data_post["title"]);
			$insert["flag"] = $data_post["flag"];

			
			
			if ($id){
				$this->db->table("video_section")->where("id", $id)->update($insert);
				// set_flashdata("success_message", "Update Success");
			}else {
				$insert["created_at"] = date('Y-m-d H:i:s');
				$query = $this->db->table("video_section")->insert($insert);

				$id = $query->resultID;
				// set_flashdata("success_message", "Save Success");
			}	
			
			// redirect(PATH_CW .  'video_section/edit/' . $id,'refresh');
			header('Location: '.base_url(PATH_CW . 'video_section/edit/' . $id)); exit();
    	// }
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

		
		// $this->db->update("video_section", $set, $where);
		$this->db->table("video_section")->where($where)->update($set);

		set_flashdata("success_message", ucwords(__class__) . " saved");

		if ( $ajax ){
			$json["success"] = true;
			$json["redirect"] = "video_section";
			echo json_encode($json);
		}else{
			redirect(PATH_CW . 'video_section');
		}

	}
	public function delete()
	{
		$id = $this->input->getPost("id");
		$this->action("delete", $id, true);
	}
	public function active()
	{
		$id = $this->input->getPost("id");
		$this->action("active", $id, true);
	}
	public function blocked()
	{
		$id = $this->input->getPost("id");
		$this->action("blocked", $id, true);
	}
	public function order()
	{
		$data = json_decode($this->input->getPost("data"));
		
		foreach ($data as $key => $value) {
			$value = (array) $value;
			$set = null;
			$set["order_by"] = $value["order"];	

			$where = null;
			$where["id in (".$value["id"].")"] = null;

			$this->db->table("video_section")->where($where)->update($set);
		}
		$json["success"] = true;
		$json["redirect"] = "video_section";
		echo json_encode($json);
		// $this->action("blocked", $id, true);
	}
}
