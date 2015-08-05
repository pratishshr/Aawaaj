$(document).on("ready",function(){

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

//shows red highlighted textbox in re-password field if password and re-password are different
  $("#re_password").on("keyup",function(){
    if($(this).val()!=$("#password").val()){
      $("#re_password_div").attr('class', 'form-group has-error');
    }
    else{
      $("#re_password_div").attr('class', 'form-group');
    }
  });

//does not let form be submitted if password and re-password are different and shows error
  $("#submit_btn").click(function(){
    if($("#password").val()==$("#re_password").val()){
      $("#submit_btn").attr('type', 'submit');
      $("form").submit();
    }
    else{
      $("#submit_btn").attr('type', 'button');
      alert("password and re-password not matching");
    }
  });

});