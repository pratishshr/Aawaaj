<?php
require_once ($_SERVER['DOCUMENT_ROOT']."/Aawaaj/app/model/signupconfirmmodel.php");
class ConfirmSignUp{
	private $firstname;
	private $code;

	function __construct(){
		$this->firstname = $_GET['user'];
		$this->code = $_GET['id'];
		if(($this->firstname)!="" && ($this->code)!=""){
			$this->checkDBEntry();
		}
	}
	public function getUser(){
		return $this->firstname;
	}
	public function getCode(){
		return $this->code;
	}
	public function checkDBEntry(){

		global $confirmSignUpModelObj;
		$userStatus = $confirmSignUpModelObj->confirmUserSignup($this->getUser(),$this->getCode());
		if($userStatus){
			echo "ayo";
			header('Location:../../public/index.php?status=success');//Give some success message in the index page
		}else{
			//this code has a bug, you should let the user resend the confirmation link to the email
			header('Location:../../public/index.php'); // Give some failed message
		}
	}
}
if(isset($_GET['user']) && isset($_GET['id'])){
$confirmsignupobj = new ConfirmSignUp();
}
else{
	echo "Forward to header, giving some error";
	//header("Location:../../public/index.php");
}
?>