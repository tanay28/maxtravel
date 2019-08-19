<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set("Asia/Kolkata");
class Transaction extends CI_Controller {

	function __construct()
	{
		parent::__construct();	
		$checkuservars = $this->session->userdata;
		if(!isset($checkuservars['is_logged_in']))
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
		$rs = $this->Notification_model->count_unread_notifications($user_id);
		$data['nofication_count'] = isset($rs) ? count($rs) : 0;
		$data['user_id'] = $user_id;
		$data['notifications'] = $rs;
		$data['page_access'] = 'ACTIVE';

		$this->load->model('Transactionmanagement');
		$data['transaction_list'] = $this->Transactionmanagement->getTransactionList($user_id);

		$this->load->view('transactionlist',$data);
	}
	
}
