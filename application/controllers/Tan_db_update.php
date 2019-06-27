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
			$sql = "CREATE TABLE `maxtravel`.`notification` ( `id` INT NOT NULL AUTO_INCREMENT , `key_id` INT NOT NULL , `key_type` VARCHAR(200) NOT NULL , `title` TEXT NOT NULL , `sender_id` INT NOT NULL , `receiver_id` INT NOT NULL , `status` ENUM('UNREAD','READ','DELETED','') NOT NULL , `date_created` DATETIME NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB";
			$this->load->model("Tan_model");
			$this->Tan_model->run_sql($sql);
			
		}
	}
?>