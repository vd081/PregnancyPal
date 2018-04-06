<?php
 session_start();
  if (!isset($_SESSION["currentUser"])) 
     header("Location: login.php");

?>
<!DOCTYPE html PUBLIC">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Week By Week | PregnancyPal</title>
	
<link href="css/styles.css" rel="stylesheet" type="text/css" />
<link href='http://fonts.googleapis.com/css?family=Economica' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
<!----menu--->
<link rel="stylesheet" href="css/superfish.css" media="screen">
<script src="js/jquery-1.9.0.min.js"></script>
<script src="js/hoverIntent.js"></script>
<script src="js/superfish.js"></script>
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
  
<div class="wrap1">
<div class="container">
  <div class="header">
  
<!---- NAVIGATION BAR--->

		<a href="index.php" class="logo">
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
<!---header-wrap--->

<div class="wrap2">
<div class="container">
<div class="title">

<!---- MAIN SECTION--->

      <center><h1>Your Pregnancy Week by Week</h1> 
	  <h4> all you need to know what's happening with you and your baby</h4></center>
	  </div>
	  
	  
<?php
  //weeks 1-40 Buttons
  echo "<form method='POST'>";;
for ($button = 1; $button <=40; $button ++) {
		echo "<button type='submit' name='week' class='button-week' value=".$button.">".$button."</button>";
 }
 //Display Week selected
   if (isset($_POST["week"]))
   {
       echo " \r\n <h4><center><p>Week  ";  $_POST["week"];
		echo $_POST["week"];
   }


//Get Week Photo
$dir_path = "WeekByWeekPhotos/";
$extensions_array = array('jpg','png','jpeg');


if(isset($_POST['week'])) {
	$imageName = $_POST['week'] . ".jpg";
} else {
	$imageName = "1.jpg";
}
echo "<center><img src='$dir_path$imageName' style='width:650px;height:400px;'></center><br>";   
 
   include ("dbConnect.php");
  
  $weekID=$_GET["WeekID"];
   $dbQuery=$conn->prepare("select * FROM WeekByWeek");
   $dbParams = array('weekID'=>$WeekID);
   $dbQuery->execute($dbParams);
;
   while ($dbRow=$dbQuery->fetch(PDO::FETCH_ASSOC)) {
   }

 ?>
 </form>
	 
    </body>

  </div>
<div class="clearing"></div>
</div>
</div>
</div>
<!---Info displayed on baby--->

<div class="wrap1 ">
  <div class="container">
    <div class="title">
      <h2>What's happening with your baby!</h2>
      </div>
      <div class="content">
        <div class="week">
		
		<?php 
			if(isset($_POST['week'])){
				//var_dump('SUBMITTED');
				$value = $_POST['week'];
				$dbQuery = $conn->prepare("SELECT BabyUpdates, MotherUpdates FROM WeekByWeek WHERE WeekID =".$value);
				$dbQuery->execute($dbParams);
				
				$dbQuery->rowCount()."\n";
			   while ($dbRow=$dbQuery->fetch(PDO::FETCH_ASSOC)) {
				  echo $dbRow["BabyUpdates"];
				  	   //Display with Paragraph Spacing
				  echo nl2br($BabyUpdates);
				  $motherUpdates = $dbRow["MotherUpdates"];
				   
			   }
			}	
		?>
</div>
    </div>

    </div>


<!---Info displayed on mother --->
<div class="wrap1 ">
  <div class="container">
    <div class="title">
      <h2>What's happening with you!</h2>
 
      </div>
	       <div class="week">
      <div class="content">
       <? echo $motherUpdates;
	   //Display with Paragraph Spacing
	    echo nl2br($motherUpdates);
	   ?>

    </div>
</div>

    </div><br>
<!--- FOOTER --->
<?php
include_once 'footer.php';
?>
