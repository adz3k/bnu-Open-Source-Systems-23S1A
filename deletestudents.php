<?php

   include("_includes/config.inc");
   include("_includes/dbconnect.inc");
   include("_includes/functions.inc");


   // check logged in
   if (isset($_SESSION['id'])) {


    var_dump($_POST);
    die();

      
     //$sql = "select * from student;";

     // $result = mysqli_query($conn,$sql);

     

     header("Location: students.php")

     } else {
      header("Location: index.php");
   }


?>














?>