<?php
	class Session{
		private static $_sessionStarted = false;

		public static function init(){

			if(self::$_sessionStarted == false){
				session_start();
				self::$_sessionStarted = true;
			}
		}

		public static function set($key,$value){
			$_SESSION[$key] = $value;
		}

		public static function get($key){
			if(isset($_SESSION[$key])){
				return $_SESSION[$key];
			}
			return false;
		}

		public static function display(){
			return $_SESSION;
		}

		public static function destroy(){

			if(self::$_sessionStarted == true){
				session_unset();
				session_destroy();
			}
		}
		
	}
?>