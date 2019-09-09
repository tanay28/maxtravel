<?php

	defined('BASEPATH') OR exit('No direct script access allowed');
	date_default_timezone_set("Asia/Kolkata");
	class Agentledger extends CI_Controller
	{
		private $target_dir;
		private $currency;

		function __construct()
		{
			parent::__construct();
			$this->target_dir = $_SERVER['DOCUMENT_ROOT'].'/maxtravel/assets/gstdoc/';
			$checkuservars = $this->session->userdata;
			
			if(!isset($checkuservars['is_logged_in']) || $checkuservars['is_logged_in'] != 1 || !isset($_SESSION['usertype']) || $_SESSION['usertype']!='AGENT')
			{
			 	redirect('login/logout');
			}
		}
		public function index()
		{
			$data['page_access'] = 'INACTIVE';

			$this->load->model('Ledgermanagement');

			$ledgerStartDate = '';
			$ledgerEndDate = '';
			if(isset($_POST['btnSearchLedger']) && isset($_POST['ledgerStartDate']) && $_POST['ledgerStartDate']!='' && isset($_POST['ledgerEndDate']) && $_POST['ledgerEndDate']!=''){
				$ledgerStartDate = date('Y-m-d H:i:s',strtotime($_POST['ledgerStartDate']));
				$ledgerEndDate = date('Y-m-d H:i:s',strtotime($_POST['ledgerEndDate']));
			}

			$data['ledger_list'] = $this->Ledgermanagement->getLedgerList($_SESSION['userid'],$ledgerStartDate,$ledgerEndDate);

			$this->load->view('agentledger',$data);
		}


	}
?>