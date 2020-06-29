<!doctype html>
<html lang="en">

<head>
   <!-- Required meta tags -->
   <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="WeThink Studio is an award winning UX Agency with practices spanning User Experience, Mobility, Service Design, Digital Transformation, User Research and Agile UX" />
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/custom.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/owl.carousel.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/owl.theme.default.min.css'); ?>">
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"> -->
    <link rel="apple-touch-icon" sizes="57x57" href="<?php echo base_url('assets/images/favicon/apple-icon-57x57.png'); ?>">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    
     <link rel="stylesheet" href="<?php echo base_url('assets/css/jquery.typeahead.css'); ?>" /> 

    <title>New Adidhi - Job Search Portal</title>
    <!-- new -->
    
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> -->


</head>

<body>

<div class="loader_bg">
    <div class="lds-ripple"><div></div><div></div></div>
</div>
    <div class="header">
        <!--it Visible For Desktop only-->
        <div class="container">
            <a href="index.php"><img src="<?php echo base_url('assets/images/logo.png'); ?>" class="top_logo float-left" style="width:140px;"></a>
            <span class="d-block d-sm-none" style="font-size: 26px; cursor: pointer; float: right; margin-top: 0; line-height: 34px; color: #2d2d2d;" onclick="openNav()">&#9776; </span>
            <ul class="navigation desktop_view">
                <?php if ($this->session->userdata('user_type')==1) {
                    ?>
                    <li><a href="<?php echo base_url('profilecandidate/'); ?>" class="top_nav">Home </a></li>
                    <li><a href="<?php echo base_url('jobsearch/'); ?>" class="top_nav">Find Jobs</a></li>
                    <li><a href="<?php echo base_url('profilecandidate/') ?>" class="top_nav">My Profile</a></li>
                    <li><a href="<?php echo base_url('register/logout'); ?>" class="top_nav">Logout</a></li>
                    <?php
                } else if ($this->session->userdata('user_type')==2) {
                    ?>
                    <li><a href="<?php echo base_url('businessprofile/'); ?>" class="top_nav">Home </a></li>
                    <li><a href="<?php echo base_url('Jobpost/'); ?>" class="top_nav">Post Jobs</a></li>
                    <li><a href="<?php echo base_url('businessprofile/') ?>" class="top_nav">My Profile</a></li>
                    <li><a href="<?php echo base_url('register/logout'); ?>" class="top_nav">Logout</a></li>
                <?php
                }
                ?>                
                
            </ul>
        </div>
    </div>
    <!--================= Navigation End here ====================-->
    <div class="bottom_nav mobile_view">
        <!--It Visible For MOBILE only-->
        <a href="index.php" class="navigate active float-left">
            <span class="icon-home icon_set"></span>
            <span class="font_12">Home</span>
        </a>
        <a href="search.php" class="search_icon">
            <spa class="icon-tools-and-utensils icon_set"></spa>
        </a>
        <a href="order_history.php" class="navigate active float-right">
            <span class="icon-social icon_set"></span>
            <span class="font_12">Booking</span>
        </a>
    </div>