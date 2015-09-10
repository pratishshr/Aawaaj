<?php
	class AdminRepository{
		private $db;

		public function __construct(){
			$this->db = new DBConnection();
		}

		public function get_all(){
			//ARRAY OBJECT HARU PASS GARNA
			$admin_list = array();

			//DATABASE CONNECTION
			$this->db->connect();

			//SELECT ALL QUERY
			$sql = "SELECT * FROM admins";

			//fetchquery
			$result = $this->db->fetchquery($sql);

			//STORE IN OBJECT AND SEND TO VIEW
			while($row = $result->fetch_assoc()){
				$user = new Admin();

				$user->set_id($row['id']);
				$user->set_username($row['username']);
				$user->set_password($row['password']);
				
				array_push($admin_list,$user);
			}
			$this->db->close();
			return $admin_list;
		}


		public function get_by_id($id){
			$user = null;
			//DATABASE CONNECTION
			$this->db->connect();

			//SELECT BY ID
			$sql = "SELECT * FROM admin WHERE id=?";

			//PREPARE
			$stmt = $this->db->initialize($sql);
			
			//BIND
			$stmt->bind_param("i",$id);

			//EXECUTE
			$stmt->execute();

			//BIND RESULT
			$stmt->bind_result($id,$username,$password);

			while($stmt->fetch()){
			//instantiate object
			$user = new User();

			$user->set_id($id);
			$user->set_username($username);
			$user->set_password($password);
			
		}
			$this->db->close();
			return $user;


	}
	
		public function insert($admin){
			//DATABASE CONNECTION
			$this->db->connect();

			//INSERT QUERY
			$sql = "INSERT INTO admins(username,password) values(?,?)";

			//PREPARE
			$stmt = $this->db->initialize($sql);
			
			//MAP DATA
			$username = $admin->get_username();
			$password = $admin->get_password();
		
			//PASSWORD HASSING USING BCRYPT
			$password=password_hash($pass,PASSWORD_BCRYPT,array('cost'=>12));
	
			//BIND
			$stmt->bind_param("ss",$username,$password);

			//EXECUTE
			$stmt->execute();

			//CLOSE CONNECTION
			$this->db->close();

		}

		public function update($admin){
			//DATABASE CONNECTION
			$this->db->connect();

			//INSERT QUERY
			$sql = "UPDATE admins SET username=?,password=?";

			//PREPARE
			$stmt = $this->db->initialize($sql);

			//MAP DATA
			$user_name = $user->get_username();
			$password = $user->get_password();
			
			//PASSWORD HASSING USING BCRYPT
			$password=password_hash($pass,PASSWORD_BCRYPT,array('cost'=>12));
	
			//BIND
			$stmt->bind_param("ss",$username,$password);

			//EXECUTE
			$result = $stmt->execute();
			$this->db->close();
			return $result;

		}

		public function delete($id){
			//DATABASE CONNECTION
			$this->db->connect();

			//DELETE QUERY
			$sql = "DELETE FROM admins WHERE id=?";
		
			//PREPARE
			$stmt = $this->db->initialize($sql);
			
			//BIND
			$stmt->bind_param("i",$id);

			//EXECUTE
			$result = $stmt->execute();
			$this->db->close();
			return $result;

			

		}
	}
?>