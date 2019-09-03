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

		public function get_packages()
		{
			$sql = "SELECT CON.*,MAP.*,AG.first_name FROM contents CON LEFT JOIN agent_package_mapping MAP ON MAP.content_id = CON.id JOIN agents AG ON AG.id=MAP.agent_id WHERE CON.slider_for='package'";
			return $this->db->query($sql)->result_array();
		}
	}
?>