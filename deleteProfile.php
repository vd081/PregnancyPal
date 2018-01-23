<?php
session_start();
include("dbConnect.php"); 
header("Location:myProfile.php?")
$sessionid = $_SESSION['currentUserID'];

$filename = "uploads/profile".$sessionid. "*";
$fileinfo = glob($filename); //all files matches the search above
//Where we want to explode and which string we want to explode
$fileext = explode(".", $fileinfo[0]); // first result from array from glob search
$fileactualext = $fileext[1]; // e.g actual ext equal to for example jpeg

$file = "uploads/profile".$sessionid. ".". $fileactualext;

//delete file 
if (!unlink($file)){
	echo "File was not deleted";
}else{
	echo "file was deleted!";
}
$stmt = $conn->prepare("UPDATE Profile SET ProfilePicture='{$fileNameNew}' WHERE UserID='{$sessionid}'");
 $stmt->execute();
header("Location:myProfile.php?deletesuccess=1")
?>