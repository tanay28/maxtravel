<?php

	defined('BASEPATH') OR exit('No direct script access allowed');
	date_default_timezone_set("Asia/Kolkata");
	class Contactus extends CI_Controller
	{
		function __construct()
		{
			parent::__construct();
		}
		public function index()
		{
			$this->load->view('contactus');
		}
		public function savecontact()
		{
			$name = isset($_POST['txtName']) ? $_POST['txtName'] : '';
			$email = isset($_POST['txtEmail']) ? $_POST['txtEmail'] : '';
			$phone = isset($_POST['txtPhone']) ? $_POST['txtPhone'] : '';
			$msg = isset($_POST['txtMsg']) ? $_POST['txtMsg'] : '';
			$status = 'SENT';

			//------------------ Email Functions -----------------//
			$this->load->model('Contactus');
			$contactemail = $this->Contactus->get_email_contact();
			if($contactemail != '') $from_email = $contactemail;
			$this->load->library('email');
			$from_email = "tmtanay56@gmail.com";
			$to_email = "tmtanay56@gmail.com"; // this email for testing purpose
			$this->email->from($from_email, 'Tanay'); 
 			$this->email->to($to_email);
 			$this->email->subject('New User Contact Details'); 
 			//$this->email->set_mailtype("html");
 			$this->email->set_header('Content-type', 'text/html');
 			$this->load->library('custom_email');
 			$msg_mail = $this->custom_email->contact_info($name,$email,$phone,$msg);
 			$this->email->message($msg_mail);

 			$chkk = $this->email->send();
 			if(!$chkk) $status = 'FAILED';
			//------------------------- END ---------------------//
			$arr = array(
				'name'        => $name,
				'email'       => $email,
				'phone'       => $phone,
				'msg'         => $msg
				'mail_status' => $status,
				'created_at'  => date('Y-m-d H:i:s')
			);
			$chk = $this->Contactus->savecontactdetails($arr);

			if($chk)
			{
				$this->session->set_flashdata('success', 'Thank you.You will be contacted soon.');
			}
			redirect('contactus/index');
		}
	}
?>