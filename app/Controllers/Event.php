<?php namespace App\Controllers;

class Event extends BaseController
{
	public function index()
	{
        $data['events'] = $this->db->table("events")->where("flag", 0)->orderBy('publish_date', 'DESC')->get()->getResultArray();
        return view('event/index', $data);
	}

    public function single($slug='')
	{
        $data['event'] = $this->db->table("events")->where(['flag' => 0, 'slug' => $slug])->get()->getRowArray();
        $data['events'] = $this->db->table("events")->where(['flag' => 0, 'slug !=' => $slug])->orderBy('publish_date', 'DESC')->limit(2)->get()->getResultArray();

        if ($data['event'] === NULL) return redirect()->to(base_url('404'));
        $data['event'] = json_decode_table($data['event'], default_language());
        return view('event/single', $data);
	}
}
