<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Dashboard_model extends CI_Model
	{
		public function changePassword($uid,$pass){

        $value=array('password'=>md5($pass));
        $this->db->where('id',$uid);
        if( $this->db->update('users',$value))
        {
            return true;
        }
        else
        {
            return false;
        }
    }
	}
?>