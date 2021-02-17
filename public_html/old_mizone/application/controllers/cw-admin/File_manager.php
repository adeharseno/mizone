<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class File_manager extends CI_Controller {
	protected $dir = "cw-admin/contents/file_manager/";

	function __construct()
	{
		parent::__construct();
		if (!is_logged_in()){
			redirect('login','refresh');
		}
	}
	public function index()
	{
		
		debug_pre($this->scan("1/2/3"));exit();
	}
	public function show($dir = "")
	{
		// debug_pre($this->input->post("dir"));exit();
		$data["directory"] = $this->scan($dir);
		$data["class_name"] = strtolower(__class__);
		$json["html"] = $this->load->view($this->dir . "modal", $data, TRUE);
		// debug_pre($data["directory"]);exit();
		$json["path-2"] = $data["directory"]["path-2"];

		echo (json_encode($json));
	}
	public function scan($directory = '')
	{
		// echo IPATH;
		// debug_pre ($this->input->get("dir") );exit();
		$directory = ($directory) ? $directory : $this->input->post("dir");
		$directory = str_replace("xyxy", "-", $directory);
		$directory = str_replace("xyas", "/", $directory);
		// debug_pre($directory);exit();
		$path = IPATH . $directory;
		
		
		// debug_pre($path);exit();

		$files = scandir($path);
		// debug_pre($files);exit();
		$dir = null;
		$i = 0;
		$dir["path-2"] = $path;
		$dir["data"] = null;

		foreach ($files as $value) {
			if (is_dir($path . "/" . $value)) {
				$type = "folder";
				$value = ($value == "." OR $value == ".." OR $value == ".git") ? "" : $value;
			}else {
				$type = "file";
			}
			if ($value){
				$dir["data"][$i]["name"] = $value;
				$dir["data"][$i]["type"] = $type;	
				$i++;
			}
		}


		$dir["path"] = "storage/" . $directory . "/";	
		$dir["directory"] = $directory;	

		$directories = explode("/", $directory);

		unset($directories[count($directories) - 1]);
		$dir["back"] = implode("/", $directories);

		return $dir;
	}
	public function add_folder($name = '', $directory = '')
	{
		$directory = ($directory) ? $directory : $this->input->post("dir");
		$name = ($name) ? $name : $this->input->post("name");

		$path = IPATH . $directory . "/";

		if (!file_exists($path . $name)){
			mkdir($path . $name);	
			$json["status"] = true;
		} else {
			$json["status"] = false;
		}
		echo json_encode($json);
	}
	public function delete_folder()
	{
		$directory = $this->input->post("dir");
		$data = json_decode($this->input->post("data"));
		
		$path = IPATH . $directory . "/";

		foreach ($data as $key => $value) {
			$value = (array) $value;
			
			if (file_exists($path . $value["name"])){
				$this->recursiveRemoveDirectory($path . $value["name"]);
			}
		}
		
		$json["status"] = true;
		
		echo json_encode($json);
	}

	public function add_file()
	{
		$directory = $this->input->post("dir");
		$name = $this->input->post("name");
		$image_data = $this->input->post("image_data");
		$ext = ".png";

		$explode = explode(".", $name);
		$name = str_replace("." . end($explode), "", $name) ;

		$path = IPATH . $directory . "/";

		if (file_exists($path . $name . $ext)){
        	$name .= "-" . random_string(2);
        }

		$img = preg_replace('#^data:image/\w+;base64,#i', '', $image_data);
        $img = str_replace("[removed ", "", $img);
        $img = base64_decode(str_replace("[removed]", "", $img));
        
        file_put_contents($path . $name . $ext, $img);
        $json["status"] = true;
		
		echo json_encode($json);
	}
	public function recursiveRemoveDirectory($directory)
	{
		if (is_dir($directory)){
			foreach(glob("{$directory}/*") as $file)
		    {
		        if(is_dir($file)) { 
		            $this->recursiveRemoveDirectory($file);
		        } else {
		            unlink($file);
		        }
		    }
		    rmdir($directory);

		}else{
			unlink($directory);
		}
	    
	}
}
