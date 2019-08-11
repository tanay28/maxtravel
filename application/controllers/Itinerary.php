<?php

	defined('BASEPATH') OR exit('No direct script access allowed');
	date_default_timezone_set("Asia/Kolkata");
	class Itinerary extends CI_Controller
	{
		function __construct()
		{
			parent::__construct();
		}
		public function show_itinerary()
		{
			$data = array();
			if($this->uri->segment('3')!='')
			{
				$id = base64_decode($this->uri->segment('3'));
				$this->load->model('Contentmanagement');
				$rs = $this->Contentmanagement->get_itinerary_details($id,'destination');

				// echo '<pre>';
				// var_dump($rs);
				// die;
				$data['itinerary_details'] = $rs;
				$this->load->view('itinerary',$data);
			}
			
		}
	}
?>