<?php
$user_type=$data['user_type'];
$user_profile = false;
if($logged && $_SESSION['user_hash'] == $data['user_hash']){
    $user_profile = true;
}
?>
<div class="container black-color">
    <div class="row">
        <div class="container-fluid">
         <div class="well profile">
            <div class="col-sm-12">
                <div class="col-xs-12 col-sm-8">
                    <h2><?php
                            if($user_type == "generalUser"){
                                echo $data['first_name'].' '.$data['last_name'];
                            }
                            else{
                                echo $data['name'];
                            }
                        ?>
                    </h2>
                    <h4><kbd><?=$data['user_type']?></kbd></h4>
                    <p><strong>About: </strong></p>
                    <p class="text-justify"><?=$data['about']?></p>
                </div>             
                <div class="col-xs-12 col-sm-4 text-center">
                    <figure>
                        <img src="<?=BASE_URL.'/home/pictures/profile/'.$data['profile_photo']?>" alt="" class="img-responsive img-circle img-thumbnail profile-picture">
                    </figure>
                </div>
            </div>            
            <div class="col-xs-12 divider text-center">
               
                <?php
                    // FIRST MODULE - FOR LOGGED IN USER
                    if($logged && $user_profile){
                        if($user_type == "generalUser"){
                ?>
                            <div class="col-xs-12 col-sm-4 emphasis">
                                <h2><strong> 20,7K </strong></h2>                    
                                <p><small>Fundraisers</small></p>
                                <a href="<?php echo BASE_URL.'/profile/index.php?id='.$_SESSION['user_hash'].'&page=fundraisers'?>" class="btn btn-primary btn-block">View Fundraisers</a> 
                            </div>
                <?php
                        }
                        elseif($user_type == "organization") {
                ?>
                            <div class="col-xs-12 col-sm-4 emphasis">
                                <h2><strong>43</strong></h2>                    
                                <p><small>Projects</small></p>
                                <div class="btn-group dropup btn-block">
                                  <a href="javascript:void(0)" type="button" class="btn btn-primary btn-block dropdown-toggle" data-toggle="dropdown"> Projects </button>
                                    <span class="caret"></span>
                                    <span class="sr-only">Toggle Dropdown</span>
                                  </a href="#">
                                  <ul class="dropdown-menu text-center" role="menu">
                                    <li class="btn btn-block"><a href="<?php echo BASE_URL.'/profile/index.php?id='.$_SESSION['user_hash'].'&page=projects&m=add'?>"> Add Project </a></li>
                                    <li class="divider"></li>
                                    <li class="btn btn-block"><a href="<?php echo BASE_URL.'/profile/index.php?id='.$_SESSION['user_hash'].'&page=projects'?>"> View Projects </a></li>
                                </ul>
                                </div>
                            </div>
                <?php
                        }
                        elseif($user_type == "welfare"){
                ?>
                            <div class="col-xs-12 col-sm-4 emphasis">
                                <h2><strong>43</strong></h2>                    
                                <p><small>Projects</small></p>
                                <div class="btn-group dropup btn-block">
                                  <a href="javascript:void(0)" type="button" class="btn btn-primary btn-block dropdown-toggle" data-toggle="dropdown"> Requirements </button>
                                    <span class="caret"></span>
                                    <span class="sr-only">Toggle Dropdown</span>
                                  </a href="#">
                                  <ul class="dropdown-menu text-center" role="menu">
                                    <li class="btn btn-block"><a href="<?php echo BASE_URL.'/profile/index.php?id='.$_SESSION['user_hash'].'&page=requirements&m=add'?>"> Add Requirement </a></li>
                                    <li class="divider"></li>
                                    <li class="btn btn-block"><a href="<?php echo BASE_URL.'/profile/index.php?id='.$_SESSION['user_hash'].'&page=requirements'?>"> View Requirements </a></li>
                                </ul>
                                </div>
                            </div>
                <?php  
                        }
                    }
                    else{
                        // else for first block
                        if($user_type == "generalUser"){
                ?>
                            <div class="col-xs-12 col-sm-4 emphasis">
                            </div>
                <?php
                        }
                        elseif($user_type == "organization"){
                ?>
                        <div class="col-xs-12 col-sm-4 emphasis">
                            <h2><strong> 20,7K </strong></h2>                    
                            <p><small>Projects</small></p>
                            <a href="<?php echo BASE_URL.'/profile/index.php?id='.$data['user_hash'].'&page=projects'?>" class="btn btn-primary btn-block">View Projects</a> 
                        </div>
                <?php
                        }
                        elseif($user_type == "welfare"){
                ?>
                        <div class="col-xs-12 col-sm-4 emphasis">
                            <h2><strong> 20,7K </strong></h2>                    
                            <p><small>Requirements</small></p>
                            <a href="<?php echo BASE_URL.'/profile/index.php?id='.$data['user_hash'].'&page=requirements'?>" class="btn btn-primary btn-block">View Requirements</a> 
                        </div>
                <?php
                        }
                    }
                ?>

                <?php
                    // SECOND MODULE - FOR LOGGED IN USER
                    if($logged && $user_profile){
                        if($user_type == "generalUser"){
                ?>
                            <div class="col-xs-12 col-sm-4 emphasis">
                                <h2><strong> 20,7K </strong></h2>                    
                                <p><small>Fundraisers</small></p>
                                <a href="<?php echo BASE_URL.'/fundraiser/index.php?page=fund'?>" class="btn btn-danger btn-block">Start Fundraiser</a> 
                            </div>
                <?php
                        }
                        elseif($user_type == "organization" || $user_type == "welfare") {
                ?>
                            <div class="col-xs-12 col-sm-4 emphasis">
                                <h2><strong>43</strong></h2>                    
                                <p><small>Fundraisers</small></p>
                                <div class="btn-group dropup btn-block">
                                  <a href="javascript:void(0)" type="button" class="btn btn-danger btn-block dropdown-toggle" data-toggle="dropdown"> Fundraisers </button>
                                    <span class="caret"></span>
                                    <span class="sr-only">Toggle Dropdown</span>
                                  </a href="#">
                                  <ul class="dropdown-menu text-center" role="menu">
                                    <li class="btn btn-block"><a href="<?php echo BASE_URL.'/fundraiser/index.php?page=fund'?>"> Start Fundraiser </a></li>
                                    <li class="divider"></li>
                                    <li class="btn btn-block"><a href="<?php echo BASE_URL.'/profile/index.php?id='.$_SESSION['user_hash'].'&page=fundraisers'?>"> View Fundraisers </a></li>
                                </ul>
                                </div>
                            </div>
                <?php  
                        }
                    }
                    else{
                        // else for second block
                        if($user_type == "generalUser"){
                ?>
                            <div class="col-xs-12 col-sm-4 emphasis">
                                <h2><strong> 20,7K </strong></h2>                    
                                <p><small>Fundraisers</small></p>
                                <a href="<?php echo BASE_URL.'/profile/index.php?id='.$_SESSION['user_hash'].'&page=fundraisers'?>" class="btn btn-primary btn-block">View Fundraisers</a> 
                            </div>
                <?php
                        }
                    }
                ?>
                
                <?php
                    // THIRD MODULE - FOR LOGGED IN USER
                    if($logged && $user_profile){
                ?>
                        <div class="col-xs-12 col-sm-4 emphasis">
                            <h2><strong> 20,7K </strong></h2>                    
                            <p><small>Fundraisers</small></p>
                            <a href="<?php echo BASE_URL.'/profile/index.php?id='.$_SESSION['user_hash'].'&m=edit'?>" class="btn btn-info btn-block">Edit Profile</a> 
                        </div>
                <?php  
                    }
                    else{
                        // else for second block
                    }
                ?>

              
            </div>
         </div>                 
        </div>
    </div>
</div>