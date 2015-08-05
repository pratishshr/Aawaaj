<?php
	define('BASE_URL','http://localhost/Aawaaj/admin');
	define('ROOT_PATH',$_SERVER['DOCUMENT_ROOT']."/Aawaaj/admin");
	

	//DEFINE DATABASE CONSTANTS
	define('HOSTNAME','localhost');
	define('USERNAME','root');
<<<<<<< HEAD
	define('PASSWORD','');
=======
	define('PASSWORD_SUJAN','alskdjf1');
	define('PASSWORD','damcare');
>>>>>>> 534041d461bbbbc3613fc46bea912512e3528557
	define('DATABASE','aawaaj');

	//INCLUDE ROUTES AND DATABASE CONNECTION CLASS
	include_once(ROOT_PATH."/config/routes.php");
	include_once(ROOT_PATH."/system/dbUtil/dbconnection.class.php");
?>