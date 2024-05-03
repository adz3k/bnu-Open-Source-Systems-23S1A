<?php

   include("_includes/config.inc");
   include("_includes/dbconnect.inc");
   include("_includes/functions.inc");


   // check logged in
   if (isset($_SESSION['id'])) {


    var_dump($_POST['students']);
    die();
    
     if (empty($_POST['students'])) {

        
     }

    // loop over  var_dump($_POST['students']); - foreach()
    //build sql query to delete item
    

     $sql = "DELETE from...;"; //finish off
    // run the query
     $result = mysqli_query($conn,$sql);

     //redirect

     header("Location: students.php");

    } else {
      header("Location: index.php");
   }


?>














?>