<?php
/**
 * PayPal_Lib Controller Class (Paypal IPN Class)
 *
 * Paypal controller that provides functionality to the creation for PayPal forms, 
 * submissions, success and cancel requests, as well as IPN responses.
 *
 * The class requires the use of the PayPal_Lib library and config files.
 *
 * @package     CodeIgniter
 * @subpackage  Libraries
 * @category    Commerce
 * @author      Ran Aroussi <ran@aroussi.com>
 * @copyright   Copyright (c) 2006, http://aroussi.com/ci/
 *
 */

class Paypal { //extends Public_Controller {
	

	function __construct()
	{
		parent::__construct();
		require_once(ROOT_PATH."libraries/paypal_lib.php");
		//$this->load->library('paypal_lib');
		//$this->load->module_model('events','event_model');
		//$this->load->helper('common');
		//$this->load->helper('barcode');
		//$this->load->library('email');
		//$this->load->helper(array('url','file'));
		//$this->load->library('session');
		//$id=$this->input->post('event_id');
		//$this->load->plugin('fpdf');

		
	}
	
	function index()
	{
		//$this->form();
		
		$this->auto_form();
	}
	
	
	function auto_form()
	{
		/*echo $this->session->userdata('name');
		exit;*/
		
		$postTickets=$this->input->post('tickets');
		$this->session->set_userdata('no_of_sold_tickets',$postTickets);
		
		if($this->preference->item('paypal_server_mode')=='LIVE')
		{
			$this->paypal_lib->paypal_url = 'https://www.paypal.com/cgi-bin/webscr';
		}
		
		$name=$this->input->post('name');
		$this->session->set_userdata('order_name',$name);
		
		$email=$this->input->post('email');
		$this->session->set_userdata('order_email',$email);
		
		$total_amount=$this->input->post('total_amount');
		$this->session->set_userdata('total_amount',$total_amount);
		
		$ticket_amount=$this->input->post('ticket_amount');
		
		$event_id=$this->input->post('event_id');
		$total_amount=$this->input->post('total_amount'); 
		
		$this->paypal_lib->add_field('business', $this->preference->item('paypal_business_email'));
		$this->paypal_lib->add_field('currency_code', $this->preference->item('paypal_currency'));

	    $this->paypal_lib->add_field('return', site_url('paypal/success'));
	    $this->paypal_lib->add_field('cancel_return', site_url('paypal/cancel'));
	    $this->paypal_lib->add_field('notify_url', site_url('paypal/ipn')); // <-- IPN url
	    $this->paypal_lib->add_field('custom', $email.'|'.$name .'|'.$ticket_amount); // <-- Verify return

	    $this->paypal_lib->add_field('item_name', $this->input->post('event_name'));
	    $this->paypal_lib->add_field('item_number',$event_id);
	    $this->paypal_lib->add_field('quantity', $postTickets);
	    $this->paypal_lib->add_field('amount',$ticket_amount);


	    //$this->paypal_lib->paypal_auto_form();
		$data['header']='Payment Processing';
		$data['page'] = $this->config->item('backendpro_template_public') . 'paypal/processing';
		$this->load->view($this->_container,$data);		
	}
	function cancel()
	{
		//$data['content'] = $this->content_page_model->getContentPages()->result_array();
		$data['header']='Payment Cancelled';
		$data['page'] = $this->config->item('backendpro_template_public') . 'paypal/cancel';
		$this->load->view($this->_container,$data);
	}
	
	function success()
	{
		
		set_time_limit(0);
		
		
		//Barcode
		//$data['items'] = $result;
		
		$data['header']="Paypal Success";	
		$data['pp_info'] = $this->input->post();
		$data['page'] = $this->config->item('backendpro_template_public') . 'paypal/success';
		$this->load->view($this->_container,$data);
		
	
	
	}
	
	
	
