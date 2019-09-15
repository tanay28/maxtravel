<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transactionmanagement extends CI_Model {


    public function insertTransaction($user_id,$order_id,$available_point,$purchase_amount,$credit_amount,$after_deduction_point,$status,$transactionstatus,$message,$description,$transactionCode){

        $now = date("Y-m-d H:i:s");

        $data = array(
            'transaction_code' => $transactionCode, 
            'user_id' => $user_id,
            'order_id' => $order_id,
            'available_point' => $available_point,
            'purchase_amount' => $purchase_amount,
            'credit_amount' => $credit_amount,
            'after_deduction_point' => $after_deduction_point,
            'status' => $status,
            'transactionstatus' => $transactionstatus,
            'message' => $message,
            'description' => $description,
            'posted_on' => $now
        );

        $this->db->insert('transaction', $data);

        if($this->db->insert_id()>0){
            return $this->db->insert_id();
        }else{
            return false;
        }
    }

    public function getTransactionList($userid){

        $query = "SELECT * FROM transaction
                  WHERE user_id = '".$userid."' 
                  ORDER BY id DESC";
        

        $r = $this->db->query($query)->result_array();

        return $r;
    }

    public function getTransactionDetails($transactionId){

        $query = "SELECT * FROM transaction
                  WHERE id = '".$transactionId."' 
                  ORDER BY id DESC";
        

        $r = $this->db->query($query)->result_array();

        return $r;
    }

    public function getLastTransactionId(){

        $query = "SELECT * FROM transaction
                  WHERE 1 
                  ORDER BY id DESC
                  LIMIT 0,1";
        

        $r = $this->db->query($query)->result_array();

        return $r;
    }
    
}
?>