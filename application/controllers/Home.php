<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	date_default_timezone_set("Asia/Kolkata");
	class Home extends CI_Controller
	{
		function __construct()
		{
			parent::__construct();
			$checkuservars = $this->session->userdata;
		}
		public function index()
		{
			$data = array();
			$data['thailand'] = $this->get_local_time('Asia/Bangkok');
			$data['singapore'] = $this->get_local_time('Asia/Singapore');
			$data['malaysia'] = $this->get_local_time('Asia/Bangkok');
			$data['header_content'] = $this->get_content('header');
			$data['event_content'] = $this->get_content('event');
			$data['destination_content'] = $this->get_content('destination');
			$data['feedback_content'] = $this->get_content('feedback');
			
			/////////// Notification and Order
			$checkuservars = $this->session->userdata;
			$user_id = isset($checkuservars['userid']) ? $checkuservars['userid'] : '';
			$this->load->model('Notification_model');
			$rs = $this->Notification_model->count_unread_notifications($user_id);
			$data['nofication_count'] = isset($rs) ? count($rs) : 0;

			$this->load->model('Cartmanagement');
			$rsCart = $this->Cartmanagement->countMycart($user_id);
			$data['cart_count'] = isset($rsCart[0]['C']) ? $rsCart[0]['C'] : 0;

			/////////// Notification and Order



			$data['user_id'] = $user_id;
			$data['notifications'] = $rs;
			/*echo '<pre>';
			var_dump($data);
			die;*/
			$this->load->view('home',$data);
		}

		private function get_local_time($timezone)
		{
			date_default_timezone_set($timezone);
			return date('H:i:s');
		}

		private function get_content($type)
		{
			$arr = array();
			$this->load->model('Contentmanagement');
			$rs = $this->Contentmanagement->get_slider_details($type);
			if(isset($rs) && count($rs)==1)
			{
				$arr[0] = $rs[0];
				$arr[1] = $rs[0];
				//$arr[1] = $rs;
				return $arr; 
			}
			return $rs;
		}
	}

?>