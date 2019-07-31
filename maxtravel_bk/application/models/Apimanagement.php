<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

    class Apimanagement extends CI_Model
    {
    	public function insert_api_log($arr)
    	{
    		$this->db->insert('api_log',$arr);
    		return $this->db->insert_id();
    	}
    }
?>