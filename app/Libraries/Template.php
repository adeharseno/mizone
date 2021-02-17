<?php
namespace App\Libraries;

use CodeIgniter\Controller;

class Template extends Controller{
	protected  $_ci;
	protected  $type_content='location';
    protected  $title_template,$keterangan_menu=null;
    protected  $location_content,$left_content,$main_content,$show_message,$hash_url,$class_name,$cw_admin=null;
    protected  $data_template=null;
    
	function __construct()
	{
		$this->_ci =new Controller();   
	}
	function display()
	{
        $data['_content'] = $this->get_content();
		echo view((($this->cw_admin) ? PATH_CW : "" ) . "template/template.php", $data);
	}
    function set_title($title)
    {
        $this->title_template = $title;
    }
    function set_class_name($class_name)
    {
        $this->class_name = $class_name;
    }
    function set_cw_admin($cw_admin = false)
    {
        $this->cw_admin = $cw_admin;
    }
    function set_left_content($html)
    {
        $this->left_content=$html;    
    }
    function set_main_content($html)
    {
        $this->main_content=$html;    
    }
    function set_data_template($data)
    {
        $this->data_template = $data;
    }
    
    function set_location_content($sLocation)
    {
        if (strtolower($this->type_content)=='location'){
            $this->location_content=$sLocation;    
        } else {
            return false;
        }
    }
    function get_content($data = null)
    {
        $this->data_template['title'] = $this->title_template;
        $this->data_template['show_message'] = $this->show_message;
        $this->data_template['class_name'] = trim(strtolower($this->class_name));
        return view( $this->location_content, $this->data_template);
    }
    
}
