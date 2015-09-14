
<?php require_once ($_SERVER['DOCUMENT_ROOT']."/Aawaaj/config/config.php"); ?>
<?php include_once(PUBLIC_PATH."/includes/header.php"); ?>
<?php include_once(ROOT_PATH."phpmailer/sendmail.php"); ?>

<?php
	$jsonData = file_get_contents(ROOT_PATH."/admin/views/admin/notifications.json");
	$jsonData = json_decode($jsonData); 
	
	$noti = $jsonData->noti;

	
	
	$noti = $jsonData->noti + 1;

	
	$data = array("noti" => "$noti") ;
	$fp = fopen(ROOT_PATH.'/admin/views/admin/notifications.json', 'w');
	fwrite($fp, json_encode($data));
	fclose($fp);
?>


<div style="margin: 0 auto;width: 30%;height: 100%;">
<p class="text-center">Email Confirmation</p>
<hr/>
<p> An activation link has been sent to your email address.</p>
<?php 
	if(isset($_GET['email']) && isset($_GET['fname']) && isset($_GET['lname'])){
		global $sendmail;
		$email = $_GET['email'];
		$firstname = $_GET['fname'];
		$lastname = $_GET['lname'];
		$sendmail->generateKey($email);
		?>
		<p><a href="<?php echo BASE_URL.'app/view/signUpConfirm.php?email='.$email.'&fname='.$firstname.'&lname='.$lastname;?>" onclick="<?php $sendmail->send($firstname,$lastname);?>">Resend Confirmation</a></p>
		<?php
	}
	else {
		// header("Location:".PUBLIC_PATH2.'/index.php');
	}

?>
<form action="<?php echo PUBLIC_PATH2;?>/index.php">
<div class="text-center"><button type="submit" class="btn btn-lg btn-default">Home</button></div>
</form>
</div>
<!-- <form method="post" action="<?php echo BASE_URL?>app/controller/signupconfirmcontroller.php">
  <div class="form-group">
    <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="<?php echo $_GET['email'];?>">
  </div>
  <div class="form-group">	
    <input type="text" class="form-control" id="confirmation_code" placeholder="Confirmation Code" name="code">
  </div>
  <div class="text-center"><button type="submit" class="btn btn-lg btn-default">Submit</button></div>
</form>
</div> -->