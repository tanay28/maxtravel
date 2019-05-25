<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set("Asia/Kolkata");
class Employee extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */

	function __construct()
	{

		parent::__construct();

		$checkuservars = $this->session->userdata;
                
        if((!isset($checkuservars['usertype']) || $checkuservars['usertype']!="SUPERADMIN") && (!isset($checkuservars['usertype']) || $checkuservars['usertype']!="ADMIN")){
         redirect('login/logout/'); 
        }

		
	}


	public function index()
	{

		$data = array();
		$data['page_access'] = 'INACTIVE';
		if(isset($_SESSION['usertype']) && $_SESSION['usertype']=='SUPERADMIN'){
			$data['page_access'] = 'ACTIVE';
		}
		$this->load->model('Employeemanagement');
		$data['employeelist'] = $this->Employeemanagement->getEmployee();


		$this->load->view('listemployee',$data);
	}

	public function lists()
	{

		$data = array();
		$data['page_access'] = 'INACTIVE';
		if(isset($_SESSION['usertype']) && $_SESSION['usertype']=='SUPERADMIN'){
			$data['page_access'] = 'ACTIVE';
		}
		$this->load->model('Employeemanagement');
		$data['employeelist'] = $this->Employeemanagement->getEmployee();


		$this->load->view('listemployee',$data);
	}

	public function add()
	{

		$data = array();
		$data['page_access'] = 'INACTIVE';

		if(isset($_POST['name']) && $_POST['name']!='' && isset($_POST['email']) && $_POST['email']!='' && isset($_POST['password']) && $_POST['password']!='' && isset($_POST['phoneno']) && $_POST['phoneno']!='' && isset($_POST['designation']) && $_POST['designation']!=''){
			
			$this->load->model('Employeemanagement');
			
			$checkEmployee = $this->Employeemanagement->checkEmployee($_POST['email']);
			if(isset($checkEmployee) && count($checkEmployee)>0){

				$this->session->set_flashdata('error', 'Employee Already Exists.');

			}else{
				$name = isset($_POST['name']) ? $_POST['name'] : '';
				$email = isset($_POST['email']) ? $_POST['email'] : '';
				$password = isset($_POST['password']) ? md5($_POST['password']) : md5('123456');
				$phoneno = isset($_POST['phoneno']) ? $_POST['phoneno'] : '';
				$address = isset($_POST['address']) ? $_POST['address'] : '';
				$designation = isset($_POST['designation']) ? $_POST['designation'] : '';

				$userstype = 'EMPLOYEE';
				$date_created = date('Y-m-d H:i:s');
				$status = 'ACTIVE';

				$xx = $this->Employeemanagement->insertEmployee($email,$password,$userstype,$date_created,$status);

				if($xx>0){

					$xx = $this->Employeemanagement->insertEmployeeDetails($xx,$name,$phoneno,$address,$designation);

					$this->session->set_flashdata('success', 'Employee has been added successfully.');

				}else{
					$this->session->set_flashdata('error', 'Something went wrong, Please try again after sometime.');
				}		
			}
		}
		
		if(isset($_SESSION['usertype']) && $_SESSION['usertype']=='SUPERADMIN'){
			$data['page_access'] = 'ACTIVE';
		}
		
		$this->load->view('addemployee',$data);
	}

	public function edit(){

		$data = array();
		$data['page_access'] = 'INACTIVE';

		if($this->uri->segment('3')!='')
		{

			$decodeEmpId = base64_decode($this->uri->segment('3'),true);
			// var_dump($decodeEmpId);
			// die;
			$this->load->model('Employeemanagement');

			if(isset($_POST['name']) && $_POST['name']!='' && isset($_POST['email']) && $_POST['email']!='' && isset($_POST['phoneno']) && $_POST['phoneno']!='' && isset($_POST['designation']) && $_POST['designation']!=''){

				$name = isset($_POST['name']) ? $_POST['name'] : '';
				//$email = isset($_POST['email']) ? $_POST['email'] : '';
				$password = isset($_POST['password']) ? md5($_POST['password']) : '';
				$phoneno = isset($_POST['phoneno']) ? $_POST['phoneno'] : '';
				$address = isset($_POST['address']) ? $_POST['address'] : '';
				$designation = isset($_POST['designation']) ? $_POST['designation'] : '';

				//$userstype = 'EMPLOYEE';
				//$date_created = date('Y-m-d H:i:s');
				//$status = 'ACTIVE';

				
				$xx = $this->Employeemanagement->updateEmployee($decodeEmpId,$password);

				$yy = $this->Employeemanagement->updateEmployeeDetails($decodeEmpId,$name,$phoneno,$address,$designation);

				if($yy>0 && $yy!=false)
				{

					$this->session->set_flashdata('success', 'Employee has been updated successfully.');

				}
				else
				{
					$this->session->set_flashdata('error', 'Something went wrong, Please try again after sometime.');
				}	
			}

			
			$data['employeeDetails'] = $this->Employeemanagement->getEmployeeDetails($decodeEmpId);
			//redirect('Employee/lists');

			if(isset($_SESSION['usertype']) && $_SESSION['usertype']=='SUPERADMIN'){
				$data['page_access'] = 'ACTIVE';
			}
		}

		$this->load->view('editemployee',$data);

	}

	
}
