<?php namespace App\Controllers;

class Article extends BaseController
{
	public function index()
	{
        $pager = \Config\Services::pager();
        $model = new \App\Models\Article();
        $search = $_GET['search'] ? $_GET['search'] : '';
        
        $data['articles'] = $model->where("flag", 0);
        if (!empty($search)) $data['articles'] = $model->like('title', $search, 'both')
                                                                ->orLike('content', $search);

        $data['articles'] = $model->orderBy('publish_date', 'DESC')->paginate(3, 'custom');
        $data['pager'] = $model->pager;
        return view('article/index', $data);
	}

    public function single($slug='')
	{
        $data['different_class'] = true;
        $data['article'] = $this->db->table("articles")->where(['flag' => 0, 'slug' => $slug])->get()->getRowArray();
        $data['articles'] = $this->db->table("articles")->where(['flag' => 0, 'slug !=' => $slug])->orderBy('publish_date', 'DESC')->limit(2)->get()->getResultArray();

        if ($data['article'] === NULL) return redirect()->to(base_url('404'));
        $data['article'] = json_decode_table($data['article'], default_language());
        $data['meta_desc'] = $data['article']['meta_desc'];
        return view('article/single', $data);
	}
}
