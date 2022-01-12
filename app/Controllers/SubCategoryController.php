<?php 

namespace App\Controllers;

use  App\Models\SubCategory;
use  App\Models\Category;

use App\Controllers\BaseController;

    class SubCategoryController extends BaseController
    {
        public function index()
        {
            $session = \Config\Services::session();
            $model = new \App\Models\Category() ;
            if(! $session){
                return $this->response->redirect(base_url('/user/login'));
                echo "User Session is not set";
            } 
            else 
            {
                $data = [
                    'title' => 'Manage Product Sub-Categories',
                    'slogan' => 'A simple way to manage your Inventory and  Sales ',
                    'u_id' => $session->user_id,
                    'u_name' => $session->user_name,
                    'u_email' => $session->user_email,  
                    'cat_name' => $this->request->getPost('cat_name'),
                    'cat_description' => $this->request->getPost('cat_name'),
                    'viewCat' => $model->findAll(),
                    ];
                    
                    echo view('layouts/admin_header', $data);
                    echo view('subcategory/home');
                    echo view('layouts/footer');	
            }	
        }


    }

