<?php
	class GeneralUserController{

		public function __construct(){

		}

		public function index(){
			$view_page = "generaluserview/index";
			include_once(ROOT_PATH."/views/admin/container.php");
		}

		public function edit(){
			echo("edit");
		}

		public function delete(){
			echo("deltete");
		}	
	
	}

	$generalusercontroller = new GeneralUserController();

	if(isset($_GET['m'])){
		$method = $_GET['m'];
	}else{
		$method = "";
	}

	switch($method){

		case 'index':
			$generalusercontroller->index();
			break;

		default:
			$generalusercontroller->index();	
			exit;
	}

?>