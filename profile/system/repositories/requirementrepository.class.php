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
		
		$sql = "SELECT * FROM welfrequirement where welf_id=?";
		
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
			
			$requirem->setRequirementId($welfreq_id);
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
	public function get_by_id($requirement_id){
		
		$this->database->connect();
		$sql = "SELECT * FROM welfrequirement WHERE welfreq_id=?";

		//prepare the statement
		$statement = $this->database->initialize($sql);

		//Bind the parameters
		$statement->bind_param("i",$requirement_id);

		//Execute the above statement
		$statement->execute();

		//Bind the result
		$statement->bind_result($welfreq_id,$title,$description,$end_date,$status,$org_name,$welf_id);
		$req = NULL;
		while ($statement->fetch()) {
			$req = new Requirement();
			$req->setRequirementId($welfreq_id);
			$req->setTitle($title);
			$req->setDescription($description);
			$req->setDate($end_date);
			$req->setStatus($status);
			$req->setOrgname($org_name);
			$req->setWelfId($welf_id);

		
		}
		//Close Connection
		$this->database->close();
		return $req;
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

	public function count_user_requirements($id){
		

		//DATABASE CONNECTION
		$this->database->connect();

		//SELECT ALL QUERY
		$sql = "SELECT count(*) FROM welfrequirement,user,welfare where user.user_id=welfare.u_id and welfare.welf_id=welfrequirement.welf_id and user.user_hash=?";

		$stmt = $this->database->initialize($sql);
		$stmt->bind_param("s",$id);
		$stmt->execute();
		$stmt->bind_result($result);
		$stmt->fetch();
		
		$this->database->close();
		return $result;
	}

	public function get_req_name($req_id){
		$this->database->connect();
		$sql = "SELECT name from welfare WHERE welf_id=? LIMIT 1";

		$stmt = $this->database->initialize($sql);
		$stmt->bind_param("i",$req_id);
		$stmt->execute();
		$stmt->bind_result($result);
		$stmt->fetch();
		$this->database->close();
		return $result;
	}

	public function accept_project($id,$org){
		$this->database->connect();
		$sql = "UPDATE welfrequirement set org_name=? WHERE welfreq_id=?";

		$stmt = $this->database->initialize($sql);

		$stmt->bind_param("si",$org,$id);

		return $stmt->execute();

	}

	public function get_org($id){
		$this->database->connect();

		$sql = "SELECT organization.name FROM organization,user WHERE organization.u_id=user.user_id and user.user_hash=? LIMIT 1";

		$stmt = $this->database->initialize($sql);

		$stmt->bind_param("s",$id);

		$stmt->execute();

		$stmt->bind_result($result);

		$stmt->fetch();

		$this->database->close();

		return $result;
	}
}
