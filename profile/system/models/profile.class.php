<?php

class Profile{

	private $profile_photo;
	private $about;
	
	private $user_id;
	private $user_name;
	private $first_name;
	private $last_name;
	private $contact_number;
	private $user_type;
	private $user_status;
	private $user_hash;
	
	private $profile_id;
	private $age;
	
	private $name;
	private $doe;
	private $img;
	private $address;
	private $service;
	private $objective;


	public function __construct(){

	}

	public function get_profile_photo(){
		return $this->profile_photo;
	}

	public function set_profile_photo($profile_photo){
		$this->profile_photo = $profile_photo;
	}

	public function get_about(){
		return $this->about;
	}

	public function set_about($about){
		$this->about = $about;
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
		return $this->contact_number;
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
		return $this->user_status;
	}

	public function set_user_status($user_status){
		$this->user_status = $user_status;
	}
	
	public function get_user_hash(){
		return $this->user_hash;
	}

	public function set_user_hash($user_hash){
		$this->user_hash = $user_hash;
	}

	
	public function get_profile_id(){
		return $this->profile_id;
	}

	public function set_profile_id($profile_id){
		$this->profile_id = $profile_id;
	}

	public function get_age(){
		return $this->age;
	}

	public function set_age($age){
		$this->age = $age;
	}

	public function get_name(){
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


	public function get_address(){
		return $this->address;
	}

	public function set_address($address){
		$this->address = $address;
	}


	public function get_service(){
		return $this->service;
	}

	public function set_service($service){
		$this->service = $service;
	}


	public function get_objective(){
		return $this->objective;
	}

	public function set_objective($objective){
		$this->objective = $objective;
	}



}