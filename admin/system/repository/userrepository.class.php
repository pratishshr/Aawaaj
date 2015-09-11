<?php
	class UserRepository{
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
			$sql = "SELECT * FROM user";

			//fetchquery
			$result = $this->db->fetchquery($sql);

			//STORE IN OBJECT AND SEND TO VIEW
			while($row = $result->fetch_assoc()){
				$user_model = new User_Model();

				$user_model->set_user_id($row['user_id']);
				$user_model->set_user_name($row['user_name']);
				$user_model->set_first_name($row['first_name']);
				$user_model->set_last_name($row['last_name']);
				$user_model->set_contact_number($row['contact_number']);
				$user_model->set_user_type($row['user_type']);
				$user_model->set_user_status($row['user_status']);

				array_push($user_list,$user_model);
			}
			$this->db->close();
			return $user_list;
		}


		public function get_by_id($id){
			$user = null;
			//DATABASE CONNECTION
			$this->db->connect();

			//SELECT BY ID
			$sql = "SELECT * FROM user WHERE user_id=?";

			//PREPARE
			$stmt = $this->db->initialize($sql);
			
			//BIND
			$stmt->bind_param("i",$id);

			//EXECUTE
			$stmt->execute();

			//BIND RESULT
			$stmt->bind_result($user_id,$user_name,$first_name,$last_name,$contact_number,$user_type,$user_status,$user_hash);

			while($stmt->fetch()){
			//instantiate object
			$user_model = new User_Model();

			$user_model->set_user_id($user_id);
			$user_model->set_user_name($user_name);
			$user_model->set_first_name($first_name);
			$user_model->set_last_name($last_name);
			$user_model->set_contact_number($contact_number);
			$user_model->set_user_type($user_type);
			$user_model->set_user_status($user_status);
		}
			$this->db->close();
			return $user;


	}
	
		public function insert($user){
			//DATABASE CONNECTION
			$this->db->connect();

			//INSERT QUERY
			$sql = "INSERT INTO user(user_name,first_name,last_name,contact_number,user_type,user_status) values(?,?,?,?,?,?)";

			//PREPARE
			$stmt = $this->db->initialize($sql);
			
			//MAP DATA
			$user_name = $user->get_user_name();
			$first_name = $user->get_first_name();
			$last_name = $user->get_last_name();
			$contact_number = $user->get_contact_number();
			$user_type = $user->get_user_type();
			$user_status = $user->get_user_status();
			$pass = $user->get_password();

			//PASSWORD HASSING USING BCRYPT
			$password=password_hash($pass,PASSWORD_BCRYPT,array('cost'=>12));
	
			//BIND
			$stmt->bind_param("sssisi",$user_name,$first_name,$last_name,$contact_number,$user_type,$user_status);

			//EXECUTE
			$stmt->execute();

			//GET LAST ID INSERTED
			$user_id = $this->db->insert_id();

				//INSERT IN PASSWORD TABLE
				$sql = "INSERT INTO password(password,u_id) values(?,?)";

				//PREPARE
					$stmt = $this->db->initialize($sql);

				//BIND
				$stmt->bind_param("si",$password,$user_id);

				//EXECUTE
				$stmt->execute();


				//IF GENERAL USER INSERT IN GENERAL USER db2_tables(connection)
				if($user_type == 'generalUser'){
				
						//INSERT INTO GENERAL USER TABLE
						$sql = "INSERT INTO generaluser(type,u_id) values(?,?)";

						//PREPARE
						$stmt = $this->db->initialize($sql);

						//BIND
						$stmt->bind_param("si",$user_type,$user_id);

						//EXECUTE
						$stmt->execute();
					
				}elseif($user_type == 'organization'){

					//INSERT INTO ORGANIZATION TABLE
					$sql = "INSERT INTO organization(name,doe,img,address,objective,type,u_id) values(?,?,?,?,?,?,?)";

					//PREPARE
					$stmt = $this->db->initialize($sql);	

					//MAP DATA
					$name = $user->get_name();
					$doe = $user->get_doe();
					$img = $user->get_img();
					$address = $user->get_address();
					$objective = $user->get_objective();
				
					//BIND
					$stmt->bind_param("ssssssi",$name,$doe,$img,$address,$objective,$user_type,$user_id);

					//execute
					$stmt->execute();
				
				}elseif($user_type == 'welfare'){
					//INSERT INTO WELFARE TABLE
					
					
					$sql = "INSERT INTO welfare(name,doe,img,address,service,objective,type,u_id) values(?,?,?,?,?,?,?,?)";
					
					//PREPARE
					$stmt = $this->db->initialize($sql);

					//MAP DATA
					$name = $user->get_welf_name();
					$doe = $user->get_welf_doe();
					$img = $user->get_welf_img();
					$address = $user->get_welf_address();
					$service = $user->get_welf_service();
					$objective = $user->get_welf_objective();

					//BIND
					$stmt->bind_param("sssssssi",$name,$doe,$img,$address,$service,$objective,$user_type,$user_id);

					//EXECUTE
					$stmt->execute();
					
				}	


			//CLOSE CONNECTION
					$this->db->close();

		}

		public function update($user){
			//DATABASE CONNECTION
			$this->db->connect();

			//INSERT QUERY
			$sql = "UPDATE user SET user_name=?,first_name=?,last_name=?,contact_number=?,user_status=? WHERE user_id=?";

			//PREPARE
			$stmt = $this->db->initialize($sql);

			//MAP DATA
			$user_name = $user->get_user_name();
			$first_name = $user->get_first_name();
			$last_name = $user->get_last_name();
			$contact_number = $user->get_contact_number();
			$user_type = $user->get_user_type();
			$user_status = $user->get_user_status();
			$id=$user->get_user_id();
	
			//BIND
			$stmt->bind_param("sssiii",$user_name,$first_name,$last_name,$contact_number,$user_status,$id);

			//EXECUTE
			$result = $stmt->execute();
			$this->db->close();
			return $result;

		}

		public function delete($id){
			//DATABASE CONNECTION
			$this->db->connect();

			//DELETE QUERY
			$sql = "DELETE FROM user WHERE user_id=?";
		
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