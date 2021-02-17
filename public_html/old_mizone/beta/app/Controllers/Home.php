<?php namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		$agent = $this->request->getUserAgent();
		// var_dump($agent->isMobile());

		$data['sliders'] = $this->db->table("slider")->where("flag", 0)->get()->getResultArray();
		$data['products'] = $this->db->table("mproducts")->where("flag", 0)->get()->getResultArray();
		
		if( $agent->isMobile() ){
			// var_dump($data); exit();
			return view('mobile/index', $data);
		}
		else{
			return view('desktop/index', $data);
		}
	}
	
	public function product($slug='')
	{
		$agent = $this->request->getUserAgent();
		$data['slug'] = $slug;
		$data['products'] = $this->db->table("mproducts")->where("flag", 0)->get()->getResultArray();
		$data['product'] = $this->db->table("mproducts")->where(['flag' => 0, 'slug' => $slug])->get()->getRowArray();
		// var_dump($data);
		
		if( $agent->isMobile() )
			return redirect('/');
		else
			return view('desktop/product', $data);
	}

	public function tab()
	{
		$agent = $this->request->getUserAgent();
		// var_dump($agent->isMobile());
		
		if( $agent->isMobile() )
			return redirect('/');
		else
			return view('desktop/product-tab');
	}
}
