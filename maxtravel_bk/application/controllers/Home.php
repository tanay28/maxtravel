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
			$this->load->view('home',$data);

		}

		private function get_local_time($timezone)
		{
			date_default_timezone_set($timezone);
			return date('H:i:s');
		}
	}

?>