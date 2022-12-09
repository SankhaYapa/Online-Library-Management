<?php
session_start();
error_reporting(0);
include('includes/config.php');

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Online Library Management System | </title>
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME STYLE  -->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="assets/css/style.css" rel="stylesheet" />
    <!-- GOOGLE FONT -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

</head>

<body>
    <!------MENU SECTION START-->
    <?php include('includes/header.php');?>
    <!-- MENU SECTION END-->
    <div class="content-wrapper">
        <div class="container">
            <div class="row pad-botm">
                <div class="col-md-12">


                    <!-- Slideer -->

                    <div class="row">

                        <div class="col-md-12">
                            <div id="carousel-example" class="carousel slide slide-bdr" data-ride="carousel">

                                <div class="imgslide carousel-inner">
                                    <div class="item active">

                                        <img class="imgslide" src="assets/img/001.jpg" alt="" />

                                    </div>
                                    <div class="item">
                                        <img class="imgslide" src="assets/img/002.jpg" alt="" />

                                    </div>
                                    <div class="item">
                                        <img class="imgslide" src="assets/img/003.jpg" alt="" />

                                    </div>
                                </div>
                                <!--INDICATORS-->
                                <ol class="carousel-indicators">
                                    <li data-target="#carousel-example" data-slide-to="0" class="active"></li>
                                    <li data-target="#carousel-example" data-slide-to="1"></li>
                                    <li data-target="#carousel-example" data-slide-to="2"></li>
                                </ol>
                                <!--PREVIUS-NEXT BUTTONS-->
                                <a class="left carousel-control" href="#carousel-example" data-slide="prev">
                                    <span class="glyphicon glyphicon-chevron-left"></span>
                                </a>
                                <a class="right carousel-control" href="#carousel-example" data-slide="next">
                                    <span class="glyphicon glyphicon-chevron-right"></span>
                                </a>
                            </div>
                        </div>





                    </div>



                    <!-- Slider End -->








                    <h3 class="header-line">About</h3>

                    <h4>OUR VISION</h4>
                    <p>World recognized educational and research institute/ institution with academic excellence and
                        human values.</p>
                    <hr>
                    <h4>OUR MISSION</h4>
                    <p>Creating, transforming and disseminating knowledge through teaching, learning and research to
                        fulfil the needs of the dynamic stakeholders and to meet new challenges while upholding the
                        human values for the sustainable development of the region, nation and globe with a good
                        governance. </p>

                    <hr>
                    <div class="row">

                        <div class="col-md-9">

                            <!-- Google Map Copied Code -->
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1425.0956190685768!2d81.21187960694478!3d8.652761285856458!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3afbbe86af015be1%3A0x13487de478b8bb4b!2sTrincomalee%20Campus%20Library!5e0!3m2!1sen!2slk!4v1668928395867!5m2!1sen!2slk"
                                width="90%" height="400" style="border:0;" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade">
                            </iframe>

                        </div>



                        <div col-md-3>
                            <h4>
                                Address
                            </h4>

                            <p>
                                Senior Assistant Librarian,<br>
                                Library, Trincomalee Campus,<br>
                                Eastern University, Sri Lanka
                                <hr>
                            </p>
                        </div>
                        <div class="">
                            <h4>
                                Email
                            </h4>

                            <p>
                                library.tc@esn.ac.lk
                            </p>
                            <hr>
                        </div>

                        <div class="">
                            <h4>
                                Phone No
                            </h4>

                            <p>
                                +94-26-2225366
                            </p>
                        </div>

                    </div>
                </div>
            </div>




        </div>
    </div>
    <!-- CONTENT-WRAPPER SECTION END-->
    <?php include('includes/footer.php');?>
    <!-- FOOTER SECTION END-->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="assets/js/bootstrap.js"></script>
    <!-- CUSTOM SCRIPTS  -->
    <script src="assets/js/custom.js"></script>

</body>

</html>