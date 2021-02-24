<?php namespace App\Controllers;

class Article extends BaseController
{
	public function index()
	{
        return view('article/index');
	}

    public function single()
	{
        return view('article/single');
	}
}
