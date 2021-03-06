<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set("Asia/Kolkata");
ini_set('memory_limit', '-1');
class Signup extends CI_Controller {

	function __construct()
	{

		parent::__construct();
		$checkuservars = $this->session->userdata;
		if(isset($checkuservars['is_logged_in']) && $checkuservars['is_logged_in'] == 1)
		{
			redirect('home');
		}

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
					'id'      => $ivalue['id'],
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
	private function Upload_Doc($file)
	{
		//$target_dir = base_url('assets/gstdoc/');
		$target_dir = $_SERVER['DOCUMENT_ROOT'].'/maxtravel/assets/gstdoc/';

		$target_file = $target_dir . basename($file["name"]);
	
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		
		// Check if file already exists
		if (file_exists($target_file)) {
			$uploadOk = 0;
		    return array('status' => 'error', 'msg' => 'Sorry, file already exists.');
		}

		// Check file size
		if ($file["size"] > 500000)
		{
		    $uploadOk = 0;
		    return array('status' =>'error','msg'=> 'Sorry, your file is too large.');
		}

		// Allow certain file formats
		if($imageFileType != "pdf" && $imageFileType != "doc" && $imageFileType != "docx")
		{
		    $uploadOk = 0;
		 	return array('status' => 'error', 'msg' => 'Please upload .pdf or .doc or .docx files'); 
		} 
		else
		{
		    if (move_uploaded_file($file["tmp_name"], $target_file))
		    {
		        return array('status' => 'success','file_name' => basename( $file["name"]));
		    }
		    else
		    {
		        return array('status' => 'error', 'msg' => 'Sorry, there was an error uploading your file.');
		    }
		}

	}
	public function add()
	{
		// echo '<pre>';
		// var_dump($_POST);
		// die;
		// var_dump($_POST['txtGSTNO']);
		// var_dump($_FILES['fileGSTDoc']);
		// die;
		if(isset($_POST['txtAgencyname']) && $_POST['txtAgencyname'] != ''  && isset($_POST['txtAgencyemail']) && $_POST['txtAgencyemail'] != ''  && isset($_POST['txtFirstname']) && $_POST['txtFirstname'] != ''  && isset($_POST['txtLastname']) && $_POST['txtLastname'] != ''  && isset($_POST['txtDesignation']) && $_POST['txtDesignation'] != '' && isset($_POST['Rdoiatastatus']) && $_POST['Rdoiatastatus'] != '' && isset($_POST['cmbNatureofbusiness']) && $_POST['cmbNatureofbusiness'] != '' && isset($_POST['cmbBusinesstype']) && $_POST['cmbBusinesstype'] != '' && isset($_POST['cmbPrefferedcurrency']) && $_POST['cmbPrefferedcurrency'] != '' && isset($_POST['txtAddress']) && $_POST['txtAddress'] != '' && isset($_POST['txtPhone']) && $_POST['txtPhone'] != '' && isset($_POST['txtMobile']) && $_POST['txtMobile'] != '' && isset($_POST['cmbCountry']) && $_POST['cmbCountry'] != '' && isset($_POST['cmbCity']) && $_POST['cmbCity'] != '' && isset($_POST['txtPassword']) && $_POST['txtPassword'] != '' && isset($_POST['txtAccountName']) && $_POST['txtAccountName'] != '' && isset($_POST['txtOperationName']) && $_POST['txtOperationName'] != '' && isset($_POST['txtManagementName']) && $_POST['txtManagementName'] != '' && isset($_POST['txtAccountEmail']) && $_POST['txtAccountEmail'] != '' && isset($_POST['txtOperationEmail']) && $_POST['txtOperationEmail'] != '' && isset($_POST['txtManagementEmail']) && $_POST['txtManagementEmail'] != '' && isset($_POST['txtAccountNo']) && $_POST['txtAccountNo'] != '' && isset($_POST['txtOperationNo']) && $_POST['txtOperationNo'] != '' && isset($_POST['txtManagementNo']) && $_POST['txtManagementNo'] != '' && isset($_POST['txtTimeZone']) && $_POST['txtTimeZone'] != '' && isset($_POST['txtPin']) && $_POST['txtPin'] != '')
		{
			
			$file_name = '';
			// var_dump($_POST['txtGSTNO']);
			// die;
			if(isset($_POST['txtGSTNO']) && $_POST['txtGSTNO'] != '')
			{
				$arr_upload = $this->Upload_Doc($_FILES['fileGSTDoc']);
				// var_dump($arr_upload);
				// die;
				if(isset($arr_upload['status']) && $arr_upload['status'] == 'success')
				{
					$file_name = $arr_upload['file_name']; 
				}
				else
				{
					$msg = isset($arr_upload['msg']) ? $arr_upload['msg'] : '';
					$this->session->set_flashdata('error', $msg);
				}
			}

			$this->load->model('Usermanagement');
			$chk = $this->Usermanagement->validateUser($_POST['txtAgencyemail']);
			// var_dump($chk);
			// die;
			if($chk == false)
			{
				$Arr_users = array(
					'email'         => $_POST['txtAgencyemail'],
					'password'      => md5($_POST['txtPassword']),
					'userstype'     => 'AGENT',
					'date_created'  => date('Y-m-d'),
					'date_modified' => date('Y-m-d'),
				);
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
					'pin'                => $_POST['txtPin'],
					'mobile'             => $_POST['txtMobile'],
					'fax'                => $_POST['txtFax'],
					'country'            => $_POST['cmbCountry'],
					'city'               => $_POST['cmbCity'],
					'time_zone'          => $_POST['txtTimeZone'],
					'website'            => $_POST['txtWebsite'],
					'gstin_no'           => $_POST['txtGSTNO'],
					'gst_file_name'      => $file_name,
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
					redirect('home');	
				}
			}
			else
			{
				$this->session->set_flashdata('error', 'This user already exists..!!');
				redirect('signup');
			}
		}
		else
		{
			// echo 'error';
			// die;
			$this->session->set_flashdata('success', 'Registration unsuccessful..');
			redirect('home');
		}
	}
}
