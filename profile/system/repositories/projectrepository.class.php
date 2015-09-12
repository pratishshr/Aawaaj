<?php

class ProjectRepository{

	private $database;

	public function __construct(){
		$this->database = new DbConnection();
	}
	public function get_all($id=null){
		$project_list = array();

		//Database Connect
		$this->database->connect();
		if($id==null){
		//mysql query to select all
		$sql = "SELECT * FROM projects";

		// prepared statement is returned
		$stmt = $this->database->initialize($sql);

		//execution of query
		$stmt->execute();

		//bind the result obtained by executing query
		$stmt->bind_result($project_id,$start_date,$end_date,$title,$objectives,$short_desc,$location,$budget,$volunteer,$banner_image,$project_proposal,$video_url,$detail,$status,$u_id);

		}
		
		else
		{ 
			$sql = "SELECT project_id,start_date,end_date,title,objectives,short_desc,location,budget,volunteer,banner_image,project_proposal,video_url,detail,status,u_id FROM projects where u_id=?";
			
			// prepared statement is returned
			$stmt = $this->database->initialize($sql);

			//bind
			$stmt->bind_param("i",$id);

			//execution of query
			$stmt->execute();

			//bind the result obtained by executing query
			$stmt->bind_result($project_id,$start_date,$end_date,$title,$objectives,$short_desc,$location,$budget,$volunteer,$banner_image,$project_proposal,$video_url,$detail,$status,$u_id);
		
		}

		//$stmt = $this->database->fetchquery($sql);
		$i=0;
		//Store in object so that it can be used in views
		while ($stmt->fetch()) {
			$proj = new Project();
			
			$proj->setProject_id($project_id);
			$proj->setStart_date($start_date);
			$proj->setEnd_date($end_date);
			$proj->setTitle($title);
			$proj->setObjectives($objectives);
			$proj->setShortdes($short_desc);
			$proj->setLocation($location);
			$proj->setBudget($budget);
			$proj->setVolunteer($volunteer);
			$proj->setBanner_image($banner_image);
			$proj->setProject_proposal($project_proposal);
			$proj->setVideourl($video_url);
			$proj->setDetail($detail);
			$proj->setStatus($status);
			$proj->setUid($u_id);

			$this->get_requirements($project_id,$proj);
			$this->get_organization($project_id,$proj);
			
			array_push($project_list, $proj);

			$i++;
		}
		echo $i;
		$this->database->close();
		var_dump($project_list);
		exit();
		
	}

	public function get_requirements($project_id,$proj){
		$this->database->connect();
		// FOR GETTING REQUIREMENTS OF CURRENT PROJECT IN LOOP
		$sql2 = "SELECT requirement FROM requirements where project_id=?";
		
		// prepared statement is returned
		$stmt2 = $this->database->initialize($sql2);
		
		//bind
		$stmt2->bind_param("i",$project_id);

		//execution of query
		$stmt2->execute();

		//bind the result obtained by executing query
		$stmt2->bind_result($requirement);

		while($stmt2->fetch()){
			$proj->setRequirement($requirement);
		}
		
	}

	public function get_organization($project_id,$proj){
		$this->database->connect();
		// FOR GETTING ORGANIZATIONS INVOLVED OF CURRENT PROJECT IN LOOP
		$sql3 = "SELECT organization_name FROM otherorg where org_id=?";
		
		// prepared statement is returned
		$stmt3 = $this->database->initialize($sql3);

		//bind
		$stmt3->bind_param("i",$project_id);

		//execution of query
		$stmt3->execute();

		//bind the result obtained by executing query
		$stmt3->bind_result($organization_name);
		while($stmt3->fetch()){
			$proj->setOrganization($organization_name);
		}
	}
		


	public function get_last_id(){
		$this->database->connect();
		return $this->database->insert_id();
		$this->database->close();
	}
	
	public function get_by_id($project_id){
		$proj = null;

		$this->database->connect();
		$sql = "SELECT * FROM projects WHERE id=?";

		//prepare the statement
		$statement = $this->database->initialize($sql);

		//Bind the parameters
		$statement = $bind_param("i",$project_id);

		//Execute the above statement
		$statement->execute();

		//Bind the result
		$statement->bind_result($project_id,$start_date,$end_date,$title,$objectives,$short_desc,$location,$budget,$volunteer,$banner_image,$project_proposal,$video_url,$detail,$status,$u_id);

		while ($statement->fetch()) {
			$proj = new Project();

			$proj->setProject_id($project_id);
			$proj->setStart_date($start_date);
			$proj->setEnd_date($end_date);
			$proj->setTitle($title);
			$proj->setObjectives($objectives);
			$proj->setShortdes($short_desc);
			$proj->setLocation($location);
			$proj->setBudget($budget);
			$proj->setVolunteer($volunteer);
			$proj->setBanner_image($banner_image);
			$proj->setProject_proposal($project_proposal);
			$proj->setVideourl($video_url);
			$proj->setDetail($detail);
			$proj->setStatus($status);
			$proj->setUid($u_id);
		}
		//Close Connection
		$this->database->close();
	}

