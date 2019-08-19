<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cartmanagement extends CI_Model {

    public function getMyCart($userid,$status){

        $query = "SELECT * FROM cart
                  WHERE user_id = '".$userid."'
                  AND status = '".$status."' 
                  ORDER BY id DESC";
        

        $r = $this->db->query($query)->result_array();

        return $r;
    }

    public function deletecart($cartid){

        $query = "DELETE FROM cart WHERE id = '".$cartid."'";
        

        $r = $this->db->query($query);

        return $r;
    }
    ///////////////////////////////////////////////////////////////////
    

    
}
?>