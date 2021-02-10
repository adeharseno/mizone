<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/

$route['default_controller'] = "page/home";
$route['home'] = 'page/home';
$route['about'] = 'page/about';

$route['machines'] = 'page/machines';
$route['services'] = 'page/services';
$route['products'] = 'page/products';
$route['distributors'] = 'page/distributors';
$route['contact-us'] = 'page/contact_us';
$route['recipes'] = 'page/recipes';
$route['recipe-detail/(:any)'] = 'page/recipes_detail/$1';
$route['brand/(:any)'] = 'page/brand/$1';
$route['privacy-policy'] = 'page/privacy_policy';
$route['privacy-policy-detail'] = 'page/privacy_policy_detail';
$route['terms-and-conditions'] = 'page/tnc';
$route['sitemap'] = 'page/sitemap';
$route['search'] = 'page/search';

$route['product'] = 'page/product';






require_once( BASEPATH .'database/DB'. EXT );




$db =& DB();



$result = $db->select('*')->get("page")->result_array();
// echo "<pre>";var_dump($result);echo "<pre>";exit();
foreach ($result as $key => $value) {
	switch ($value["link"]) {
		case '/':
			$route['default_controller'] = "section/home";
			$route['home'] = "section/publish/" . $value["id"];
			break;
	}
	preg_match('/\{(.*?)\}/', $value["link"], $regex);
	if (isset($regex[0])){
		$explode = explode(".", $regex[1]);
		$where = null;
        $where["flag"] = 0;
        $tables = $db->select($explode[1])
                            ->from($explode[0])
                            ->where($where)
                            ->get()
                            ->result_array();
		foreach ($tables as $k => $v) {
			$link = str_replace($regex[0], $v[$explode[1]], $value["link"]);
			$route[$link] = "section/publish/" . $value["id"] . "/" . $v["link"];	
		}
	}else{
		$route[$value["link"]] = "section/publish/" . $value["id"];	
	}	
}

$route["cw-admin/settings"] = "cw-admin/settings/edit/1";


$route['404_override'] = 'page/error404';
$route['translate_uri_dashes'] = FALSE;


