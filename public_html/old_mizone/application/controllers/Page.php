<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends CI_Controller {
	protected $dir = "contents/";
	protected $title = "";
	
	
	function __construct()
	{

		parent::__construct();
		// echo language();exit();
		// $this->lang->load("all_lang",language());
		

		if (!get_session("lang")){
			set_session("lang", "id");	
		}
		

	}
	function _template($location, $data = null)
    {
    	$data = $data;
    	
    	$where3["b.flag"] = 0;

		$data['whitehovercontent'] = $this->db->select("a.recipes_category_id AS cat_id, a.id AS subcat_id, a.title AS subcat_name, b.id AS recipe_id, b.title AS recipe_name")
										->from("recipes_sub_category a")
										->join("recipes b" , "a.id = b.recipes_sub_category_id")
										->where($where3)
										->order_by("a.order_by")
										->get()
										->result_array();
		$data["whitehovercontent"] = each_json_decode($data['whitehovercontent']);

        $this->template->set_location_content($this->dir . $location);
        $this->template->set_data_template($data);
        $this->template->set_title($this->title);

        $this->template->display();
    }
	
	public function home()
	{

		$data = null;

		$where = null;
		$where["flag"] = 0;
		$mproducts = $this->db->select("*")
										->from("mproducts")
										->where($where)
										->get()
										->result_array();
		$data["mproducts"] = each_json_decode($mproducts);
		
		$video_sub_section = $this->db->select("*")
										->from("video_sub_section")
										->where($where)
										->order_by("created_at")
										->get()
										->result_array();
		$data["video_sub_section"] = each_json_decode($video_sub_section);

		$sosmed = $this->db->select("*")
										->from("sosmed")
										->where($where)
										->order_by("created_at")
										->get()
										->result_array();
		$data["sosmed"] = each_json_decode($sosmed);



		$this->title = "Home";
		$this->template->set_class_name("home");
		$this->_template("home",$data);
	}
	public function about()
	{
		$data = null;
		
		$this->title = "About";
		$this->template->set_class_name("about");
		$this->_template("about",$data);
	}
	
	public function recipes()
	{
		$data = null;

		// $selected_filter = array();

		$products = $this->db->select("*")
									->from("products")
									->order_by("order_by")
									->get()
									->result_array();
		$data["products"] = each_json_decode($products);

		$recipes_festival = $this->db->select("*")
									->from("recipes_festival")
									->get()
									->result_array();
		$data["recipes_festival"] = each_json_decode($recipes_festival);
		
		
		$recipes_category = $this->db->select("*")
									->from("recipes_category")
									->get()
									->result_array();
		$data["recipes_category"] = each_json_decode($recipes_category);

		// $recipes_festival = $this->db->select("f.id AS id, f.flag AS flag, f.title AS title, r.festive_id AS festive_id")
		// 							->from("recipes_festival f, recipes r")
		// 							->join("recipes r", "f.id = r.festive_id","inner")
		// 							->get()
		// 							->result_array();
		// $data["recipes_festival"] = each_json_decode($recipes_festival);

		// $recipes_category = $this->db->select("c.id AS id, c.flag AS flag, c.title AS title")
		// 							->from("recipes_category c")
		// 							->join("recipes_sub_category s", "s.recipes_category_id = c.id","right")
		// 							->join("recipes r", "r.recipes_sub_category_id = s.id","right")
		// 							->get()
		// 							->result_array();
		// $data["recipes_category"] = each_json_decode($recipes_category);

		if(isset($this->input->post()['festivef']) OR isset($this->input->post()['categoryf']) OR isset($this->input->post()['productf'])){
			$productf = $this->input->post('productf');
			$festivef = $this->input->post('festivef');
			$categoryf=$this->input->post('categoryf');

			$where = null;
			$where["r.flag"] = 0;
			$where["p.flag"] = 0;
			$where["f.flag"] = 0;
			$where["c.flag"] = 0;
			$recipes = $this->db->select("r.id AS id, r.title AS title, r.icon AS icon")
								->from("recipes r")
								->join("products p", "r.product_id = p.id")
								->join("recipes_festival f", "r.festive_id = f.id")
								->join("recipes_sub_category s", "r.recipes_sub_category_id = s.id")
								->join("recipes_category c", "s.recipes_category_id = c.id")
								->where($where)
								->where_in('c.id',$categoryf)
								->where_in('f.id',$festivef)
								->where_in('p.id',$productf)
								->or_where_in('c.id',$categoryf)
								->or_where_in('f.id',$festivef)
								->or_where_in('p.id',$productf)
								->order_by("r.order_by")
								->get()
								->result_array();
			$data["recipes"] = each_json_decode($recipes);
			$data["error"] = get_lang_all("recipe-error-filter");

			//show selected result
			// $products = $this->db->select("p.title AS title")
			// 				 ->from("products p")
			// 				 ->join("recipes r", "r.product_id = p.id")
			// 				 ->where_in("p.id", $productf)
			// 				 ->group_by("p.id")
			// 				 ->order_by("p.order_by")
			// 				 ->get()
			// 				 ->result_array();
			// $data_products = each_json_decode($products);

			// $recipes_festival = $this->db->select("title")
			// 				 ->from("recipes_festival")
			// 				 ->where_in("id", $festivef)
			// 				 ->order_by("order_by")
			// 				 ->get()
			// 				 ->result_array();
			// $data_recipes_festival = each_json_decode($recipes_festival);

			// $recipes_category = $this->db->select("title")
			// 				 ->from("recipes_category")
			// 				 ->where_in("id", $categoryf)
			// 				 ->order_by("order_by")
			// 				 ->get()
			// 				 ->result_array();
			// $data_recipes_category = each_json_decode($recipes_category);

			// if (count($productf) > 0 AND is_array($data_products)) {
			// 	$selected_filter = array_merge($data_products, $selected_filter);
			// }
			// if (count($festivef) > 0 AND is_array($data_recipes_festival)) {
			// 	$selected_filter = array_merge($data_recipes_festival, $selected_filter);
			// }
			// if (count($categoryf) > 0 AND is_array($data_recipes_category)) {
			// 	$selected_filter = array_merge($data_recipes_category, $selected_filter);
			// }
			//show selected result
		}

		// search ingredients
		// else if(isset($this->input->post()['search']) AND $this->input->post()['search'] != ''){
		// 	$data_post = $this->input->post();
		// 	extract($data_post);

		// 	$where['b.title LIKE'] = "%".$search."%";
		// 	$where["a.flag"] = 0;
		// 	$where["b.flag"] = 0;
		// 	$recipes = $this->db->distinct()
		// 						->select("a.id AS id, a.title AS title, a.icon AS icon")
		// 						->from("recipes a")
		// 						->join("ingredients b", "a.id = b.recipes_id")
		// 						->where($where)
		// 						->order_by("a.order_by")
		// 						->get()
		// 						->result_array();
		// 	$data["recipes"] = each_json_decode($recipes);
		// 	$data["error"] = get_lang_all("recipe-error-search").' "'.$search.'"';
		// }
		
		else{
			$where = null;
			$where["flag"] = 0;
			$recipes = $this->db->select("*")
								->from("recipes")
								->where($where)
								->order_by("order_by")
								->get()
								->result_array();
			$data["recipes"] = each_json_decode($recipes);
		}

		// $data["selected_filter"] = $selected_filter;
		
		$this->title = "Recipes";
		$this->template->set_class_name("recipes");
		$this->_template("recipes",$data);
	}

	public function recipes_detail($id){
		$where = null;
		$where["a.id"] = $id;
		$recipedetail = $this->db->select("a.id AS id, a.icon AS icon, a.title AS title, a.content AS content, festive.title AS festive_cat, category.title AS category, a.product_id AS product")
										->from("recipes a")
										->join("recipes_festival festive" , "a.festive_id=festive.id")
										->join("recipes_sub_category subcat" , "a.recipes_sub_category_id=subcat.id")
										->join("recipes_category category" , "category.id=subcat.recipes_category_id")
										->where($where)
										->get()
										->row_array();
		$data["recipedetail"] = json_decode_table($recipedetail, language());

		$ingredients = $this->db->select("b.title AS title, b.measurement, b.flag")
										->from("ingredients b")
										->join("recipes a" , "b.recipes_id=a.id")
										->where($where)
										->order_by("b.order_by")
										->get()
										->result_array();
		$data["ingredients"] = each_json_decode($ingredients);

		$preparations = $this->db->select("b.title AS title, b.flag")
										->from("preparations b")
										->join("recipes a" , "b.recipes_id=a.id")
										->where($where)
										->order_by("b.order_by")
										->get()
										->result_array();
		$data["preparations"] = each_json_decode($preparations);

		$where2["product_id"] = $recipedetail['product'];
		$where2["id != "] = $id;
		$where2["flag"] = 0;

		$recipesrelated = $this->db->select("*")
										->from("recipes")
										->where($where2)
										->get()
										->result_array();
		$data["recipesrelated"] = each_json_decode($recipesrelated);

		$where3["a.id"] = $recipedetail['product'];

		$product_details = $this->db->select("a.*,b.title as sub_category,c.title as category")
										->from("products a")
										->join("products_sub_category b" , "a.products_sub_category_id=b.id")
										->join("products_category c" , "b.product_category_id=c.id")
										->where($where3)
										->order_by("order_by")
										->get()
										->result_array();
		$data["product_details"] = each_json_decode($product_details);

		
		// print_r($data["recipedetail"]);exit();

		$this->title = $data["recipedetail"]['title'];
		$this->template->set_class_name("recipes-detail");
		$this->_template("recipes-detail",$data);
	}

	public function services()
	{
		$data = null;

		$where = null;
		$where["flag"] = 0;
		$video_sub_sections = $this->db->select("*")
										->from("video_sub_section")
										->where($where)
										->get()
										->result_array();
		$data["video_sub_sections"] = each_json_decode($video_sub_sections);
		
		$this->title = "Services";
		$this->template->set_class_name("services");
		$this->_template("services",$data);
	}
	public function machines()
	{
		$data = null;
		
		$where = null;
		$where["flag"] = 0;
		$machines_category = $this->db->select("*")
										->from("machines_category")
										->where($where)
										->get()
										->result_array();
		$data["machines_category"] = each_json_decode($machines_category);


		// print_r($videom);
		// exit();


		$this->title = "Machines Solution";
		$this->template->set_class_name("machines");
		$this->_template("machines",$data);
	}
	public function products()
	{
		$data = null;
		
		$where = null;
		$where["flag"] = 0;
		$products_category = $this->db->select("*")
										->from("products_category")
										->where($where)
										->order_by("order_by")
										->get()
										->result_array();
		$data["products_category"] = each_json_decode($products_category);
		

		$this->title = "Products";
		$this->template->set_class_name("products");
		$this->_template("products",$data);
	}
	public function brand($link = '')
	{
		$data = null;
		
		
		$link = urldecode ($link) ;

		$where = null;
		$where["flag"] = 0;
		$where["link"] = $link;
		$brand = $this->db->select("*")
										->from("brands")
										->where($where)
										->get()
										->row_array();
		$data["brand"] = json_decode_table($brand, language());

		$where = null;
		$where["a.flag"] = 0;
		$where["brand_id"] = $data["brand"]["id"];
		$products = $this->db->select("a.*,b.title as sub_category,c.title as category")
										->from("products a")
										->join("products_sub_category b" , "a.products_sub_category_id=b.id")
										->join("products_category c" , "b.product_category_id=c.id")
										->where($where)
										->order_by("order_by")
										->get()
										->result_array();
		$data["products"] = each_json_decode($products);
		
		$where = null;
		$where["a.flag"] = 0;
		$where["brand_id"] = $data["brand"]["id"];
		$machines = $this->db->select("a.*,b.title as category")
											->from("machines a")
											->join("machines_category b" , "a.machines_category_id=b.id")
											->where($where)
											->get()
											->result_array();
		$data["machines"] = each_json_decode($machines);
		
		$this->title = $data["brand"]["title"];
		$this->template->set_class_name("brand");
		$this->_template("brand",$data);	
	}


	public function distributors()
	{
		$data = null;
		
		$where = null;
		$where["flag"] = 0;
		$distributors_category = $this->db->select("*")
										->from("distributors_category")
										->where($where)
										->order_by("order_by")
										->get()
										->result_array();
		$data["distributors_category"] = each_json_decode($distributors_category);

		$distributors_sub_category = $this->db->select("*")
										->from("distributors_sub_category")
										->where($where)
										->order_by("title ASC")
										->get()
										->result_array();
		$data["distributors_sub_category"] = each_json_decode($distributors_sub_category);

		$distributors = $this->db->select("*")
										->from("distributors")
										->where($where)
										->order_by("order_by")
										->get()
										->result_array();
		$data["distributors"] = each_json_decode($distributors);


		$this->title = "Distributors";
		$this->template->set_class_name("distributors");
		$this->_template("distributors",$data);
	}
	public function contact_us()
	{
		$data = null;
		$this->title = "Contact Us";
		$this->template->set_class_name("contact-us");
		$this->_template("contact-us",$data);
	}
	public function product()
	{
		$data = null;

		$where = null;
		$where["flag"] = 0;
		$mproducts = $this->db->select("*")
										->from("mproducts")
										->where($where)
										->get()
										->result_array();
		$data["mproducts"] = each_json_decode($mproducts);
		
		$this->title = "Product";
		$this->template->set_class_name("product");
		$this->_template("product",$data);
	}
	public function privacy_policy()
	{
		$data = null;
		$this->title = "Privacy Policy";
		$this->template->set_class_name("privacy-policy");
		$this->_template("privacy-policy",$data);
	}
	public function privacy_policy_detail()
	{
		$data = null;
		$this->title = "Privacy Policy Detail";
		$this->template->set_class_name("privacy-policy-detail");
		$this->_template("privacy-policy-detail",$data);
	}
	public function tnc()
	{
		$data = null;
		$this->title = "Terms & Conditions";
		$this->template->set_class_name("tnc");
		$this->_template("tnc",$data);
	}
	public function sitemap()
	{
		$data = null;
		$this->title = "Sitemap";
		$this->template->set_class_name("sitemap");
		$this->_template("sitemap",$data);
	}
	public function search()
	{
		$data = null;
		
		$value = $this->input->get("value", true);
		$type = $this->input->get("type", true);

		
		


		$where = null;
		$where["a.flag"] = 0;
		$where["(a.title like '%".$this->db->escape_str($value)."%' or a.excerpt like '%".$this->db->escape_str($value)."%')"] = null;

		$products = $this->db->select("a.*,b.title as sub_category,c.title as category")
										->from("products a")
										->join("products_sub_category b" , "a.products_sub_category_id=b.id")
										->join("products_category c" , "b.product_category_id=c.id")
										->where($where)
										->get()
										->result_array();



		$where = null;
		$where["a.flag"] = 0;
		$where["(a.title like '%".$value."%' or a.content like '%".$value."%')"] = null;
		$machines = $this->db->select("a.*,b.title as category")
										->from("machines a")
										->join("machines_category b" , "a.machines_category_id=b.id")
										->where($where)
										->get()
										->result_array();
		
		
		switch ($type) {
			case 'products':
				$machines = null;		
				break;
			case 'machines':	
				$products = null;
				break;
			
			
		}
		
		$data["products"] = null;
		$data["machines"] = null;

		if ($value){
			$data["products"] = ($products) ? each_json_decode($products) : null;	
			$data["machines"] = ($machines) ? each_json_decode($machines) : null;
		}




		$this->title = "Search";
		$this->template->set_class_name("search");
		$this->_template("search",$data);
	}
	public function lang($lang='en')
	{
		set_session("lang", $lang);
		redirect($_SERVER['HTTP_REFERER'],'refresh');
	}
	public function check_session()
	{
		echo get_session("lang");
	}
	public function error404($value='')
	{
		$data = null;
		$this->load->view($this->dir . "error404", $data, FALSE);
	}
}


