<?php

	defined('BASEPATH') OR exit('No direct script access allowed');
	date_default_timezone_set("Asia/Kolkata");
	ini_set('memory_limit', '-1');
	class Forgotpassword extends CI_Controller
	{

		public function __construct()
		{
			parent::__construct();
			$checkuservars = $this->session->userdata;
			if(isset($checkuservars['is_logged_in']) && $checkuservars['is_logged_in'] == 1)
			{
				redirect('home');
			}
		}
		private function get_user_first_name($id)
		{
			$this->load->model('Usermanagement');
			$rs = $this->Usermanagement->get_firstName($id);
			if(isset($rs[0]['first_name'])) return $rs[0]['first_name'];
			return '';
		}
		private function CreateDates()
		{
			$start_date = date('Y-m-d H:i:s');
			$end_date = date("Y-m-d H:i:s", strtotime('+2 hours', strtotime($start_date)));
			return array('start_date' => $start_date,'end_date' => $end_date);
		}
		public function viewforgetpassword()
		{
			$data = array();
			//echo isset($_POST['txtEmail']) ? $_POST['txtEmail'] : '';
			$user_first_name = '';
			if(isset($_POST['txtEmail']))	
			{
				$this->load->model('Usermanagement');
				$chk = $this->Usermanagement->validateUser($_POST['txtEmail']);
				//var_dump($chk);
				if($chk != false)
				{
					$user_first_name = $this->get_user_first_name($chk);
					//$this->session->set_userdata('email',$_POST['txtEmail']);
					$this->session->set_userdata('first_name',$user_first_name);

					//----------------- Generate code -------------------//
					$code = rand(0,99)."_mhd_".$_POST['txtEmail']; 
					//---------------------- END -----------------------//

					//------- Log Forgot password details -----------//
					$dates = $this->CreateDates();
					$arrData = array(
						'user_id'    => $chk,
						'user_code'  => md5($code),
						'status'     => 'ACTIVE',
						'start_date' => $dates['start_date'],
						'end_date'   => $dates['end_date']
					);
					$chk = $this->Usermanagement->log_forgot_password_details($arrData);
					//------------------- END ----------------------//
					if($chk >0)
					{
						//------------ Email function --------------//
						$this->load->library('email');
						$from_email = "tmtanay56@gmail.com";
						//$to_email = "sudiptagraphics@gmail.com"; // this email for testing purpose
						$to_email = $_POST['txtEmail']; // this is the actual email to send mail
						$this->email->from($from_email, 'Tanay'); 
	         			$this->email->to($to_email);
	         			$this->email->subject('Password reset Link');
	         			//$this->email->set_mailtype("html");
	         			$this->email->set_header('Content-type', 'text/html');
	         			$this->load->library('custom_email');
	         			$msg = $this->custom_email->forgot_password($code,$to_email,$user_first_name);
	         			$this->email->message($msg);
	         			$chkk = $this->email->send();
						//----------------- END -------------------//
					}
					echo 'success';
					//echo $user_first_name;
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
		private function status_update($status)
		{
			$user_id = '';
			if($this->session->has_userdata('user_id'))
			{
				$user_id = $this->session->userdata('user_id');
				$ck = $this->Usermanagement->update_status($user_id,$status);	
			}
			else
			{
				$ck = $this->Usermanagement->update_status($user_id,$status);	
			}
		}
		public function viewresetpassword()
		{
			//$email = base64_decode($this->uri->segment(3)); // actual data for activation
			//$code  = $this->uri->segment(4); // actual data for activation

			$email = $this->uri->segment(3); // testing data
			$code  = $this->uri->segment(4); // testing data
			//$this->session->set_userdata('email',$email);
			$this->load->model('Usermanagement');
			$current_date = date('Y-m-d H:i:s');
			//------------ Validate URL data ------------//
			$chk = $this->Usermanagement->validate_urlData($code,$current_date);
			//------------------- END ------------------//
			if($chk != false)
			{
				$this->session->set_userdata('user_id',$chk);
				$this->load->view('resetpassword');
			}
			else
			{
				$this->status_update('EXPIRED');
				$this->load->view('forgotpassword_expired');
			}
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
						$this->status_update('APPROVED');
						$this->session->set_flashdata('success', 'Password reset successful..');
						$this->session->sess_destroy();
						redirect('home');
					}
				}
			}
		}
		public function show_password_reset_confirmation()
		{
			// $data = array();
			// $name = $this->uri->segment(3);
			// $data['name'] = $name;
			$this->load->view('forgot_password_mail_confirmation');
		}
	}

?>