<!-- <script src="//code.jquery.com/jquery.min.js"></script> -->
   <style type="text/css">
  .no {color:red; font-size: 12px;}
  .yes{color:green;font-size:12px;}
</style>
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>

<script type="text/javascript">
  
$(document).ready(function(){
  $("#email").blur(function(){

    var form_data = {
      action: 'check_username',
      username: $(this).val()

    };
    $.ajax({
      type: "POST",
      url: "<?php echo BASE_URL?>/app/controller/confirmfunction.php",
      data: form_data,
      success: function(result){
        $("#message").html(result);
      }
    });

  })
});


</script>
    <script src="<?php echo BASE_URL?>/public/assets/js/jquery.js"></script>
<div class="modal fade" id="signupModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header ">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Sign up</h4>
      </div>
      <div class="modal-body">
        <form class="form-group" name="frm" action="<?php echo BASE_URL?>/app/controller/signUpController.php" method="post" enctype="multipart/form-data">
            <div class="form-group row">
              <div class="col-md-6">
                <input type="text" name="first_name" class="form-control input-lg" placeholder="First Name" required/>
              </div>
              <div class="col-md-6">
              <input type="text" name="last_name" class="form-control input-lg" placeholder="Last Name" required/>
              </div>
            </div>
            <div class="form-group">
              <input type="email" name="email" class="form-control input-lg" id="email" placeholder="Email" required/>
              <div id="message"></div>
            </div>
            <div class="form-group">
              <input type="password" id="password" name="password" class="form-control input-lg" placeholder="Password" required/>
            </div>
            <div id="re_password_div" class="form-group">
              <input type="password" id="re_password" name="re_password" class="form-control input-lg" placeholder="Retype Password" required/>
            </div>
            <div class="form-group">
              <input type="number" name="contact_number" class="form-control input-lg" placeholder="Contact Number" size="3" required/>
            </div>
            <div class="form-group row">
              <div class="col-md-4">
              <select id="user_type" class="form-control" name="user_type">
                <option>Select User Type</option>
                <option value="generalUser">General User</option>
                <option value="organization">Organization</option>
                <option value="welfare">Welfare</option>
              </select>
              </div>
              </div>
            
 
            <!-- form for organization -->
            <div id="organization" style="display:none">
                <div class="form-group">
                  <input type="text" name="organization_name" class="form-control input-lg" placeholder="Name of Organization" />
                </div>
                <div class="form-group">
                  <label for="organization_logo">Date of Establishment</label>
                  <input type="date" name="organization_date_of_establishment" class="form-control input-lg"/>
                </div>
                <div class="form-group">
                  <input type="text" name="full_address_of_organization" class="form-control input-lg" placeholder="Full Address" />
                </div>
                <div class="form-group">
                  <label for="organization_logo">Official logo</label>
                    <input type="hidden" name="MAX_FILE_SIZE" value="10000000">
                  <input type="file" accept="image/*" id="organization_logo" name="organization_logo" class="form-control input-lg" />
                </div>
                <div class="form-group">
                  <textarea name="objectives_of_organization" class="form-control input-lg" placeholder="Objectives of Organization"></textarea>
                </div>
           </div>
            <!-- form for organization end -->
            
            
             <!-- form for welfare -->
            <div id="welfare" style="display:none">
                <div class="form-group">
                  <input type="text" name="welfare_name" class="form-control input-lg" placeholder="Name of Welfare" />
                </div>
                <div class="form-group">
                  <input type="date" name="welfare_date_of_establishment" class="form-control input-lg" placeholder="Date of Establishment" />
                </div>
                <div class="form-group">
                  <input type="text" name="full_address_of_welfare" class="form-control input-lg" placeholder="Full Address" />
                </div>
                <div class="form-group">
                  <input type="text" name="welfare_service" class="form-control input-lg" placeholder="Welfare Service To" />
                </div>
                <div class="form-group">
                  <label for="organization_logo">Photo</label>
                  <input type="hidden" name="MAX_FILE_SIZE" value="10000000">
                  <input type="file" accept="image/*" id="welfare_photo" name="welfare_photo" class="form-control input-lg"/>
                </div>
                <div class="form-group">
                  <textarea name="objectives_of_welfare" class="form-control input-lg" placeholder="Objectives of welfare"></textarea>
              </div>
            </div>
            <!-- form for welfare end -->
       
           
            <div class="form-group">
              <input type="checkbox" name="terms" class="" required> I agree to <a href"#">Terms of Use</a>
            </div>

            <div class="form-group text-left ">
              <input type="button" id="submit_btn" name="submit" class="btn btn-info btn-lg btn-block" value="Sign up">
            </div>
            <div class="modal-footer"></div>
          </form>
      </div>
     
    </div>
  </div>
</div>
<script src="<?php echo BASE_URL;?>/public/assets/js/signupmodal.js"></script>
