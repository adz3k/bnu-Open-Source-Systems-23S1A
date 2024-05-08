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

      var_dump($_POST);
     
      //todo: validation here

      //todo: if(fields empty)]
      //display error message

      
  $target_dir = "uploads/";
  $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
  
  // Check if image file is a actual image or fake image
  if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
      echo "File is an image - " . $check["mime"] . ".";
      $uploadOk = 1;
    } else {
      echo "File is not an image.";
      $uploadOk = 0;
    }
  }
  
  // Check if file already exists
  if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
  }
  
  // Check file size
  if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
  }
  
  // Allow certain file formats
  if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
  && $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
  }
  
  // Check if $uploadOk is set to 0 by an error
  if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
  // if everything is ok, try to upload file
  } else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
      echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
    } else {
      echo "Sorry, there was an error uploading your file.";
    }
  }



      $hashed_password = password_hash($_POST['password'], PASSWORD_DEFAULT);

      //todo: insert statement

      $studentid = mysqli_real_escape_string($conn, $_POST['studentid']);
      $dob = mysqli_real_escape_string($conn, $_POST['dob']);
      $firstname = mysqli_real_escape_string($conn, $_POST['firstname']); 
      $lastname= mysqli_real_escape_string($conn, $_POST['lastname']);
      $password = mysqli_real_escape_string($conn, $_POST['password']);
      $house = mysqli_real_escape_string($conn, $_POST['house']);
      $town = mysqli_real_escape_string($conn, $_POST['town']);
      $county = mysqli_real_escape_string($conn, $_POST['county']);
      $country = mysqli_real_escape_string($conn, $_POST['country']);
      $postcode = mysqli_real_escape_string($conn, $_POST['postcode']);
      // $images = mysqli_real_escape_string($conn, $_POST['images']);

      $sql="INSERT INTO student (studentid, dob, firstname, lastname, password, house, town, county, country, postcode, images) VALUES ('$studentid', '$dob', '$firstname','$lastname', '$hashed_password', '$house','$town', '$county', '$country','$postcode', '$target_file')";
   

    //  $sql = "INSERT INTO student (studentid, dob, firstname, lastname, password, house, town, county, country, postcode, images)Values('{$_POST['id']}', '{$_POST['dob']}', '{$_POST['firstname']}', '{$_POST['lastname']}', '$hashed_password', '{$_POST['house']}', '{$_POST['town']}', '{$_POST['county']}', '{$_POST['country']}', '{$_POST['postcode']}','$target_file')";

      // echo $sql;

      $result = mysqli_query($conn,$sql);

      $data['content'] = "<p>Student record has been added</p>";

      //could redirect back to students page
   }

   // using <<<EOD notation to allow building of a multi-line string
   // see http://stackoverflow.com/questions/6924193/what-is-the-use-of-eod-in-php for info
   // also http://stackoverflow.com/questions/8280360/formatting-an-array-value-inside-a-heredoc
   $data['content'] = <<<EOD

   <h2>Add new students</h2>
   <form enctype="multipart/form-data" action="" method="post">
<div class="input-group input-group-sm mb-3">
      <span class="input-group-text" id="id">ID</span>
      <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" name='studentid'>
    </div><div class="input-group input-group-sm mb-3">
      <span class="input-group-text" id="dob">Dob</span>
      <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" name='dob'>
    </div>
    <div class="input-group input-group-sm mb-3">
      <span class="input-group-text" id="firstname">First name</span>
      <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" name='firstname'>
    </div>
    <div class="input-group input-group-sm mb-3">
      <span class="input-group-text" id="lastname">Surname</span>
      <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" name='lastname'>
    </div>
    <div class="input-group input-group-sm mb-3">
      <span class="input-group-text" id="Password">Password</span>
      <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" name='password'>
    </div>
    <div class="input-group input-group-sm mb-3">
      <span class="input-group-text" id="house">Number&Street</span>
      <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" name='house'>
    </div><div class="input-group input-group-sm mb-3">
      <span class="input-group-text" id="town">Town</span>
      <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" name='town'>
    </div>
    <div class="input-group input-group-sm mb-3">
      <span class="input-group-text" id="county">County</span>
      <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" name='county'>
    </div>
    <div class="input-group input-group-sm mb-3">
      <span class="input-group-text" id="country">Country</span>
      <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" name='country'>
    </div>
    <div class="input-group input-group-sm mb-3">
      <span class="input-group-text" id="postcode">Postcode</span>
      <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" name='postcode'>
    </div>
    <div class="input-group input-group-sm mb-3">
    <span class="input-group-text" id="fileToUpload">image upload</span>
    <input type="file" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" name='fileToUpload'>
  </div>
    <div class="mb-3 form-check">
  <input type="submit" name="submit" class="btn btn-primary" value="Save"/>
  </form>
EOD;




   // render the template
   echo template("templates/default.php", $data);

} else {
   header("Location: index.php");
}

echo template("templates/partials/footer.php");

?>
