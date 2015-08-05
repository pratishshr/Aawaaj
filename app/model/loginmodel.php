<?php

require_once ($_SERVER['DOCUMENT_ROOT']."/Aawaaj/database/connection.php");

	class LoginModel{

		private $connObj;
		private $first_name=null;
		private $user_id = null;

		function __construct(Connection $connObj){
			$this->connObj = $connObj;
		}
		public function findUser($username,$password){

			$handler = $this->connObj->handler;
			$userQuery = "SELECT * FROM user,password WHERE user.user_id = password.u_id AND user.user_name=? AND password.password=? LIMIT 1";
			$getUser = $handler->prepare($userQuery);
			if($getUser->execute(array($username,$password))){
				if($getUser->rowCount()==0){
					return false;
				}
				else{
					while($row = $getUser->fetch(PDO::FETCH_OBJ)){
						$this->first_name = $row->first_name;
						$this->user_id = $row->user_id;
					}
					 return true;
				}
			}else{
				echo "Null";
				return false;
			}
		}
		public function getFirstName(){
			return $this->first_name;
		}
		public function getUserId(){
			return $this->user_id;
		}

	}
	global $connObj;
	$loginmodelobj = new LoginModel($connObj);

?>