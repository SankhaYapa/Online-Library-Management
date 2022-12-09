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
                    <h4 class="header-line">ADMIN DASHBOARD</h4>

                </div>

            </div>

            <div class="row">

                <div class="col-md-3 col-sm-3 col-xs-6" onclick="window.location = 'manage-books.php';">
                    <div class="alert alert-success back-widget-set text-center">
                        <img style="width:80px;height:70px;" src="assets/img/book.png">
                        <?php 
$sql ="SELECT id from tblbooks ";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$listdbooks=$query->rowCount();
?>


                        <h3><?php echo htmlentities($listdbooks);?></h3>
                        Listed Books
                    </div>
                </div>


                <div class="col-md-3 col-sm-3 col-xs-6" onclick="window.location = 'manage-issued-books.php';">
                    <div class="alert alert-success back-widget-set text-center">
                        <img style="width:60px;height:70px;" src="assets/img/listed.png">
                        <?php 
$sql1 ="SELECT id from tblissuedbookdetails ";
$query1 = $dbh -> prepare($sql1);
$query1->execute();
$results1=$query1->fetchAll(PDO::FETCH_OBJ);
$issuedbooks=$query1->rowCount();
?>

                        <h3><?php echo htmlentities($issuedbooks);?> </h3>
                        Borrowed Books
                    </div>
                </div>

                <div class="col-md-3 col-sm-3 col-xs-6" onclick="window.location = 'manage-return-book.php';">
                    <div class="alert alert-success back-widget-set text-center">
                        <img style="width:70px;height:70px;" src="assets/img/returned.png">
                        <?php 
$status=1;
$sql2 ="SELECT id from tblissuedbookdetails where RetrunStatus=:status";
$query2 = $dbh -> prepare($sql2);
$query2->bindParam(':status',$status,PDO::PARAM_STR);
$query2->execute();
$results2=$query2->fetchAll(PDO::FETCH_OBJ);
$returnedbooks=$query2->rowCount();
?>

                        <h3><?php echo htmlentities($returnedbooks);?></h3>
                        Returned Books
                    </div>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-6" onclick="window.location = 'reg-all.php';">
                    <div class="alert alert-success back-widget-set text-center">
                        <img style="width:70px;height:70px;" src="assets/img/students.png">
                        <?php 
$sql3 ="SELECT id from tblstudents ";
$query3 = $dbh -> prepare($sql3);
$query3->execute();
$results3=$query3->fetchAll(PDO::FETCH_OBJ);
$regstds=$query3->rowCount();
?>
                        <h3><?php echo htmlentities($regstds);?></h3>
                        Registered Users

                    </div>
                </div>


            </div>


            <div class="bottomdiv row">

                <div class="col-md-3 col-sm-3 col-xs-6" onclick="window.location = 'manage-authors.php';">
                    <div class="alert alert-success back-widget-set text-center">
                        <img style="width:90px;height:70px;" src="assets/img/author.png">
                        <?php 
$sql4 ="SELECT id from tblauthors ";
$query4 = $dbh -> prepare($sql4);
$query4->execute();
$results4=$query4->fetchAll(PDO::FETCH_OBJ);
$listdathrs=$query4->rowCount();
?>


                        <h3><?php echo htmlentities($listdathrs);?></h3>
                        Listed Authors
                    </div>
                </div>


                <div class="col-md-3 col-sm-3 rscol-xs-6" onclick="window.location = 'manage-categories.php';">
                    <div class="alert alert-success back-widget-set text-center">
                        <img style="width:70px;height:70px;" src="assets/img/cat.png">
                        <?php 
$sql5 ="SELECT id from tblcategory ";
$query5 = $dbh -> prepare($sql5);
$query5->execute();
$results5=$query5->fetchAll(PDO::FETCH_OBJ);
$listdcats=$query5->rowCount();
?>

                        <h3><?php echo htmlentities($listdcats);?> </h3>
                        Listed Categories
                    </div>
                </div>


            </div>








            <div class="row">

                <div class="col-md-10 col-sm-8 col-xs-12 col-md-offset-1">
                    <div id="carousel-example" class="carousel slide slide-bdr" data-ride="carousel">

                        <div class="carousel-inner">
                            <div class="item active">



                            </div>


                        </div>


                    </div>
                </div>







            </div>

        </div>
    </div>
    <!-- CONTENT-WRAPPER SECTION END-->
    <?php include('includes/footer.php');?>
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