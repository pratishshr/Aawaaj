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
				$admin_model = new Admin_Model();

				$admin_model->set_id($row['id']);
				$admin_model->set_username($row['username']);
				$admin_model->set_password($row['password']);
				$admin_model->set_first_name($row['first_name']);
				$admin_model->set_last_name($row['last_name']);
				$admin_model->set_email($row['email']);
				$admin_model->set_image($row['image']);
				array_push($admin_list,$admin_model);
			}
			$this->db->close();
			return $admin_list;
		}


		public function get_by_id($id){
			$user = null;
			//DATABASE CONNECTION
			$this->db->connect();

			//SELECT BY ID
			$sql = "SELECT * FROM admins WHERE id=?";

			//PREPARE
			$stmt = $this->db->initialize($sql);
			
			//BIND
			$stmt->bind_param("i",$id);

			//EXECUTE
			$stmt->execute();

			//BIND RESULT
			$stmt->bind_result($id,$username,$password,$first_name,$last_name,$email,$image);

			while($stmt->fetch()){
			//instantiate object
			$admin_model = new Admin_Model();

			$admin_model->set_id($id);
			$admin_model->set_username($username);
			$admin_model->set_password($password);
			$admin_model->set_first_name($first_name);
			$admin_model->set_last_name($last_name);
			$admin_model->set_email($email);
			$admin_model->set_image($image);
			
		}
			$this->db->close();
			return $admin_model;


	}
	
		public function insert($admin){
			//DATABASE CONNECTION
			$this->db->connect();

			//INSERT QUERY
			$sql = "INSERT INTO admins(username,password,first_name,last_name,email,image) values(?,?,?,?,?,?)";

			//PREPARE
			$stmt = $this->db->initialize($sql);
			
			//MAP DATA
			$username = $admin->get_username();
			$password = $admin->get_password();
			$first_name = $admin->get_first_name();
			$last_name = $admin->get_last_name();
			$email = $admin->get_email();
			$image = $admin->get_image();
			//PASSWORD HASSING USING BCRYPT
			$password=password_hash($password,PASSWORD_BCRYPT,array('cost'=>12));
	
			//BIND
			$stmt->bind_param("ssssss",$username,$password,$first_name,$last_name,$email,$image);

			//EXECUTE
			$stmt->execute();

			//CLOSE CONNECTION
			$this->db->close();

		}

		public function update($admin){
			//DATABASE CONNECTION
			$this->db->connect();

			//INSERT QUERY
			$sql = "UPDATE admins SET username=?,password=?,first_name=?,last_name=?,$email=?,$image=?";

			//PREPARE
			$stmt = $this->db->initialize($sql);

			//MAP DATA
			$user_name = $admin->get_username();
			$password = $admin->get_password();
			$first_name=$admin->get_first_name();
			$last_name = $admin->get_last_name();
			$email = $admin->get_email();
			$image = $admin->get_image();
			//PASSWORD HASSING USING BCRYPT
			$password=password_hash($pass,PASSWORD_BCRYPT,array('cost'=>12));
	
			//BIND
			$stmt->bind_param("ssss",$username,$password,$first_name,$last_name,$email,$image);

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

		public function check_username($username){
			//DATABASE CONNECTION
			$this->db->connect();

			//DELETE QUERY
			$sql = "SELECT username FROM admins WHERE username=? ";
		
			//PREPARE
			$stmt = $this->db->initialize($sql);
			
			//BIND
			$stmt->bind_param("s",$username);

			//EXECUTE
			$result = $stmt->execute();
			$value=null;
			//BIND RESULT
			$stmt->bind_result($username);

			while($stmt->fetch()){
				echo json_encode(array('exists' => true));
				exit;
			}
			echo json_encode(array('exists' => false));
			$this->db->close();
			
		}

		public function get_by_username($username){
			$user = null;
			//DATABASE CONNECTION
			$this->db->connect();

			//SELECT BY ID
			$sql = "SELECT * FROM admins WHERE username=?";

			//PREPARE
			$stmt = $this->db->initialize($sql);
			
			//BIND
			$stmt->bind_param("s",$username);

			//EXECUTE
			$stmt->execute();

			//BIND RESULT
			$stmt->bind_result($id,$username,$password,$first_name,$last_name,$email,$image);

			while($stmt->fetch()){
			//instantiate object
			$admin_model = new Admin_Model();

			$admin_model->set_id($id);
			$admin_model->set_username($username);
			$admin_model->set_password($password);
			$admin_model->set_first_name($first_name);
			$admin_model->set_last_name($last_name);
			$admin_model->set_email($email);
			$admin_model->set_image($image);
			
			}
			$this->db->close();
			return $admin_model;

		}
	}
?>