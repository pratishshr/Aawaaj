<?php require_once ($_SERVER['DOCUMENT_ROOT']."/Aawaaj/config/config.php"); ?>
<?php include_once(PUBLIC_PATH."/includes/header.php"); ?>
<?php include_once(ROOT_PATH."phpmailer/sendmail.php"); ?>
<?php include_once(ROOT_PATH."profile/model/volunteer.class.php"); ?>



<div style="margin: 0 auto;width: 30%;height: 100%;">
<p class="text-center">Volunteer Request</p>
<hr/>
<p> Your name has been sent to our email address. We will contact you soon.</p>
<?php 
	if(isset($_GET['id'])){
		global $sendmail;
		$id = $_SESSION['user_id'];
		$firstname = $_SESSION['fname'];
		$lastname = $_SESSION['lname'];
		$email = $_SESSION['user_name'];

		$sendmail->generateKey($email);
		?>
		<p><a href="<?php echo BASE_URL.'app/view/signUpConfirm.php?email='.$email.'&fname='.$firstname.'&lname='.$lastname;?>" onclick="<?php $sendmail->send($firstname,$lastname);?>">Resend Confirmation</a></p>
		<?php
	}
	else {
		header("Location:".PUBLIC_PATH2.'/index.php');
	}

?>
<form action="<?php echo PUBLIC_PATH2;?>/index.php">
<div class="text-center"><button type="submit" class="btn btn-lg btn-default">Home</button></div>
</form>
</div>