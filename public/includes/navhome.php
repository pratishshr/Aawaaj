<?php require_once(ROOT_PATH."database/session.php") ?>
<?php require_once(ROOT_PATH."app/controller/logincontroller.php") ?>
<?php include_once(ROOT_PATH."app/view/loginmodal.php"); ?>
 <?php include_once(ROOT_PATH."app/view/signupmodal.php"); ?>


 <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
        <div class="container ">
            <div class="navbar-header ">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                    <i class="fa fa-bars"></i>
                </button>

                <a class="navbar-brand page-scroll" href="#page-top">
                    <i class="fa fa-play-circle"></i> <span class="light">Aawaaj</span>
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
                        <a class="page-scroll" href="#download">Explore</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#">Start Fundraiser</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#contact">Contact</a>
                    </li>   
                    
                </ul>

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
                            $firstName = $_SESSION['first_name'];
                            ?>
                            <li>
                                <a class = "page-scross" href=""><?php echo "Namaste, " . $firstName; ?></a>
                           </li>
                           <li>
                                <a class = "page-scross" href="<?php echo BASE_URL?>/database/session.php?id=Logout">Logout</a>
                                </li>
                            <?php
                        }?>             
                </ul>
                
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
    