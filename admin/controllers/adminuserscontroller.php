<?php
	class AdminUsersController{
		private $userrepository;
		public function __construct(){
			$this->userrepository = new UserRepository();
		}


		public function index(){
			//INDEX PAGE OF ADMIN CONTROLLING USERS TABLE
			include_once(ROOT_PATH."/views/admin/adminusersview/index.php");
		}

		public function general(){
			include_once(ROOT_PATH."/views/admin/adminusersview/showgeneraluser.php");
		}
		public function add(){
			//PAGE TO ADD THE USER IN DATABASE BY ADMIN ITSELF
			echo "add";
		}

		public function edit(){
			//PAGE TO EDIT THE USER ALREADY IN THE DATABASE
			echo "edit";
		}

		public function delete(){
			//DELETE THE USER CURRENTLY IN THE DATABASE
			echo "delete";
		}

	}
	//OBJECT OF AdminUsersController
	$adminuserscontroller = new AdminUsersController();

	//IF m IS SET, SET IT TO $method, ELSE DEFAULT IT TO index
	if(isset($_GET['m'])){
		$method=$_GET['m'];
	}else{
		$method = "index";
	}

	switch($method){
		case "index":
			$adminuserscontroller->index();
			break;

		case "add":
			$adminuserscontroller->add();
			break;

		case "edit":
			$adminuserscontroller->edit();
			break;
		
		case "delete":
			$adminuserscontroller->delete();
			break;

		case "general":
			$adminuserscontroller->general();
			break;

		default:
			$adminuserscontroller->index();		
	}

?>