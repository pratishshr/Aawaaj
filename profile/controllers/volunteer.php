<?php require_once ($_SERVER['DOCUMENT_ROOT']."/Aawaaj/config/config.php"); ?>
<?php include_once(PUBLIC_PATH."/includes/header.php"); ?>
<?php require_once(ROOT_PATH."database/session.php");?> 
<?php include_once(ROOT_PATH."phpmailer/sendmail.php"); ?>
<?php include_once(ROOT_PATH."profile/system/repositories/volunteerrepository.class.php"); ?>



<div style="margin: 0 auto;width: 30%;height: 100%;">
<p class="text-center">Volunteer Request</p>
<hr/>
<p> Your name has been sent to our email address. We will contact you soon.</p>
<?php 
	if(isset($_GET['id'])){
		global $sendmail;
		$org_id = $_GET['id'];
		$id = $_SESSION['user_id'];
		$firstname = $_SESSION['first_name'];
		$lastname = $_SESSION['last_name'];
		$email = $_SESSION['user_name'];
		$uhash = $_SESSION['user_hash'];

		$volunteerrepository = new VolunteerRepository();
		$org_email = $volunteerrepository->getEmail($org_id);

		$sendmail->generateKey($org_email);
		$sendmail->sendToOrg($firstname,$lastname,$uhash);
	}
	else {
		header("Location:".PUBLIC_PATH2.'/index.php');
	}

?>
<form action="<?php echo PUBLIC_PATH2;?>/index.php">
<div class="text-center"><button type="submit" class="btn btn-lg btn-default">Home</button></div>
</form>
</div>