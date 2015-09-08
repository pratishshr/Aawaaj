<div class="container black-color">
    <div class="row">
        <div class="container-fluid">
         <div class="well profile">
            <div class="col-sm-12">
                <div class="col-xs-12 col-sm-8">
                    <h2><?=$data['first_name'].' '.$data['last_name']?></h2>
                    <h4><kbd><?=$data['user_type']?></kbd></h4>
                    <p><strong>About: </strong></p>
                    <p class="text-justify"><?=$data['about']?></p>
                </div>             
                <div class="col-xs-12 col-sm-4 text-center">
                    <figure>
                        <img src="<?=BASE_URL.'/home/pictures/profile/'.$data['profile_photo']?>" alt="" class="img-responsive">
                    </figure>
                </div>
            </div>            
            <div class="col-xs-12 divider text-center">
                <div class="col-xs-12 col-sm-4 emphasis">
                    <h2><strong> 20,7K </strong></h2>                    
                    <p><small>Projects</small></p>
                    <button class="btn btn-danger btn-block">View Projects</button>
                </div>
                <div class="col-xs-12 col-sm-4 emphasis">
                    <h2><strong>245</strong></h2>                    
                    <p><small>Following</small></p>
                    <button class="btn btn-info btn-block"><span class="fa fa-user"></span> View Profile </button>
                </div>
                <div class="col-xs-12 col-sm-4 emphasis">
                    <h2><strong>43</strong></h2>                    
                    <p><small>Snippets</small></p>
                    <div class="btn-group dropup btn-block">
                      <button type="button" class="btn btn-primary"><span class="fa fa-gear"></span> Options </button>
                      <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                        <span class="caret"></span>
                        <span class="sr-only">Toggle Dropdown</span>
                      </button>
                      <ul class="dropdown-menu text-left" role="menu">
                        <li><a href="#"><span class="fa fa-envelope pull-right"></span> Send an email </a></li>
                        <li><a href="#"><span class="fa fa-list pull-right"></span> Add or remove from a list  </a></li>
                        <li class="divider"></li>
                        <li><a href="#"><span class="fa fa-warning pull-right"></span>Report this user for spam</a></li>
                        <li class="divider"></li>
                        <li><a href="#" class="btn disabled" role="button"> Unfollow </a></li>
                      </ul>
                    </div>
                </div>
            </div>
         </div>                 
        </div>
    </div>
</div>