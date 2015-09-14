<?php
	define('BASE_URL','http://localhost/Aawaaj/');
	define('ROOT_PATH',$_SERVER['DOCUMENT_ROOT']."/Aawaaj/");
	define('PUBLIC_PATH',$_SERVER['DOCUMENT_ROOT']."/Aawaaj/home");
	define('PUBLIC_PATH2',"http://localhost/Aawaaj/home");
	

	//DEFINE DATABASE CONSTANTS
	define("DB_SERVER1", "mysql:host=127.0.0.1");

	define("DB_NAME1", ";dbname=aawaaj");

	define('HOSTNAME','127.0.0.1');

	define('USERNAME','root');

	define('PASSWORD','damcare');


	define('DATABASE','aawaaj');

	//INCLUDE ROUTES AND DATABASE CONNECTION CLASS
	include_once(ROOT_PATH."/config/routes.php");
	include_once(ROOT_PATH."/admin/system/dbUtil/dbconnection.class.php");
	include_once(ROOT_PATH."/admin/system/lib/loaderhelper.class.php");
?>