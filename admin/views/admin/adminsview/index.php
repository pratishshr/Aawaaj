        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
           Welcome to the Admin's Panel!
          </h1>
        </section>





        <!-- Main content -->
        <section class="content">
           <!-- Default box -->
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Admin's Table</h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
              </div>
            </div>
            <div class="box-body">
                  <!-- ===================================== -->
                  <!-- Eta Rakhe content -->

            <?php if(isset($_GET['action']) && $_GET['action']=="delete"){ ?>
                     <div class="alert alert-danger" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                        Deleted Succesfully!
                     </div> 
            <?php  }elseif(isset($_GET['action']) && $_GET['action']=="add"){ ?>
                     <div class="alert alert-success" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                        Added Succesfully!
                     </div>
            <?php }elseif(isset($_GET['action']) && $_GET['action']=="edit"){ ?>     
                     <div class="alert alert-info" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                        Edited Succesfully!
                     </div>

            <?php } ?>


              <a href="<?php echo BASE_URL;?>admin/admin/add" class="pull-right btn btn-primary"><span class ="glyphicon glyphicon-plus"></span></a>

              <table class="table table-bordered table-hover table-striped">
                <tr>
                  <th>ID</th>
                  <th>Name </th>
                  <th>Username</th>
                  <td>Email</td>
                 
                </tr>

                

                <?php 
                $id=1;
                foreach($this->adminrepository->get_all() as $admin){
                    
                 ?>

                <tr>
                  <td><?php echo $id++?></td>
                  <td><?php echo $admin->get_first_name();?> <?php echo $admin->get_last_name();?></td>
                  <td><?php echo $admin->get_username();?></td>
                  <td><?php echo $admin->get_email();?></td>
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
     