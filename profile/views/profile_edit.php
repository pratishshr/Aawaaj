
   	

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

                            <form class="black-color" action="" method="post" enctype="multipart/form-data">
                                                                    
                                    <div class="form-group">
                                        <label for="profile_photo">Profile Photo:</label>
                                        <input type="file" name="profile_photo" accept="image/*" required>
                                    </div>  
                                                                                                
                                    <div class="form-group">
                                        <label for="about">About:</label>
                                        <textarea class="form-control" name="about" rows="10" placeholder="Write Something About Yourself or Your Organization" required></textarea>
                                    </div>  

                                    
                                    <input type="submit" name="submit" class="pull-right btn btn-primary submit action-button" value="Submit" />
                                    <input type="hidded" name="id" value="<?=$id?>"/>
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