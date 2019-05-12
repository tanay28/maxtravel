<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set("Asia/Kolkata");
ini_set('memory_limit', '-1');
class Signup extends CI_Controller {

	function __construct()
	{

		parent::__construct();

		/*$checkuservars = $this->session->userdata;
                
        if((!isset($checkuservars['usertype']) || $checkuservars['usertype']!="SUPERADMIN") && (!isset($checkuservars['usertype']) || $checkuservars['usertype']!="ADMIN") && (!isset($checkuservars['usertype']) || $checkuservars['usertype']!="AGENT"))
        {
         redirect('login/logout/'); 
        }	*/
	}
	public function index()
	{
		$data = array();
		$data['country'] = $this->get_countries();
		// echo '<pre>';
		// var_dump($data);
		// die;
		$this->load->view('signup',$data);
	}
	private function get_countries()
	{
		$arr = array();
		$this->load->model('Usermanagement');
		$rs = $this->Usermanagement->getcountries();
		if(isset($rs) && count($rs)>0)
		{
			foreach ($rs as $ikey => $ivalue)
			{
				$arr[] = array(
					'cc_fips'      => $ivalue['cc_fips'],
					'country_name' => $ivalue['country_name'],
				);
			}
		}
		return $arr;
	}
	public function ajax_fetch_city()
	{
		if(isset($_POST['key']))
		{
			$con = $_POST['key'];
			$this->load->model('Usermanagement');
			$rs = $this->Usermanagement->getCities($con);
			if(isset($rs) && count($rs)>0)
			{
				echo "<option>Select</option>";
				foreach ($rs as $ikey => $ivalue)
				{
					echo "<option value='".$ivalue['full_name_nd']."'>".$ivalue['full_name_nd']."</option>";
				}
			}
		}
		else
		{
			echo "<option>Something went worng..!!</option>";
		}
	}
}
