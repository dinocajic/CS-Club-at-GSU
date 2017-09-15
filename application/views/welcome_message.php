<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>CS Club at GSU</title>
    <!-- core CSS -->
    <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css"    rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/animate.min.css"      rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/owl.carousel.css"     rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/owl.transitions.css"  rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/prettyPhoto.css"      rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/main.css"             rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/responsive.css"       rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="<?php echo base_url(); ?>assets/js/html5shiv.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/respond.min.js"></script>
    <![endif]-->
    <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/images/ico/favicon.ico">
</head><!--/head-->

<body id="home" class="homepage">

<header id="top-header" class="navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <!-- responsive nav button -->
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <!-- /responsive nav button -->

            <!-- logo -->
            <div class="navbar-brand">
                <a class="smooth-scroll" data-section="#home" href="#home" >
                    <img src="<?php echo base_url(); ?>assets/images/logo.png" alt="">
                </a>
            </div>
            <!-- /logo -->
        </div>

        <!-- main nav -->
        <nav class="collapse navbar-collapse navbar-right" role="navigation">
            <div class="main-menu">
                <ul id="nav" class="nav navbar-nav">
                    <li class="scroll"><a href="#home" data-section="#home">Home</a></li>
                    <li class="scroll"><a href="#about" data-section="#about">About</a></li>
                    <li class="scroll"><a href="#features" data-section="#features">Highlights</a></li>
                    <li class="scroll"><a href="#services" data-section="#services">Learning</a></li>
                    <li class="scroll"><a href="#portfolio" data-section="#portfolio">Portfolio</a></li>
                    <li class="scroll"><a href="#contact-area" data-section="#contact-area">Contact</a></li>
                </ul>
            </div>
        </nav>
        <!-- /main nav -->

    </div>
</header>

<section id="main-slider">
    <div class="owl-carousel">
        <div class="item" style="background-image: url(<?php echo base_url(); ?>assets/images/slider/bg1.jpg);">
            <div class="slider-inner">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="carousel-content text-center">
                                <h2>Computer Science Club at <span>Georgia State University</span>.</h2>
                                <p>This is the official Computer Science Club of Georgia State University.</p>
                                <a class="btn btn-primary btn-lg" href="#">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/.item-->
        <div class="item" style="background-image: url(<?php echo base_url(); ?>assets/images/slider/bg2.jpg);">
            <div class="slider-inner">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="carousel-content text-center">

                                <h2>Check out the portfolio's of our <span>active members</span>.</h2>
                                <p>We encourage our members to participate in Club activities which are designed to get students acquainted with technologies in the workplace. </p>
                                <a class="btn btn-primary btn-lg" href="#">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/.item-->
        <div class="item" style="background-image: url(<?php echo base_url(); ?>assets/images/slider/bg3.jpg);">
            <div class="slider-inner">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="carousel-content text-center">
                                <h2>Are you a GSU CS student? <span>Join the club</span>.</h2>
                                <p>Join the club to gain valuable experience in the workforce. See the project section for all we do. </p>
                                <a class="btn btn-primary btn-lg" href="#">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/.item-->

    </div><!--/.owl-carousel-->
</section><!--/#main-slider-->

<section id="about">
    <div class="container">

        <div class="section-header">
            <h2 class="section-title text-center wow fadeInDown">WELCOME TO THE CLUB</h2>
            <p class="text-center wow fadeInDown">The main purpose of the Computer Science Club is to get individuals excited about their discipline. Each CS club member has more knowledge than others in a particular area. We want to make sure that our knowledge is combined and that we have a close network of people that we can turn to when concepts need further explanation.</p>
        </div>

        <div class="row">


            <div class="col-sm-6 wow fadeInRight">
                <h3 class="column-title">A Little More About Us</h3>
                <p>Motivated and active participants are key when striving to accomplish the goals of the CS Club. People in the industry are also highly relevant.</p>

                <p>We have people in the industry that are providing constant feedback to our members. They're introducing technologies that are used currently in the workforce and are mentoring students preparing them for success after graduation.</p>

                <a class="btn btn-primary" href="#">Discover Us</a>

            </div>
            <div class="col-sm-6 wow fadeInLeft">
                <img class="img-responsive" src="<?php echo base_url(); ?>assets/images/feature-2.png" alt="">
            </div>
        </div>
    </div>
