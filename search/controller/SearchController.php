<?php require_once(ROOT_PATH."database/session.php") ?>
<?php require_once(ROOT_PATH."app/controller/logincontroller.php") ?>
<?php
 require_once(ROOT_PATH."search/model/SearchList.class.php");?>
<?php require_once(ROOT_PATH."search/system/repositories/searchrepository.class.php");?>
<?php

	class SearchController{
		
		private $searchrepository;

		public function __construct(){
			$this->searchrepository = new SearchRepository();
		}

		public function index(){
			
			$view_page = "index";
			include_once(ROOT_PATH."search/view/container.php");
			
		}

		public function users(){

			$view_page = "users";
			include_once(ROOT_PATH."search/view/container.php");

		}

		public function fundraisers(){

			$view_page = "fundraisers";
			include_once(ROOT_PATH."search/view/container.php");

		}

		public function projects(){

			$view_page = "projects";
			include_once(ROOT_PATH."search/view/container.php");

		}


	}

		$searchcontroller =  new SearchController();
		if(isset($_GET['m'])){
			$method =  $_GET['m'];

		}else{
			$method = "index";
		}
		switch($method){
			case "index":

			$searchcontroller->index();
			
			break;
			case "users":
			$searchcontroller->users();
			break;
			case "fundraisers":
			$searchcontroller->fundraisers();
			break;
			case "projects":
			$searchcontroller->projects();
			break;
			default:
			$searchcontroller->index();
			break;
		}


?>