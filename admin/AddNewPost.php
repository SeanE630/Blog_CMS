<?php require_once("../config/db.php"); ?>
<?php require_once("../config/sessions.php"); ?>
<?php require_once("../config/functions.php"); ?>
<?php 
    if(isset($_POST["Submit"])){
       
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.0/css/all.css" integrity="sha384-aOkxzJ5uQz7WBObEZcHvV5JvRW3TUc2rNPA7pe3AwnsUohiw1Vj2Rgx2KSOkF5+h"
        crossorigin="anonymous">
        <!-- CSS --> 
    <link rel="stylesheet" href="../css/adminStyles.css ">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <title>Admin Dashboard</title>
</head>
<body>
    <div class='container-fluid'>
        <div class="row">
        <?php
        include "includes/sidebar.php"
    ?>
            <div class="col-sm-10">
                <h1>Add New Post</h1>
                <div>
                    <?php echo ErrorMessage(); echo SuccessMessage(); ?>
                </div>
               <div>
                   <form action="Categories.php" method="post" enctype="multipart/form-data">
                       <fieldset>
                           <div class="form-group">
                               <label for="Title">Title:</label>
                               <input type="text" name="Title" id="title" class="form-control" placeholder="Title">
                           </div>
                           <div class="form-group">
                               <label for="Category">Category:</label>
                               <select class="form-control" name="Category" id="Category">
                               <?php 
                        
                        $ViewQuery = "SELECT * FROM category ORDER BY datetime desc";
                        $Execute = mysqli_query($connection,$ViewQuery);
                        
                        while($DataRows=mysqli_fetch_assoc($Execute)){
                            $Id=$DataRows["id"];
                            $CategoryName=$DataRows["name"];
                       ?>
                       <option><?php echo $CategoryName; ?></option>
                        <?php } ?>
                               </select>
                           </div>
                           <div class="form-group">
                               <label for="imageSelect">Select Image:</label>
                               <input type="File" name="Image" id="imageSelect" class="form-control" placeholder="...">
                           </div>
                           <div class="form-group">
                               <label for="postArea">Post:</label>
                               <textarea class="form-control" name="Post" id="postArea" cols="30" rows="10"></textarea>
                           </div>
                           <br>
                           <input type="Submit" name="Submit" class="btn btn-success btn-block" value="Add New Post">
                       </fieldset>
                       <br>
                   </form>
               </div>
            </div> <!--End of Main Area -->
        </div> <!--End Row -->
    </div> <!--End Container Fluid -->
    <div class="padding-65"></div>
    <div class="navbar navbar-inverse navbar-fixed-bottom">
        <p class="text-center footer">Copyright&copy; Sean Townsend 2019</p>
    </div> <!--End Footer -->
</body>
</html>