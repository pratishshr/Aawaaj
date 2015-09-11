<?php
	class PayRepository{
		private $db;

		public function __construct(){
			$this->db = new DbConnection();
		}

		public function get_all(){
			//ARRAY OBJECT PASS GARNA
			$pay_list = array();

			//DBCONNECTION
			$this->db->connect();

			//SELECT ALL
			$sql = "SELECT * FROM donations";

			//fetchquery
			$result = $this->db->fetchquery($sql);

			//STORE IN OBJECT AND SEND TO VIEW
			while($row = $result->fetch_assoc()){
				$paypal =  new Paypal();
				$paypal->set->pay_id($row['pay_id']);
				$paypal->set->item_name($row['item_name']);
				$paypal->set->item_number($row['item_number']);
				$paypal->set->payment_amount($row['payment_amount']);
				$paypal->set->txn_id($row['txn_id']);
				$paypal->set->payer_email($row['payer_email']);
				
				array_push($$pay_list,$paypal);
			}

			$this->db->close();
			return $pay_list;

		}

		public function get_last_id(){
			$this->db->connect();
			return $this->db->insert_id();
			$this->db->close();
		}

		public function get_by_id($item_number){
			$pay = null;

			//ARRAY OBJECT PASS GARNA
			$pay_list = array();

			//DATABASE CONNECTION
			$this->db->connect();

			//SELECT BY ID
			$sql = "SELECT * FROM donations WHERE item_number=?";

			//PREPARE
			$stmt = $this->db->initialize($sql);
			
			//BIND
			$stmt->bind_param("i",$item_number);

			//EXECUTE
			$stmt->execute();

			//BIND RESULT
			$stmt->bind_result($pay_id,$item_name,$payment_amount,$txn_id,$payer_email,$item_number);
			
			while($stmt->fetch()){
				//instantiate object
				$paypal = new Paypal();

				$paypal->set_pay_id($pay_id);
				$paypal->set_item_name($item_name);
				$paypal->set_payment_amount($payment_amount);
				$paypal->set_txn_id($txn_id);
				$paypal->set_payer_email($payer_email);
				$paypal->set_item_number($item_number);
				array_push($pay_list,$paypal);
			}
				//CLOSE CONNECTION
				$this->db->close();
				

				return $pay_list;
		}

		public function insert($pay){
			//ARRAY OBJECT PASS GARNA
			$pay_list = array();

			//DATABASE CONNECTION
			$this->db->connect();
			
			//INSERT QUERY
			$sql = "INSERT INTO donations(item_name,payment_amount,txn_id,payer_email,item_number) values(?,?,?,?,?)";
		
			//PREPARE
			$stmt = $this->db->initialize($sql);
		
			//MAP DATA
			
			
			$item_name = $pay->get_item_name();
	
			$payment_amount = $pay->get_payment_amount();
		
			$txn_id = $pay->get_txn_id();

			$payer_email = $pay->get_payer_email();

			$item_number = $pay->get_item_number();

			//BIND
			$stmt->bind_param("sdisi",$item_name,$payment_amount,$txn_id,$payer_email,$item_number);
				
			//EXECUTE
			$stmt->execute();
				
			//CLOSE CONNECTION
			$this->db->close();

		}	

		public function totalFund($item_number){

			$pay = null;

			//DATABASE CONNECTION
			$this->db->connect();

			//SELECT BY ID
			$sql = "SELECT * FROM donations WHERE item_number=?";

			//PREPARE
			$stmt = $this->db->initialize($sql);

			//BIND
			$stmt->bind_param("i",$item_number);

			//EXECUTE
			$stmt->execute();

			//BIND RESULT
			$stmt->bind_result($pay_id,$item_name,$payment_amount,$txn_id,$payer_email,$item_number);

			$total = 0;
			while($stmt->fetch()){
				
				
				$total += $payment_amount;
			
			}
				//CLOSE CONNECTION
				$this->db->close();
				return $total;
		}

		public function total(){

			$pay = null;

			//DATABASE CONNECTION
			$this->db->connect();

			//SELECT BY ID
			$sql = "SELECT * FROM donations";

			//fetchquery
			$result = $this->db->fetchquery($sql);		

			$total = 0;
			while($row = $result->fetch_assoc()){
				
				
				$total += $row['payment_amount'];
			
			}
				//CLOSE CONNECTION
				$this->db->close();
				return $total;
		}


		
}		