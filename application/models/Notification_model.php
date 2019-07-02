<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	class Notification_model extends CI_Model
	{
		public function get_all_queries($id)
		{
			$sql = "SELECT * FROM query qr,notification nt,agents ag WHERE qr.id = nt.key_id AND nt.receiver_id = '".$id."' AND ag.id = nt.sender_id";
			return $this->db->query($sql)->result_array();
		}
		public function count_unread_notifications($user_id)
		{
			//$sql = "SELECT count(*) AS ct, FROM notification WHERE receiver_id = '".$user_id."' AND status = 'UNREAD'";
			$sql = "SELECT title FROM notification WHERE receiver_id = '".$user_id."' AND status = 'UNREAD'";
			return $this->db->query($sql)->result_array();
		}
		public function reset_all($user_id)
		{
			$sql = "UPDATE notification SET status = 'READ' WHERE receiver_id = '".$user_id."'";
			$rs = $this->db->query($sql);
			if($rs) return true;
			return false;
		}
	}
?>