</section><!--/#about-->



<section id="features">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title text-center wow fadeInDown">Highlights</h2>
            <p class="text-center wow fadeInDown">All of our members receive exposure to numerous concepts. <br /> Here are a few that we emphasize that are outside of the programming scope.</p>
        </div>
        <div class="row">
            <div class="col-sm-6 wow fadeInLeft">
                <img class="img-responsive" src="<?php echo base_url(); ?>assets/images/main-feature.png" alt="">
            </div>
            <div class="col-sm-6">
                <div class="media service-box wow fadeInRight">
                    <div class="pull-left">
                        <i class="fa fa-line-chart"></i>
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading">UX design</h4>
                        <p>Good UX is in high demand, especially when Google rewards those websites that have it.</p>
                    </div>
                </div>

                <div class="media service-box wow fadeInRight">
                    <div class="pull-left">
                        <i class="fa fa-cubes"></i>
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading">UI design</h4>
                        <p>Not only should you produce quality code, but you should take the time to optimize the visual elements.</p>
                    </div>
                </div>

                <div class="media service-box wow fadeInRight">
                    <div class="pull-left">
                        <i class="fa fa-pie-chart"></i>
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading">SEO Services</h4>
                        <p>Programmers need to know that even though some online features make sense, it doesn't for SEO.</p>
                    </div>
                </div>

                <div class="media service-box wow fadeInRight">
                    <div class="pull-left">
                        <i class="fa fa-scissors"></i>
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading">Tools</h4>
                        <p>You'll quickly see that an IDE and programming knowledge is not enough. We help members get acquainted with the tools most commonly used.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="cta2">
    <div class="container">
        <div class="text-center">
            <h2 class="wow fadeInUp" data-wow-duration="300ms" data-wow-delay="0ms">CHECK OUT OUR <span>LATEST PROJECT</span></h2>
            <p class="wow fadeInUp" data-wow-duration="300ms" data-wow-delay="100ms">The Computer Science Club website jus got a major overhaul. <br />Read about the process and meet the team involved.</p>
            <p class="wow fadeInUp" data-wow-duration="300ms" data-wow-delay="200ms"><a class="btn btn-primary btn-lg" href="#">Check it out</a></p>
        </div>
    </div>
</section>

