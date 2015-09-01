
      
 <header class="intro-fund-create">
        <div class="intro-body">
            <div class="container">
                <div class="row">
                            <!-- ===================================== -->
                            <!-- FUNDRAISER-->

						        <!-- Portfolio Item Heading -->
						        <div class="row">
						            <div class="col-lg-12">
						                <h1 class="page-header"> 
						                	<?php echo ucfirst($fund->get_title());?>
						                	<small class="white-color">(<?php echo $fund->get_fundraiser_type();?>)</small>
						                </h1>
						            </div>
						        </div>
						        <!-- /.row -->

						         <!-- Portfolio Item Row -->
						        <div class="row">

						            <div class="col-md-8">

						                <img class="img-responsive" src="<?php echo $fund->get_image();?>" alt=""><!-- 750 x 500-->
						            </div>

						            <div class="col-md-4">
						            	<h2>Amount Raised:
						            	<br/> Rs. 0</h2>
						            	
						                <h3>Project Description</h3>
						                <p>
						                	<?php echo ucfirst($fund->get_description());?>
						                </p>
						                <div>Project Goal: Rs. <?php echo $fund->get_amount();?></div>
						                <br/>
						                <a href="javascript:void(0)" class="btn btn-lg btn-info">Donate Now</a>
                                        
						            </div>
						        
						        <!-- /.row -->
						       
						        </div>

						        <br/>
						        <div class="container text-center">
						            	<h2>Description</h2>
						            	<hr>
						            	<p><?php echo $fund->get_details();?></p>
						            	<div class="col-md-8 col-md-offset-2">
							            	<h2>Campaign Video</h2>
							            	<div class="embed-responsive embed-responsive-16by9">
	  											<iframe class="embed-responsive-item" src="<?php echo $fund->get_video_url();?>"></iframe>
											</div>	
										</div>
						        </div>

                            <!-- FUNDRAISER -->
                            <!-- ===================================== -->
                         
                         
                
	       

        </div>
        </header>

	<!--/#home-->


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
            
            <div class="col-md-4">
                <a href="#" class="thumbnail">
                    <img class="img-responsive" src="<?php echo BASE_URL?>/public/assets/img/thumb1.jpg" alt="">
                </a>
                <h3>
                    <a href="#" >Project Name</a>
                </h3>
                <p>This is a project on something that helps someone and gets something something.This is a project on something that helps someone and gets something something.</p>
            </div>

            <div class="col-md-4">
                <a href="#" class="thumbnail">
                    <img class="img-responsive" src="<?php echo BASE_URL?>/public/assets/img/thumb2.jpg" alt="">
                </a>
                <h3>
                    <a href="#">Project Name</a>
                </h3>
                <p>This is a project on something that helps someone and gets something something.This is a project on something that helps someone and gets something something.</p>
            </div>   

            <div class="col-md-4">
                <a href="#" class="thumbnail">
                    <img class="img-responsive" src="<?php echo BASE_URL?>/public/assets/img/thumb2.jpg" alt="">
                </a>
                <h3>
                    <a href="#">Project Name</a>
                </h3>
                <p>This is a project on something that helps someone and gets something something.This is a project on something that helps someone and gets something something.</p>
            </div>
        
        </div>
        
        <div class="item">
            
            <div class="col-md-4">
                <a href="#" class="thumbnail">
                    <img class="img-responsive" src="<?php echo BASE_URL?>/public/assets/img/thumb2.jpg" alt="">
                </a>
                <h3>
                    <a href="#">Project Name</a>
                </h3>
                <p>This is a project on something that helps someone and gets something something.This is a project on something that helps someone and gets something something.</p>
            </div>   

            <div class="col-md-4">
                <a href="#" class="thumbnail">
                    <img class="img-responsive" src="<?php echo BASE_URL?>/public/assets/img/thumb2.jpg" alt="">
                </a>
                <h3>
                    <a href="#">Project Name</a>
                </h3>
                 <p>This is a project on something that helps someone and gets something something.This is a project on something that helps someone and gets something something.</p>
            </div>   

            <div class="col-md-4">
                <a href="#" class="thumbnail">
                    <img class="img-responsive" src="<?php echo BASE_URL?>/public/assets/img/thumb1.jpg" alt="">
                </a>
                <h3>
                    <a href="#">Project Name</a>
                </h3>
            <p>This is a project on something that helps someone and gets something something.This is a project on something that helps someone and gets something something.</p>            </div>

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