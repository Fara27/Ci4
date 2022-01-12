<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Product;

class ProductController extends BaseController
{
	public function index()
	{
		
		$session = \Config\Services::session();
		$model = new Product();
		if(! $session){
			return $this->response->redirect(base_url('/user/login'));
			echo "User Session is not set";
		} else {
			
	
        $data = [
			'title' => 'Products ',
			'products' => $model->findAll() ,
			'u_id' => $session->user_id,
			'u_name' => $session->user_name,
			'u_email' => $session->user_email,  
		]; 
		echo view('layouts/admin_header', $data);
		echo view('product/home');
		echo view('layouts/footer');
		}
	}



}
