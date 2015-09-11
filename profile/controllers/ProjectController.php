<?php require_once(ROOT_PATH."database/session.php");?> 
<?php include_once(ROOT_PATH."profile/system/models/profile.class.php");?>
<?php include_once(ROOT_PATH."profile/system/models/project.class.php"); ?>
<?php include_once(ROOT_PATH."profile/system/repositories/projectrepository.class.php");?>
<?php include_once(ROOT_PATH."profile/system/repositories/profilerepository.class.php");?>

<?php

class ProjectController{

	private $profile_repository;
	private $projectrepository;
	public function __construct(){
		$this->profile_repository = new ProfileRepository();
		$this->projectrepository = new ProjectRepository();
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
		if($data['user_type'] != "organization"){
			$this->error_page();
			exit();
		}
		$project_list = $this->projectrepository->get_all($data['profile_id']);
		include_once(ROOT_PATH.'profile/views/container.php');
	}

	public function add(){
		include_once(ROOT_PATH.'profile/views/container.php');
	}

	public function save(){
		// yo thau ma project save huna aaucha
		// yei bata feri "index.php" ma falne jun chai profile ma jancha
		$proj = new Project();
		if(isset($_POST['single_date'])){
			$proj->setStart_date($_POST['single_date']);
		}else if(isset($_POST['start_date'])){
			$proj->setStart_date($_POST['start_date']);
			if(isset($_POST['end_date'])){
				$proj->setEnd_date($_POST['end_date']);
			}
			else{
				$proj->setEnd_date("");
			}	
		}else{
			$proj->setStart_date("");
			$proj->setEnd_date("");
		}
		$proj->setTitle($_POST['project_title']);
		$proj->setObjectives($_POST['project_objectives']);
		$proj->setShortdes($_POST['short_desc']);
		$proj->setLocation($_POST['location']);
		if(isset($_POST['amount'])){
			$proj->setBudget($_POST['amount']);
		}
		else{
			$proj->setBudget(NULL);
		}
		$proj->setRequirement1($_POST['requirement1']);
		if(isset($_POST['requirement2'])){
		$proj->setRequirement2($_POST['requirement2']);
		}else{
			$proj->setRequirement2("");
		}
		if(isset($_POST['requirement3'])){
		$proj->setRequirement3($_POST['requirement3']);
		}else{
			$proj->setRequirement3("");
		}
		if(isset($_POST['requirement4'])){
		$proj->setRequirement4($_POST['requirement4']);
		}else{
			$proj->setRequirement4("");
		}
		if(isset($_POST['requirement5'])){
		$proj->setRequirement5($_POST['requirement5']);
		}else{
			$proj->setRequirement5("");
		}
		if(isset($_POST['cb_volunteer'])){
			if(isset($_POST['number_volunteer'])){
				$proj->setVolunteer($_POST['number_volunteer']);
			}
			else{
				$proj->setVolunteer(1);
			}
		}else{
			$proj->setVolunteer(0);
		}
		if(isset($_POST['cb_otherorg'])){
			$proj->setOrganization1($_POST['organization1']);
			if(isset($_POST['organization2'])){
				$proj->setOrganization2($_POST['organization2']);
			}else{
				$proj->setOrganization2("");
			}
			if(isset($_POST['organization3'])){
				$proj->setOrganization3($_POST['organization3']);
			}else{
				$proj->setOrganization3("");
			}
			if(isset($_POST['organization4'])){
				$proj->setOrganization4($_POST['organization4']);
			}else{
				$proj->setOrganization4("");
			}
			if(isset($_POST['organization5'])){
				$proj->setOrganization5($_POST['organization5']);
			}else{
				$proj->setOrganization5("");
			}
		}else{
			$proj->organization1("");
			$proj->organization2("");
			$proj->organization3("");
			$proj->organization4("");
			$proj->organization5("");
		}
		if(isset($_FILES['banner_image'])){
		$filename = $_FILES['banner_image']['name'];
			$path = ROOT_PATH."/profile/project_image/";
			move_uploaded_file($_FILES['banner_image']['tmp_name'], $path.$filename);
			$savepath = BASE_URL."/profile/project_image/";
			$proj->setBanner_image($savepath.$filename);
		}
		else{
			$savepath = BASE_URL."/profile/project_image/";
			$proj->setBaneer_image($savepath."default.jpg");
		}
		if(isset($_FILES['project_proposal'])){
		$filename = $_FILES['project_proposal']['name'];
			$path = ROOT_PATH."/profile/project_proposal/";
			move_uploaded_file($_FILES['project_proposal']['tmp_name'], $path.$filename);
			$savepath = BASE_URL."/profile/project_proposal/";
			$proj->setProject_proposal($savepath.$filename);
		}
		else{
			$savepath = BASE_URL."/profile/project_proposal/";
			$proj->setProject_proposal($savepath."default.docx");
		}
		if(isset($_POST['project_video'])){
			$string = $_POST['project_video'];
			$search     = '#(.*?)(?:href="https?://)?(?:www\.)?(?:youtu\.be/|youtube\.com(?:/embed/|/v/|/watch?.*?v=))([\w\-]{10,12}).*#x';
			$replace = 'http:/utube.com/embed/$2';
			$url = preg_replace($search,$replace,$string);
			$proj->setVideourl($url);
		}else{
			$proj->setVideourl("");
		}
		if(isset($_POST['details'])){
			$proj->setDetail($_POST['details']);
		}else{
			$proj->setDetail("");
		}
		$proj->setStatus(1);
		return $proj;

	}
	
	public function selectProject(){
		echo "particular project view page";
	}

	public function error_page(){
		echo "Include Error_Page here. Error_Page may be common to all";
	}

}


$project_controller = new ProjectController();

if(isset($_GET['id'])){
	$user_profile_id = $_GET['id'];
	$user = NULL;
	if(isset($_SESSION['user_hash'])){
		$user = $_SESSION['user_hash'];
	}

	switch ($user_profile_id) {
		case $user:
			if($_SESSION['user_type'] == "organization"){
				if(isset($_GET['m'])){
					$method = $_GET['m'];
					
					switch ($method) {
						case 'add':
							$project_controller->add();
							break;

						case 'save':
							$project_controller->save();
						
						default:
							$project_controller->error_page();
							break;
					}
				}
				else{
					$project_controller->index($user_profile_id);	
				}
				if(isset($_POST) && isset($_POST['submit'])){
					$project_controller->save();
					$id = $this->projectrepository->insert($proj);
					header("Location: index.php?id={$user}");
				}
				else{
					$project_controller->error_page();
				}
			}
			else{
				$project_controller->error_page();
			}
		break;
	
		default:
		if(isset($_GET['m'])){
			$project_controller->error_page();
			exit();
		}

		$project_controller->index($user_profile_id);
		break;
	}

	if(isset($_GET['p_id'])){
		$p_id = $_GET['p_id'];
		$project_controller->selectProject($user_profile_id,$p_id);
	}


}
else{
	$project_controller->error_page();
}