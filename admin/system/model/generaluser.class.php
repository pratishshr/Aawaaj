<?php
	class GeneralUser{
		private $gen_id;
		private $age;

		public function __contruct(){

		}

		public function get_gen_id(){
			return $this->gen_id;
		}

		public function set_gen_id($gen_id){
			$this->gen_id = $gen_id;
		}

		public function  get_age(){
			return $this->age;
		}

		public function set_age($age){
			$this->age = $age;
		}

	}
?>