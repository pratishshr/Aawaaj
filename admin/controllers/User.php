<?php include_once(ROOT_PATH."admin/system/model/User_Model.php");?>
<?php include_once(ROOT_PATH."admin/system/repository/userrepository.class.php");?>
<?php include_once(ROOT_PATH."admin/system/repository/organizationrepository.class.php");?>
<?php require_once(ROOT_PATH."admin/core/Auth_Controller.php");?>
<?php include_once(ROOT_PATH."admin/system/model/Admin_Model.php");?>
<?php include_once(ROOT_PATH."admin/system/repository/adminrepository.class.php");?>
<?php
	class User extends Auth_Controller{

		private $userrepository;
		private $adminrepository;
		public function __construct(){
			parent::__construct();
			$this->userrepository = new UserRepository();
			$this->adminrepository = new AdminRepository();
		}


		public function index(){
			$view_page="adminusersview/index";
			//LoaderHelper::view("admin/container");
			//INDEX PAGE OF ADMIN CONTROLLING ALL USERS TABLE
			include_once(ROOT_PATH."admin/views/admin/container.php");
		}

	
		public function add(){
			//PAGE TO ADD THE USER IN DATABASE BY ADMIN ITSELF
			if(isset($_POST['submit'])){
				//MAP DATA
				$user_model = $this->_map_posted_data();
				$this->userrepository->insert($user_model);
				header("Location: index.php?page=user&m=index&action=add");

			}else{
				$view_page ="adminusersview/add";
				include_once(ROOT_PATH."admin/views/admin/container.php");
				}
		}

		private function _map_posted_data(){

			$user_model = new User_Model();
			$user_model->set_user_name($_POST['user_name']);
			$user_model->set_first_name($_POST['first_name']);
			$user_model->set_last_name($_POST['last_name']);
			$user_model->set_contact_number($_POST['contact_number']);
			if(isset($_POST['user_type'])){
				$user_model->set_user_type($_POST['user_type']);
			}
			$user_model->set_user_status($_POST['user_status']);
			if(isset($_POST['password'])){
			$user_model->set_password($_POST['password']);
			}

			if($_POST['user_type'] == 'organization'){
				
				$user_model->set_name($_POST['name']);
				$user_model->set_doe($_POST['doe']);
				
				$user_model->set_address($_POST['address']);
				$user_model->set_objective($_POST['objective']);
				//store file
				$filename = $_FILES['img']['name'];
				$path = PUBLIC_PATH. "/pictures/orgPictures/";
				
				move_uploaded_file($_FILES['img']['tmp_name'], $path.$filename);
				
				$savepath = PUBLIC_PATH2."/pictures/orgPictures/";
				$user_model->set_img($savepath.$filename);
				
			
			}elseif($_POST['user_type'] == 'welfare'){
				$user_model->set_welf_name($_POST['welf_name']);
				$user_model->set_welf_doe($_POST['welf_doe']);
				$user_model->set_welf_service($_POST['welf_service']);
				$user_model->set_welf_address($_POST['welf_address']);
				$user_model->set_welf_objective($_POST['welf_objective']);
				//store file
				$filename = $_FILES['img']['name'];
				$path = PUBLIC_PATH. "/pictures/welfPictures/";
				
				move_uploaded_file($_FILES['img']['tmp_name'], $path.$filename);
				
				$savepath = PUBLIC_PATH2."/pictures/welfPictures/";
				$user_model->set_welf_img($savepath.$filename);
				
			}
			
			return $user_model;
		}


		public function edit(){
			//PAGE TO EDIT THE USER ALREADY IN THE DATABASE
			if(isset($_POST['submit'])){
				//MAP DATA
				$user_model = $this->_map_posted_data();
				$user_model->set_user_id($_POST['id']);
				$this->userrepository->update($user_model);
				header("Location: index.php?page=user&m=index&action=edit");
			}else{
				$view_page = "adminusersview/edit";
				$id = $_GET['id'];
				$user= $this->userrepository->get_by_id($id);
				if(is_null($user)){
					header("Location: index.php");
				}
				include_once(ROOT_PATH."admin/views/admin/container.php");
			}
		}

		public function delete(){
			//DELETE THE USER CURRENTLY IN THE DATABASE
			$id = $_GET['id'];
			$result = $this->userrepository->delete($id);
			if($result = true){
				header("Location: index.php?page=user&m=index&action=delete");
			}
		}

	}
	
	//OBJECT OF alluser
	$user = new User();

	//IF m IS SET, SET IT TO $method, ELSE DEFAULT IT TO index
	if(isset($_GET['m'])){
		$method=$_GET['m'];
	}else{
		$method = "index";
	}

	switch($method){
		
		case "index":
			$user->index();
			break;

		case "add":
			$user->add();
			break;

		case "edit":
			$user->edit();
			break;
		
		case "delete":
			$user->delete();
			break;

		default:
			$user->index();		
	}

?>