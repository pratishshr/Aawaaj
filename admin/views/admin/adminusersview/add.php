        <script src="<?php echo BASE_URL?>admin/assets/plugins/jQuery/jQuery-2.1.4.min.js" type="text/javascript"></script>


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
              <h3 class="box-title">Add user</h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
              </div>
            </div>
            <div class="box-body">
                  <!-- ===================================== -->
                  <!-- Eta Rakhe content -->

                        <form id= "adduser" class="col-md-offset-4 col-xs-4" action="#" method="post" enctype='multipart/form-data'>
                          <div class="form-group">
                            <label for="first_name">Username (Email)</label>
                            <input type="email" class="form-control" name="user_name" id="first_name" placeholder="Username (Email)" required>
                          </div>
                          <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
                          </div>
                          <div class="form-group has-feedback" id="password_again_div">
                            <label for="password">Retype Password </label>
                            <input type="password" class="form-control" name="password_again" id="password_again" placeholder="Retype Password" required>
                             <span id="password_sign" class="" aria-hidden="true"></span>
                          </div>

                          <div class="form-group">
                            <label for="first_name">First Name</label>
                            <input type="text" class="form-control" name="first_name" id="first_name" placeholder="First Name" required>
                          </div>
                          <div class="form-group">
                            <label for="last_name">Last Name</label>
                            <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Last Name" required>
                          </div>
                          <div class="form-group">
                            <label for="contact_number">Contact-no</label>
                            <input type="text" class="form-control" name="contact_number" id="contact_no" placeholder="Contact-no" required>
                          </div>
                          <div class="form-group">
                            <label for="user_type">User-Type</label>
                            <select id="user_type" name="user_type" class="form-control">
                            	<option value="generalUser" selected="selected">General User</option>
                            	<option value="welfare">Welfare</option>
                            	<option value="organization">Organization</option>
                            </select>
                          </div>
                          <div class="form-group">
                            <label for="user_status">Status</label>
                            <div class="radio">
                                <label class="radio-inline">
                                  <input type="radio" name="user_status" id="active" value="1"> Active
                                </label>
                                <label class="radio-inline">
                                  <input type="radio" name="user_status" id="inactive" value="0" checked> Inactive
                                </label>
                            </div>    
                          </div>
                          

                          <!-- form for organization -->
                          <div id="organization" style="display:none">
                              <div class="form-group">
                                <input type="text" name="name" class="form-control" placeholder="Name of Organization" />
                              </div>
                              <div class="form-group">
                                <label for="organization_logo">Date of Establishment</label>
                                <input type="date" name="doe" class="form-control"/>
                              </div>
                              <div class="form-group">
                                <input type="text" name="address" class="form-control" placeholder="Full Address" />
                              </div>
                              <div class="form-group">
                                <label for="organization_logo">Official logo</label>
                                  <input type="hidden" name="MAX_FILE_SIZE" value="10000000">
                                <input type="file" accept="image/*" id="organization_logo" name="img" class="form-control" />
                              </div>
                              <div class="form-group">
                                <textarea name="objective" class="form-control" placeholder="Objectives of Organization"></textarea>
                              </div>
                         </div>
                          <!-- form for organization end -->
                          
                          
                           <!-- form for welfare -->
                          <div id="welfare" style="display:none">
                              <div class="form-group">
                                <input type="text" name="welf_name" class="form-control" placeholder="Name of Welfare" />
                              </div>
                              <div class="form-group">
                                <input type="date" name="welf_doe" class="form-control" placeholder="Date of Establishment" />
                              </div>
                              <div class="form-group">
                                <input type="text" name="welf_address" class="form-control" placeholder="Full Address" />
                              </div>
                              <div class="form-group">
                                <input type="text" name="welf_service" class="form-control" placeholder="Welfare Service To" />
                              </div>
                              <div class="form-group">
                                <label for="organization_logo">Photo</label>
                                <input type="hidden" name="MAX_FILE_SIZE" value="10000000">
                                <input type="file" accept="image/*" id="welf_photo" name="welf_photo" class="form-control"/>
                              </div>
                              <div class="form-group">
                                <textarea name="welf_objective" class="form-control" placeholder="Objectives of welfare"></textarea>
                            </div>
                          </div>
                          <!-- form for welfare end -->

                          <button type="submit" id="submit" name="submit" class="btn btn-primary">Submit</button>
                          <a href="<?php echo BASE_URL?>/admin" class="btn btn-danger">Cancel</a>

                        </form>
             	  <!-- ===================================== -->
            </div><!-- /.box-body -->
            <div class="box-footer">
             
            </div><!-- /.box-footer-->
          </div><!-- /.box -->
      
        </section><!-- /.content -->
     

     <script>
    
    
     $(document).on('ready',function(){
      //show additional form fields if usertype dropdown is changed
        $("#user_type").on("change",function(){
          var userType = $("#user_type").val();
          $("#organization, #welfare").hide();
            // $("#welfare").hide();
          if(userType == "organization"){
            $("#organization").show();
          }
          else if(userType == "welfare"){
           $("#welfare").show();
          }
        });

        //CHECK PASSWORD
        $('#password_again').on('keyup',function(){
            if($(this).val()!=$("#password").val()){
              $("#password_again_div").attr('class', 'form-group has-feedback has-error');
              $('#password_sign').attr('class','glyphicon glyphicon-remove form-control-feedback');
            }else if($(this).val()==$("#password").val()){
              $("#password_again_div").attr('class', 'form-group has-feedback has-success');
              $('#password_sign').attr('class','glyphicon glyphicon-ok form-control-feedback');
            }else{
              $("#password_again_div").attr('class', 'form-group has-feecback');

            }  
            });

        //SUBMIT BUTTON ALERT IF PASSWORD MISMATCH
        $("#submit").click(function(){
          if($("#password").val()==$("#password_again").val()){
            $("#submit").attr('type', 'submit');
           
          }
          else{
            $("#submit").attr('type', 'button');
            alert("password and re-password not matching");
          }
        });
     });
    

     </script>