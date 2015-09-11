<?php
	class Admin_Model{
		private $id;
		private $username;
		private $password;
		private $first_name;
		private $last_name;
		private $email;
		private $image;

		public function __construct(){

		}

		public function get_id(){
			return $this->id;
		}

		public function set_id($id){
			$this->id = $id;
		}

		public function get_username(){
			return $this->username;
		}

		public function set_username($username){
			$this->username = $username;
		}

		public function get_password(){
			return $this->password;

		}

		public function set_password($password){
			$this->password = $password;
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
			$this->last_name  = $last_name;
		}

		public function get_email(){
			return $this->email;
		}

		public function set_email($email){
			$this->email  = $email;
		}

		public function get_image(){
			return $this->image;
		}

		public function set_image($image){
			$this->image = $image;
		}
	}