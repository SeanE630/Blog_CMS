<?php require_once("../config/db.php"); ?>
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
            <div class="col-sm-2">
                <h2>Hello Sean!</h2>
                <ul id="side_menu" class="nav nav-pills nav-stacked">
                    <li class="active"><a href="dashboard.php"><span class="fas fa-bars"></span>&nbsp;Dashboard</a></li>
                    <li><a href="#"><span class="fas fa-plus"></span>&nbsp;Add New Post</a></li>
                    <li><a href="#"><span class="fas fa-comments"></span>&nbsp;Comments</a></li>
                    <li><a href="categories.php"><span class="fas fa-tags"></span>&nbsp;Categories</a></li>
                    <li><a href="#"><span class="fas fa-user"></span>&nbsp;Manage Admins</a></li>
                    <li><a href="#"><span class="fas fa-satellite-dish"></span>&nbsp;Live Blog</a></li>
                    <li><a href="#"><span class="fas fa-sign-out-alt"></span>&nbsp;Logout</a></li>
                </ul>
             </div> <!--End of Sidebar -->
            <div class="col-sm-10">
                <h1>Categories</h1>
               <div>
                   <form action="Categories.php" method="post">
                       <fieldset>
                           <div class="form-group">
                               <label for="categoryname">Name:</label>
                               <input type="text" name="category" id="categoryname" class="form-control">
                           </div>
                           <br>
                           <input type="Submit" class="btn btn-success btn-block" value="Add New Category">
                       </fieldset>
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