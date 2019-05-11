<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set("Asia/Kolkata");
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
        redirect('login');
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

			$this->load->model('Registrationlogin');
			$xx = $this->Registrationlogin->validateLogin($_POST['txtEmail'],$_POST['txtPassword']);
			/*echo "<pre>";
			var_dump($xx);
			die;*/
			if(count($xx)>0){

				//////////////
				$data123 = array(
					'userid' => $xx->id,
             		'username' => $xx->name,
             		'useremail' => $xx->email,
             		'usertype' => $xx->userstype,
             		'is_logged_in'=>1
             	);
             	// $userdata = array('userid' => $xx->id,'usertype' => $xx->userstype);
             	// $this->session->set_userdata('userdata',$userdata);
            	$this->session->set_userdata($data123);
            	//echo "loggedIn";
            	//////
				$data['status'] = 'true';
				$data['message'] = $xx;

				// Redirect 
				// var_dump($xx->userstype);
				// die;
				if($xx->userstype=='SUPERADMIN' || $xx->userstype=='AGENT' || $xx->userstype=='ADMIN' || $xx->userstype=='ACCOUNT'){
					redirect('dashboard');
				}

			}else{
				$this->session->set_flashdata('error', 'Enter Valid Email And Password!!');
			}

		}
		$this->load->view('login');
	}
	public function showresetpassword()
	{

	}
	public function viewforgetpassword()
	{
		$data = array();
		if(isset($_POST['txtEmail']) && isset($_POST['txtDOB']))
		{
			$this->load->model('Registrationlogin');
			$chk = $this->Registrationlogin->validateUser($_POST['txtEmail'],date('Y-m-d',strtotime($_POST['txtDOB'])));
			if($chk)
			{
				$Arr = array('email' => $_POST['txtEmail'],'dob' => date('Y-m-d',strtotime($_POST['txtDOB'])));
				$data['user'] = $Arr;
				$this->load->view('resetpassword',$data);
				return;
			}
			else
			{
				$this->session->set_flashdata('error', 'Enter Valid Email Or Date of Birth..!!');
			}	
		}
		$this->load->view('forgetpassword');
	}
	public function resetpassword()
	{
		if(isset($_POST['txtNew']) && isset($_POST['txtConfirm']) && isset($_POST['hiddEmail']) && isset($_POST['hiddDOB']))
		{
			$this->load->model('Registrationlogin');
			if($_POST['txtNew'] != $_POST['txtConfirm'])
			{
				$this->session->set_flashdata('error', 'Mismatch Password..!!');
				$Arr = array('email' => $_POST['hiddEmail'],'dob' => date('Y-m-d',strtotime($_POST['hiddDOB'])));
				$data['user'] = $Arr;
				$this->load->view('resetpassword',$data);
			}
			else
			{
				$chk = $this->Registrationlogin->resetPassword($_POST['hiddEmail'],date('Y-m-d',strtotime($_POST['hiddDOB'])),$_POST['txtNew']);
				if($chk)
				{
					$this->session->set_flashdata('success', 'Password reset successful..');
					redirect('login');	
				}
			}
		}
	}
	
}
