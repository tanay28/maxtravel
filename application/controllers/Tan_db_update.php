<?php

	defined('BASEPATH') OR exit('No direct script access allowed');
	date_default_timezone_set("Asia/Kolkata");
	class Tan_db_update extends CI_Controller
	{
		function __construct()
		{
			parent::__construct();
		}
		public function index()
		{
			$sql = "CREATE TABLE api_log ( id INT NOT NULL AUTO_INCREMENT ,api_name VARCHAR(100) NOT NULL ,user_id VARCHAR(100) NOT NULL ,called_at DATETIME NOT NULL ,api_res TEXT NOT NULL ,status ENUM('success','error','','') NOT NULL , PRIMARY KEY (id))";
			$this->load->model("Tan_model");
			$this->Tan_model->run_sql($sql);
			
		}
	}
?>