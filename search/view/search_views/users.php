<div class="container text-center col-md-9  ">

	<form method="post" action="" class="col-md-4 col-md-offset-4">
        <div class="form-group">
        <label >Search</label>
        <input type="text" class="form-control" name="search" placeholder="Search" required>
        </div> 
    </form>
	<?php
	//total number of records per page
    $records_per_page = 3;

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
     $users = $this->searchrepository->search_user($find);
     // the number of total records is the number of records in the array
     $pagination->records(count($users));
      // records per page
     $pagination->records_per_page($records_per_page);
     	?>

             <?php
             if($users==null){ 
                echo "Search not found";
             }
             else{

                 $users = array_slice($users,(($pagination->get_page() - 1) * $records_per_page),$records_per_page);

             ?>	
             	
             	<div class="row">
                    <div class="col-lg-8 col-lg-offset-2">                      
                         <div class="row">
                         <h4>USERS</h4>
                         <?php
                        foreach($users as $index=>  $user){ 
                         ?>
                            <div class="col-md-4">
        	                    <a href="<?php echo BASE_URL?>profile/index.php?id=<?php echo $user->get_user_hash();?>">
        	                    	<img class="img-responsive img-rounded show-profile-image" src="<?php echo BASE_URL?>home/pictures/profile/<?php echo $user->get_user_image();?>" alt="...">
        	                    </a>                      
        	                    <h3><?php echo $user->get_first_name();?> <?php echo $user->get_last_name();?></h3>
        	                    <p><?php echo $user->get_user_type(); ?></p>
                            </div> 
                  <?php }
                  ?>
                  		</div>
                  </div>
                 </div> <?php
                 // render the pagination links
                 $pagination->render();

            }  
        

?>
</div>