<?php require_once(ROOT_PATH."admin/helpers/session.php"); ?>
<?php require_once(ROOT_PATH."admin/core/Auth_Model.php"); ?>

<?php 
	
	class Auth_Controller{

		public function __construct(){
			
			Session::init();
		
			if(Session::get('loggin') == false){
				$this->login();				
			}
		}

		public function login(){
			

			if(Session::get('loggin') == true){
				
			}

			if(isset($_POST['submit'])){
				$username = $_POST['username'];
				$password = $_POST['password'];

				$authmodel = new Auth_Model();
				$passwordhash = $authmodel->get_hash($username);
				
	
				if(password_verify($password,$passwordhash)){
					Session::set('loggin',true);
				}else{
					include_once(ROOT_PATH."admin/views/admin/login.php");	
		    		exit;
				}	
				
		    }else{
		    	include_once(ROOT_PATH."admin/views/admin/login.php");	
		    	exit;
		    }


		}

		public function logout(){

			Session::destroy();

			header("location:index.php");	

		}
	}



