<?php
	error_reporting(E_ALL ^ E_DEPRECATED);
	
   session_start();
   
   unset($_SESSION["currentUser"]);
   unset($_SESSION["currentUserID"]);

   if (isset($_POST["login"])) {

      $formUser=$_POST["EmailAddress"];
      $formPass=$_POST["Password"];

      include("dbConnect.php");
      $dbQuery=$conn->prepare("select * from Profile where EmailAddress=:formUser"); 
      $dbParams=array('formUser'=>$formUser);
      $dbQuery->execute($dbParams);
      $dbRow = $dbQuery->fetch(PDO::FETCH_ASSOC);
      if ($dbRow["EmailAddress"]==$formUser) {       
         if ($dbRow["Password"]==$formPass) {
            $_SESSION["currentUser"]=$formUser;
            $_SESSION["currentUserID"]=$dbRow["UserID"];
			$_SESSION["currentUserForename"]=$dbRow["FirstName"];
			$_SESSION["currentUserDueDate"]=$dbRow["DueDate"];
      header("Location: index.php");    
         }//ifPassword
      }//email
	  else 
	  {
            header("Location: login.php?failCode=1");
      }//ifLoginIsWrong
   }//ifLogin 
   else 
   {
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
      <h1><center>Login!</h1></center>
	  </div>
	  
<?php
//ErrorMessage
   if (isset($_GET["failCode"])) {
      if ($_GET["failCode"]==1)
         echo "<h3>Incorrect email or password entered, please try again</h3>"; 
   }      
?>             

<form name="login" method="post" action="login.php">
          <div class="contact-form mar-top30">
            <label> <span></span>
			<i class="fa fa-envelope fa-2x" aria-hidden="true"></i>
            <input type="text" class="input_text" name="EmailAddress" id="emailAddress" placeholder="Email Address" tabindex="2">
            </label>
            <label> <span></span>
			<i class="fa fa-key fa-2x" aria-hidden="true"></i>
            <input type="password" class="input_text" name="Password" placeholder="Password" id="password" tabindex="3">
            </label>
		<i><center><a href="forgotPassword.php">Forgot Password?</a></li></center></i>
		   <br></br>
		  <center> <input type="submit" name="login" value="Login" class="button-form" tabindex="5"></center>
            </label>
          </div>
        </form>
		<br>
 <center> New to PregnancyPal?<div input type="button" class="button-form"><a href="Register.php">Register Now</a></li></center>

</div>
 </div>
  <div class="clearing"></div>  
  </div>
  <div class="clearing"></div>
</div>

<!---FOOTER --->
<div class="wrap3">
<div class="container">
  <div class="footer">


      <h1>Follow us</h1>
	  
	<a href="https://www.facebook.com/pregnancy.pal.39"><img src="E:\Final Year\Project\PregnancyPal\PregnancyPal\images\twitter.png" /></a>
					<img src="U:\Project\PregnancyPal\images\twitter.png" id="Twitter"></a>

				
					<a href="https://twitter.com/PregnancyPal" id="facebook"></a>
		
				
	<div class="clearing"></div>
</div>
</div>
<div class="shadows2">
</div>
</body>
</html>

<?php
}
?>
