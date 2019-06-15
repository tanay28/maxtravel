<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	class Contactus extends CI_Model
	{
		public function savecontactdetails($arr)
		{
			$this->db->insert('contact_info',$arr);
			if($this->db->insert_id()>0) return true;
			return false;
		}
		public function get_email_contact()
		{
			$email = '';
			$sql = "SELECT * FROM website_settings ORDER BY id";
			$rs = $this->db->query($sql)->result_array();
			if(isset($rs[0]['contact_email'])) $email = $rs[0]['contact_email'];
			return $email;
		}
		public function get_contact_details()
		{
			$sql = "SELECT * FROM contact_info ORDER BY id";
			$rs = $this->db->query($sql)->result_array();
			return $rs;
		}
	}
?>