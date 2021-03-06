<?php

class ProfileRepository{

	private $db;

	public function __construct(){
		$this->db = new DBconnection();
	}

	public function get_by_id($id){
		$profile = NULL;

		$this->db->connect();
		
		// GET DATA FROM USER TABLE
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
			$profile->set_user_hash($user_hash);
		}

		// GET DATA FROM PROFILE TABLE
		$sql = "SELECT profile_photo,about from profile where u_id=? LIMIT 1";

		// prepared statement is returned
		$stmt = $this->db->initialize($sql);

		//bind
		$stmt->bind_param("i",$user_id);

		//execution of query
		$stmt->execute();

		//bind the result obtained by executing query
		$stmt->bind_result($profile_photo,$about);

		//fetch result
		while($stmt->fetch()){
			//now create object of model so that its setter function can be used
			$profile->set_profile_photo($profile_photo);
			$profile->set_about($about);
		}

		// GET DATA FROM GENERALUSER/ORGANIZATION/WELFARE TABLE BASE ON USER TYPE
		if($user_type == "generalUser"){
			$sql = "SELECT gen_id,age from generaluser where u_id=? LIMIT 1";

			// prepared statement is returned
			$stmt = $this->db->initialize($sql);

			//bind
			$stmt->bind_param("i",$user_id);

			//execution of query
			$stmt->execute();

			//bind the result obtained by executing query
			$stmt->bind_result($profile_id,$age);

			while($stmt->fetch()){
				$profile->set_age($age);
				$profile->set_profile_id($profile_id);
			}
		}

		elseif($user_type == "organization"){
			$sql = "SELECT org_id,name,doe,img,address,objective from organization where u_id=? LIMIT 1";

			// prepared statement is returned
			$stmt = $this->db->initialize($sql);

			//bind
			$stmt->bind_param("i",$user_id);

			//execution of query
			$stmt->execute();

			//bind the result obtained by executing query
			$stmt->bind_result($profile_id,$name,$doe,$img,$address,$objective);

			while($stmt->fetch()){
				$profile->set_profile_id($profile_id);
				$profile->set_name($name);
				$profile->set_doe($doe);
				$profile->set_img($img);
				$profile->set_address($address);
				$profile->set_objective($objective);
			}	
		}

		elseif($user_type == "welfare"){
			$sql = "SELECT welf_id,name,doe,img,address,service,objective from welfare where u_id=? LIMIT 1";

			// prepared statement is returned
			$stmt = $this->db->initialize($sql);

			//bind
			$stmt->bind_param("i",$user_id);

			//execution of query
			$stmt->execute();

			//bind the result obtained by executing query
			$stmt->bind_result($profile_id,$name,$doe,$img,$address,$service,$objective);

			while($stmt->fetch()){
				$profile->set_profile_id($profile_id);
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

	public function get_edit_profile($p_id){
		$this->db->connect();
		$profile = NULL;

		$sql = "SELECT * FROM profile WHERE u_id=?";

		// prepare sql statement
		$stmt = $this->db->initialize($sql);

		// bind $stmt to certain parameters
		$stmt->bind_param("i",$p_id);

		// execute the query
		$stmt->execute();

		// bind the result to certain variables
		$stmt->bind_result($id,$u_id,$profile_photo,$about);

		while($stmt->fetch()){
			$profile = new Profile();
			
			$profile->set_id($id);
			$profile->set_u_id($u_id);
			$profile->set_profile_photo($profile_photo);
			$profile->set_about($about);		
		}

		$this->db->close();
		return $profile;
	}

	public function update($profile,$foto){
		$this->db->connect();
		if($foto){
			$sql = "UPDATE profile SET profile_photo=?,about=? WHERE u_id=?";
			
			$stmt = $this->db->initialize($sql);
			$profile_photo = $profile->get_profile_photo();
			$about = $profile->get_about();
			$id = $profile->get_id();
			
			$stmt->bind_param("ssi",$profile_photo,$about,$id);
		}
		else{
			$sql = "UPDATE profile SET about=? WHERE u_id=?";	
			
			$stmt = $this->db->initialize($sql);
			$about = $profile->get_about();
			$id = $profile->get_id();
			
			$stmt->bind_param("si",$about,$id);
		}

		$stmt->execute();

		$this->db->close();

	}

}