<?php include_once("../../public/config.php"); ?>
<?php include_once(ROOT_PATH."public/includes/header.php"); ?>
<div style="margin: 0 auto;width: 30%;height: 100%;">
<p class="text-center">Email Confirmation</p>
<hr/>
<p> Please enter the code which is sent in your email address </p>
<form method="post" action="<?php echo BASE_URL?>app/controller/signupconfirmcontroller.php">
  <div class="form-group">
    <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="<?php echo $_GET['email'];?>">
  </div>
  <div class="form-group">	
    <input type="text" class="form-control" id="confirmation_code" placeholder="Confirmation Code" name="code">
  </div>
  <div id="empty"></div>
  <div class="text-center"><button type="submit" class="btn btn-lg btn-default">Submit</button></div>
</form>
</div>