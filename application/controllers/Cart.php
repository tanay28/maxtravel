<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set("Asia/Kolkata");
class Cart extends CI_Controller {

	function __construct()
	{
		parent::__construct();	
		$checkuservars = $this->session->userdata;
		if(!isset($checkuservars['is_logged_in']) && $checkuservars['is_logged_in'] != 1)
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
		$data['user_id'] = $user_id;
		$data['notifications'] = $rs;
		/////////// Notification and Order
		if(isset($_POST) && count($_POST)>0 && isset($_POST['total']) && $_POST['total']!=''){
			
			if(isset($_POST['cart']) && count($_POST['cart'])>0){
				// Update Cart Table
				$this->load->model('Cartmanagement');
				foreach ($_POST['cart'] as $ckey => $cvalue) {
					$counts = $cvalue['quantity'];
					$amount = $cvalue['producttotamount'];
					$cartid = $ckey;
					$this->Cartmanagement->updateCart($counts,$amount,$cartid);
				}
				$this->load->model('Usermanagement');
				$walletPoint = $this->Usermanagement->getUserWalletPoint($user_id);
				if(isset($walletPoint[0]['wallet']) && ($walletPoint[0]['wallet']>=$_POST['total'])){
					
					// Insert Order Table
					$orderno = rand(999,99999);
					$user_id = $user_id;
					$subtotal = isset($_POST['subtotal']) ? $_POST['subtotal'] : 0;
					$tax = isset($_POST['tax']) ? $_POST['tax'] : 0;
					$totalamount = isset($_POST['total']) ? $_POST['total'] : 0;
					$orderstatus = 'CONFIRMED';
					$ordermessage = 'Confirmed Order';
					$this->load->model('Ordermanagement');
					$orderid = $this->Ordermanagement->insertOrder($orderno,$user_id,$subtotal,$tax,$totalamount,$orderstatus,$ordermessage);

					if($orderid>0){
						// Insert Order Details
						foreach ($_POST['cart'] as $ckey1 => $cvalue1) {

							$orderdetailsid = $this->Ordermanagement->insertOrderDetails($orderid,$ckey1);

							// Update Cart Status Table
							$this->Cartmanagement->updateCartStatus('MOVE',$ckey1);

						}
						// Deducted The Wallet Amount
						$deductedWallet = ($walletPoint[0]['wallet'] - $totalamount);

						// Insert Transaction Table
						$this->load->model('Transactionmanagement');
						$available_point = isset($walletPoint[0]['wallet']) ? $walletPoint[0]['wallet'] : 0;
						$status = 'CONFIRMED';
						$message = 'Confirmed Order';
						$this->Transactionmanagement->insertTransaction($user_id,$orderid,$available_point,$totalamount,$deductedWallet,$status,$message);

						// Update User Wallet			
						$this->Usermanagement->updateUserWallet($user_id,$deductedWallet);

						

						$this->session->set_flashdata('success', 'Thank you!! Your oredr has been placed successfully. Point has been deducted from your wallet. <a href="order/orderlist">Click here to see you orders</a>.');

					}else{
						$this->session->set_flashdata('error', 'We could not placed the order. Please try again after sometime.');
					}					
				}else{
					
					$this->session->set_flashdata('error', 'Insufficient Balance. <a href="point/requestpoint">Click here for request point</a>.');
				}
			}else{
				$this->session->set_flashdata('error', 'Item not found in your cart');
			}
		}

		$this->load->model('Cartmanagement');
		$data['cart_details'] = $this->Cartmanagement->getMyCart($user_id,'ACTIVE');

		$this->load->view('mycart',$data);
	}

	public function deletecart(){

		//var_dump('hello');
		if(isset($_POST['cartfield']) && $_POST['cartfield']!=0){
			//var_dump($_POST['checkin']);
			$this->load->model('Cartmanagement');
			$this->Cartmanagement->deletecart($_POST['cartfield']);
			echo json_encode(array('status'=>'true','message'=>'Success.'));
		}else{
			echo json_encode(array('status'=>'false','message'=>'Select Hotel.'));
		}

	}
}
