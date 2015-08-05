<?php
	define('BASE_URL','http://localhost/Aawaaj/admin');
	define('ROOT_PATH',$_SERVER['DOCUMENT_ROOT']."/Aawaaj/admin");
	

	//DEFINE DATABASE CONSTANTS
	define('HOSTNAME','localhost');
	define('USERNAME','root');
<<<<<<< HEAD
	define('PASSWORD','alskdjf1');
=======
	define('PASSWORD','damcare');
>>>>>>> 88951be23119d74af99fc59e66d7fae7f0d7584e
	define('DATABASE','aawaaj');

	//INCLUDE ROUTES AND DATABASE CONNECTION CLASS
	include_once(ROOT_PATH."/config/routes.php");
	include_once(ROOT_PATH."/system/dbUtil/dbconnection.class.php");
?>