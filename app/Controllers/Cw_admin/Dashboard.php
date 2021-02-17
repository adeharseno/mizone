<?php namespace App\Controllers\Cw_admin;

use App\Controllers\BaseController;

class Dashboard extends BaseController {
	protected $dir = "Cw_admin/contents/dashboard/";
	protected $title = "Dashboard";
	
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
        $this->template->set_cw_admin(TRUE);
        $this->template->set_class_name(strtolower(__class__));
        $this->template->display();
    }
	public function index()
	{
		$data['messages'] = $this->db->select("*")->order_by('created_at', 'desc')->get("contact_us")->result();
		$this->_template("v1",$data);
	}
	public function logout()
	{
		$this->session->destroy();
		header('Location: '.base_url(PATH_CW . 'login')); exit();
	}

	public function export()
	{
		$data = $this->db->select("*")->get("contact_us")->result_array();

		// create file name
        $fileName = 'data-'.time().'.xlsx';  
		// load excel library
        $this->load->library('excel');
        $empInfo = $data;
        $objPHPExcel = new PHPExcel();
        $objPHPExcel->setActiveSheetIndex(0);
        // set Header
        $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(20); 
        $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(20); 
        $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(20); 
        $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(20); 
        $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(25); 
        $objPHPExcel->getActiveSheet()->SetCellValue('A1', 'Date');
        $objPHPExcel->getActiveSheet()->SetCellValue('B1', 'First Name');
        $objPHPExcel->getActiveSheet()->SetCellValue('C1', 'Company');
        $objPHPExcel->getActiveSheet()->SetCellValue('D1', 'Phone');
        $objPHPExcel->getActiveSheet()->SetCellValue('E1', 'Topic');  
        $objPHPExcel->getActiveSheet()->SetCellValue('F1', 'Subject');  
        $objPHPExcel->getActiveSheet()->SetCellValue('G1', 'Message');      

        // set Row
        $rowCount = 2;
        foreach ($empInfo as $element) {
            $objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, $element['created_at']);
            $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, $element['name']);
            $objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, $element['company_name']);
            $objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, $element['phone_number']);
            $objPHPExcel->getActiveSheet()->SetCellValue('E' . $rowCount, $element['topic']);
            $objPHPExcel->getActiveSheet()->SetCellValue('F' . $rowCount, $element['subject']);
            $objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowCount, $element['message']);
            $rowCount++;
        }
        $objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
        $objWriter->save('storage\\'.$fileName);
		// download file
        header("Content-Type: application/vnd.ms-excel");
        redirect('storage/'.$fileName);        
	}
	
}
