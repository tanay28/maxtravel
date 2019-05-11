<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set("Asia/Kolkata");
class Dashboard extends CI_Controller {

	function __construct()
	{

		parent::__construct();

		$checkuservars = $this->session->userdata;
                
        if((!isset($checkuservars['usertype']) || $checkuservars['usertype']!="SUPERADMIN") && (!isset($checkuservars['usertype']) || $checkuservars['usertype']!="ADMIN") && (!isset($checkuservars['usertype']) || $checkuservars['usertype']!="AGENT"))
        {
         redirect('login/logout/'); 
        }	
	}
	public function index()
	{
		$data = array();
		$this->load->view('dashboard',$data);
	}
	public function changePassword()
	{
		if(isset($_POST['txtNew']) && isset($_POST['txtConfirm']))
		{
			$this->load->model('Dashboard_model');
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
					$chk = $this->Dashboard_model->ChangePassword($checkuservars['userid'],$_POST['txtNew']);
					if($chk)
					{
						$this->session->set_flashdata('success', 'Password reset successful..');
						redirect('dashboard');	
					}	
				}
				
			}
		}
		$this->load->view('changepassword');
	}
}
