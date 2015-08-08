<?php
require_once ($_SERVER['DOCUMENT_ROOT']."/Aawaaj/app/model/signupconfirmmodel.php");
class ConfirmSignUp{
	private $email;
	private $code;

	function __construct(){
		$this->email = $_POST['email'];
		$this->code = $_POST['code'];
		if(($this->email)!="" && ($this->code)!=""){
			$this->checkDBEntry();
		}
	}
	public function getEmail(){
		return $this->email;
	}
	public function getCode(){
		return $this->code;
	}
	public function checkDBEntry(){

		global $confirmSignUpModelObj;
		$userStatus = $confirmSignUpModelObj->confirmUserSignup($this->getEmail(),$this->getCode());
		if($userStatus){
			echo "ayo";
			header('Location:../../public/index.php?status=success');//Give some success message in the index page
		}else{
			echo "ayo";
			header('Location:../view/signUpConfirm.php?email='.$this->getEmail().'&message=failed'); // Give some failed message
		}
	}
}
$confirmsignupobj = new ConfirmSignUp();
?>