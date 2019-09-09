<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set("Asia/Kolkata");
class Dashboardag extends CI_Controller {

	function __construct()
	{
		parent::__construct();	
		$checkuservars = $this->session->userdata;
		if(!isset($checkuservars['is_logged_in']) || $checkuservars['is_logged_in'] != 1 || !isset($_SESSION['usertype']) || $_SESSION['usertype']!='AGENT')
		{
			redirect('login/logout');
		}
	}
	public function index()
	{
		$data = array();
		$checkuservars = $this->session->userdata;
		$user_id = isset($checkuservars['userid']) ? $checkuservars['userid'] : '';
		$this->load->model('Notification_model');
		$this->load->model('Usersmanagement');

		$rs = $this->Notification_model->count_unread_notifications($user_id);
		$walletDetails = $this->Usersmanagement->getUserWallet($_SESSION['userid']);

		$data['nofication_count'] = isset($rs) ? count($rs) : 0;
		$data['user_id'] = $user_id;
		$data['notifications'] = $rs;
		$data['wallet_amount'] = isset($walletDetails[0]['wallet']) ? $walletDetails[0]['wallet'] : 0;
		
		$this->load->view('dashboardag',$data);
	}
	
}
