<?php
	class Fundraiser{

		private $fundraiser_type;
		private $title;
		private $amount;
		private $end_date;
		private $description;
		private $image;
		private $video_url;
		private $details;
		private $id;
		private $u_id;
		
		public function __construct(){

		}

		public function get_id(){
			return $this->id;
		}

		public function set_id($id){
			$this->id = $id;
		}
		public function get_fundraiser_type(){
			return $this->fundraiser_type;
		}

		public function set_fundraiser_type($fundraiser_type){
			$this->fundraiser_type = $fundraiser_type;

		}

		public function get_title(){
			return $this->title;
		}

		public function set_title($title){
			$this->title = $title;
		}

		public function get_amount(){
			return $this->amount;
		}

		public function set_amount($amount){
			$this->amount = $amount;
		}

		public function get_end_date(){
			return $this->end_date;
		}

		public function set_end_date($end_date){
			$this->end_date = $end_date;
		}


		public function get_description(){
			return $this->description;
		}

		public function set_description($description){
			$this->description = $description;
		}


		public function get_image(){
			return $this->image;
		}

		public function set_image($image){
			$this->image = $image;
		}


		public function get_video_url(){
			return $this->video_url;
		}

		public function set_video_url($video_url){
			$this->video_url = $video_url;
		}

		public function get_details(){
			return $this->details;
		}

		public function set_details($details){
			$this->details = $details;
		}

		public function get_u_id(){
			return $this->u_id;
		}

		public function set_u_id($u_id){
			$this->u_id = $u_id;
		}


	}
?>