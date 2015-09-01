<?php
	define('BASE_URL','http://localhost/Aawaaj/');
	define('ROOT_PATH',$_SERVER['DOCUMENT_ROOT']."/Aawaaj/");
	define('PUBLIC_PATH',$_SERVER['DOCUMENT_ROOT']."/Aawaaj/public");
	define('PUBLIC_PATH2',"http://localhost/Aawaaj/public");
	

	//DEFINE DATABASE CONSTANTS
	define('HOSTNAME','localhost');
	define('USERNAME','root');

<<<<<<< HEAD

	define('PASSWORD','');
=======
	define('PASSWORD','alskdjf1');

	//define('PASSWORD','damcare');
>>>>>>> f10c13882ba93d5141f57e0c68661bd9239467da

	//define('PASSWORD_SUJAN','alskdjf1');
	//define('PASSWORD','damcare');
	define('DATABASE','aawaaj');

	//INCLUDE ROUTES AND DATABASE CONNECTION CLASS
	include_once(ROOT_PATH."/config/routes.php");
	include_once(ROOT_PATH."/admin/system/dbUtil/dbconnection.class.php");
	include_once(ROOT_PATH."/admin/system/lib/loaderhelper.class.php");
?>