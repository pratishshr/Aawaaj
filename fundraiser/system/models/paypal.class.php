<?php
	class Paypal {

		private $pay_id;
		private $item_name;
		private $item_number;
		private $payment_amount;
		private $txn_id;
		private $payer_email;

		public function __construct(){

		}

		public function get_pay_id(){
			return $pay_id;
		}

		public function set_pay_id($pay_id){
			$this->pay_id = $pay_id;
		}

		public function get_item_name(){
			return $this->item_name;
		}

		public function set_item_name($item_name){
			$this->item_name = $item_name;
		}

		public function get_item_number(){
			return $this->item_number;
		}

		public function set_item_number($item_number){
			$this->item_number = $item_number;
		}


		public function get_payment_amount(){
			return $this->payment_amount;
		}

		public function set_payment_amount($payment_amount){
			$this->payment_amount = $payment_amount;
		}
		
		public function get_txn_id(){
			return $this->txn_id;
		}

		public function set_txn_id($txn_id){
			$this->txn_id = $txn_id;
		}

		public function get_payer_email(){
			return $this->payer_email;
		}

		public function set_payer_email($payer_email){
			$this->payer_email = $payer_email;
		}
	}
?>