<?php include_once("../config/config.php");
 
 if(isset($_GET['page'])){
 	$page = $_GET['page'];
 }
 else{
 	$page="search";
 }

if(array_key_exists($page, $routes)){
	include_once(ROOT_PATH."search/controller/".$routes[$page].".php");
}else{
	include_once(ROOT_PATH."search/controller/SearchController.php");
}

?>