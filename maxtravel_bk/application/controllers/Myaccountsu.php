<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set("Asia/Kolkata");
class Myaccountsu extends CI_Controller {

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
                
        if((!isset($checkuservars['usertype']) || $checkuservars['usertype']!="SUPERADMIN")){
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
		$this->load->model('Usermanagement');
		$data['profiledetails'] = $this->Usermanagement->getMyprofileDetails_superadmin($_SESSION['userid']);


		$this->load->view('myaccountsu',$data);
	}

	public function lists()
	{

		$data = array();
		$data['page_access'] = 'INACTIVE';
		if(isset($_SESSION['usertype']) && $_SESSION['usertype']=='SUPERADMIN'){
			$data['page_access'] = 'ACTIVE';
		}
		$this->load->model('Usermanagement');
		$data['profiledetails'] = $this->Usermanagement->getMyprofileDetails_superadmin($_SESSION['userid']);


		$this->load->view('myaccountsu',$data);
	}
	
}
