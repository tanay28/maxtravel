<?php

	defined('BASEPATH') OR exit('No direct script access allowed');
	date_default_timezone_set("Asia/Kolkata");
	class Itinerary extends CI_Controller
	{
		function __construct()
		{
			parent::__construct();
		}
		public function show_itinerary()
		{
			$data = array();
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
			/////////// Notification and Order
			if($this->uri->segment('3')!='')
			{
				$id = base64_decode($this->uri->segment('3'));
				$this->load->model('Contentmanagement');
				if($this->uri->segment('4')=='package')
				{
					$rs = $this->Contentmanagement->get_itinerary_details($id,'package');
				}
				else
				{
					$rs = $this->Contentmanagement->get_itinerary_details($id,'destination');	
				}
				$data['itinerary_details'] = $rs;
				
				$this->load->view('itinerary',$data);
			}
			
		}
	}
?>