
   	

    <!-- Intro Header -->
    <header class="intro-fund-create">
        <div class="intro-body">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="panel panel-default">
                            <div class="panel-body">
                            <div class="page-header text-center">
                              <h1 class="black-color">Create a Fundraiser<br/>
                              <small>Raise funds for a Non-Profit or Personal Projects</small></h1>
                            </div>  
                            
                            <!-- ===================================== -->
                            <!-- FORM FOR CREATE FUNDRAISER-->

                            <form class="black-color" action="" method="post" enctype="multipart/form-data">
                                                                    
                                    <div class="form-group ">
                                        <label for="type">Fundraiser Type:</label>
                                        </br>
                                        <div class="btn-group" data-toggle="buttons">
                                          <label class="btn btn-default"  disabled>
                                            <input type="radio" name="fundraiser_type" id="option1" autocomplete="off" value="personal"><strike>Personal</strike>
                                          </label>
                                          <label class="btn btn-default active">
                                            <input type="radio" name="fundraiser_type" id="option2" autocomplete="off" value="non_profit" checked> Non-Profit
                                          </label>
                                        </div>
                                    </div>  

                                    <div class="form-group">
                                        <label for="title">Title:</label>
                                        <input type="text" class="form-control" id="title" name="title" placeholder="Title" maxlength="50" required>
                                    </div>  
                                 
                                    <div class="form-group">
                                        <label for="amount">Amount to be raised:</label>
                                        <input type="number" class="form-control" name="amount" id="amount" placeholder="Amount (at least $100)" min="100" required>
                                    </div>  

                                    <div class="form-group">
                                        <label for="enddate">Fundraiser End Date:</label>
                                        <input type="date" class="form-control" name="end_date" id="end_date" max="9999-12-31" required>
                                    </div>  

                                    <div class="form-group">
                                        <label for="amount">Description (in short):</label>
                                        <textarea class="form-control" id="textarea" name="description" placeholder="Description" maxlength="160" required></textarea>
                                    </div>  
                                    
                                    <div class="form-group">
                                        <label for="title">Campaign Image:</label>
                                        <input type="file" name="image" accept="image/*" required>
                                    </div>  
                                 
                                    <div class="form-group">
                                        <label for="amount">Video URL <small>(Youtube)</small>:</label>

                                        <input type="url"  name="video_url" class="form-control" id="videourl" placeholder="If you have a video about your campaign">
                                    </div>  

                                                                                                   
                                    <div class="form-group">
                                        <label for="type">Details:</label>
                                        <textarea class="form-control" name="details" rows="10" placeholder="Add detail description of your campaign" required></textarea>
                                    </div>  

                                    
                                    <input type="submit" name="submit" class="pull-right btn btn-primary submit action-button" value="Submit" />
                                    
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