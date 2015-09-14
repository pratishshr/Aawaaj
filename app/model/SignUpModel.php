<?php 
	require_once ($_SERVER['DOCUMENT_ROOT']."/Aawaaj/config/config.php");
	require_once (ROOT_PATH."database/connection.php");


	class SignUpModel{

		private $connObj;

		function __construct(Connection $connObj){
			$this->connObj = $connObj;

		}


		public function insertGeneralUser($firstName,$lastName,$email,$password,$contactNumber,$userType,$age,$hashedKey){
			
			$handler = $this->connObj->handler;
			$handler->beginTransaction();
			$userInsertQuery = "INSERT INTO user (user_name, first_name, last_name, contact_number, user_type,user_hash) VALUES (?,?,?,?,?,?)";
			$userInsert = $handler->prepare($userInsertQuery);
			if($commit = ($userInsert->execute(array($email,$firstName,$lastName,$contactNumber,$userType,$hashedKey)))){

				$userId = $handler->lastInsertId();
				$passInsertQuery = "INSERT INTO password (password, u_id) VALUES (?,?)";
				$passInsert = $handler->prepare($passInsertQuery);
				if($passInsert->execute(array($password,$userId))){
					$genUserInsertQuery = "INSERT INTO generaluser (age, type, u_id) VALUES (?,?,?)";
					$genUserInsert = $handler->prepare($genUserInsertQuery);
					if($genUserInsert->execute(array($age,$userType,$userId))){
						$profileInsertQuery = "INSERT INTO profile (u_id,profile_photo,about) VALUES (?,?,?)";
						$profileInsert = $handler->prepare($profileInsertQuery);
							if($profileInsert->execute(array($userId,"default.jpg","This is the about section. Edit profile to change this section."))){


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
			}else{
				$handler->rollback();
				return 0;
			}
		}

		public function insertOrganizationUser($firstName,$lastName,$email,$password,$contactNumber,$userType,$orgName,$orgDoe,$orgAdd,$orgLogo,$orgObj,$hashedKey){
			$handler = $this->connObj->handler;
			$handler->beginTransaction();
			$userInsertQuery = "INSERT INTO user (user_name, first_name, last_name, contact_number, user_type,user_hash) VALUES (?,?,?,?,?,?)";
			$userInsert = $handler->prepare($userInsertQuery);
			if($userInsert->execute(array($email,$firstName,$lastName,$contactNumber,$userType,$hashedKey))){

				$userId = $handler->lastInsertId();
				$passInsertQuery = "INSERT INTO password (password, u_id) VALUES (?,?)";
				$passInsert = $handler->prepare($passInsertQuery);
				if($passInsert->execute(array($password,$userId))){
					try{
						if($orgLogo)
					$orgInsertQuery = "INSERT INTO organization (name, doe, img, address, objective, type, u_id) VALUES (?,?,?,?,?,?,?)";
					$orgInsert = $handler->prepare($orgInsertQuery);
					if($orgLogo==""){
						$orgLogo = BASE_URL."/profile/project_image/default.jpg";
					}
					if($orgInsert->execute(array($orgName,$orgDoe,$orgLogo,$orgAdd,$orgObj,$userType,$userId))){
							$profileInsertQuery = "INSERT INTO profile (u_id,profile_photo,about) VALUES (?,?,?)";
						$profileInsert = $handler->prepare($profileInsertQuery);
							if($profileInsert->execute(array($userId,"default.jpg","This is the about section. Edit profile to change this section."))){


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
				}catch(PDOException $e){
						header("Location:".PUBLIC_PATH2."/index.php");
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
		public function insertWelfareUser($firstName,$lastName,$email,$password,$contactNumber,$userType,$welfName,$welfDoe,$welfAdd,$welfServ,$welfLogo,$welfObj,$hashedKey){
			$handler = $this->connObj->handler;
			$handler->beginTransaction();
			$userInsertQuery = "INSERT INTO user (user_name, first_name, last_name, contact_number, user_type,user_hash) VALUES (?,?,?,?,?,?)";
			$userInsert = $handler->prepare($userInsertQuery);
			if($userInsert->execute(array($email,$firstName,$lastName,$contactNumber,$userType,$hashedKey))){

				$userId = $handler->lastInsertId();
				$passInsertQuery = "INSERT INTO password (password, u_id) VALUES (?,?)";
				$passInsert = $handler->prepare($passInsertQuery);
				if($passInsert->execute(array($password,$userId))){
					$welfInsertQuery = "INSERT INTO welfare (name, doe, img, address, service, objective, type, u_id) VALUES (?,?,?,?,?,?,?,?)";
					$welfInsert = $handler->prepare($welfInsertQuery);
					if($welfLogo==""){
						$welfLogo = BASE_URL."/profile/project_image/default.jpg";
					}
					if($welfInsert->execute(array($welfName,$welfDoe,$welfLogo,$welfAdd,$welfServ,$welfObj,$userType,$userId))){
							$profileInsertQuery = "INSERT INTO profile (u_id,profile_photo,about) VALUES (?,?,?)";
						$profileInsert = $handler->prepare($profileInsertQuery);
							if($profileInsert->execute(array($userId,"default.jpg","This is the about section. Edit profile to change this section."))){


						$handler->commit();
						$this->connObj->close_connection();
						return 1;
						}else{
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
			}else {
				$handler->rollback();
				return 0;
			}
		}	
		public function checkValid($user){
			$handler = $this->connObj->handler;
			$userQuery = "SELECT * FROM user WHERE user.user_name=? LIMIT 1";
			$getUser = $handler->prepare($userQuery);
			if($getUser->execute(array($user))){
				if($getUser->rowCount()==0){
					return true;
				}
				else{
					return false;
				}
			}	
		}
		public function checkNonActivatedUser($user){
			
			$handler = $this->connObj->handler;
			$userQuery = "SELECT * FROM user WHERE user.user_name=? LIMIT 1";
			$getUser = $handler->prepare($userQuery);
			if($getUser->execute(array($user))){
				if($getUser->rowCount()==0){
					return false;
				}
				else{
					while($row = $getUser->fetch(PDO::FETCH_OBJ)){
						$status = $row->user_status;
					}
					if($status==1){
						return true;
					}
					else {
						return false;
					}
				echo "error ayo";
				exit;	
				}
			}	
		}
	}
	global $connObj;
	$signUpModelObj = new SignUpModel($connObj);
	

?>