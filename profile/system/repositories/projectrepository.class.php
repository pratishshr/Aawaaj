<?php

class ProjectRepository{

	private $database;

	public function __construct(){
		$this->database = new DbConnection();
	}
	public function get_all(){

		$project_list = array();

		//Database Connect
		$this->database->connect();

		//mysql query to select all
		$sql = "SELECT * FROM projects";

		//Fetch Query
		$result = $this->database->fetchquery($sql);

		//Store in object so that it can be used in views
		while ($row = $result->fetch_assoc()) {
			$proj = new Project();
			$proj->setStart_date($row['start_date']);
			$proj->setEnd_date($row['end_date']);
			$proj->setTitle($row['title']);
			$proj->setObjectives($row['objectives']);
			$proj->setShortdes($row['short_desc']);
			$proj->setLocation($row['location']);
			$proj->setBudget($row['budget']);
			$proj->setVolunteer($row['volunteer']);
			$proj->setBanner_image($row['banner_image']);
			$proj->setProject_proposal($row['project_proposal']);
			$proj->setVideourl($row['video_url']);
			$proj->setDetail($row['detail']);
			$proj->setStatus($row['status']);
			$proj->setUid($row['u_id']);


			array_push($project_list, $proj);
		}
		$this->database->close();
		return $project_list;
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
		$project_id = $_SESSION['user_id'];

		//BIND 
		$statement->bind_param("ssssssiissssii",$start_date,$end_date,$title,$objectives,$short_desc,$location,$budget,$volunteer,$banner_image,$project_proposal,$video_url,$detail,$status,$u_id);
		$statement->execute();

		$sql="INSERT into requirements(requirement,project_id) VALUES(?,?)";
		//$statement = $this->database->initialize($sql);


		return $this->database->insert_id();

		//Close the connection
		$this->database->close();
	}
}


?>