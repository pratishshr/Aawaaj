<?php include_once(ROOT_PATH."admin/system/model/user.class.php");?>
<?php include_once(ROOT_PATH."admin/system/repository/userrepository.class.php");?>
<?php include_once(ROOT_PATH."admin/system/repository/welfarerepository.class.php");?>



<?php
	class WelfareController{
		private $userrepository;
		private $welfarerepository;
		public function __construct(){
			$this->userrepository = new UserRepository();
			$this->welfarerepository = new WelfareRepository();
		}

		public function index(){
			$view_page = "welfareview/index";
				
			

			include_once(ROOT_PATH."admin/views/admin/container.php");
		}

		public function edit(){
			//PAGE TO EDIT THE USER ALREADY IN THE DATABASE
			if(isset($_POST['submit'])){
				//MAP DATA
				$user = $this->_map_posted_data();
				$user->set_user_id($_POST['id']);
				$this->userrepository->update($user);
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
				header("Location: index.php?page=welf&m=index&action=delete");
			}
		}	
	
	}

	$welfarecontroller = new welfareController();

	if(isset($_GET['m'])){
		$method = $_GET['m'];
	}else{
		$method = "";
	}

	switch($method){

		case 'index':
			$welfarecontroller->index();
			break;

		case 'edit':
			$welfarecontroller->edit();
			break;

		case 'delete':
			$welfarecontroller->delete();
			break;

		default:
			$welfarecontroller->index();	
			exit;
	}

?>