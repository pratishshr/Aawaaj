<?php include_once("config.php"); ?>
<?php include_once(ROOT_PATH."profile/includes/header.php") ?>
    <!-- Navigation -->
<?php include_once(ROOT_PATH."profile/includes/navhome.php") ?>
<?php require_once(ROOT_PATH."database/session.php") ?>   


    <header class="intro">
        <div class="intro-body">
          <div class="container">
        
                <div class="row">
        
                    <div class="col-md-8 col-md-offset-2">
                        <h1 class="brand-heading">ROTARACT</h1>
                        <p class="intro-text">Rotaract ko Moto <br/> Blah Blah Blah</p>
                        <a href="#about" class="btn btn-circle page-scroll">
                            <i class="fa fa-angle-double-down animated"></i>
                        </a>
                    </div>
                </div>
                <a href="#" id="change_cover"class="btn btn-primary pull-right">Change Cover</a>
                
            </div>
        </div>
    </header>

    <!-- About Section -->
    <section id="about" class="content-section text-justify">
        <div class="row">
            <div class="col-lg-10 col-lg-offset-1">
                <h2>ABOUT</h2>
                <p>
                    <div class="row">
                        <div class="col-xs-6 col-md-3">
                            <a href="#" class="thumbnail"><img class="img-responsive" src="images/zzz.png" alt="rtrlogo"></a>
                        </div>
                        <table>
                            <tr>
                                <th>Name of Organization:</th>
                                <td></td>
                            </tr>
                            <tr>
                                <th>DOE:</th>
                                <td></td>
                            </tr>
                            <tr>
                                <th>Slogan:</th>
                                <td></td>
                            </tr>
                        </table>
                    </div>
                    Aawaj is a platform that provides a mean to help the people or different organization who are in need. Aawaj helps connect those people in need with the one who are willing to help. With Aaawaj people who want to do something for others can find different projects or create their own depending oh how they wish to contribute.If you are willing to help or want someone others organization and people/volunteers to back you in your campaign just create your own project and specify all the requirements and description. And if you want to be a part of the projects that are done by some organization that you admire and respect simply subscribe to them and you will be notified of their activities.
                </p>
            </div>
        </div>
    </section>

    <!-- Explore Section -->
    <section id="explore">
        <div class="container">
            <div class="row">
                <div class="watch">
                    <img class="img-responsive" src="images/watch.png" alt="">
                </div>              
                <div class="col-md-4 col-md-offset-2 col-sm-5">
                    <h2>Our next project "Photography training and workshop" starts in</h2>
                    <h4>For more information and registration</h4>
                    <a href="#contact">Click Here<i class="fa fa-angle-right"></i></a>
                </div>              
                <div class="col-sm-7 col-md-6">                 
                    <ul id="countdown">
                        <li>                    
                            <span class="days time-font">00</span>
                            <p>days </p>
                        </li>
                        <li>
                            <span class="hours time-font">00</span>
                            <p class="">hours </p>
                        </li>
                        <li>
                            <span class="minutes time-font">00</span>
                            <p class="">minutes</p>
                        </li>
                        <li>
                            <span class="seconds time-font">00</span>
                            <p class="">seconds</p>
                        </li>               
                    </ul>
                </div>
            </div>
    </section>

    <section id="event">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-9">
                    <div id="event-carousel" class="carousel slide" data-interval="false">
                        <h2 class="heading">Completed/Upcoming projects Projects</h2>
                        <a class="even-control-left" href="#event-carousel" data-slide="prev"><i class="fa fa-angle-left"></i></a>
                        <a class="even-control-right" href="#event-carousel" data-slide="next"><i class="fa fa-angle-right"></i></a>
                        <div class="carousel-inner">
                            <div class="item active">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="single-event">
                                            <img class="img-responsive" src="images/event/work.jpeg" alt="event-image">
                                            <h4>Photography Workshop</h4>
                                            <h5>22 August 2015, Thapathali</h5>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="single-event">
                                            <img class="img-responsive" src="images/event/plantation.jpg" alt="event-image">
                                            <h4>Plantation</h4>
                                            <h5>8 August 2015, Chovar</h5>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="single-event">
                                            <img class="img-responsive" src="images/event/food.jpg" alt="event-image">
                                            <h4>Nutrition Food Project</h4>
                                            <h5>2 August 2015, Dhulikhel</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="single-event">
                                            <img class="img-responsive" src="images/event/event1.jpg" alt="event-image">
                                            <h4>Chester Bennington</h4>
                                            <h5>Vocal</h5>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="single-event">
                                            <img class="img-responsive" src="images/event/event2.jpg" alt="event-image">
                                            <h4>Mike Shinoda</h4>
                                            <h5>vocals, rhythm guitar</h5>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="single-event">
                                            <img class="img-responsive" src="images/event/event3.jpg" alt="event-image">
                                            <h4>Rob Bourdon</h4>
                                            <h5>drums</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="guitar">
                </div>
            </div>          
        </div>
    </section><!--/#event-->
     
    <!-- Contact Section -->

    <section id="contact">
        
        <div class="contact-section">
            <div class="ear-piece">
                <img class="img-responsive" src="images/ear-piece.png" alt="">
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-sm-3 col-sm-offset-4">
                        <div class="contact-text">
                            <h3>Contact</h3>
                            <address>
                                Phone:999999999<br>
                                Rotaract District Nepal <br>
                                R. I. District 3292, Nepal
                            </address>
                        </div>

                    </div>
                    <div class="col-sm-5">
                        <div id="contact-section">
                            <h3>Send a message</h3>
                            <div class="status alert alert-success" style="display: none"></div>
                            <form id="main-contact-form" class="contact-form" name="contact-form" method="post" action="sendemail.php">
                                <div class="form-group">
                                    <input type="text" name="name" class="form-control" required="required" placeholder="Name">
                                </div>
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control" required="required" placeholder="Email ID">
                                </div>
                                <div class="form-group">
                                    <textarea name="message" id="message" required="required" class="form-control" rows="4" placeholder="Enter your message"></textarea>
                                </div>                        
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary pull-right">Send</button>
                                </div>
                            </form>        
                        </div>
                    </div>
                </div>
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
    <script src="<?php echo BASE_URL?>profile/assets/js/jquery.js"></script>
   
        <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo BASE_URL?>profile/assets/js/bootstrap.min.js"></script>
    <script src="<?php echo BASE_URL?>profile/assets/js/main.js"></script>
    <script src="<?php echo BASE_URL?>profile/assets/js/coundown-timer.js"></script>
    <script src="<?php echo BASE_URL?>profile/assets/js/respond.min.js"></script>
    <script src="<?php echo BASE_URL?>profile/assets/js/modernizr.custom.86080.js"></script>

    <!-- Plugin JavaScript -->
    <script src="<?php echo BASE_URL?>profile/assets/js/jquery.easing.min.js"></script>

    
    <!-- Custom Theme JavaScript -->
    <script src="<?php echo BASE_URL?>profile/assets/js/grayscale.js"></script>

</body>

</html>
