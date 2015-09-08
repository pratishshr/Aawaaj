<?php
require_once ($_SERVER['DOCUMENT_ROOT']."/Aawaaj/config/config.php");
require_once(ROOT_PATH."app/model/SignUpModel.php");
require_once(ROOT_PATH."app/model/signupconfirmmodel.php");

class ConfirmUserName{
	// private $username;
	// private $id;
	// if(isset($_GET['user']) && isset($_GET['id'])){
	// 	$username = $_GET['user'];		
	// }else{
	// 	header("Location: ../../public/index.php");
	// }



	public $user;
	private $state=0;
	function __construct(){
		$action=$_POST['action'];

		if($action=='check_username'){
			$this->user = $_POST['username']; 
			if(($this->user)!="")
			$this->checkUserName($this->user);
		}
	}
	public function checkUserName($user){
		global $signUpModelObj,$confirmSignUpModelObj,$sendmail;
		$nonExistingUser = $signUpModelObj->checkValid($this->user);
		$activeStatus = $signUpModelObj->checkNonActivatedUser($this->user);
		if($nonExistingUser){
			echo "<span class='yes'>{$this->user} is available </span>";
			$state = 1;
		}elseif (!$nonExistingUser) {
			if(!$activeStatus)
			{
				$firstname = $confirmSignUpModelObj->getFirstName($this->user);
				$lastname = $confirmSignUpModelObj->getLastName($this->user);
				echo "<span class='no'>{$this->user} already exists " . "<a style=\"color:red;\" href=\"" . BASE_URL . "app/view/signUpConfirm.php?email=" . $this->user . "&fname=" . $firstname . "&lname=" . $lastname . "\">Activate Now</a></span>";
				$state=0;
			}else{
			echo "<span class='no'>{$this->user} is not available</span>";
			$state=0;
			}
		}
	}
	public function getState(){
		return $this->state;
	}
}
$confirmusername = new ConfirmUserName();
?>
