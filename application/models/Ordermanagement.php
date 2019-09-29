<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ordermanagement extends CI_Model {


    public function insertOrder($orderno,$user_id,$subtotal,$tax,$totalamount,$orderstatus,$ordermessage){

        $now = date("Y-m-d H:i:s");

        $data = array(
            'orderno' => $orderno,
            'user_id' => $user_id,
            'subtotal' => $subtotal,
            'tax' => $tax,
            'totalamount' => $totalamount,
            'orderstatus' => $orderstatus,
            'ordermessage' => $ordermessage,
            'posted_on' => $now
        );

        $this->db->insert('orders', $data);

        if($this->db->insert_id()>0){
            return $this->db->insert_id();
        }else{
            return false;
        }
    }

    public function insertOrderDetails($order_id,$cart_id){

        $now = date("Y-m-d H:i:s");

        $data = array(
            'order_id' => $order_id,
            'cart_id' => $cart_id
        );

        $this->db->insert('order_details', $data);

        if($this->db->insert_id()>0){
            return $this->db->insert_id();
        }else{
            return false;
        }
    }

    public function getOrderList($userid){

        $query = "SELECT * FROM orders
                  WHERE user_id = '".$userid."' 
                  ORDER BY id DESC";
        

        $r = $this->db->query($query)->result_array();

        return $r;
    }

    public function getOrderDetails($orderid,$userid){

        $query = "SELECT * FROM orders
                  WHERE user_id = '".$userid."'
                  AND id = '".$orderid."' 
                  ORDER BY id DESC";
        

        $r = $this->db->query($query)->result_array();

        return $r;
    }

    public function getOrderCartDetails($orderid){

        $query = "SELECT * FROM order_details
                  WHERE order_id = '".$orderid."' 
                  ORDER BY id DESC";
        

        $r = $this->db->query($query)->result_array();

        return $r;
    }

    
}
?>