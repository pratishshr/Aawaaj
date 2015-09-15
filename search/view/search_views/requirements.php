<div class="container text-center col-md-9">
	   
    
	<?php
    //totla number of records per page
    $records_per_page=3;

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
    $requirements = $this->searchrepository->search_requirement($find);

    // the number of total records is the number of records in the array
    $pagination->records(count($requirements));

    // records per page
    $pagination->records_per_page($records_per_page);

    if($requirements==null){
        echo "Result not found";
     }
     else{
    //slicing the total number of records in array per the reocrds per page 
    $requirements = array_slice($requirements,(($pagination->get_page() - 1) * $records_per_page),$records_per_page);
    ?>


    
     	<div class="row">
            <div class="col-lg-8 col-lg-offset-2">                      
                 <div class="row">
                  <h4>requirementS</h4>
                 <?php
                foreach($requirements as $index => $require){ 
                 ?>
                    <div class="col-md-4" >
                       
	                   <a href="<?php echo BASE_URL?>profile/index.php?id=<?php echo $require->get_user_hash()?>&page=requirements&r_id=<?php echo $require->get_requirement_id()?>" >
                       <img class="img-responsive img-rounded show-profile-image" src="<?php echo BASE_URL?>home/pictures/profile/default.jpg" alt="...">
                       </a>
                        <br>
                        <h4><?php echo $require->get_requirement_title();?></h4>
                        <h4><?php echo $require->get_requirement_org_name();?></h4>                                             
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