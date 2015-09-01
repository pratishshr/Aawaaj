<?php
require_once($_SERVER['DOCUMENT_ROOT']."/Aawaaj/app/model/SignUpModel.php");

class ConfirmUserName{
	private $username;
	private $id;
	if(isset($_GET['user']) && isset($_GET['id'])){
		$username = $_GET['user'];		
	}else{
		header("Location: ../../public/index.php");
	}



	// public $user;
	// function __construct(){
	// 	$action=$_POST['action'];

	// 	if($action=='check_username'){
	// 		$this->user = $_POST['username']; 
	// 		if(($this->user)!="")
	// 		$this->checkUserName($this->user);
	// 	}
	// }
	// public function checkUserName($user){
	// 	global $signUpModelObj;
	// 	$validUser = $signUpModelObj->checkValid($this->user);
	// 	if($validUser){
	// 		echo "<span class='yes'>{$this->user} is available </span>";
	// 	}else{
	// 		echo"<span class='no'>{$this->user} is not available</span>";
	// 	}
	// }
}
$confirmusername = new ConfirmUserName();
?>
