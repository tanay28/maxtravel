<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	date_default_timezone_set("Asia/Kolkata");
	class Content_management extends CI_Controller
	{
		private $checkuservars; 
		function __construct()
		{
			parent::__construct();
			$this->checkuservars = $this->session->userdata;

			if(!isset($this->checkuservars['is_logged_in']) && $this->checkuservars['is_logged_in'] != 1)
			{
				redirect('login/logout');
			}
		}
		private function image_upload($file,$flag=0)
		{
			
			if($flag == 1){
				//$target_dir = $_SERVER['DOCUMENT_ROOT'].'/maxtravel/assets/content/gallery/'; // Local
				$target_dir = $_SERVER['DOCUMENT_ROOT'].'/assets/content/gallery/'; // Server
			}else{
				//$target_dir = $_SERVER['DOCUMENT_ROOT'].'/maxtravel/assets/content/'; // Local
				$target_dir = $_SERVER['DOCUMENT_ROOT'].'/assets/content/'; // Server
			}
			
			$target_file = $target_dir . basename($file["name"]);
			
			$uploadOk = 1;
			$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
			
			// Check if file already exists
			if (file_exists($target_file)) {
				$uploadOk = 0;
				unlink($target_file);
			    //return array('status' => 'error', 'msg' => 'Sorry, file already exists.');
			}

			// Check file size
			if ($file["size"] > 2048000)
			{
			    $uploadOk = 0;
			    return array('status' =>'error','msg'=> 'Sorry, your file is too large.');
			}

			// Allow certain file formats
			if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg")
			{
			    $uploadOk = 0;
			 	return array('status' => 'error', 'msg' => 'Please upload .jpg or .png or .jpeg files'); 
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
		private function pdf_upload($file)
		{
			//$target_dir = base_url().'assets/gstdoc/';
			$target_dir = $_SERVER['DOCUMENT_ROOT'].'/maxtravel/assets/content/'; // Local
			//$target_dir = $_SERVER['DOCUMENT_ROOT'].'/assets/content/'; // Server
			$target_file = $target_dir . basename($file["name"]);
		
			$uploadOk = 1;
			$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
			
			// Check if file already exists
			if (file_exists($target_file)) {
				$uploadOk = 0;
				unlink($target_file);
			    //return array('status' => 'error', 'msg' => 'Sorry, file already exists.');
			}

			// Check file size
			if ($file["size"] > 500000)
			{
			    $uploadOk = 0;
			    return array('status' =>'error','msg'=> 'Sorry, your file is too large.');
			}

			// Allow certain file formats
			if($imageFileType != "pdf")
			{
			    $uploadOk = 0;
			 	return array('status' => 'error', 'msg' => 'Please upload .pdf'); 
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
		//------------ Header Management -------------------//
		public function header()
		{
			$data['page_access'] = 'INACTIVE';
			/////////// Notification and Order
			$checkuservars = $this->session->userdata;
			$user_id = isset($checkuservars['userid']) ? $checkuservars['userid'] : '';
			$this->load->model('Notification_model');
			$rs = $this->Notification_model->count_unread_notifications($user_id);
			$data['nofication_count'] = isset($rs) ? count($rs) : 0;
			$data['user_id'] = $user_id;
			$data['notifications'] = $rs;
			/////////// Notification and Order

			if(isset($_SESSION['usertype']) && $_SESSION['usertype']=='SUPERADMIN'){
				$data['page_access'] = 'ACTIVE';
			}

			if(isset($_POST['txtslider_name']) && $_POST['txtslider_name']!='' && isset($_POST['txttag_name']) && $_POST['txttag_name']!='' && isset($_POST['txtduration']) && $_POST['txtduration']!='' && isset($_POST['txtcost']) && $_POST['txtcost']!='')
			{
				$slider_name = $_POST['txtslider_name'];
				$tag_name = $_POST['txttag_name'];
				$duration = $_POST['txtduration'];
				$cost = $_POST['txtcost'];
				$file = $_FILES['filePic'];
				$arrPic = $this->image_upload($file);

				if(isset($arrPic['status']) && $arrPic['status'] == 'success')
				{
					$image_name = isset($arrPic['file_name']) ? $arrPic['file_name'] : ''; 
					$arrDetails = array('duration' => $duration,'cost' => $cost);

					$Arr = array(
						'slider_name'    => $slider_name,
						'tag_name'       => $tag_name,
						'slider_details' => json_encode($arrDetails),
						'image_name'     => $image_name,
						'slider_for'     => 'header',
						'date_created'   => date('Y-m-d H:i:s'),
						'last_modified'  => date('Y-m-d H:i:s'),
						'status'         => '0',
					);

					$this->load->model('Contentmanagement');
					$id = $this->Contentmanagement->insert_data($Arr,'contents');
					$this->session->set_flashdata('success', 'Content creation successful..');
					redirect('content_management/view_header');
				}
				else
				{
					$msg = isset($arrPic['status']) ? $arrPic['status'] : 'Something went wrong..!! Please try again later..'; 
					$this->session->set_flashdata('error', $msg);	
				}
			}
			$this->load->view('add_header_content',$data);
		}
		public function view_header()
		{
			$data['page_access'] = 'INACTIVE';
			/////////// Notification and Order
			$checkuservars = $this->session->userdata;
			$user_id = isset($checkuservars['userid']) ? $checkuservars['userid'] : '';
			$this->load->model('Notification_model');
			$rs = $this->Notification_model->count_unread_notifications($user_id);
			$data['nofication_count'] = isset($rs) ? count($rs) : 0;
			$data['user_id'] = $user_id;
			$data['notifications'] = $rs;
			/////////// Notification and Order

			if(isset($_SESSION['usertype']) && $_SESSION['usertype']=='SUPERADMIN'){
				$data['page_access'] = 'ACTIVE';
			}

			$this->load->model('Contentmanagement');
			$rs = $this->Contentmanagement->get_slider_details('header');
			$Dataarr = array();
			if(isset($rs) && count($rs)>0)
			{
				foreach ($rs as $ikey => $ivalue)
				{
					$Arr_details = array();
					if(isset($ivalue['slider_details'])) $Arr_details = json_decode($ivalue['slider_details'],true);
					
					$Dataarr[] = array(
						'id' => $ivalue['id'],
						'slider_name' => $ivalue['slider_name'],
						'tag_name' => $ivalue['tag_name'],
						'details' => $Arr_details,
						'image_name' => $ivalue['image_name'],
					);
				}
			}
			$data['datas'] = $Dataarr;
			$this->load->view('list_headercontents',$data);
		}

		public function edit_header()
		{
			$data = array();
			$data['page_access'] = 'INACTIVE';
			/////////// Notification and Order
			$checkuservars = $this->session->userdata;
			$user_id = isset($checkuservars['userid']) ? $checkuservars['userid'] : '';
			$this->load->model('Notification_model');
			$rs = $this->Notification_model->count_unread_notifications($user_id);
			$data['nofication_count'] = isset($rs) ? count($rs) : 0;
			$data['user_id'] = $user_id;
			$data['notifications'] = $rs;
			/////////// Notification and Order

			if($this->uri->segment('3')!='')
			{
				$decodeId = base64_decode($this->uri->segment('3'),true);
				$this->load->model('Contentmanagement');

				if(isset($_POST['txtslider_name']) && $_POST['txtslider_name']!='' && isset($_POST['txttag_name']) && $_POST['txttag_name']!='' && isset($_POST['txtduration']) && $_POST['txtduration']!='' && isset($_POST['txtcost']) && $_POST['txtcost']!='')
				{

					$slider_name = $_POST['txtslider_name'];
					$tag_name = $_POST['txttag_name'];
					$duration = $_POST['txtduration'];
					$cost = $_POST['txtcost'];
					$file = isset($_FILES['filePic']) ? $_FILES['filePic'] : array();
					$Arr = array();
					$arrDetails = array('duration' => $duration,'cost' => $cost);
					if(count($file)>0 && $file['tmp_name']!='')
					{
						$arrPic = $this->image_upload($file);
						if(isset($arrPic['status']) && $arrPic['status'] == 'success')
						{
							$image_name = isset($arrPic['file_name']) ? $arrPic['file_name'] : ''; 
							
							$Arr = array(
								'slider_name'    => $slider_name,
								'tag_name'       => $tag_name,
								'slider_details' => json_encode($arrDetails),
								'image_name'     => $image_name,
								'slider_for'     => 'header',
								'last_modified'  => date('Y-m-d H:i:s')
							);
						}
						else
						{
							$this->session->set_flashdata('error', 'Something went wrong..!! Please try again later..');	
						}
					}
					else
					{
						$Arr = array(
							'slider_name'    => $slider_name,
							'tag_name'       => $tag_name,
							'slider_details' => json_encode($arrDetails),
							'slider_for'     => 'header',
							'last_modified'  => date('Y-m-d H:i:s')
						);
					}
					$chk = $this->Contentmanagement->update_data($Arr,$decodeId);
					if($chk){
						$this->session->set_flashdata('success', 'Header update successful..');
					}else{
						$this->session->set_flashdata('error', 'Something went wrong..!! Please try again later.');
					}
					redirect('content_management/view_header');

				}
				$rs = $this->Contentmanagement->getContent($decodeId,'header');
				$arr = array();
				if(isset($rs) && count($rs)>0)
				{
					foreach ($rs as $ikey => $ivalue)
					{
						$Arr_details = array();
						if(isset($ivalue['slider_details'])) $Arr_details = json_decode($ivalue['slider_details'],true);
						
						$arr[] = array(
							'id' => $ivalue['id'],
							'slider_name' => $ivalue['slider_name'],
							'tag_name' => $ivalue['tag_name'],
							'details' => $Arr_details,
							'image_name' => $ivalue['image_name'],
						);
					}
				}

				$data['sliderDetails'] = $arr;
				if(isset($_SESSION['usertype']) && $_SESSION['usertype']=='SUPERADMIN'){
					$data['page_access'] = 'ACTIVE';
				}
			}
			$this->load->view('edit_headercontent',$data);
		}

		public function remove_header_content()
		{
			if($this->uri->segment('3')!=''){
				$decodeId = base64_decode($this->uri->segment('3'),true);
				$this->load->model('Contentmanagement');
				$chk = $this->Contentmanagement->remove_content($decodeId);
				if(!$chk){
					$this->session->set_flashdata('error', 'Something went wrong..!! Please try again later..');	
				}else{
					$this->session->set_flashdata('success', 'Content removal successful...');
				}
				redirect('content_management/view_header');
			}
		}
		//--------------------- END -------------------------//

		//-------------- Event Management -------------------//
		public function events()
		{
			$data['page_access'] = 'INACTIVE';
			/////////// Notification and Order
			$checkuservars = $this->session->userdata;
			$user_id = isset($checkuservars['userid']) ? $checkuservars['userid'] : '';
			$this->load->model('Notification_model');
			$rs = $this->Notification_model->count_unread_notifications($user_id);
			$data['nofication_count'] = isset($rs) ? count($rs) : 0;
			$data['user_id'] = $user_id;
			$data['notifications'] = $rs;
			/////////// Notification and Order
			if(isset($_SESSION['usertype']) && $_SESSION['usertype']=='SUPERADMIN'){
				$data['page_access'] = 'ACTIVE';
			}

			if(isset($_POST['txtevent_name']) && $_POST['txtevent_name']!='' && isset($_POST['txtevent_details']) && $_POST['txtevent_details']!='')
			{
				$event_name = $_POST['txtevent_name'];
				$tag_name = $_POST['txtevent_details'];
				
				$filePic = $_FILES['filePic'];
				$filePdf = $_FILES['filePdf'];
				$arrPic = $this->image_upload($filePic);
				$arrPdf = $this->pdf_upload($filePdf);

				if(isset($arrPic['status']) && $arrPic['status'] == 'success' && isset($arrPdf['status']) && $arrPdf['status'] == 'success')
				{
					$image_name = isset($arrPic['file_name']) ? $arrPic['file_name'] : '';
					$pdf_name = isset($arrPdf['file_name']) ? $arrPdf['file_name'] : ''; 
					$arrDetails = array('pdf_name' => $pdf_name);

					$Arr = array(
						'slider_name'    => $event_name,
						'tag_name'       => $tag_name,
						'slider_details' => json_encode($arrDetails),
						'image_name'     => $image_name,
						'slider_for'     => 'event',
						'date_created'   => date('Y-m-d H:i:s'),
						'last_modified'  => date('Y-m-d H:i:s'),
						'status'         => '0',
					);

					$this->load->model('Contentmanagement');
					$id = $this->Contentmanagement->insert_data($Arr,'contents');
					$this->session->set_flashdata('success', 'Content creation successful..');
					redirect('content_management/view_event');
				}
				else
				{
					$msg = isset($arrPic['status']) ? $arrPic['status'] : 'Something went wrong..!! Please try again later..'; 
					$this->session->set_flashdata('error', $msg);	
				}
			}
			$this->load->view('add_event_content',$data);
		}

		public function view_event()
		{
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
			$data['user_id'] = $user_id;
			$data['notifications'] = $rs;
			/////////// Notification and Order
			$this->load->model('Contentmanagement');
			$rs = $this->Contentmanagement->get_slider_details('event');
			$Dataarr = array();
			if(isset($rs) && count($rs)>0)
			{
				foreach ($rs as $ikey => $ivalue)
				{
					$Arr_details = array();
					if(isset($ivalue['slider_details'])) $Arr_details = json_decode($ivalue['slider_details'],true);
					
					$Dataarr[] = array(
						'id' => $ivalue['id'],
						'slider_name' => $ivalue['slider_name'],
						'tag_name' => $ivalue['tag_name'],
						'details' => $Arr_details,
						'image_name' => $ivalue['image_name'],
					);
				}
			}
			$data['datas'] = $Dataarr;
			$this->load->view('list_eventcontents',$data);
		}

		public function edit_event()
		{
			$data = array();
			$data['page_access'] = 'INACTIVE';
			/////////// Notification and Order
			$checkuservars = $this->session->userdata;
			$user_id = isset($checkuservars['userid']) ? $checkuservars['userid'] : '';
			$this->load->model('Notification_model');
			$rs = $this->Notification_model->count_unread_notifications($user_id);
			$data['nofication_count'] = isset($rs) ? count($rs) : 0;
			$data['user_id'] = $user_id;
			$data['notifications'] = $rs;
			/////////// Notification and Order
			if($this->uri->segment('3')!='')
			{
				$decodeId = base64_decode($this->uri->segment('3'),true);
				$this->load->model('Contentmanagement');

				if(isset($_POST['txtevent_name']) && $_POST['txtevent_name']!='' && isset($_POST['txtevent_details']) && $_POST['txtevent_details']!='')
				{

					$event_name = $_POST['txtevent_name'];
					$tag_name = $_POST['txtevent_details'];
				
					$filePic = isset($_FILES['filePic']) ? $_FILES['filePic'] : array();
					$filePdf = isset($_FILES['filePdf']) ? $_FILES['filePdf'] : array();

					if(count($filePic)>0 && $filePic['tmp_name']!='' && count($filePdf)>0 && $filePdf['tmp_name']!='')
					{
						$arrPic = $this->image_upload($filePic);
						$arrPdf = $this->pdf_upload($filePdf);
						if(isset($arrPic['status']) && $arrPic['status'] == 'success' && isset($arrPdf['status']) && $arrPdf['status'] == 'success')
						{
							$image_name = isset($arrPic['file_name']) ? $arrPic['file_name'] : ''; 
							$pdf_name = isset($arrPdf['file_name']) ? $arrPdf['file_name'] : '';
							$arrDetails = array('pdf_name' => $pdf_name);
							$Arr = array(
								'slider_name'    => $event_name,
								'tag_name'       => $tag_name,
								'slider_details' => json_encode($arrDetails),
								'image_name'     => $image_name,
								'slider_for'     => 'event',
								'last_modified'  => date('Y-m-d H:i:s')
							);
						}
						else
						{
							$this->session->set_flashdata('error', 'Something went wrong..!! Please try again later..');	
						}
					}
					elseif(count($filePic)>0 && $filePic['tmp_name']!='')
					{
						$arrPic = $this->image_upload($filePic);
						if(isset($arrPic['status']) && $arrPic['status'] == 'success')
						{
							$image_name = isset($arrPic['file_name']) ? $arrPic['file_name'] : '';
							$Arr = array(
								'slider_name'    => $event_name,
								'tag_name'       => $tag_name,
								'image_name'     => $image_name,
								'slider_for'     => 'event',
								'last_modified'  => date('Y-m-d H:i:s')
							);
						}
						else
						{
							$this->session->set_flashdata('error', 'Something went wrong..!! Please try again later..');	
						}
					}
					elseif(count($filePdf)>0 && $filePdf['tmp_name']!='')
					{
						$arrPdf = $this->pdf_upload($filePdf);
						if(isset($arrPdf['status']) && $arrPdf['status'] == 'success')
						{ 
							$pdf_name = isset($arrPdf['file_name']) ? $arrPdf['file_name'] : '';
							$arrDetails = array('pdf_name' => $pdf_name);
							$Arr = array(
								'slider_name'    => $event_name,
								'tag_name'       => $tag_name,
								'slider_details' => json_encode($arrDetails),
								'slider_for'     => 'event',
								'last_modified'  => date('Y-m-d H:i:s')
							);
						}
						else
						{
							$this->session->set_flashdata('error', 'Something went wrong..!! Please try again later..');	
						}
					}
					else
					{
						$Arr = array(
							'slider_name'    => $event_name,
							'tag_name'       => $tag_name,
							'slider_for'     => 'event',
							'last_modified'  => date('Y-m-d H:i:s')
						);
					}
					$chk = $this->Contentmanagement->update_data($Arr,$decodeId);
					if($chk){
						$this->session->set_flashdata('success', 'Event update successful..');
					}else{
						$this->session->set_flashdata('error', 'Something went wrong..!! Please try again later.');
					}
					redirect('content_management/view_event');

				}
				$rs = $this->Contentmanagement->getContent($decodeId,'event');
				$arr = array();
				if(isset($rs) && count($rs)>0)
				{
					foreach ($rs as $ikey => $ivalue)
					{
						$Arr_details = array();
						if(isset($ivalue['slider_details'])) $Arr_details = json_decode($ivalue['slider_details'],true);
						
						$arr[] = array(
							'id' => $ivalue['id'],
							'slider_name' => $ivalue['slider_name'],
							'tag_name' => $ivalue['tag_name'],
							'details' => $Arr_details,
							'image_name' => $ivalue['image_name'],
						);
					}
				}

				$data['sliderDetails'] = $arr;
				if(isset($_SESSION['usertype']) && $_SESSION['usertype']=='SUPERADMIN'){
					$data['page_access'] = 'ACTIVE';
				}
			}
			$this->load->view('edit_eventcontent',$data);
		}

		public function remove_event_content()
		{
			if($this->uri->segment('3')!=''){
				$decodeId = base64_decode($this->uri->segment('3'),true);
				$this->load->model('Contentmanagement');
				$chk = $this->Contentmanagement->remove_content($decodeId);
				if(!$chk){
					$this->session->set_flashdata('error', 'Something went wrong..!! Please try again later..');	
				}else{
					$this->session->set_flashdata('success', 'Content removal successful...');
				}
				redirect('content_management/view_event');
			}
		}
		//--------------------- END -------------------------//

		//------------ Destination Management --------------------//
		private function load_html()
		{
			$html = <<<EOF
			<div class="wrap-detais-iti w-100 float-left mt-5" id="section1">
			<h4>Tour Details</h4>
			<p>A family day out to have fun and create unforgettable memories at Damnoen Saduak
			   Floating Market, here you can see one of Thailand’s unique floating markets from
			   which the traders sell all types of produce on small boats along the river such as
			   fruits, local foods, vegetables, and you can enjoy taking a boat trip to see
			   traditional Thai houses, also along the boat trip you can see the orchards that grow
			   several different kinds of fruit and vegetables for example bananas, rose apples,
			   papayas, guava, coconut etc.
			   <br><br>
			   There are more than 200 small canals that were originally dug by local people to
			   connect with each other and to share water and irrigate their land. In the
			   afternoon, Lets have fun with a lovely show of clever elephants and the heart
			   stopping danger of the Crocodile show at Samphran Elephant Ground and Zoo.
			</p>
			<div class="w-100 float-left wrap-sections-iti">
			   <div class="col-lg-5 col-md-12 col-12 float-left left-iti-title">
				  <h3>Price Includes</h3>
			   </div>
			   <div class="col-lg-7 col-md-12 col-12 float-left right-content-iti">
			   	  <ul>
			   	  	<li>
			   	  		<i class="far fa-check-circle"></i>Meals mentioned in the program
			   	  	</li>
			   	  </ul>
				  <P><i class="far fa-check-circle"></i>Meals mentioned in the program</P>
				  <span><i class="far fa-check-circle"></i>Entrance Fees</span>
				  <span><i class="far fa-check-circle"></i>English Speaking Guide</span>
				  <span><i class="far fa-check-circle"></i>All transportation to destination
				  location</span>
				  <span><i class="far fa-check-circle"></i>Hotel transfer</span>
				  <span><i class="far fa-check-circle"></i>Insurance</span>
				  <span><i class="far fa-check-circle"></i>Snorkeling equipment</span>
			   </div>
			</div>
			<div class="w-100 float-left wrap-sections-iti">
			   <div class="col-lg-5 col-md-12 col-12 float-left left-iti-title">
				  <h3>Price Excludes</h3>
			   </div>
			   <div class="col-lg-7 col-md-12 col-12 float-left right-content-iti">
				  <span><i class="far fa-times-circle"></i>Meals mentioned in the program</span>
				  <span><i class="far fa-times-circle"></i>Entrance Fees</span>
				  <span><i class="far fa-times-circle"></i>English Speaking Guide</span>
				  <span><i class="far fa-times-circle"></i>All transportation to destination
				  location</span>
				  <span><i class="far fa-times-circle"></i>Hotel transfer</span>
				  <span><i class="far fa-times-circle"></i>Insurance</span>
				  <span><i class="far fa-times-circle"></i>Snorkeling equipment</span>
			   </div>
			</div>
			<div class="w-100 float-left wrap-sections-iti">
			   <div class="col-lg-5 col-md-12 col-12 float-left left-iti-title">
				  <h3>Pick - up point</h3>
			   </div>
			   <div class="col-lg-7 col-md-12 col-12 float-left right-content-iti">
				  <span><i class="fas fa-car"></i>Pick up from hotels in Khaolak area</span>
				  <span><i class="fas fa-car"></i>Pick up from hotels in Khaolak area Fees</span>
			   </div>
			</div>
			<div class="w-100 float-left wrap-sections-iti">
			   <div class="col-lg-5 col-md-12 col-12 float-left left-iti-title">
				  <h3>Additional Information</h3>
			   </div>
			   <div class="col-lg-7 col-md-12 col-12 float-left right-content-iti">
				  <span><i class="fas fa-star"></i>Program is subjected to change depends on
				  weather and sea conditions</span>
				  <span><i class="fas fa-star"></i>Program is subjected to change depends on
				  weather and sea conditions</span>
				  <span><i class="fas fa-star"></i>Program is subjected to change depends on
				  weather and sea conditions</span>
				  <span><i class="fas fa-star"></i>Program is subjected to change depends on
				  weather and sea conditions</span>
				  <span><i class="fas fa-star"></i>Program is subjected to change depends on
				  weather and sea conditions</span>
			   </div>
			</div>
			</div>
			<div class="wrap-detais-iti w-100 float-left mt-5" id="section2">
				<h4>Itinerary</h4>
				<div class="w-100 float-left wrap-sections-iti">
				<div class="w-100 float-left left-iti-title">
					<h3 class="text-uppercase"><span>8 AM</span> Departure</h3>
				</div>
				<div class="w-100 float-left right-content-iti">
					<p class="mb-0">Welcome to “Wow Andaman” to check in and have breakfast with coffee and tea. An after withdrawal snorkeling equipment. Then e tour guide will brief today’s tour program before we depart to Similan Island National Park</p>
				</div>
				</div>
				<div class="w-100 float-left wrap-sections-iti">
				<div class="w-100 float-left left-iti-title">
					<h3 class="text-uppercase"><span>8 AM</span> Departure</h3>
				</div>
				<div class="w-100 float-left right-content-iti">
					<p class="mb-0">Welcome to “Wow Andaman” to check in and have breakfast with coffee and tea. An after withdrawal snorkeling equipment. Then e tour guide will brief today’s tour program before we depart to Similan Island National Park</p>
				</div>
				</div>
				<div class="w-100 float-left wrap-sections-iti">
				<div class="w-100 float-left left-iti-title">
					<h3 class="text-uppercase"><span>8 AM</span> Departure</h3>
				</div>
				<div class="w-100 float-left right-content-iti">
					<p class="mb-0">Welcome to “Wow Andaman” to check in and have breakfast with coffee and tea. An after withdrawal snorkeling equipment. Then e tour guide will brief today’s tour program before we depart to Similan Island National Park</p>
				</div>
				</div>
				<div class="w-100 float-left wrap-sections-iti">
				<div class="w-100 float-left left-iti-title">
					<h3 class="text-uppercase"><span>8 AM</span> Departure</h3>
				</div>
				<div class="w-100 float-left right-content-iti">
					<p class="mb-0">Welcome to “Wow Andaman” to check in and have breakfast with coffee and tea. An after withdrawal snorkeling equipment. Then e tour guide will brief today’s tour program before we depart to Similan Island National Park</p>
				</div>
				</div>
			</div>
EOF;
			return $html;
		}
		private function config_ckeditor()
		{
			$arr = array();
			$arr = array(
				array( 'Source', '-', 'Bold', 'Italic', 'Underline', '-','Cut','Copy','Paste','PasteText','PasteFromWord','-','Undo','Redo','-','NumberedList','BulletedList' ),
				array('name' => 'document','groups' => array('mode','document','doctools'),'items'=>array('Source','-','Save','NewPage','Preview','Print','-','Templates')),
				array('name' => 'clipboard','groups' => array('clipboard','undo'),'items'=>array('Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo')),
				array('name' => 'editing','groups' => array('find', 'selection', 'spellchecker'),'items'=>array('Find', 'Replace', '-', 'SelectAll', '-', 'Scayt')),
				array('name' => 'forms','items'=>array('Form', 'Checkbox', 'Radio', 'TextField', 'Textarea', 'Select', 'Button', 'ImageButton', 'HiddenField')),
				array('name' => 'basicstyles','groups' => array('basicstyles', 'cleanup'),'items'=>array('Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-', 'RemoveFormat')),
				array('name' => 'paragraph','groups' => array('list', 'indent', 'blocks', 'align', 'bidi'),'items'=>array('NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote', 'CreateDiv', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock', '-', 'BidiLtr', 'BidiRtl', 'Language')),
				array('name' => 'links','items'=>array('Link', 'Unlink', 'Anchor')),
				array('name' => 'insert','items'=>array('Image', 'Flash', 'Table', 'HorizontalRule', 'Smiley', 'SpecialChar', 'PageBreak', 'Iframe')),
				array('name' => 'styles','items'=>array('Styles', 'Format', 'Font', 'FontSize')),
				array('name' => 'colors','items'=>array('TextColor', 'BGColor')),
				array('name' => 'tools','items'=>array('Maximize', 'ShowBlocks')),
				array('name' => 'others','items'=>array('-')),
			);
			return $arr;

		}
	
		public function destinations()
		{
			$this->load->library('ckeditor');
			$this->load->library('ckfinder');
			$html = $this->load_html();
			$this->ckeditor->basePath = base_url().'assets/ckeditor/';
			$this->ckeditor->config['toolbar'] = $this->config_ckeditor();
			$this->ckeditor->config['language'] = 'english';
			$this->ckeditor->config['width'] = '930px';
			$this->ckeditor->config['height'] = '600px';            

			//Add Ckfinder to Ckeditor
			$this->ckfinder->SetupCKEditor($this->ckeditor,base_url('../../assets/ckfinder/'));
			$data['html'] = $html;
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
			$data['user_id'] = $user_id;
			$data['notifications'] = $rs;
			/////////// Notification and Order
			if(isset($_POST['txtdestination_name']) && $_POST['txtdestination_name']!='' && isset($_POST['txtcost']) && $_POST['txtcost']!='' && isset($_POST['txtdestinationcode']) && $_POST['txtdestinationcode']!='' && isset($_POST['txtpackagetype']) && $_POST['txtpackagetype']!='' && isset($_POST['txtduration']) && $_POST['txtduration']!='' && isset($_POST['txttourdate']) && $_POST['txttourdate']!='' && isset($_POST['txtCk']) && $_POST['txtCk']!='' && isset($_POST['txtMap']) && $_POST['txtMap']!='')
			{
				$destination_name = $_POST['txtdestination_name'];
				$tag_name = $_POST['txtdestination_name'];
				
				$cost = $_POST['txtcost'];
				$code = $_POST['txtdestinationcode'];
				$package_type = $_POST['txtpackagetype'];
				$duration = $_POST['txtduration'];
				$date = $_POST['txttourdate'];

				$filePicGall = $_FILES['filePicGall'];
				$ArrPicName = array();
				if(isset($filePicGall) && count($filePicGall)>0)
				{
					foreach($filePicGall['name'] AS $ikey => $ivalue){

						$arr_pic['name'] = $ivalue;
						$arr_pic['type'] = isset($filePicGall['type'][$ikey]) ? $filePicGall['type'][$ikey] : '';
						$arr_pic['tmp_name'] = isset($filePicGall['tmp_name'][$ikey]) ? $filePicGall['tmp_name'][$ikey] : '';
						$arr_pic['error'] = isset($filePicGall['error'][$ikey]) ? $filePicGall['error'][$ikey] : '';
						$arr_pic['size'] = isset($filePicGall['size'][$ikey]) ? $filePicGall['size'][$ikey] : '';
						$arr_pic['size'] = isset($filePicGall['size'][$ikey]) ? $filePicGall['size'][$ikey] : '';
						$Pic_name = $this->image_upload($arr_pic,1);
						array_push($ArrPicName,$ivalue);
						
					}
				}
				
				$filePic = $_FILES['filePic'];
				
				$arrPic = $this->image_upload($filePic,0);
				
				if(isset($arrPic['status']) && $arrPic['status'] == 'success')
				{
					$image_name = isset($arrPic['file_name']) ? $arrPic['file_name'] : ''; 
					$arrDetails = array('cost' => $cost,'code' => $code, 'type' => $package_type, 'duration' => $duration, 'date' => $date);

					$Arr = array(
						'slider_name'    => $destination_name,
						'tag_name'       => $destination_name,
						'slider_details' => json_encode($arrDetails),
						'image_name'     => $image_name,
						'slider_for'     => 'destination',
						'date_created'   => date('Y-m-d H:i:s'),
						'last_modified'  => date('Y-m-d H:i:s'),
						'status'         => '0',
					);

					$this->load->model('Contentmanagement');
					$id = $this->Contentmanagement->insert_data($Arr,'contents');

					$Arr = array(
						'content_id'      => $id,
						'content'        => $_POST['txtCk'],
						'image_gallery'  => json_encode($ArrPicName),
						'map_location'   => $_POST['txtMap'],
						'date_created'   => date('Y-m-d H:i:s'),
						'date_modified'  => date('Y-m-d H:i:s')
					);
					$id = $this->Contentmanagement->insert_data($Arr,'dynamic_content');
					$this->session->set_flashdata('success', 'Content creation successful..');
					redirect('content_management/view_destinations');
				}
				else
				{
					$msg = isset($arrPic['status']) ? $arrPic['status'] : 'Something went wrong..!! Please try again later..'; 
					$this->session->set_flashdata('error', $msg);	
				}
			}
			$this->load->view('add_destination_content',$data);
		}

		public function view_destinations()
		{
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
			$data['user_id'] = $user_id;
			$data['notifications'] = $rs;
			/////////// Notification and Order
			$this->load->model('Contentmanagement');
			$rs = $this->Contentmanagement->get_slider_details('destination');
			$Dataarr = array();
			if(isset($rs) && count($rs)>0)
			{
				foreach ($rs as $ikey => $ivalue)
				{
					$Arr_details = array();
					if(isset($ivalue['slider_details'])) $Arr_details = json_decode($ivalue['slider_details'],true);
					
					$Dataarr[] = array(
						'id' => $ivalue['id'],
						'slider_name' => $ivalue['slider_name'],
						'tag_name' => $ivalue['tag_name'],
						'details' => $Arr_details,
						'image_name' => $ivalue['image_name'],
					);
				}
			}
			$data['datas'] = $Dataarr;
			$this->load->view('list_destinationcontents',$data);
		}

		public function edit_destination()
		{
			$data = array();
			$data['page_access'] = 'INACTIVE';
			/////////// Notification and Order
			$checkuservars = $this->session->userdata;
			$user_id = isset($checkuservars['userid']) ? $checkuservars['userid'] : '';
			$this->load->model('Notification_model');
			$rs = $this->Notification_model->count_unread_notifications($user_id);
			$data['nofication_count'] = isset($rs) ? count($rs) : 0;
			$data['user_id'] = $user_id;
			$data['notifications'] = $rs;
			/////////// Notification and Order
			if($this->uri->segment('3')!='')
			{
				$decodeId = base64_decode($this->uri->segment('3'),true);
				$this->load->model('Contentmanagement');

				
				if(isset($_POST['txtdestination_name']) && $_POST['txtdestination_name']!='' && isset($_POST['txttag_name']) && $_POST['txttag_name']!='' && isset($_POST['txtcost']) && $_POST['txtcost']!='' && isset($_POST['txtdestinationcode']) && $_POST['txtdestinationcode']!='' && isset($_POST['txtpackagetype']) && $_POST['txtpackagetype']!='' && isset($_POST['txtduration']) && $_POST['txtduration']!='' && isset($_POST['txttourdate']) && $_POST['txttourdate']!='')
				{
					$destination_name = $_POST['txtdestination_name'];
					$tag_name = $_POST['txtdestination_name'];
					
					$cost = $_POST['txtcost'];
					$code = $_POST['txtdestinationcode'];
					$package_type = $_POST['txtpackagetype'];
					$duration = $_POST['txtduration'];
					$date = $_POST['txttourdate'];

					$file = isset($_FILES['filePic']) ? $_FILES['filePic'] : array();
					$Arr = array();
					$arrDetails = array('cost' => $cost,'code' => $code, 'type' => $package_type, 'duration' => $duration, 'date' => $date);
					if(count($file)>0 && $file['tmp_name']!='')
					{
						$arrPic = $this->image_upload($file);
						if(isset($arrPic['status']) && $arrPic['status'] == 'success')
						{
							$image_name = isset($arrPic['file_name']) ? $arrPic['file_name'] : ''; 
							
							$Arr = array(
								'slider_name'    => $destination_name,
								'tag_name'       => $tag_name,
								'slider_details' => json_encode($arrDetails),
								'image_name'     => $image_name,
								'slider_for'     => 'destination',
								'last_modified'  => date('Y-m-d H:i:s')
							);
						}
						else
						{
							$this->session->set_flashdata('error', 'Something went wrong..!! Please try again later..');	
						}
					}
					else
					{
						$Arr = array(
							'slider_name'    => $destination_name,
							'tag_name'       => $tag_name,
							'slider_details' => json_encode($arrDetails),
							'slider_for'     => 'destination',
							'last_modified'  => date('Y-m-d H:i:s')
						);
					}
					$chk = $this->Contentmanagement->update_data($Arr,$decodeId);
					if($chk){
						$this->session->set_flashdata('success', 'Destination update successful..');
					}else{
						$this->session->set_flashdata('error', 'Something went wrong..!! Please try again later.');
					}
					redirect('content_management/view_destinations');

				}
				$rs = $this->Contentmanagement->getContent($decodeId,'destination');
				$arr = array();
				if(isset($rs) && count($rs)>0)
				{
					foreach ($rs as $ikey => $ivalue)
					{
						$Arr_details = array();
						if(isset($ivalue['slider_details'])) $Arr_details = json_decode($ivalue['slider_details'],true);
						
						$arr[] = array(
							'id' => $ivalue['id'],
							'slider_name' => $ivalue['slider_name'],
							'tag_name' => $ivalue['tag_name'],
							'details' => $Arr_details,
							'image_name' => $ivalue['image_name'],
						);
					}
				}

				$data['sliderDetails'] = $arr;
				if(isset($_SESSION['usertype']) && $_SESSION['usertype']=='SUPERADMIN'){
					$data['page_access'] = 'ACTIVE';
				}
			}
			$this->load->view('edit_destinationcontent',$data);
		}

		public function remove_destination_content()
		{
			if($this->uri->segment('3')!=''){
				$decodeId = base64_decode($this->uri->segment('3'),true);
				$this->load->model('Contentmanagement');
				$chk = $this->Contentmanagement->remove_content($decodeId);
				if(!$chk){
					$this->session->set_flashdata('error', 'Something went wrong..!! Please try again later..');	
				}else{
					$this->session->set_flashdata('success', 'Content removal successful...');
				}
				redirect('content_management/view_destinations');
			}
		}
		//----------------------- END ----------------------------//

		//--------------- Feedback Management -------------------//
		public function feedback()
		{
			$data['page_access'] = 'INACTIVE';
			/////////// Notification and Order
			$checkuservars = $this->session->userdata;
			$user_id = isset($checkuservars['userid']) ? $checkuservars['userid'] : '';
			$this->load->model('Notification_model');
			$rs = $this->Notification_model->count_unread_notifications($user_id);
			$data['nofication_count'] = isset($rs) ? count($rs) : 0;
			$data['user_id'] = $user_id;
			$data['notifications'] = $rs;
			/////////// Notification and Order
			if(isset($_SESSION['usertype']) && $_SESSION['usertype']=='SUPERADMIN'){
				$data['page_access'] = 'ACTIVE';
			}
			if(isset($_POST['txtfeedback_name']) && $_POST['txtfeedback_name']!='' && isset($_POST['txtlink']) && $_POST['txtlink']!='')
			{
				$feedback_name = $_POST['txtfeedback_name'];
				$image_name = $_POST['txtlink'];
				$feedback_given_by = isset($_POST['txtfeedback_given_by']) ? $_POST['txtfeedback_given_by'] : 'NA';
				$arrDetails = array('given_by' => $feedback_given_by);

				$Arr = array(
					'slider_name'    => $feedback_name,
					'tag_name'       => $feedback_name,
					'slider_details' => json_encode($arrDetails),
					'image_name'     => $image_name,
					'slider_for'     => 'feedback',
					'date_created'   => date('Y-m-d H:i:s'),
					'last_modified'  => date('Y-m-d H:i:s'),
					'status'         => '0',
				);

				$this->load->model('Contentmanagement');
				$id = $this->Contentmanagement->insert_data($Arr,'contents');
				$this->session->set_flashdata('success', 'Content creation successful..');
				redirect('content_management/view_Feedbacks');
			}
			$this->load->view('add_feedback_content',$data);
		}

		public function view_feedbacks()
		{
			$data['page_access'] = 'INACTIVE';
			/////////// Notification and Order
			$checkuservars = $this->session->userdata;
			$user_id = isset($checkuservars['userid']) ? $checkuservars['userid'] : '';
			$this->load->model('Notification_model');
			$rs = $this->Notification_model->count_unread_notifications($user_id);
			$data['nofication_count'] = isset($rs) ? count($rs) : 0;
			$data['user_id'] = $user_id;
			$data['notifications'] = $rs;
			/////////// Notification and Order
			if(isset($_SESSION['usertype']) && $_SESSION['usertype']=='SUPERADMIN'){
				$data['page_access'] = 'ACTIVE';
			}

			$this->load->model('Contentmanagement');
			$rs = $this->Contentmanagement->get_slider_details('feedback');
			$Dataarr = array();
			if(isset($rs) && count($rs)>0)
			{
				foreach ($rs as $ikey => $ivalue)
				{
					$Arr_details = array();
					if(isset($ivalue['slider_details'])) $Arr_details = json_decode($ivalue['slider_details'],true);
					$Dataarr[] = array(
						'id' => $ivalue['id'],
						'slider_name' => $ivalue['slider_name'],
						'tag_name' => $ivalue['tag_name'],
						'details' => $Arr_details,
						'image_name' => $ivalue['image_name'],
					);
				}
			}
			
			$data['datas'] = $Dataarr;
			$this->load->view('list_feedbackcontents',$data);
		}
		
		public function remove_feedback_content()
		{
			if($this->uri->segment('3')!=''){
				$decodeId = base64_decode($this->uri->segment('3'),true);
				$this->load->model('Contentmanagement');
				$chk = $this->Contentmanagement->remove_content($decodeId);
				if(!$chk){
					$this->session->set_flashdata('error', 'Something went wrong..!! Please try again later..');	
				}else{
					$this->session->set_flashdata('success', 'Content removal successful...');
				}
				redirect('content_management/view_feedbacks');
			}
		}
		//----------------------- END ----------------------------//
	}

?>