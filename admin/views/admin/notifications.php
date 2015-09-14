<?php
	
	$jsonData = file_get_contents("http://localhost/aawaaj/admin/views/admin/notifications.json");
	$jsonData = json_decode($jsonData); 
	
	$noti = $jsonData->noti;

	if(isset($_POST['noti'])){
	
	$noti += $jsonData->noti;;
	
	}
	
	
	$data = array("noti" => "$noti") ;
	echo json_encode($data);

	$fp = fopen('notifications.json', 'w');
	fwrite($fp, json_encode($data));
	fclose($fp);
?>