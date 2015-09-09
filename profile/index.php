<?php require_once('../config/config.php');?>

<?php
	$page = 'profile';
		
	if(isset($_GET['id'])){
		
		if(isset($_GET['page'])){
			
			if($_GET['page'] == 'projects' || $_GET['page'] == 'requirements'){
				$page = $_GET['page'];
			}
		}
	}
	
	include_once(ROOT_PATH.'profile/controllers/'.$routes[$page].'.php');

?>