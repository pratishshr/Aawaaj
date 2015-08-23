<?php

require_once ($_SERVER['DOCUMENT_ROOT']."Aawaaj/database/connection.php");

	class LoginModel{

		private $connObj;
		private $first_name=null;
		private $user_id = null;
		private $user_type;
		private $welfare_name;
		private $organization_name;
		private $data_pass;

		function __construct(Connection $connObj){
			$this->connObj = $connObj;
		}
		public function findUser($username,$password){
		
			$handler = $this->connObj->handler;
			$userQuery = "SELECT * FROM user,password WHERE user.user_id = password.u_id AND user.user_name=? AND user.user_status=? LIMIT 1";
			$getUser = $handler->prepare($userQuery);
			if($getUser->execute(array($username,1))){
				if($getUser->rowCount()==0){
					return false;
				}
				else{
					
					while($row = $getUser->fetch(PDO::FETCH_OBJ)){
						$this->first_name = $row->first_name;
						$this->user_id = $row->user_id;
						$this->user_type = $row->user_type;
						$this->data_pass = $row->password;

					}
					$pwd=$this->data_pass;
					//verify passwords and returns boolean true/false
					return password_verify($password,$pwd);
				}
			}else{
				echo "Null";
				return false;
			}
		}
		public function getName(){
			$handler = $this->connObj->handler;
			if($this->getUserType()=="welfare"){
				$userQuery = "SELECT name FROM user,welfare WHERE user.user_id = welfare.u_id LIMIT 1";
				$getUser = $handler->query($userQuery);
					while($row = $getUser->fetch(PDO::FETCH_OBJ)){
						return $this->welfare_name = $row->name;
				}
			}else if($this->getUserType()=="organization"){
				$userQuery = "SELECT name FROM user,organization WHERE user.user_id = organization.u_id LIMIT 1";
				$getUser = $handler->query($userQuery);
					while($row = $getUser->fetch(PDO::FETCH_OBJ)){
						return $this->organization_name = $row->name;
				}
			}
			return false;
		}
		
		public function getFirstName(){
			return $this->first_name;
		}
		public function getUserId(){
			return $this->user_id;
		}
		public function getUserType(){
			return $this->user_type;
		}


	}
	global $connObj;
	$loginmodelobj = new LoginModel($connObj);

?>