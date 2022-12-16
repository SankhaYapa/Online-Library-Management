<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
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
    div#dataTables-example_filter {
        display: hide;
        visibility: hidden;
    }
    </style>

</head>

<body>
    <!------MENU SECTION START-->
    <?php include('includes/headermanagebook.php');?>
    <!-- MENU SECTION END-->
    <div class="content-wrapper">
        <div class="container">
            <div class="row pad-botm">
                <div class="col-md-12">
                    <h4 class="header-line">Manage Books</h4>
                </div>
                <div class="row">
                    <?php if($_SESSION['error']!="")
    {?>
                    <div class="col-md-6">
                        <div class="alert alert-danger">
                            <strong>Error :</strong>
                            <?php echo htmlentities($_SESSION['error']);?>
                            <?php echo htmlentities($_SESSION['error']="");?>
                        </div>
                    </div>
                    <?php } ?>
                    <?php if($_SESSION['msg']!="")
{?>
                    <div class="col-md-6">
                        <div class="alert alert-success">
                            <strong>Success :</strong>
                            <?php echo htmlentities($_SESSION['msg']);?>
                            <?php echo htmlentities($_SESSION['msg']="");?>
                        </div>
                    </div>
                    <?php } ?>
                    <?php if($_SESSION['updatemsg']!="")
{?>
                    <div class="col-md-6">
                        <div class="alert alert-success">
                            <strong>Success :</strong>
                            <?php echo htmlentities($_SESSION['updatemsg']);?>
                            <?php echo htmlentities($_SESSION['updatemsg']="");?>
                        </div>
                    </div>
                    <?php } ?>


                    <?php if($_SESSION['delmsg']!="")
    {?>
                    <div class="col-md-6">
                        <div class="alert alert-success">
                            <strong>Success :</strong>
                            <?php echo htmlentities($_SESSION['delmsg']);?>
                            <?php echo htmlentities($_SESSION['delmsg']="");?>
                        </div>
                    </div>
                    <?php } ?>

                </div>


            </div>
            <div class="row">
                <div class="col-md-12">
                    <!-- Java Script for filter -->
                    <script type="text/javascript"
                        src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
                    <script type="text/javascript">
                    $(document).ready(function() {
                        $("#ddlDepart,#ddlAge,#ddlAuth").on("change", function() {


                            var department = $('#ddlDepart').find("option:selected").val();
                            var age = $('#ddlAge').find("option:selected").val();
                            var auth = $('#ddlAuth').find("option:selected").val();
                            SearchData(department, age, auth)
                        });
                    });

                    function SearchData(department, age, auth) {
                        if (department
                            .toUpperCase() ==
                            'ALL' && age.toUpperCase() ==
                            'ALL' && auth.toUpperCase() ==
                            'ALL') {
                            $('#dataTables-example tbody tr').show();
                        } else {
                            $('#dataTables-example tbody tr:has(td)').each(function() {


                                var rowDepartment = $.trim($(this).find('td:eq(4)').text());
                                var rowAge = $.trim($(this).find('td:eq(5)').text());
                                var rowAuth = $.trim($(this).find('td:eq(6)').text());
                                if (
                                    department.toUpperCase() != 'ALL' && age
                                    .toUpperCase() != 'ALL') {
                                    if (rowDepartment
                                        .toUpperCase() == department.toUpperCase() && rowAge == age &&
                                        rowAuth.toUpperCase() == auth.toUpperCase()) {
                                        $(this).show();
                                    } else {
                                        $(this).hide();
                                    }
                                } else if ($(this).find('td:eq(1)').text() != '' || $(this).find('td:eq(1)')
                                    .text() != '') {


                                    if (department != 'all') {
                                        if (rowDepartment.toUpperCase() == department.toUpperCase()) {
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

                    function searchTable() {
                        var input, filter, found, table, tr, td, i, j;
                        input = document.getElementById("myInput");
                        filter = input.value.toUpperCase();
                        table = document.getElementById("dataTables-example");
                        tr = table.getElementsByTagName("tr");
                        for (i = 0; i < tr.length; i++) {
                            td = tr[i].getElementsByTagName("td");
                            for (j = 0; j < td.length; j++) {
                                if (td[1].innerHTML.toUpperCase().indexOf(filter) > -1) {
                                    found = true;

                                }
                            }
                            if (found) {
                                tr[i].style.display = "";
                                found = false;
                            } else {
                                tr[i].style.display = "none";
                            }
                        }
                    }

                    function serchByISBN() {
                        var input, filter, found, table, tr, td, i, j;
                        input = document.getElementById("myIsbn");
                        filter = input.value.toUpperCase();
                        table = document.getElementById("dataTables-example");
                        tr = table.getElementsByTagName("tr");

                        for (i = 0; i < tr.length; i++) {
                            td = tr[i].getElementsByTagName("td");
                            for (j = 0; j < td.length; j++) {
                                if (td[7].innerHTML.toUpperCase().indexOf(filter) > -1) {
                                    found = true;

                                }
                            }
                            if (found) {
                                tr[i].style.display = "";
                                found = false;
                            } else {
                                tr[i].style.display = "none";
                            }
                        }
                    }
                    </script>
                    <!-- Java Script for filter End -->
                    <!-- Filters -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-12">

                                <input class="cl_country" id='myInput' placeholder="Search Book Name"
                                    onkeyup='searchTable()' type='text'>
                                <input class="isbn" id='myIsbn' placeholder="Search ISBN" onkeyup='serchByISBN()'
                                    type='text'>
                                <select class="cl_country" id="ddlDepart">
                                    <option value="all">Select Department </option>

                                    <?php 
                         $sql = "SELECT DISTINCT Department from  tblbooks ";
                         $query = $dbh -> prepare($sql);
                         $query->execute();
                         $results=$query->fetchAll(PDO::FETCH_OBJ);
                         $cnt=1;  
                         if($query->rowCount() > 0)
                         {
                         foreach($results as $result)
                         {               ?>
                                    <option value="<?php echo htmlentities($result->Department);?>">
                                        <?php echo htmlentities($result->Department);?></option>
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

                        </div>


                    </div>
                    <!-- Filters End -->


                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Books Listing
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">

                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Book Name</th>
                                            <th>No_of_Books</th>
                                            <th>Faculty</th>
                                            <th>Department</th>
                                            <th>Category</th>
                                            <th>Author</th>
                                            <th>ISBN</th>
                                            <th>Image</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $sql = "SELECT tblbooks.id,tblbooks.BookName,tblbooks.Faculty,tblbooks.Department,tblbooks.NoOfBooks,tblcategory.CategoryName,tblauthors.AuthorName,tblbooks.ISBNNumber,tblbooks.BookImage,tblbooks.id as bookid from  tblbooks join tblcategory on tblcategory.id=tblbooks.CatId join tblauthors on tblauthors.id=tblbooks.AuthorId" ;

$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;


$sq="SELECT BookId,count(BookId) FROM tblissuedbookdetails group by BookId";
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
                                            <td class="center"><?php echo htmlentities($result->NoOfBooks);?></td>
                                            <td class="center"><?php echo htmlentities($result->Faculty);?></td>
                                            <td class="center"><?php echo htmlentities($result->Department);?></td>
                                            <td class="center"><?php echo htmlentities($result->CategoryName);?></td>
                                            <td class="center"><?php echo htmlentities($result->AuthorName);?></td>
                                            <td class="center"><?php echo htmlentities($result->ISBNNumber);?></td>
                                            <td class="center"><img
                                                    src="image/<?php echo htmlentities($result->BookImage);?>"
                                                    width="75px" height="75px">
                                            </td>




                                            <td class="center">

                                                <?php 
                                               
                                                if(0>=htmlentities($result->NoOfBooks)){
                                                    ?>
                                                <a href="#" class="btn btn-danger btn-xs">Not Available</a>
                                                <?php
                                                }
                                                else{
                                                    ?>
                                                <a href="#" class="btn btn-success btn-xs">
                                                    Available
                                                    <!-- <?php echo $B?> -->
                                                </a>
                                                <?php
                                                }


                                           
                                           ?>

                                            </td>

                                            <td class="center">

                                                <a
                                                    href="edit-book.php?bookid=<?php echo htmlentities($result->bookid);?>"><button
                                                        class="btn btn-primary"><i class="fa fa-edit "></i>
                                                        Edit</button>
                                                    <a href="manage-books.php?del=<?php echo htmlentities($result->bookid);?>"
                                                        onclick="return confirm('Are you sure you want to delete?');">
                                                        <button class="
                                                        btn btn-danger"><i class="fa fa-pencil"></i> Delete</button>
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