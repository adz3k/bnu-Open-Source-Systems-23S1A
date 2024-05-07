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

     //wrap table in a form
     //form will post to deletestudents.php
     $data['content'] .="<form action ='deletestudents.php' method='POST'>";

      // prepare page content
      $data['content'] .= "<table border='1' class='table table-bordered table-group-divider table-striped table-hover mt-3'>";
      $data['content'] .= "<tr><th>Student Id </th><th>DOB</th><th>firstname</th></th><th>lastname</th><th>house</th><th>town</th><th>county</th><th>country</th><th>postcode</tr>";
      
     

      // Display the modules within the html table
      while($row = mysqli_fetch_array($result)) {
         $data['content'] .= "<tr>"     ;
         $data['content'] .= "<td>       {$row["studentid"]} </td>";
         $data['content'] .= "<td>       {$row["dob"]} </td>";
         $data['content'] .= "<td>       {$row["firstname"]} </td>";
         $data['content'] .= "<td>       {$row["lastname"]} </td>";
         $data['content'] .= "<td>       {$row["house"]} </td>";
         $data['content'] .= "<td>       {$row["town"]} </td>";
         $data['content'] .= "<td>       {$row["county"]} </td>";
         $data['content'] .= "<td>       {$row["country"]} </td>";
         $data['content'] .= "<td>       {$row["postcode"]} </td>";
         //add value to each textbox
         $data['content'] .= "<td>      <input type='checkbox' name='students[]' value='$row[studentid]' </td>";
         $data['content'] .="</td></tr>";
      }
    
      $data['content'] .= "</table>";

      //todo delete button

      $data['content'] .="<input type= 'submit'name='deletebtn' value='Delete' />";

      $data['content'] .="</form>";



      // render the template



      echo template("templates/default.php", $data);

     } else {
      header("Location: index.php");
   }

   echo template("templates/partials/footer.php");

?>