	public function insert($proj){

		//Database Connection
		$this->database->connect();

		//Insert Query
		$sql = "INSERT INTO project(start_date,end_date,title,objectives,short_desc,location,budget,volunteer,banner_image,project_proposal,video_url,detail,status,u_id) Values(?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
		$statement = $this->database->initialize($sql);

		//MAP DATA
		$start_date = $proj->getStart_date();
		$end_date = $proj->getEnd_date();
		$title = $proj->getTitle();
		$objectives = $proj->getObjectives();
		$short_desc = $proj->getShortdes();
		$location = $proj->getLocation();
		$budget = $proj->getBudget();
		$volunteer = $proj->getVolunteer();
		$banner_image = $proj->getBanner_image();
		$project_proposal = $proj->getProject_proposal();
		$video_url = $proj->getVideourl();
		$detail = $proj->getDetail();
		$status = $proj->getStatus();
		$u_id = $_SESSION['user_id'];

		//BIND 
		$statement->bind_param("ssssssiissssii",$start_date,$end_date,$title,$objectives,$short_desc,$location,$budget,$volunteer,$banner_image,$project_proposal,$video_url,$detail,$status,$u_id);
		
		if(!$statement->execute()){
			echo "Query Execution Failed";
			exit;
		}
		else{
			$sq = "SELECT project_id from projects";
			$result = $this->database->fetchquery($sq);
			while ($row = $result->fetch_assoc()) {
			$pro = new Project();
			$pro->setProject_id($row['project_id']);
		}
		if($proj->getRequirement1()!=""){
		$sql="INSERT into requirements(requirement,project_id) VALUES(?,?)";
		$statement = $this->database->initialize($sql);
		$require = $proj->getRequirement1();
		$project_id = $pro->getProject_id();

		$statement->bind_param("si",$require,$project_id);

		if(!$statement->execute()){
			echo "requirement problem";
			exit;
		}
		}
		if($proj->getRequirement2()!=""){
		$sql="INSERT into requirements(requirement,project_id) VALUES(?,?)";
		$statement = $this->database->initialize($sql);
		$require = $proj->getRequirement2();
		$project_id = $pro->getProject_id();

		$statement->bind_param("si",$require,$project_id);

		if(!$statement->execute()){
			echo "requirement2 problem";
			exit;
		}
		}
		if($proj->getRequirement3()!=""){
		$sql="INSERT into requirements(requirement,project_id) VALUES(?,?)";
		$statement = $this->database->initialize($sql);
		$require = $proj->getRequirement3();
		$project_id = $pro->getProject_id();

		$statement->bind_param("si",$require,$project_id);

		if(!$statement->execute()){
			echo "requirement problem";
			exit;
		}
		}
		if($proj->getRequirement4()!=""){
		$sql="INSERT into requirements(requirement,project_id) VALUES(?,?)";
		$statement = $this->database->initialize($sql);
		$require = $proj->getRequirement4();
		$project_id = $pro->getProject_id();

		$statement->bind_param("si",$require,$project_id);

		if(!$statement->execute()){
			echo "requirement problem";
			exit;
		}
		}
		if($proj->getRequirement5()!=""){
		$sql="INSERT into requirements(requirement,project_id) VALUES(?,?)";
		$statement = $this->database->initialize($sql);
		$require = $proj->getRequirement5();
		$project_id = $pro->getProject_id();

		$statement->bind_param("si",$require,$project_id);

		if(!$statement->execute()){
			echo "requirement problem";
			exit;
		}
		}
		if($proj->getOrganization1()!=""){
		$sql="INSERT into organizations(organization,project_id) VALUES(?,?)";
		$statement = $this->database->initialize($sql);
		$organize = $proj->getOrganization1();
		$project_id = $pro->getProject_id();

		$statement->bind_param("si",$organize,$project_id);

		if(!$statement->execute()){
			echo "requirement problem";
			exit;
		}
		}
		if($proj->getOrganization2()!=""){
		$sql="INSERT into organizations(organization,project_id) VALUES(?,?)";
		$statement = $this->database->initialize($sql);
		$organize = $proj->getOrganization2();
		$project_id = $pro->getProject_id();

		$statement->bind_param("si",$organize,$project_id);

		if(!$statement->execute()){
			echo "requirement problem";
			exit;
		}
		}
		if($proj->getOrganization3()!=""){
		$sql="INSERT into organizations(organization,project_id) VALUES(?,?)";
		$statement = $this->database->initialize($sql);
		$organize = $proj->getOrganization3();
		$project_id = $pro->getProject_id();

		$statement->bind_param("si",$organize,$project_id);

		if(!$statement->execute()){
			echo "requirement problem";
			exit;
		}
		}
		if($proj->getOrganization4()!=""){
		$sql="INSERT into organizations(organization,project_id) VALUES(?,?)";
		$statement = $this->database->initialize($sql);
		$organize = $proj->getOrganization4();
		$project_id = $pro->getProject_id();

		$statement->bind_param("si",$organize,$project_id);

		if(!$statement->execute()){
			echo "requirement problem";
			exit;
		}
		}
		if($proj->getOrganization5()!=""){
		$sql="INSERT into organizations(organization,project_id) VALUES(?,?)";
		$statement = $this->database->initialize($sql);
		$organize = $proj->getOrganization5();
		$project_id = $pro->getProject_id();

		$statement->bind_param("si",$organize,$project_id);

		if(!$statement->execute()){
			echo "requirement problem";
			exit;
		}
		}
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
}


?>