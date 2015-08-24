<?php include_once("../config/config.php");?>


<?php 
	//IF THE KEY PAGE EXISTS IN THE URL SET IT TO THAT PAGE ELSE DEFAULT IT TO start fundraiser
	
	if(isset($_GET['page'])){
		$page = $_GET['page'];
	}else{
		$page = "fund";
	}

	//CHECK IF IT IS AVAILABLE IN ROUTES
	if(array_key_exists($page, $routes)){
		include_once(ROOT_PATH."fundraiser/controllers/".$routes[$page].".php");
	}else{
		include_once(ROOT_PATH."fundraiser/controllers/FundController.php");
		
	}


?>

