<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	class Notification_model extends CI_Model
	{
		public function get_all_queries($id)
		{
			$sql = "SELECT * FROM query qr,notification nt,agents ag WHERE qr.id = nt.key_id AND nt.receiver_id = '".$id."' AND ag.id = nt.sender_id";
			return $this->db->query($sql)->result_array();
		}
	}
?>