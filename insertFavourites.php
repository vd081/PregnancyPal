<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
 include("dbConnect.php");

$query = "INSERT INTO Profile(answerid) SET FavNames VALUES (:answerid) WHERE UserID='{$_SESSION ['currentUserID']}'");
 $stmt = $conn->prepare($query);
 $stmt->execute(
 array(
 'answerid' => $_POST["answerid"]
 )
 );
 $count = $stmt->rowCount();
 if($count > 0)
 {
 echo "Data Inserted Successfully..!";
 }
 else
 {
 echo "Data Insertion Failed";
 }
 }
}
catch(PDOException $error)
{
 echo $error->getMessage();
}
?>