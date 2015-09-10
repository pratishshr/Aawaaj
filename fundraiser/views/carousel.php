       <!-- Explore Section -->
 <section id="download" class="container content-section text-center">

    <div class="row">
      <div class="col-lg-10 col-lg-offset-1">
        <h2 class="pull-left">Other Campaigns you might like</h2>
        
         <div class="row">


 <!-- ///////////////////////// -->
    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
        <li data-target="#carousel-example-generic" data-slide-to="1"></li>
        <li data-target="#carousel-example-generic" data-slide-to="2"></li>
      </ol>

      <!-- Wrapper for slides -->
      <div class="carousel-inner" role="listbox">
        <div class="item active">
            <?php
                $count = 0;
                foreach($allfund as $fund2){

            ?>

            <div class="col-md-4">
                <a href="#" class="thumbnail">
                    <img class="img-responsive" src="<?php echo $fund2->get_image()?>" alt="">
                </a>
                <div class="caption">
                    <h3>
                        <a href="http://localhost/aawaaj/fundraiser/index.php?page=fund&m=campaign&id=<?php echo $fund2->get_id();?>" ><?php echo $fund2->get_title()?></a>
                    </h3>
                    <p><?php echo $fund2->get_description()?></p>
                </div>
            </div>

           <?php
           $count++;
           if($count == 3){
            break;
           }
       }
           ?>
        
        </div>
        
         <div class="item">
            <?php
                $count = 0;
                $check = 0;
                foreach($allfund as $fund2){
                $check++;    
                if($check<=3){
                    continue;
                   }
            ?>
             <div class="col-md-4">
                <a href="#" class="thumbnail">
                    <img class="img-responsive" src="<?php echo $fund2->get_image()?>" alt="">
                </a>
                <h3>
                    <a href="http://localhost/aawaaj/fundraiser/index.php?page=fund&m=campaign&id=<?php echo $fund2->get_id();?>" ><?php echo $fund2->get_title()?></a>
                </h3>
                <p><?php echo $fund2->get_description()?></p>
            </div>

           <?php
           $count++;
           if($count == 3){
            break;
           }
              }
           ?>
        
        </div>

        <div class="item">
            <?php
                $count = 0;
                $check = 0;
                foreach($allfund as $fund2){
                $check++;    
                if($check<=6){
                    continue;
                   }
            ?>
             <div class="col-md-4">
                <a href="#" class="thumbnail">
                    <img class="img-responsive" src="<?php echo $fund2->get_image()?>" alt="">
                </a>
                <h3>
                    <a href="http://localhost/aawaaj/fundraiser/index.php?page=fund&m=campaign&id=<?php echo $fund2->get_id();?>" ><?php echo $fund2->get_title()?></a>
                </h3>
                <p><?php echo $fund2->get_description()?></p>
            </div>

           <?php
           $count++;
           if($count == 3){
            break;
           }
              }
           ?>
        
        </div>

      </div>

      <!-- Controls -->
      <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
<!-- ///////////////////////// -->
    
                  
                   
                </div>
               
            </div>
        </div>
    </section>