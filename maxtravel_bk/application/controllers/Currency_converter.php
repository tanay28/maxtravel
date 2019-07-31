<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	date_default_timezone_set("Asia/Kolkata");
	class Currency_converter extends CI_Controller
	{
		private $checkuservars;
		function __construct()
		{
			parent::__construct();
			$this->checkuservars = $this->session->userdata;
		}
		public function index()
		{
			$final_total = 0;
			$amount = 0;
			$status = 'failed';
			$api_res = '';
			if(isset($_POST['txtamount']) && isset($_POST['txtfromcurrency']) && isset($_POST['txttocurrency']) && $_POST['txtamount'] != '' && $_POST['txtfromcurrency'] != 'none' && $_POST['txttocurrency'] != 'none')
			{
				$this->load->model('Apimanagement');
				$amount = $_POST['txtamount'];
				$from_Currency = urlencode($_POST['txtfromcurrency']);
				$to_Currency = urlencode($_POST['txttocurrency']);
				$query =  "{$from_Currency}_{$to_Currency}";
				$json = file_get_contents("https://free.currconv.com/api/v7/convert?q=$query&compact=ultra&apiKey=eb5dc1bd351461737a99");
				$api_res = $json;
				$obj = json_decode($json, true);
				if(isset($obj) && count($obj)>0)
				{
					$val = floatval($obj["$query"]);
					$total = $val * $amount;
					$final_total = number_format($total, 2, '.', '');	
					$status = 'success';
				}
				
				$user_id = isset($this->checkuservars['userid']) ? $this->checkuservars['userid'] : 'anonymous'; 
				$arr = array(
					'api_name'  => 'Currency_converter',
					'user_id'   => $user_id,
					'called_at' => date('Y-m-d H:i:s'),
					'api_res'   => $api_res,
					'status'    => $status 
				);
				$this->Apimanagement->insert_api_log($arr);
			} 
			echo $final_total;
		}
	}

?>