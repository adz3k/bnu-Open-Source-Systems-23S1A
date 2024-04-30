<?php

   include("_includes/config.inc");
   include("_includes/dbconnect.inc");
   include("_includes/functions.inc");

  // checks whether we are logged in
   if (isset($_SESSION['id'])) {
   
    // build INSERT query
    // run query
    // x5
     
    $array_students = array(
        array(
         "firstname" => "jon",
       ///etc...
      ),
         array(
        "firstname" => "Tommy",
       ///etc...
      ),   array(
      "firstname" => "Richard",
      ///etc...
      ),   array(
      "firstname" => "Tariq",
       ///etc...
      ),   array(
      "firstname" => "William",
      ///etc...
      ),
      );


      foreach($array_students as $key => $student_array ){
         $student_array['firstname'] ...

       $sql = "INSERT into student 
        table_name (firstname, lastname, column3, ...)
      VALUES ('{$student_array['firstname']}'jackson', value3, ...)";
          $result = mysqli_query($conn,$sql);
      }

   // Build SQL statment that selects a student's modules

  for ($i=0; $i < 5 ; $i++) { 

   $sql = "INSERT into student ....
   INSERT INTO table_name (firstname, lastname, column3, ...)
    VALUES ('jon', 'jackson', value3, ...)";
    $result = mysqli_query($conn,$sql);
  
    }


   }