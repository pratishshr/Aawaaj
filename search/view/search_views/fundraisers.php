<div class="container text-center col-md-9">
	   
    
	<?php
    //totla number of records per page
    $records_per_page=6;

    //instantiate the pagination object
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

    // the number of total records is the number of records in the array
    $pagination->records(count($fundraisers));

    // records per page
    $pagination->records_per_page($records_per_page);

    if($fundraisers==null){
        echo "Result not found";
     }
     else{
    //slicing the total number of records in array per the reocrds per page 
    $fundraisers = array_slice($fundraisers,(($pagination->get_page() - 1) * $records_per_page),$records_per_page);
    ?>


    
     	<div class="row">
            <div class="col-lg-8 col-lg-offset-2">                      
                 <div class="row">
                  <h4>FUNDRAISERS</h4>
                 <?php
                foreach($fundraisers as $index => $fund){ 
                 ?>
                    <div class="col-md-4" >
                       
	                   <a href="<?php echo BASE_URL?>fundraiser/index.php?page=fund&m=campaign&id=<?php echo $fund->get_fund_id();?>" >
                       <img class="img-responsive img-rounded show-profile-image" src="<?php echo $fund->get_image();?>" alt="...">
                       </a>
                        <br>
                        <h4><?php echo $fund->get_title();?></h4>
                        <h4>Amount<br><?php echo $fund->get_amount();?></h4>
                        <p><?php echo $fund->get_fundraiser_type(); ?></p>
                                             
                    </div> 
          <?php }
          ?>
          		</div>
          </div>
         </div>
    <?php
        }
        // render the pagination links
        $pagination->render();
     
     ?>


</div>