<section id="services" >
    <div class="container">

        <div class="section-header">
            <h2 class="section-title text-center wow fadeInDown">Learning</h2>
            <p class="text-center wow fadeInDown">We're here to learn. GSU does a great job with introducing students to numerous disciplines; <br>We're here to expand the learning process and help guide students after they graduate.</p>
        </div>

        <div class="row">
            <div class="features">
                <div class="col-sm-6 col-md-3 col-lg-3 wow fadeInUp" data-wow-duration="300ms" data-wow-delay="0ms">
                    <div class="features-item">
                        <div class="features-icon">
                            <i class="fa fa-bicycle"></i>
                        </div>
                        <h3 class="features-title font-alt">PHP</h3>
                        A programming language suited for web development; we focus on Object Oriented principles and PHP MVC frameworks.
                    </div>
                </div>

                <div class="col-sm-6 col-md-3 col-lg-3 wow fadeInUp" data-wow-duration="300ms" data-wow-delay="100ms">
                    <div class="features-item">
                        <div class="features-icon">
                            <i class="fa fa-cubes"></i>
                        </div>
                        <h3 class="features-title font-alt">C#</h3>
                        A programming language that is designed for building a variety of applications that run on the .NET Framework.
                    </div>
                </div>

                <div class="col-sm-6 col-md-3 col-lg-3 wow fadeInUp" data-wow-duration="300ms" data-wow-delay="200ms">
                    <div class="features-item">
                        <div class="features-icon">
                            <i class="fa fa-connectdevelop"></i>
                        </div>
                        <h3 class="features-title font-alt">JavaScript</h3>
                        A high-level, object-based, multi-paradigm, and interpreted programming language. We focus on jQuery, Angular and Node.
                    </div>
                </div>

                <div class="col-sm-6 col-md-3 col-lg-3 wow fadeInUp" data-wow-duration="300ms" data-wow-delay="300ms">
                    <div class="features-item">
                        <div class="features-icon">
                            <i class="fa  fa-diamond"></i>
                        </div>
                        <h3 class="features-title font-alt">HTML5</h3>
                        Introduces markup and application programming interfaces (APIs) for complex, mobile-friendly, web-apps.
                    </div>
                </div>

                <div class="col-sm-6 col-md-3 col-lg-3 wow fadeInUp" data-wow-duration="300ms" data-wow-delay="400ms">
                    <div class="features-item">
                        <div class="features-icon">
                            <i class="fa fa-user-secret"></i>
                        </div>
                        <h3 class="features-title font-alt">CSS3</h3>
                        A style sheet language used for describing the presentation of a document written in a markup language.
                    </div>
                </div>

                <div class="col-sm-6 col-md-3 col-lg-3 wow fadeInUp" data-wow-duration="300ms" data-wow-delay="500ms">
                    <div class="features-item">
                        <div class="features-icon">
                            <i class="fa fa-key"></i>
                        </div>
                        <h3 class="features-title font-alt">Java</h3>
                        With it being the number one used language in the world, you bet we'll cover Java related learning.
                    </div>
                </div>

                <div class="col-sm-6 col-md-3 col-lg-3 wow fadeInUp" data-wow-duration="300ms" data-wow-delay="600ms">
                    <div class="features-item">
                        <div class="features-icon">
                            <i class="fa fa-laptop"></i>
                        </div>
                        <h3 class="features-title font-alt">C</h3>
                        Learning C expands your capabilities in learning other programming languages; it's still widely used.
                    </div>
                </div>

                <div class="col-sm-6 col-md-3 col-lg-3 wow fadeInUp" data-wow-duration="300ms" data-wow-delay="700ms">
                    <div class="features-item">
                        <div class="features-icon">
                            <i class="fa fa-paw"></i>
                        </div>
                        <h3 class="features-title font-alt">Python</h3>
                        Python is fast, powerful, plays well with others, runs everywhere, is easy to learn and is open-source.
                    </div>
                </div>

            </div>
        </div><!--/.row-->
    </div><!--/.container-->
</section><!--/#services-->

