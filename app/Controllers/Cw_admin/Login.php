<?php namespace App\Controllers\Cw_admin;

use App\Controllers\BaseController;

class Login extends BaseController {

	
	function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
	{
		parent::initController($request, $response, $logger);
		if ( !empty($this->session->get('user_id')) ){
			header('Location: '.base_url(PATH_CW . 'products')); exit();
		}
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

	public function ReturnNothing(){
		redirect('https://www.mizone.co.id/');
	}
	
	public function get_login($data_post = null)
	{
		$data["data_post"] = $data_post;
		echo view(PATH_CW . "login", $data);
	}
	
	public function post_login()
	{
		$where = null;
		$where["username"] = $this->input->getPost("username");
		// $where["password"] = generate_password($this->input->getPost("password"));

		$user = $this->db->table("useradmin")->where($where)->get()->getRowArray();
		// var_dump($user); exit();
		if ( is_null($user) || count($user) === 0 ){
			$this->session->setFlashdata("error_message", "Username can't be found");
			$this->get_login($this->input->getPost());
			return false;
		} else {
			if( password_verify( htmlspecialchars(trim($this->input->getPost("password"))) , $user['password']) ){
				foreach ($user as $key => $value) {
					$this->session->set("user_" . strtolower($key), $value);
				}
				$where = null;
				$where["id"] = $user["id"];

				$set = null;
				$set["last_login"] = date("Y-m-d H:i:s");
				// $id = $this->session->get('user_id');
				// var_dump($id); exit();
				$this->db->table("useradmin")->where($where)->update($set);
				// redirect(PATH_CW . "mproducts","refresh");
				header('Location: '.base_url(PATH_CW . 'slider')); exit();
			}
			else{
				$this->session->setFlashdata("error_message", "Password not match");
				$this->get_login($this->input->getPost());
				return false;
			}
		}
        
        
	}
}
