<div class="container text-center col-md-9 panel">
	<form method="post" action="">
        <div class="form-group">
        <label >Search</label>
        <input type="text" class="form-control" name="search" placeholder="Search" required>
        </div> 
    </form>
	<?php
	
	if(!empty($_POST['search'])){
        $find=$_POST['search'];
        $find=preg_replace("#[^0-9a-z]#i","", $find);
        }
        else{
          $find=null;
        }
     ?>

     <?php
     $users = $this->searchrepository->search_user($find);
     	?>

             <?php
             if($users==null){ 
                echo "Search not found";
             }
             else{
             ?>	
             	<h4>USERS</h4>
             	<div class="row">
                    <div class="col-lg-8 col-lg-offset-2">                      
                         <div class="row">
                         <?php
                        foreach($users as $user){ 
                         ?>
                            <div class="col-sm-6 col-md-4">
        	                    <a href="<?php echo BASE_URL?>profile/index.php?id=<?php echo $user->get_user_hash();?>" class="thumbnail">
        	                    	<img class="img-responsive" src="<?php echo BASE_URL?>profile/images/rotlogo.png" alt="...">
        	                    </a>                      
        	                    <h3><?php echo $user->get_first_name();?> <?php echo $user->get_last_name();?></h3>
        	                    <p><?php echo $user->get_user_type(); ?></p>
        	                    <p><a href="<?php echo BASE_URL?>profile/index.php?id=<?php echo $user->get_user_hash();?>" class="btn btn-primary" role="button">View Profile</a></p>
                            </div> 
                  <?php }
                  ?>
                  		</div>
                  </div>
                 </div> <?php
            }  
        

?>
</div>