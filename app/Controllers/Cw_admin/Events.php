<?php namespace App\Controllers\Cw_admin;

use App\Controllers\BaseController;

class Events extends BaseController {
	protected $dir = "Cw_admin/contents/events/";
	protected $title = "Events";
	
	
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
		$data["table"] = $this->db->table("events")
							->where($where)
							// ->order_by("order_by asc")
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
			$row = $this->db->table("events")->where("id",$id)->get()->getRowArray();

			$data["row"] = json_decode_table($row);
		}

		$this->_template("edit", $data);
	}
	public function save($id)
	{
		// debug_pre($this->input->getPost());exit();
		// $this->form_validation->set_rules('content[id]', 'Content', 'required');
		// dd($this->input->getPost()); exit();
		// $val = $this->validate(['content[id]' => 'required']);
		
        // if (!$val) {
        // 	$this->show($id);
    	// }else {
    		$data_post = $this->input->getPost();
			
			$insert["title"] = json_encode($data_post["title"]);
			$insert["author"] = json_encode($data_post["author"]);
			$insert["content"] = json_encode($data_post["content"]);
            $insert["excerpt"] = json_encode($data_post["excerpt"]);
			$insert["publish_date"] = json_encode($data_post["publish_date"]);
			$insert["meta_desc"] = json_encode($data_post["meta_desc"]);
			$insert["image"] = json_encode($this->image_path->get_id_array($data_post["image"]));
			$insert["flag"] = $data_post["flag"];
			$insert["updated_at"] = date('Y-m-d H:i:s');
			// debug_pre($insert);exit();
			
			if ($id){
				$this->db->table("events")->where("id", $id)->update($insert);

				$this->session->setFlashdata("success_message", "Update Success");
			}else {
				$insert["slug"] = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $data_post["title"]['id'])));
				$insert["created_at"] = date('Y-m-d H:i:s');
				$insert["updated_at"] = date('Y-m-d H:i:s');

				$query = $this->db->table("events")->insert($insert);

				$id = $this->db->insertID();
				$this->session->setFlashdata("success_message", "Save Success");
			}	
			
			// redirect(PATH_CW .  'events/edit/' . $id,'refresh');
			header('Location: '.base_url(PATH_CW . 'events/edit/' . $id)); exit();
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

		$this->db->table("events")->where($where)->update($set);

		// set_flashdata("success_message", ucwords(__class__) . " saved");
		$this->session->setFlashdata("success_message", "Update Success");

		if ( $ajax ){
			$json["success"] = true;
			$json["redirect"] = "events";
			echo json_encode($json);
		}else{
			// redirect(PATH_CW . 'events');
			header('Location: '.base_url(PATH_CW . 'events/')); exit();
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

			// $this->db->update("events", $set, $where);
			$this->db->table("events")->where($where)->update($set);
		}
		$json["success"] = true;
		$json["redirect"] = "events";
		echo json_encode($json);
		// $this->action("blocked", $id, true);
	}
}
