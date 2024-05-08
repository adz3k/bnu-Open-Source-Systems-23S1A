<?php

include("_includes/config.inc");
include("_includes/dbconnect.inc");
include("_includes/functions.inc");


// check logged in
if (isset($_SESSION['id'])) {

   echo template("templates/partials/header.php");
   echo template("templates/partials/nav.php");

   // if the form has been submitted
   if (isset($_POST['submit'])) {

      // build an sql statment to update the student details
      $sql = "update student set firstname ='" . $_POST['txtfirstname'] . "',";
      $sql .= "lastname ='" . $_POST['txtlastname']  . "',";
      $sql .= "house ='" . $_POST['txthouse']  . "',";
      $sql .= "town ='" . $_POST['txttown']  . "',";
      $sql .= "county ='" . $_POST['txtcounty']  . "',";
      $sql .= "country ='" . $_POST['txtcountry']  . "',";
      $sql .= "postcode ='" . $_POST['txtpostcode']  . "' ";
      $sql .= "where studentid = '" . $_SESSION['id'] . "';";
      $result = mysqli_query($conn,$sql);

      $data['content'] = "<p>Your details have been updated</p>";

   }
   else {
      // Build a SQL statment to return the student record with the id that
      // matches that of the session variable.
      $sql = "select * from student where studentid='". $_SESSION['id'] . "';";
      $result = mysqli_query($conn,$sql);
      $row = mysqli_fetch_array($result);

      // using <<<EOD notation to allow building of a multi-line string
      // see http://stackoverflow.com/questions/6924193/what-is-the-use-of-eod-in-php for info
      // also http://stackoverflow.com/questions/8280360/formatting-an-array-value-inside-a-heredoc
      $data['content'] = <<<EOD

   <h2>My Details</h2>
   <form name="frmdetails" action="" method="post">
   <div class="input-group input-group-sm mb-3">
      <span class="input-group-text" id="txtfirstname">Firstname</span>
      <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" name='txtfirstname' value="{$row['firstname']}">
    </div><div class="input-group input-group-sm mb-3">
      <span class="input-group-text" id="txtlastname">Surname</span>
      <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" name='txtlastname'value="{$row['lastname']}">
    </div>
    <div class="input-group input-group-sm mb-3">
      <span class="input-group-text" id="txthouse">Number and Street</span>
      <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" name='txthouse' value="{$row['house']}">
    </div>
    <div class="input-group input-group-sm mb-3">
      <span class="input-group-text" id="txttown">Town</span>
      <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" name='txttown' value="{$row['town']}">
    </div>
    <div class="input-group input-group-sm mb-3">
      <span class="input-group-text" id="txtcounty">County</span>
      <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" name='txtcounty' value="{$row['county']}">
    </div>
    <div class="input-group input-group-sm mb-3">
      <span class="input-group-text" id="txtcountry">Country</span>
      <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" name='txtcountry' value="{$row['country']}">
    </div>
    <div class="input-group input-group-sm mb-3">
    <span class="input-group-text" id="txtpostcode">Postcode</span>
    <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" name='txtpostcode' value="{$row['postcode']}">
  </div>
   <input type="submit" value="Save" name="submit"/>
   </form>

EOD;

   }

   // render the template
   echo template("templates/default.php", $data);

} else {
   header("Location: index.php");
}

echo template("templates/partials/footer.php");

?>


