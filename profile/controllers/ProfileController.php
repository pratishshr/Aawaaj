<?php require_once(ROOT_PATH."database/session.php");?> 
<?php include_once(ROOT_PATH."profile/system/models/profile.class.php");?>
<?php include_once(ROOT_PATH."profile/system/repositories/profilerepository.class.php");?>
<?php include_once(ROOT_PATH."profile/system/models/project.class.php");?>
<?php include_once(ROOT_PATH."profile/system/repositories/projectrepository.class.php");?>
<?php include_once(ROOT_PATH."profile/system/models/fundview.class.php");?>
<?php include_once(ROOT_PATH."profile/system/repositories/fundviewrepository.class.php");?>
<?php include_once(ROOT_PATH."profile/system/models/requirement.class.php");?>
<?php include_once(ROOT_PATH."profile/system/repositories/requirementrepository.class.php");?>

<?php

class ProfileController{

	private $repository;
	private $projectrepository;
	private $fundviewrepository;
	private $requirementrepository;
	private $data = array();
	public function __construct(){
		$this->repository = new ProfileRepository();
		$this->projectrepository = new ProjectRepository();
		$this->fundviewrepository = new FundViewRepository();
		$this->requirementrepository = new RequirementRepository();
	}
	
	public function index($u_id){
		$result = $this->repository->get_by_id($u_id);
		if($result == NULL){
			//if id=jpt
			$this->error_page();
			exit();
		}

		if(!$result->get_user_status()){
			//user status not active yet
			$this->error_page();
			exit();
		}
		else{
			$data = array('profile_photo'=>$result->get_profile_photo(),'about'=>$result->get_about(),'user_id'=>$result->get_user_id(),'user_name'=>$result->get_user_name(),'first_name'=>$result->get_first_name(),'last_name'=>$result->get_last_name(),'contact_number'=>$result->get_contact_number(),'user_type'=>$result->get_user_type(),'user_hash'=>$result->get_user_hash());
			if($result->get_user_type() == "generalUser"){
				$data['age']=$result->get_age();
			}
			else{
				$data['name']=$result->get_name();
				$data['doe']=$result->get_doe();
				$data['img']=$result->get_img();
				$data['address']=$result->get_address();
				$data['objective']=$result->get_objective();
			}

			if($result->get_user_type() == "welfare"){
				$data['service']=$result->get_service();
			}
			include_once(ROOT_PATH.'profile/views/container.php');
			//var_dump($data);
		}
	}
	
	public function edit($id){
		if(isset($_POST) && isset($_POST['submit'])){
			$foto = false;
			$profile = $this->_map_posted_data();
			if(isset($_POST['foto'])){
				$foto = true;
			}
			$this->repository->update($profile,$foto);
			
			header("Location: index.php?id=".$_SESSION['user_hash']);
		}
		else{
			$profile_to_edit = $this->repository->get_edit_profile($id);
			include_once(ROOT_PATH.'profile/views/container.php');
		}
	
	}

	private function _map_posted_data(){
			$profile = new Profile();

			$profile->set_id($_POST['id']);
			$profile->set_about($_POST['about']);
			
			//for file
			if(isset($_POST['foto'])){
				$filename = $_FILES['image']['name'];
				$path = ROOT_PATH."/home/pictures/profile/";
				move_uploaded_file($_FILES['image']['tmp_name'], $path.$filename);
				$profile->set_profile_photo($filename);
			}
			return $profile;

	}

	public function error_page(){
		include_once(ROOT_PATH.'profile/views/error_page.php');
	}

}


$profile_controller = new ProfileController();

if(isset($_GET['id'])){
	$user_profile_id = $_GET['id'];

	$user = NULL;
	if(isset($_SESSION['user_hash'])){
		$user = $_SESSION['user_hash'];
	}

	switch ($user_profile_id) {
		case $user:
		
		if(isset($_GET['m'])){
			$method = $_GET['m'];
			switch ($method) {
				case 'edit':
					$profile_controller->edit($_SESSION['user_id']);
					break;
				
				default:
					$profile_controller->error_page();
					break;
			}
		}
		else{
			$profile_controller->index($user_profile_id);
		}
		break;
	
		default:
		if(isset($_GET['m'])){
			$profile_controller->error_page();
			exit();
		}
		
		$profile_controller->index($user_profile_id);
		break;
	}
}
else{
	$profile_controller->error_page();
}