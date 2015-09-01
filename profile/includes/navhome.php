<?php require_once(ROOT_PATH."database/session.php") ?>
<?php require_once(ROOT_PATH."app/controller/logincontroller.php") ?>
 <?php include_once(ROOT_PATH."app/view/loginmodal.php"); ?>
 <?php include_once(ROOT_PATH."app/view/signupmodal.php"); ?>


 <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
        <div class="container ">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                    <i class="fa fa-bars"></i>
                </button>

                <a class="navbar-brand page-scroll" href="<?php echo BASE_URL?>public">
                    <i class="fa fa-play-circle"></i> Aawaaj
                </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-left navbar-main-collapse">
                <ul class="nav navbar-nav">
                    <!-- Hidden li included to remove active class from about link when scrolled up past about section -->
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#about">About</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#explore">Explore</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#event">Events</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#contact">Contact</a>
                    </li>   
                    
                </ul>
                  <form class="navbar-form navbar-left" name="form1" action="<?php echo BASE_URL?>app/view/search.php" method="post" role="search">
                 <div class="form-group">
                    <input style="background:none; opacity=0.5; color:white;" type="text" class="form-control" id="subb" name="search" placeholder="Search" required>
                </div>
                 <script>
                         $(document).ready(function(){
                         var elements = document.getElementsByTagName("INPUT");
                         for (var i = 0; i < elements.length; i++){
                         elements[i].oninvalid = function(e){
                         e.target.setCustomValidity("");
                         if (!e.target.validity.valid){
                            e.target.setCustomValidity("Enter a Value");
                         }
                         };
                         elements[i].oninput = function(e){
                         e.target.setCustomValidity("");
        };
    }                
    })
    
                     </script>
            </div>
           
    <!-- Sign up / Login -->
            <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
                <ul class="nav navbar-nav">
                    <!-- Hidden li included to remove active class from about link when scrolled up past about section -->
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <?php global $session; if(!$session->isLoggedIn()){ ?>
                    <li>
                        <a class="page-scroll" href="" data-toggle="modal" data-target="#signupModal">Sign Up</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="" data-toggle="modal" data-target="#loginModal">Login</a>
                    </li>
                     <?php 
                        }else{ 
                            ?>
                            <li>
                                <a class = "page-scross" id="username_btn" href="<?php echo BASE_URL?>profile/index.php">Namaste</a>
                                  
                           </li>
                           <li>
                                <a class = "page-scross" href="<?php echo BASE_URL?>database/session.php?id=Logout">Logout</a>
                                </li>
                            <?php
                        }?>             
                </ul>
                
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav> 
<script>
    $("#username_btn").on("mouseover",function(){
        $(this).html("Edit Profile");
    });
    $("#username_btn").on("mouseleave",function(){
        $(this).html("<?php echo "Namaste"?>");
    });

</script>
