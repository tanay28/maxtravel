<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employeemanagement extends CI_Model {   


    public function getEmployee($status=NULL){

        $sql = "SELECT U.*,E.user_id,E.name,E.phoneno,E.address,E.designation FROM users AS U
                JOIN employee AS E
                ON U.id = E.user_id 
                WHERE U.userstype = 'EMPLOYEE'
                ORDER BY U.id DESC";
        return $this->db->query($sql)->result_array();        

    }

    public function checkEmployee($email){

        $query = $this->db->get_where("users",array('email'=>$email,'userstype'=>'EMPLOYEE','status'=>'ACTIVE'));
        
        $ret = $query->result_array();

        return $ret;        

    }

    public function insertEmployee($email,$password,$userstype,$date_created,$status){

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

    public function insertEmployeeDetails($user_id,$name,$phoneno,$address,$designation){

        $now = date("Y-m-d H:i:s");
        $data = array(
            'user_id' => $user_id,
            'name' => $name,
            'phoneno' => $phoneno,
            'address' => $address,
            'designation' => $designation
        );

        $this->db->insert('employee', $data);

        if($this->db->insert_id()>0){
            return $this->db->insert_id();
        }else{
            return false;
        }

        return false;
    }
    
    public function getEmployeeDetails($uId){

        $sql = "SELECT U.*,E.user_id,E.name,E.phoneno,E.address,E.designation FROM users AS U
                JOIN employee AS E
                ON U.id = E.user_id 
                WHERE U.userstype = 'EMPLOYEE'
                AND U.id = '".$uId."'";
        return $this->db->query($sql)->result_array();  


    }

    public function updateEmployee($uid,$password){

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

    public function updateEmployeeDetails($uid,$name,$phoneno,$address,$designation){

        $now = date("Y-m-d H:i:s");

        $whereArray = array('user_id'=>$uid);

        $value=array('name'=>$name,'phoneno'=>$phoneno,'address'=>$address,'designation'=>$designation);       

        $this->db->where($whereArray);
        //$this->db->where('user_id',$userid);
        if( $this->db->update('employee',$value))
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