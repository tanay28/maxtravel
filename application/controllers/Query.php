<?php

	defined('BASEPATH') OR exit('No direct script access allowed');
	date_default_timezone_set("Asia/Kolkata");
	class Query extends CI_Controller
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
		private function get_superadmins()
		{
			$this->load->model('Query_model');
			$rs = $this->Query_model->get_all_superadmins();
			return $rs;
		}
		public function index()
		{
			$data = array();
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
			$data['superadmins'] = $this->get_superadmins();
			if(isset($_SESSION['usertype']) && $_SESSION['usertype']=='AGENT'){
				$data['page_access'] = 'ACTIVE';
			}
			
			$this->load->view('add_query',$data);
		}

		public function add_query()
		{
			if(isset($_POST['txtQuery']) && $_POST['txtQuery'] =! '' && isset($_POST['cmbSuperadmin']) && $_POST['cmbSuperadmin'] != '')
			{
				$checkuservars = $this->session->userdata;
				$arr = array(
					'agent_id'     => isset($checkuservars['userid']) ? $checkuservars['userid'] : '',
					'title'        => $_REQUEST['txtQuery'],
					'date_created' => date('Y-m-d H:i:s'),
					'status'       => 'OPEN' 
				);
				$this->load->model('Query_model');
				$insert_id = $this->Query_model->insert_data($arr,'query');
				$arr = array(
					'key_id'       => $insert_id,
					'key_type'     => 'query',
					'title'        => $_REQUEST['txtQuery'],
					'sender_id'    => isset($checkuservars['userid']) ? $checkuservars['userid'] : '',
					'receiver_id'  => $_REQUEST['cmbSuperadmin'],
					'status'       => 'UNREAD',
					'date_created' => date('Y-m-d H:i:s'),

				);
				$insert_id = $this->Query_model->insert_data($arr,'notification');
				$this->session->set_flashdata('success', 'Query is registered successfully.');
				redirect('Query');
			}
		}
	}
?>