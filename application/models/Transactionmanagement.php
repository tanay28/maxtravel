<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transactionmanagement extends CI_Model {


    public function insertTransaction($user_id,$order_id,$available_point,$purchase_amount,$after_deduction_point,$status,$message){

        $now = date("Y-m-d H:i:s");

        $data = array(
            'user_id' => $user_id,
            'order_id' => $order_id,
            'available_point' => $available_point,
            'purchase_amount' => $purchase_amount,
            'after_deduction_point' => $after_deduction_point,
            'status' => $status,
            'message' => $message,
            'posted_on' => $now
        );

        $this->db->insert('transaction', $data);

        if($this->db->insert_id()>0){
            return $this->db->insert_id();
        }else{
            return false;
        }
    }
    
}
?>