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
		
		$sql = "SELECT project_id,start_date,end_date,title,objectives,short_desc,location,budget,volunteer,banner_image,project_proposal,video_url,detail,status,u_id FROM projects where u_id=?";
		
		// prepared statement is returned
		$stmt = $this->database->initialize($sql);

		//bind
		$stmt->bind_param("i",$id);


		//execution of query
		$stmt->execute();

		//bind the result obtained by executing query
		$stmt->bind_result($project_id,$start_date,$end_date,$title,$objectives,$short_desc,$location,$budget,$volunteer,$banner_image,$project_proposal,$video_url,$detail,$status,$u_id);

		//$stmt = $this->database->fetchquery($sql);
	
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

			//$this->get_requirements($project_id,$proj);
			//$this->get_organization($project_id,$proj);
			
			array_push($project_list, $proj);

		}
		$this->database->close();
		return $project_list;
		
		
	}

	public function get_requirements($project_id,$proj){
		$req_list = array();
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
			array_push($req_list, $requirement);
		}
		$this->database->close();
		return $req_list;
	}

	public function get_organization($p_id,$proj){
		$org_list = array();
		$this->database->connect();
		// FOR GETTING ORGANIZATIONS INVOLVED OF CURRENT PROJECT IN LOOP
		$sql3 = "SELECT organization_name FROM otherorg where project_id=?";
		
		// prepared statement is returned
		$stmt3 = $this->database->initialize($sql3);

		//bind
		$stmt3->bind_param("i",$p_id);

		//execution of query
		$stmt3->execute();
		
		//bind the result obtained by executing query
		$stmt3->bind_result($organization_name);
		while($stmt3->fetch()){
			array_push($org_list, $organization_name);
		}
		$this->database->close();
		return $org_list;
	}

	public function get_org_name($org_id){
		$this->database->connect();
		$sql = "SELECT name from organization WHERE org_id=? LIMIT 1";

		$stmt = $this->database->initialize($sql);
		$stmt->bind_param("i",$org_id);
		$stmt->execute();
		$stmt->bind_result($result);
		$stmt->fetch();
		return $result;
	}
		


	public function get_last_id(){
		$this->database->connect();
		return $this->database->insert_id();
		$this->database->close();
	}
	
	public function get_by_id($project_id){
		$proj = null;

		$this->database->connect();
		$sql = "SELECT * FROM projects WHERE project_id=?";

		//prepare the statement
		$statement = $this->database->initialize($sql);

		//Bind the parameters
		$statement->bind_param("i",$project_id);

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
		return $proj;
	}

	public function insert($proj){

		//Database Connection
		$this->database->connect();


		$u_id = $_SESSION['user_id'];
		$orga_id=null;
		$tryql = "SELECT org_id from organization,user where user.user_id = organization.u_id and user.user_id=?";
		$stmt = $this->database->initialize($tryql);

			//bind

			$stmt->bind_param("i",$u_id);
			

			//execution of query
			$stmt->execute();

			//bind the result obtained by executing query
			$stmt->bind_result($org_id);
			while($stmt->fetch()){
				$orga_id= $org_id;
			}

		//Insert Query
		$sql = "INSERT INTO projects(start_date,end_date,title,objectives,short_desc,location,budget,volunteer,banner_image,project_proposal,video_url,detail,status,u_id) Values(?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
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
		

		//BIND 
			
		$statement->bind_param("ssssssiissssii",$start_date,$end_date,$title,$objectives,$short_desc,$location,$budget,$volunteer,$banner_image,$project_proposal,$video_url,$detail,$status,$orga_id);
		
		$statement->execute();
			
		$project_id = $this->database->insert_id();
		
		if($proj->getRequirement()!=""){
		
		$require = $proj->getRequirement();
		foreach ($require as $value) {
			if($value!=""){
		$sql="INSERT into requirements(requirement,project_id) VALUES(?,?)";
		$statement = $this->database->initialize($sql);
		 $statement->bind_param("si",$value,$project_id);
		 $statement->execute();
		 
			}
			
		}
		}
		
		// if($proj->getRequirement2()!=""){
		// $sql="INSERT into requirements(requirement,project_id) VALUES(?,?)";
		// $statement = $this->database->initialize($sql);
		// $require = $proj->getRequirement2();
		// $project_id = $pro->getProject_id();

		// $statement->bind_param("si",$require,$project_id);

		// if(!$statement->execute()){
		// 	echo "requirement2 problem";
		// 	exit;
		// }
		// }
		// if($proj->getRequirement3()!=""){
		// $sql="INSERT into requirements(requirement,project_id) VALUES(?,?)";
		// $statement = $this->database->initialize($sql);
		// $require = $proj->getRequirement3();
		// $project_id = $pro->getProject_id();

		// $statement->bind_param("si",$require,$project_id);

		// if(!$statement->execute()){
		// 	echo "requirement problem";
		// 	exit;
		// }
		// }
		// if($proj->getRequirement4()!=""){
		// $sql="INSERT into requirements(requirement,project_id) VALUES(?,?)";
		// $statement = $this->database->initialize($sql);
		// $require = $proj->getRequirement4();
		// $project_id = $pro->getProject_id();

		// $statement->bind_param("si",$require,$project_id);

		// if(!$statement->execute()){
		// 	echo "requirement problem";
		// 	exit;
		// }
		// }
		// if($proj->getRequirement5()!=""){
		// $sql="INSERT into requirements(requirement,project_id) VALUES(?,?)";
		// $statement = $this->database->initialize($sql);
		// $require = $proj->getRequirement5();
		// $project_id = $pro->getProject_id();

		// $statement->bind_param("si",$require,$project_id);

		// if(!$statement->execute()){
		// 	echo "requirement problem";
		// 	exit;
		// }
		// }
		if($proj->getOrganization()!=""){
			$organize = $proj->getOrganization();
			foreach ($organize as $value) {
			if($value!=""){
			
			$sql="INSERT into otherorg(organization_name,project_id) VALUES(?,?)";
			$statement = $this->database->initialize($sql);
			$statement->bind_param("si",$value,$project_id);
			$statement->execute();
				}
			
		}
		}
		// if($proj->getOrganization2()!=""){
		// $sql="INSERT into organizations(organization,project_id) VALUES(?,?)";
		// $statement = $this->database->initialize($sql);
		// $organize = $proj->getOrganization2();
		// $project_id = $pro->getProject_id();

		// $statement->bind_param("si",$organize,$project_id);

		// if(!$statement->execute()){
		// 	echo "requirement problem";
		// 	exit;
		// }
		// }
		// if($proj->getOrganization3()!=""){
		// $sql="INSERT into organizations(organization,project_id) VALUES(?,?)";
		// $statement = $this->database->initialize($sql);
		// $organize = $proj->getOrganization3();
		// $project_id = $pro->getProject_id();

		// $statement->bind_param("si",$organize,$project_id);

		// if(!$statement->execute()){
		// 	echo "requirement problem";
		// 	exit;
		// }
		// }
		// if($proj->getOrganization4()!=""){
		// $sql="INSERT into organizations(organization,project_id) VALUES(?,?)";
		// $statement = $this->database->initialize($sql);
		// $organize = $proj->getOrganization4();
		// $project_id = $pro->getProject_id();

		// $statement->bind_param("si",$organize,$project_id);

		// if(!$statement->execute()){
		// 	echo "requirement problem";
		// 	exit;
		// }
		// }
		// if($proj->getOrganization5()!=""){
		// $sql="INSERT into organizations(organization,project_id) VALUES(?,?)";
		// $statement = $this->database->initialize($sql);
		// $organize = $proj->getOrganization5();
		// $project_id = $pro->getProject_id();

		// $statement->bind_param("si",$organize,$project_id);

		// if(!$statement->execute()){
		// 	echo "requirement problem";
		// 	exit;
		// }
		// }
	

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


?>