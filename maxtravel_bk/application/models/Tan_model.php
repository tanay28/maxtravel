<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	class Tan_model extends CI_Model
	{
		public function __construct()
        {
            parent::__construct();
        }
        public function run_sql($sql)
        {
        	$this->db->query($sql);
        }
    }
?>