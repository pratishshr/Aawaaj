<?php
	class Searchlist{
		private $user_id;
		private $first_name;
		private $last_name;
		private $user_type;
		private $status;

		public function __construct(){

		}
		public function get_id(){
			return $this->user_id;
		}
		public function get_first_name(){
			return $this->first_name;
		}
		public function get_last_name(){
			return $this->last_name;
		}

		public function get_user_type(){
			return $this->user_type;
		}
		public function get_status(){
			return $this->status;
		}
		public function set_user_id($user_id){
			$this->user_id=$user_id;
		}
		public function set_first_name($first_name){
			$this->first_name=$first_name;
		}
		public function set_last_name($last_name){
			$this->last_name=$last_name;
		}
		public function set_user_type($user_type){
			$this->user_type=$user_type;
		}
		public function set_status($status){
			$this->status=$status;
		}

	}

?>