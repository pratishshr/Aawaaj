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
    $fundraisers = $this->searchrepository->search_fundraiser($find);
     	?>

     <?php
     if($fundraisers==null){
        echo "Result not found";
     }
     else{
     ?>
     <h4>FUNDRAISERS</h4>
     	<div class="row">
            <div class="col-lg-8 col-lg-offset-2">                      
                 <div class="row">
                 <?php
                foreach($fundraisers as $fund){ 
                 ?>
                    <div class="col-sm-6 col-md-4">
	                    <a href="#" class="thumbnail">
                      <img class="img-responsive" src="<?php echo $fund->get_image();?>" alt="...">
                      </a>
                      
                        <h4><?php echo $fund->get_title();?></h4>
                        <h4>Amount : <?php echo $fund->get_amount();?></h4>
                        <p><?php echo $fund->get_fundraiser_type(); ?></p>
                        <h5><?php echo $fund->get_description(); ?></h5>
                        <p><a href="#" class="btn btn-primary" role="button">View Fundraiser</a></p>
                      
                    </div> 
          <?php }
          ?>
          		</div>
          </div>
         </div>
    <?php }
     ?>


</div>