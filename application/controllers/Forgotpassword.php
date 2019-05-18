<?php

	defined('BASEPATH') OR exit('No direct script access allowed');
	date_default_timezone_set("Asia/Kolkata");
	ini_set('memory_limit', '-1');
	class Forgotpassword extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
		}

		public function viewforgetpassword()
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
		}
	}

?>