<?php
	class SearchRepository{
		private $db;

		public function __construct(){
			$this->db = new DbConnection();
		}

		public function get_user($table){

			$search_list = array();

			$this->db->connect();

			$sql = "SELECT * FROM ".$table;

			$result = $this->db->fetchquery($sql);

			$count = mysqli_num_rows($result);

			if($count == null){
				$search_list==null;
			}
			else{
				if($table=="user"){
					while($row = $result->fetch_assoc()){
						$list = new SearchList();
						$list->set_user_id($row['user_id']);
						$list->set_first_name($row['first_name']);
						$list->set_last_name($row['last_name']);
						$list->set_user_type($row['user_type']);
						$list->set_status($row['user_status']);
						$list->set_user_hash($row['user_hash']);
						array_push($search_list,$list);
					}
				}
				else{
					while($row = $result->fetch_assoc()){
						$list = new SearchList();
						$list->set_title($row['title']);
						$list->set_description($row['description']);
						$list->set_fundraiser_type($row['fundraiser_type']);
						$list->set_amount($row['amount']);
						$list->set_image($row['image']);
						$list->set_fund_id($row['id']);
						array_push($search_list, $list);
					}
				}
			}
			$this->db->close();
			return $search_list;
		}


		public function search_user($find){

			$search_list = array();

			$this->db->connect();

			$sql = "SELECT * FROM user , profile  WHERE (first_name LIKE '%$find%' OR last_name LIKE '%$find%') AND user.user_id=profile.u_id";
			
			$result = $this->db->fetchquery($sql);

			$count = mysqli_num_rows($result);

			if($count==null){
				$search_list = null;
			}
			else{
				while($row = $result->fetch_assoc()){
					$list=new SearchList();
					$list->set_user_id($row['user_id']);
					$list->set_first_name($row['first_name']);
					$list->set_last_name($row['last_name']);
					$list->set_user_type($row['user_type']);
					$list->set_status($row['user_status']);
					$list->set_user_hash($row['user_hash']);
					$list->set_user_image($row['profile_photo']);
					array_push($search_list, $list);
				}
			}
			$this->db->close();
			return $search_list;
		}


		public function search_fundraiser($find){

			$search_list = array();

			$this->db->connect();

			$sql = "SELECT * FROM fundraiser WHERE title LIKE '%$find%' ";

			$result = $this->db->fetchquery($sql);

			$count = mysqli_num_rows($result);

			if($count==0){
				$search_list = null;
			}
			else{
			while($row = $result->fetch_assoc()){
	 				$list=new SearchList();
					$list->set_title($row['title']);
					$list->set_description($row['description']);
					$list->set_fundraiser_type($row['fundraiser_type']);
					$list->set_amount($row['amount']);
					$list->set_image($row['image']);
					$list->set_fund_id($row['id']);
					array_push($search_list, $list);
				}
			}
			$this->db->close();
			return $search_list;


		
		}
	}
	