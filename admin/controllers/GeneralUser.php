<?php include_once(ROOT_PATH."admin/system/model/User_Model.php");?>
<?php include_once(ROOT_PATH."admin/system/repository/userrepository.class.php");?>
<?php require_once(ROOT_PATH."admin/core/Auth_Controller.php");?>
<?php include_once(ROOT_PATH."admin/system/repository/generaluserrepository.class.php");?>




<?php
	class GeneralUser extends Auth_Controller{
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
			$user_model = new User_Model();
			$user_model->set_user_name($_POST['user_name']);
			$user_model->set_first_name($_POST['first_name']);
			$user_model->set_last_name($_POST['last_name']);
			$user_model->set_contact_number($_POST['contact_number']);
			$user_model->set_user_type($_POST['user_type']);
			$user_model->set_user_status($_POST['user_status']);

			return $user_model;
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

		case 'edit':
			$generaluser->edit();
			break;

		case 'delete':
			$generaluser->delete();
			break;

		default:
			$generaluser->index();	
			exit;
	}

?>