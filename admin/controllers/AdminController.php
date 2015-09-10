<?php require_once(ROOT_PATH."admin/helpers/session.php"); ?>

<?php 
	
	class AdminController{

		public function __construct(){
			if(Session::get('loggin') == false){
				echo "nope";
				
			}
		}

		public function login(){

			if(isset($_POST['submit'])){
				$username = $_POST['username'];
				$password = $_POST['password'];


			}
		}


	}



