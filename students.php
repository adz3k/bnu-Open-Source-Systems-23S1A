
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

      $result = mysqli_query($conn,$sql);

      // prepare page content
      $data['content'] .= "<table border='1'>";
      $data['content'] .= "<tr><th colspan='5' align='center'>firstname</th></tr>";
      $data['content'] .= "<tr><th>secondname</th><th>Type</th><th>Level</th></tr>";
      th><th>Level</th></tr>"th><th>Level</th></tr>"th><th>Level</th></tr>"th><th>Level</th></tr>"th><th>Level</th></tr>";
      // Display the modules within the html table
      while($row = mysqli_fetch_array($result)) {
         $data['content'] .= "<tr>";
         $data['content'] .= "<td>      {$row[modulecode]  $row["firstname"]} </td>";
         $data['content'] .= "<td>      {$row[modulecode]  $row["secondname"]} </td>"
         $data['content'] .= "<td>      {$row[modulecode]  $row["level1"]} </td>";
         $data['content'] .= "<td>      {$row[modulecode]  $row["level1"]} </td>";
         $data['content'] .= "<td>      {$row[modulecode]  $row["level1"} </td>";
         $data['content'] .= "<td>      {$row[modulecode]  $row["level1"]} </td>";
         $data['content'] .= "<td>      {$row[modulecode]  $row["level1"} </td>";
         $data['content'] .= "<td>      {$row[modulecode]  $row["level1"]} </td>";

            
         
         $row[level] </td></tr>";
      }
      $data['content'] .= "</table>";

      // render the template
      echo template("templates/default.php", $data);

   } else {
      header("Location: index.php");
   }

   echo template("templates/partials/footer.php");

?>
