<?php namespace App\Controllers\Cw_admin;

use App\Controllers\BaseController;

class File_manager extends BaseController {
	protected $dir = "Cw_admin/contents/file_manager/";

	function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
	{
		parent::initController($request, $response, $logger);
		if ( empty($this->session->get('user_id')) ){
			header('Location: '.base_url(PATH_CW . 'login')); exit();
		}
	}
	public function index()
	{
		debug_pre($this->scan("1/2/3"));exit();
	}
	public function show($dir = "")
	{
		// debug_pre($this->input->getPost("dir"));exit();
		$data["directory"] = $this->scan($dir);
		$data["class_name"] = strtolower(__class__);
		$json["html"] = view($this->dir . "modal", $data);
		// debug_pre($data["directory"]);exit();
		$json["path-2"] = $data["directory"]["path-2"];

		echo (json_encode($json));
	}
	public function scan($directory = '')
	{
		// echo IPATH;
		// debug_pre ($this->input->get("dir") );exit();
		$directory = ($directory) ? $directory : $this->input->getPost("dir");
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
			$explode = explode(".", $value);
			
			if (is_dir($path . "/" . $value)) {
				$type = "folder";
				$value = ($value == "." OR $value == ".." OR $value == ".git") ? "" : $value;
			}else {
				$type = "file";
			}

			if ($value){
				if( !empty( end($explode) && !is_dir($path . "/" . $value) ) ){
					$dir["data"][$i]["name"] = $value;
					$dir["data"][$i]["type"] = end($explode);
				}
				else{
					$dir["data"][$i]["name"] = $value;
					$dir["data"][$i]["type"] = $type;	
				}
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
		$directory = ($directory) ? $directory : $this->input->getPost("dir");
		$name = ($name) ? $name : $this->input->getPost("name");

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
		$directory = $this->input->getPost("dir");
		$data = json_decode($this->input->getPost("data"));
		
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
		$directory = $this->input->getPost("dir");
		$name = $this->input->getPost("name");
		$image_data = $this->input->getPost("image_data");
		// var_dump($name); exit();
		$explode = explode(".", $name);
		$ext = '.'.end($explode);
		$name = str_replace("." . end($explode), "", $name) ;

		$path = IPATH . $directory . "/";

		if (file_exists($path . $name . $ext)){
        	$name .= "-" . random_string(2);
		}
		
		// var_dump(in_array( end($explode), ['.jpg', '.JPG', '.png', '.PNG', '.jpeg', '.JPEG'] ));

		if( in_array( end($explode), ['.jpg', '.JPG', '.png', '.PNG', '.jpeg', '.JPEG'] ) ){
			$img = preg_replace('#^data:image/\w+;base64,#i', '', $image_data);
			$img = str_replace("[removed ", "", $img);
			$img = base64_decode(str_replace("[removed]", "", $img));
		}
		else{
			// $img = base64_decode($image_data);
			list($type, $data) = explode(';', $image_data);
			list(, $data) = explode(',', $data);
			$img = base64_decode($data);
		}
		
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
