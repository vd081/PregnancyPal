<?php
session_start();
include ("dbConnect.php");


if(isset($_POST['submit'])){
	try {
			//insert into database with a prepared statement
			$stmt = $conn->prepare('INSERT INTO Profile (FirstName, Password,  EmailAddress, DueDate) VALUES (?,  ?, ?, ?)');
			$stmt->execute(array(
				$_POST['FirstName'],
				$_POST['password'],	
				$_POST['email'],	
				$_POST['dueDate']	
				));
		//$UserID = $conn->lastInsertId('UserID');
			ob_start();
			//redirect to index page
			
			echo'<script>window.location = "index.php?action=joined";</script>';
			//header("Location: index.php?action=joined");
			exit;

		//else catch the exception and show the error.
		} catch(PDOException $e) {
			$error[] = $e->getMessage();
		}

		//if action is joined show sucess
    					//if(isset($_GET['action']) && $_GET['action'] == 'joined'){
    						//echo "<h2>Registration successful</h2>";
	
	}

 	
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
				<li><a href="test.php"> Login</a></li>
    </div>
				
    <div class="menu">

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
      <h1><center>Register Now!</h1></center>
	  </div>



<form method="POST">
          <div class="contact-form mar-top30">
            <label> <span></span>
			<i class="fa fa-user fa-2x" aria-hidden="true"></i>
            <input type="text" class="input_text"  name="FirstName" id="FirstName" placeholder="First Name" tabindex="1">
            </label>
            <label> <span></span>
			<i class="fa fa-envelope fa-2x" aria-hidden="true"></i>
            <input type="text" class="input_text" name="email" id="email" placeholder="Email Address" tabindex="2">
            </label>
            <label> <span></span>
			<i class="fa fa-key fa-2x" aria-hidden="true"></i>
            <input type="password" class="input_text" name="password" placeholder="Password" id="subject" tabindex="3">
            </label>
            <label> <span></span>
			<i class="fa fa-calendar fa-2x" aria-hidden="true" "Due Date"></i>
           <input type="date" class="input_text" name="dueDate" placeholder="Due Date" id="subject" tabindex="4">
		   <br></br>
		   <input type="submit" name="submit" value="Register" class="button-form" tabindex="5">

		
            </label>
          </div>
        </form>

</div>


    </div>
  <div class="clearing"></div>  
  </div>
  <div class="clearing"></div>
</div>

<!---wrap4--->
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
</html>