<?php require_once('../../config/config.php');?>
<?php

	class SearchController{
		private $db;

		public function __construct(){
				
		}

		public function find_users($find){
			//ARRAY OBJECT HARU PASS GARNA
			$finding = array();

			//DATABASE CONNECTION

			

			$this->db= new mysqli(HOSTNAME,USERNAME,PASSWORD,DATABASE);


			//SELECT ALL QUERY
			$sql = "SELECT * FROM user WHERE first_name LIKE '%$find%' OR last_name LIKE '%$find%'";
	 		$result=$this->db->query($sql);
	 		$count=mysqli_num_rows($result);
	 		if($count==0){
	 			$finding=null;
	 		
	 		}
	 		else{
	 			while($row = $result->fetch_assoc()){
	 				$list=new SearchList();
					$list->set_user_id($row['user_id']);
					$list->set_first_name($row['first_name']);
					$list->set_last_name($row['last_name']);
					$list->set_user_type($row['user_type']);
					$list->set_status($row['user_status']);
					array_push($finding, $list);

				
			}
		}
			$this->db->close();
			return $finding;
		
	}
	public function find_fundraisers($find){
		$finding = array();
		$this->db=new mysqli(HOSTNAME,USERNAME,PASSWORD,DATABASE);
		$sql="SELECT * FROM fundraiser WHERE title LIKE '%$find%' ";
		$result=$this->db->query($sql);
		$count=mysqli_num_rows($result);
		if($count==0){
			$finding=null;
		}
		else{
			while($row = $result->fetch_assoc()){
	 				$list=new SearchList();
					$list->set_title($row['title']);
					$list->set_description($row['description']);
					$list->set_fundraiser_type($row['fundraiser_type']);
					$list->set_amount($row['amount']);
					$list->set_image($row['image']);
					array_push($finding, $list);
		}
	}
			$this->db->close();
			return $finding;
}
}

?>