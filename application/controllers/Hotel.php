<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	date_default_timezone_set("Asia/Kolkata");
	class Hotel extends CI_Controller
	{
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
			$data['page_access'] = 'INACTIVE';
			if(isset($_SESSION['usertype']) && $_SESSION['usertype']=='SUPERADMIN'){
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
			$data['nofication_count'] = isset($rs) ? count($rs) : 0;
			$data['user_id'] = $user_id;
			$data['notifications'] = $rs;
			/////////// Notification and Order

			$this->load->model('hotelmanagement');
			$data['hotel_list'] = $this->hotelmanagement->getHotelList('');

			$this->load->view('listhotel',$data);
		}

		public function lists()
		{
			$data = array();
			$data['page_access'] = 'INACTIVE';
			if(isset($_SESSION['usertype']) && $_SESSION['usertype']=='SUPERADMIN'){
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
			$data['nofication_count'] = isset($rs) ? count($rs) : 0;
			$data['user_id'] = $user_id;
			$data['notifications'] = $rs;
			/////////// Notification and Order

			$this->load->model('hotelmanagement');
			$data['hotel_list'] = $this->hotelmanagement->getHotelList('');

			$this->load->view('listhotel',$data);
		}

		public function book()
		{
			$data = array();
			$data['page_access'] = 'INACTIVE';
			if(isset($_SESSION['usertype']) && ($_SESSION['usertype']=='SUPERADMIN' || $_SESSION['usertype']=='ADMIN' || $_SESSION['usertype']=='AGENT')){
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
			$data['nofication_count'] = isset($rs) ? count($rs) : 0;
			$data['user_id'] = $user_id;
			$data['notifications'] = $rs;
			/////////// Notification and Order

			$whereClause = (isset($_POST['btnSearchhotel']) && $_POST['btnSearchhotel']!='') ? $_POST : '';

			$this->load->model('hotelmanagement');
			$data['hotels'] = $this->hotelmanagement->getHotelList($whereClause);
			$data['city_list'] = $this->hotelmanagement->getCityList();



			$this->load->view('bookhotel',$data);
		}

		public function add()
		{

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

			/////////// Notification and Order
			$data['nofication_count'] = isset($rs) ? count($rs) : 0;
			$data['user_id'] = $user_id;
			$data['notifications'] = $rs;
			/////////// Notification and Order

			/*echo "<pre>";
			var_dump($_POST);
			die();*/
			$this->load->model('hotelmanagement');

			if(isset($_POST['hotel_name']) && $_POST['hotel_name']!=''){

				

				$hotel_name = isset($_POST['hotel_name']) ? $_POST['hotel_name'] : '';
				$hotel_address = isset($_POST['hotel_address']) ? $_POST['hotel_name'] : '';
				$country_id = isset($_POST['country_id']) ? $_POST['country_id'] : 0;
				$city_id = isset($_POST['city_id']) ? $_POST['city_id'] : 0;

				$facilities = '';
				if(isset($_POST['facilities']) && count($_POST['facilities'])>0){
					foreach ($_POST['facilities'] as $fkey => $fvalue) {
						$facilities.= $fvalue.',';
					}
				}
				$hotel_category = (isset($_POST['hotel_category'][0]) && $_POST['hotel_category'][0]!='') ? $_POST['hotel_category'][0] : 0;

				$room_type = isset($_POST['room_type']) ? $_POST['room_type'] : '';
				$breakfast = isset($_POST['breakfast']) ? $_POST['breakfast'] : 'include';
				$pernight_room_rate = isset($_POST['pernight_room_rate']) ? $_POST['pernight_room_rate'] : 0;
				$no_of_adult = isset($_POST['no_of_adult']) ? $_POST['no_of_adult'] : 0;
				$no_of_child = isset($_POST['no_of_child']) ? $_POST['no_of_child'] : 0;
				$subCategories = json_encode($_POST['txtsubCat']);
				$created_by = isset($_SESSION['userid']) ? $_SESSION['userid'] : 0;
				$created_on = date('Y-m-d H:i:s');
				$status = 'ACTIVE';
				

				$xx = $this->hotelmanagement->insertHotel($hotel_name,$hotel_address,$country_id,$city_id,$facilities,$hotel_category,$room_type,$breakfast,$pernight_room_rate,$no_of_adult,$no_of_child,$subCategories,$created_by,$created_on,$status);
				if($xx>0){
					$this->session->set_flashdata('success', 'Successfully Added The Hotel.');
				}else{
					$this->session->set_flashdata('error', 'Something Wrong, Please Try Again After Sometime.');
				}
			}
			

			if(isset($_SESSION['usertype']) && $_SESSION['usertype']=='SUPERADMIN'){
				$data['page_access'] = 'ACTIVE';
			}

			$data['country'] = $this->get_countries();

			$this->load->view('addhotel',$data);
		}

		public function bookhotelforagent(){

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

			$data['nofication_count'] = isset($rs) ? count($rs) : 0;
			$data['user_id'] = $user_id;
			$data['notifications'] = $rs;
			/////////// Notification and Order

			$this->load->model('hotelmanagement');
			$this->load->model('agentmanagement');			
			if(isset($_POST['bookhotelforagent']) && $_POST['bookhotelforagent']!='' && isset($_POST['usersid']) && $_POST['usersid']!='' && isset($_POST['hotel_id']) && $_POST['hotel_id']!='' && isset($_POST['modelcartcheckin']) && $_POST['modelcartcheckin']!='' && isset($_POST['modelcartcheckout']) && $_POST['modelcartcheckout']!='' && isset($_POST['modelcartroom']) && $_POST['modelcartroom']!=''){

				$userID = $_POST['usersid'];
				$hotelID = $_POST['hotel_id'];

				// Check Account Balance
				$this->load->model('usersmanagement');
				$this->load->model('usermanagement');
				$userWalletAmount = $this->usersmanagement->getUserWallet($userID);

				// Get Hotel Details
				$hotel_details = $this->hotelmanagement->getHotelDetails($hotelID);
				// Checkin Time
				$checkin = date('Y-m-d', strtotime($_POST['modelcartcheckin']));
				$checkout = date('Y-m-d', strtotime($_POST['modelcartcheckout']));
				$room = isset($_POST['modelcartroom']) ? $_POST['modelcartroom'] : 1;
				$adults = isset($_POST['modelcartadults']) ? $_POST['modelcartadults'] : 1;
				$child = isset($_POST['modelcartchild']) ? $_POST['modelcartchild'] : 1;

				$numberofDays = $this->dateDiffInDays($checkin,$checkout);

				$pernight_room_rate = isset($hotel_details[0]['pernight_room_rate']) ? $hotel_details[0]['pernight_room_rate'] : 0;
				$totalRoomrate = $pernight_room_rate * $numberofDays * $room;
				
				// Check Wallet Balance
				if(isset($userWalletAmount[0]['wallet']) && $userWalletAmount[0]['wallet']!='' && $userWalletAmount[0]['wallet']>=$totalRoomrate){

						// Insert Into Cart Table
						$key_description = json_encode(array('checkin'=>$checkin,'checkout'=>$checkout,'room'=>$room,'adult'=>$adults,'child'=>$child));

						$cartid = $this->hotelmanagement->savecart($userID,$hotelID,'HOTEL',$key_description,$room,$totalRoomrate,'MOVE');
						if($cartid>0){

							// Insert Into Order Table
							$orderno = rand(999,99999);
							$subtotal = $totalRoomrate;
							$tax = 0;
							$totalamount = $totalRoomrate;
							$orderstatus = 'CONFIRMED';
							$ordermessage = 'Confirmed Order';
							$this->load->model('Ordermanagement');
							$orderid = $this->Ordermanagement->insertOrder($orderno,$userID,$subtotal,$tax,$totalamount,$orderstatus,$ordermessage);
							if($orderid>0){
								//$this->session->set_flashdata('success', 'Successfully Added The Hotel.');
								$orderdetailsid = $this->Ordermanagement->insertOrderDetails($orderid,$cartid);

								$transactionDescription = $hotel_details[0]['hotel_name'].' / Amount - '.$totalRoomrate.' / Qty - '.$room.',';

								// Deducted The Wallet Amount
								$deductedWallet = ($userWalletAmount[0]['wallet'] - $totalRoomrate);

								// Insert Transaction Table
								$this->load->model('Transactionmanagement');
								$available_point = isset($userWalletAmount[0]['wallet']) ? $userWalletAmount[0]['wallet'] : 0;
								$status = 'CONFIRMED';
								$message = 'Confirmed Order';
								$description = $transactionDescription;
								$lastTransactionId = $this->Transactionmanagement->getLastTransactionId();

								$tid = isset($lastTransactionId[0]->id) ? $lastTransactionId[0]->id : 0;
								$transactionCode = rand(999,99999).$tid; 
								$this->Transactionmanagement->insertTransaction($userID,$orderid,$available_point,$totalRoomrate,'0',$deductedWallet,$status,'DEBIT',$message,$description,$transactionCode);


								// Update User Wallet			
								$this->usermanagement->updateUserWallet($userID,$deductedWallet);

						

								$this->session->set_flashdata('success', 'Thank you!! Your oredr has been placed successfully. Point has been deducted from AGENT wallet.');


							}else{
								$this->session->set_flashdata('error', 'We can not post this order. Please try again After Sometime or conttact with system admin.');
							}
						}else{
							$this->session->set_flashdata('error', 'We can not add to cart. Please try again After Sometime or conttact with system admin.');
						}				
				}else{
					$this->session->set_flashdata('error', 'Insufficient fund. Please request from agent end first then you can book for agent this hotel.');
				}

				
				

			}

			if(isset($_SESSION['usertype']) && $_SESSION['usertype']=='SUPERADMIN'){
				$data['page_access'] = 'ACTIVE';
			}
			$data['hotel_list'] = $this->hotelmanagement->getHotelList('');
			$data['agent_list'] = $this->agentmanagement->getAgents();
			/*echo "<pre>";
			var_dump($data['hotel_list']);
			die();*/

			$this->load->view('bookhotelforagent',$data);	
		}

		public function dateDiffInDays($date1, $date2)  
		{ 
		    // Calulating the difference in timestamps 
		    $diff = strtotime($date2) - strtotime($date1); 
		      
		    // 1 day = 24 hours 
		    // 24 * 60 * 60 = 86400 seconds 
		    return abs(round($diff / 86400)); 
		} 
		public function savecart(){

			//var_dump('hello');
			if(isset($_POST['hotelid']) && $_POST['hotelid']!=0){
				//var_dump($_POST['checkin']);
				if(isset($_POST['checkin']) && $_POST['checkin']!='' && isset($_POST['checkout']) && $_POST['checkout']!=''){

					$hotelid = $_POST['hotelid'];
					$checkin = date('Y-m-d',strtotime($_POST['checkin']));
					$checkout = date('Y-m-d',strtotime($_POST['checkout']));
					$room = isset($_POST['room']) ? $_POST['room'] : 1;
					$adult = isset($_POST['adult']) ? $_POST['adult'] : 1;
					$child = isset($_POST['child']) ? $_POST['child'] : 1;

					$this->load->model('Hotelmanagement');
					$hotelDetails = $this->Hotelmanagement->getHotelDetails($hotelid);
					if(isset($hotelDetails[0])){

						$pernightPrice = isset($hotelDetails[0]['pernight_room_rate']) ? $hotelDetails[0]['pernight_room_rate'] : 0;
						$countDays = $this->dateDiffInDays($checkin,$checkout);

						$totalroomamount = $pernightPrice * $countDays * $room;
						$user_id = isset($_SESSION['userid']) ? $_SESSION['userid'] : 0;
						$key_description = json_encode(array('checkin'=>$checkin,'checkout'=>$checkout,'room'=>$room,'adult'=>$adult,'child'=>$child));
						$xx = $this->Hotelmanagement->savecart($user_id,$hotelid,'HOTEL',$key_description,$room,$totalroomamount,'ACTIVE');
						if($xx>0){
							echo json_encode(array('status'=>'true','message'=>'Successfully added into your cart.'));
						}else{
							echo json_encode(array('status'=>'false','message'=>'We are sorry.. something went wrong. Cart not added yet. Try again after sometime'));
						}

					}else{
						echo json_encode(array('status'=>'false','message'=>'Hotel not found.'));
					}
					
				}else{
					echo json_encode(array('status'=>'false','message'=>'Select Checkin and CheckOut.'));
				}
			}else{
				echo json_encode(array('status'=>'false','message'=>'Select Hotel.'));
			}

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

		public function edit()
		{

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

			/////////// Notification and Order
			$data['user_id'] = $user_id;
			$data['notifications'] = $rs;
			/////////// Notification and Order
			
			/*echo "<pre>";
			var_dump($_POST);
			die();*/
			if($this->uri->segment('3')){

				$hotelId = base64_decode($this->uri->segment('3'));

				$this->load->model('hotelmanagement');

				if(isset($_POST['hotel_name']) && $_POST['hotel_name']!=''){

					$old = isset($_POST['txtOldsubCat']) ? $_POST['txtOldsubCat'] : array();
					$new = isset($_POST['txtsubCat']) ? $_POST['txtsubCat'] : array(); 
					$ArrSubCat =  json_encode(array_merge($old,$new));
					$hotel_name = isset($_POST['hotel_name']) ? $_POST['hotel_name'] : '';
					$hotel_address = isset($_POST['hotel_address']) ? $_POST['hotel_name'] : '';
					$country_id = isset($_POST['country_id']) ? $_POST['country_id'] : 0;
					$city_id = isset($_POST['city_id']) ? $_POST['city_id'] : 0;

					$facilities = '';
					if(isset($_POST['facilities']) && count($_POST['facilities'])>0){
						foreach ($_POST['facilities'] as $fkey => $fvalue) {
							$facilities.= $fvalue.',';
						}
					}
					$hotel_category = (isset($_POST['hotel_category'][0]) && $_POST['hotel_category'][0]!='') ? $_POST['hotel_category'][0] : 0;

					$room_type = isset($_POST['room_type']) ? $_POST['room_type'] : '';
					$breakfast = isset($_POST['breakfast']) ? $_POST['breakfast'] : 'include';
					$pernight_room_rate = isset($_POST['pernight_room_rate']) ? $_POST['pernight_room_rate'] : 0;

					$no_of_adult = isset($_POST['no_of_adult']) ? $_POST['no_of_adult'] : 0;
					$no_of_child = isset($_POST['no_of_child']) ? $_POST['no_of_child'] : 0;
					//$created_by = isset($_SESSION['userid']) ? $_SESSION['userid'] : 0;
					//$created_on = date('Y-m-d H:i:s');
					//$status = 'ACTIVE';
					

					$xx = $this->hotelmanagement->updateHotel($hotelId,$hotel_name,$hotel_address,$country_id,$city_id,$facilities,$hotel_category,$room_type,$breakfast,$pernight_room_rate,$no_of_adult,$no_of_child,$ArrSubCat);
					if($xx==true){
						$this->session->set_flashdata('success', 'Successfully Updated The Hotel.');
					}else{
						$this->session->set_flashdata('error', 'Something Wrong, Please Try Again After Sometime.');
					}
				}
			
				$data['hotel_details'] = $this->hotelmanagement->getHotelDetails($hotelId);
				if(isset($_SESSION['usertype']) && $_SESSION['usertype']=='SUPERADMIN'){
					$data['page_access'] = 'ACTIVE';
				}

				$data['country'] = $this->get_countries();
			}
			/*echo "<pre>";
			var_dump($data);
			die();*/
			$this->load->view('edithotel',$data);
		}
	}

?>