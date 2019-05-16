<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usermanagement extends CI_Model {

    public function validateLogin($email, $password){
        $password = md5($password);
        $this->db->select("*");
        $query = $this->db->get_where("users", array("email" => $email));
        $p = $query->row_array();

        if($query->num_rows() == 1 && $password == $p['password']){
            return $query->row();
        }else{
            /*echo "<pre>";
            var_dump($p);
            die;*/
        }
    }
    public function validateEmail($email){
        
        $this->db->select("*");
        $query = $this->db->get_where("users", array("email" => $email));
        $p = $query->row_array();

        if($query->num_rows() == 1){  
            return $query->result_array(); 
        }else{
            return false;
        }
    }
    public function validateUser($email)
    {
        $this->db->select("*");
        $query = $this->db->get_where("users", array("email" => $email));
        $p = $query->row_array();

        if($query->num_rows() > 0){  
            return true; 
        }else{
            return false;
        }   
    } 
    public function resetPassword($email,$new)
    {
        $sql = "UPDATE users SET password = '".md5($new)."' WHERE email = '".$email."'";
        return $this->db->query($sql);
    }
    public function changePassword($uid,$pass)
    {
        $value=array('password'=>md5($pass));
        $this->db->where('id',$uid);
        if( $this->db->update('users',$value))
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    public function getcountries()
    {
        $sql = "SELECT * FROM country ORDER BY country_name";
        return $this->db->query($sql)->result_array();
    }
    public function getCities($con)
    {
        $sql = "SELECT * FROM city WHERE country_id = '".$con."'";
        return $this->db->query($sql)->result_array();
    }
    public function insert_user_data($tbl_name,$Arr_users)
    {
        $this->db->insert($tbl_name,$Arr_users);
        return $this->db->insert_id();
    }
}
?>