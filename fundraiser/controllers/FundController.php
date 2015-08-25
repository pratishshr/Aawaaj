<?php
	class FundController{

		public function __construct(){

		}

		public function index(){
			$view_page = "fundview/index";
			include_once(ROOT_PATH."fundraiser/views/container.php");
		}

		public function create(){
			$view_page = "fundview/create";
			include_once(ROOT_PATH."fundraiser/views/container.php");
		}

	}

	$fundcontroller = new FUndController();

	if(isset($_GET['m'])){
		$method = $_GET['m'];
	}else{
		$method = "index";
	}

	switch($method){

		case "index":
			$fundcontroller->index();
			break;

		case "create":
			$fundcontroller->create();
			break;

		default:
			$fundcontroller->index();
			break;
	}