	function ipn()
	{

		set_time_limit(0);
		$this->load->library('parser');		
		
		$to    = 'drabins@gmail.com';    //  your email
		if ($this->paypal_lib->validate()) 
		{

			$paypal_data=$this->paypal_lib->ipn_data;

			$order_info=explode('|',$paypal_data['custom']);
			
			$paypal_data['order_date']=date('Y-m-d H:i:s');
			$paypal_data['order_by']=$order_info[1];
			$paypal_data['order_by_email']=$order_info[0];
			$paypal_data['price']=$order_info[2];
			
			$parse_data=array('EVENT_ID'=>$paypal_data['item_number'],
							  'EVENT_NAME'=>$paypal_data['item_name'],
							  'ORDER_BY'=>$paypal_data['order_by'],
							  'ORDER_BY_EMAIL'=>$paypal_data['order_by_email'],
							  'PRICE'=>$paypal_data['price'],							  
							  'QUANTITY'=>$paypal_data['quantity'],
							  'ORDER_DATE'=>$paypal_data['order_date'],
							  'TXN_ID'=>$paypal_data['txn_id'],
							  'TOTAL'=>$paypal_data['mc_gross']);

			$subject='Kgarira Online Service (Received Payment) for Event ID '.$paypal_data['item_number'];
										  
			$body=$this->load->view('paypal/order_template',NULL,TRUE);
			
			$body=$this->parser->parse_string($body,$parse_data,TRUE);


			/*foreach ($this->paypal_lib->ipn_data as $key=>$value)
			//$body .= "\n$key: $value";*/

			$this->_update($paypal_data['item_number'],$paypal_data['quantity']);	
			$barcodes=$this->_generateBarCodes($paypal_data['quantity']);
			
			$this->_insert_order($paypal_data,$barcodes);
			// load email lib and email results
			$ticket_file_name=$paypal_data['item_number'].date('_Y_m_d_h_i_s').'.pdf';
			$this->_generateTicket($paypal_data,$ticket_file_name,$paypal_data['item_number'],$barcodes);
			
			$this->_mailbox_insert(array('name'=>$paypal_data['order_by'],'email'=>$paypal_data['order_by_email']),$subject,$body);
			
			$this->load->library('email');
			
			$admin_email=$this->preference->item('paypal_admin_email');
			$this->email->set_mailtype('html');
			$this->email->to($admin_email);
			$this->email->bcc($to);
			$this->email->from($this->paypal_lib->ipn_data['payer_email'], $this->paypal_lib->ipn_data['payer_name']);
			$this->email->subject($subject);
			$this->email->message($body);	
			//$this->email->attach('tickets/'.$ticket_file_name);
			$this->email->send();
			
			
			$this->email->clear();

			$body=$this->load->view('paypal/customer_template',NULL,TRUE);
			
			$body=$this->parser->parse_string($body,$parse_data,TRUE);
			
			$this->email->set_mailtype('html');
			$this->email->to($paypal_data['order_by_email']);
			$this->email->from($this->preference->item('automated_from_email'),$this->preference->item('automated_from_name'));
			$this->email->subject('Kgarira E-Ticket for Event  '.$paypal_data['item_name']);
			$this->email->message($body);	
			$this->email->attach('tickets/'.$ticket_file_name);
			$this->email->send();			
			
		}
	}
	
	
	private function _mailbox_insert($sender,$subject,$body)
	{
		$this->load->module_model('mailbox','mailbox_model');
		
		$data['sender'] = $sender['name'];
		$data['sender_email'] = $sender['email'];
		$data['subject'] = $subject;
		$data['body'] = $body;
		$data['mail_date'] = date('Y-m-d H:i:s');
		$data['is_read'] = '0';
		$data['mail_type'] = 'Payment';		
		$this->mailbox_model->insert('MAILBOX',$data);
		
	}
	private function _generateTicket($buyer,$file_name,$event_id,$barcodes)
	{
		$this->load->library('html2pdf');		
		//$content='Thank You';		
		$data['event']=$this->event_model->getEventVenue(array('events.event_id'=>$event_id))->row_array();
		$data['buyer']=$buyer;
		$data['barcodes']=$barcodes;
		//$data['barcodes']=$this->b
		$content=$this->load->view('pdf',$data,TRUE);
		$this->html2pdf->WriteHTML($content);
		$path='tickets/';
    	$this->html2pdf->Output($path.$file_name,'F');		
		
	}
	
	private function _generateBarCodes($nos)
	{
		$barcodes=array();
		for($i=1;$i<=$nos;$i++)
		{
			$text=generateCode(10,2);
			$dest="assets/barcodes/".$text.".jpg";
			Barcode39($text,$text,$dest,220,120);		
			$barcodes[$i]=$text;
		}
		return $barcodes;
	}
	
	private function _update($event_id,$no_of_tickets)
	{
		//$dataa['paid_tickets']=$updateTickets;
		$this->db->set('paid_tickets','paid_tickets + '.$no_of_tickets,FALSE);
		$this->event_model->update('EVENTS',NULL,array('event_id'=>$event_id));		
		
	}
	
	private function _insert_order($data,$barcodes)
	{
		$this->load->module_model('events','ticket_order_model');
		$post_data=array(
		'event_id'=>$data['item_number'],
		'quantity'=>$data['quantity'],
		'price'=>$data['price'],
		'order_by'=>$data['order_by'],
		'order_date'=>$data['order_date'],
		'order_by_email'=>$data['order_by_email'],
		'txn_id'=>$data['txn_id'],
		'payment_status'=>$data['payment_status']	
		);

		
		$this->ticket_order_model->insert('TICKET_ORDERS',$post_data);		
	}

}
?>