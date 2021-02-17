<?php
defined("BASEPATH") OR exit("No direct script access allowed");

class Test extends CI_Controller {



	function __construct()
	{
		parent::__construct();
		if (is_logged_in()){
			redirect(PATH_CW . "dashboard","refresh");
		}
// else {
 $this->output->enable_profiler(TRUE);
// $this->session->set_flashdata("error_message", "not logged-in");
// }
	}

	public function index()
	{
		switch ($_SERVER["REQUEST_METHOD"]) {
			case "GET":
				$this->get_login();
				break;
			case "POST":
				$this->post_login();	
				break;
			default:
				echo "REQUEST_METHOD NOT FOUND";
				break;
		}		
	}
	public function get_login($data_post = null)
	{
		$data["data_post"] = $data_post;
		$this->load->view(PATH_CW . "test", $data);	
	}
	public function post_login()
	{
		$where = null;
		$where["username"] = $this->input->post("username");
		$where["password"] = generate_password($this->input->post("password"));

		$user = $this->db->select("*")
							->from("useradmin")
							->where($where)
							->get()
							->row_array();
			
		
		
		if ( count($user) === 0 ){
			set_flashdata("error_message", "Username and Password can't be found");
			$this->get_login($this->input->post());
			return false;
		} else {
			foreach ($user as $key => $value) {
				set_session("user_" . strtolower($key),$value);
			}
			$where = null;
			$where["id"] = $user["id"];

			$set = null;
			$set["last_login"] = date("Y-m-d H:i:s");

			$this->db->update("useradmin", $set, $where);

			redirect(PATH_CW . "dashboard","refresh");
		}
        
        
	}
}
