<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set("Asia/Kolkata");
class Order extends CI_Controller {

	function __construct()
	{
		parent::__construct();	
		$checkuservars = $this->session->userdata;
		if(!isset($checkuservars['is_logged_in']))
		{
			redirect('login/logout');
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
		$data['page_access'] = 'ACTIVE';

		$this->load->model('Ordermanagement');
		$data['order_list'] = $this->Ordermanagement->getOrderList($user_id);

		$this->load->view('orderlist',$data);
	}

	public function orderlist()
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
		$data['page_access'] = 'ACTIVE';

		$this->load->model('Ordermanagement');
		$data['order_list'] = $this->Ordermanagement->getOrderList($user_id);

		$this->load->view('orderlist',$data);
	}

	public function printorder(){
		/*echo "<pre>";
		var_dump($this->uri->segment(3));
		die();*/	
		$data = array();
		$data['page_access'] = 'INACTIVE';

		/////////// Notification and Order
			$checkuservars = $this->session->userdata;
			$user_id = isset($checkuservars['userid']) ? $checkuservars['userid'] : '';
			$this->load->model('Notification_model');
			$rs = $this->Notification_model->count_unread_notifications($user_id);
			$data['nofication_count'] = isset($rs) ? count($rs) : 0;

			$this->load->model('Cartmanagement');
			$rsCart = $this->Cartmanagement->countMycart($user_id);
			$data['cart_count'] = isset($rsCart[0]['C']) ? $rsCart[0]['C'] : 0;
			$data['user_id'] = $user_id;
			$data['notifications'] = $rs;
		/////////// Notification and Order

		$orderid = 0;
		$userid = isset($_SESSION['userid']) ? $_SESSION['userid'] : 0;
		$this->load->model('Ordermanagement');
		if($this->uri->segment(3)){
			$orderid = $this->uri->segment(3); 
		}
		if($orderid>0 && $userid>0){
			
			$data['order_details'] = $this->Ordermanagement->getOrderDetails($orderid,$userid);		
		}
		if(isset($data['order_details']) && count($data['order_details'])>0 && isset($data['order_details'][0]['id'])){
			

			$data['order_cart_details'] = $this->Ordermanagement->getOrderCartDetails($data['order_details'][0]['id']);	
		}
		//$data['cart_details'] = array();
		if(isset($data['order_cart_details']) && count($data['order_cart_details'])>0){

			/*echo "<pre>";

			var_dump($data['order_cart_details']);
			die();*/
			//echo "<pre>";
			$this->load->model('Cartmanagement');
			foreach ($data['order_cart_details'] as $ckey => $cvalue) {
				$cartDetails = $this->Cartmanagement->getMyCartForPrint($userid,$cvalue['cart_id']);
				//var_dump($cartDetails);
				if(isset($cartDetails[0]) && count($cartDetails[0])>0){
					$data['cart_details'][$ckey] = $cartDetails[0];	
				}
				
			}
		}

		if(isset($data['cart_details']) && count($data['cart_details'])>0){
			$data['page_access'] = 'ACTIVE';
		}
		/*echo "<pre>";
		var_dump($data['cart_details']);
		die();*/
		$this->load->view('printorder',$data);	
	}
	
}
