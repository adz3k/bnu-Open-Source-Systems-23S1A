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



     var_dump($_Post);
     
     //todo: validation here

     //todo: if(fields empty)]
     //display error message

    //$_Post['password']
    //todo: hash the password then use hash password in sql

     $hashed_password = password_hash($_Post['password'],
     PASSWORD_DEFAULT);

      //todo: insert statement

      $sql = "INSERT INTO student (id, dob, firstname, lastname, password, house, town, county, country, postcode)Values('', '', '{ $_POST[firstname]}', '',
       '$hashed_password', '', '', '', '','')";

       echo $sql;

      $result = mysqli_query($conn,$sql);

      $data['content'] = "<p>Student record has been added</p>";

      //could redirect back to students page

   }
 


      // using <<<EOD notation to allow building of a multi-line string
      // see http://stackoverflow.com/questions/6924193/what-is-the-use-of-eod-in-php for info
      // also http://stackoverflow.com/questions/8280360/formatting-an-array-value-inside-a-heredoc
      $data['content'] = <<<EOD

   <h2>Add new students</h2>
   <form name="frmdetails" action="" method="post">

    ID:
   <input name="Id" type="text" value="" /><br/>

   dob:
   <input name="dob" type="text" value="" /><br/>
  
   First Name :
   <input name="firstname" type="text" value="" /><br/>
   Surname :
   <input name="lastname" type="text"  value="" /><br/>

   Password :
   <input name="Password" type="text"  value="" /><br/>
  

   Number and Street :
   <input name="house" type="text"  value="" /><br/>
   Town :
   <input name="town" type="text"  value="" /><br/>
   County :
   <input name="county" type="text"  value="" /><br/>
   Country :
   <input name="country" type="text"  value="" /><br/>
   Postcode :
   <input name="postcode" type="text"  value="" /><br/>
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
