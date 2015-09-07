<?php require_once(ROOT_PATH."database/session.php") ?> 
<?php include_once(ROOT_PATH."fundraiser/system/models/fundraiser.class.php");?>
<?php include_once(ROOT_PATH."fundraiser/system/repositories/fundrepository.class.php");?>

<?php
	class FundController{

		private $fundrepository;
		public function __construct(){
			$this->fundrepository =  new fundrepository();
		}

		public function index(){
			$view_page = "fundview/index";
			include_once(ROOT_PATH."fundraiser/views/container.php");
		}

		public function create(){

			global $session; 
		    if(!$session->isLoggedIn()){
		        header("location: ".BASE_URL."app/view/signupform.php");
	        	exit();
	        	}

			if(isset($_POST) && isset($_POST['submit'])){
				$fund = $this->_map_posted_data();
				$id = $this->fundrepository->insert($fund);
				header("Location: index.php?page=fund&m=campaign&id=$id");
			}else{
			$view_page = "fundview/create";
			include_once(ROOT_PATH."fundraiser/views/container.php");
			}		

		}

		private function _map_posted_data(){
			$fund = new Fundraiser();

			$fund->set_fundraiser_type($_POST['fundraiser_type']);
			$fund->set_title($_POST['title']);
			$fund->set_amount($_POST['amount']);
			$fund->set_description($_POST['description']);

			//embedding youtube url
			$string = $_POST['video_url'];
			$search     = '#(.*?)(?:href="https?://)?(?:www\.)?(?:youtu\.be/|youtube\.com(?:/embed/|/v/|/watch?.*?v=))([\w\-]{10,12}).*#x';
			$replace = 'http://www.youtube.com/embed/$2';
			$url = preg_replace($search,$replace,$string);
			
			$fund->set_video_url($url);
			//for file
			
			$filename = $_FILES['image']['name'];
			$path = ROOT_PATH."/fundraiser/campaign_images/";
			move_uploaded_file($_FILES['image']['tmp_name'], $path.$filename);
			$savepath = BASE_URL."/fundraiser/campaign_images/";
			$fund->set_image($savepath.$filename);

			$fund->set_details($_POST['details']);

			return $fund;

		}	

		public function campaign(){
			if(isset($_GET['id'])){
			$view_page = "fundview/campaign";
			$id = $_GET['id'];
			$fund = $this->fundrepository->get_by_id($id);
			$allfund = $this->fundrepository->get_all();
				if(!is_null($fund)){
				include_once(ROOT_PATH."fundraiser/views/container.php");
				}else{
					header("Location: index.php?page=fund&m=index");
				}

			}else{
				header("Location: index.php?page=fund&m=index");
			}

		}

		
			
	}	

		$fundcontroller = new FundController();

		if(isset($_GET['m'])){
			$method = $_GET['m'];
		}else{
			$method = "index";
		}

		switch($method){

			case "index":
				$fundcontroller->index();
				break;

			case "create":
				$fundcontroller->create();
				break;

			case "campaign":
				$fundcontroller->campaign();
				break;

			default:
				$fundcontroller->index();
				break;
		}