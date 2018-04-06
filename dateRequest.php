<?php 
if(isset($_GET['.date'])){
				//var_dump('SUBMITTED');
				$value = $_GET['id'];
				$dbQuery = $conn->prepare("SELECT * FROM MedicalAppointment WHERE Date =".attr('id'));
				$dbQuery->execute($dbParams);
				
				$dbQuery->rowCount()."\n";
			   while ($dbRow=$dbQuery->fetch(PDO::FETCH_ASSOC)) {
				  echo $dbRow["AppointmentType"];
				  echo $dbRow["Date"];
				  echo $dbRow["Time"];
				  echo $dbRow["Notes"];
			   }
			}	
			var_dump( $dbRow["Date"]);
			var_dump($dbRow["AppointmentType"]);
		?>