<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set("Asia/Kolkata");
ini_set('memory_limit', '-1');
class Login extends CI_Controller {


	function __construct()
	{
		parent::__construct();
		/*$checkuservars = $this->session->userdata;
        if(isset($checkuservars['usertype'])){
           redirect('site/logout/'); 
        }*/
	}


	public function Logout()
    {
        $this->session->sess_destroy();
        redirect('home');
    }

	public function index()
	{
		/*echo "<pre>";
		var_dump($_POST['email']);
		var_dump($_POST['password']);
		var_dump(md5($_POST['password']));
		die;*/
		$data = array();
		if(isset($_POST['txtEmail']) && isset($_POST['txtPassword'])){


			$this->load->model('Usermanagement');
			$xx = $this->Usermanagement->validateLogin($_POST['txtEmail'],$_POST['txtPassword']);
			/*echo "<pre>";
			var_dump($xx);
			die;*/
			if(count($xx)>0){

				//////////////
				$data123 = array(
					'userid' => $xx->id,
             		'useremail' => $xx->email,
             		'usertype' => $xx->userstype,
             		'is_logged_in'=>1
             	);
            	$this->session->set_userdata($data123);
            	//echo "loggedIn";
            	//////
				$data['status'] = 'true';
				$data['message'] = $xx;

				// if($xx->userstype=='SUPERADMIN' || $xx->userstype=='AGENT' || $xx->userstype=='ADMIN' || $xx->userstype=='ACCOUNT'){
				// 	redirect('dashboard');
				// }
				echo($xx->userstype);

			}else{
				//$this->session->set_flashdata('error', 'Enter Valid Email And Password!!');
				echo("");
			}

		}
		//$this->load->view('login');
	}
	/*public function viewforgetpassword()
	{
		$data = array();
		//echo isset($_POST['txtEmail']) ? $_POST['txtEmail'] : '';
		if(isset($_POST['txtEmail']))	
		{
			$this->load->model('Usermanagement');
			$chk = $this->Usermanagement->validateUser($_POST['txtEmail']);
			//var_dump($chk);
			if($chk)
			{
				// $Arr = array('email' => $_POST['txtEmail']);
				// $data['user'] = $Arr;
				// $this->load->view('resetpassword',$data);
				$this->session->set_userdata('email',$_POST['txtEmail']);
				echo 'success';
				return;
			}
			else
			{
				// $this->session->set_flashdata('error', 'Enter Valid Email..!!');
				$this->session->sess_destroy();
				echo 'error';
				return;
			}
		}
		$this->load->view('forgetpassword');
	}
	public function resetpassword()
	{
		if(isset($_POST['txtNew']) && isset($_POST['txtConfirm']) && isset($_POST['txtEmail']))
		{
			
			$this->load->model('Usermanagement');
			if($_POST['txtNew'] != $_POST['txtConfirm'])
			{
				$this->session->set_flashdata('error', 'Mismatch Password..!!');
				$this->load->view('resetpassword');
			}
			else
			{
				$chk = $this->Usermanagement->resetPassword($_POST['txtEmail'],$_POST['txtNew']);
				if($chk)
				{
					$this->session->set_flashdata('success', 'Password reset successful..');
					$this->session->sess_destroy();
					redirect('home');
				}
			}
		}
		$this->load->view('resetpassword');
	}*/
	
}
