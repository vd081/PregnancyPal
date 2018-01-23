<?php
session_start();
include("dbConnect.php"); 
$sessionid = $_SESSION['UserID'];

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

header("Location:myProfile.php?deletesuccess")

?>