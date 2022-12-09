<?php
include('includes/config.php');
   
if(ISSET($_POST['upload'])){
  $bookname=$_POST['bookname'];
  $nobooks=$_POST['nobooks'];
  $faculty=$_POST['faculty'];
  $departmentSelect=$_POST['departmentSelect'];
  $category=$_POST['category'];
  $author=$_POST['author'];
  $isbn=$_POST['isbn'];
echo $isbn;
  $file_name = $_FILES['file']['name'];
  $file_temp = $_FILES['file']['tmp_name'];
  $file_size = $_FILES['file']['size'];
  $file_type = $_FILES['file']['type'];
  $date_uploaded=date("Y-m-d");
  $location="./image/".$file_name;
  if($file_size < 5242880){
    if(move_uploaded_file($file_temp, $location)){
      try{
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO tblbooks(BookName,NoOfBooks,Faculty,Department,CatId,AuthorId,ISBNNumber,BookImage)  VALUES ('$bookname','$nobooks',' $faculty','$departmentSelect','$category','$author','$isbn','$file_name')";
        $dbh->exec($sql);
      }catch(PDOException $e){
        echo $e->getMessage();
      }
      
      $dbh = null;
      header('location: manage-books.php');
    }
  }else{
    echo "<center><h3 class='text-danger'>File too large to upload!</h3></center>";
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Online Library Management System | Add Book</title>
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME STYLE  -->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="assets/css/style.css" rel="stylesheet" />
    <!-- GOOGLE FONT -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />




    <!-- Select sub category java script -->
    <script type="text/javascript">
    var subcategory = {
        FAS: ["Computer Science", "Physical Science"],
        // sidha: [""],
        FCBS: ["Department of Business & Management Studies", "Department of Language & Communication Studies"],
        OTHER: ['Novel', 'Translations']
    }

    function makeSubmenu(value) {
        if (value.length == 0) document.getElementById("departmentSelect").innerHTML = "<option></option>";
        else {
            var citiesOptions = "";
            for (categoryId in subcategory[value]) {
                citiesOptions += "<option>" + subcategory[value][categoryId] + "</option>";
            }
            document.getElementById("departmentSelect").innerHTML = citiesOptions;
        }
    }

    function displaySelected() {
        var country = document.getElementById("faculty").value;
        var city = document.getElementById("departmentSelect").value;
        alert(country + "\n" + city);
    }

    function resetSelection() {
        document.getElementById("faculty").selectedIndex = 0;
        document.getElementById("departmentSelect").selectedIndex = 0;
    }
    </script>
    <!-- Select sub category java script End-->
</head>


<body onload="resetSelection()">
    <!------MENU SECTION START-->
    <?php include('includes/headermanagebook.php');?>
    <!-- MENU SECTION END-->
    <div class="content-wra">
        <div class="content-wrapper">
            <div class="container">
                <div class="row pad-botm">
                    <div class="col-md-12">
                        <h4 class="header-line">Add Book</h4>

                    </div>

                </div>

                <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                        <div class="panel panel-info">
                            <div class="panel-heading">

                                <div class="panel-body">

                                    <form method="POST" enctype="multipart/form-data" action="add-book.php">
                                        <div class="form-group">
                                            <label>Book Name<span style="color:red;">*</span></label>
                                            <input class="form-control" type="text" name="bookname" autocomplete="off"
                                                required />
                                        </div>
                                        <div class="form-group">
                                            <label>Number of Books<span style="color:red;">*</span></label>
                                            <input class="form-control" type="text" name="nobooks" autocomplete="off"
                                                required />
                                        </div>

                                        <div class="form-group">
                                            <label>Choose Faculty<span style="color:red;">*</span></label>
                                            <select class="form-control" id="faculty" size="1" name="faculty"
                                                onchange="makeSubmenu(this.value)">
                                                <option value="" disabled selected>Choose Faculty</option>
                                                <option value="FAS">Faculty Of Applied Science</option>
                                                <option value="SIDHA">Faculty of Sidha Medicine</option>
                                                <option value="FCBS">Faculty of Bussiness & Communication Studies
                                                </option>
                                                <option value="OTHER">Other</option>
                                            </select>
                                            <!-- 
                                            <select id="faculty" size="1" onchange="makeSubmenu(this.value)">
                                                <option value="" disabled selected>Choose Category</option>
                                                <option value="fas">Faculty Of Applied Science</option>
                                                <option value="sidha">Faculty of Sidha Medicine</option>
                                                <option value="fcbs">Faculty of Bussiness & Communication Studies
                                                </option>
                                            </select> -->

                                            <!-- <button onclick="displaySelected()">show selected</button> -->
                                        </div>
                                        <div class="form-group">
                                            <label>Choose Department<span style="color:red;">*</span></label>
                                            <!-- <select id="departmentSelect" name="departmentSelect" size="1">
                                                <option value="" disabled selected>Choose Department</option>
                                                <option></option>
                                            </select> -->
                                            <select class="form-control" id="departmentSelect" name="departmentSelect"
                                                size="1">
                                                <option value="" disabled selected>Choose Subcategory</option>
                                                <option></option>
                                            </select>
                                        </div>




                                        <div class="form-group">
                                            <label> Category<span style="color:red;">*</span></label>
                                            <select class="form-control" name="category" required="required">
                                                <option value=""> Select Category</option>
                                                <?php 
                  $status=1;
                  $sql = "SELECT * from  tblcategory where Status=:status";
                  $query = $dbh -> prepare($sql);
                  $query -> bindParam(':status',$status, PDO::PARAM_STR);
                  $query->execute();
                  $results=$query->fetchAll(PDO::FETCH_OBJ);
                  $cnt=1;
                  if($query->rowCount() > 0)
                  {
                  foreach($results as $result)
                  {               ?>
                                                <option value="<?php echo htmlentities($result->id);?>">
                                                    <?php echo htmlentities($result->CategoryName);?></option>
                                                <?php }} ?>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label> Author<span style="color:red;">*</span></label>
                                            <select class="form-control" name="author" required="required">
                                                <option value=""> Select Author</option>
                                                <?php 

        $sql = "SELECT * from  tblauthors ";
        $query = $dbh -> prepare($sql);
        $query->execute();
        $results=$query->fetchAll(PDO::FETCH_OBJ);
        $cnt=1;
        if($query->rowCount() > 0)
        {
        foreach($results as $result)
        {               ?>
                                                <option value="<?php echo htmlentities($result->id);?>">
                                                    <?php echo htmlentities($result->AuthorName);?></option>
                                                <?php }} ?>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label>ISBN Number<span style="color:red;">*</span></label>
                                            <input class="form-control" type="text" name="isbn" required="required"
                                                autocomplete="off" />
                                            <p class="help-block">An ISBN is an International Standard Book Number.ISBN
                                                Must be unique</p>
                                        </div>

                                        <div class="form-group">
                                            <label>Upload here</label>
                                            <input name="file" type="file" required="required" class="form-control" />
                                        </div>
                                        <center><button class="btn btn-primary" name="upload">Upload</button></center>
                                    </form>



                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>

        <!-- <a href="view.php">|View Uploads|</a> -->
</body>

</html>