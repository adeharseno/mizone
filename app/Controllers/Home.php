<?php namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		$agent = $this->request->getUserAgent();
		// var_dump($agent->isMobile());

		$data['sliders'] = $this->db->table("slider")->where("flag", 0)->get()->getResultArray();
		$data['products'] = $this->db->table("mproducts")->where("flag", 0)->get()->getResultArray();
		$data['articles'] = $this->db->table("articles")->where("flag", 0)->limit(3)->orderBy('publish_date', 'DESC')->get()->getResultArray();
		$data['events'] = $this->db->table("events")->where("flag", 0)->limit(3)->orderBy('publish_date', 'DESC')->get()->getResultArray();
		
		if( $agent->isMobile() ){
			// var_dump($data); exit();
// 			return view('mobile/index', $data);
			return view('mobile/index', $data, ['cache' => 6048000, 'cache_name' => 'home_mobile']);
		}
		else{
// 			return view('desktop/index', $data);
			return view('desktop/index', $data, ['cache' => 6048000, 'cache_name' => 'home_desktop']);
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
	
	public function product_all(){
	    $products = $this->db->table("mproducts")->where("flag", 0)->get()->getResultArray();
	    
	    ob_start();
	    if(isset($products) && count($products) > 0 ): foreach($products as $p): $value = json_decode_table($p, default_language()); ?>
        <div class="slide-item is-mobile" style="background: url(<?php echo image_get_src($value["bg_m"]) ?>) no-repeat center center;">
          <div class="container-mz slide-menu">
            <div class="row aligntment f-100">
              <div class="col-lg-5 col-ipd">
                <div class="section-text">
                  <img src="<?php echo image_get_src($value["varian"]) ?>" class="img-text size-act" alt="">
                  <h3 class="sub-olo mb-0"><?php echo $value['subtitle']; ?></h3>
                </div>
              </div>
              <div class="col-lg-7 col-ipd">
                  <div class="product-img">
                    <img src="<?php echo image_get_src($value["content_m"]) ?>" class="img-fluid" alt="">
                  </div>
              </div>
            </div>
            <div class="view-content">
              <a href="#" class="btn btn-primary btn-view">VIEW PRODUCT</a>
              <div class="is-view-content">
                <p><?php echo $value['content'];?> <br> <?php echo $value['sabi']; ?> <?php echo $value['sabi_next'];?></p>
                <button class="btn btn-primary btn-block mt-4 close-view">CLOSE DETAIL</button>
              </div>
            </div>
          </div>
        </div>
      <?php endforeach; endif;
      
      $data = ob_get_contents();
        ob_end_clean();
        echo json_encode( $data );
        exit();
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
