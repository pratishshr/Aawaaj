<?php

class RequirementRepository{

	private $database;

	public function __construct(){
		$this->database = new DbConnection();
	}
	public function get_all($id=null){
		$requirement_list = array();

		//Database Connect
		$this->database->connect();
		
		$sql = "SELECT * FROM selfrequirement where welf_id=?";
		
		// prepared statement is returned
		$stmt = $this->database->initialize($sql);

		//bind
		$stmt->bind_param("i",$id);


		//execution of query
		$stmt->execute();

		//bind the result obtained by executing query
		$stmt->bind_result($welfreq_id,$title,$description,$end_date,$status,$org_name,$welf_id);

		//$stmt = $this->database->fetchquery($sql);
	
		//Store in object so that it can be used in views
		while ($stmt->fetch()) {
			$requirem = new Requirement();
			
			$requirem->setRequirementId($welfareq_id);
			$requirem->setTitle($title);
			$requirem->setDescription($description);
			$requirem->setDate($end_date);
			$requirem->setStatus($status);
			$requirem->setOrgname($org_name);
			$requirem->setWelfId($welf_id);
			

			//$this->get_requirements($project_id,$proj);
			//$this->get_organization($project_id,$proj);
			
			array_push($requirement_list, $requirem);

		}
		$this->database->close();
		return $requirement_list;
		
		
	}
	public function get_last_id(){
		$this->database->connect();
		return $this->database->insert_id();
		$this->database->close();
	}
	public function insert($requirem){

		//Database Connection
		$this->database->connect();		


		$user_id = $_SESSION['user_id'];
		$welf=null;
		$tryql = "SELECT welf_id from welfare,user where user.user_id = welfare.u_id and user.user_id=?";
		$stmt = $this->database->initialize($tryql);

			//bind

			$stmt->bind_param("i",$user_id);
			

			//execution of query
			$stmt->execute();

			//bind the result obtained by executing query
			$stmt->bind_result($welf_id);
			while($stmt->fetch()){
				$welf =  $welf_id;
			}


		//Insert Query
		$sql = "INSERT INTO welfrequirement(title,description,end_date,status,org_name,welf_id) Values(?,?,?,?,?,?)";
		$statement = $this->database->initialize($sql);

		//MAP DATA
		$title = $requirem->getTitle();
		$description = $requirem->getDescription();
		$end_date = $requirem->getDate();
		$status = $requirem->getStatus();
		$org_name = $requirem->getOrgname();
		

		//BIND 
			
		$statement->bind_param("sssisi",$title,$description,$end_date,$status,$org_name,$welf);
		
		if(!$statement->execute()){
			echo "some error";
			exit;
		}
		return $this->database->insert_id();

		//Close the connection
		$this->database->close();
	}
	public function count(){
		

		//DATABASE CONNECTION
		$this->database->connect();

		//SELECT ALL QUERY
		$sql = "SELECT * FROM projects";

		//fetchquery
		$result = $this->database->fetchquery($sql);

		
		$this->database->close();
		return $result->num_rows;

		
	}

	public function count_user_projects($id){
		

		//DATABASE CONNECTION
		$this->database->connect();

		//SELECT ALL QUERY
		$sql = "SELECT count(*) FROM projects,user,organization where user.user_id=organization.u_id and organization.org_id=projects.u_id and user.user_hash=?";

		$stmt = $this->database->initialize($sql);
		$stmt->bind_param("s",$id);
		$stmt->execute();
		$stmt->bind_result($result);
		$stmt->fetch();
		
		return $result;
	}
}
	public function count(){
		

		//DATABASE CONNECTION
		$this->database->connect();

		//SELECT ALL QUERY
		$sql = "SELECT * FROM welfrequirement";

		//fetchquery
		$result = $this->database->fetchquery($sql);

		
		$this->database->close();
		return $result->num_rows;

		
	}

	public function count_user_projects($id){
		

		//DATABASE CONNECTION
		$this->database->connect();

		//SELECT ALL QUERY
		$sql = "SELECT count(*) FROM welfrequirement,user,welfare where user.user_id=welfare.u_id and welfare.welf_id=welfrequirement.welfareq_id and user.user_hash=?";

		$stmt = $this->database->initialize($sql);
		$stmt->bind_param("s",$id);
		$stmt->execute();
		$stmt->bind_result($result);
		$stmt->fetch();
		
		return $result;
	}
}
}