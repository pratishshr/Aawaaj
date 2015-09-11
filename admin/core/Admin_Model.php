<?php require_once(ROOT_PATH."admin/system/dbUtil/dbconnection.class.php");?>
<?php

class Admin_Model{
	private $db;
	private $password;

	public function __construct(){
		$this->db = new DBConnection();
	}

	public function get_hash($username){
		$this->db->connect();

		$sql  = "SELECT password FROM admins WHERE username = ?";

		$stmt = $this->db->initialize($sql);

		$stmt->bind_param("s",$username);

		$stmt->execute();

		$stmt->bind_result($password);

		while($stmt->fetch()){
			$this->password = $password;
		}

		$this->db->close();
		return $this->password;
	}
}