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
		$this->load->view('dashboardag');
	}
	
}
