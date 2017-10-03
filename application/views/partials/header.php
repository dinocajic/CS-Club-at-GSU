<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @contributor Dino Cajic (dinocajic@gmail.com)
 */

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php echo $description; ?>">
    <meta name="author" content="CS Club at Georgia State University">
    <title><?php echo $title; ?></title>
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

    <?php
    // If additional headers, such as stylesheets, are needed
    if (isset($additional_headers)) {
        echo $additional_headers;
    }
    ?>
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