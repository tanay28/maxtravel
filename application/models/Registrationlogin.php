<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registrationlogin extends CI_Model {

    

    public function validateLogin($email, $password){
        $password = md5($password);
        $this->db->select("*");
        $query = $this->db->get_where("users", array("email" => $email));
        $p = $query->row_array();

        if($query->num_rows() == 1 && $password == $p['password']){
            /*var_dump($query->row());
            die;*/  
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
    public function validateUser($email,$dob)
    {
        $this->db->select("*");
        $query = $this->db->get_where("users", array("email" => $email,'date_of_birth' => $dob));
        $p = $query->row_array();

        if($query->num_rows() > 0){  
            return true; 
        }else{
            return false;
        }   
    } 
    public function resetPassword($email,$dob,$new)
    {
        $sql = "UPDATE users SET password = '".md5($new)."' WHERE email = '".$email."' AND date_of_birth = '".$dob."'";
        return $this->db->query($sql);
    }
}
?>