<?php

   include ("dbConnect.php");
   $number=$_GET["WeekID"];
   $dbQuery=$conn->prepare("select MotherUpdates, BabyUpdates FROM WeekByWeek");
   $dbParams = array('WeekID'=>$number);
   $dbQuery->execute($dbParams);
   echo $number."\n";
      echo $dbQuery->rowCount()."\n";
   while ($dbRow=$dbQuery->fetch(PDO::FETCH_ASSOC)) {
      echo $dbRow["WeekID"]."_".$dbRow["MotherUpdates"]."\n";
   }
?>
   