<section id="portfolio">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title text-center wow fadeInDown">Our Works</h2>
            <p class="text-center wow fadeInDown">We like showing off our member's portfolio items. <br> Check out the latest below.</p>
        </div>

        <div class="text-center">
            <ul class="portfolio-filter">
                <li><a class="active" href="#" data-filter="*">All Works</a></li>
                <li><a href="#" data-filter=".animation">Websites</a></li>
                <li><a href="#" data-filter=".Business">Desktop Applications</a></li>
                <li><a href="#" data-filter=".art">Just interesting</a></li>
            </ul><!--/#portfolio-filter-->
        </div>

        <div class="portfolio-items">
            <div class="portfolio-item animation">
                <div class="portfolio-item-inner">
                    <img class="img-responsive" src="<?php echo base_url(); ?>assets/images/portfolio/01.jpg" alt="">
                    <div class="portfolio-info">
                        <h3>Java Bookstore</h3>
                        <a class="preview" href="<?php echo base_url(); ?>assets/images/portfolio/full.jpg" rel="prettyPhoto">
                            <img src="<?php echo base_url(); ?>assets/images/portfolio/expand.png" alt="">
                        </a>
                    </div>
                </div>
            </div><!--/.portfolio-item-->


            <div class="portfolio-item Business art">
                <div class="portfolio-item-inner">
                    <img class="img-responsive" src="<?php echo base_url(); ?>assets/images/portfolio/02.jpg" alt="">
                    <div class="portfolio-info">
                        <h3>Bash Crawler</h3>
                        <a class="preview" href="<?php echo base_url(); ?>assets/images/portfolio/full.jpg" rel="prettyPhoto">
                            <img src="<?php echo base_url(); ?>assets/images/portfolio/expand.png" alt="">
                        </a>
                    </div>
                </div>
            </div><!--/.portfolio-item-->

            <div class="portfolio-item animation">
                <div class="portfolio-item-inner">
                    <img class="img-responsive" src="<?php echo base_url(); ?>assets/images/portfolio/03.jpg" alt="">
                    <div class="portfolio-info">
                        <h3>Java Crawler</h3>
                        <a class="preview" href="<?php echo base_url(); ?>assets/images/portfolio/full.jpg" rel="prettyPhoto">
                            <img src="<?php echo base_url(); ?>assets/images/portfolio/expand.png" alt="">

                        </a>
                    </div>
                </div>
            </div><!--/.portfolio-item-->

            <div class="portfolio-item Business">
                <div class="portfolio-item-inner">
                    <img class="img-responsive" src="<?php echo base_url(); ?>assets/images/portfolio/04.jpg" alt="">
                    <div class="portfolio-info">
                        <h3>PHP Super Mario</h3>
                        <a class="preview" href="<?php echo base_url(); ?>assets/images/portfolio/full.jpg" rel="prettyPhoto">
                            <img src="<?php echo base_url(); ?>assets/images/portfolio/expand.png" alt="">

                        </a>
                    </div>
                </div>
            </div><!--/.portfolio-item-->

            <div class="portfolio-item animation art">
                <div class="portfolio-item-inner">
                    <img class="img-responsive" src="<?php echo base_url(); ?>assets/images/portfolio/05.jpg" alt="">
                    <div class="portfolio-info">
                        <h3>Programmer Portfolio</h3>
                        <a class="preview" href="<?php echo base_url(); ?>assets/images/portfolio/full.jpg" rel="prettyPhoto">
                            <img src="<?php echo base_url(); ?>assets/images/portfolio/expand.png" alt="">

                        </a>
                    </div>
                </div>
            </div><!--/.portfolio-item-->

            <div class="portfolio-item Business">
                <div class="portfolio-item-inner">
                    <img class="img-responsive" src="<?php echo base_url(); ?>assets/images/portfolio/06.jpg" alt="">
                    <div class="portfolio-info">
                        <h3>Lawyer PHP Website</h3>
                        <a class="preview" href="<?php echo base_url(); ?>assets/images/portfolio/full.jpg" rel="prettyPhoto">
                            <img src="<?php echo base_url(); ?>assets/images/portfolio/expand.png" alt="">

                        </a>
                    </div>
                </div>
            </div><!--/.portfolio-item-->

            <div class="portfolio-item animation art">
                <div class="portfolio-item-inner">
                    <img class="img-responsive" src="<?php echo base_url(); ?>assets/images/portfolio/07.jpg" alt="">
                    <div class="portfolio-info">
                        <h3>Body Shop HTML Site</h3>
                        <a class="preview" href="<?php echo base_url(); ?>assets/images/portfolio/full.jpg" rel="prettyPhoto">
                            <img src="<?php echo base_url(); ?>assets/images/portfolio/expand.png" alt="">

                        </a>
                    </div>
                </div>
            </div><!--/.portfolio-item-->

            <div class="portfolio-item Business">
                <div class="portfolio-item-inner">
                    <img class="img-responsive" src="<?php echo base_url(); ?>assets/images/portfolio/08.jpg" alt="">
                    <div class="portfolio-info">
                        <h3>A/C Service HTML Site</h3>
                        <a class="preview" href="<?php echo base_url(); ?>assets/images/portfolio/full.jpg" rel="prettyPhoto">
                            <img src="<?php echo base_url(); ?>assets/images/portfolio/expand.png" alt="">

                        </a>
                    </div>
                </div>
            </div><!--/.portfolio-item-->

            <div class="portfolio-item Business">
                <div class="portfolio-item-inner">
                    <img class="img-responsive" src="<?php echo base_url(); ?>assets/images/portfolio/09.jpg" alt="">
                    <div class="portfolio-info">
                        <h3>Painting HTML Site</h3>
                        <a class="preview" href="<?php echo base_url(); ?>assets/images/portfolio/full.jpg" rel="prettyPhoto">
                            <img src="<?php echo base_url(); ?>assets/images/portfolio/expand.png" alt="">

                        </a>
                    </div>
                </div>
            </div><!--/.portfolio-item-->
        </div>
    </div><!--/.container-->
