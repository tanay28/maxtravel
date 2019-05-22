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
				if(isset($xx->status) && $xx->status == 'ACTIVE')
				{
					echo($xx->userstype);
				}
				if(isset($xx->status) && $xx->status == 'INACTIVE')
				{
					echo('inactive');
				}

			}else{
				//$this->session->set_flashdata('error', 'Enter Valid Email And Password!!');
				echo("");
			}

		}
		//$this->load->view('login');
	}
	public function login_after_activation()
	{
		$this->load->view('login_after_activation');
	}
	
}
