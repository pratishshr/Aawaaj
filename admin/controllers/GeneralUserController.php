<?php include_once(ROOT_PATH."admin/system/model/user.class.php");?>
<?php include_once(ROOT_PATH."admin/system/repository/userrepository.class.php");?>
<?php require_once(ROOT_PATH."admin/core/Admin_Controller.php");?>
<?php include_once(ROOT_PATH."admin/system/repository/generaluserrepository.class.php");?>




<?php
	class GeneralUserController extends AdminController{
		private $userrepository;
		private $generaluserrepository;
		public function __construct(){
			parent::__construct();
			$this->userrepository = new UserRepository();
			$this->generaluserrepository = new GeneralUserRepository();
		}

		public function index(){
			$view_page = "generaluserview/index";
				
			

			include_once(ROOT_PATH."admin/views/admin/container.php");
		}

		public function edit(){
			//PAGE TO EDIT THE USER ALREADY IN THE DATABASE
			if(isset($_POST['submit'])){
				//MAP DATA
				$user = $this->_map_posted_data();
				$user->set_user_id($_POST['id']);
				$this->userrepository->update($user);
				header("Location: index.php?page=general&m=index&action=edit");
			}else{
				$view_page = "adminusersview/edit";
				$id = $_GET['id'];
				$user = $this->userrepository->get_by_id($id);
				if(is_null($user)){
					header("Location: index.php?page=general&m=index");
				}
				include_once(ROOT_PATH."admin/views/admin/container.php");
			}
		}

		private function _map_posted_data(){
			$user = new User();
			$user->set_user_name($_POST['user_name']);
			$user->set_first_name($_POST['first_name']);
			$user->set_last_name($_POST['last_name']);
			$user->set_contact_number($_POST['contact_number']);
			$user->set_user_type($_POST['user_type']);
			$user->set_user_status($_POST['user_status']);

			return $user;
		}
		public function delete(){
			//DELETE THE USER CURRENTLY IN THE DATABASE
			$id = $_GET['id'];
			$result = $this->userrepository->delete($id);
			if($result = true){
				header("Location: index.php?page=general&m=index&action=delete");
			}
		}	
	
	}

	$generalusercontroller = new GeneralUserController();

	if(isset($_GET['m'])){
		$method = $_GET['m'];
	}else{
		$method = "";
	}

	switch($method){

		case 'index':
			$generalusercontroller->index();
			break;

		case 'edit':
			$generalusercontroller->edit();
			break;

		case 'delete':
			$generalusercontroller->delete();
			break;

		default:
			$generalusercontroller->index();	
			exit;
	}

?>