</section><!--/#portfolio-->







<section id="testimonial">
    <div class="container">
        <div class="row">
            <div class="col-sm-8 col-sm-offset-2">

                <div id="carousel-testimonial" class="carousel slide text-center" data-ride="carousel">
                    <!-- Wrapper for slides -->
                    <div class="carousel-inner" role="listbox">
                        <div class="item active">
                            <p><img class="img-circle img-thumbnail" src="<?php echo base_url(); ?>assets/images/testimonial/01.jpg" alt=""></p>
                            <h4>Dino Cajic</h4>
                            <small>President of the Computer Science Club</small>
                            <p>We're excited to see you're interested. Join the club: our goal is to increase the overall enjoyment in obtaining a Computer Science degree.</p>
                        </div>
                        <div class="item">
                            <p><img class="img-circle img-thumbnail" src="<?php echo base_url(); ?>assets/images/testimonial/02.jpg" alt=""></p>
                            <h4>Dr. Michael Weeks</h4>
                            <small>Faculty Adviser to the Computer Science Club</small>
                            <p>Some interesting quote/saying from Dr. Weeks.</p>
                        </div>
                    </div>

                    <!-- Controls -->
                    <div class="btns">
                        <a class="btn btn-primary btn-sm" href="#carousel-testimonial" role="button" data-slide="prev">
                            <span class="fa fa-angle-left" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="btn btn-primary btn-sm" href="#carousel-testimonial" role="button" data-slide="next">
                            <span class="fa fa-angle-right" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section><!--/#testimonial-->





<section id="contact-area">
    <div class="container">
        <div class="row">
            <div class="section-header">
                <h2 class="section-title text-center wow fadeInDown animated" style="visibility: visible;">Send Message</h2>
                <p class="text-center wow fadeInDown animated" style="visibility: visible;">Drop a line to us. Your word is most important to us.</p>
            </div>
            <form id="main-contact-form" name="contact-form" method="post" action="#">
                <div class="col-lg-6 animated animate-from-left" style="opacity: 1; left: 0px;">

                    <div class="form-group">
                        <label for="name">Your Name (Required)</label>
                        <input id="name" type="text" name="name" class="form-control" placeholder="Name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <input type="email" id="email" name="email" class="form-control" placeholder="Email" required>
                    </div>
                    <div class="form-group">
                        <label for="subject">Subject</label>
                        <input type="text" id="subject" name="subject" class="form-control" placeholder="Subject" required>
                    </div>

                </div>
                <div class="col-lg-6 animated animate-from-right" style="opacity: 1; right: 0px;">
                    <div class="form-group">
                        <label for="message">Your Message</label>
                        <textarea name="message" id="message" class="form-control" rows="8" placeholder="Message" required></textarea>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="text-center">

                    <button type="submit" class="btn btn-primary btn-lg btn-send-msg">Send Message</button>

                </div>

            </form>

        </div>
    </div>
</section><!--/#bottom-->

<footer id="footer">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <p class="text-center">
                    &copy; 2017 Computer Science Club at Georgia State University
                </p>

                <ul class="social-icons text-center">
                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                    <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                    <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
</footer><!--/#footer-->

<script src="<?php echo base_url(); ?>assets/js/jquery.js"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/owl.carousel.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/mousescroll.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.prettyPhoto.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.isotope.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.inview.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/wow.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/main.js"></script>
</body>
</html>