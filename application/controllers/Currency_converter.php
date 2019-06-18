<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	date_default_timezone_set("Asia/Kolkata");
	class Currency_converter extends CI_Controller
	{
		function __construct()
		{
			parent::__construct();
			$checkuservars = $this->session->userdata;
		}
		public function index()
		{
			$final_total = 0;
			$amount = 0;
			if(isset($_POST['txtamount']) && isset($_POST['txtfromcurrency']) && isset($_POST['txttocurrency']) && $_POST['txtamount'] != '' && $_POST['txtfromcurrency'] != 'none' && $_POST['txttocurrency'] != 'none')
			{
				$amount = $_POST['txtamount'];
				$from_Currency = urlencode($_POST['txtfromcurrency']);
				$to_Currency = urlencode($_POST['txttocurrency']);
				$query =  "{$from_Currency}_{$to_Currency}";
				$json = file_get_contents("https://free.currconv.com/api/v7/convert?q=$query&compact=ultra&apiKey=eb5dc1bd351461737a99");
				$obj = json_decode($json, true);
				$val = floatval($obj["$query"]);
				$total = $val * $amount;
				$final_total = number_format($total, 2, '.', '');
			} 
			echo $final_total;
		}
	}

?>