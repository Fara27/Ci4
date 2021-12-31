<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class User extends BaseController
{
	public function index()
	{
        $data = [
            'title' => 'News archive',
            ];
		return view('user/dashboard', $data);
	}

    public function view($email = null)
    {
        $model = new UserModel();
        $data['email'] = $model->getUser($email);
    }
}
