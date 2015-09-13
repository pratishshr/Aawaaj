<div class="container text-center col-md-9">
	
    <form method="post" action="" class="col-md-4 col-md-offset-4">
        <div class="form-group">
        <label >Search</label>
        <input type="text" class="form-control" name="search" placeholder="Search" required>
        </div> 
    </form>
    
    
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
    $projects = $this->searchrepository->search_project($find);

    // the number of total records is the number of records in the array
    $pagination->records(count($projects));

    // records per page
    $pagination->records_per_page($records_per_page);

    if($projects==null){
        echo "Result not found";
     }
     else{
    //slicing the total number of records in array per the reocrds per page 
    $projects = array_slice($projects,(($pagination->get_page() - 1) * $records_per_page),$records_per_page);
    ?>


    
     	<div class="row">
            <div class="col-lg-8 col-lg-offset-2">                      
                 <div class="row">
                  <h4>projects</h4>
                 <?php
                foreach($projects as $index => $project){ 
                 ?>
                    <div class="col-md-4" >
                       
	                   <a href="#" >
                       <img class="img-responsive img-rounded show-profile-image" src="<?php echo $project->get_banner_image();?>" alt="...">
                       </a>
                        <br>
                        <h4><?php echo $project->get_project_title();?></h4>
                        <h2><?php echo $project->get_project_desc();?></h2>                                            
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