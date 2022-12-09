<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
  { 
header('location:index.php');
}
else{?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <title>Online Library Management System | Admin Dash Board</title>
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME STYLE  -->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="assets/css/style.css" rel="stylesheet" />
    <!-- GOOGLE FONT -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <style>
    .mydivoutermulti {}

    .alert-reg {
        color: #000000;
        background-color: white;
        border-color: #000000;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.1), 0 6px 20px 0 rgba(0, 0, 0, 0.1);
    }

    .alert-reg:hover {

        background-color: grey;
    }

    .alert-reg hr {
        border-top-color: #000000;
    }


    .buttonoverlapmulti {

        background-color: #920303;
        width: 100px;
        position: absolute;
        z-index: 2;
        top: 10px;
        display: none;
        left: 90px;
        /* width: 92px; */

    }

    .buttonoverlapmulti2 {
        background-color: #920303;
        width: 100px;
        position: absolute;
        z-index: 2;
        top: 50px;

        display: none;
        left: 90px;
        /* left: 19px;
        width: 92px; */
    }

    .buttonoverlapmulti3 {
        background-color: #920303;
        width: 100px;
        position: absolute;
        z-index: 2;
        top: 90px;
        display: none;
        left: 90px;
        /* left: 19px;
        width: 92px; */
    }

    .buttonoverlapmulti4 {
        background-color: #920303;
        width: 100px;
        position: absolute;
        z-index: 2;
        top: 130px;
        display: none;
        left: 90px;
        /* left: 19px;
        width: 92px; */
    }

    .mydivoutermulti:hover .buttonoverlapmulti {
        display: block;
    }

    .mydivoutermulti:hover .buttonoverlapmulti2 {
        display: block;
    }

    .mydivoutermulti:hover .buttonoverlapmulti3 {
        display: block;
    }

    .mydivoutermulti:hover .buttonoverlapmulti4 {
        display: block;
    }

    .footer-bottom {
        position: fixed;
        left: 0;
        bottom: 0;
        width: 100%;
    }
    </style>

</head>

<body>
    <!------MENU SECTION START-->
    <?php include('includes/header.php');?>
    <!-- MENU SECTION END-->
    <div class="content-wrapper">
        <div class="container">
            <div class="row pad-botm">
                <div class="col-md-12">
                    <h4 class="header-line">Registered Users Details</h4>

                </div>

            </div>

            <div class="row">

                <div class="col-md-3 col-sm-3 col-xs-6" onclick="window.location = 'reg-students.php';">
                    <div class="alert alert-success back-widget-set text-center">
                        <img style="width:80px;height:70px;" src="assets/img/student.png">

                        Registered Student
                    </div>
                </div>


                <div class="col-md-3 col-sm-3 col-xs-6" onclick="window.location = 'reg-lectures.php';">
                    <div class="alert alert-success back-widget-set text-center">
                        <img style="width:60px;height:70px;" src="assets/img/lecturers.png">

                        Registered Lecturers
                    </div>
                </div>

                <div class="col-md-3 col-sm-3 col-xs-6" onclick="window.location = 'reg-staff.php';">
                    <div class="alert alert-success back-widget-set text-center">
                        <img style="width:70px;height:70px;" src="assets/img/staff.png">

                        Registered Staff
                    </div>
                </div>

                <div class="col-md-3 col-sm-3 col-xs-6" onclick="window.location = 'reg-others.php';">
                    <div class="alert alert-success back-widget-set text-center">
                        <img style="width:90px;height:70px;" src="assets/img/auth.png">

                        Registered Others
                    </div>
                </div>

            </div>
        </div>
        <!-- CONTENT-WRAPPER SECTION END-->
        <div class="footer-bottom">
            <?php include('includes/footer.php');?>
        </div>
        <!-- FOOTER SECTION END-->
        <!-- JAVASCRIPT FILES PLACED AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
        <!-- CORE JQUERY  -->
        <script src="assets/js/jquery-1.10.2.js"></script>
        <!-- BOOTSTRAP SCRIPTS  -->
        <script src="assets/js/bootstrap.js"></script>
        <!-- CUSTOM SCRIPTS  -->
        <script src="assets/js/custom.js"></script>
</body>

</html>
<?php } ?>