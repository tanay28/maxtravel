<?php

	defined('BASEPATH') OR exit('No direct script access allowed');
	date_default_timezone_set("Asia/Kolkata");
	class Package_management extends CI_Controller
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
				if($_SERVER['DOCUMENT_ROOT']=='C:/xampp/htdocs'){
					$target_dir = $_SERVER['DOCUMENT_ROOT'].'/maxtravel/assets/content/gallery/'; // Local
				}else{
					$target_dir = $_SERVER['DOCUMENT_ROOT'].'/assets/content/gallery/'; // Server	
				}				
				
			}else{

				if($_SERVER['DOCUMENT_ROOT']=='C:/xampp/htdocs'){
					$target_dir = $_SERVER['DOCUMENT_ROOT'].'/maxtravel/assets/content/'; // Local
				}else{
					$target_dir = $_SERVER['DOCUMENT_ROOT'].'/assets/content/'; // Server
				}
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
			if ($file["size"] > 50000000)
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
	
		public function packages()
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

			$this->load->model('Cartmanagement');
			$rsCart = $this->Cartmanagement->countMycart($user_id);
			$data['cart_count'] = isset($rsCart[0]['C']) ? $rsCart[0]['C'] : 0;

			/////////// Notification and Order
			$data['user_id'] = $user_id;
			$data['notifications'] = $rs;
			/////////// Notification and Order

			//----------- Get all agents ------------//
			$this->load->model('Packagemanagement');
			$data['agents'] = $this->Packagemanagement->get_agent_list(); 
			//----------------- END ----------------//
			// echo '<pre>';
			// var_dump($_POST['cmbAgents']);
			// die;
			if(isset($_POST['txtdestination_name']) && $_POST['txtdestination_name']!='' && isset($_POST['txtcost']) && $_POST['txtcost']!='' && isset($_POST['txtdestinationcode']) && $_POST['txtdestinationcode']!='' && isset($_POST['txtpackagetype']) && $_POST['txtpackagetype']!='' && isset($_POST['txtduration']) && $_POST['txtduration']!='' && isset($_POST['txttourdate']) && $_POST['txttourdate']!='' && isset($_POST['txtCk']) && $_POST['txtCk']!='' && isset($_POST['txtMap']) && $_POST['txtMap']!='')
			{


				//isset($_POST['cmbAgents']) && count($_POST['cmbAgents'])>0
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

					if(isset($_POST['cmbAgents']) && count($_POST['cmbAgents'])>0){
						$Arr = array(
							'slider_name'    => $destination_name,
							'tag_name'       => $destination_name,
							'slider_details' => json_encode($arrDetails),
							'image_name'     => $image_name,
							'slider_for'     => 'package',
							'date_created'   => date('Y-m-d H:i:s'),
							'last_modified'  => date('Y-m-d H:i:s'),
							'status'         => '0',
						);
					}else{
						$Arr = array(
							'slider_name'    => $destination_name,
							'tag_name'       => $destination_name,
							'slider_details' => json_encode($arrDetails),
							'image_name'     => $image_name,
							'slider_for'     => 'package',
							'date_created'   => date('Y-m-d H:i:s'),
							'last_modified'  => date('Y-m-d H:i:s'),
							'status'         => 'ALL',
						);
					}

					$this->load->model('Contentmanagement');
					$id_package = $this->Contentmanagement->insert_data($Arr,'contents');

					$Arr = array(
						'content_id'     => $id_package,
						'content'        => $_POST['txtCk'],
						'image_gallery'  => json_encode($ArrPicName),
						'map_location'   => $_POST['txtMap'],
						'date_created'   => date('Y-m-d H:i:s'),
						'date_modified'  => date('Y-m-d H:i:s')
					);
					$id = $this->Contentmanagement->insert_data($Arr,'dynamic_content');
					if(isset($_POST['cmbAgents']) && count($_POST['cmbAgents'])>0)
					{
						$ag = $_POST['cmbAgents'];
						foreach ($ag as $ikey => $ag_id){
							$Arr = array(
								'content_id'    => $id_package,
								'agent_id'      => $ag_id, 
								'date_created'  => date('Y-m-d H:i:s'),
								'date_modified' => date('Y-m-d H:i:s')
							);
							$this->Contentmanagement->insert_data($Arr,'agent_package_mapping');
						}
					}
					
					$this->session->set_flashdata('success', 'Content creation successful..');
					redirect('package_management/view_packages');
				}
				else
				{
					$msg = isset($arrPic['status']) ? $arrPic['status'] : 'Something went wrong..!! Please try again later..'; 
					$this->session->set_flashdata('error', $msg);	
				}
			}
			$this->load->view('add_package',$data);
		}

		public function view_packages()
		{
			$data['page_access'] = 'INACTIVE';
			if(isset($_SESSION['usertype']) && $_SESSION['usertype']=='SUPERADMIN' || isset($_SESSION['usertype']) && $_SESSION['usertype']=='AGENT'){
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
			$this->load->model('Packagemanagement');
			$agent_id = '';
			if(isset($checkuservars['usertype']))
			{
				$agent_id = $checkuservars['userid'];
			}
			$rs = $this->Packagemanagement->get_packages($agent_id);
			$Dataarr = array();
			
			if(isset($rs) && count($rs)>0)
			{
				foreach ($rs as $ikey => $ivalue)
				{
					$Arr_details = array();
					if(isset($ivalue['slider_details'])) $Arr_details = json_decode($ivalue['slider_details'],true);
					
					/*$Dataarr[] = array(
						'id' => $ivalue['cont_id'],
						'name' => $ivalue['first_name'],
						'slider_name' => $ivalue['slider_name'],
						'tag_name' => $ivalue['tag_name'],
						'details' => $Arr_details,
						'image_name' => $ivalue['image_name'],
					);*/
					$Dataarr[] = array(
						'id' => $ivalue['id'],
						'slider_name' => $ivalue['slider_name'],
						'details' => $Arr_details,
						'image_name' => $ivalue['image_name']
					);
				}
			}
			$data['datas'] = $Dataarr;
			$this->load->view('list_package',$data);
		}
		/*public function show_package()
		{
			$decodeId = 0;
			if($this->uri->segment('3')!='')
			{
				$decodeId = base64_decode($this->uri->segment('3'),true);
			}
			var_dump($decodeId);
			die;
		}*/
		// public function edit_destination()
		// {
		// 	$data = array();
		// 	$data['page_access'] = 'INACTIVE';
		// 	/////////// Notification and Order
		// 	$checkuservars = $this->session->userdata;
		// 	$user_id = isset($checkuservars['userid']) ? $checkuservars['userid'] : '';
		// 	$this->load->model('Notification_model');
		// 	$rs = $this->Notification_model->count_unread_notifications($user_id);
		// 	$data['nofication_count'] = isset($rs) ? count($rs) : 0;
		// 	$data['user_id'] = $user_id;
		// 	$data['notifications'] = $rs;
		// 	/////////// Notification and Order
		// 	if($this->uri->segment('3')!='')
		// 	{
		// 		$decodeId = base64_decode($this->uri->segment('3'),true);
		// 		$this->load->model('Contentmanagement');

				
		// 		if(isset($_POST['txtdestination_name']) && $_POST['txtdestination_name']!='' && isset($_POST['txttag_name']) && $_POST['txttag_name']!='' && isset($_POST['txtcost']) && $_POST['txtcost']!='' && isset($_POST['txtdestinationcode']) && $_POST['txtdestinationcode']!='' && isset($_POST['txtpackagetype']) && $_POST['txtpackagetype']!='' && isset($_POST['txtduration']) && $_POST['txtduration']!='' && isset($_POST['txttourdate']) && $_POST['txttourdate']!='')
		// 		{
		// 			$destination_name = $_POST['txtdestination_name'];
		// 			$tag_name = $_POST['txtdestination_name'];
					
		// 			$cost = $_POST['txtcost'];
		// 			$code = $_POST['txtdestinationcode'];
		// 			$package_type = $_POST['txtpackagetype'];
		// 			$duration = $_POST['txtduration'];
		// 			$date = $_POST['txttourdate'];

		// 			$file = isset($_FILES['filePic']) ? $_FILES['filePic'] : array();
		// 			$Arr = array();
		// 			$arrDetails = array('cost' => $cost,'code' => $code, 'type' => $package_type, 'duration' => $duration, 'date' => $date);
		// 			if(count($file)>0 && $file['tmp_name']!='')
		// 			{
		// 				$arrPic = $this->image_upload($file);
		// 				if(isset($arrPic['status']) && $arrPic['status'] == 'success')
		// 				{
		// 					$image_name = isset($arrPic['file_name']) ? $arrPic['file_name'] : ''; 
							
		// 					$Arr = array(
		// 						'slider_name'    => $destination_name,
		// 						'tag_name'       => $tag_name,
		// 						'slider_details' => json_encode($arrDetails),
		// 						'image_name'     => $image_name,
		// 						'slider_for'     => 'destination',
		// 						'last_modified'  => date('Y-m-d H:i:s')
		// 					);
		// 				}
		// 				else
		// 				{
		// 					$this->session->set_flashdata('error', 'Something went wrong..!! Please try again later..');	
		// 				}
		// 			}
		// 			else
		// 			{
		// 				$Arr = array(
		// 					'slider_name'    => $destination_name,
		// 					'tag_name'       => $tag_name,
		// 					'slider_details' => json_encode($arrDetails),
		// 					'slider_for'     => 'destination',
		// 					'last_modified'  => date('Y-m-d H:i:s')
		// 				);
		// 			}
		// 			$chk = $this->Contentmanagement->update_data($Arr,$decodeId);
		// 			if($chk){
		// 				$this->session->set_flashdata('success', 'Destination update successful..');
		// 			}else{
		// 				$this->session->set_flashdata('error', 'Something went wrong..!! Please try again later.');
		// 			}
		// 			redirect('content_management/view_destinations');

		// 		}
		// 		$rs = $this->Contentmanagement->getContent($decodeId,'destination');
		// 		$arr = array();
		// 		if(isset($rs) && count($rs)>0)
		// 		{
		// 			foreach ($rs as $ikey => $ivalue)
		// 			{
		// 				$Arr_details = array();
		// 				if(isset($ivalue['slider_details'])) $Arr_details = json_decode($ivalue['slider_details'],true);
						
		// 				$arr[] = array(
		// 					'id' => $ivalue['id'],
		// 					'slider_name' => $ivalue['slider_name'],
		// 					'tag_name' => $ivalue['tag_name'],
		// 					'details' => $Arr_details,
		// 					'image_name' => $ivalue['image_name'],
		// 				);
		// 			}
		// 		}

		// 		$data['sliderDetails'] = $arr;
		// 		if(isset($_SESSION['usertype']) && $_SESSION['usertype']=='SUPERADMIN'){
		// 			$data['page_access'] = 'ACTIVE';
		// 		}
		// 	}
		// 	$this->load->view('edit_destinationcontent',$data);
		// }

		public function remove_package()
		{
			// if($this->uri->segment('3')!=''){
			// 	$decodeId = base64_decode($this->uri->segment('3'),true);
			// 	$this->load->model('Contentmanagement');
			// 	$chk = $this->Contentmanagement->remove_content($decodeId);
			// 	if(!$chk){
			// 		$this->session->set_flashdata('error', 'Something went wrong..!! Please try again later..');	
			// 	}else{
			// 		$this->session->set_flashdata('success', 'Content removal successful...');
			// 	}
			// 	redirect('package_management/view_packages');
			// }

			$this->view_packages();
		}

		public function ajax_save_package()
		{
			$checkuservars = $this->session->userdata;
			//if(isset($_POST['id']) && isset($_POST['cost']) && isset($_POST['ptype']) && isset($checkuservars['usertype']) && $checkuservars['usertype'] == 'AGENT' && $_POST['ptype'] == 'package')
			//{
			if(isset($_POST['id']) && isset($_POST['cost']) && isset($_POST['ptype']) && isset($checkuservars['usertype']) && $_POST['ptype'] == 'package')
			{
				$this->load->model('Packagemanagement');
				$user_id = isset($checkuservars['userid']) ? $checkuservars['userid'] : '';
				$p_id = $_POST['id'];
				//$chk = $this->Packagemanagement->check_booking_exists($user_id,$p_id);
				$chk = 1;
				if($chk=1){
					$arr = array(
					'user_id'         => $user_id,
					'key_id'          => $_POST['id'],
					'key_type'        => 'PACKAGE',
					'key_description' => '',
					'counts'          => '1',
					'amount'          => $_POST['cost'],
					'status'          => 'ACTIVE',
					'posted_on'       => date('Y-m-d H:i:s') 
					);
					$id = $this->Packagemanagement->insert_package_to_cart($arr);
					if($id!=0){
						echo 'success';
					}else{
						echo 'error';
					}
				}else{
					echo 'Already added to cart...!!';
				}
				
			}
		}


		public function bookpackageforagent(){

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
			$this->load->model('Packagemanagement');
			$this->load->model('agentmanagement');

			//////////
			if(isset($_POST['bookpackageforagent']) && $_POST['bookpackageforagent']!='' && isset($_POST['usersid']) && $_POST['usersid']!='' && isset($_POST['package_id']) && $_POST['package_id']!=''){

				$userID = $_POST['usersid'];
				$packageID = $_POST['package_id'];

				// Check Account Balance
				$this->load->model('usersmanagement');
				$this->load->model('usermanagement');
				$this->load->model('hotelmanagement');
				$userWalletAmount = $this->usersmanagement->getUserWallet($userID);

				// Get Package Details
				$package_details = $this->Packagemanagement->getpackageDetails($packageID);
				if(isset($package_details[0]['slider_details']) && $package_details[0]['slider_details']!=''){
					$costDetailsArr = json_decode($package_details[0]['slider_details'],true);
					$packageCost = isset($costDetailsArr['cost']) ? $costDetailsArr['cost'] : 0;
					/*echo "<pre>";
					var_dump($userID);
					var_dump($packageID);
					var_dump($userWalletAmount[0]['wallet']);
					var_dump($packageCost);
					die();*/

					
					// Check Wallet Balance
					if(isset($userWalletAmount[0]['wallet']) && $userWalletAmount[0]['wallet']!='' && $userWalletAmount[0]['wallet']>=$packageCost){

							// Insert Into Cart Table

							$cartid = $this->hotelmanagement->savecart($userID,$packageID,'PACKAGE','','1',$packageCost,'MOVE');
							if($cartid>0){

								// Insert Into Order Table
								$orderno = rand(999,99999);
								$subtotal = $packageCost;
								$tax = 0;
								$totalamount = $packageCost;
								$orderstatus = 'CONFIRMED';
								$ordermessage = 'Confirmed Order';
								$this->load->model('Ordermanagement');
								$orderid = $this->Ordermanagement->insertOrder($orderno,$userID,$subtotal,$tax,$totalamount,$orderstatus,$ordermessage);
								if($orderid>0){
									//$this->session->set_flashdata('success', 'Successfully Added The Hotel.');
									$orderdetailsid = $this->Ordermanagement->insertOrderDetails($orderid,$cartid);

									$transactionDescription = $package_details[0]['slider_name'].' / Amount - '.$totalamount.' / Qty - 1,';

									// Deducted The Wallet Amount
									$deductedWallet = ($userWalletAmount[0]['wallet'] - $totalamount);

									// Insert Transaction Table
									$this->load->model('Transactionmanagement');
									$available_point = isset($userWalletAmount[0]['wallet']) ? $userWalletAmount[0]['wallet'] : 0;
									$status = 'CONFIRMED';
									$message = 'Confirmed Order';
									$description = $transactionDescription;
									$lastTransactionId = $this->Transactionmanagement->getLastTransactionId();

									$tid = isset($lastTransactionId[0]->id) ? $lastTransactionId[0]->id : 0;
									$transactionCode = rand(999,99999).$tid; 
									$this->Transactionmanagement->insertTransaction($userID,$orderid,$available_point,$totalamount,'0',$deductedWallet,$status,'DEBIT',$message,$description,$transactionCode);


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
				}else{
					$this->session->set_flashdata('error', 'Package Cost Not Found. Please request from agent end first then you can book for agent this hotel.');
				}
			}
			//////////
			if(isset($_SESSION['usertype']) && $_SESSION['usertype']=='SUPERADMIN'){
				$data['page_access'] = 'ACTIVE';
			}
			$data['package_list'] = $this->Packagemanagement->get_packages('');
			$data['agent_list'] = $this->agentmanagement->getAgents();
			/*echo "<pre>";
			var_dump($data['package_list']);
			die();*/

			$this->load->view('bookpackageforagent',$data);
		}
	}
?>