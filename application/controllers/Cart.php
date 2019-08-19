<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set("Asia/Kolkata");
class Cart extends CI_Controller {

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

		/////////// Notification and Order
		$checkuservars = $this->session->userdata;
		$user_id = isset($checkuservars['userid']) ? $checkuservars['userid'] : '';
		$this->load->model('Notification_model');
		$rs = $this->Notification_model->count_unread_notifications($user_id);
		$data['nofication_count'] = isset($rs) ? count($rs) : 0;
		$data['user_id'] = $user_id;
		$data['notifications'] = $rs;
		/////////// Notification and Order
		if(isset($_POST) && count($_POST)>0 && isset($_POST['total']) && $_POST['total']!=''){
			
			$this->load->model('Usermanagement');
			$walletPoint = $this->Usermanagement->getUserWalletPoint($user_id);
			if(isset($walletPoint[0]['wallet']) && ($walletPoint[0]['wallet']>=$_POST['total'])){
				echo "<pre>";
				var_dump($_POST);
				die();
			}else{
				
				$this->session->set_flashdata('error', 'Insufficient Balance. <a href="point/requestpoint">Click here for request point</a>.');
			}
		}

		$this->load->model('Cartmanagement');
		$data['cart_details'] = $this->Cartmanagement->getMyCart($user_id,'ACTIVE');

		$this->load->view('mycart',$data);
	}

	public function deletecart(){

		//var_dump('hello');
		if(isset($_POST['cartfield']) && $_POST['cartfield']!=0){
			//var_dump($_POST['checkin']);
			$this->load->model('Cartmanagement');
			$this->Cartmanagement->deletecart($_POST['cartfield']);
			echo json_encode(array('status'=>'true','message'=>'Success.'));
		}else{
			echo json_encode(array('status'=>'false','message'=>'Select Hotel.'));
		}

	}
}
