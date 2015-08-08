<?php
		require_once($_SERVER['DOCUMENT_ROOT']."/Aawaaj/app/model/SignUpModel.php");

	class SignUpController{

		//Normal form Variables
		private $firstName;
		private $lastName;
		private $email;
		private $password;
		private $contactNumber;
		private $userType;

		//General User form variables
		private $age = null;

		//Organization form variables
		private $organizationName;
		private $organizationDoe;
		private $organizationAddress;
		private $organizationLogo;
		private $organizationObjectives;

		//Welfare form variables
		private $welfareName;
		private $welfareDoe;
		private $welfareAddress;
		private $welfareService;
		private $welfareLogo;
		private $welfareObjectives;

		//other variable
		private $path;

		public function __construct(){
			//Initializing variables for normal form
			$this->firstName = $_POST['first_name'];
			$this->lastName = $_POST['last_name'];
			$this->email = $_POST['email'];
			$pwd=($_POST['password']);
			//encrypting password
			$pass=password_hash($pwd,PASSWORD_BCRYPT,array('cost'=>12));
			$this->password = $pass;
			$this->contactNumber = $_POST['contact_number'];
			$this->userType = $_POST['user_type'];

			//Initializing variables for organization form
			$this->organizationName = $_POST['organization_name'];
			$this->organizationDoe = $_POST['organization_date_of_establishment'];
			$this->organizationAddress = $_POST['full_address_of_organization'];
			$this->organizationLogo = $this->addLogo('organization_logo');
			$this->organizationObjectives = $_POST['objectives_of_organization'];

			//Initializing variables for welfare form
			$this->welfareName = $_POST['welfare_name'];
			$this->welfareDoe = $_POST['welfare_date_of_establishment'];
			$this->welfareAddress = $_POST['full_address_of_welfare'];
			$this->welfareService = $_POST['welfare_service'];
			$this->welfareLogo = $this->addLogo('welfare_photo');
			$this->welfareObjectives = $_POST['objectives_of_welfare'];
			//Add data to database
			$this->addToDatabase();
		}
		//fot all users
		public function getFirstName(){
			return $this->firstName;
		}
		public function getLastName(){
			return $this->lastName;
		}
		public function getEmail(){
			return $this->email;
		}
		public function getPassword(){
			return $this->password;
		}
		public function getContactNumber(){
			return $this->contactNumber;
		}
		public function getUserType(){
			return $this->userType;
		}
		//For general User
		public function getAge(){
			return $this->age;
		}
		//for the organization
		public function getOrganizationName(){
			return $this->organizationName;
		}
		public function getOrganizationDoe(){
			return $this->organizationDoe;
		}
		public function getOrganizationAddress(){
			return $this->organizationAddress;
		}
		public function getOrganizationLogo(){
			return $this->organizationLogo;
		}
		public function getOrganizationObjectives(){
			return $this->organizationObjectives;
		}

		//for the welfare
		public function getWelfareName(){
			return $this->welfareName;
		}
		public function getWelfareDoe(){
			return $this->welfareDoe;
		}
		public function getWelfareAddress(){
			return $this->welfareAddress;
		}
		public function getWelfareService(){
			return $this->welfareService;
		}
		public function getWelfareLogo(){
			return $this->welfareLogo;
		}
		public function getWelfareObjectives(){
			return $this->welfareObjectives;
		}

		//Function to keep the logo in the directory
		public function addLogo($type){
			 $picture_tmp =  $_FILES["{$type}"]['tmp_name'];
   			 $picture_name = $_FILES["{$type}"]['name'];
   			 $picture_type = $_FILES["{$type}"]['type'];
   			 
   			 $allowed_type = array('image/png','image/gif','image/jpeg','image/jpg');

   			 if(in_array($picture_type, $allowed_type)){
   			 	if($type=="organization_logo"){
   			 		$this->path = $_SERVER['DOCUMENT_ROOT']."/Aawaaj/public/pictures/orgPictures/1".$picture_name ;
   			 	}else{
   			 		$this->path = $_SERVER['DOCUMENT_ROOT']."/Aawaaj/public/pictures/welfPictures/1".$picture_name ;
   			 	}
   			 }else {
   			 	$error[] = 'File Type Not Allowed';
   			 }

   			 if(!empty($error)){
   			 	//show the type of error in view class
   			 }else{
   			 	move_uploaded_file($picture_tmp, $this->path);
   			 }
   			 return $this->path;
		}

		//Function to add data to database
		public function addToDatabase(){
			global $signUpModelObj;
			if ($this->userType == "generalUser"){
				$genSuccess = $signUpModelObj->insertGeneralUser($this->getFirstName(),$this->getLastName(),$this->getEmail(),$this->getPassword(),$this->getContactNumber(),$this->getUserType(),$this->getAge());

				if($genSuccess){
					header('location:../view/signUpConfirm.php?email='.$this->getEmail());					
					
				}
				else{
					echo "Please Try Again";
				}
			}elseif ($this->userType == "organization") {
				
				$orgSuccess = $signUpModelObj->insertOrganizationUser($this->getFirstName(),$this->getLastName(),$this->getEmail(),$this->getPassword(),$this->getContactNumber(),$this->getUserType(),$this->getOrganizationName(),$this->getOrganizationDoe(),$this->getOrganizationAddress(),$this->getOrganizationLogo(),$this->getOrganizationObjectives());
		 		if($orgSuccess){
					header('location:../view/signUpConfirm.php?email='.$this->getEmail());					
		 		}
		 	}elseif ($this->userType == "welfare") {
		 		$welfSuccess = $signUpModelObj->insertWelfareUser($this->getFirstName(),$this->getLastName(),$this->getEmail(),$this->getPassword(),$this->getContactNumber(),$this->getUserType(),$this->getWelfareName(),$this->getWelfareDoe(),$this->getWelfareAddress(),$this->getWelfareService(),$this->getWelfareLogo(),$this->getWelfareObjectives());
		 		if($welfSuccess){
					header('location:../view/signUpConfirm.php?email='.$this->getEmail());					
		 		}
		 	}
		}
		
	}

	$signUpControllerObj = new SignUpController();


?>