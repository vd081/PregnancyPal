<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
//insert.php
include("dbConnect.php");

  
try{
	
$stmt = $conn->prepare('INSERT INTO favourites (nameID,UserID) VALUES (:nameID, :UserID);');
			$stmt->execute(array(
				':nameID' =>$_POST['nameID'],
				':UserID' =>$_POST['UserID']
				));
			$count = $stmt->rowCount();
			if($count > 0 )
			{
				echo "<span style='font-size:100%;color:red;'>❤️";
			}
			else {
				echo "unsuccessful";
			}
}
catch(PDOException $error)
{
	echo $error->getMessage();
}
?>