<?php include_once(ROOT_PATH."fundraiser/system/models/fundraiser.class.php");?>
<?php include_once(ROOT_PATH."fundraiser/system/models/paypal.class.php");?>
<?php include_once(ROOT_PATH."fundraiser/system/repositories/fundrepository.class.php");?>
<?php include_once(ROOT_PATH."fundraiser/system/repositories/payrepository.class.php");?>
<?php include_once(ROOT_PATH."admin/system/model/Admin_Model.php");?>
<?php include_once(ROOT_PATH."admin/system/repository/adminrepository.class.php");?>

<?php require_once(ROOT_PATH."admin/core/Auth_Controller.php");?>

<?php
	class Fund extends Auth_Controller{

		private $fundrepository;
		private $payrepository;
		private $adminrepository;
		public function __construct(){
			parent::__construct();
			$this->fundrepository = new FundRepository();
			$this->payrepository =  new PayRepository();
			$this->adminrepository = new AdminRepository();
		}


		public function index(){
			$view_page="fundview/index";
			include_once(ROOT_PATH."admin/views/admin/container.php");
		}

		public function donations(){
			$id = $_GET['id'];
			$thisFund = $this->fundrepository->get_by_id($id);
			
			$view_page="fundview/donations";
			include_once(ROOT_PATH."admin/views/admin/container.php");
		}
	
		
	}
	
	//OBJECT OF adminusercontroller
	$fund = new Fund();

	//IF m IS SET, SET IT TO $method, ELSE DEFAULT IT TO index
	if(isset($_GET['m'])){
		$method=$_GET['m'];
	}else{
		$method = "index";
	}

	switch($method){
		
		case "index":
			$fund->index();
			break;

		case "donations":
			$fund->donations();
			break;

		default:
			$fund->index();		
	}

?>