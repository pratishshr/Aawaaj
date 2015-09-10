
<div class="container text-center col-md-9 panel panel-default">
    <div class="panel-body black-color">
    <form method="post" action="">
        <div class="form-group">
        <label >Search</label>
        <input type="text" class="form-control" name="search" placeholder="Search" required>
        </div> 
    </form>
    </div>

	<?php
	

	if(!empty($_POST['search'])){
        $find=$_POST['search'];
        $find=preg_replace("#[^0-9a-z]#i","", $find);
        }
        else{
          $find=null;
        }
     
     $users = $this->searchrepository->search_user($find);
     $fundraisers = $this->searchrepository->search_fundraiser($find);
     ?>

     <?php
     if($users!=null){ 
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
         </div> 
    <?php } ?>

     <?php
     if($fundraisers!=null){
     ?>
     <h4>FUNDRAISERS</h4>
     	<div class="row">
            <div class="col-lg-8 col-lg-offset-2">                      
                 <div class="row">
                 <?php
                foreach($fundraisers as $fund){ 
                 ?>
                    <div class="col-sm-6 col-md-4">
	                    <a href="<?php echo BASE_URL?>fundraiser/index.php?page=fund&m=campaign&id=<?php echo $fund->get_fund_id();?>" class="thumbnail">
                      <img class="img-responsive" src="<?php echo $fund->get_image();?>" alt="...">
                      </a>
                      
                        <h4><?php echo $fund->get_title();?></h4>
                        <h4>Amount : <?php echo $fund->get_amount();?></h4>
                        <p><?php echo $fund->get_fundraiser_type(); ?></p>
                        
                        <p><a href="<?php echo BASE_URL?>fundraiser/index.php?page=fund&m=campaign&id=<?php echo $fund->get_fund_id();?>" class="btn btn-primary" role="button">View Fundraiser</a></p>
                      
                    </div> 
          <?php }
          ?>
          		</div>
          </div>
         </div>
    <?php }
      ?>


</div>