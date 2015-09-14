<?php require_once(ROOT_PATH."database/session.php");?> 
<?php include_once(ROOT_PATH."profile/system/models/profile.class.php");?>
<?php include_once(ROOT_PATH."profile/system/models/fundview.class.php"); ?>
<?php include_once(ROOT_PATH."profile/system/repositories/fundviewrepository.class.php");?>
<?php include_once(ROOT_PATH."profile/system/repositories/profilerepository.class.php");?>


<?php

class FundViewController{

	private $profile_repository;
	private $fundview_repository;

		public function __construct(){
		$this->profile_repository = new ProfileRepository();
		$this->fundview_repository = new FundViewRepository();
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
		
		$fundview_list = $this->fundview_repository->get_all($data['user_id']);
		include_once(ROOT_PATH.'profile/views/container.php');
	}
	
	public function error_page(){
		include_once(ROOT_PATH.'profile/views/error_page.php');
	}


}


$fundview_controller = new FundViewController();

if(isset($_GET['id'])){
	$user_profile_id = $_GET['id'];
	$user = NULL;
	
		$fundview_controller->index($user_profile_id);
	
}
else{
	$fundview_controller->error_page();
}