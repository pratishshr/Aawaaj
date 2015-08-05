<?php
	class DBConnection{
		private $conn;

		public function __construct(){

		}

		public function connect(){
			$this->conn = new mysqli(HOSTNAME,USERNAME,PASSWORD,DATABASE);
			if($this->conn->connect_error){
				echo("Connection error: ".$this->conn->connect_error);
			}
		}

		public function fetchquery($sql){
			return $this->conn->query($sql);
		}

		public function close(){
			$this->conn->close();
		}
	}
?>