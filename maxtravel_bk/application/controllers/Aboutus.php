<?php

	defined('BASEPATH') OR exit('No direct script access allowed');
	date_default_timezone_set("Asia/Kolkata");
	class Aboutus extends CI_Controller
	{
		function __construct()
		{
			parent::__construct();
		}
		public function index()
		{
			$this->load->view('aboutus');
		}
	}
?>