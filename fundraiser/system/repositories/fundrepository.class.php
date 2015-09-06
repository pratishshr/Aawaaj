<?php
	class FundRepository{
		private $db;

		public function __construct(){
			$this->db = new DbConnection();
		}

		public function get_all(){
			//ARRAY OBJECT PASS GARNA
			$fund_list = array();

			//DBCONNECTION
			$this->db->connect();

			//SELECT ALL
			$sql = "SELECT * FROM fundraiser";

			//fetchquery
			$result = $this->db->fetchquery($sql);

			//STORE IN OBJECT AND SEND TO VIEW
			while($row = $result->fetch_assoc()){
				$fund =  new Fundraiser();
				$fund->set_id($row['id']);
				$fund->set_title($row['title']);
				$fund->set_fundraiser_type($row['fundraiser_type']);
				$fund->set_amount($row['amount']);
				$fund->set_description($row['description']);
				$fund->set_image($row['image']);
				$fund->set_video_url($row['video_url']);
				$fund->set_details($row['details']);

				array_push($fund_list,$fund);
			}
			$this->db->close();
			return $fund_list;

		}

		public function get_last_id(){
			$this->db->connect();
			return $this->db->insert_id();
			$this->db->close();
		}

		public function get_by_id($id){
			$fund = null;

			//DATABASE CONNECTION
			$this->db->connect();

			//SELECT BY ID
			$sql = "SELECT * FROM fundraiser WHERE id=?";

			//PREPARE
			$stmt = $this->db->initialize($sql);

			//BIND
			$stmt->bind_param("i",$id);

			//EXECUTE
			$stmt->execute();

			//BIND RESULT
			$stmt->bind_result($id,$fundraiser_type,$title,$amount,$description,$image,$video_url,$details,$u_id);

			while($stmt->fetch()){
				//instantiate object
				$fund = new Fundraiser();

				$fund->set_id($id);
				$fund->set_title($title);
				$fund->set_fundraiser_type($fundraiser_type);
				$fund->set_amount($amount);
				$fund->set_description($description);
				$fund->set_image($image);
				$fund->set_video_url($video_url);
				$fund->set_details($details);
				$fund->set_u_id($u_id);
			}
				//CLOSE CONNECTION
				$this->db->close();
				return $fund;
		}

		public function insert($fund){

			//DATABASE CONNECTION
			$this->db->connect();

			//INSERT QUERY
			$sql = "INSERT INTO fundraiser(fundraiser_type,title,amount,description,image,video_url,details,u_id) values(?,?,?,?,?,?,?,?)";

			//PREPARE
			$stmt = $this->db->initialize($sql);

			//MAP DATA
			$fundraiser_type = $fund->get_fundraiser_type();
			$title = $fund->get_title();
			$amount = $fund->get_amount();
			$description = $fund->get_description();
			$image = $fund->get_image();
			$video_url = $fund->get_video_url();
			$details = $fund->get_details();
			$id = $_SESSION['user_id'];
			//BIND
			$stmt->bid_param("ssissssi",$fundraiser_type,$title,$amount,$description,$image,$video_url,$details,$id);

			//EXECUTE
			$stmt->execute();
			return $this->db->insert_id();
			//CLOSE CONNECTION
			$this->db->close();

		}	
}		