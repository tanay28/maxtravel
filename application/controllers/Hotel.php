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
				$room_rate_include_breakfast = isset($_POST['room_rate_include_breakfast']) ? $_POST['room_rate_include_breakfast'] : 0;
				$room_rate_exclude_breakfast = isset($_POST['room_rate_exclude_breakfast']) ? $_POST['room_rate_exclude_breakfast'] : 0;
				$no_of_adult = isset($_POST['no_of_adult']) ? $_POST['no_of_adult'] : 0;
				$no_of_child = isset($_POST['no_of_child']) ? $_POST['no_of_child'] : 0;

				$created_by = isset($_SESSION['userid']) ? $_SESSION['userid'] : 0;
				$created_on = date('Y-m-d H:i:s');
				$status = 'ACTIVE';
				

				$xx = $this->hotelmanagement->insertHotel($hotel_name,$hotel_address,$country_id,$city_id,$facilities,$hotel_category,$room_type,$room_rate_include_breakfast,$room_rate_exclude_breakfast,$no_of_adult,$no_of_child,$created_by,$created_on,$status);
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

		public function savecart(){

			var_dump('hello');
			if(isset($_POST['hotelid'])){
				var_dump($_POST);
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

			/*echo "<pre>";
			var_dump($_POST);
			die();*/
			if($this->uri->segment('3')){

				$hotelId = base64_decode($this->uri->segment('3'));

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
					$room_rate_include_breakfast = isset($_POST['room_rate_include_breakfast']) ? $_POST['room_rate_include_breakfast'] : 0;
					$room_rate_exclude_breakfast = isset($_POST['room_rate_exclude_breakfast']) ? $_POST['room_rate_exclude_breakfast'] : 0;

					$no_of_adult = isset($_POST['no_of_adult']) ? $_POST['no_of_adult'] : 0;
					$no_of_child = isset($_POST['no_of_child']) ? $_POST['no_of_child'] : 0;
					//$created_by = isset($_SESSION['userid']) ? $_SESSION['userid'] : 0;
					//$created_on = date('Y-m-d H:i:s');
					//$status = 'ACTIVE';
					

					$xx = $this->hotelmanagement->updateHotel($hotelId,$hotel_name,$hotel_address,$country_id,$city_id,$facilities,$hotel_category,$room_type,$room_rate_include_breakfast,$room_rate_exclude_breakfast,$no_of_adult,$no_of_child);
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