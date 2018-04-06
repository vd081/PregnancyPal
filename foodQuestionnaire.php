<?php
ob_start()
?>
<html>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Food Questionnaire | PregnancyPal</title>
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
$StartDate=

$stmt = $conn->prepare('INSERT INTO FoodQuestionnaireResults (UserID, Date, B1, B2, B3, B4, B5, B6, B7, B8, B9, L1, L2, L3, L4, L5, L6, L7, L8, D1, D2, D3, D4, D5, D6, D7, D8, D9, S1, S2, S3, S4, S5, S6) VALUES (:UserID, NOW(), :B1, :B2, :B3, :B4, :B5, :B6, :B7, :B8, :B9, :L1, :L2, :L3, :L4, :L5, :L6, :L7, :L8, :D1, :D2, :D3, :D4, :D5, :D6, :D7, :D8, :D9, :S1, :S2, :S3, :S4, :S5, :S6);');
		$stmt->execute(array(
             ':B1' => isset($_POST['B1']) ? 1 : 0,
            ':B2' => isset($_POST['B2']) ? 1 : 0, 
            ':B3' => isset($_POST['B3']) ? 1 : 0,
            ':B4' => isset($_POST['B4']) ? 1 : 0,
            ':B5' => isset($_POST['B5']) ? 1 : 0,
            ':B6' => isset($_POST['B6']) ? 1 : 0,
		    ':B7' => isset($_POST['B7']) ? 1 : 0,
			':B8' => isset($_POST['B8']) ? 1 : 0,
			':B9' => isset($_POST['B9']) ? 1 : 0,
			':L1' => isset($_POST['L1']) ? 1 : 0,
			':L2' => isset($_POST['L2']) ? 1 : 0,
			':L3' => isset($_POST['L3']) ? 1 : 0,
			':L4' => isset($_POST['L4']) ? 1 : 0,
			':L5' => isset($_POST['L5']) ? 1 : 0,
			':L6' => isset($_POST['L6']) ? 1 : 0,
			':L7' => isset($_POST['L7']) ? 1 : 0,
			':L8' => isset($_POST['L8']) ? 1 : 0,
			':D1' => isset($_POST['D1']) ? 1 : 0,			
			':D2' => isset($_POST['D2']) ? 1 : 0,
			':D3' => isset($_POST['D3']) ? 1 : 0,
			':D4' => isset($_POST['D4']) ? 1 : 0,
			':D5' => isset($_POST['D5']) ? 1 : 0,
			':D6' => isset($_POST['D6']) ? 1 : 0,
			':D7' => isset($_POST['D7']) ? 1 : 0,
			':D8' => isset($_POST['D8']) ? 1 : 0,
			':D9' => isset($_POST['D9']) ? 1 : 0,
			':S1' => isset($_POST['S1']) ? 1 : 0,
			':S2' => isset($_POST['S2']) ? 1 : 0,
			':S3' => isset($_POST['S3']) ? 1 : 0,
			':S4' => isset($_POST['S4']) ? 1 : 0,
			':S5' => isset($_POST['S5']) ? 1 : 0,
			':S6' => isset($_POST['S6']) ? 1 : 0,
			':UserID' =>$UserID
				));
			$count = $stmt->rowCount();
			if($count > 0 )
			{
				echo'<script>window.location = "food.php?action=Posted";</script>';
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
      <h1><center>Food Questionnaire</h1></center>
	  </div>
	  
	  <center><h4> In order to give food reccomendations, please tell us a little more about you!</h4><b> You may pick as many options for each answer as you want!</center>
<br><br>
<form method="POST">
<div class="checkboxes">

 <h1>Question 1</h1><br>
 </br>
  <h4> What types of food do you like to eat for Breakfast?</h4><br>
  <input type="checkbox" name="B1" value="Cheese">Cheese
  <input type="checkbox" name="B2" value="Yoghurt" >Yogurt
  <input type="checkbox" name="B3" value="Eggs">Eggs
  <input type="checkbox" name="B4" value="Fruit" >Fruit
  <input type="checkbox" name="B5" value="Cereal" >Cereal 
  <input type="checkbox" name="B6" value="Oatmeal" >Oatmeal
  <input type="checkbox" name="B7" value="Granola" >Granola
   <input type="checkbox" name="B8" value="bread">Bread
      <input type="checkbox" name="B9" value="bread">Avocado
  <br></br>
  
 <h1>Question 2 - Lunch </h1><br></br>
  <h4> What types of food do you like to eat for Lunch?</h4><br>
  <input type="checkbox" name="L1" value="Soup">Soup
  <input type="checkbox" name="L2" value="Rice">Rice
  <input type="checkbox" name="L3" value="Pasta" >Pasta
  <input type="checkbox" name="L4" value="Salad">Salad
  <input type="checkbox" name="L5" value="Fruit">Fruit
  <input type="checkbox" name="L6" value="Sandwich" >Sandwich
  <input type="checkbox" name="L7" value="Burger" >Burger
  <input type="checkbox" name="L8" value="Burrito" >Burrito
  </br>
   
  
    <br></br>
	
 <h1>Question 3 - Dinner </h1><br></br>
  <h4> What types of food do you like to eat Dinner?</h4><br>
  <input type="checkbox" name="D1" value="Pasta">Pasta
  <input type="checkbox" name="D2" value="Rice">Rice
  <input type="checkbox" name="D3" value="Chicken" >Chicken
  <input type="checkbox" name="D4" value="Salmon">Fish
  <input type="checkbox" name="D5" value="Pork">Pork
  <input type="checkbox" name="D6" value="Salad" >Salad
  <input type="checkbox" name="D7" value="Pizza" >Pizza
  <input type="checkbox" name="D8" value="Burger" >Burger
    <input type="checkbox" name="D9" value="Beef" >Beef
	</br>
    <br></br>
	
 <h1>Question 4 - Snacks</h1><br></br>
  <h4> What types of food do you like to eat for Snacks?</h4><br>
	  <input type="checkbox" name="S1" value="">
  <input type="checkbox" name="S2" value="Fruit">Fruit
  <input type="checkbox" name="S3" value="Yogurt" >Yogurt
  <input type="checkbox" name="S4" value="Smoothie">Smoothie
  <input type="checkbox" name="S5" value="Crackers">Crackers
  <input type="checkbox" name="S6" value="Walnuts" >Nuts
  <input type="checkbox" name="S6" value="Biscuits" >Biscuits
  
  </br>
<br>
<script src="daysleft.js"></script>
 	   <br><center><input type="submit"name="submit"value="save" class="button-form"></center></br>
	   
	   </b>
</div>
</div>
<?php                                                                                                                                                                        
         $StartDate = date("l, F jS, Y");
?>

<!--- FOOTER --->
<?php
include_once 'footer.php';
?>
</html>
</body>
</html>
</html>