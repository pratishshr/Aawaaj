<?php
	 define("ROOT_PATH",$_SERVER['DOCUMENT_ROOT']."/Aawaaj/");
	 define("BASE_URL","http://localhost/Aawaaj/");
	 require_once(ROOT_PATH."public/includes/header.php");
	 require_once(ROOT_PATH."public/includes/navsearch.php");
	 require_once(ROOT_PATH."app/model/list.class.php");
	 require_once(ROOT_PATH."app/model/searchmodel.php");?>
	
	 <section class="container content-section text-center">
<?php
	 if (isset($_POST['search'])) {
	 	$find=$_POST['search'];
	 	//for accepting character from 0-9 and a-z  only
	 	$find=preg_replace("#[^0-9a-z]#i","", $find);
	 	
	 	$results = new SearchModel(); 
	 	if ($results->find($find)==null) {
	 		echo "No Search Results Found";
	 		
	 	}
	 	else{?>


	 	 <table class="table">
                <tr>
                <th>ID</th>   
                <th>Name</th>
                <th>User Type</th>
                <th>Status</th>
                 <?php 
                $id=1;
                foreach($results->find($find) as $user){
                    
                 ?>

                <tr>
                  <td><?php echo $id++?></td>

                  <td><a href="<?php echo BASE_URL?>profile"><?php echo $user->get_first_name();?> <?php echo $user->get_last_name();?> </a></td>
                  <td><?php echo $user->get_user_type();?></td>
                  <?php if($user->get_status()==1){
                    ?>
                     <td><span class="label label-success">Active</span></td>
                  
                   <?php 
                   }else{

                ?>
                  <td><span class="label label-danger">Inactive</span></td>
                <?php
                 }
                 ?>
                   
                  
                <?php
                } 
                  ?>
                  </tr>

                

                

                

              </table> 
              <?php } ?> 
              </div>
              </body><?php





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
