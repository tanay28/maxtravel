<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Agentmanagement extends CI_Model
    {
        public function validateUser($email)
        {
            $this->db->select("*");
            $query = $this->db->get_where("users", array("email" => $email,"userstype" => "AGENT"));
            $p = $query->row_array();
           
            if($query->num_rows() > 0 && isset($p['id']) && $p['id'] != ''){  
                //return true;
                return $p['id'];
            }else{
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
        public function getAgents($id = '')
        {
            if($id == '')
            {
                $sql = "SELECT * FROm agents ORDER by id";    
            }
            else
            {
                $sql = "SELECT * FROM  agents WHERE id = '".$id."'";
            }
            return $this->db->query($sql)->result_array();
        }
        public function update_agent_data($id,$tab_name,$arr)
        {
            $this->db->where('id',$id);
            if( $this->db->update($tab_name,$arr))
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