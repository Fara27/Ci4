<?php

namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		$data = [
			'title' => 'Home Page',
			'page' => 'home'
		];
		echo view('user_template', $data);
		
	}
}
