<?php require_once(ROOT_PATH."database/session.php") ?> 
<?php include_once(ROOT_PATH."profile/system/models/profile.class.php");?>
<?php include_once(ROOT_PATH."profile/system/repositories/profilerepository.class.php");?>

<?php

class ProfileController{

	private $repository;
	private $data = array();
	public function __construct(){
		$this->repository = new ProfileRepository();
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
			$data = array('profile_photo'=>$result->get_profile_photo(),'about'=>$result->get_about(),'user_id'=>$result->get_user_id(),'user_name'=>$result->get_user_name(),'first_name'=>$result->get_first_name(),'last_name'=>$result->get_last_name(),'contact_number'=>$result->get_contact_number(),'user_type'=>$result->get_user_type());
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

	public function edit(){
		echo "profile edit page";
	}

	public function error_page(){
		echo "Include Error_Page here. Error_Page may be common to all";
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
					$profile_controller->edit();
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
		}
		
		$profile_controller->index($user_profile_id);
		break;
	}
}
else{
	$profile_controller->error_page();
}