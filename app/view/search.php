<?php
  require_once("../../config/config.php");
	 require_once(ROOT_PATH."public/includes/header.php");
	 require_once(ROOT_PATH."public/includes/navsearch.php");
	 require_once(ROOT_PATH."app/model/list.class.php");
	 require_once(ROOT_PATH."app/model/searchmodel.php");?>

	
	 <section class="container content-section text-center">
<?php
	 if (isset($_POST['search'])) {
	 	$find=$_POST['search'];
    if ($find==null) {
      echo "Nothing Entered";
    }
    else{
	 	//for accepting character from 0-9 and a-z  only 
	 	$find=preg_replace("#[^0-9a-z]#i","", $find);
	 	
	 	$results = new SearchModel(); 
	 	if ($results->find($find)==null) {
      
	 	}
	 	else{

          $id=1; ?>
           <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <h2>EXPLORE</h2>
                 <div class="row">
            
            <?php
          foreach($results->find($find) as $user){
?>
              <div class="col-sm-6 col-md-4">
              <a href="<?php echo BASE_URL?>profile" class="thumbnail">
                <img class="img-responsive" src="<?php echo BASE_URL?>profile/images/rotlogo.png" alt="...">
                </a>
                
                  <h3><?php echo $user->get_first_name();?> <?php echo $user->get_last_name();?></h3>
                  <p><?php echo $user->get_user_type(); ?></p>
                  <p><a href="<?php echo BASE_URL?>profile" class="btn btn-primary" role="button">View Profile</a></p>
                
            
            </div> 
    <?php }
    ?></div>
    </div>
    </div>
          
                

              
              <?php } ?> 
              <?php
          	 }
            }
?>
</section>
 <footer>
        <div class="container text-center">
            <p>Copyright &copy; Aawaaj 2015</p>
        </div>
    </footer>

    <!-- jQuery -->
    <script src="<?php echo BASE_URL?>public/assets/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo BASE_URL?>public/assets/js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="<?php echo BASE_URL?>public/assets/js/jquery.easing.min.js"></script>

    
    <!-- Custom Theme JavaScript -->
    <script src="<?php echo BASE_URL?>public/assets/js/grayscale.js"></script>

</body>

</html>
