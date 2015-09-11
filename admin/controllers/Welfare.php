<?php include_once(ROOT_PATH."admin/system/model/User_Model.php");?>
<?php include_once(ROOT_PATH."admin/system/repository/userrepository.class.php");?>
<?php include_once(ROOT_PATH."admin/system/repository/welfarerepository.class.php");?>
<?php require_once(ROOT_PATH."admin/core/Auth_Controller.php");?>
<?php include_once(ROOT_PATH."admin/system/model/Admin_Model.php");?>
<?php include_once(ROOT_PATH."admin/system/repository/adminrepository.class.php");?>

<?php
	class Welfare extends Auth_Controller{
		private $userrepository;
		private $welfarerepository;
		private $adminrepository;
		public function __construct(){
			parent::__construct();
			$this->userrepository = new UserRepository();
			$this->welfarerepository = new WelfareRepository();
			$this->adminrepository = new AdminRepository();
		}

		public function index(){
			$view_page = "welfareview/index";
				
			

			include_once(ROOT_PATH."admin/views/admin/container.php");
		}

	
	}

	$welfare = new Welfare();

	if(isset($_GET['m'])){
		$method = $_GET['m'];
	}else{
		$method = "";
	}

	switch($method){

		case 'index':
			$welfare->index();
			break;


		default:
			$welfare->index();	
			exit;
	}

?>