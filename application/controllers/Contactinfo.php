<?php

	defined('BASEPATH') OR exit('No direct script access allowed');
	date_default_timezone_set("Asia/Kolkata");
	class Contactinfo extends CI_Controller
	{
		function __construct()
		{
			parent::__construct();
		}
		public function index()
		{
			$data['page_access'] = 'INACTIVE';
			$arr = array();
			$this->load->model('Contactus');
			$rs = $this->Contactus->get_contact_details();
			if(isset($rs) && count($rs)>0)
			{
				foreach ($rs as $ikey => $ivalue)
				{
					$arr[] = array(
						'name'       => $ivalue['name'],
						'email'      => $ivalue['email'],
						'phone'      => $ivalue['phone'],
						'msg'        => $ivalue['msg'],
						'created_at' => $ivalue['created_at']
					);
				}
			}
			if(isset($_SESSION['usertype']) && $_SESSION['usertype']=='SUPERADMIN'){
				$data['page_access'] = 'ACTIVE';
			}
			$data['datas'] = $arr; 
			$this->load->view('contact_info',$data);
		}
	}
?>