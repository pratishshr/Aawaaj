<?php
		require_once ($_SERVER['DOCUMENT_ROOT']."/Aawaaj/config/config.php");
		require_once(ROOT_PATH."app/model/SignUpModel.php");
		require_once(ROOT_PATH."phpmailer/sendmail.php");
		require_once(ROOT_PATH."libraries/password.php");

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
			
			//recaptcha
			if(isset($_POST['g-recaptcha-response'])){
	          $captcha=$_POST['g-recaptcha-response'];
	          $recaptcha_secret = "6LcungsTAAAAAJs0QQtzf12E4scOoTwwlJaD0y2Z";
	          $remote_ip = $_SERVER['REMOTE_ADDR'];
	          $captcha_response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$recaptcha_secret."&response=".$captcha."&remoteip=".$remote_ip);
	          $captcha_response = json_decode($captcha_response,true);
	        }


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
			if($captcha_response['success']===true){
			$this->addToDatabase();
			}else{
				header("Location: ../view/signupform.php");
			}
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
   			 $savepath = BASE_URL."/pictures/orgPictures/1";
   			 
   			 $allowed_type = array('image/png','image/gif','image/jpeg','image/jpg');

   			 if(in_array($picture_type, $allowed_type)){
   			 	if($type=="organization_logo"){
   			 		$this->path = PUBLIC_PATH."/pictures/orgPictures/1".$picture_name ;
   			 		
   			 	}else{
   			 		$this->path = PUBLIC_PATH."/pictures/welfPictures/1".$picture_name ;
   			 	}
   			 }else {
   			 	$error[] = 'File Type Not Allowed';
   			 }

   			 if(!empty($error)){
   			 	//show the type of error in view class
   			 }else{
   			 	move_uploaded_file($picture_tmp, $this->path);
   			 	$this->path = $savepath.$picture_name;
   			 }
   			 return $this->path;
		}

		//Function to add data to database
		public function addToDatabase(){
			global $signUpModelObj,$sendmail;
			if ($this->userType == "generalUser"){
				$genSuccess = $signUpModelObj->insertGeneralUser($this->getFirstName(),$this->getLastName(),$this->getEmail(),$this->getPassword(),$this->getContactNumber(),$this->getUserType(),$this->getAge(),$sendmail->generateKey($this->getEmail()));

				if($genSuccess){
					$sendmail->generateKey($this->getEmail());
					$sendmail->send($this->getFirstName(),$this->getLastName());
					header('location:'.BASE_URL.'app/view/signUpConfirm.php?email='.$this->getEmail().'&fname='.$this->getFirstName().'&lname='.$this->getLastName());					
					
				}
				else{
					echo "Please Try Again";
				}
			}elseif ($this->userType == "organization") {
				
				$orgSuccess = $signUpModelObj->insertOrganizationUser($this->getFirstName(),$this->getLastName(),$this->getEmail(),$this->getPassword(),$this->getContactNumber(),$this->getUserType(),$this->getOrganizationName(),$this->getOrganizationDoe(),$this->getOrganizationAddress(),$this->getOrganizationLogo(),$this->getOrganizationObjectives(),$sendmail->generateKey($this->getEmail()));
		 		if($orgSuccess){
		 			$sendmail->generateKey($this->getEmail());
					$sendmail->send($this->getFirstName(),$this->getLastName());
					header('location:'.BASE_URL.'app/view/signUpConfirm.php?email='.$this->getEmail().'&fname='.$this->getFirstName().'&lname='.$this->getLastName());					
		 		}
		 	}elseif ($this->userType == "welfare") {
		 		$welfSuccess = $signUpModelObj->insertWelfareUser($this->getFirstName(),$this->getLastName(),$this->getEmail(),$this->getPassword(),$this->getContactNumber(),$this->getUserType(),$this->getWelfareName(),$this->getWelfareDoe(),$this->getWelfareAddress(),$this->getWelfareService(),$this->getWelfareLogo(),$this->getWelfareObjectives(),$sendmail->generateKey($this->getEmail()));
		 		if($welfSuccess){
		 			$sendmail->generateKey($this->getEmail());
					$sendmail->send($this->getFirstName(),$this->getLastName());
					header('location:'.BASE_URL.'app/view/signUpConfirm.php?email='.$this->getEmail().'&fname='.$this->getFirstName().'&lname='.$this->getLastName());					
		 		}
		 	}
		}
		
	}

	$signUpControllerObj = new SignUpController();


?>