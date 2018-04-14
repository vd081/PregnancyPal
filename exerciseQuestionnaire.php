<?php
ob_start()
?>
<html>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Exercise Questionnaire | PregnancyPal</title>
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
<?php
//error_reporting(E_ALL);
//ini_set('display_errors', 1);

session_start();
include ("dbConnect.php");


if(isset($_POST['submit'])){
	
try{
$UserID = $_SESSION['currentUserID'];	

$stmt = $conn->prepare('INSERT INTO ExerciseQuestionnaireResults (UserID, Date, E1, E2, E3, E4, E5, E6) VALUES (:UserID, NOW(), :E1, :E2, :E3, :E4, :E5, :E6);');
		$stmt->execute(array(
             ':E1' => isset($_POST['E1']) ? 1 : 0,
            ':E2' => isset($_POST['E2']) ? 1 : 0, 
            ':E3' => isset($_POST['E3']) ? 1 : 0,
            ':E4' => isset($_POST['E4']) ? 1 : 0,
            ':E5' => isset($_POST['E5']) ? 1 : 0,
            ':E6' => isset($_POST['E6']) ? 1 : 0,
		   // ':E7' => isset($_POST['E7']) ? 1 : 0,
			//':E8' => isset($_POST['E8']) ? 1 : 0,
			//':E9' => isset($_POST['E9']) ? 1 : 0,
			':UserID' =>$UserID
				));
			$count = $stmt->rowCount();
			if($count > 0 )
			{
				echo'<script>window.location = "exercise.php?action=Posted";</script>';
				//header("Location: index.php?action=joined");
			exit;
			}
			else {
				echo "unsuccessful";
			}
}
catch(PDOException $error)
{
	echo $error->getMessage();
}
}
?>

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
<?php

  if (!isset($_SESSION["currentUser"])) 
     header("Location: login.php");

?>

<!---MAIN SECTION--->

<div class="wrap2">
<div class="container">
<div class="title">
      <h1><center>Exercise Questionnaire</h1></center>
	  </div>
	  
	  <center><h4> In order to give Exercise reccomendations, please tell us a little more about you!</h4><b> You may pick as many options for each answer as you want!</center>
<br><br>
<form method="POST">
<div class="checkboxes-exercise">

 <h1>Question</h1><br>
 </br> 
  <h4>What types of exercises do you like? Pick as many as you like</h4><br>
  <input type="checkbox" name="E1" value="Walking"> Walking   <br><br>
  <input type="checkbox" name="E2" value="Running" > Running  <br><br>
  <input type="checkbox" name="E3" value="Swimming"> Swimming   <br><br>
  <input type="checkbox" name="E4" value="Yoga" > Yoga  <br><br>
  <input type="checkbox" name="E5" value="Pilates" > Pilates   <br><br>
  <input type="checkbox" name="E6" value="WeightTraining" > Weight Training  <br><br>
  
 	   <br><center><input type="submit"name="submit"value="save" class="button-form"></center></br>
	   
	   </b>
</div>
</div>


<!--- FOOTER --->
<?php
include_once 'footer.php';
?>
</html>
</body>
</html>
</html>