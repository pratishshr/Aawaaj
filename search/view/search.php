<?php
  require_once ($_SERVER['DOCUMENT_ROOT']."/Aawaaj/config/config.php"); 
     require_once(ROOT_PATH."search/model/SearchList.class.php");
   require_once(ROOT_PATH."search/controller/SearchController.php");
	 require_once(PUBLIC_PATH."/includes/header.php");
	 require_once(ROOT_PATH."search/view/navsearch.php"); ?>


	 <section class="container content-section text-center">
      <?php if(!empty($_POST['search']) && !empty($_POST['search_select'])){
        $find=$_POST['search'];
        $find=preg_replace("#[^0-9a-z]#i","", $find);
        $condition=$_POST['search_select'];
        }
        else{
          $find=null;
          $condition=null;
          }?>
      <form class="form-inline" method="post" action="<?php echo BASE_URL?>search/view/search.php">
      <div class="form-group">
        <select class="form-control" name="search_select">
            <option value="all">All</option>
            <option value="users">Users</option>
            <option value="projects">Projects</option>
            <option value="fundraisers">Fundraisers</option>
        </select>
        </div>
      <div class="form-group">
        <input type="text" class="form-control" name="search" placeholder="Search">
      </div>
      <button type="submit" class="btn btn-default">Search</button>
    </form>
<?php
	 
	 	if($condition=="users"){
      	 	$results = new SearchController(); 
      	 	if ($results->find_users($find)==null) {
            echo "No search results found";
      	 	}
      	 	else{

                $id=1; ?>
                 <div class="row">
                  <div class="col-lg-8 col-lg-offset-2">
                      <h2>Search Results</h2>
                       <div class="row">
                  
                  <?php
                foreach($results->find_users($find) as $user){?>
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
          <?php }
     }
     elseif($condition=="fundraisers"){
          $results = new SearchController(); 
          if ($results->find_fundraisers($find)==null) {
            echo "No search results found";
          }
          else{

                $id=1; ?>
                 <div class="row">
                  <div class="col-lg-8 col-lg-offset-2">
                      <h2>Search Results</h2>
                       <div class="row">
                  
                  <?php
                foreach($results->find_fundraisers($find) as $user){?>
                    <div class="col-sm-6 col-md-4">
                    <a href="<?php echo BASE_URL?>profile" class="thumbnail">
                      <img class="img-responsive" src="<?php echo $user->get_image();?>" alt="...">
                      </a>
                      
                        <h3><?php echo $user->get_title();?></h3>
                        <h4>Amount : <?php echo $user->get_amount();?></h4>
                        <p><?php echo $user->get_user_type(); ?></p>
                        <h5><?php echo $user->get_description(); ?></h5>
                        <p><a href="<?php echo BASE_URL?>profile" class="btn btn-primary" role="button">View Fundraiser</a></p>
                      
                  
                  </div> 
          <?php }
          ?></div>
          </div>
          </div>   
          <?php }
     }
  elseif ($condition=="projects") {
    echo "Under Construction";
  }
  else{
    $results = new SearchController();

    if ($results->find_fundraisers($find)==null && $results->find_users($find)==null) {
            echo "No search results found";
    }
    else{
      $id=1; ?>
          <h2>Search Results</h2>
           <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <h3>Users</h3>
                               
                <?php if($results->find_users($find) == null){
                  echo "No Users Found";
                  }
                  else{?>
                 <div class="row">
                 <?php foreach($results->find_users($find) as $user){?>
                    <div class="col-sm-6 col-md-4">
                    <a href="<?php echo BASE_URL?>profile" class="thumbnail">
                      <img class="img-responsive" src="<?php echo BASE_URL?>profile/images/rotlogo.png" alt="...">
                      </a>
                      
                        <h3><?php echo $user->get_first_name();?> <?php echo $user->get_last_name();?></h3>
                        <p><?php echo $user->get_user_type(); ?></p>
                        <p><a href="<?php echo BASE_URL?>profile" class="btn btn-primary" role="button">View Profile</a></p>
                      
                  
                  </div> 
          <?php } 
          }?>
          </div>
          </div>
          </div>
             <div class="row">
            <div class="col-lg-8 col-lg-offset-2">     
            <h3>Fundraisers</h3>
            <?php if($results->find_fundraisers($find) == null){
                  echo "No Fundraisers Found";
                  }
                  else{?>
            <div class="row">
            <?php
          foreach($results->find_fundraisers($find) as $user){ ?>
              <div class="col-sm-6 col-md-4">
              <a href="<?php echo BASE_URL?>profile" class="thumbnail">
                <img class="img-responsive" src="<?php echo $user->get_image();?>" alt="...">
                </a>
                
                  <h3><?php echo $user->get_title();?></h3>
                  <h4>Amount : <?php echo $user->get_amount();?></h4>
                  <p><?php echo $user->get_user_type(); ?></p>
                  <h5><?php echo $user->get_description(); ?></h5>
                  <p><a href="<?php echo BASE_URL?>profile" class="btn btn-primary" role="button">View Fundraiser</a></p>
                
            
            </div> 
          <?php }
        }
          ?></div>
          </div>
          </div> 

    <?php  }  }      	 
?>
</section>
 <footer>
        <div class="container text-center">
            <p>Copyright &copy; Aawaaj 2015</p>
        </div>
    </footer>

    <!-- jQuery -->
    <script src="<?php echo PUBLIC_PATH2?>/assets/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo PUBLIC_PATH2?>/assets/js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="<?php echo PUBLIC_PATH2?>/assets/js/jquery.easing.min.js"></script>

    
    <!-- Custom Theme JavaScript -->
    <script src="<?php echo PUBLIC_PATH2?>/assets/js/grayscale.js"></script>

</body>

</html>
