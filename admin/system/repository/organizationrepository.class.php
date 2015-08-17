<?php
	class OrganizationRepository{
		private $db;

		public function __construct(){
			$this->db = new DBConnection();
		}

		public function get_all(){
			//ARRAY OBJECT HARU PASS GARNA
			$user_list = array();

			//DATABASE CONNECTION
			$this->db->connect();

			//SELECT ALL QUERY
			$sql = "SELECT user_id,user_name,first_name,last_name,contact_number,user_type,user_status,name,doe,img,address,objective FROM user INNER JOIN organization ON user_id = u_id";
			
			//fetchquery
			$result = $this->db->fetchquery($sql);

			//STORE IN OBJECT AND SEND TO VIEW
			while($row = $result->fetch_assoc()){
				$user = new User();

				$user->set_user_id($row['user_id']);
				$user->set_user_name($row['user_name']);
				$user->set_first_name($row['first_name']);
				$user->set_last_name($row['last_name']);
				$user->set_contact_number($row['contact_number']);
				$user->set_user_type($row['user_type']);
				$user->set_user_status($row['user_status']);
				$user->set_name($row['name']);
				$user->set_doe($row['doe']);
				$user->set_img($row['img']);
				$user->set_address($row['address']);
				$user->set_objective($row['objective']);

				array_push($user_list,$user);
			}
			$this->db->close();
			return $user_list;
		}
	}
?>