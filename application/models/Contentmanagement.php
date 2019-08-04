<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	class Contentmanagement extends CI_Model
	{
		public function __construct()
        {
            parent::__construct();
        }
		public function insert_data($arr)
		{
			$this->db->insert('contents',$arr);
			return $this->db->insert_id();
		}
		public function get_slider_details($slider_for)
		{
			$sql = "SELECT * FROM contents WHERE slider_for = '".$slider_for."' AND status = 0 ORDER BY id";
			return $this->db->query($sql)->result_array();
		}
		public function getContent($id,$slider_for)
		{
			$sql = "SELECT * FROM contents WHERE slider_for = '".$slider_for."' AND id = '".$id."' AND status = 0 ORDER BY id";
			return $this->db->query($sql)->result_array();
		}
		public function update_data($Arr,$id)
		{
			$whereArray = array('id'=>$id);
			if(isset($Arr) && count($Arr)>0)
			{
				$this->db->where($whereArray);
				if( $this->db->update('contents',$Arr))
	            {
	                return true;
	            }
	            else
	            {
	                return false;
	            }
			}
		}
		public function remove_content($id)
		{
			$flag = false;
			$sql = 'UPDATE contents SET status = 1 WHERE id = "'.$id.'"';
			$rs = $this->db->query($sql);
			if($rs){
				$flag = true;
			}
			return $flag;
		}
	}
?>