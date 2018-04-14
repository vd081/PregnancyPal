<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
include("dbConnect.php");  

if(empty($_POST['submit'])){
    $file = "default-avatar.jpeg";
    echo "No<br>";  
	

$id =$_SESSION['currentUserID'];
	
if (isset($_POST['submit'])){
	$file = $_FILES['file'];
	
	$fileName = $_FILES['file']['name'];
	$fileTmpName = $_FILES['file']['tmp_name'];
	$fileSize = $_FILES['file']['size'];
	$fileError = $_FILES['file']['error'];
	$fileType = $_FILES['file']['type'];
	
	$fileExt = explode('.', $fileName);
	$fileActualExt = strtolower(end($fileExt));
	
	$allowed = array('jpg', 'jpeg', 'png', 'pdf');
	if(in_array($fileActualExt, $allowed)) {
	if($fileError ===0){
		if ($fileSize <1000000){
			$fileNameNew = "profile".$id.".".$fileActualExt;
	$fileDestination = 'uploads/'. $fileNameNew;	
	move_uploaded_file($fileTmpName, $fileDestination);
	header("Location: myProfile.php?successCode=1");	
	echo "<img src='uploads/profile".$id.".jpg'>";
	}else{
		echo "your file too big";
	}
	}else{
		echo "There was error uploading file";
	}
	}else {
		echo "you cant upload files of this type";
	}
  // Insert record
  	$stmt = $conn->prepare("UPDATE Profile SET ProfilePicture='{$fileName}' WHERE UserID='{$_SESSION ['currentUserID']}'");
     $stmt->execute();
 }


if(isset($_POST['submit'])) {
	echo "<img src='uploads/profile".$id.".jpg'>";
} else {
	echo "<img src='uploads/defeault-profile".jpg'>";
}
<?