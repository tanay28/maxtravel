<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cartmanagement extends CI_Model {

    public function countMycart($userid){

        $query = "SELECT COUNT(*) AS C FROM cart
                  WHERE user_id = '".$userid."'
                  AND status = 'ACTIVE' 
                  ORDER BY id DESC";
        

        $r = $this->db->query($query)->result_array();

        return $r;
    }

    public function getMyCart($userid,$status){

        $query = "SELECT * FROM cart
                  WHERE user_id = '".$userid."'
                  AND status = '".$status."' 
                  ORDER BY id DESC";
        

        $r = $this->db->query($query)->result_array();

        return $r;
    }

    public function getMyCartForPrint($userid,$cartid){

        $query = "SELECT * FROM cart
                  WHERE user_id = '".$userid."'
                  AND id = '".$cartid."'
                  ORDER BY id DESC";
        

        $r = $this->db->query($query)->result_array();

        return $r;
    }

    public function deletecart($cartid){

        $query = "DELETE FROM cart WHERE id = '".$cartid."'";
        

        $r = $this->db->query($query);

        return $r;
    }

    public function updateCart($counts,$amount,$cartid){

        $now = date("Y-m-d H:i:s");
        
        $value = array(
            'counts' => $counts,
            'amount' => $amount
        );
        
        $this->db->where(array('id'=>$cartid));
        if( $this->db->update('cart',$value))
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    public function updateCartStatus($status,$cartid){

        $now = date("Y-m-d H:i:s");
        
        $value = array(
            'status' => $status
        );
        
        $this->db->where(array('id'=>$cartid));
        if( $this->db->update('cart',$value))
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    ///////////////////////////////////////////////////////////////////
    

    
}
?>