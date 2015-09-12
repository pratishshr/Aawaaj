<?php include_once(ROOT_PATH."admin/system/model/User_Model.php");?>
<?php include_once(ROOT_PATH."admin/system/repository/userrepository.class.php");?>
<?php include_once(ROOT_PATH."admin/system/repository/organizationrepository.class.php");?>
<?php require_once(ROOT_PATH."admin/core/Auth_Controller.php");?>
<?php include_once(ROOT_PATH."admin/system/model/Admin_Model.php");?>
<?php include_once(ROOT_PATH."admin/system/repository/adminrepository.class.php");?>


<?php
	class Organization extends Auth_Controller{
		private $userrepository;
		private $organizationrepository;
		private $adminrepository;
		public function __construct(){
			parent::__construct();
			$this->userrepository = new UserRepository();
			$this->adminrepository = new AdminRepository();
			$this->organizationrepository = new OrganizationRepository();
		}

		public function index(){
			$view_page = "organizationview/index";
				
			

			include_once(ROOT_PATH."admin/views/admin/container.php");
		}

	}

	$organization = new Organization();

	if(isset($_GET['m'])){
		$method = $_GET['m'];
	}else{
		$method = "";
	}

	switch($method){

		case 'index':
			$organization->index();
			break;


		default:
			$organization->index();	
			exit;
	}

?>