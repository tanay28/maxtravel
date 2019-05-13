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
			echo json_encode($rs);
			die();
		}
		else
		{
			echo "<option>Something went worng..!!</option>";
		}
	}
	public function add()
	{
		if(isset($_POST['txtAgencyname']) && $_POST['txtAgencyname'] != '' && isset($_POST['txtAgencyemail']) && $_POST['txtAgencyemail'] != '' && isset($_POST['txtFirstname']) && $_POST['txtFirstname'] != '' && isset($_POST['txtLastname']) && $_POST['txtLastname'] != '' && isset($_POST['txtDesignation']) && $_POST['txtDesignation'] != '' && isset($_POST['Rdoiatastatus']) && $_POST['Rdoiatastatus'] != '' && isset($_POST['cmbNatureofbusiness']) && $_POST['cmbNatureofbusiness'] != '' && isset($_POST['cmbBusinesstype']) && $_POST['cmbBusinesstype'] != '' && isset($_POST['cmbPrefferedcurrency']) && $_POST['cmbPrefferedcurrency'] != '' && isset($_POST['txtAddress']) && $_POST['txtAddress'] != '' && isset($_POST['txtPhone']) && $_POST['txtPhone'] != '' && isset($_POST['txtMobile']) && $_POST['txtMobile'] != '' && isset($_POST['cmbCountry']) && $_POST['cmbCountry'] != '' && isset($_POST['cmbCity']) && $_POST['cmbCity'] != '' && isset($_POST['txtPassword']) && $_POST['txtPassword'] != '' && isset($_POST['txtAccountName']) && $_POST['txtAccountName'] != '' && isset($_POST['txtOperationName']) && $_POST['txtOperationName'] != '' && isset($_POST['txtManagementName']) && $_POST['txtManagementName'] != '' && isset($_POST['txtAccountEmail']) && $_POST['txtAccountEmail'] != '' && isset($_POST['txtOperationEmail']) && $_POST['txtOperationEmail'] != '' && isset($_POST['txtManagementEmail']) && $_POST['txtManagementEmail'] != '' && isset($_POST['txtAccountNo']) && $_POST['txtAccountNo'] != '' && isset($_POST['txtOperationNo']) && $_POST['txtOperationNo'] != '' && isset($_POST['txtManagementNo']) && $_POST['txtManagementNo'] != '' && isset($_POST['cmbTimezone']) && $_POST['cmbTimezone'] != '')
		{
			$Arr_users = array(
				'email'         => $_POST['txtAgencyemail'],
				'password'      => md5($_POST['txtPassword']),
				'userstype'     => 'AGENT',
				'date_created'  => date('Y-m-d'),
				'date_modified' => date('Y-m-d'),
			);
			$this->load->model('Usermanagement');
			$user_insert_id = $this->Usermanagement->insert_user_data('users',$Arr_users);

			$arr_agents = array(
				'agency_name'        => $_POST['txtAgencyname'],
				'first_name'         => $_POST['txtFirstname'],
				'last_name'          => $_POST['txtLastname'],
				'designation'        => $_POST['txtDesignation'],
				'iata_status'        => $_POST['Rdoiatastatus'],
				'nature_of_business' => $_POST['cmbNatureofbusiness'],
				'business_type'      => $_POST['cmbBusinesstype'],
				'know_from'          => $_POST['cmbKnowfrom'],
				'preffered_currency' => $_POST['cmbPrefferedcurrency'],
				'address'            => $_POST['txtAddress'],
				'phone'              => $_POST['txtPhone'],
				'mobile'             => $_POST['txtMobile'],
				'fax'                => $_POST['txtFax'],
				'country'            => $_POST['cmbCountry'],
				'city'               => $_POST['cmbCity'],
				'time_zone'          => $_POST['cmbTimezone'],
				'website'            => $_POST['txtWebsite'],
				'account_name'       => $_POST['txtAccountName'],
				'operation_name'     => $_POST['txtOperationName'],
				'management_name'    => $_POST['txtManagementName'],
				'account_email'      => $_POST['txtAccountEmail'],
				'operation_email'    => $_POST['txtOperationEmail'],
				'management_email'   => $_POST['txtManagementEmail'],
				'account_no'         => $_POST['txtAccountNo'],
				'operation_no'       => $_POST['txtOperationNo'],
				'management_no'      => $_POST['txtManagementNo'],
				'date_created'       => date('Y-m-d')
			);
			$agent_insert_id = $this->Usermanagement->insert_user_data('agents',$arr_agents);
			$arr_mapping = array(
				'agent_id'     => $agent_insert_id,
				'user_id'      => $user_insert_id,
				'date_created' => date('Y-m-d')
			);
			$insert_id = $this->Usermanagement->insert_user_data('agent_user_mapping',$arr_mapping);
			if($insert_id >0)
			{
				$this->session->set_flashdata('success', 'Registration successful..');
				redirect('login');	
			}
		}
	}
}
