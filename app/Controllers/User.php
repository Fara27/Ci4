<?php namespace App\Controllers;

use App\Models\UserModel;

class User extends BaseController
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

    public function view($email = null)
    {
        $model = new UserModel();
        $data['email'] = $model->getUser($email);
        	//echo view('user_template', $data);
		echo view('layouts/header', $data);
		echo view('user/view');
		echo view('layouts/footer');
    }
}
