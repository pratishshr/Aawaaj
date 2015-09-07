
<?php

require_once ($_SERVER['DOCUMENT_ROOT']."/Aawaaj/config/config.php");

class Connection{
	private $connection;
	private $magic_quotes_active;
	private $real_escape_string_exists;
	public $handler;	

		function __construct(){
			$this->open_connection();
			$this->magic_quotes_active = get_magic_quotes_gpc();
			$this->real_escape_string_exists = function_exists("mysql_real_escape_string");

		}

		public function open_connection(){

			try{

<<<<<<< HEAD
				$this->handler = new PDO("mysql:host=127.0.0.1;dbname=aawaaj","root","damcare");
=======
				$this->handler = new PDO(DB_SERVER.DB_NAME,USERNAME,PASSWORD);
>>>>>>> 161e49ca96c64d00c7ee8f8724812b8bc05b05bd

				$this->handler->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
			
			}catch(PDOException $e){
				echo "Please Retry";
				die();
			}
			
		}
		public function retHandler(){
			return $this->handler;
		}

		public function close_connection(){

			$this->handler = null;
			
		}

		public function escape_value($value){

				if($this->real_escape_string_exists){
					if($this->magic_quotes_active){
						$value = stripslashes($value);
					} else {
						if(!$this->magic_quotes_active){
							$value = addslashes($value);
						}
					return $value;
					}
				}
			}
	}
	$connObj = new Connection();
?>