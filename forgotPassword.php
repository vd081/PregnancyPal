<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Forgot Password | PregnancyPal</title>
	
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
<?php
session_start();
include ("dbConnect.php");
error_reporting(E_ALL);
ini_set('display_errors', 1);

//if form has been submitted process it
if(isset($_POST['submit'])){

	//basic validation
	if(strlen($_POST['Password']) < 3){
		$error[] = 'Password is too short.';
	}

	if(strlen($_POST['confirmPassword']) < 3){
		$error[] = 'Confirm password is too short.';
	}

	if($_POST['Password'] != $_POST['confirmPassword']){
		$error[] = 'Passwords do not match.';
	}

	//if no errors have been created carry on
	if(!isset($error)){


		try {

			$stmt = $conn->prepare("UPDATE Profile SET Password = :password Where EmailAddress=:EmailAddress");
			$stmt->execute(array(
				':password' =>$_POST['Password'],
				':EmailAddress' =>$_POST['EmailAddress'],
			));

		
			ob_start();
			//redirect to index page
			
			echo'<script>window.location = "login.php?action=reset";</script>';
			//header("Location: index.php?action=joined");
			exit;

		//else catch the exception and show the error.
		} catch(PDOException $e) {
			$error[] = $e->getMessage();
		}

	
}
	}
 	
?>

<!---MAIN SECTION--->

<div class="wrap2">
<div class="container">
<div class="title">
      <h1><center>Forgot Password?</h1></center>
	  </div>
<h3><center> Enter in your details and new password and we will get this reset for you!</h3></center>


<form method="POST" action="">
          <div class="contact-form mar-top30">
            <label> <span></span>
			<i class="fa fa-envelope fa-2x" aria-hidden="true"></i>
            <input type="text" class="input_text" name="EmailAddress" id="email" placeholder="Email Address" tabindex="1">
            </label>
			  <label> <span></span>
			<i class="fa fa-key fa-2x" aria-hidden="true"></i>
            <input type="password" class="input_text" name="Password" placeholder="Password"  tabindex="2">
            </label>
			  <label> <span></span>
			<i class="fa fa-key fa-2x" aria-hidden="true"></i>
            <input type="password" class="input_text" name="confirmPassword" placeholder="Confirm Password"  tabindex="3">
            </label>
					   <br></br>
		  <center> <input type="submit" name="submit" value="Reset" class="button-form" tabindex="4"></center>
            </label>
          </div>
        </form>

</div>


<br>

    </div>
  <div class="clearing"></div>  
  </div>
  <div class="clearing"></div>
</div>

<!--- FOOTER --->
<?php
include_once 'footer.php';
?>