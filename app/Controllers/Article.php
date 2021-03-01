<?php namespace App\Controllers;

class Article extends BaseController
{
	public function index()
	{
        $data['articles'] = $this->db->table("articles")->where("flag", 0)->orderBy('publish_date', 'DESC')->get()->getResultArray();
        return view('article/index', $data);
	}

    public function single($slug='')
	{
        $data['article'] = $this->db->table("articles")->where(['flag' => 0, 'slug' => $slug])->get()->getRowArray();
        $data['articles'] = $this->db->table("articles")->where(['flag' => 0, 'slug !=' => $slug])->orderBy('publish_date', 'DESC')->limit(2)->get()->getRowArray();

        if ($data['article'] === NULL) return redirect()->to(base_url('404'));
        $data['article'] = json_decode_table($data['article'], default_language());
        
        return view('article/single', $data);
	}
}
