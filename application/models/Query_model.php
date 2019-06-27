<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	class Query_model extends CI_Model
	{
		public function insert_data($arr,$table_name)
		{
			$this->db->insert($table_name,$arr);
			return $this->db->insert_id();
		}
		public function get_all_superadmins()
		{
			$sql = "SELECT * FROM users WHERE userstype = 'SUPERADMIN' ORDER BY id";
			return $this->db->query($sql)->result_array();
		}
	}
?>