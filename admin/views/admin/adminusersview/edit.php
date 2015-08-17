        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
           Admin's Panel!
          </h1>
        </section>





        <!-- Main content -->
        <section class="content">
           <!-- Default box -->
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Edit user</h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
              </div>
            </div>
            <div class="box-body">
                  <!-- ===================================== -->
                  <!-- Eta Rakhe content -->

                        <form class="col-md-offset-4 col-xs-4" action="#" method="post">
                          <div class="form-group">
                            <label for="first_name">Username (Email)</label>
                            <input type="email" class="form-control" name="user_name" id="first_name" placeholder="Username (Email)" value="<?php echo $user->get_user_name();?>">
                          </div>
                          <div class="form-group">
                            <label for="first_name">First Name</label>
                            <input type="text" class="form-control" name="first_name" id="first_name" placeholder="First Name" value="<?php echo $user->get_first_name();?>">
                          </div>
                          <div class="form-group">
                            <label for="last_name">Last Name</label>
                            <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Last Name" value="<?php echo $user->get_last_name();?>">
                          </div>
                          <div class="form-group">
                            <label for="contact_number">Contact-no</label>
                            <input type="text" class="form-control" name="contact_number" id="contact_no" placeholder="Contact-no" value="<?php echo $user->get_contact_number();?>">
                          </div>
                          <div class="form-group">
                            <label for="user_type">User-Type</label>
                            <select name="user_type" class="form-control">
                            	<option value="generalUser" <?php echo ($user->get_user_type() =='general user')?'selected':'';?>>General User</option>
                            	<option value="welfare" <?php echo ($user->get_user_type() =='welfare')?'selected':'';?>>Welfare</option>
                            	<option value="organization" <?php echo ($user->get_user_type() =='organization')?'selected':'';?>>Organization</option>
                            </select>
                          </div>
                          <div class="form-group">
                            <label for="user_status">Status</label>
                            <div class="radio">
                                <label class="radio-inline">
                                  <input type="radio" name="user_status" id="active" value="1" <?php echo ($user->get_user_status() =='1')?'checked':'';?>> Active
                                </label>
                                <label class="radio-inline">
                                  <input type="radio" name="user_status" id="inactive" value="0" <?php echo ($user->get_user_status() =='0')?'checked':'';?>> Inactive
                                </label>
                            </div>    
                          </div>
                          <input type="hidden" class="form-control" name="id" id="id" value="<?php echo $user->get_user_id();?>">
                          <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                          <a href="<?php echo BASE_URL?>/index.php?page=admin" class="btn btn-danger">Cancel</a>
                        </form>

                        
             	  <!-- ===================================== -->
            </div><!-- /.box-body -->
            <div class="box-footer">
             
            </div><!-- /.box-footer-->
          </div><!-- /.box -->
      
        </section><!-- /.content -->
     