



        <!-- Main content -->
        <section class="content">
           <!-- Default box -->
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">All Fundraisers</h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
              </div>
            </div>
            <div class="box-body">
                  <!-- ===================================== -->
                  <!-- Eta Rakhe content -->
           
              <table class="table table-bordered table-hover table-striped">
                <tr>
                  <th>ID</th>
                  <th>Title</th>
                  <th>Started By</th>
                  <th>Fund Raised</th>
                  
                </tr>

                

                <?php 
                $id=1;
                foreach($this->fundrepository->get_all() as $fund){

                   $total = $this->payrepository->totalFund($fund->get_id());
                   $user = $this->fundrepository->getUser($fund->get_u_id());
                
                 ?>

                <tr>
                  <td><?php echo $id++?></td>
                  <td><a href="<?php echo BASE_URL.'fundraiser/index.php?page=fund&m=campaign&id='.$fund->get_id();?>" target="_blank"><?php echo $fund->get_title();?></a></td>
                  <td><?php echo $user;?></td>
                  <td><?php echo $total;?></td>
                </tr>  


                <?php
                } 
                  ?>

                
                  <!-- ===================================== -->
              </table>   
            </div><!-- /.box-body -->
            <div class="box-footer">
             
            </div><!-- /.box-footer-->
          </div><!-- /.box -->
      
        </section><!-- /.content -->
