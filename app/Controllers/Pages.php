<?php

namespace App\Controllers;

class Pages extends BaseController
{
	public function view($page = 'about_us')
	{
		if (! is_file(APPPATH . 'Views/pages/' . $page . '.php')) {
			// Whoops, we don't have a page for that!
			throw new \CodeIgniter\Exceptions\PageNotFoundException($page);
		}
		$data['title'] = ucfirst($page); // Capitalize the first letter
		$data = [
            'title' => 'About Us',
			'page' => 'about_us',
            ];
		echo view('user_template', $data);
	}
}
