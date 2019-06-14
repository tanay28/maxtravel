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
	}
?>