<?php
	class DBConnection{
		private $conn;

		public function __construct(){

		}

		public function connect(){
			$this->conn = new mysqli(HOSTNAME,USERNAME,PASSWORD,DATABASE);
			//$this->conn = new mysqli(HOSTNAME,USERNAME,PASSWORD_SUJAN,DATABASE);

			if($this->conn->connect_error){
				echo("Connection error: ".$this->conn->connect_error);
			}
		}

		public function fetchquery($sql){
			return $this->conn->query($sql);
		}

		public function insert_id(){
			return $this->conn->insert_id;
		}

		public function initialize($sql){
			return $this->conn->prepare($sql);
		}

		public function close(){
			$this->conn->close();
		}
	}
?>