<?php
 session_start();
  if (!isset($_SESSION["currentUser"])) 
     header("Location: login.php");

?>
<?php
ob_start()
?>
<html>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>My Profile | PregnancyPal</title>
<link href="css/styles.css" rel="stylesheet" type="text/css" />
<link href='http://fonts.googleapis.com/css?family=Economica' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
<!----menu--->
<link rel="stylesheet" href="css/superfish.css" media="screen">
<script src="js/jquery-1.9.0.min.js"></script>
<script src="js/hoverIntent.js"></script>
<script src="js/superfish.js"></script>
<script src="https://use.fontawesome.com/df026a8165.js"></script>
<script>

		// initialise plugins
		jQuery(function(){
			jQuery('#example').superfish({
				//useClick: true
			});
		});

		</script>

</head>
<body>

<!-- TOP NAVIGATION BAR -->

<div class="wrap1">
<div class="container">
  <div class="header">
		<a href="index.html" class="logo">
			<center><img src="images/logo.png" alt="Logo"></center>
    <div class="logo">
    </div>
	
   <div class="submenu">
   <ul class="sf-menu" id="">
		 <li><a href="Register.php">Register|</a></li>
				<li><a href="Login.php"> Login</a></li>
    </div>
				
    <div class="menu">
      <ul class="sf-menu" id="example">
        <li><a href="myProfile.php">My Profile</a></li>
		  <li><a href="Appointments.php"> Appointments</a></li>
		    <li><a href="weekByWeek.php">Week to Week</a></li>
			  <li><a href="Exercise.php">Exercise</a></li>
			    <li><a href="Food.php">Food</a></li>
				<li><a href="babyNameFinder.php">Baby Names</a></li>
     
      </ul>
    </div>
  </div>
  <div class="clearing"></div>
</div>
<div class="clearing"></div>
</div>


<!---MAIN SECTION--->

<div class="wrap2">
<div class="container">
<div class="title">
      <h1><center>My Profile</h1></center>
	  </div>

<!-- User to upload Picture -->
<div class="rightcol">

<?php
session_start();
include("dbConnect.php"); 

if(isset($_SESSION ['currentUserID'])){ 
echo "<h4><b><u> Upload an image of yourself here!</h4></u></b><br>
	 <form action='myProfile.php' method='POST' enctype='multipart/form-data'>
		<input type='file' name='file'>
		<br><br><button type='submit' name='submit'>Upload photo</button>
 </form>";
 echo "<form action='deleteProfile.php' method='POST'
		<br><br><button type='submit' name='submit'>Delete Profile Photo</button>
 </form>";
}
error_reporting(E_ALL);
ini_set('display_errors', 1);
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
  	$stmt = $conn->prepare("UPDATE Profile SET ProfilePicture='{$fileNameNew}' WHERE UserID='{$_SESSION ['currentUserID']}'");
     $stmt->execute();
 }
//SuccessMessage
   if (isset($_GET["successCode"])) {
      if ($_GET["successCode"]==1)
         echo "<h3>Profile Picture uploaded!</h3> ";       
   }
   //Display Image for User
   $stmt = $conn->query('SELECT ProfilePicture FROM Profile WHERE UserID='.$_SESSION ['currentUserID']);
while($image =$stmt->fetch(PDO::FETCH_ASSOC)) {
echo "<img src=uploads/".$image['ProfilePicture']."' width='150' height='150'/>";
$profileimage = $image['ProfilePicture'];
}

//get favourite baby names
 

$stmt = $conn->query('SELECT nameID FROM favourites WHERE UserID='.$_SESSION ['currentUserID']);
while($FavName =$stmt->fetch(PDO::FETCH_ASSOC)) {
$name = $FavName['nameID'];

}

?>
</div>
 <!-- USER DETAILS DISPLAYED -->
	  <pre id="tab1">
<h4><b>First Name:</b><u><?php echo $_SESSION["currentUserForename"]; ?><br><br></h4></u>
<h4><b>Email Address: </b><u><?php echo $_SESSION["currentUser"]; ?><br><br><h4></u>
<h4><b>Due Date:</b> <u><?php echo $_SESSION["currentUserDueDate"];?><br><br></h4></u>
<h4><b>Favourite Baby Names:</b> <u><?php echo $name ;?><br><br></h4></u>
<h4><b>Points: </b></h4>
</div>
<br>
<br>
<br><br><br><br><br><br><br><br><br><br><br>
<br>
<br>
<br>
<br>

  <div class="clearing"></div>  
  </div>
  <div class="clearing"></div>
</div>

<!--- FOOTER --->
<?php
include_once 'footer.php';
?>
</html>
</body>
</html>
</html>