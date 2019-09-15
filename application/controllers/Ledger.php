<?php

	defined('BASEPATH') OR exit('No direct script access allowed');
	date_default_timezone_set("Asia/Kolkata");
	class Ledger extends CI_Controller
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

			$this->load->model('Cartmanagement');
			$rsCart = $this->Cartmanagement->countMycart($user_id);
			$data['cart_count'] = isset($rsCart[0]['C']) ? $rsCart[0]['C'] : 0;

			/////////// Notification and Order

			$data['user_id'] = $user_id;
			$data['notifications'] = $rs;

			$this->load->model('Transactionmanagement');
			$this->load->model('Agentmanagement');
			$transactionId = 0;
			if($this->uri->segment(3)){
				$transactionId = base64_decode($this->uri->segment(3));
			}
			$data['transaction_details'] = $this->Transactionmanagement->getTransactionDetails($transactionId);
			$data['agent_details'] = array();
			if(isset($data['transaction_details'][0]['user_id'])){
				$data['agent_details'] = $this->Agentmanagement->getAgentDetails($data['transaction_details'][0]['user_id']);
			}
			
			$this->load->view('ledgerbill',$data);
		}
	}
?>