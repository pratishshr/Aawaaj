<!-- Intro Header -->
    <header class="intro-fund-create">
        <div class="intro-body">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="panel panel-default">
                            <div class="panel-body">
                            <div class="page-header text-center">
                              <h1 class="black-color">Create Project<br/>
                              <small>Raise funds for a Non-Profit or Personal Projects</small></h1>
                            </div>  
                            
                            <!-- ===================================== -->
                            <!-- MULTI STEP FORM FOR CREATE-->

                            <form class="black-color">
                                                                    
                                    <div class="form-group ">
                                        <label for="type">Project Type:</label>
                                        </br>
                                        <div class="btn-group" data-toggle="buttons">
                                          <label class="btn btn-default">
                                            <input type="radio" name="options" id="option1" autocomplete="off"> Single-Day                                  </label>
                                          <label class="btn btn-default">
                                            <input type="radio" name="options" id="option2" autocomplete="off"> Multiple-Days
                                          </label>
                                        </div>
                                    </div>  

                                    <div class="form-group">
                                        <label for="title">Title:</label>
                                        <input type="text" class="form-control" id="title" placeholder="Title" maxlength="50">
                                    </div>  
                                 
                                    <div class="form-group">
                                        <label for="amount">Objectives:</label>
                                        <textarea class="form-control" id="textarea" placeholder="Objectives" maxlength="160"></textarea>
                                    </div>  
                                        
                                    <div class="form-group">
                                        <label for="loction">Location:</label>
                                        <input type="text" class="form-control" id="location" placeholder="Location" maxlength="100">
                                    </div>

                                    <div class="form-group">
                                        <label for="budget">Estimated Budget:</label>
                                        <input type="number" class="form-control" id="budget" placeholder="Budget">
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="requirement1">Requirements (upto 5):</label> <a href="javascript:void(0)" class="btn btn-success btn-sm" id="btn_plus"><span class="fa fa-plus"></span></a> <a href="javascript:void(0)" class="btn btn-danger btn-sm" id="btn_minus"><span class="fa fa-minus"></span></a>
                                        <input type="text" class="form-control" id="requirement1" placeholder="Requirement 1" maxlength="200" required>
                                    </div>

                                    <div class="form-group">
                                        <input type="text" class="form-control" id="requirement2" placeholder="Requirement 2" maxlength="200">
                                    </div>

                                    <div class="form-group">
                                        <input type="text" class="form-control" id="requirement3" placeholder="Requirement 3" maxlength="200">
                                    </div>

                                    <div class="form-group">
                                        <input type="text" class="form-control" id="requirement4" placeholder="Requirement 4" maxlength="200">
                                    </div>

                                    <div class="form-group">
                                        <input type="text" class="form-control" id="requirement5" placeholder="Requirement 5" maxlength="200">
                                    </div>

                                    <div class="form-group">
                                        <label for="volunteers">Need Volunteers:</label>
                                        <input type="checkbox" class="" id="volunteers" value="1">
                                    </div>

                                    <div class="form-group">
                                        <input type="number" class="form-control" id="volunteers_no" placeholder="Number of Voluteers (at least 1)" min="1" value="1">
                                    </div>

                                    <div class="form-group">
                                        <label for="org_involved">Other Organizations Involved:</label>
                                        <input type="checkbox" class="" id="org_involved" value="1">
                                    </div>

                                    <div id="org_list">
                                        
                                        <div class="form-group">
                                            <label for="org1">Organization (upto 5):</label> <a href="javascript:void(0)" class="btn btn-success btn-sm" id="org_plus"><span class="fa fa-plus"></span></a> <a href="javascript:void(0)" class="btn btn-danger btn-sm" id="org_minus"><span class="fa fa-minus"></span></a>
                                            <input type="text" class="form-control" id="org1" placeholder="Organization 1" maxlength="200">
                                        </div>

                                        <div class="form-group">
                                            <input type="text" class="form-control" id="org2" placeholder="Organization 2" maxlength="200">
                                        </div>

                                        <div class="form-group">
                                            <input type="text" class="form-control" id="org3" placeholder="Organization 3" maxlength="200">
                                        </div>

                                        <div class="form-group">
                                            <input type="text" class="form-control" id="org4" placeholder="Organization 4" maxlength="200">
                                        </div>

                                        <div class="form-group">
                                            <input type="text" class="form-control" id="org5" placeholder="Organization 5" maxlength="200">
                                        </div>   

                                    </div>

                                    <div class="form-group">
                                        <label for="banner_image">Banner Image:</label>
                                        <input type="file" accept="image/*" id="banner_image">
                                    </div>  
                                 
                                    <div class="form-group">
                                        <label for="proposal">Upload Project Proposal:</label>
                                        <input type="file" id="proposal">
                                    </div>

                                    <div class="form-group">
                                        <label for="amount">Video URL <small>(Youtube)</small>:</label>

                                        <input type="url" class="form-control" id="videourl" placeholder="If you have a video about your project">
                                    </div>  
                                                                  
                                    <div class="form-group">
                                        <label for="description">Description:</label>
                                        <textarea class="form-control" name="textarea" rows="10" placeholder="Add detail description of your project"></textarea>
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

    <script>
    $(document).on("ready",function(){
        var requirement2 = $("#requirement2");
        var requirement3 = $("#requirement3");
        var requirement4 = $("#requirement4");
        var requirement5 = $("#requirement5");
        var r2_status = 1;
        var r3_status = 1;
        var r4_status = 1;
        var r5_status = 1;
        
        var org_list = $("#org_list");
        var org2 = $("#org2");
        var org3 = $("#org3");
        var org4 = $("#org4");
        var org5 = $("#org5");
        var o2_status = 1;
        var o3_status = 1;
        var o4_status = 1;
        var o5_status = 1;


        $("#requirement2,#requirement3,#requirement4,#requirement5,#volunteers_no,#org_list").hide();

        $("#btn_plus").on("click",function(){
            if(r5_status){
                if(r4_status){
                    if(r3_status){
                        if(r2_status){
                            requirement2.slideDown();
                            r2_status = 0;            
                        }
                        else{
                            requirement3.slideDown();
                            r3_status = 0;   
                        }
                    }
                    else{
                        requirement4.slideDown();
                        r4_status = 0;
                    }
                }
                else{
                    requirement5.slideDown();
                    r5_status = 0;
                }
            }
        });

        $("#btn_minus").on("click",function(){
            if(!r2_status){
                if(!r3_status){
                    if(!r4_status){
                        if(!r5_status){
                            requirement5.slideUp().val('');
                            r5_status = 1;            
                        }
                        else{
                            requirement4.slideUp().val('');
                            r4_status = 1;   
                        }
                    }
                    else{
                        requirement3.slideUp().val('');
                        r3_status = 1;
                    }
                }
                else{
                    requirement2.slideUp().val('');
                    r2_status = 1;
                }
            }
        });

        $("#volunteers").on("change",function(){
            $("#volunteers_no").slideToggle().val('1');
        });

        $("#org_involved").on("change",function(){
            $("#org2,#org3,#org4,#org5").hide().val('');
            o2_status = o3_status = o4_status = o5_status = 1;
            $("#org1").val('');
            $("#org_list").slideToggle();
        });

        $("#org_plus").on("click",function(){
            if(o5_status){
                if(o4_status){
                    if(o3_status){
                        if(o2_status){
                            org2.slideDown();
                            o2_status = 0;            
                        }
                        else{
                            org3.slideDown();
                            o3_status = 0;   
                        }
                    }
                    else{
                        org4.slideDown();
                        o4_status = 0;
                    }
                }
                else{
                    org5.slideDown();
                    o5_status = 0;
                }
            }
        });

        $("#org_minus").on("click",function(){
            if(!o2_status){
                if(!o3_status){
                    if(!o4_status){
                        if(!o5_status){
                            org5.slideUp().val('');
                            o5_status = 1;            
                        }
                        else{
                            org4.slideUp().val('');
                            o4_status = 1;   
                        }
                    }
                    else{
                        org3.slideUp().val('');
                        o3_status = 1;
                    }
                }
                else{
                    org2.slideUp().val('');
                    o2_status = 1;
                }
            }
        });

    });
    </script>