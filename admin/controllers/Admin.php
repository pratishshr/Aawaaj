<?php include_once(ROOT_PATH."admin/system/model/Admin_Model.php");?>
<?php include_once(ROOT_PATH."admin/system/repository/adminrepository.class.php");?>
<?php require_once(ROOT_PATH."admin/core/Auth_Controller.php");?>

<?php
	class Admin extends Auth_Controller{

		private $adminrepository;
		public function __construct(){
			parent::__construct();
			$this->adminrepository = new AdminRepository();
		}


		public function index(){
			$view_page="adminsview/index";
			include_once(ROOT_PATH."admin/views/admin/container.php");
		}

	
		public function add(){
			//PAGE TO ADD THE USER IN DATABASE BY ADMIN ITSELF
			if(isset($_POST['submit'])){
				//MAP DATA
				$admin = $this->_map_posted_data();
				$this->adminrepository->insert($admin);
				header("Location: index.php?page=admin&m=index&action=add");

			}else{
				$view_page ="adminsview/add";
				include_once(ROOT_PATH."admin/views/admin/container.php");
				}
		}

		private function _map_posted_data(){

			$admin_model = new Admin_Model();
			$admin_model->set_username($_POST['username']);
					
			if(isset($_POST['password'])){
			$admin_model->set_password($_POST['password']);
			}

			return $admin_model;
		}


		public function edit(){
			//PAGE TO EDIT THE USER ALREADY IN THE DATABASE
			if(isset($_POST['submit'])){
				//MAP DATA
				$user = $this->_map_posted_data();
				$user->set_user_id($_POST['id']);
				$this->userrepository->update($user);
				header("Location: index.php?page=admin&m=index&action=edit");
			}else{
				$view_page = "adminusersview/edit";
				$id = $_GET['id'];
				$user = $this->userrepository->get_by_id($id);
				if(is_null($user)){
					header("Location: index.php?page=admin&m=index");
				}
				include_once(ROOT_PATH."admin/views/admin/container.php");
			}
		}

		public function check(){
			$username = $_POST['username'];
			$this->adminrepository->check_username($username);
		 	
		}

		public function delete(){
			//DELETE THE USER CURRENTLY IN THE DATABASE
			$id = $_GET['id'];
			$result = $this->userrepository->delete($id);
			if($result = true){
				header("Location: index.php?page=admin&m=index&action=delete");
			}
		}

	}
	
	//OBJECT OF adminusercontroller
	$admin = new Admin();

	//IF m IS SET, SET IT TO $method, ELSE DEFAULT IT TO index
	if(isset($_GET['m'])){
		$method=$_GET['m'];
	}else{
		$method = "index";
	}

	switch($method){
		
		case "index":
			$admin->index();
			break;

		case "add":
			$admin->add();
			break;

		case "edit":
			$admin->edit();
			break;
		
		case "delete":
			$admin->delete();
			break;

		case "check":
			$admin->check();
			break;
		
		case "logout":
			$admin->logout();

		default:
			$admin->index();		
	}

?>