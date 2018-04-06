<!DOCTYPE html PUBLIC">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Food | PregnancyPal</title>
	
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

      <center><h1>Food Reccomendations for you</h1> 
	  <h4> Pick a section you want to see </h4>
	 </center>
	  </div>
<?php if(isset($_GET['action']) && $_GET['action'] == 'Posted'){
    						echo "<i><center><h4>Thanks for completing the questionnaire! Pick any of the categories below to get started!</center></h4>
			</h2>";
}
			else {
				 echo'<h4><center> ..but first click  <a href="FoodQuestionnaire.php"><b> HERE</b> </a> to complete the questionnaire so we can give you reccomdations suitable to you ! </h4></center>';
			}
?>
	 
	 </center>
	  
 </form>
	 
    </body>

  </div>
  
<center>
	        <div input type="button" class="button-section"><a href="Breakfast.php"><h1>Breakfast</h1></a></div>
	       <div input type="button" class="button-section"><a href="Lunch.php"><h1>Lunch</h1></a></div>
	         <div input type="button" class="button-section"><a href="Dinner.php"><h1>Dinner</h1></a></div>
	       <div input type="button" class="button-section"><a href="Snacks.php"><h1>Snacks</h1></a></div>
	      <div input type="button" class="button-section"><a href="foodsToAvoid.php"><h1>Foods to Avoid</h1></a></div>
		  </center>
<div class="wrap 5">
<div class="container" >

<center><i>
Without a doubt, a nutritious, well-balanced eating plan can be one of the greatest gifts you give to your developing baby. Pregnancy nutrition is essential to a healthy baby. Ideally, adopting a healthy eating plan before pregnancy is best. <br>
No matter how many weeks are left on your countdown calendar, it’s never too late to start! Supplying your own body with a tasty blend of nutritious foods can improve your fertility, keep you feeling healthy during pregnancy, and pave the way for an easier labor. <br>
Pregnancy is the one time in your life when your eating habits directly affect another person. Your decision to incorporate delicious vegetables, whole grains and legumes, lean protein, and other wise food choices into your eating plan before and during pregnancy will give your baby a strong start in life.
</center>
<br></i>
<div class="clearing"></div>
<h4><center> ↓ Rules!  ↓</h4></center>
<br>
<p><center>
<h4>
<div class="boxed">
Once you complete the questionnaire, you can select any section you like! You will then have a list of recommended recipes suited to your preferences! You will have 7 days to complete the recipe. This will help challenge you to try and incorporate healthy meals into your diet. 
<br>
However, there is a twist. The quicker you complete the recipe, the more points you will receive. The point system will work as follows: <br>

If completed within:<br><br>
-	1 day: 50pts <br>
-	2 days: 40pts<br>
-	3 days: 30pts<br>
-	4 days: 20pts<br>
-	5 days: 15pts<br>
-	6 days: 10pts<br>
-	7 days: 5pts <br><br>

If you do not complete the recipe within this time, you will get 0 points. <br>

If you reach 60 POINTS, within all the sections, another amazing recipe will be released for you to try!

</div>

</div>
</div>

</div>
<!---Info displayed on baby--->



    </div>
</div>

    </div><br>
<!--- FOOTER --->
<?php
include_once 'footer.php';
?>
