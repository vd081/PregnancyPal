<?php

	error_reporting(E_ALL ^ E_DEPRECATED);

	
	if(isset($_POST['user'])) {
		$username = $_POST['user'];
		$password = $_POST['pass'];
		
	  include("dbConnect.php");
		
		$result = mysql_query("select * from Profile where EmailAddress# = '$username' and Password = '$password'")
					or die("Failed to query datbase ".mysql_error());
		$row = mysql_fetch_array($result);
		if ($row['EmailAddress'] == $username && $row['Password'] == $password ){
			echo "Login sucess!!! Welcome  ".$row['username'];
		} else {
			header("Location: index.php");
		} 	
	}
	
?>

<html>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Login | PregnancyPal</title>
	
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

<!-- TOP NAVIGATION BAR-->

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
				<li><a href="login.php"> Login</a></li>
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
      <h1><center>Login!</h1></center>
	  </div>
</head>

<?php
   if (isset($_GET["failCode"])) {
      if ($_GET["failCode"]==1)
         echo "<h3>Incorrect email or password entered, please try again</h3>"; 
   }      
?>    
  
<body>
<div class="container">
      
<form name="login" method="post" action="login.php">
  <div>Student Username<br>
  <input type="text" name="EmailAddress"></div>

  <div>Student Password<br>
  <input type="password" name="Password"></div>

  <div>
		<input type="submit" id="btn" name='login' value="Login" />
  
</form>
  

</div>
</div>
					</center>	
				</form>	
			</div>
	</section>
	
	</div>

</select>


	<br>

</body>

</html>
<?php
}
?>