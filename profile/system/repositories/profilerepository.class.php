<?php

class ProfileRepository{

	private $db;

	public function __construct(){
		$this->db = new DBconnection();
	}

	public function get_by_id($id){
		$profile = NULL;

		$this->db->connect();
		
		$sql = "SELECT * from user where user_hash=? LIMIT 1";

		// prepared statement is returned
		$stmt = $this->db->initialize($sql);

		//bind
		$stmt->bind_param("s",$id);

		//execution of query
		$stmt->execute();

		//bind the result obtained by executing query
		$stmt->bind_result($user_id,$user_name,$first_name,$last_name,$contact_number,$user_type,$user_status,$user_hash);

		//fetch result
		while($stmt->fetch()){
			//now create object of model so that its setter function can be used
			$profile = new Profile();

			$profile->set_user_id($user_id);
			$profile->set_user_name($user_name);
			$profile->set_first_name($first_name);
			$profile->set_last_name($last_name);
			$profile->set_contact_number($contact_number);
			$profile->set_user_type($user_type);
			$profile->set_user_status($user_status);
		}

		if($user_type == "generalUser"){
			$sql = "SELECT gen_id,age from generaluser where u_id=? LIMIT 1";

			// prepared statement is returned
			$stmt = $this->db->initialize($sql);

			//bind
			$stmt->bind_param("s",$user_id);

			//execution of query
			$stmt->execute();

			//bind the result obtained by executing query
			$stmt->bind_result($gen_id,$age);

			while($stmt->fetch()){
				$profile->set_gen_id($gen_id);
				$profile->set_age($age);
			}
		}

		elseif($user_type == "organization"){
			$sql = "SELECT name,doe,img,address,objective from organization where u_id=? LIMIT 1";

			// prepared statement is returned
			$stmt = $this->db->initialize($sql);

			//bind
			$stmt->bind_param("s",$user_id);

			//execution of query
			$stmt->execute();

			//bind the result obtained by executing query
			$stmt->bind_result($name,$doe,$img,$address,$objective);

			while($stmt->fetch()){
				$profile->set_name($name);
				$profile->set_doe($doe);
				$profile->set_img($img);
				$profile->set_address($address);
				$profile->set_objective($objective);
			}	
		}

		elseif($user_type == "welfare"){
			$sql = "SELECT name,doe,img,address,service,objective from organization where u_id=? LIMIT 1";

			// prepared statement is returned
			$stmt = $this->db->initialize($sql);

			//bind
			$stmt->bind_param("s",$user_id);

			//execution of query
			$stmt->execute();

			//bind the result obtained by executing query
			$stmt->bind_result($name,$doe,$img,$address,$service,$objective);

			while($stmt->fetch()){
				$profile->set_name($name);
				$profile->set_doe($doe);
				$profile->set_img($img);
				$profile->set_address($address);
				$profile->set_service($service);
				$profile->set_objective($objective);
			}	
		}

		$this->db->close();

		return $profile;
	}

}