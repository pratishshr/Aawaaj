<?php 
	
	require_once ($_SERVER['DOCUMENT_ROOT']."/Aawaaj/database/connection.php");


	class SignUpModel{

		private $connObj;

		function __construct(Connection $connObj){
			$this->connObj = $connObj;

		}


		public function insertGeneralUser($firstName,$lastName,$email,$password,$contactNumber,$userType,$age){
			
			$handler = $this->connObj->handler;
			$handler->beginTransaction();
			$userInsertQuery = "INSERT INTO user (user_name, first_name, last_name, contact_number, user_type) VALUES (?,?,?,?,?)";
			$userInsert = $handler->prepare($userInsertQuery);
			if($commit = ($userInsert->execute(array($email,$firstName,$lastName,$contactNumber,$userType)))){

				$userId = $handler->lastInsertId();
				$passInsertQuery = "INSERT INTO password (password, u_id) VALUES (?,?)";
				$passInsert = $handler->prepare($passInsertQuery);
				if($passInsert->execute(array($password,$userId))){
					$genUserInsertQuery = "INSERT INTO generaluser (age, type, u_id) VALUES (?,?,?)";
					$genUserInsert = $handler->prepare($genUserInsertQuery);
					if($genUserInsert->execute(array($age,$userType,$userId))){
						$handler->commit();
						$this->connObj->close_connection();
						return 1;
					}else{
						$handler->rollback();
						return 0;
					}
				}else{
					$handler->rollback();
					return 0;
				}
			}else{
				$handler->rollback();
				return 0;
			}
		}

		public function insertOrganizationUser($firstName,$lastName,$email,$password,$contactNumber,$userType,$orgName,$orgDoe,$orgAdd,$orgLogo,$orgObj){
			$handler = $this->connObj->handler;
			$handler->beginTransaction();
			$userInsertQuery = "INSERT INTO user (user_name, first_name, last_name, contact_number, user_type) VALUES (?,?,?,?,?)";
			$userInsert = $handler->prepare($userInsertQuery);
			if($userInsert->execute(array($email,$firstName,$lastName,$contactNumber,$userType))){

				$userId = $handler->lastInsertId();
				$passInsertQuery = "INSERT INTO password (password, u_id) VALUES (?,?)";
				$passInsert = $handler->prepare($passInsertQuery);
				if($passInsert->execute(array($password,$userId))){
					$orgInsertQuery = "INSERT INTO organization (name, doe, img, address, objective, type, u_id) VALUES (?,?,?,?,?,?,?)";
					$orgInsert = $handler->prepare($orgInsertQuery);
					if($orgInsert->execute(array($orgName,$orgDoe,$orgLogo,$orgAdd,$orgObj,$userType,$userId))){
						$handler->commit();
						$this->connObj->close_connection();
						return 1;
					}else{
						$handler->rollback();
						return 0;
					}
				}else{
					$handler->rollback();
					return 0;
				}
			}else{
				$handler->rollback();
				return 0;
			}
		}
		public function insertWelfareUser($firstName,$lastName,$email,$password,$contactNumber,$userType,$welfName,$welfDoe,$welfAdd,$welfServ,$welfLogo,$welfObj){
			$handler = $this->connObj->handler;
			$handler->beginTransaction();
			$userInsertQuery = "INSERT INTO user (user_name, first_name, last_name, contact_number, user_type) VALUES (?,?,?,?,?)";
			$userInsert = $handler->prepare($userInsertQuery);
			if($userInsert->execute(array($email,$firstName,$lastName,$contactNumber,$userType))){

				$userId = $handler->lastInsertId();
				$passInsertQuery = "INSERT INTO password (password, u_id) VALUES (?,?)";
				$passInsert = $handler->prepare($passInsertQuery);
				if($passInsert->execute(array($password,$userId))){
					$welfInsertQuery = "INSERT INTO welfare (name, doe, img, address, service, objective, type, u_id) VALUES (?,?,?,?,?,?,?,?)";
					$welfInsert = $handler->prepare($welfInsertQuery);
					if($welfInsert->execute(array($welfName,$welfDoe,$welfLogo,$welfAdd,$welfServ,$welfObj,$userType,$userId))){
						$handler->commit();
						$this->connObj->close_connection();
						return 1;
					}else {
						$handler->rollback();
						return 0;
					}
				}else {
					$handler->rollback();
					return 0;
				}
			}else {
				$handler->rollback();
				return 0;
			}
		}	
	}
	global $connObj;
	$signUpModelObj = new SignUpModel($connObj);
	

?>