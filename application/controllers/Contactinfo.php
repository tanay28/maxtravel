<?php

	defined('BASEPATH') OR exit('No direct script access allowed');
	date_default_timezone_set("Asia/Kolkata");
	class Contactinfo extends CI_Controller
	{
		function __construct()
		{
			parent::__construct();
		}
		public function index()
		{
			$data['page_access'] = 'INACTIVE';
			/////////// Notification and Order
			$checkuservars = $this->session->userdata;
			$user_id = isset($checkuservars['userid']) ? $checkuservars['userid'] : '';
			$this->load->model('Notification_model');
			$rs = $this->Notification_model->count_unread_notifications($user_id);
			$data['nofication_count'] = isset($rs) ? count($rs) : 0;
			$data['user_id'] = $user_id;
			$data['notifications'] = $rs;
			/////////// Notification and Order
			
			$arr = array();
			$this->load->model('Contact_us');
			$rs = $this->Contact_us->get_contact_details();
			if(isset($rs) && count($rs)>0)
			{
				foreach ($rs as $ikey => $ivalue)
				{
					$arr[] = array(
						'name'       => $ivalue['name'],
						'email'      => $ivalue['email'],
						'phone'      => $ivalue['phone'],
						'msg'        => $ivalue['msg'],
						'created_at' => $ivalue['created_at']
					);
				}
			}
			if(isset($_SESSION['usertype']) && $_SESSION['usertype']=='SUPERADMIN'){
				$data['page_access'] = 'ACTIVE';
			}
			$data['datas'] = $arr; 
			$this->load->view('contact_info',$data);
		}
	}
?>