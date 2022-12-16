<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['login'])==0)
    {   
header('location:index.php');
}
else{ 
if(isset($_GET['del']))
{
$id=$_GET['del'];
$sql = "delete from tblbooks  WHERE id=:id";
$query = $dbh->prepare($sql);
$query -> bindParam(':id',$id, PDO::PARAM_STR);
$query -> execute();
$_SESSION['delmsg']="Category deleted scuccessfully ";
header('location:manage-books.php');

}


    ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Online Library Management System | Manage Books</title>
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME STYLE  -->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- DATATABLE STYLE  -->
    <link href="assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="assets/css/style.css" rel="stylesheet" />
    <!-- GOOGLE FONT -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <style>
    label {
        display: none;
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
                    <h4 class="header-line">Availble Books</h4>
                </div>



            </div>
            <div class="row">
                <div class="col-md-12">



                    <script type="text/javascript"
                        src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
                    <script type="text/javascript">
                    $(document).ready(function() {
                        $("#ddlCountry,#ddlAge,#ddlAuth").on("change", function() {
                            var country = $('#ddlCountry').find("option:selected").val();
                            var age = $('#ddlAge').find("option:selected").val();
                            var auth = $('#ddlAuth').find("option:selected").val();
                            SearchData(country, age, auth)
                        });
                    });

                    function SearchData(country, age, auth) {
                        if (country.toUpperCase() == 'ALL' && age.toUpperCase() == 'ALL' && auth.toUpperCase() ==
                            'ALL') {
                            $('#dataTables-example tbody tr').show();
                        } else {
                            $('#dataTables-example tbody tr:has(td)').each(function() {
                                var rowCountry = $.trim($(this).find('td:eq(1)').text());
                                var rowAge = $.trim($(this).find('td:eq(2)').text());
                                var rowAuth = $.trim($(this).find('td:eq(3)').text());
                                if (country.toUpperCase() != 'ALL' && age.toUpperCase() != 'ALL') {
                                    if (rowCountry.toUpperCase() == country.toUpperCase() && rowAge == age &&
                                        rowAuth.toUpperCase() == auth.toUpperCase()) {
                                        $(this).show();
                                    } else {
                                        $(this).hide();
                                    }
                                } else if ($(this).find('td:eq(1)').text() != '' || $(this).find('td:eq(1)')
                                    .text() != '') {
                                    if (country != 'all') {
                                        if (rowCountry.toUpperCase() == country.toUpperCase()) {
                                            $(this).show();
                                        } else {
                                            $(this).hide();
                                        }
                                    }
                                    if (age != 'all') {
                                        if (rowAge == age) {
                                            $(this).show();
                                        } else {
                                            $(this).hide();
                                        }
                                    }
                                    if (auth != 'all') {
                                        if (rowAuth == auth) {
                                            $(this).show();
                                        } else {
                                            $(this).hide();
                                        }
                                    }
                                }

                            });
                        }
                    }
                    </script>



                    <script>
                    function myFunction() {
                        var input, filter, table, tr, td, i, txtValue;
                        input = document.getElementById("myInput");
                        filter = input.value.toUpperCase();
                        table = document.getElementById("dataTables-example");
                        tr = table.getElementsByTagName("tr");
                        for (i = 0; i < tr.length; i++) {
                            td = tr[i].getElementsByTagName("td")[0];
                            if (td) {
                                txtValue = td.textContent || td.innerText;
                                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                                    tr[i].style.display = "";
                                } else {
                                    tr[i].style.display = "none";
                                }
                            }
                        }
                    }
                    </script>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-6">

                                <select class="cl_country" id="ddlCountry">
                                    <option value="all">Select Book Name </option>
                                    <?php 
                         $sql = "SELECT * from  tblbooks";
                         $query = $dbh -> prepare($sql);
                         $query->execute();
                         $results=$query->fetchAll(PDO::FETCH_OBJ);
                         $cnt=1;  
                         if($query->rowCount() > 0)
                         {
                         foreach($results as $result)
                         {               ?>
                                    <option value="<?php echo htmlentities($result->BookName);?>">
                                        <?php echo htmlentities($result->BookName);?></option>
                                    <?php }}
                        ?>

                                </select>
                                <select class="cl_age" id="ddlAge">
                                    <option value="all">Select Category </option>
                                    <?php 
                         $sql = "SELECT * from  tblcategory";
                         $query = $dbh -> prepare($sql);
                         $query->execute();
                         $results=$query->fetchAll(PDO::FETCH_OBJ);
                         $cnt=1;  
                         if($query->rowCount() > 0)
                         {
                         foreach($results as $result)
                         {               ?>
                                    <option value="<?php echo htmlentities($result->CategoryName);?>">
                                        <?php echo htmlentities($result->CategoryName);?></option>
                                    <?php }}
                        ?>
                                </select>
                                <select class="cl_auth" id="ddlAuth">
                                    <option value="all">Select Author</option>
                                    <?php 
                         $sql = "SELECT * from  tblauthors";
                         $query = $dbh -> prepare($sql);
                         $query->execute();
                         $results=$query->fetchAll(PDO::FETCH_OBJ);
                         $cnt=1;  
                         if($query->rowCount() > 0)
                         {
                         foreach($results as $result)
                         {               ?>
                                    <option value="<?php echo htmlentities($result->AuthorName);?>">
                                        <?php echo htmlentities($result->AuthorName);?></option>
                                    <?php }}
                        ?>
                                </select>

                            </div>
                            <div class="searchBar col-md-6">





                                <input class="" type="text" id="myInput" onkeyup="myFunction()"
                                    placeholder="Search for names.." title="Type in a name">
                            </div>
                        </div>


                    </div>

                    <!-- Advanced Tables -->
                    <div class="panel panel-default">

                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover" id="dataTables-example">
                                    <thead class="col">
                                        <tr>
                                            <th>#</th>
                                            <th>Book Name</th>
                                            <th>Category</th>
                                            <th>Author</th>
                                            <th>ISBN</th>
                                            <th>Image</th>
                                            <th>Status</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $sql = "SELECT tblbooks.id,tblbooks.BookName,tblcategory.CategoryName,tblauthors.AuthorName,tblbooks.ISBNNumber,tblbooks.BookImage,tblbooks.id as bookid from  tblbooks join tblcategory on tblcategory.id=tblbooks.CatId join tblauthors on tblauthors.id=tblbooks.AuthorId" ;

$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;


$sq="SELECT BookId FROM tblissuedbookdetails";
$q=$dbh -> prepare($sq);
$q->execute();
$r=$q->fetchAll(PDO::FETCH_OBJ);
echo htmlentities($r->BookId);
$cn=1;
$B="";
if($q->rowCount()> 0){
foreach($r as $res){
?>
                                        <p>
                                            <?php 
                            
                           $B= htmlentities($res->BookId);                            
?>
                                        </p>
                                        <?php $cn=$cn+1;
}
}


if($query->rowCount()> 0)
{
foreach($results as $result)
{               ?>
                                        <tr class="odd gradeX">
                                            <td class="center"><?php echo htmlentities($cnt);?></td>
                                            <td class="center"><?php echo htmlentities($result->BookName);?></td>
                                            <td class="center"><?php echo htmlentities($result->CategoryName);?></td>
                                            <td class="center"><?php echo htmlentities($result->AuthorName);?></td>
                                            <td class="center"><?php echo htmlentities($result->ISBNNumber);?></td>
                                            <td class="center"><img
                                                    src="admin/image/<?php echo htmlentities($result->BookImage);?>"
                                                    width="75px" height="75px">
                                            </td>
                                            <td class="center">
                                                <?php 
                        if($B==htmlentities($result->id)){
                            ?>
                                                <a href="#" class="btn btn-danger btn-xs">Not Available</a>
                                                <?php
                        }
                        else{
                            ?>
                                                <a href="#" class="btn btn-success btn-xs">Available</a>
                                                <?php
                        }


                   
                   ?>

                                            </td>


                                        </tr>
                                        <?php $cnt=$cnt+1;}} ?>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                    <!--End Advanced Tables -->
                </div>
            </div>



        </div>
    </div>
    <!-- <script>
    function myFunction() {
        var input, filter, table, tr, td, i;
        input = document.getElementById("mylist");
        filter = input.value;

        table = document.getElementById("myTable");
        tr = table.getElementsByTagName("tr");

        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[0];
            if (td) {
                if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }
    </script> -->
    <!-- <script type="text/javascript">
    $(document).ready(function() {
        $("#fetchval").on('change', function() {
            var value = $(this).val();
            alert(value);
            $.ajax({
                url: "fetch.php",
                type: "POST",
                data: 'request=' + value,
                beforeSend: function() {
                    $(".container").html("<span>Working..</span>");
                },
                success: function(data) {
                    $(".container").html("data");
                }
            });
        });
    });
    </script> -->
    <!-- CONTENT-WRAPPER SECTION END-->
    <?php include('includes/footer.php');?>
    <!-- FOOTER SECTION END-->
    <!-- JAVASCRIPT FILES PLACED AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
    <!-- CORE JQUERY  -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="assets/js/bootstrap.js"></script>
    <!-- DATATABLE SCRIPTS  -->
    <script src="assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
    <!-- CUSTOM SCRIPTS  -->
    <script src="assets/js/custom.js"></script>


</body>

</html>
<?php } ?>