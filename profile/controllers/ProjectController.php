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
		if(isset($_POST['single_date']) && $_POST['single_date']!=""){
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
		if (isset($_POST['requirement1'])){
		$proj->setRequirement($_POST['requirement1']);
		}else{
			$proj->setRequirement("");
		}
		if(isset($_POST['requirement2'])){
		$proj->setRequirement($_POST['requirement2']);
		}
		if(isset($_POST['requirement3'])){
		$proj->setRequirement($_POST['requirement3']);
		}
		if(isset($_POST['requirement4'])){
		$proj->setRequirement($_POST['requirement4']);
		}
		if(isset($_POST['requirement5'])){
		$proj->setRequirement($_POST['requirement5']);
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
			if(isset($_POST['organization1'])){
			$proj->setOrganization($_POST['organization1']);
			}else{
				$proj->setOrganization("");
			}
			if(isset($_POST['organization2'])){
				$proj->setOrganization($_POST['organization2']);
			}
			if(isset($_POST['organization3'])){
				$proj->setOrganization($_POST['organization3']);
			}
			if(isset($_POST['organization4'])){
				$proj->setOrganization($_POST['organization4']);
			}
			if(isset($_POST['organization5'])){
				$proj->setOrganization($_POST['organization5']);
			}
		}else{
			$proj->setOrganization("");
		}
		if(isset($_FILES['banner_image'])){
			if($_FILES['banner_image']['name']!=""){
		    $filename = $_FILES['banner_image']['name'];
			$path = ROOT_PATH."/profile/project_image/";
			move_uploaded_file($_FILES['banner_image']['tmp_name'], $path.$filename);
			$savepath = BASE_URL."/profile/project_image/";
			$proj->setBanner_image($savepath.$filename);
			}else{
				$filename = "default.jpg";
				$savepath = BASE_URL."/profile/project_image/";
				$proj->setBanner_image($savepath.$filename);
			}
		}
		else{
			$savepath = BASE_URL."/profile/project_image/";
			$proj->setBanner_image($savepath."default.jpg");
		}
		if(isset($_FILES['project_proposal'])){
			if($_FILES['project_proposal']['name']!=""){
			$filename = $_FILES['project_proposal']['name'];
			$path = ROOT_PATH."/profile/project_proposal/";
			move_uploaded_file($_FILES['project_proposal']['tmp_name'], $path.$filename);
			$savepath = BASE_URL."/profile/project_proposal/";
			$proj->setProject_proposal($savepath.$filename);
			}else{
				$filename = "default.docx";
				$savepath = BASE_URL."/profile/project_proposal/";
				$proj->setProject_proposal($savepath.$filename);
			}
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
		$id = $this->projectrepository->insert($proj);
		

	}
	
	public function selectProject(){
		$project = $this->projectrepository->get_by_id($_GET['p_id']);
		include_once(ROOT_PATH.'profile/views/container.php');
	}

	public function error_page(){
		include_once(ROOT_PATH.'profile/views/error_page.php');
	}

}


$project_controller = new ProjectController();

if(isset($_GET['id'])){
	$user_profile_id = $_GET['id'];
	$user = NULL;
	if(isset($_GET['p_id'])){
		$p_id = $_GET['p_id'];
		$project_controller->selectProject($user_profile_id,$p_id);
	}

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
							header("Location: index.php?id={$user}");
							break;
						
						default:
							$project_controller->error_page();
							break;
					}
				}
				else{
					$project_controller->index($user_profile_id);
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

	


}
else{
	$project_controller->error_page();
}