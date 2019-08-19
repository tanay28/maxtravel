<?php

	defined('BASEPATH') OR exit('No direct script access allowed');
	date_default_timezone_set("Asia/Kolkata");
	class Joinus extends CI_Controller
	{
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
			$this->load->view('joinus',$data);
		}
	}
?>