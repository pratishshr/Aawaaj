<?php
require_once ($_SERVER['DOCUMENT_ROOT']."/Aawaaj/database/connection.php");
	class SignUpConfirm{
		private $connObj;
		private $codeName;

		function __construct(Connection $connObj){
			$this->connObj = $connObj;

		}
		public function confirmUserSignup($username,$code){
				$handler = $this->connObj->handler;
				$userQuery = "SELECT * FROM user WHERE user.first_name=? AND user.user_hash=?";
				$getUser = $handler->prepare($userQuery);
				if($getUser->execute(array($username,$code))){
					if($getUser->rowCount()==0){
						return false;
					}
					else{
						 while($row = $getUser->fetch(PDO::FETCH_OBJ)){
						 	$this->codeName = $row->user_hash;
						 	
							if($this->codeName == $code){
								$userQuery = "UPDATE user SET user_status=? WHERE user_id=? ";
								$query = $handler->prepare($userQuery);
								if($query->execute(array(1,$row->user_id))){
									return true;
								}
								else{
									return false;
								}
							}
						}
					}
			}
		}	
	}
	global $connObj;
	$confirmSignUpModelObj = new SignUpConfirm($connObj);
?>