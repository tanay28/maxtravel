<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pointmanagement extends CI_Model {
    
    public function getAllRequestPoints($reciever_id){

        $query = "SELECT * FROM wallet
                  WHERE reciever_id = '".$reciever_id."'
                  AND status = 'REQUEST' 
                  ORDER BY id DESC";
        

        $r = $this->db->query($query)->result_array();

        return $r;
    }

    public function getPointsDetails($id){

        $query = "SELECT * FROM wallet
                  WHERE id = '".$id."'";
        

        $r = $this->db->query($query)->result_array();

        return $r;
    }

    public function requestPoint($sender_id,$request_point,$reciever_id,$approved_point){

        $now = date("Y-m-d H:i:s");

        $data = array(
            'sender_id' => $sender_id,
            'request_point' => $request_point,
            'reciever_id' => $reciever_id,
            'approved_point' => $approved_point,
            'request_date' => $now,
            'status' => 'REQUEST',
            'approve_date' => '0000-00-00 00:00:00'
        );

        $this->db->insert('wallet', $data);

        if($this->db->insert_id()>0){
            return $this->db->insert_id();
        }else{
            return false;
        }
    }

    
    public function approvedPoint($requestedId,$reciever_id,$approved_point){

        $now = date("Y-m-d H:i:s");
        
        $value = array(
            'approved_point' => $approved_point,
            'approve_date' => $now,
            'status' => 'APPROVED'
        );
        
        $this->db->where(array('id'=>$requestedId));
        if( $this->db->update('wallet',$value))
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