<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set("Asia/Kolkata");
class Changepass extends CI_Controller {

	function __construct()
	{
		parent::__construct();	
		$checkuservars = $this->session->userdata;
		if(!isset($checkuservars['is_logged_in']) && $checkuservars['is_logged_in'] != 1)
		{
			redirect('login/logout');
		}
	}
	public function index()
	{
		$data = array();
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
		/////////// Notification and Order
			$checkuservars = $this->session->userdata;
			$user_id = isset($checkuservars['userid']) ? $checkuservars['userid'] : '';
			$this->load->model('Notification_model');
			$rs = $this->Notification_model->count_unread_notifications($user_id);
			$data['nofication_count'] = isset($rs) ? count($rs) : 0;

			$this->load->model('Cartmanagement');
			$rsCart = $this->Cartmanagement->countMycart($user_id);
			$data['cart_count'] = isset($rsCart[0]['C']) ? $rsCart[0]['C'] : 0;

			$data['user_id'] = $user_id;
			$data['notifications'] = $rs;
			/////////// Notification and Order

		$this->load->view('changepassword',$data);
	}
}
