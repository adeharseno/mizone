<?php namespace App\Controllers;

class Team extends BaseController
{
	public function index()
	{
		$data['different_class'] = true;
		
        return view('team/index');
	}
}
