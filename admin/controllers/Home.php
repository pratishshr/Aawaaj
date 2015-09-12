<?php include_once(ROOT_PATH."admin/system/model/User_Model.php");?>
<?php include_once(ROOT_PATH."admin/system/repository/userrepository.class.php");?>
<?php require_once(ROOT_PATH."admin/core/Auth_Controller.php");?>

<?php include_once(ROOT_PATH."admin/system/model/Admin_Model.php");?>
<?php include_once(ROOT_PATH."admin/system/repository/adminrepository.class.php");?>

<?php include_once(ROOT_PATH."fundraiser/system/repositories/fundrepository.class.php");?>
<?php include_once(ROOT_PATH."fundraiser/system/repositories/payrepository.class.php");?>
<?php include_once(ROOT_PATH."profile/system/repositories/projectrepository.class.php");?>

<?php
	class Home extends Auth_Controller{

		private $userrepository;
		private $fundrepository;
		private $payrepository;
		private $projcetrepository;
		private $adminrepository;


		public function __construct(){
			parent::__construct();
			$this->userrepository = new UserRepository();
			$this->fundrepository = new FundRepository();
			$this->payrepository = new PayRepository();
			$this->projectrepository = new projectrepository();
			$this->adminrepository = new AdminRepository();
		}


		public function index(){
			$totalUsers = $this->userrepository->count();
			$totalFundraisers = $this->fundrepository->count();
			$totalFunds = $this->payrepository->total();
			$totalProjects = $this->projectrepository->count();

			$view_page="home/index";
			include_once(ROOT_PATH."admin/views/admin/container.php");
		}

	
	}
	
	//OBJECT OF adminusercontroller
	$home = new Home();

	//IF m IS SET, SET IT TO $method, ELSE DEFAULT IT TO index
	if(isset($_GET['m'])){
		$method=$_GET['m'];
	}else{
		$method = "index";
	}

	switch($method){
		
		case "index":
			$home->index();
			break;

		
		default:
			$home->index();		
	}

?>