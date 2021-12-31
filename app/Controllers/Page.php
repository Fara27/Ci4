<?php

namespace App\Controllers;

class Page extends BaseController
{
	public function about()
	{
		return view('user_template');
	}
}
