<?php include_once(ROOT_PATH."/system/model/user.class.php");?>
<?php include_once(ROOT_PATH."/system/repository/userrepository.class.php");?>

<?php
	class AdminUserController{

		private $userrepository;
		public function __construct(){
			$this->userrepository = new UserRepository();
		}


		public function index(){
			$view_page="adminusersview/index";
			//LoaderHelper::view("admin/container");
			//INDEX PAGE OF ADMIN CONTROLLING ALL USERS TABLE
			include_once(ROOT_PATH."/views/admin/container.php");
		}

	
		public function add(){
			//PAGE TO ADD THE USER IN DATABASE BY ADMIN ITSELF
			echo "add";
		}

		public function edit(){
			//PAGE TO EDIT THE USER ALREADY IN THE DATABASE
			echo "edit";
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
	$adminusercontroller = new AdminUserController();

	//IF m IS SET, SET IT TO $method, ELSE DEFAULT IT TO index
	if(isset($_GET['m'])){
		$method=$_GET['m'];
	}else{
		$method = "index";
	}

	switch($method){
		
		case "index":
			$adminusercontroller->index();
			break;

		case "add":
			$adminusercontroller->add();
			break;

		case "edit":
			$adminusercontroller->edit();
			break;
		
		case "delete":
			$adminusercontroller->delete();
			break;

		default:
			$adminusercontroller->index();		
	}

?>