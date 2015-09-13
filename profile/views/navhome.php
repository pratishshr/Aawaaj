
<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">

<?php include_once(ROOT_PATH."app/view/loginmodal.php"); ?>
<?php include_once(ROOT_PATH."app/view/signupmodal.php"); ?>


 <nav class="navbar navbar-custom navbar-fixed-top" role="navigation" style="background:black;">
        <div class="container ">
            <div class="navbar-header ">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                    <i class="fa fa-bars"></i>
                </button>

                <a class="navbar-brand page-scroll" href="<?php echo BASE_URL?>home/index.php">
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
                        <a class="page-scroll" href="<?php echo BASE_URL.'fundraiser/index.php?page=fund';?>">Start Fundraiser</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#contact">Contact</a>
                    </li>   
                    <li>
                        <a class="page-scroll" href="<?php echo BASE_URL.'search/';?>">Search</a>
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
                    <?php global $session; 
                    $logged = false;
                    if(!$session->isLoggedIn()){ ?>
                    <li>
                        <a class="page-scroll" href="" data-toggle="modal" data-target="#signupModal" id="signup_btn">Sign Up</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="" data-toggle="modal" data-target="#loginModal">Login</a>
                    </li>
                     <?php 
                        }else{ 
                            $logged = true;
                        ?>
                            <li>

                                <a class = "page-scross" href="<?php echo BASE_URL.'profile/index.php?id='.$_SESSION['user_hash']?>">Namaste</a>

                               
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
