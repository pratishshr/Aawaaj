<?php
	class SearchList{
		private $user_id;
		private $first_name;
		private $last_name;
		private $user_type;
		private $status;
		private $user_hash;

		private $title;
		private $description;
		private $fundraiser_type;
		private $amount;
		private $image;
		private $fund_id;


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
		public function get_user_hash(){
			return $this->user_hash;
		}
		public function set_user_hash($user_hash){
			$this->user_hash=$user_hash;
		}


		public function get_title(){
			return $this->title;
		}
		public function set_title($title){
			$this->title=$title;
		}
		public function set_description($description){
			$this->description=$description;
		}
		public function get_description(){
			return $this->description;
		}
		public function set_fundraiser_type($fundraiser_type){
			$this->fundraiser_type=$fundraiser_type;
		}
		public function get_fundraiser_type(){
			return $this->fundraiser_type;
		}
		public function set_amount($amount){
			$this->amount=$amount;
		}	
		public function get_amount(){
			return $this->amount;
		}
		public function set_image($image){
			$this->image=$image;
		}
		public function get_image(){
			return $this->image;
		}
		public function get_fund_id(){
			return $this->fund_id;
		}
		public function set_fund_id($fund_id){
			$this->fund_id=$fund_id;
		}
	}


?>