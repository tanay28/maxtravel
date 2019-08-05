<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set("Asia/Kolkata");
class Dashboard extends CI_Controller {

	function __construct()
	{
		parent::__construct();	
	}
	public function index()
	{
		$this->load->view('dashboard');
	}
	public function changePassword()
	{
		if(isset($_POST['txtNew']) && isset($_POST['txtConfirm']))
		{
			$this->load->model('Usermanagement');
			if($_POST['txtNew'] != $_POST['txtConfirm'])
			{
				$this->session->set_flashdata('error', 'Mismatch Password..!!');
				redirect('dashboard');
			}
			else
			{
				$checkuservars = $this->session->userdata;
				if(isset($checkuservars['userid']))
				{
					$chk = $this->Usermanagement->ChangePassword($checkuservars['userid'],$_POST['txtNew']);
					if($chk)
					{
						$this->session->set_flashdata('success', 'Password changed successfully..');
						redirect('dashboard');	
					}	
				}
				
			}
		}
		$this->load->view('changepassword');
	}
}
