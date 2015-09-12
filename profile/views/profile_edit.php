
   	

    <!-- Intro Header -->
    <header class="intro-fund-create">
        <div class="intro-body">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="panel panel-default">
                            <div class="panel-body">
                            <div class="page-header text-center">
                              <h1 class="black-color">Edit Profile<br/>
                              <small>Edit Your Profile Picture and the About Section</small></h1>
                            </div>  
                            
                            <!-- ===================================== -->
                            <!-- FORM FOR EDIT PROFILE-->

                            <form id="frm" class="black-color" action="" method="post" enctype="multipart/form-data">
                                    
                                    <div class="form-group">
                                        <label for="foto">Edit Photo?:</label>
                                        <input type="checkbox" value="1" name="foto" id="foto"/>
                                    </div>

                                    <div class="form-group" id="profile_photo">
                                        <label for="image">Profile Photo:</label>
                                        <input type="file" name="image" accept="image/*">
                                    </div>  
                                                                                                
                                    <div class="form-group">
                                        <label for="about">About:</label>
                                        <textarea class="form-control" name="about" id="about" rows="10" placeholder="Write Something About Yourself or Your Organization" required><?php echo $profile_to_edit->get_about();?></textarea>
                                    </div>  

                                    <input type="button" id="reset" class="btn btn-danger" value="Reset"/>
                                    <input type="submit" name="submit" class="pull-right btn btn-primary submit action-button" value="Submit" />
                                    <input type="hidden" name="id" value="<?=$id?>"/>
                             </form>
                            <!-- FORM FOR CREATE FUNDRAISER -->
                            <!-- ===================================== -->
                         
                          </div>
                        </div>
                      
                      
                    </div>
                </div>
            </div>
        </div>
    </header>
	<!--/#home-->

    <script>
    $(document).on("ready",function(){

        $("#profile_photo").hide();

        $("#reset").on("click",function(){
            $("#about").val('');
        });

        $("#foto").on("change",function(){
            $("#profile_photo").slideToggle();
        });
    });
    </script>