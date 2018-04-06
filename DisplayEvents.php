<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
//insert.php
include("dbConnect.php");
if(isset($_GET['id'])){
				$value = $_GET['id'];
				$dbQuery = $conn->prepare("SELECT * FROM MedicalAppointment WHERE Date ="('.date'));
				$dbQuery->execute($dbParams);
				
				$dbQuery->rowCount()."\n";
			   while ($dbRow=$dbQuery->fetch(PDO::FETCH_ASSOC)) {
				  echo $dbRow["AppointmentType"];
				  echo $dbRow["Date"];
				  echo $dbRow["Time"];
				  echo $dbRow["Notes"];
			   }
			}	
			var_dump( $_GET["id"]);
			var_dump($dbRow["AppointmentType"]);
?>