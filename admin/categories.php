<?php require_once("../config/db.php"); ?>
<?php require_once("../config/sessions.php"); ?>
<?php require_once("../config/functions.php"); ?>
<?php 
    if(isset($_POST["Submit"])){
        $Category=mysqli_real_escape_string($connection, $_POST["Category"]);
        date_default_timezone_set("America/Denver");
        $CurrentTime = time();
        $DateTime =strftime("%B-%d-%Y %H:%M:%S", $CurrentTime);
        $DateTime;
        $Admin="Sean Townsend";
        if(empty($Category)){ //
            $_SESSION["ErrorMessage"]="All Fields must be filled out";
            Redirect_to("dashboard.php");
        }
        elseif(strlen($Category)>99){
            $_SESSION["ErrorMessage"]="Category Name cannot be longer than 99 characters long";
        }
        else{
           global $connection;
           $Query="INSERT INTO category (datetime,name,creatorName)
           VALUES('$DateTime','$Category','$Admin')";
           $Execute=mysqli_query($connection, $Query);
           if($Execute){
               $_SESSION["SuccessMessage"]="Category Added Successfully!";
               Redirect_to("categories.php");
           }
           else {
               $_SESSION["ErrorMessage"]="Category failed to Add";
               Redirect_to("categories.php");
           }
        }
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
                <h1>Categories</h1>
                <div>
                    <?php echo ErrorMessage(); echo SuccessMessage(); ?>
                </div>
               <div>
                   <form action="Categories.php" method="post">
                       <fieldset>
                           <div class="form-group">
                               <label for="Category">Name:</label>
                               <input type="text" name="Category" id="Category" class="form-control">
                           </div>
                           <br>
                           <input type="Submit" name="Submit" class="btn btn-success btn-block" value="Add New Category">
                       </fieldset>
                   </form>
               </div>
               <div class="table-responsive">
                   <table class="table table-striped table-hover">
                       <tr>
                           <th>SR No.</th>
                           <th>Date & Time</th>
                           <th>Category Name</th>
                           <th>Creator Name</th>
                       </tr>
                       <?php 
                        
                        $ViewQuery = "SELECT * FROM category ORDER BY datetime desc";
                        $Execute = mysqli_query($connection,$ViewQuery);
                        $SrNo=0;
                        while($DataRows=mysqli_fetch_assoc($Execute)){
                            $Id=$DataRows["id"];
                            $DateTime=$DataRows["datetime"];
                            $CategoryName=$DataRows["name"];
                            $CreatorName=$DataRows["creatorName"];
                            $SrNo++;
                        
                       ?>
                       <tr>
                           <td><?php echo $SrNo?></td>
                           <td><?php echo $DateTime?></td>
                           <td><?php echo $CategoryName?></td>
                           <td><?php echo $CreatorName?></td>
                       </tr>
                       <?php } ?>
                   </table>
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