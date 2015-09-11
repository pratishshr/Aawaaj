<?php include_once("../config/config.php");?>
<?php include_once("helpers/session.php");?>

<?php
	//IF THE KEY PAGE EXISTS IN THE URL SET IT TO THAT PAGE ELSE DEFAULT IT TO ausers,i.e,USERS TABLE
	if(isset($_GET['page'])){
		$page = $_GET['page'];		
	}else{
		$page = "admin";
	}

	//CHECK TO SEE IF THE KEY IS AVAILABLE IN THE ROUTES , IF SO ROUTE IS TO THAT PAGE ELSE TO DEFAULT PAGE
	if(array_key_exists($page, $routes)){
		include_once(ROOT_PATH."admin/controllers/".$routes[$page].".php");

	}else{
		include_once(ROOT_PATH."admin/controllers/AdminUserController.php");
	}
?>



