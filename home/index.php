<?php require_once ($_SERVER['DOCUMENT_ROOT']."/aawaaj/config/config.php"); ?>
<?php include_once(PUBLIC_PATH."/includes/header.php") ?>
    <!-- Navigation -->
<?php include_once(PUBLIC_PATH."/includes/navhome.php") ?>
<?php require_once(ROOT_PATH."database/session.php") ?>   

    <!-- Intro Header -->
    <header class="intro">
        <div class="intro-body">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <h1 class="brand-heading">AAWAAJ</h1>
                        <p class="intro-text">Connecting those in need with the ones <br/> who are willing to help.</p>
                        <a href="#about" class="btn btn-circle page-scroll">
                            <i class="fa fa-angle-double-down animated"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- About Section -->
    <section id="about" class="container content-section text-center">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <h2>ABOUT</h2>
                <p>
                    Aawaj is a platform that provides a mean to help the people or different organization who are in need. Aawaj helps connect those people in need with the one who are willing to help. With Aaawaj people who want to do something for others can find different projects or create their own depending oh how they wish to contribute.If you are willing to help or want someone others organization and people/volunteers to back you in your campaign just create your own project and specify all the requirements and description. And if you want to be a part of the projects that are done by some organization that you admire and respect simply subscribe to them and you will be notified of their activities.
                </p>
            </div>
        </div>
    </section>

    <!-- Explore Section -->
    <section id="download" class="container content-section text-center">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <h2>EXPLORE</h2>
                 <div class="row">
                    <div class="col-md-6">
                        <a href="#" class="thumbnail">
                            <img class="img-responsive" src="<?php echo PUBLIC_PATH2?>/assets/img/thumb1.jpg" alt="">
                        </a>
                        <h3>
                            <a href="#">Project Name</a>
                        </h3>
                        <p>This is a project on something that helps someone and gets something something. This is a project on something that helps someone and gets something something. This is a project on something that helps someone and gets something something. This is a project on something that helps someone and gets something something.</p>
                    </div>
                    <div class="col-md-6">
                        <a href="#" class="thumbnail">
                            <img class="img-responsive" src="<?php echo PUBLIC_PATH2?>/assets/img/thumb2.jpg" alt="">
                        </a>
                        <h3>
                            <a href="#">Project Name</a>
                        </h3>
                        <p>This is a project on something that helps someone and gets something something. This is a project on something that helps someone and gets something something. This is a project on something that helps someone and gets something something. This is a project on something that helps someone and gets something something.</p>
                    </div>
                   
                </div>
               
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="container content-section text-center">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <h2>CONTACT US</h2>
                <p>Feel free to email us to provide some feedback, or to just say hello!</p>
                <p><a href="mailto:aawaaj@live.com">aawaaj@live.com</a>
                </p>
                <ul class="list-inline banner-social-buttons">
                    <li>
                        <a href="https://twitter.com/" class="btn btn-default btn-lg"><i class="fa fa-twitter fa-fw"></i> <span class="network-name">Twitter</span></a>
                    </li>
                   
                    <li>
                        <a href="https://plus.google.com/" class="btn btn-default btn-lg"><i class="fa fa-google-plus fa-fw"></i> <span class="network-name">Google+</span></a>
                    </li>
                    <li>
                        <a href="https://facebook.com/" class="btn btn-default btn-lg"><i class="fa fa-facebook fa-fw"></i> <span class="network-name">Facebook</span></a>
                    </li>
                </ul>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="container text-center">
            <p>Copyright &copy; Aawaaj 2015</p>
        </div>
    </footer>

    <!-- jQuery -->
    <script src="<?php echo PUBLIC_PATH2?>/assets/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo PUBLIC_PATH2?>/assets/js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="<?php echo PUBLIC_PATH2?>/assets/js/jquery.easing.min.js"></script>

    
    <!-- Custom Theme JavaScript -->
    <script src="<?php echo PUBLIC_PATH2?>/assets/js/grayscale.js"></script>

</body>

</html>
