<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hotelmanagement extends CI_Model {

    public function getHotelList($status=NULL){
    	
    	$where = '';
    	if($status==NULL){
    		$where.= "status <> 'DELETED'";
    	}
    	if(isset($status) && $status!=NULL){
    		$where.= "status = '".$status."'";
    	}
        $query = "SELECT * FROM hotel 
                  WHERE $where 
                  ORDER BY id DESC";
        

        $r = $this->db->query($query)->result_array();

        return $r;
    }

    public function getHotelDetails($hotelid){
    	
        $query = "SELECT * FROM hotel 
                  WHERE id = '".$hotelid."'";
        

        $r = $this->db->query($query)->result_array();

        return $r;
    }

    public function insertHotel($hotel_name,$hotel_address,$facilities,$hotel_category,$room_type,$room_rate_include_breakfast,$room_rate_exclude_breakfast,$created_by,$created_on,$status){

        $now = date("Y-m-d H:i:s");

        $data = array(
            'hotel_name' => $hotel_name,
            'hotel_address' => $hotel_address,
            'facilities' => $facilities,
            'hotel_category' => $hotel_category,
            'room_type' => $room_type,
            'room_rate_include_breakfast' => $room_rate_include_breakfast,
            'room_rate_exclude_breakfast' => $room_rate_exclude_breakfast,
            'created_by' => $created_by,
            'created_on' => $created_on,
            'status' => $status
        );

        $this->db->insert('hotel', $data);

        if($this->db->insert_id()>0){
            return $this->db->insert_id();
        }else{
            return false;
        }
    }

    public function updateHotel($hotelid,$hotel_name,$hotel_address,$facilities,$hotel_category,$room_type,$room_rate_include_breakfast,$room_rate_exclude_breakfast){

        $value = array(
            'hotel_name' => $hotel_name,
            'hotel_address' => $hotel_address,
            'facilities' => $facilities,
            'hotel_category' => $hotel_category,
            'room_type' => $room_type,
            'room_rate_include_breakfast' => $room_rate_include_breakfast,
            'room_rate_exclude_breakfast' => $room_rate_exclude_breakfast
        );
        
        $this->db->where(array('id'=>$hotelid));
        if( $this->db->update('hotel',$value))
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