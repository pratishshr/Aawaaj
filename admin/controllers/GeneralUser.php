<?php include_once(ROOT_PATH."admin/system/model/User_Model.php");?>
<?php include_once(ROOT_PATH."admin/system/repository/userrepository.class.php");?>
<?php require_once(ROOT_PATH."admin/core/Auth_Controller.php");?>
<?php include_once(ROOT_PATH."admin/system/repository/generaluserrepository.class.php");?>
<?php include_once(ROOT_PATH."admin/system/model/Admin_Model.php");?>
<?php include_once(ROOT_PATH."admin/system/repository/adminrepository.class.php");?>



<?php
	class GeneralUser extends Auth_Controller{
		private $userrepository;
		private $generaluserrepository;
		private $adminrepository;
		public function __construct(){
			parent::__construct();
			$this->userrepository = new UserRepository();
			$this->generaluserrepository = new GeneralUserRepository();
			$this->adminrepository = new AdminRepository();
		}

		public function index(){
			$view_page = "generaluserview/index";
				
			

			include_once(ROOT_PATH."admin/views/admin/container.php");
		}

	
	
	}

	$generaluser = new GeneralUser();

	if(isset($_GET['m'])){
		$method = $_GET['m'];
	}else{
		$method = "";
	}

	switch($method){

		case 'index':
			$generaluser->index();
			break;

		
		default:
			$generaluser->index();	
			exit;
	}

?>