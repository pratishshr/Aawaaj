<?php
	define('BASE_URL','http://localhost/Aawaaj/admin');
	define('ROOT_PATH',$_SERVER['DOCUMENT_ROOT']."/Aawaaj/admin");
	define('PUBLIC_PATH',$_SERVER['DOCUMENT_ROOT']."/Aawaaj/public");
	define('PUBLIC_PATH2',"http://localhost/Aawaaj/public");
	

	//DEFINE DATABASE CONSTANTS
	define('HOSTNAME','localhost');
	define('USERNAME','root');

	define('PASSWORD','damcare');
	//define('PASSWORD_SUJAN','alskdjf1');
	//define('PASSWORD','damcare');
	define('DATABASE','aawaaj');

	//INCLUDE ROUTES AND DATABASE CONNECTION CLASS
	include_once(ROOT_PATH."/config/routes.php");
	include_once(ROOT_PATH."/system/dbUtil/dbconnection.class.php");
	include_once(ROOT_PATH."/system/lib/loaderhelper.class.php");
?>