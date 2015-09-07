<?php require_once ($_SERVER['DOCUMENT_ROOT']."/Aawaaj/config/config.php"); ?>
<?php require_once(ROOT_PATH."database/session.php"); ?>
<?php include_once(PUBLIC_PATH."/includes/header.php");?>


   	

    <!-- Intro Header -->
    <header class="intro-fund-create">
        <div class="intro-body">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="panel panel-default">
                            <div class="panel-body">
                            <div class="page-header text-center">
                              <h1 class="black-color">Post Project<br/>
                              <small>Raise funds for a Non-Profit or Personal Projects</small></h1>
                            </div>  
                            
                            <!-- ===================================== -->
                            <!-- MULTI STEP FORM FOR CREATE-->

                            <form class="black-color">
                                                                    
                                    <div class="form-group ">
                                        <label for="type">Fundraiser Type:</label>
                                        </br>
                                        <div class="btn-group" data-toggle="buttons">
                                          <label class="btn btn-default">
                                            <input type="radio" name="options" id="option1" autocomplete="off"> Personal                                  </label>
                                          <label class="btn btn-default">
                                            <input type="radio" name="options" id="option2" autocomplete="off"> Non-Profit
                                          </label>
                                        </div>
                                    </div>  

                                    <div class="form-group">
                                        <label for="title">Title:</label>
                                        <input type="text" class="form-control" id="title" placeholder="Title" maxlength="50">
                                    </div>  
                                 
                                    <div class="form-group">
                                        <label for="amount">Amount to be raised:</label>
                                        <input type="number" class="form-control" id="amount" placeholder="Amount (at least Rs.10000)" min="10000">
                                    </div>  

                                    <div class="form-group">
                                        <label for="amount">Description (in short):</label>
                                        <textarea class="form-control" id="textarea" placeholder="Description" maxlength="160"></textarea>
                                    </div>  
                                    
                                    <div class="form-group">
                                        <label for="title">Campaign Image:</label>
                                        <input type="file" >
                                    </div>  
                                 
                                    <div class="form-group">
                                        <label for="amount">Video URL <small>(Youtube)</small>:</label>

                                        <input type="url" class="form-control" id="videourl" placeholder="If you have a video about your campaign">
                                    </div>  

                                                                  
                                    <div class="form-group">
                                        <label for="type">Details:</label>
                                        <textarea class="form-control" name="textarea" rows="10" placeholder="Add detail description of your campaign"></textarea>
                                    </div>  

                                    
                                    <input type="submit" name="submit" class="pull-right btn btn-primary submit action-button" value="Submit" />
                                    
                             </form>
                            <!-- MULTI STEP FORM FOR CREATE FUNDRAISER -->
                            <!-- ===================================== -->
                         
                          </div>
                        </div>
                      
                      
                    </div>
                </div>
            </div>
        </div>
    </header>
	<!--/#home-->