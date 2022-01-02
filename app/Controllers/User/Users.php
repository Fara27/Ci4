<?php

namespace App\Controllers;

class Users extends BaseController
{
	public function create()
	{
		$data = [
			'title' => 'Users Home Page',
			'page' => 'home'
		];
		//echo view('user_template', $data);
		echo view('layouts/header', $data);
		echo view('user/home');
		echo view('layouts/footer');
		
	}

}
