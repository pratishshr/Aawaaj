<?php require_once(ROOT_PATH."database/session.php");?> 
<?php include_once(ROOT_PATH."profile/system/models/profile.class.php");?>
<?php include_once(ROOT_PATH."profile/system/models/requirement.class.php"); ?>
<?php include_once(ROOT_PATH."profile/system/repositories/requirementrepository.class.php");?>
<?php include_once(ROOT_PATH."profile/system/repositories/profilerepository.class.php");?>


<?php

class RequirementController{

	private $profile_repository;
	private $requirement_repository;

		public function __construct(){
		$this->profile_repository = new ProfileRepository();
		$this->requirement_repository = new RequirementRepository();
	}
	public function index($u_id){
		$result = $this->profile_repository->get_by_id($u_id);

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
			$data = array('profile_id'=>$result->get_profile_id(),'profile_photo'=>$result->get_profile_photo(),'about'=>$result->get_about(),'user_id'=>$result->get_user_id(),'user_name'=>$result->get_user_name(),'first_name'=>$result->get_first_name(),'last_name'=>$result->get_last_name(),'contact_number'=>$result->get_contact_number(),'user_type'=>$result->get_user_type());
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
		}
		if($data['user_type'] != "welfare"){
			$this->error_page();
			exit();
		}
		$requirement_list = $this->requirement_repository->get_all($data['profile_id']);
		include_once(ROOT_PATH.'profile/views/container.php');
	}
	
	public function add(){
		include_once(ROOT_PATH.'profile/views/container.php');	
	}

	public function save(){
		// yo thau ma requirement save huna aaucha
		// yei bata feri "index.php" ma falne jun chai profile ma jancha
		$req = new Requirement();

		$req->setTitle($_POST['title]');
		$req->setDate($_POST['date']);
		$req->setDescription($_POST['details']);

		$this->requirement_repository->insert($req);

	}

	public function selectRequirement(){
		$requirement = $this->requirement_repository->get_by_id($_GET['r_id']);
		include_once(ROOT_PATH.'profile/views/container.php');
	}

	public function error_page(){
		include_once(ROOT_PATH.'profile/views/error_page.php');
	}


}


$requirement_controller = new RequirementController();

if(isset($_GET['id'])){
	$user_profile_id = $_GET['id'];
	$user = NULL;
	if(isset($_GET['r_id'])){
		$r_id = $_GET['r_id'];
		$user_controller->selectProject($user_profile_id,$r_id);
	}

	if(isset($_SESSION['user_hash'])){
		$user = $_SESSION['user_hash'];
	}
	switch ($user_profile_id) {
		case $user:
			if($_SESSION['user_type'] == "welfare"){
				if(isset($_GET['m'])){
					$method = $_GET['m'];
					
					switch ($method) {
						case 'add':
							$requirement_controller->add();
							break;

						case 'save':
							$requirement_controller->save();
							header("Location: index.php?id={$user}");
							break;
						
						default:
							$requirement_controller->error_page();
							break;
					}
				}
				else{
					$requirement_controller->index($user_profile_id);
				}
				
				
			}
			else{
				$requirement_controller->error_page();
			}
		break;
	
		default:
		if(isset($_GET['m'])){
			$requirement_controller->error_page();
			exit();
		}

		$requirement_controller->index($user_profile_id);
		break;
	}
}
else{
	$requirement_controller->error_page();
}