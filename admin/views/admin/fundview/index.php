



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
                  <th>Project Goal</th>
                  <th>Fund Raised</th>
                  <th>Remaining Days</th>
                  
                </tr>

                

                <?php 
                $id=1;
                foreach($this->fundrepository->get_all() as $fund){

                   $total = $this->payrepository->totalFund($fund->get_id());
                   $user = $this->fundrepository->getUser($fund->get_u_id());
                   //CALCULATE DAYS LEFT
                  $current_date = new DateTime(date('Y-m-d'), new DateTimeZone('Asia/Kathmandu'));
                  $end_date = new DateTime($fund->get_end_date(), new DateTimeZone('Asia/Kathmandu'));
                  $interval = $current_date->diff($end_date);
                  $remaining = $interval->format('%a');
                  
                 ?>

                <tr>
                  <td><?php echo $id++?></td>
                  <td><a href="<?php echo BASE_URL.'admin/index.php?page=fundraiser&m=donations&id='.$fund->get_id().'&title='.$fund->get_title();?>"><?php echo $fund->get_title();?></a></td>
                  <td><?php echo $user;?></td>
                  <td>$<?php echo $fund->get_amount();?> </td>
                  <td>$<?php echo $total;?></td>
                  <td><?php echo $remaining;?></td>
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
