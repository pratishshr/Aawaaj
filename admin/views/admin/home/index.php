    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Welcome to the Admin's Panel!
      </h1>
    </section>


<!-- Main content -->
        <section class="content">
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-lg-3 col-xs-6">
             <!-- small box -->
              <div class="small-box bg-aqua">
                <div class="inner">
                  <h3><?php echo $totalFundraisers;?></h3>
                  <p>Fundraisers</p>
                </div>
                <div class="icon">
                  <i class="ion ion-stats-bars"></i>
                </div>
                <a href="<?php echo BASE_URL."admin/index.php?page=fundraiser";?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
                  <h3>$<?php echo $totalFunds;?></h3>
                  <p>Total Fund Raised</p>
                </div>
                <div class="icon">
                  <i class="ion ion-cash"></i>
                </div>
                <a href="<?php echo BASE_URL."admin/index.php?page=fundraiser";?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-yellow">
                <div class="inner">
                  <h3><?php echo $totalUsers;?></h3>
                  <p>User Registrations</p>
                </div>
                <div class="icon">
                  <i class="ion ion-person-add"></i>
                </div>
                <a href="<?php echo BASE_URL?>admin/index.php?page=user" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-red">
                <div class="inner">
                  <h3><?php echo $totalProjects;?></h3>
                  <p>Projects</p>
                </div>
                <div class="icon">
                  <i class="ion ion-pie-graph"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
          </div><!-- /.row -->

        <!-- MAIN ROW -->
          <div class="row"> 
        <!-- RECENTLY ADDED FUNDRAISERS -->
            <div class="col-md-4">
              <!-- FUNDRAISER LIST -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Recently Added Fundraisers</h3>
                </div><!-- /.box-header -->
                
                <div class="box-body">
                  <ul class="products-list product-list-in-box">

                  <?php 
                    $count = 0;
                    foreach($allFund as $fund){
                    $count++;
                    ?>

                    <li class="item">
                      <div class="product-img">
                        <img src="<?php echo $fund->get_image();?>" class="img-responsive img-rounded" alt="Product Image" />
                      </div>
                      <div class="product-info">
                        <a href="javascript::;" class="product-title"><?php echo $fund->get_title();?><span class="label label-info pull-right">Goal: $<?php echo $fund->get_amount();?></span></a>
                        <span class="product-description">
                         <?php echo $fund->get_description();?>
                        </span>
                      </div>
                    </li><!-- /.item -->
                    
                  <?php 
                    if($count == 4){
                      break;
                    }
                    }
                  ?>    
                  </ul>
                </div><!-- /.box-body -->
                <div class="box-footer text-center">
                  <a href="<?php echo BASE_URL."admin/index.php?page=fundraiser";?>" class="uppercase">View All Fundraisers</a>
                </div><!-- /.box-footer -->
              </div><!-- /.box -->
            </div>  
       
        <!-- RECENTLY JOINED USERS -->
            <div class="col-md-4">
                  <!-- USERS LIST -->
                  <div class="box box-danger">
                    <div class="box-header with-border">
                      <h3 class="box-title">Latest Members</h3>
                      <div class="box-tools pull-right">
                      
                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                      </div>
                    </div><!-- /.box-header -->
                    <div class="box-body no-padding">
                      <ul class="users-list clearfix">
                         <?php 
                          $count = 0;
                          foreach($allUsers as $user){
                          $count++;
                          ?>

                        <li>
                          <img src="<?php echo BASE_URL.'home/pictures/default.jpg'?>" alt="User Image" />
                          <a class="users-list-name" href="#"><?php echo ucfirst($user->get_first_name());?></a>
                          <span class="users-list-date"><?php echo strtolower($user->get_user_type());?></span>
                        </li>
                       
                    <?php 
                    if($count == 12){
                      break;
                    }
                     }
                    ?> 
                      </ul><!-- /.users-list -->
                    </div><!-- /.box-body -->
                    <div class="box-footer text-center">
                      <a href="<?php echo BASE_URL?>admin/index.php?page=user" class="uppercase">View All Users</a>
                    </div><!-- /.box-footer -->
                  </div><!--/.box -->
            </div><!-- /.col -->    
      
        <!-- RECENTLY ADDED PROJECTS -->
            <div class="col-md-4">
              <!-- PRODUCT LIST -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Recently Added Projects</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <ul class="products-list product-list-in-box">
                    <li class="item">
                      <!-- <div class="product-img">
                        <img src="dist/img/default-50x50.gif" alt="Product Image" />
                      </div>
                      <div class="product-info">
                        <a href="javascript::;" class="product-title">Samsung TV <span class="label label-warning pull-right">$1800</span></a>
                        <span class="product-description">
                          Samsung 32" 1080p 60Hz LED Smart HDTV.
                        </span>
                      </div> -->  UNDER CONSTRUCTION
                    </li><!-- /.item -->
                    
                  </ul>
                </div><!-- /.box-body -->
                <div class="box-footer text-center">
                  <a href="javascript::;" class="uppercase">View All Projects</a>
                </div><!-- /.box-footer -->
              </div><!-- /.box -->
            </div> 
        

          </div> <!-- ROW DIV -->    
        </section>
         





         