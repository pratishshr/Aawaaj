
      
 <header class="intro-fund-create">
        <div class="intro-body">
            <div class="container">
                <div class="row">
                    
                        
                        <!-- ===================================== -->
                        <!-- FUNDRAISER-->
                        <div class="panel panel-default">
                            <div class="panel-body black-color">

        						        <!-- Portfolio Item Heading -->
        						        <div class="row">
        						            <div class="col-lg-12">
        						                <h1 class="page-header text-center"> 
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

      						            <div class="col-md-3">
      						            	<h3>Amount Raised:</h3>
      						            	<h2>$<?php echo $total;?><small>USD</small>
                                <br/>
                                <small> <?php echo $remaining?> <?php echo ($remaining>0)?"days":"day";?> remaining</small></h2>  
      		            	                <div class="progress">
                                                <div class="progress-bar progress-bar-info progress-bar-striped active" role="progressbar" aria-valuenow="<?php echo $percentage;?>" aria-valuemin="0" aria-valuemax="100"
                                                     style="width: <?php echo $percentage;?>%;
                                                     min-width: 2em">
                                                  <?php echo $percentage;?>%
                                                </div>
                                              </div>
                                              
      						                
      						                <div><b><span class="glyphicon glyphicon-flag"></span> Project Goal: $<?php echo $fund->get_amount();?></b></div>

      						                <br/>
                                              <!-- DONATE BUTTON -->
                                              <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
                                              <!-- Identify your business so that you can collect the payments. -->
                                              <input type="hidden" name="business" value="pratishshr-facilitator@gmail.com">

                                              <!-- Specify a Donate button. -->
                                              <input type="hidden" name="cmd" value="_donations">

                                              <!-- Specify details about the contribution -->
                                              <input type="hidden" name="item_name" value="<?php echo $fund->get_title();?>">
                                              <input type="hidden" name="item_number" value="<?php echo $fund->get_id();?>">
                                             
                                              <input type="hidden" name="currency_code" value="USD">
                                          	
                                              <!--return type-->
                                              <input type="hidden" name="notify_url" value="<?php echo BASE_URL.'fundraiser/index.php?page=paypal';?>">
                                              <input type="hidden" name="return" value="<?php echo BASE_URL.'fundraiser/index.php?page=fund&m=campaign&id='.$fund->get_id();?>">
                                              <input type="hidden" name="cancel_return" value="<?php echo BASE_URL.'fundraiser/index.php?page=fund&m=campaign&id='.$fund->get_id();?>">
                                              <input type="submit" name="submit" value="DONATE NOW" class="btn btn-lg btn-primary form-control input-lg">
                                              </form>
                                              <!--DONATE BUTTON END-->
                                              <br/>
                                              <!-- Social Buttons -->
                                              <div class="col-md-12">
                                              <b>Share:</b>
                                              <div class="addthis_sharing_toolbox"></div>
                                              </div>
      						            </div>
      						        
      						         <!-- /.row -->
      						       
						              </div>
                      </div>
               </div>  

						   <br/>
						   <div class="panel panel-default col-md-8 black-color">
                <div class="panel-body">
                    <div class="text-center">
                          <hr/>
						            	<h2>Description</h2>
						            	<hr>
						            	<p> <?php echo $fund->get_details();?> </p>
		            
                            <hr/>
                            <?php 
                            $video_url = $fund->get_video_url();

                            if(!empty($video_url)){ ?>                 
							            	<h2>Campaign Video</h2>
                                             <hr/>
							            	<div class="embed-responsive embed-responsive-16by9">
	  									    		<iframe class="embed-responsive-item" src="<?php echo $fund->get_video_url();?>"></iframe>
											      </div>	
                           <?php 
                            }
                           ?> 
									       	
						        </div>
                </div>
               </div>
               <div class="col-md-4">
                   <div class="panel panel-default black-color">
                    <div class-"panel-body">  
                       
                        <br/>
                        <hr/>
                        <h2 class="text-center">Recent Donations</h2>
                        
                          <div class="scroll">
                            <table class="table table-striped table-hover">
                            <?php foreach($payList as $pay){ ?>
                            <tr>
                              <td> <strong>$<?php echo $pay->get_payment_amount();?></strong>
                              <br/>
                              <?php echo $pay->get_payer_email();?></td>
                                 
                                 
                            </tr>
                              <?php 
                                }
                              ?> 
                            </table>   
                          </div>
                        
                     </div>
                   </div>    
               </div>   
                            <!-- FUNDRAISER -->
                            <!-- ===================================== -->

        <!-- FACEBOOK COMMENT SECTION -->           
          
             
         <div class="panel panel-default col-md-8 black-color">
          <div class-"panel-body">  
            <div class="row"> 
              <div class="fb-comments" data-href="http://aawaaj-pratishshr.rhcloud.com/fundraiser/index.php?page=fund&amp;m=campaign&amp;id=<?php echo $id;?>" data-numposts="5" data-version="v2.3" data-width="750"></div>
            </div>
          </div>
         </div>    
        
          
        </div>
      
               
        </header>

	<!--/#home-->

    
    
  