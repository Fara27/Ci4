<?php

namespace App\Controllers;

class Pages extends BaseController
{
	public function about()
	{
		$data = [
            'title' => 'About Us',
			'page' => 'about_us',
            ];
		return view('user_template', $data);
	}
}
