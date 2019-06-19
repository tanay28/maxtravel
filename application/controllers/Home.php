<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	//date_default_timezone_set("Asia/Kolkata");
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
			$url = "http://worldtimeapi.org/api/timezone/".$timezone;
			$curl_handle=curl_init();
			curl_setopt($curl_handle,CURLOPT_URL,$url);
			curl_setopt($curl_handle,CURLOPT_CONNECTTIMEOUT,2);
			curl_setopt($curl_handle,CURLOPT_RETURNTRANSFER,1);
			$buffer = curl_exec($curl_handle);
			curl_close($curl_handle);
			$arr = json_decode($buffer,true);
			$curr = date('H:i:s',strtotime($arr['datetime']));
			return $curr;
		}
	}

?>