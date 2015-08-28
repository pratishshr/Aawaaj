<?php

	class SearchModel{
		private $db;

		public function __construct(){
				
		}

		public function find($find){
			//ARRAY OBJECT HARU PASS GARNA
			$finding = array();

			//DATABASE CONNECTION
			$this->db= new mysqli("localhost","root","","aawaaj");

			//SELECT ALL QUERY
			$sql = "SELECT * FROM user WHERE first_name LIKE '%$find%' OR last_name LIKE '%$find%'";
	 		$result=$this->db->query($sql);
	 		$count=mysqli_num_rows($result);
	 		if($count==0){
	 			$finding=null;
	 		
	 		}
	 		else{
	 			while($row = $result->fetch_assoc()){
	 				$list=new Searchlist();
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
}

?>