<?php namespace App\Controllers;

use App\Models\Users;

class UserController extends BaseController
{
		
	public function index()
	{
		$session = \Config\Services::session();
		$model = new Users;
		if(! $session){
			return $this->response->redirect(base_url('/user/login'));
			echo "User Session is not set";
		} else {
			
	
        $data = [
			'title' => 'TRG Shop User',
			'user' => $model->findAll() ,
			'u_id' => $session->user_id,
			'u_name' => $session->user_name,
			'u_email' => $session->user_email,  
		]; 
		echo view('layouts/admin_header', $data);
		echo view('user/home');
		echo view('layouts/footer');
		}
		
		
	}

	public function register()
	{
		helper('form');
		$model = new Users();
	
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
			
			
				$model->save($data);
				if($model->save($data)){
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
			return $this->response->redirect(base_url('/user'));
		}
		
		
	}

	public function store() {
        $userModel = new Users();

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
		
				if ($userModel->insert($data)){
					echo 'Successful';
					//return redirect()->to('/login');
					return $this->response->redirect(site_url('/user/view'));
				} else {
					echo ' Failure to Insert';
				}
				//return $this->response->redirect(site_url('/user/view'));
			}
    }

    public function view($email = null)
    {
        $model = new Users();
		$data = [
			'title' => 'Users View',
			'page' => 'home',
			'user' => $model->findAll() ,
		];
        
        	//echo view('user_template', $data);
		echo view('layouts/header', $data);
		echo view('user/view');
		echo view('layouts/footer');
    } 

	public function login()
    {
       $model = new Users();
	  
		$data = [
			'title' => 'User Sign In',
			'page' => 'login',		
		];

        if(! $this->validate([
			'user' => 'required',
			'password' => 'required',
		])){

			echo view('layouts/header', $data);
			echo view('user/login');
			echo view('layouts/footer');
		} else {	
			
			$session = session();
			$email = $this->request->getVar('user');
        	$password = $this->request->getVar('password');
        
        	$data = $model->where('user_email', $email)->first();
			echo "<pre>";
			print_r($data);
			echo "</pre>";
			
				if($data){
					$pass = $data->user_pass;
					$authenticatePassword = FALSE;
					if($pass == $password){
						$authenticatePassword == TRUE ;
						echo 'User Authenticated';
						$ses_data = [
							'user_id' => $data->user_id,
							'user_name' => $data->user_name,
							'user_email' => $data->user_email,
							'user_type' => $data->user_type,
							'isLoggedIn' => TRUE
						];
						$session->set($ses_data);
						echo "<pre>";
						print_r($ses_data);
						echo "</pre>";
						return $this->response->redirect(base_url('/user'));
						//return redirect()->to('/user');
					} else{
						$session->setFlashdata('msg', 'Password is incorrect.');
						echo 'Password is incorrect';
						//return redirect()->to('/signin');
					}

				}else{
					$data = [
						'title' => 'User Sign In',
						'page' => 'login',
							
					];
					$session->setFlashdata('msg', 'Email does not exist.');
					
					echo view('layouts/header', $data);
					echo view('user/login');
					echo view('layouts/footer');
				}
			}
				 
			
    }

	public function confirm()
	{
		$model = new Users();
		$data = [
			'title' => 'User Sign In',
			'page' => 'login',
			'user' => $model->findAll(),
		];
		
		echo "Confirm user";
		echo view('user/login');
		echo view('layouts/footer');
	}

	public function update(){
        $userModel = new Users();
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
        $userModel = new Users();
        $data['user'] = $userModel->where('id', $id)->delete($id);
        return $this->response->redirect(site_url('/users/view'));
    }    

	public function logout()
	{
		$session = session();
		$session->destroy();
		return $this->response->redirect(base_url('user/login'));
	}

}
