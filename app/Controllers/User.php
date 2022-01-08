<?php namespace App\Controllers;

use App\Models\UserModel;

class User extends BaseController
{
	public function index()
	{
		
		$model = new UserModel();
        $data = [
			'title' => 'Users Home Page',
			'user' =>  $model->getUser()->getResult(),
		];
		//echo view('user_template', $data);
		echo view('layouts/header', $data);
		echo view('user/home');
		echo view('layouts/footer');
		
	}

	public function register()
	{
		helper('form');
		$model = new UserModel();
		
        
		if(! $this->validate([
			'u_name' => 'required',
			'f_name' => 'required',
			'l_name' => 'required',
			'o_name' => 'required',
			'email' => 'required',
			'phone' => 'required',
			'pword' => 'required',
			'u_type' => 'required',
		])){	
			$data = [
			'title' => 'Users Registration',
			'page' => 'home'
			];	
			echo view('layouts/header', $data);
			echo view('user/create');
			echo view('layouts/footer');
		} else {
			
			try{
			//echo "<pre>";
			//print_r($this->request->getVar());
			//echo "</pre>";
			$cuTime = time();
			$data = [
				'user_name' => $this->request->getPost('u_name'),
				'user_fname' => $this->request->getPost('f_name'),
				'user_lname' => $this->request->getPost('l_name'),
				'user_oname' => $this->request->getPost('o_name'),
				'user_email' => $this->request->getPost('email'),
				'usr_phone' => $this->request->getPost('phone'),
				'user_pass' => $this->request->getPost('pword'),
				'user_type' => $this->request->getPost('u_type'),
				'user_reg_date' => $cuTime ,
				'updated_at' => $cuTime,
			];
			//echo "<pre>";
			////print_r($data);
			//echo "</pre>";
			
				$model->save($data);
				if($model->insert($data)){
					echo "<h4>Data Inserted Successfully";
				}else{
					echo "<h4>Data was not inserted</h4>";
				}
			} catch(\Exception $e){
				die($e->getMessage());
			}
			

			

			$data = [
				'title' => 'Users Registration',
				'page' => 'home'
			];
			echo view('layouts/header', $data);
			echo view('user/create');
			echo view('layouts/footer');
			//return redirect()->to('user');
			//return $this->response->redirect(base_url('/user'));
		}
		
		
	}

	public function store() {
        $userModel = new UserModel();

		if(! $this->validate([
			'u_name' => 'required',
			'f_name' => 'required',
			'l_name' => 'required',
			'o_name' => 'required',
			'email' => 'required',
			'phone' => 'required',
			'pword' => 'required',
			'u_type' => 'required',
		])){	
			$data = [
			'title' => 'Users Registration',
			'page' => 'home'
			];	
			echo view('layouts/header', $data);
			echo view('user/create');
			echo view('layouts/footer');
		} else {
			
				$data = [
					'user_name' => $this->request->getVar('u_name'),
					'user_fname' => $this->request->getVar('f_name'),
					'user_lname' => $this->request->getVar('l_name'),
					'user_oname' => $this->request->getVar('o_name'),
					'user_email' => $this->request->getVar('email'),
					'user_phone' => $this->request->getVar('phone'),
					'user_pass' => $this->request->getVar('pword'),
					'user_type' => $this->request->getVar('u_type'),
				];
				/* 
				echo "<pre>";
				print_r($this->request->getVar());
				echo "</pre>";
				echo "<pre>";
				print_r($data);
				echo "</pre>"; 
				*/

				//var_dump($userModel->insert($data)) ;
				if ($userModel->insert($data)){
					echo 'Successful';
					return redirect()->to('/login');
				} else {
					echo ' Failure to Insert';
				}
				//return $this->response->redirect(site_url('/user/view'));
			}
    }

    public function view($email = null)
    {
        $model = new UserModel();
		$data = [
			'title' => 'Users View',
			'page' => 'home',
			'user' => $model->getUser($email),
		];
        
        	//echo view('user_template', $data);
		echo view('layouts/header', $data);
		echo view('user/view');
		echo view('layouts/footer');
    } 

	public function login()
    {
        $model = new UserModel();
		$data = [
			'title' => 'User Sign In',
			'page' => 'login',
			'user' => $model->getUser(),
		];
        
        	//echo view('user_template', $data);
		echo view('layouts/header', $data);
		echo view('user/login');
		echo view('layouts/footer');
    }

	public function update(){
        $userModel = new UserModel();
        $id = $this->request->getVar('user_id');
        $data = [
            'uname' => $this->request->getVar('u_name'),
			'fname' => $this->request->getVar('f_name'),
			'lname' => $this->request->getVar('l_name'),
			'oname' => $this->request->getVar('o_name'),
            'email' => $this->request->getVar('email'),
			'phone' => $this->request->getVar('phone'),
			'pword' => $this->request->getVar('password'),
        ];
        $userModel->update($id, $data);
        return $this->response->redirect(site_url('/users/view'));
    }
 
    // delete user
    public function delete($id = null){
        $userModel = new UserModel();
        $data['user'] = $userModel->where('id', $id)->delete($id);
        return $this->response->redirect(site_url('/users/view'));
    }    



}
