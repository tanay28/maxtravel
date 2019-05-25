<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Agentmanagement extends CI_Model
    {

        public function getAgentDetails($uId){

            $sql = "SELECT A.*,AUM.user_id,AUM.agent_id FROM agent_user_mapping AS AUM
                    JOIN agents AS A
                    ON AUM.agent_id = A.id 
                    WHERE AUM.user_id = '".$uId."'";
            return $this->db->query($sql)->result_array();  


        }

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
                //$sql = "SELECT * FROm agents ORDER by id";
                $sql = "SELECT ag.*, users.status, users.id AS user_id, users.email FROM agents ag LEFT JOIN agent_user_mapping ag_map ON ag.id = ag_map.agent_id LEFT JOIN users ON users.id = ag_map.user_id";
            }
            else
            {
               $sql = "SELECT ag.*, users.status, users.id AS user_id, users.email FROM agents ag LEFT JOIN agent_user_mapping ag_map ON ag.id = ag_map.agent_id LEFT JOIN users ON users.id = ag_map.user_id WHERE ag.id = '".$id."'";
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
        public function getAgentstatus($id)
        {
            $sql = 'SELECT users.status,users.id FROM users LEFT join agent_user_mapping map ON map.user_id = users.id WHERE map.agent_id = "'.$id.'"';
            return $this->db->query($sql);
        }
        public function change_agent_status($id,$status)
        {
            $sql = '';
            if($status == 'ACTIVE') $sql = "UPDATE users SET status = 'INACTIVE' WHERE id='".$id."'";
            if($status == 'INACTIVE') $sql = "UPDATE users SET status = 'ACTIVE' WHERE id='".$id."'";

            $this->db->query($sql);
        }
        public function getcurrency()
        {
            $sql = "SELECT * FROM currency ORDER BY id";
            return $this->db->query($sql)->result_array();
        }
    }
?>