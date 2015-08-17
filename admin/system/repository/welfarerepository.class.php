<?php
	class WelfareRepository{
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
			$sql = "SELECT user_id,user_name,first_name,last_name,contact_number,user_type,user_status,name,doe,img,address,service,objective FROM user INNER JOIN welfare ON user_id = u_id";
			
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
				$user->set_welf_name($row['name']);
				$user->set_welf_doe($row['doe']);
				$user->set_welf_img($row['img']);
				$user->set_welf_address($row['address']);
				$user->set_welf_objective($row['objective']);
				$user->set_welf_service($row['service']);

				array_push($user_list,$user);
			}
			$this->db->close();
			return $user_list;
		}
	}
?>