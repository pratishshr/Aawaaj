



        <!-- Main content -->
        <section class="content">
           <!-- Default box -->
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">All Donations in "<?php echo strtoupper($title)?>"</h3>
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
                  <th>Doner Email</th>
                  <th>Donation Amount</th>
                </tr>

                

                <?php 
                $count=1;
                foreach($this->payrepository->get_by_id($id) as $pay){

                 ?> 

                <tr>
                  <td><?php echo $count++?></td>
                  <td><?php echo $pay->get_payer_email();?></a></td>
                  <td>$<?php echo $pay->get_payment_amount();?></td>
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
