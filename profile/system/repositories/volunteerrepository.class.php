<?php

class VolunteerRepository{

	private $database;

	public function __construct(){
		$this->database = new DbConnection();
	}
	public function getEmail($id){
		$this->database->connect();
		
		$sql = "SELECT user_name FROM user,organization where user.user_id=organization.u_id and  org_id=?";
		
		// prepared statement is returned
		$stmt = $this->database->initialize($sql);

		//bind
		$stmt->bind_param("i",$id);


		//execution of query
		$stmt->execute();

		//bind the result obtained by executing query
		$stmt->bind_result($em);

		//$stmt = $this->database->fetchquery($sql);
	
		//Store in object so that it can be used in views
		while($stmt->fetch()){
				$email =  $em;
			}
			return $email;
		}
	}
	
?>