<?php

   include("_includes/config.inc");
   include("_includes/dbconnect.inc");
   include("_includes/functions.inc");


   // check logged in
   if (isset($_SESSION['id'])) {


   //  var_dump($_POST['students']);
   //  die();
    
     if (!empty($_POST['students'])) {



     foreach ($_POST['students'] as $x => $studentid) {
         $sql = "DELETE from student where studentid = '$studentid'";
         $result = mysqli_query($conn,$sql);

     }

        
   }


     //redirect

     header("Location: students.php");

    } else {
      header("Location: index.php");
   }


?>














?>