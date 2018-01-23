
<?php 
?>


<!DOCTYPE html PUBLIC">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Home | PregnancyPal</title>
	
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
<!---header-wrap--->

<div class="wrap2">
<div class="container">
<div class="title">
<!---- MAIN SECTION--->

      <center><h1>Your Pregnancy Week by Week</h1> 
	  <h4> all you need to know what's happening with you and your baby</h4></center>
	  </div>
	  
	  
<?php   
 
   include ("dbConnect.php");
   
 // $weekID=$_GET["WeekID"];
  // $dbQuery=$conn->prepare("select MotherUpdates, BabyUpdates from WeekByWeek where weekID=:WeekID");
   //$dbParams = array('weekID'=>$WeekID);
   // $dbQuery->execute($dbParams);
  // echo $WeekID."\n";
   //   echo $dbQuery->rowCount()."\n";
 //  while ($dbRow=$dbQuery->fetch(PDO::FETCH_ASSOC)) {
   //   echo $dbRow["WeekID"]."_".$dbRow["MotherUpdates"]."_".$dbRow["BabyUpdates"]."\n";
//   }
  
// for ($button = 0; $button <=40; $button= $button + 1) {
       // echo "$button";
		//echo "<center><button type='button' </center>";
		
 //}
	?>
		
	 
    </body>

  </div>
<div class="clearing"></div>
</div>
</div>

<!---Info displayed on baby--->

<div class="wrap1 ">
  <div class="container">
    <div class="title">
      <h2>What's happening with your baby!</h2>
 
      </div>
      <div class="content">
     
	   <? echo $week; ?>

    </div>

    </div>


<!---Info displayed on mother --->
<div class="wrap1 ">
  <div class="container">
    <div class="title">
      <h2>What's happening with you!</h2>
 
      </div>
      <div class="content">
       <i> information here</i>

    </div>


    </div>
<!---FOOTER --->

<div class="wrap3">
<div class="container">
  <div class="footer">


      <h2>Follow us</h2>
	
					<a href="https://www.facebook.com/pregnancy.pal.39"><img src="E:\Final Year\Project\PregnancyPal\PregnancyPal\images\twitter.png" id="twitter"> </a>

				
					<a href="http://freewebsitetemplates.com/go/facebook/" id="facebook"></a>
		
				
	<div class="clearing"></div>
</div>
</div>
<div class="shadows2">
</div>
</body>
</html>
