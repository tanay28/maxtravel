<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set("Asia/Kolkata");
class Point extends CI_Controller {

	function __construct()
	{
		parent::__construct();	
		$checkuservars = $this->session->userdata;
		if(!isset($checkuservars['is_logged_in']) && $checkuservars['is_logged_in'] != 1)
		{
			redirect('login/logout');
		}
	}

	public function requestpoint(){


		$data = array();

		/////////// Notification and Order
		$checkuservars = $this->session->userdata;
		$user_id = isset($checkuservars['userid']) ? $checkuservars['userid'] : '';
		$this->load->model('Notification_model');
		$rs = $this->Notification_model->count_unread_notifications($user_id);
		$data['nofication_count'] = isset($rs) ? count($rs) : 0;
		$data['user_id'] = $user_id;
		$data['notifications'] = $rs;
		$data['page_access'] = 'ACTIVE';
		/////////// Notification and Order

		if(isset($_POST['request_point']) && $_POST['request_point']!=''){
			$this->load->model('Pointmanagement');

			$sender_id = $_SESSION['userid'];
			$request_point = isset($_POST['request_point']) ? $_POST['request_point'] : 0;
			$reciever_id = 4;
			$approved_point = 0;

			$xx = $this->Pointmanagement->requestPoint($sender_id,$request_point,$reciever_id,$approved_point);
			if($xx>0){

				$this->session->set_flashdata('success', 'Request has been sent. Wating for admin approval.');

			}else{	
				$this->session->set_flashdata('error', 'Requested point to be sent. Try Agian After Sometime.</a>.');
			}
		
		}

		$this->load->view('requestpoint',$data);
	}

	public function requestlist(){

		$data = array();

		/////////// Notification and Order
		$checkuservars = $this->session->userdata;
		$user_id = isset($checkuservars['userid']) ? $checkuservars['userid'] : '';
		$this->load->model('Notification_model');
		$rs = $this->Notification_model->count_unread_notifications($user_id);
		$data['nofication_count'] = isset($rs) ? count($rs) : 0;
		$data['user_id'] = $user_id;
		$data['notifications'] = $rs;
		$data['page_access'] = 'ACTIVE';
		/////////// Notification and Order

		$this->load->model('Pointmanagement');

		$data['request_points'] = $this->Pointmanagement->getAllRequestPoints($user_id);

		$this->load->view('requestpointlist',$data);
	}

	public function approvepoint(){

		$data = array();

		/////////// Notification and Order
		$checkuservars = $this->session->userdata;
		$user_id = isset($checkuservars['userid']) ? $checkuservars['userid'] : '';
		$this->load->model('Notification_model');
		$rs = $this->Notification_model->count_unread_notifications($user_id);
		$data['nofication_count'] = isset($rs) ? count($rs) : 0;
		$data['user_id'] = $user_id;
		$data['notifications'] = $rs;
		$data['page_access'] = 'ACTIVE';
		/////////// Notification and Order

		if(isset($_POST['request_point']) && $_POST['request_point']!=''){
			$this->load->model('Pointmanagement');

			

			//var_dump($this->uri->segment(3));
			$requestedId = base64_decode($this->uri->segment(3));
			$getPointsDetails = $this->Pointmanagement->getPointsDetails($requestedId);
			//var_dump($requestedId);
			//sdie();
			$reciever_id = $user_id;
			$approved_point = isset($_POST['request_point']) ? $_POST['request_point'] : 0;

			

			$this->load->model('Usermanagement');
			$walletPoint = $this->Usermanagement->getUserWalletPoint($getPointsDetails[0]['sender_id']);
			$walletPoint = isset($walletPoint[0]['wallet']) ? $walletPoint[0]['wallet'] : 0;

			$totPoint = $walletPoint + $approved_point;
			$this->Usermanagement->updateUserWallet($getPointsDetails[0]['sender_id'],$totPoint);

			$xx = $this->Pointmanagement->approvedPoint($requestedId,$reciever_id,$approved_point);
			if($xx>0){

				$this->session->set_flashdata('success', 'Approved The Point');

			}else{	
				$this->session->set_flashdata('error', 'Requested point to be sent. Try Agian After Sometime.</a>.');
			}
		
		}
		$this->load->view('approvepoint',$data);
	}
	
}
