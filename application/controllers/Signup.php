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
		$data['currency'] = $this->get_currency();
		$data['timezone'] = $this->get_timezone();
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
	private function get_currency()
	{
		$arr = array();
		$this->load->model('Usermanagement');
		$rs = $this->Usermanagement->getcurrency();
		if(isset($rs) && count($rs)>0)
		{
			foreach ($rs as $ikey => $ivalue)
			{
				$arr[] = array(
					'currency_id'   => $ivalue['currency_id'],
					'currency_name' => $ivalue['currency_name'],
				);
			}
		}
		return $arr;
	}
	private function get_timezone()
	{
		$arr = array();
		$this->load->model('Usermanagement');
		$rs = $this->Usermanagement->gettimezone();
		if(isset($rs) && count($rs)>0)
		{
			foreach ($rs as $ikey => $ivalue)
			{
				$arr[] = array(
					'id'       => $ivalue['id'],
					'timezone' => $ivalue['timezone'],
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
		//$target_dir = base_url().'assets/gstdoc/';
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
	private function remove_uploaded_doc($file)
	{
		//$target_dir = base_url().'assets/gstdoc/';
		$target_dir = $_SERVER['DOCUMENT_ROOT'].'/maxtravel/assets/gstdoc/';
		$target_file = $target_dir . basename($file["name"]);
		
		if(file_exists($target_file))
		{
			unlink($target_file);
			return true;
		}
		else
		{
			return false;
		}
	}
	public function add()
	{
		// echo '<pre>';
		// var_dump($_POST);
		// die;
		if(isset($_POST['txtAgencyname']) && $_POST['txtAgencyname'] != ''  && isset($_POST['txtAgencyemail']) && $_POST['txtAgencyemail'] != ''  && isset($_POST['txtFirstname']) && $_POST['txtFirstname'] != ''  && isset($_POST['txtLastname']) && $_POST['txtLastname'] != ''  && isset($_POST['txtDesignation']) && $_POST['txtDesignation'] != '' && isset($_POST['Rdoiatastatus']) && $_POST['Rdoiatastatus'] != '' && isset($_POST['cmbNatureofbusiness']) && $_POST['cmbNatureofbusiness'] != '' && isset($_POST['cmbBusinesstype']) && $_POST['cmbBusinesstype'] != '' && isset($_POST['cmbPrefferedcurrency']) && $_POST['cmbPrefferedcurrency'] != '' && isset($_POST['txtAddress']) && $_POST['txtAddress'] != '' && isset($_POST['txtPhone']) && $_POST['txtPhone'] != '' && isset($_POST['txtMobile']) && $_POST['txtMobile'] != '' && isset($_POST['cmbCountry']) && $_POST['cmbCountry'] != '' && isset($_POST['cmbCity']) && $_POST['cmbCity'] != '' && isset($_POST['txtPassword']) && $_POST['txtPassword'] != '' && isset($_POST['cmbTimezone']) && $_POST['cmbTimezone'] != '' && isset($_POST['txtPin']) && $_POST['txtPin'] != '')
		{
			
			$file_name = '';
			// if(isset($_POST['txtGSTNO']) && $_POST['txtGSTNO'] != '')
			// {
			// 	$arr_upload = $this->Upload_Doc($_FILES['fileGSTDoc']);
				
			// 	if(isset($arr_upload['status']) && $arr_upload['status'] == 'success')
			// 	{
			// 		$file_name = $arr_upload['file_name']; 
			// 	}
			// 	else
			// 	{
			// 		$msg = isset($arr_upload['msg']) ? $arr_upload['msg'] : '';
			// 		$this->session->set_flashdata('error', $msg);
			// 		redirect('signup');
			// 	}
			// }

			$this->load->model('Usermanagement');
			$chk = $this->Usermanagement->validateUser($_POST['txtAgencyemail']);

			//----------------- Generate Activation code -------------------//
			$activation_code = rand(0,99)."_mhd_".$_POST['txtPhone'];
			//----------------------------- END ---------------------------//
			// var_dump($chk);
			// die;
			if($chk == false)
			{
				$Arr_users = array(
					'email'           => $_POST['txtAgencyemail'],
					'password'        => md5($_POST['txtPassword']),
					'userstype'       => 'AGENT',
					'activation_code' => $activation_code,
					'date_created'    => date('Y-m-d'),
					'date_modified'   => date('Y-m-d'),
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
					'time_zone'          => $_POST['cmbTimezone'],
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

					//------------------ Email Functions -----------------//
					$this->load->library('email');
					$from_email = "tmtanay56@gmail.com"; 
         			$to_email = $_POST['txtAgencyemail']; // this is the actual email to send mail
					//$to_email = "tmtanay56@gmail.com"; // this email for testing purpose

					$this->email->from($from_email, 'Tanay'); 
         			$this->email->to($to_email);
         			$this->email->subject('Max Travel Account Activation Link'); 
         			//$this->email->set_mailtype("html");
         			$this->email->set_header('Content-type', 'text/html');
         			$this->load->library('custom_email');
         			$msg = $this->custom_email->account_activation($activation_code,$to_email,$_POST['txtFirstname']);
         			
         			//$msg = $this->Custom_email->account_activation($activation_code,$to_email,'Sudipta');
         			$this->email->message($msg);

         			$chkk = $this->email->send();
					//------------------------- END ---------------------//

         			$this->session->set_flashdata('success', 'Registration successful..Please check your mail for account activation');
					redirect('home');
				}
			}
			else
			{
				$ck = false;
				if(isset($file_name) && $file_name != '')
				{
					$ck = $this->remove_uploaded_doc($_FILES['fileGSTDoc']);
				}
				
				$this->session->set_flashdata('error', 'This user already exists..!!');
				redirect('signup');
			}
		}
		else
		{
			// echo 'error';
			// die;
			$this->session->set_flashdata('error', 'Registration unsuccessful..');
			redirect('home');
		}
	}

	public function activate_account()
	{
		$email = base64_decode($this->uri->segment(3)); // actual data for activation
		$code  = base64_decode($this->uri->segment(4)); // actual data for activation

		//$email = $this->uri->segment(3); // testing data
		//$code  = $this->uri->segment(4); // testing data

		$this->load->model('Usermanagement');
		$chk = $this->Usermanagement->is_account_activated($email,$code);

		if(isset($chk[0]['status']) && $chk[0]['status'] != 'ACTIVE')
		{
			$up = $this->Usermanagement->activate_user_account($email);
			if($up)
			{
				$this->session->set_flashdata('success', 'Your account has been activated');
				//redirect('home');
				$this->load->view('account_activation_page');
			}
		}
		else
		{
			$this->session->set_flashdata('error', 'Your account has already been activated..!!');
			//redirect('home');
			$this->load->view('account_activation_page');
		}
	}
}
