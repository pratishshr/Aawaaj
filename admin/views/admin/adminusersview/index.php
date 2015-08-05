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
              <h3 class="box-title">User's Table</h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
              </div>
            </div>
            <div class="box-body">
              <table class="table table-bordered">
                <tr>
                  <th>ID</th>
                  <th>Username</th>
                  <th>Name</th>
                  <th>Contact No</th>
                  <th>User Type</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>

                

                <?php 
                $id=1;
                foreach($this->userrepository->get_all() as $user){
                    
                 ?>

                <tr>
                  <td><?php echo $id++?></td>
                  <td><?php echo $user->get_user_name();?></td>
                  <td><?php echo $user->get_first_name();?> <?php echo $user->get_last_name();?></td>
                  <td><?php echo $user->get_contact_number();?></td>
                  <td><?php echo $user->get_user_type();?></td>
                  <td><?php echo $user->get_user_status();?></td>
                  <td><a href="#" class="btn btn-primary btn-sm glyphicon glyphicon-pencil"></a> <a href="" class="btn btn-danger btn-sm glyphicon glyphicon-trash"></a></td>
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
     