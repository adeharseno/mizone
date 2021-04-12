<?php namespace App\Controllers\Cw_admin;

use App\Controllers\BaseController;

class Forms extends BaseController {
	protected $dir = "Cw_admin/contents/forms/";
	protected $title = "Forms";

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
		$data["table"] = $this->db->table("forms")
							->orderBy("timestamp", "desc")
							->get()->getResultArray();

		$this->_template("table", $data);
	}
}