<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	class Packagemanagement extends CI_Model
	{
		public function __construct()
        {
            parent::__construct();
        }
		public function get_agent_list()
		{
			$sql = "SELECT AG.first_name,AG.id FROM agents AG LEFT JOIN users USR ON AG.id = USR.id  WHERE USR.userstype='AGENT' ORDER BY id";
			return $this->db->query($sql)->result_array();
		}

		public function get_packages($agent_id='')
		{
			/*$sql = "SELECT CON.*,CON.id AS cont_id,MAP.*,AG.first_name FROM contents CON LEFT JOIN agent_package_mapping MAP ON MAP.content_id = CON.id JOIN agents AG ON AG.id=MAP.agent_id WHERE CON.slider_for='package' OR CON.status='ALL'";*/
			$sql = 'SELECT * FROM contents WHERE slider_for = "package"';
			
			if($agent_id != '')
			{
				/*$sql = "SELECT CON.*,CON.id AS cont_id,MAP.*,AG.first_name FROM contents CON LEFT JOIN agent_package_mapping MAP ON MAP.content_id = CON.id JOIN agents AG ON AG.id=MAP.agent_id WHERE CON.slider_for='package' AND MAP.agent_id='".$agent_id."'";*/
				$sql = "SELECT * FROM contents WHERE slider_for='package' AND id = (select id from agent_package_mapping WHERE agent_id = '".$agent_id."') OR status = 'ALL'";
			}
			return $this->db->query($sql)->result_array();
		}

		public function insert_package_to_cart($arr)
		{
			$this->db->insert('cart',$arr);
			return $this->db->insert_id();
		}

		public function check_booking_exists($user_id,$p_id)
		{
			$sql = "SELECT count(*) AS cnt FROM cart WHERE user_id = '".$user_id."' AND key_id = '".$p_id."' AND key_type = 'PACKAGE'";
			$rs = $this->db->query($sql)->result_array();
			if(isset($rs[0]['cnt']) && $rs[0]['cnt']!=0) return 1;
			return 0;			
		}
	}
?>