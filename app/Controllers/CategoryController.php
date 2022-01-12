<?php 

namespace App\Controllers;

use  App\Models\Category;

use App\Controllers\BaseController;

    class CategoryController extends BaseController
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
                if($_POST)
                {
                    $cat_name = $this->request->getPost('cat_name');
                    $cat_description = $this->request->getPost('cat_description');
                    if(! $this->validate([
                        'cat_name' => 'required',
                        'cat_description' => 'required',
                        ])){		
                            $session->setFlashdata('msg', 'Add Category name and description');								
                        } 
                        else 
                        {
                            
                            try
                            {
                            
                               // $cuTime = date('d M Y H:i:s');
                                
                                $data = [
                                    'cat_name' => $cat_name,
                                    'cat_description' => $cat_description, 
                                ];
                                //echo "<pre>";
                                //print_r($this->request->getVar());
                                //print_r($this->request->getPost());
                                //print_r($data);
                                //echo "</pre>";
                                    
                                    
                                    if($model->insert($data)){
                                		echo "<h4>Data Inserted Successfully";
                                    }else{
                                    	echo "<h4>Data was not inserted</h4>";
                                	}
                            } 
                            catch(\Exception $e)
                            {
                            die($e->getMessage());
                            }
                    
                        }//Closing if(! $validation){else}
                }//Closing if($_POST)
                else
                {
                    
                }
            } //Closing if(! $session)	
            
            $data = [
                'title' => 'Manage Product Categories',
                'slogan' => 'A simple way to manage your Inventory and  Sales ',
                'u_id' => $session->user_id,
                'u_name' => $session->user_name,
                'u_email' => $session->user_email,  
                'cat_name' => $this->request->getPost('cat_name'),
                'cat_description' => $this->request->getPost('cat_name'),
                'viewCat' => $model->findAll(),
                ];
                
                echo view('layouts/admin_header', $data);
                echo view('category/home');
                echo view('layouts/footer');			

        }//Closing Category::Index function 

        public function edit($id)
        {
            
            $session = \Config\Services::session();
            if(! $session){
                return $this->response->redirect(base_url('/user/login'));
                echo "User Session is not set";
            } 
            else 
            {
                //$request = \Config\Services::request();
                //$method = $request->getMethod(TRUE);
        

               //$cat_id = $request->getUri();
                //var_dump($model);
              
                $model = new \App\Models\Category() ;
                
                $data = [
                    'title' => 'Edit Product Categories',
                    'slogan' => 'A simple way to manage your Inventory and  Sales ',
                    'u_id' => $session->user_id,
                    'u_name' => $session->user_name,
                    'u_email' => $session->user_email,  
                    'viewCat' => $model->find($id),
                    
                    ];
                    //echo "<pre>";
                    //print_r($this->request->getVar());
                    //print_r($this->request->getPost());
                    //print_r($data);
                    //echo "</pre>";
                    
                    echo view('layouts/admin_header', $data);
                    echo view('category/edit');
                    echo view('layouts/footer');			
    
            }
        }

        public function update($id)
        {
            echo 'Update Category';
            $session = \Config\Services::session();
            $model = new Category();
            if(! $session)
            {
                return $this->response->redirect(base_url('/user/login'));
                echo "User Session is not set";
            } 
            else
            {
                $data = ['viewCat' => $model->find($id)];
             
                echo "<pre>";
                //print_r($this->request->getVar());
                $dataToEdit = $this->request->getPost();
                print_r($this->request->getPost());
                print_r($data);
                echo "</pre>";
                echo $dataToEdit['cat_name'];
                if(! $this->validate([
                    'cat_name' => 'required',
                    'cat_description' => 'required',
                ]))
                {
                    $data = [
                        'msg' => 'Empty Form field',
                        'title' => 'Edit Product Categories',
                        'slogan' => 'A simple way to manage your Inventory and  Sales ',
                        'u_id' => $session->user_id,
                        'u_name' => $session->user_name,
                        'u_email' => $session->user_email,  
                        'viewCat' => $model->find($id),
                    ] ;
                    $session->setFlashdata('msg', 'Category name or description is empty');	
                    echo view('layouts/admin_header', $data);
                    echo view('category/edit');
                    echo view('layouts/footer');		

                }
                else
                {
                   echo "The form fields are not empty";
                   $data = [
                        'cat_name' => $this->request->getPost('cat_name'),
                        'cat_description' => $this->request->getPost('cat_description'),
                   ];
                   $model->set('cat_name', $this->request->getPost('cat_name'));
                   $model->set('cat_description', $this->request->getPost('cat_description'));
                   $model->where('cat_id', $this->request->getPost('cat_id')); 
                   $model->update();
                
                 // var_dump($model->update())   ;
                        echo "Product Category Updated";
                        $link = base_url('/category');
        
                        return $this->response->redirect($link);
                  
                  
                }
                    
            } 


        }

        public function delete($cat_id)  
        {
         
           $session = \Config\Services::session();   
           
            if(! $session){
                return $this->response->redirect(base_url('/user/login'));
                echo "User Session is not set";
            } 
            else 
            {
                  $model = new \App\Models\Category() ;
                  $data = ['viewCat' => $model->find($cat_id)];

                  $request = \Config\Services::request();
                  $uri = $request->uri;
                  $uri = $uri->getSegment(3);

                //$this->request->getVar()
                  //var_dump($uri);
                    //echo $cat_id ;
                    echo "<pre>";
                   // print_r($this->request->getVar());
                    //print_r($this->request->getPost());
                    //print_r($uri);
                    echo "</pre>";
                    $data = [
                        'msg' => 'Empty Form field',
                        'title' => 'Delete Product Categories',
                        'slogan' => 'A simple way to manage your Inventory and  Sales ',
                        'u_id' => $session->user_id,
                        'u_name' => $session->user_name,
                        'u_email' => $session->user_email,  
                        'viewCat' => $model->find($cat_id),
                    ] ;
                    if($this->request->getPost('cat_id'))
                    {
                       
                        $model->where('cat_id', $this->request->getPost('cat_id')); 
                        $model->delete();

                        $link = base_url('/category');
                        return $this->response->redirect($link);

                    } 
                    else 
                    {
                        
                    }

                    $session->setFlashdata('msg', 'Are you sure you want to delete this category?');	
                    echo view('layouts/admin_header', $data);
                    echo view('category/delete');
                    echo view('layouts/footer');		

            }
        } 


    }