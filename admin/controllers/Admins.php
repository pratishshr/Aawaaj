<?php include_once(ROOT_PATH."admin/system/model/admin.class.php");?>
<?php include_once(ROOT_PATH."admin/system/repository/adminrepository.class.php");?>
<?php require_once(ROOT_PATH."admin/controllers/AdminController.php");?>

<?php
	class Admins extends AdminController{

		private $adminrepository;
		public function __construct(){
			parent::__construct();
			$this->adminrepository = new AdminRepository();
		}


		public function index(){
			$view_page="adminsview/index";
			//LoaderHelper::view("admin/container");
			//INDEX PAGE OF ADMIN CONTROLLING ALL USERS TABLE
			include_once(ROOT_PATH."admin/views/admin/container.php");
		}

	
		public function add(){
			//PAGE TO ADD THE USER IN DATABASE BY ADMIN ITSELF
			if(isset($_POST['submit'])){
				//MAP DATA
				$user = $this->_map_posted_data();
				$this->userrepository->insert($user);
				header("Location: index.php?page=admin&m=index&action=add");

			}else{
				$view_page ="adminusersview/add";
				include_once(ROOT_PATH."admin/views/admin/container.php");
				}
		}

		private function _map_posted_data(){

			$user = new User();
			$user->set_user_name($_POST['user_name']);
			$user->set_first_name($_POST['first_name']);
			$user->set_last_name($_POST['last_name']);
			$user->set_contact_number($_POST['contact_number']);
			if(isset($_POST['user_type'])){
				$user->set_user_type($_POST['user_type']);
			}
			$user->set_user_status($_POST['user_status']);
			if(isset($_POST['password'])){
			$user->set_password($_POST['password']);
			}

			if($_POST['user_type'] == 'organization'){
				
				$user->set_name($_POST['name']);
				$user->set_doe($_POST['doe']);
				
				$user->set_address($_POST['address']);
				$user->set_objective($_POST['objective']);
				//store file
				$filename = $_FILES['img']['name'];
				$path = PUBLIC_PATH. "/pictures/orgPictures/";
				
				move_uploaded_file($_FILES['img']['tmp_name'], $path.$filename);
				
				$savepath = PUBLIC_PATH2."/pictures/orgPictures/";
				$user->set_img($savepath.$filename);
				
			
			}elseif($_POST['user_type'] == 'welfare'){
				$user->set_welf_name($_POST['welf_name']);
				$user->set_welf_doe($_POST['welf_doe']);
				$user->set_welf_service($_POST['welf_service']);
				$user->set_welf_address($_POST['welf_address']);
				$user->set_welf_objective($_POST['welf_objective']);
				//store file
				$filename = $_FILES['img']['name'];
				$path = PUBLIC_PATH. "/pictures/welfPictures/";
				
				move_uploaded_file($_FILES['img']['tmp_name'], $path.$filename);
				
				$savepath = PUBLIC_PATH2."/pictures/welfPictures/";
				$user->set_welf_img($savepath.$filename);
				
			}
			
			return $user;
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
	$admins = new Admins();

	//IF m IS SET, SET IT TO $method, ELSE DEFAULT IT TO index
	if(isset($_GET['m'])){
		$method=$_GET['m'];
	}else{
		$method = "index";
	}

	switch($method){
		
		case "index":
			$admins->index();
			break;

		case "add":
			$admins->add();
			break;

		case "edit":
			$admins->edit();
			break;
		
		case "delete":
			$adminusercontroller->delete();
			break;

		default:
			$adminusercontroller->index();		
	}

?>