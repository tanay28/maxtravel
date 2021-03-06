<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set("Asia/Kolkata");
class Myaccountad extends CI_Controller {

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
                
        if((!isset($checkuservars['usertype']) || $checkuservars['usertype']!="ADMIN")){
         redirect('login/logout/'); 
        }

		
	}


	public function index()
	{

		$data = array();
		/////////// Notification and Order
			$checkuservars = $this->session->userdata;
			$user_id = isset($checkuservars['userid']) ? $checkuservars['userid'] : '';
			$this->load->model('Notification_model');
			$rs = $this->Notification_model->count_unread_notifications($user_id);
			$data['nofication_count'] = isset($rs) ? count($rs) : 0;

			$this->load->model('Cartmanagement');
			$rsCart = $this->Cartmanagement->countMycart($user_id);
			$data['cart_count'] = isset($rsCart[0]['C']) ? $rsCart[0]['C'] : 0;

			/////////// Notification and Order
		$data['user_id'] = $user_id;
		$data['notifications'] = $rs;
		/////////// Notification and Order
		$data['page_access'] = 'INACTIVE';
		if(isset($_SESSION['usertype']) && $_SESSION['usertype']=='ADMIN'){
			$data['page_access'] = 'ACTIVE';
		}
		$this->load->model('Usersmanagement');
		
		$data['profiledetails'] = $this->Usersmanagement->getUsersDetails($_SESSION['userid']);


		$this->load->view('myaccountad',$data);
	}

	public function lists()
	{

		$data = array();
		$data['page_access'] = 'INACTIVE';
		if(isset($_SESSION['usertype']) && $_SESSION['usertype']=='ADMIN'){
			$data['page_access'] = 'ACTIVE';
		}
		/////////// Notification and Order
			$checkuservars = $this->session->userdata;
			$user_id = isset($checkuservars['userid']) ? $checkuservars['userid'] : '';
			$this->load->model('Notification_model');
			$rs = $this->Notification_model->count_unread_notifications($user_id);
			$data['nofication_count'] = isset($rs) ? count($rs) : 0;

			$this->load->model('Cartmanagement');
			$rsCart = $this->Cartmanagement->countMycart($user_id);
			$data['cart_count'] = isset($rsCart[0]['C']) ? $rsCart[0]['C'] : 0;

			/////////// Notification and Order
		$data['user_id'] = $user_id;
		$data['notifications'] = $rs;
		/////////// Notification and Order
		$this->load->model('Usersmanagement');
		
		$data['profiledetails'] = $this->Usersmanagement->getUsersDetails($_SESSION['userid']);


		$this->load->view('myaccountad',$data);
	}
	
}
