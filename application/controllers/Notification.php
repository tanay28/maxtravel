<?php

	defined('BASEPATH') OR exit('No direct script access allowed');
	date_default_timezone_set("Asia/Kolkata");
	class Notification extends CI_Controller
	{
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
			$data['page_access'] = 'INACTIVE';
			if(isset($_SESSION['usertype']) && $_SESSION['usertype']=='SUPERADMIN'){
				$data['page_access'] = 'ACTIVE';
			}
			/////////// Notification and Order
			$checkuservars = $this->session->userdata;
			$user_id = isset($checkuservars['userid']) ? $checkuservars['userid'] : '';
			$this->load->model('Notification_model');
			$rs = $this->Notification_model->count_unread_notifications($user_id);
			$data['nofication_count'] = isset($rs) ? count($rs) : 0;
			$data['user_id'] = $user_id;
			$data['notifications'] = $rs;
			/////////// Notification and Order
			$checkuservars = $this->session->userdata;
			$user_id = isset($checkuservars['userid']) ? $checkuservars['userid'] : '';
			$this->load->model('Notification_model');
			$data['queries'] = $this->Notification_model->get_all_queries($user_id);
			$this->load->view('listquery',$data);
		}
		public function notification_reset()
		{
			if(isset($_POST['user_id']) && isset($_POST['ct']))
			{
				$this->load->model('Notification_model');
				$rs = $this->Notification_model->reset_all($_POST['user_id']);
				if($rs){
					echo 'ok';
				}else{
					echo 'error';	
				}
				
			}
		}
	}
?>