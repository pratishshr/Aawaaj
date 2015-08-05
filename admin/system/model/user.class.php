<?php
	class User{
		private $user_id;
		private $user_name;
		private $first_name;
		private $last_name;
		private $contact_number;
		private $user_type;
		private $user_status;

		public function __construct(){

		}

		public function get_user_id(){
			return $this->user_id;
		}

		public function set_user_id($user_id){
			$this->user_id = $user_id;
		}

		public function get_user_name(){
			return $this->user_name;
		}

		public function set_user_name($user_name){
			$this->user_name = $user_name;
		}

		public function get_first_name(){
			return $this->first_name;

		}

		public function set_first_name($first_name){
			$this->first_name = $first_name;
		}

		public function get_last_name(){
			return $this->last_name;
		}

		public function set_last_name($last_name){
			$this->last_name = $last_name;
		}

		public function get_contact_number(){
			return $this->contact_number;{}
		}

		public function set_contact_number($contact_number){
			$this->contact_number = $contact_number;
		}

		public function get_user_type(){
			return $this->user_type;	
		}

		public function set_user_type($user_type){
			$this->user_type = $user_type;
		}

		public function get_user_status(){
			return $this->user_status ;
		}

		public function set_user_status($user_status){
			$this->user_status = $user_status;

		}

	}
?>