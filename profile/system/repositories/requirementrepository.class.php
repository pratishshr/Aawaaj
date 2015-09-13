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
		$stmt->bind_result($welfreq_id,$title,$description,$date,$status,$org_name,$welf_id);

		//$stmt = $this->database->fetchquery($sql);
	
		//Store in object so that it can be used in views
		while ($stmt->fetch()) {
			$requirem = new Requirement();
			
			$requirem->setRequirementId($welfareq_id);
			$requirem->setTitle($title);
			$requirem->setDescription($description);
			$requirem->setDate($date);
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

		//Insert Query
		$sql = "INSERT INTO welfrequirement(title,description,date,status,org_name,welf_id) Values(?,?,?,?,?,?)";
		$statement = $this->database->initialize($sql);

		//MAP DATA
		$title = $requirem->getTitle();
		$description = $requirem->getDescription();
		$date = $requirem->getDate();
		$status = $proj->getStatus();
		$org_name = $proj->getOrgname();
		$welf_id = $_SESSION['user_id'];

		//BIND 
			
		$statement->bind_param("sssisi",$title,$description,$date,$status,$org_name,$welf_id);
		
		$statement->execute();
	}