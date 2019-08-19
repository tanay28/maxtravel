<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hotelmanagement extends CI_Model {

    public function getHotelList($whereClause,$status=NULL){
    	
    	$where = '';
    	if($status==NULL){
    		$where.= "H.status <> 'DELETED'";
    	}
    	if(isset($status) && $status!=NULL){
    		$where.= "H.status = '".$status."'";
    	}
        if(isset($whereClause['searchbycity']) && $whereClause['searchbycity']!=''){

            $where.= " AND H.city_id = '".$whereClause['searchbycity']."'";
        }

        $query = "SELECT H.*,CT.city_name,CT.country_id,CN.country_name FROM hotel AS H
                  LEFT JOIN city AS CT
                  ON H.city_id = CT.id
                  JOIN country AS CN
                  ON CT.country_id = CN.id
                  WHERE $where 
                  ORDER BY H.id DESC";
        

        $r = $this->db->query($query)->result_array();

        return $r;
    }

    public function getCityList(){
        
        $query = "SELECT * FROM city 
                  ORDER BY id ASC";
        

        $r = $this->db->query($query)->result_array();

        return $r;
    }

    public function getHotelDetails($hotelid){
    	
        $query = "SELECT * FROM hotel 
                  WHERE id = '".$hotelid."'";
        

        $r = $this->db->query($query)->result_array();

        return $r;
    }

    

    public function insertHotel($hotel_name,$hotel_address,$country_id,$city_id,$facilities,$hotel_category,$room_type,$breakfast,$pernight_room_rate,$no_of_adult,$no_of_child,$created_by,$created_on,$status){

        $now = date("Y-m-d H:i:s");

        $data = array(
            'hotel_name' => $hotel_name,
            'hotel_address' => $hotel_address,
            'country_id' => $country_id,
            'city_id' => $city_id,
            'facilities' => $facilities,
            'hotel_category' => $hotel_category,
            'room_type' => $room_type,
            'breakfast' => $breakfast,
            'pernight_room_rate' => $pernight_room_rate,
            'no_of_adult' => $no_of_adult,
            'no_of_child' => $no_of_child,
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

    public function savecart($user_id,$key_id,$key_type,$key_description,$counts,$amount,$status){

        $now = date("Y-m-d H:i:s");

        $data = array(
            'user_id' => $user_id,
            'key_id' => $key_id,
            'key_type' => $key_type,
            'key_description' => $key_description,
            'counts' => $counts,
            'amount' => $amount,
            'status' => $status,
            'posted_on' => $now
        );

        $this->db->insert('cart', $data);

        if($this->db->insert_id()>0){
            return $this->db->insert_id();
        }else{
            return false;
        }
    }

    public function updateHotel($hotelid,$hotel_name,$hotel_address,$country_id,$city_id,$facilities,$hotel_category,$room_type,$breakfast,$pernight_room_rate,$no_of_adult,$no_of_child){

        $value = array(
            'hotel_name' => $hotel_name,
            'hotel_address' => $hotel_address,
            'country_id' => $country_id,
            'city_id' => $city_id,
            'facilities' => $facilities,
            'hotel_category' => $hotel_category,
            'room_type' => $room_type,
            'breakfast' => $breakfast,
            'pernight_room_rate' => $pernight_room_rate,
            'no_of_adult' => $no_of_adult,
            'no_of_child' => $no_of_child
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