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

		public function edit(){
			//PAGE TO EDIT THE USER ALREADY IN THE DATABASE
			if(isset($_POST['submit'])){
				//MAP DATA
				$user_model = $this->_map_posted_data();
				$usermodel->set_user_id($_POST['id']);
				$this->userrepository->update($user_model);
				header("Location: index.php?page=welf&m=index&action=edit");
			}else{
				$view_page = "adminusersview/edit";
				$id = $_GET['id'];
				$user = $this->userrepository->get_by_id($id);
				if(is_null($user)){
					header("Location: index.php?page=welf&m=index");
				}
				include_once(ROOT_PATH."admin/views/admin/container.php");
			}
		}

		private function _map_posted_data(){
			$user_model = new User();
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
				header("Location: index.php?page=welf&m=index&action=delete");
			}
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

		case 'edit':
			$welfare->edit();
			break;

		case 'delete':
			$welfare->delete();
			break;

		default:
			$welfare->index();	
			exit;
	}

?>