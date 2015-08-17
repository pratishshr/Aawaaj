<?php
	class User{
		private $user_id;
		private $user_name;
		private $first_name;
		private $last_name;
		private $contact_number;
		private $user_type;
		private $user_status;
		private $password;

		//for organization
		private $ord_id;
		private $name;
		private $doe;
		private $img;
		private $address;
		private $objective;

		//for welfare
		private $welf_id;
		private $welf_name;
		private $welf_doe;
		private $welf_img;
		private $welf_address;
		private $welf_service;
		private $welf_objective;

		

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

		public function get_password(){
			return $this->password ;
		}

		public function set_password($password){
			$this->password = $password;

		}

			public function get_ord_id(){
			return $this->ord_id;
		}

		public function set_ord_id($ord_id){
			$this->gen_id = $gen_id;
		}

		public function  get_name(){
			return $this->name;
		}

		public function set_name($name){
			$this->name = $name;
		}

		public function get_doe(){
			return $this->doe;
		}

		public function set_doe($doe){
			$this->doe = $doe;
		}

		public function get_img(){
			return $this->img;
		}

		public function set_img($img){
			$this->img = $img;
		}

		public function  get_address(){
			return $this->address;
		}

		public function set_address($address){
			$this->address = $address;
		}

		public function  get_objective(){
			return $this->objective;
		}

		public function set_objective($objective){
			$this->objective = $objective;
		}




		public function  get_welf_id(){
			return $this->welf_id;
		}

		public function set_welf_id($welf_id){
			$this->welf_id = $welf_id;
		}

		public function  get_welf_name(){
			return $this->welf_name;
		}

		public function set_welf_name($welf_name){
			$this->welf_name = $welf_name;
		}


		public function  get_welf_doe(){
			return $this->welf_doe;
		}

		public function set_welf_doe($welf_doe){
			$this->welf_doe = $welf_doe;
		}


		public function  get_welf_img(){
			return $this->welf_img;
		}

		public function set_welf_img($welf_img){
			$this->welf_img = $welf_img;
		}


		public function  get_welf_address(){
			return $this->welf_address;
		}

		public function set_welf_address($welf_address){
			$this->welf_address = $welf_address;
		}


		public function  get_welf_service(){
			return $this->welf_service;
		}

		public function set_welf_service($welf_service){
			$this->welf_service = $welf_service;
		}


		public function  get_welf_objective(){
			return $this->welf_objective;
		}

		public function set_welf_objective($welf_objective){
			$this->welf_objective = $welf_objective;
		}


		


	}
?>