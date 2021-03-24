<?php namespace App\Controllers;

class Event extends BaseController
{
	public function index()
	{
        $pager = \Config\Services::pager();
        $model = new \App\Models\Event();
        $search = $_GET['search'] ? $_GET['search'] : '';
        
        $data['events'] = $model->where("flag", 0);
        if (!empty($search)) $data['events'] = $model->like('title', $search, 'both')
                                                                ->orLike('content', $search);

        $data['events'] = $model->orderBy('publish_date', 'DESC')->paginate(3, 'custom');
        $data['pager'] = $model->pager;
        return view('event/index', $data);
	}

    public function single($slug='')
	{
        $data['different_class'] = true;

        $data['event'] = $this->db->table("events")->where(['flag' => 0, 'slug' => $slug])->get()->getRowArray();
        $data['events'] = $this->db->table("events")->where(['flag' => 0, 'slug !=' => $slug])->orderBy('publish_date', 'DESC')->limit(2)->get()->getResultArray();

        if ($data['event'] === NULL) return redirect()->to(base_url('404'));
        $data['event'] = json_decode_table($data['event'], default_language());
        $data['meta_desc'] = $data['event']['meta_desc'];
        $data['meta_title'] = $data['event']['meta_title'];
        return view('event/single', $data);
	}
}
