<!-- Intro Header -->
    <header class="intro-fund-create">
        <div class="intro-body">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="panel panel-default">
                            <div class="panel-body">
                            <div class="page-header text-center">
                              <h1 class="black-color">Post Requirement<br/>
                              <small>Enter Your Requirement</small></h1>
                            </div>  
                            
                            <!-- ===================================== -->
                            <!-- MULTI STEP FORM FOR CREATE-->

                            <form class="black-color" action="<?php echo BASE_URL.'profile/index.php?id='.$_SESSION['user_hash'].'&page=requirements&m=save';?>" method="POST">
                             <div class="form-group">
                                        <label for="title">Title: </label>
                                        <input type="text" class="form-control" id="title" placeholder="Title" maxlength="50" name="title" required>
                                    </div>  
                                    <div class="form-group" id="single_date_div">
                                        <label for="single_date"> When should these requirements fulfilled?</label>
                                        <input type="date" class="form-control" id="date" name="date" required>
                                    </div>
                                     <div class="form-group">
                                        <label for="details">Details:</label>
                                        <textarea class="form-control" name="details" id="details" rows="10" placeholder="Add detail description of your requirement" required></textarea>
                                    </div>  
                                     <input type="submit" name="submit" class="pull-right btn btn-primary submit action-button" value="Submit" /> 
                             </form>
                            <!-- FORM FOR CREATE PROJECT -->
                            <!-- ===================================== -->
                         
                          </div>
                        </div>
                      
                      
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!--/#home-->