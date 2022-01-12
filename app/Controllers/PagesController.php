<?php

namespace App\Controllers;

class PagesController extends BaseController
{
	public function index()
	{
		$data = [
			'title' => 'Pages Home Page',
			'page' => 'home'
		];
		//echo view('user_template', $data);
		echo view('layouts/header', $data);
		echo view('pages/home', $data);
		echo view('layouts/footer', $data);
		
	}

	public function view($page = 'about')
	{
		if (! is_file(APPPATH . 'Views/pages/' . $page . '.php')) {
			// Whoops, we don't have a page for that!
			throw new \CodeIgniter\Exceptions\PageNotFoundException($page);
		}
	
		$data = [
            'title' =>  ucfirst($page),
		
            ];

		//echo view('user_template', $data);
		echo view('layouts/header', $data);
		echo view('pages/'. $page , $data);
		echo view('layouts/footer', $data);
	}
}
