<?php
	
	class Session{
		
		private $logged_in=false;
		public $user_id;
		public $firstName;
		public $organization_name;
		public $welfare_name;

		function __construct(){
			session_start();
			$this->verifyLogin();
			
			if($this->logged_in){
				//do something
			}else{
				//do something
			} 
			if(isset($_GET['id'])){
				if($_GET['id']=="Logout"){
				$this->logout();
				}
				
			}

		}

		public function isLoggedIn(){
			return $this->logged_in;
		}

		public function generalUserLogin($userid,$firstname,$lastname,$usertype,$userhash,$username){
			//database should find user based on username/password
			if($userid){
				$this->user_id  = $_SESSION['user_id'] = $userid;
				$_SESSION['first_name'] = $firstname;
				$_SESSION['last_name'] = $lastname;
				$_SESSION['user_type'] = $usertype;
				$_SESSION['user_hash'] = $userhash;
				$_SESSION['user_name'] = $username;
				$this->logged_in = true;
				$this->firstName = $firstname;
			
			}
		}

		public function organizationLogin($userid,$organizationName,$usertype,$userhash){
			//database should find organization based on username/password
			if($userid){
				$this->user_id  = $_SESSION['user_id'] = $userid;
				$_SESSION['first_name'] = $firstname;
				$_SESSION['organization_name'] = $organizationName;
				$_SESSION['user_type'] = $usertype;
				$_SESSION['user_hash'] = $userhash;
				$this->logged_in = true;
				$this->organization_name = $organizationName;
			}
		}

		public function welfareLogin($userid,$welfareName,$usertype,$userhash){
			//database should find organization based on username/password
			if($userid){
				$this->user_id  = $_SESSION['user_id'] = $userid;
				$_SESSION['first_name'] = $firstname;
				$_SESSION['welfare_name'] = $welfareName;
				$_SESSION['user_type'] = $usertype;
				$_SESSION['user_hash'] = $userhash;
				$this->logged_in = true;
				$this->welfare_name = $welfareName;
			}
		}

		public function login($userid,$firstname){
			if($userid){
				$this->user_id  = $_SESSION['user_id'] = $userid;
				$_SESSION['first_name'] = $firstname;
				//$_SESSION['last_name'] = $lastname;
				$this->logged_in = true;
				$this->firstName = $firstname;
			}
		}
		public function getFirstName(){
					$this->firstName;
				}
 
		public function logout(){
			unset($_SESSION['user_id']);
			unset($this->user_id);
			session_destroy();
			$this->logged_in = false;
			header("Location: http://localhost/aawaaj/home");
		}

		private function verifyLogin(){
			if(isset($_SESSION['user_id'])){
				$this->user_id = $_SESSION['user_id'];
				$this->logged_in = true;
			}else{
				unset($this->user_id);
				$this->logged_in = false;
			}
		}
		public function getUserName(){
			return "Romit";
		}
	}	
	$session = new Session();
?>