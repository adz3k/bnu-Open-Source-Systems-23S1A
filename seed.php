<?php

   include("_includes/config.inc");
   include("_includes/dbconnect.inc");
   include("_includes/functions.inc");

  // checks whether we are logged in
   if (isset($_SESSION['id'])) {
   

       $sql = "INSERT into student (`studentid`, `password`, `dob`, `firstname`, `lastname`, `house`, `town`, `county`, `country`, `postcode`)
      VALUES ('3000001','won', '1997-09-03', 'michael', 'murray','33 Thame house', 'Reading', 'bucks', 'uk', 're11at')";
          $result = mysqli_query($conn,$sql);
      
     $sql = "INSERT into student (`studentid`, `password`, `dob`, `firstname`, `lastname`, `house`, `town`, `county`, `country`, `postcode`)
     VALUES ('3000002','ten', '1995-09-03', 'kelly', 'ireland','33 London Valley', 'Reading', 'bucks', 'uk', 're11ut')";
              $result = mysqli_query($conn,$sql);
      
       $sql = "INSERT into student (`studentid`, `password`, `dob`, `firstname`, `lastname`, `house`, `town`, `county`, `country`, `postcode`)
       VALUES ('3000003','lol', '1992-07-03', 'bradley', 'ake','16 Ballyogan vale', 'Milton keynes', 'bucks', 'uk', 'mk92ab')";
                  $result = mysqli_query($conn,$sql);
         
      $sql = "INSERT into student (`studentid`, `password`, `dob`, `firstname`, `lastname`, `house`, `town`, `county`, `country`, `postcode`)
         VALUES ('3000004','yok', '2000-06-02', 'John', 'cranny','213 Richards Crescent', 'Milton keynes', 'bucks', 'uk', 'mk11at')";
                $result = mysqli_query($conn,$sql);

       $sql = "INSERT into student (`studentid`, `password`, `dob`, `firstname`, `lastname`, `house`, `town`, `county`, `country`, `postcode`)
          VALUES ('3000005','ken', '2002-09-03', 'willow', 'tennese','10 brendon vale', 'High wycombe', 'bucks', 'uk', 'hp11bn')";
             $result = mysqli_query($conn,$sql);
                        
                  

     // INSERT INTO `student` (`studentid`, `password`, `dob`, `firstname`, `lastname`, `house`, `town`, `county`, `country`, `postcode`) VALUES ('12345678', '', '1997-09-03', 'melanie', 'wok',
      // '71 London avenue', 'Reading', 'bucks', 'uk', 're11bt');
   // Build SQL statment that selects a student's modules



   }