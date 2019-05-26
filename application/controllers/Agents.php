<?php

	defined('BASEPATH') OR exit('No direct script access allowed');
	date_default_timezone_set("Asia/Kolkata");
	class Agents extends CI_Controller
	{
		private $target_dir;
		private $currency;

		function __construct()
		{
			parent::__construct();
			//$this->target_dir = $_SERVER['DOCUMENT_ROOT'].'/maxtravel/assets/gstdoc/';
			$this->target_dir = base_url().'assets/gstdoc/';
			$checkuservars = $this->session->userdata;
			if(!isset($checkuservars['is_logged_in']) || $checkuservars['is_logged_in'] != 1 || !isset($_SESSION['usertype']) || $_SESSION['usertype']!='SUPERADMIN')
			{
				redirect('login/logout');
			}
		}
		public function index()
		{
			$data['page_access'] = 'ACTIVE';
			$data['agents'] = $this->getAllagents();
			$this->load->view('listagent',$data);
		}
		public function getAllagents()
		{
			$this->load->model('Agentmanagement');
			$rs = $this->Agentmanagement->getAgents();
			return $rs;
		}
		public function lists()
		{
			redirect('agents/index');
		}
		public function add()
		{
			$data = array();
			$data['country'] = $this->get_countries();
			$data['currency'] = $this->get_currency();
			$data['timezone'] = $this->get_timezone();
			$this->load->view('addagent',$data);
		}
		public function addagent()
		{
			// echo '<pre>';
			// var_dump($_POST);
			// die;
			// var_dump($_POST['txtGSTNO']);
			// var_dump($_FILES['fileGSTDoc']);
			// die;
			if(isset($_POST['txtAgencyname']) && $_POST['txtAgencyname'] != ''  && isset($_POST['txtAgencyemail']) && $_POST['txtAgencyemail'] != ''  && isset($_POST['txtFirstname']) && $_POST['txtFirstname'] != ''  && isset($_POST['txtLastname']) && $_POST['txtLastname'] != ''  && isset($_POST['txtDesignation']) && $_POST['txtDesignation'] != '' && isset($_POST['Rdoiatastatus']) && $_POST['Rdoiatastatus'] != '' && isset($_POST['cmbNatureofbusiness']) && $_POST['cmbNatureofbusiness'] != '' && isset($_POST['cmbBusinesstype']) && $_POST['cmbBusinesstype'] != '' && isset($_POST['cmbPrefferedcurrency']) && $_POST['cmbPrefferedcurrency'] != '' && isset($_POST['txtAddress']) && $_POST['txtAddress'] != '' && isset($_POST['txtPhone']) && $_POST['txtPhone'] != '' && isset($_POST['txtMobile']) && $_POST['txtMobile'] != '' && isset($_POST['cmbCountry']) && $_POST['cmbCountry'] != '' && isset($_POST['cmbCity']) && $_POST['cmbCity'] != '' && isset($_POST['txtPassword']) && $_POST['txtPassword'] != '' && isset($_POST['cmbTimezone']) && $_POST['cmbTimezone'] != '' && isset($_POST['txtPin']) && $_POST['txtPin'] != '')
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
						redirect('agents');
					}
				}

				$this->load->model('Agentmanagement');
				$chk = $this->Agentmanagement->validateUser($_POST['txtAgencyemail']);

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
					$user_insert_id = $this->Agentmanagement->insert_user_data('users',$Arr_users);
					
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
					$agent_insert_id = $this->Agentmanagement->insert_user_data('agents',$arr_agents);
					$arr_mapping = array(
						'agent_id'     => $agent_insert_id,
						'user_id'      => $user_insert_id,
						'date_created' => date('Y-m-d')
					);
					$insert_id = $this->Agentmanagement->insert_user_data('agent_user_mapping',$arr_mapping);

					$this->session->set_flashdata('success', 'Registration successful..');
					redirect('agents');
				}
				else
				{
					$ck = false;
					if(isset($file_name) && $file_name != '')
					{
						$ck = $this->remove_uploaded_doc($_FILES['fileGSTDoc']);
					}
					
					$this->session->set_flashdata('error', 'This user already exists..!!');
					redirect('agents/add');
				}
			}
			else
			{
				// echo 'error';
				// die;
				$this->session->set_flashdata('success', 'Registration unsuccessful..');
				redirect('agents');
			}
		}
		private function get_countries()
		{
			$arr = array();
			$this->load->model('Agentmanagement');
			$rs = $this->Agentmanagement->getcountries();
			if(isset($rs) && count($rs)>0)
			{
				foreach ($rs as $ikey => $ivalue)
				{
					$arr[] = array(
						'id'           => $ivalue['id'],
						'country_name' => $ivalue['country_name'],
					);
				}
			}
			return $arr;
		}
		private function get_currency()
		{
			$arr = array();
			$this->load->model('Agentmanagement');
			$rs = $this->Agentmanagement->getcurrency();
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
				$this->load->model('Agentmanagement');
				$rs = $this->Agentmanagement->getCities($con);
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

			//$target_dir = $_SERVER['DOCUMENT_ROOT'].'/maxtravel/assets/gstdoc/';
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
			//$target_dir = $_SERVER['DOCUMENT_ROOT'].'/maxtravel/assets/gstdoc/';
			$target_dir = base_url().'assets/gstdoc/';
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
		public function edit()
		{
			$agent_id = base64_decode($this->uri->segment(3));
			if($agent_id != '')
			{
				$this->load->model('Agentmanagement');
				$data['agents'] = $this->Agentmanagement->getAgents($agent_id);
				$data['country'] = $this->get_countries();
				$data['currency'] = $this->get_currency();
				$data['timezone'] = $this->get_timezone();
				// echo '<pre>';
				// var_dump($data);
				// die;
				$this->load->view('editagent',$data);
			}
			else
			{
				$this->session->set_flashdata('error','Somthing went wrong..!! Please try again');
				redirect('agents');
			}
		}
		public function editagent()
		{
			
			if(isset($_POST['txtAgencyname']) && $_POST['txtAgencyname'] != ''  && isset($_POST['txtFirstname']) && $_POST['txtFirstname'] != ''  && isset($_POST['txtLastname']) && $_POST['txtLastname'] != ''  && isset($_POST['txtDesignation']) && $_POST['txtDesignation'] != '' && isset($_POST['Rdoiatastatus']) && $_POST['Rdoiatastatus'] != '' && isset($_POST['cmbNatureofbusiness']) && $_POST['cmbNatureofbusiness'] != '' && isset($_POST['cmbBusinesstype']) && $_POST['cmbBusinesstype'] != '' && isset($_POST['cmbPrefferedcurrency']) && $_POST['cmbPrefferedcurrency'] != '' && isset($_POST['txtAddress']) && $_POST['txtAddress'] != '' && isset($_POST['txtPhone']) && $_POST['txtPhone'] != '' && isset($_POST['txtMobile']) && $_POST['txtMobile'] != '' && isset($_POST['cmbCountry']) && $_POST['cmbCountry'] != '' && isset($_POST['cmbCity']) && $_POST['cmbCity'] != '' && isset($_POST['cmbTimezone']) && $_POST['cmbTimezone'] != '' && isset($_POST['txtPin']) && $_POST['txtPin'] != '')
			{
				$file_name = '';
				
				if(isset($_FILES['fileGSTDoc']) && count($_FILES['fileGSTDoc'])>0 && $_FILES['fileGSTDoc']['name'] != '')
				{
					$target_file = $this->target_dir.$_POST['gst_file_name'];
					if (file_exists($target_file))
					{
						$file_name = '';
						unlink($target_file);
					}

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
						redirect('agents');
					}
				}
				else
				{
					$file_name = $_POST['gst_file_name'];
				}

				$this->load->model('Agentmanagement');

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
				$id = $_POST['txtID'];
				$chk = $this->Agentmanagement->update_agent_data($id,'agents',$arr_agents);
				if($chk)
				{
					$this->session->set_flashdata('success', 'Edited Successfully');
					redirect('agents');
				}
			}
			else
			{
				$this->session->set_flashdata('error', 'Something went wrong..!! Please try again later.');
				redirect('agents');
			}
		}

		public function change_status()
		{
			$id = $this->uri->segment(3);
			$status = $this->uri->segment(4);
			$this->load->model('Agentmanagement');
			$chk = $this->Agentmanagement->change_agent_status($id,$status);
			redirect('agents');
		}

	}
?>