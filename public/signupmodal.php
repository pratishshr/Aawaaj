<!-- <script src="//code.jquery.com/jquery.min.js"></script> -->

    <script src="<?php echo BASE_URL?>/assets/js/jquery.js"></script>
<!--Signup Modal -->
<div class="modal fade" id="signupModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header ">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Sign up</h4>
      </div>
      <div class="modal-body">
        <form class="form-group" action="hello.php" method="post">
            <div class="form-group row">
              <div class="col-md-6">
                <input type="text" name="first_name" class="form-control input-lg" placeholder="First Name" required/>
              </div>
              <div class="col-md-6">
              <input type="text" name="last_name" class="form-control input-lg" placeholder="Last Name" required/>
              </div>
            </div>
            <div class="form-group">
              <input type="email" name="email" class="form-control input-lg" placeholder="Email" required/>
            </div>
            <div class="form-group">
              <input type="password" name="password" class="form-control input-lg" placeholder="Password" required/>
            </div>
            <div class="form-group">
              <input type="password" name="re_password" class="form-control input-lg" placeholder="Retype Password" required/>
            </div>
            <div class="form-group">
              <input type="number" name="contact_number" class="form-control input-lg" placeholder="Contact Number" required/>
            </div>
            <div class="form-group row">
              <div class="col-md-4">
              <select id="user_type" class="form-control">
                <option>Select User Type</option>
                <option value="general">General User</option>
                <option value="organization">Organization</option>
                <option value="welfare">Welfare</option>
              </select>
              </div>
              </div>
            
            <script>
              $(document).on("ready",function(){
                                
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
              });
            </script>

            <!-- form for organization -->
            <div id="organization" style="display:none">
                <div class="form-group">
                  <input type="text" name="organization_name" class="form-control input-lg" placeholder="Name of Organization" required/>
                </div>
                <div class="form-group">
                  <input type="text" name="organization_date_of_establishment" class="form-control input-lg" placeholder="Date of Establishment" required/>
                </div>
                <div class="form-group">
                  <input type="text" name="full_address_of_organization" class="form-control input-lg" placeholder="Full Address" required/>
                </div>
                <div class="form-group">
                  <label for="organization_logo">Official logo</label>
                  <input type="file" accept="image/*" id="organization_logo" name="organization_logo" class="form-control input-lg"/>
                </div>
                <div class="form-group">
                  <textarea name="objectives_of_organization" class="form-control input-lg" placeholder="Objectives of Organization"></textarea>
                </div>
           </div>
            <!-- form for organization end -->
            
            
             <!-- form for welfare -->
            <div id="welfare" style="display:none">
                <div class="form-group">
                  <input type="text" name="welfare_name" class="form-control input-lg" placeholder="Name of Welfare" required/>
                </div>
                <div class="form-group">
                  <input type="text" name="welfare_date_of_establishment" class="form-control input-lg" placeholder="Date of Establishment" required/>
                </div>
                <div class="form-group">
                  <input type="text" name="full_address_of_welfare" class="form-control input-lg" placeholder="Full Address" required/>
                </div>
                <div class="form-group">
                  <input type="text" name="welfare_service" class="form-control input-lg" placeholder="Welfare Service To" required/>
                </div>
                <div class="form-group">
                  <label for="organization_logo">Photo</label>
                  <input type="file" accept="image/*" id="welfare_photo" name="welfare_photo" class="form-control input-lg"/>
                </div>
                <div class="form-group">
                  <textarea name="objectives_of_welfare" class="form-control input-lg" placeholder="Objectives of welfare"></textarea>
              </div>
            </div>
            <!-- form for welfare end -->
       
           
            <div class="form-group">
              <input type="checkbox" name="terms" class=""> I agree to <a href"#">Terms of Use</a>
            </div>

            <div class="form-group text-left ">
              <input type="submit" name="submit" class="btn btn-info btn-lg btn-block" value="Sign up">
            </div>
            <div class="modal-footer"></div>
          </form>
      </div>
     
    </div>
  </div>
</div>
