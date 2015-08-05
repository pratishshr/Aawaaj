<?php
	define('BASE_URL','http://localhost/Aawaaj/admin');
	define('ROOT_PATH',$_SERVER['DOCUMENT_ROOT']."/Aawaaj/admin");
	

	//DEFINE DATABASE CONSTANTS
	define('HOSTNAME','localhost');
	define('USERNAME','root');
	define('PASSWORD','alskdjf1');
	define('DATABASE','aawaaj');

	//INCLUDE ROUTES AND DATABASE CONNECTION CLASS
	include_once(ROOT_PATH."/config/routes.php");
	include_once(ROOT_PATH."/system/dbUtil/dbconnection.class.php");
?>