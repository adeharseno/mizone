<?php namespace App\Controllers\Cw_admin;

use App\Controllers\BaseController;

class Slider extends BaseController {
	protected $dir = "Cw_admin/contents/slider/";
	protected $title = "Slider";
	
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
        $this->template->set_class_name($this->title);
        $this->template->display();
    }

	public function index()
	{
		$data = null;

		$where = null;
		$where["flag != 99"] = null;
		$data["table"] = $this->db->table("slider")
							->where($where)
							->get()->getResultArray();

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
			$row = $this->db->table("slider")->where("id",$id)->get()->getRowArray();

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
    		// var_dump( json_encode($this->image_path->get_id_array($data_post["content_d"])) );
    		// var_dump( $data_post["content_d"] );
    		// dd($data_post);
			$insert["title"] = json_encode($data_post["title"]);
			$insert["bg_d"] = json_encode($this->image_path->get_id_array($data_post["bg_d"]));
			$insert["content_d"] = json_encode($this->image_path->get_id_array($data_post["content_d"]));
			$insert["bg_m"] = json_encode($this->image_path->get_id_array($data_post["bg_m"]));
			$insert["text_m"] = json_encode($this->image_path->get_id_array($data_post["text_m"]));
			$insert["content_m"] = json_encode($this->image_path->get_id_array($data_post["content_m"]));
			$insert["video"] = json_encode($this->image_path->get_id_array($data_post["video"]));
			$insert["video_thumb"] = json_encode($this->image_path->get_id_array($data_post["video_thumb"]));
			$insert["video_title"] = json_encode($data_post["video_title"]);
			$insert["video_url"] = json_encode($data_post["video_url"]);
			$insert["flag"] = $data_post["flag"];
			// var_dump($insert); exit();
			
			if ($id){
				$this->db->table("slider")->where("id", $id)->update($insert);

				$this->session->setFlashdata("success_message", "Update Success");
			}else {
				$insert["created_at"] = date('Y-m-d H:i:s');
				$insert["updated_at"] = date('Y-m-d H:i:s');

				$query = $this->db->table("slider")->insert($insert);

				$id = $this->db->insertID();
				$this->session->setFlashdata("success_message", "Save Success");
			}	
			
			header('Location: '.base_url(PATH_CW . 'slider/edit/' . $id)); exit();
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

		$this->db->table("slider")->where($where)->update($set);
		// set_flashdata("success_message", ucwords(__class__) . " saved");
		$this->session->setFlashdata("success_message", "Update Success");

		if ( $ajax ){
			$json["success"] = true;
			$json["redirect"] = "slider";
			echo json_encode($json);
		}else{
			// redirect(PATH_CW . 'slider');
			header('Location: '.base_url(PATH_CW . 'slider')); exit();
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

			$this->db->table("slider")->where($where)->update($set);
		}
		$json["success"] = true;
		$json["redirect"] = "slider";
		echo json_encode($json);
		// $this->action("blocked", $id, true);
	}
}
