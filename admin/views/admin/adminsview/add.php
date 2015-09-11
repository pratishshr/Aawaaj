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
              <h3 class="box-title">Add an Admin</h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
              </div>
            </div>
            <div class="box-body">
                  <!-- ===================================== -->
                  <!-- Eta Rakhe content -->

                        <form id= "adduser" class="col-md-offset-4 col-xs-4" action="" method="post">
                          <div class="form-group">
                            <label for="first_name">Username</label>
                            <input type="text" class="form-control" name="username" id="first_name" placeholder="Username" required>
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

                          
                          <button type="submit" id="submit" name="submit" class="btn btn-primary">Submit</button>
                          <a href="<?php echo BASE_URL?>admin/index.php" class="btn btn-danger">Cancel</a>

                        </form>
             	  <!-- ===================================== -->
            </div><!-- /.box-body -->
            <div class="box-footer">
             
            </div><!-- /.box-footer-->
          </div><!-- /.box -->
      
        </section><!-- /.content -->
     

     <script>
    
    
     $(document).on('ready',function(){
    

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