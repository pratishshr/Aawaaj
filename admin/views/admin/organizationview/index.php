        <!-- Main content -->
        <section class="content">
           <!-- Default box -->
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Organization's Table</h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
              </div>
            </div>
            <div class="box-body">


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


                  
              <table class="table table-bordered table-hover table-striped">
                <tr>
                  <th>ID</th>
                  <th>Username</th>
                  <th>Name</th>
                  <th>Contact No</th>
                  <th>User Type</th>
                  <th>Organization Name</th>
                  <th>Date of Establishment</th>
                  <th>Address</th>
                  <th>Status</th>
                  <th>Action</th>



                 <?php 
                $id=1;
                foreach($this->organizationrepository->get_all() as $user){
                    
                 ?>

                <tr>
                  <td><?php echo $id++?></td>
                  <td><?php echo $user->get_user_name();?></td>
                  <td><?php echo $user->get_first_name();?> <?php echo $user->get_last_name();?></td>
                  <td><?php echo $user->get_contact_number();?></td>
                  <td><?php echo $user->get_user_type();?></td>
                  <td><?php echo $user->get_name();?></td>
                  <td><?php echo $user->get_doe();?></td>
                  <td><?php echo $user->get_address();?></td>
                                 
                  
                  <?php if($user->get_user_status()==1){
                    ?>
                     <td><span class="label label-success">Active</span></td>
                  
                   <?php 
                   }else{

                ?>
                  <td><span class="label label-danger">Inactive</span></td>
                <?php
                 }
                 ?>
                   
                  
                  <td><a href="<?php echo BASE_URL;?>admin/user/edit/<?php echo $user->get_user_id();?>" class="btn btn-primary btn-sm glyphicon glyphicon-pencil"></a> 
                      <a href="<?php echo BASE_URL;?>admin/user/delete/id=<?php echo $user->get_user_id();?>" class="btn btn-danger btn-sm glyphicon glyphicon-trash" onclick="return confirm('Are you sure?')"></a></td>
                </tr>


                <?php
                } 
                  ?>

                

                

                

              </table>   
            </div><!-- /.box-body -->
            <div class="box-footer">
             
            </div><!-- /.box-footer-->
          </div><!-- /.box -->
      
        </section><!-- /.content -->
     