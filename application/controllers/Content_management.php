<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	date_default_timezone_set("Asia/Kolkata");
	class Content_management extends CI_Controller
	{
		private $checkuservars; 
		function __construct()
		{
			parent::__construct();
			$this->checkuservars = $this->session->userdata;

			if(!isset($this->checkuservars['is_logged_in']) && $this->checkuservars['is_logged_in'] != 1)
			{
				redirect('login/logout');
			}
		}
		public function index()
		{
			$data['page_access'] = 'INACTIVE';
			if(isset($_SESSION['usertype']) && $_SESSION['usertype']=='SUPERADMIN'){
				$data['page_access'] = 'ACTIVE';
			}

			$data['user_name'] = isset($this->checkuservars['useremail']) ? $this->checkuservars['useremail'] : 'NA';  
			$this->load->view('backend/home',$data);
		}
	}

?>