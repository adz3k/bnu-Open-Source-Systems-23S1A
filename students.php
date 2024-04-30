<?php
include("_includes/config.inc");
   include("_includes/dbconnect.inc");
   include("_includes/functions.inc");


   // check logged in
   if (isset($_SESSION['id'])) {

      echo template("templates/partials/header.php");
      echo template("templates/partials/nav.php");

      // Build SQL statment that selects a student's modules
      // TO DO REWRITE QUERY TO STUDENT SELECT
     // $sql = "select * from studentmodules sm, module m where m.modulecode = sm.modulecode and sm.studentid = '" . $_SESSION['id'] ."';";
      
     $sql = "select * from student;";

      $result = mysqli_query($conn,$sql);

      // prepare page content
      $data['content'] .= "<table border='1'>";
      $data['content'] .= "<tr><th>Student Id </th><th>DOB</th><th>firstname</th></th><th>lastname</th><th>house</th><th>town</th><th>county</th><th>country</th><th>postcode</tr>";
      
     //wrap table in a form
     //form will post to deletestudents.php

      // Display the modules within the html table
      while($row = mysqli_fetch_array($result)) {
         $data['content'] .= "<tr>";
         $data['content'] .= "<td>       {$row["studentid"]} </td>";
         $data['content'] .= "<td>       {$row["dob"]} </td>";
         $data['content'] .= "<td>       {$row["firstname"]} </td>";
         $data['content'] .= "<td>       {$row["lastname"]} </td>";
         $data['content'] .= "<td>       {$row["house"]} </td>";
         $data['content'] .= "<td>       {$row["town"]} </td>";
         $data['content'] .= "<td>       {$row["county"]} </td>";
         $data['content'] .= "<td>       {$row["country"]} </td>";
         $data['content'] .= "<td>       {$row["postcode"]} </td>";
         $data['content'] .= "<td>      <input type='checkbox' name='' value='' </td>";
         $data['content'] .="</td></tr>";
      }
    
      $data['content'] .= "</table>";

      //todo delete button

      // render the template
      echo template("templates/default.php", $data);

     } else {
      header("Location: index.php");
   }

   echo template("templates/partials/footer.php");

?>
