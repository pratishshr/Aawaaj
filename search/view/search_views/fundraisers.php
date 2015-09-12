<div class="container-fluid text-center col-md-9">
	
    <form method="post" action="">
        <div class="form-group">
        <label >Search</label>
        <input type="text" class="form-control" name="search" placeholder="Search" required>
        </div> 
    </form>
    
    
	<?php
    $records_per_page=3;

    $pagination = new Zebra_Pagination();

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
    $pagination->records(count($fundraisers));

    $pagination->records_per_page($records_per_page);

    if($fundraisers==null){
        echo "Result not found";
     }
     else{

    $fundraisers = array_slice($fundraisers,(($pagination->get_page() - 1) * $records_per_page),$records_per_page);
    ?>


     <h4>FUNDRAISERS</h4>
     	<div class="row">
            <div class="col-lg-8 col-lg-offset-2">                      
                 <div class="row">
                 <?php
                foreach($fundraisers as $index => $fund){ 
                 ?>
                    <div class="col-md-4" >
                       
	                   <a href="<?php echo BASE_URL?>fundraiser/index.php?page=fund&m=campaign&id=<?php echo $fund->get_fund_id();?>" class="">
                       <img class="img-responsive img-circle show-profile-image" src="<?php echo $fund->get_image();?>" alt="...">
                       </a>
                        <br>
                        <h4><?php echo $fund->get_title();?></h4>
                        <h4>Amount<br><?php echo $fund->get_amount();?></h4>
                        <p><?php echo $fund->get_fundraiser_type(); ?></p>
                        
                        <p><a href="<?php echo BASE_URL?>fundraiser/index.php?page=fund&m=campaign&id=<?php echo $fund->get_fund_id();?>" class="btn btn-primary" role="button">View Fundraiser</a></p>
                      
                    </div> 
          <?php }
          ?>
          		</div>
          </div>
         </div>
    <?php
        }
        $pagination->render();
     
     ?>


</div>