<?php

class FundViewRepository{

	private $database;

	public function __construct(){
		$this->database = new DbConnection();
	}
	public function get_all($user_id=null){
		$fundview_list = array();

		//Database Connect
		$this->database->connect();
		
		$sql = "SELECT id,fundraiser_type,title,amount,end_date,description,image FROM fundraiser WHERE u_id=?";
		
		// prepared statement is returned
		$stmt = $this->database->initialize($sql);

		//bind
		$stmt->bind_param("i",$user_id);


		//execution of query
		$stmt->execute();

		//bind the result obtained by executing query
		$stmt->bind_result($id,$fundraiser_type,$title,$amount,$end_date,$description,$image);

		//$stmt = $this->database->fetchquery($sql);
	
		//Store in object so that it can be used in views
		while ($stmt->fetch()) {
			$fund = new FundView();

			$fund->set_id($id);
			$fund->set_fundraiser_type($fundraiser_type);
			$fund->set_title($title);
			$fund->set_amount($amount);
			$fund->set_end_date($end_date);
			$fund->set_description($description);
			$fund->set_image($image);
			
			
			array_push($fundview_list, $fund);

		}
		$this->database->close();
		return $fundview_list;
		
		
	}

	public function count(){
		

		//DATABASE CONNECTION
		$this->database->connect();

		//SELECT ALL QUERY
		$sql = "SELECT * FROM fundraiser";

		//fetchquery
		$result = $this->database->fetchquery($sql);

		
		$this->database->close();
		return $result->num_rows;

		
	}

	public function count_user_projects($id){
		

		//DATABASE CONNECTION
		$this->database->connect();

		//SELECT ALL QUERY
		$sql = "SELECT count(*) FROM fundraiser,user where user.user_id=fundraiser.u_id and user.user_hash=?";

		$stmt = $this->database->initialize($sql);
		$stmt->bind_param("s",$id);
		$stmt->execute();
		$stmt->bind_result($result);
		$stmt->fetch();
		
		return $result;
	}
}


?>