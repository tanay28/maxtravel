<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usersmanagement extends CI_Model {   

    public function getUserWallet($id){

        $sql = "SELECT wallet FROM users WHERE id = '".$id."'";
        return $this->db->query($sql)->result_array();        

    }

    public function getUsers($status=NULL){

        $sql = "SELECT U.*,UA.user_id,UA.name,UA.phoneno,UA.address,UA.designation FROM users AS U
                JOIN users_admin AS UA
                ON U.id = UA.user_id 
                WHERE U.userstype = 'ADMIN'
                ORDER BY U.id DESC";
        return $this->db->query($sql)->result_array();        

    }

    public function checkUsers($email){

        $query = $this->db->get_where("users",array('email'=>$email,'userstype'=>'ADMIN','status'=>'ACTIVE'));
        
        $ret = $query->result_array();

        return $ret;        

    }

    public function insertUsers($email,$password,$userstype,$date_created,$status){

        $now = date("Y-m-d H:i:s");
        $data = array(
            'email' => $email,
            'password' => $password,
            'userstype' => $userstype,
            'date_created' => $date_created,
            'status' => $status
        );

        $this->db->insert('users', $data);

        if($this->db->insert_id()>0){
            return $this->db->insert_id();
        }else{
            return false;
        }

        return false;
    }

    public function insertUsersDetails($user_id,$name,$phoneno,$address,$designation){

        $now = date("Y-m-d H:i:s");
        $data = array(
            'user_id' => $user_id,
            'name' => $name,
            'phoneno' => $phoneno,
            'address' => $address,
            'designation' => $designation
        );

        $this->db->insert('users_admin', $data);

        if($this->db->insert_id()>0){
            return $this->db->insert_id();
        }else{
            return false;
        }

        return false;
    }
    
    public function getUsersDetails($uId){

        $sql = "SELECT U.*,UA.user_id,UA.name,UA.phoneno,UA.address,UA.designation FROM users AS U
                JOIN users_admin AS UA
                ON U.id = UA.user_id 
                WHERE U.userstype = 'ADMIN'
                AND U.id = '".$uId."'";
        return $this->db->query($sql)->result_array();  


    }

    public function updateUsers($uid,$password){

        $now = date("Y-m-d H:i:s");

        $whereArray = array('id'=>$uid);

        if($password!=''){
            $value=array('password'=>$password);       

            $this->db->where($whereArray);
            //$this->db->where('user_id',$userid);
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

    public function updateUsersDetails($uid,$name,$phoneno,$address,$designation){

        $now = date("Y-m-d H:i:s");

        $whereArray = array('user_id'=>$uid);

        $value=array('name'=>$name,'phoneno'=>$phoneno,'address'=>$address,'designation'=>$designation);       

        $this->db->where($whereArray);
        //$this->db->where('user_id',$userid);
        if( $this->db->update('users_admin',$value))
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