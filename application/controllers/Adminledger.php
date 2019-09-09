<?php

	defined('BASEPATH') OR exit('No direct script access allowed');
	date_default_timezone_set("Asia/Kolkata");
	class Adminledger extends CI_Controller
	{
		private $target_dir;
		private $currency;

		function __construct()
		{
			parent::__construct();
			$this->target_dir = $_SERVER['DOCUMENT_ROOT'].'/maxtravel/assets/gstdoc/';
			$checkuservars = $this->session->userdata;
			
			if(!isset($checkuservars['is_logged_in']) || $checkuservars['is_logged_in'] != 1 || !isset($_SESSION['usertype']) || $_SESSION['usertype']!='SUPERADMIN')
			{
			 	redirect('login/logout');
			}
		}
		public function index()
		{
			$data['page_access'] = 'INACTIVE';

			$this->load->model('Ledgermanagement');
			$this->load->model('Agentmanagement');

			$ledgerStartDate = '';
			$ledgerEndDate = '';
			if(isset($_POST['btnSearchLedger']) && isset($_POST['ledgerStartDate']) && $_POST['ledgerStartDate']!='' && isset($_POST['ledgerEndDate']) && $_POST['ledgerEndDate']!=''){
				$ledgerStartDate = date('Y-m-d H:i:s',strtotime($_POST['ledgerStartDate']));
				$ledgerEndDate = date('Y-m-d H:i:s',strtotime($_POST['ledgerEndDate']));
			}

			$userid = '';
			if(isset($_POST['btnSearchLedger']) && isset($_POST['searchagent']) && $_POST['searchagent']!=''){
				$userid = $_POST['searchagent'];
			}
			//echo "<pre>";
			//var_dump($userid);

			$data['ledger_list'] = $this->Ledgermanagement->getLedgerList($userid,$ledgerStartDate,$ledgerEndDate);
			$data['agent_list'] = $this->Agentmanagement->getAgents('');

			//var_dump($data['agent_list']);
			//die();
			$this->load->view('adminledger',$data);
		}


	}
?>