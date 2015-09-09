<?php require_once ($_SERVER['DOCUMENT_ROOT']."/Aawaaj/config/config.php"); ?>
<?php require_once(ROOT_PATH."database/session.php"); ?>

<?php
require_once(ROOT_PATH."app/model/loginmodel.php");
			
			class LoginControl{
				private $username;
				private $password;
				private $firstName;

				function __construct(){
					if(isset($_POST['submit'])){
						$this->username = $_POST['username'];
						$this->password = $_POST['password'];

						$this->verifyUser();
					}
				}
				public function getUserName(){
					return $this->username;
				}
				private function verifyUser(){
					global $loginmodelobj;
					$success = $loginmodelobj->findUser($this->username,$this->password);
					if($success){
						global $session;
						//$this->firstName = $loginmodelobj->getFirstName();
						if($loginmodelobj->getUserType()=="generalUser"){
							$session->generalUserLogin($loginmodelobj->getUserId(),$loginmodelobj->getFirstName(),$loginmodelobj->getLastName(),$loginmodelobj->getUserType(),$loginmodelobj->getHashed());
						}
						elseif ($loginmodelobj->getUserType()=="organization") {
							if($loginmodelobj->getName($this->username)){
								$session->organizationLogin($loginmodelobj->getUserId(),$loginmodelobj->getOrganizationName(),$loginmodelobj->getUserType(),$loginmodelobj->getHashed());
						}}
						elseif ($loginmodelobj->getUserType()=="welfare") {
							if($loginmodelobj->getName($this->username)){
								$session->welfareLogin($loginmodelobj->getUserId(),$loginmodelobj->getWelfareName(),$loginmodelobj->getUserType(),$loginmodelobj->getHashed());
						}}
						$ehash = md5($this->getUserName());
						header("Location: ".BASE_URL."profile/index.php?id=".$ehash);
					}else{
						//if login not successful
						header("LOCATION: ".PUBLIC_PATH2."/index.php");
					}
				}
				


			}
			$loginControl = new LoginControl();

?>