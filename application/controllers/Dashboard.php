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
		$data = array();
		/////////// Notification and Order
		$checkuservars = $this->session->userdata;
		$user_id = isset($checkuservars['userid']) ? $checkuservars['userid'] : '';
		$this->load->model('Notification_model');
		$rs = $this->Notification_model->count_unread_notifications($user_id);
		$data['nofication_count'] = isset($rs) ? count($rs) : 0;
		$data['user_id'] = $user_id;
		$data['notifications'] = $rs;
		/////////// Notification and Order
		$this->load->view('dashboard',$data);
	}
	public function changePassword()
	{
		$data = array();
		/////////// Notification and Order
		$checkuservars = $this->session->userdata;
		$user_id = isset($checkuservars['userid']) ? $checkuservars['userid'] : '';
		$this->load->model('Notification_model');
		$rs = $this->Notification_model->count_unread_notifications($user_id);
		$data['nofication_count'] = isset($rs) ? count($rs) : 0;
		$data['user_id'] = $user_id;
		$data['notifications'] = $rs;
		/////////// Notification and Order
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
		$this->load->view('changepassword',$data);
	}
}
