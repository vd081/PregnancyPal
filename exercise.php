<!DOCTYPE html PUBLIC">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Exercise | PregnancyPal</title>
	
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

      <center><h1>Exercise Reccomendations for you</h1> 
	  <h4> Pick a section you want to see </h4>
	 </center>
	  </div>
<?php if(isset($_GET['action']) && $_GET['action'] == 'Posted'){
    						echo "<center><h4>Thanks for completing the questionnaire! Select the button below to recieve all your exercise recommendations!</center></h4>
			</h2>";
}
			else {
				 echo'<h4><center> ..but first click  <a href="ExerciseQuestionnaire.php"><b> HERE</b> </a> to complete the questionnaire so we can give you reccomdations suitable to you ! </h4></center>';
			}
?>
	 
	 </center>
	  
 </form>
	 
    </body>

  </div>
  
<center>

<?
include("dbConnect.php");
$UserID  = $_SESSION['currentUserID'];

//Get all Yoga recipes
        $dbQuery=$conn->prepare("select ExerciseCategory FROM Exercise");
	   $dbQuery->execute();

//define all options for exercise

$K1      = ("Walking");
$K2      = ("Running");
$K3      = ("Swimming");
$K4      = ("Yoga");
$K5      = ("Pilates");
$K6      = ("WeightTraining");

while ($dbRow=$dbQuery->fetch(PDO::FETCH_ASSOC)) //loop through all keywords 1-9
{
    for($number = 1; $number<=9; ++$number) {
        $Exercise= "E$number";
        $$Exercise = $dbRow[$Exercise];
    }
}
for($number = 1; $number<=9; ++$number) {
    $Category = "K$number"; //define keyword
    $Exercise = "E$number"; //define lunch ID
    if ($$Exercise == '1')  //whether the user selected the keyword. (1=True)
    {
        $dbQuery=$conn->prepare("select * from Exercises where ExerciseCategory = '".($$Category)."'"); //get all recipes where keyword = word user selected
        $dbQuery->execute();


while($dbRow=$dbQuery->fetch(PDO::FETCH_ASSOC)) {
	
	//if ( $cnt == $max ) break;
	
	$class= "incomplete hide";

	if ( ! in_array( $dbRow["RecipeID"], $user_already_select ) ){
		
		 echo '<div id="'.$dbRow["RecipeID"].'" data-finish="false" class="'.$class.'">
		 <h4><div>'.$dbRow["RecipeName"].
         '</div></h4><br><img src="Breakfast/'.$dbRow['RecipePicture'].'" width="150" height="150" />
			</b><br><br><p>'.$dbRow["RecipeInstructions"].'<br><br>
			<form method="POST" action="">
			<input type="hidden" name="RecipeID" value="'.$dbRow['RecipeID'].'">
			<input type="hidden" name="User_ID" value="'.$UserID.'">
			<input type="hidden" name="RecipeID" value="'.$dbRow["RecipeID"].'">
			<input type="hidden" name="completed" value="true">
			<input type="submit" name="submit" value="Completed Recipe" class="button-recipe"id='.$dbRow["RecipeID"].'">
			</form></div></p>';

	
	}      
	 $cnt++;	
	
}
	}
}

?>
<div input type="button" class="button-section"><a href="yoga.php"><h1>Yoga</h1></a></div>
<div input type="button" class="button-section"><a href="pilates.php"><h1>Pilates</h1></a></div>
<div input type="button" class="button-section"><a href="Aerobic.php"><h1>Aerobic</h1></a></div>
	        <div input type="button" class="button-section"><a href="weight.php"><h1>Weight/Strength</h1></a></div>
	      <div input type="button" class="button-section"><a href="exercisesToAvoid.php"><h1>Exercises to Avoid</h1></a></div>
		  </center>
<div class="wrap 5">
<div class="container" >

<center><i><p>
There are numerous potential health benefits for women who exercise during pregnancy, including better weight control, improved mood and maintenance of fitness levels. Regular exercise during pregnancy can also decrease the risk of pregnancy-related complications such as pregnancy-induced hypertension and pre-eclampsia.Before exercising when pregnant, consult your doctor, physiotherapist or healthcare professional
The ideal exercise in pregnancy will get your heart pumping and keep you supple, without causing physical stress. Many activities, such as running and weight training, are fine in the beginning, but you may need to modify your workout as you grow bigger. 

You'll really feel the benefit if you do a combination of:
Aerobic exercise, which works your heart and lungs.
Muscle-strengthening exercise, which improves your strength, flexibility and posture.


https://www.babycentre.co.uk/a7880/the-best-exercises-in-pregnancy#ixzz5CfZ93vxy

</p>
</center>
<br></i>
<div class="clearing"></div>
<h4><center> ↓ Rules!  ↓</h4></center>
<br>
<p><center>
<h4>
<div class="boxed">
Once you complete the questionnaire, you can select any section you like! You will then have a list of recommended exercises suited to your preferences! You will have 7 days to complete the recipe. This will help challenge you to try and incorporate healthy meals into your diet. 
<br>
However, there is a twist. The quicker you complete the recipe, the more points you will receive. The point system will work as follows: <br>

If completed within:<br><br>
-	1 day: 40pts <br>
-	2 days: 30pts<br>
-	3 days: 25pts<br>
-	4 days: 20pts<br>
-	5 days: 15pts<br>
-	6 days: 10pts<br>
-	7 days: 5pts <br><br>

If you do not complete the recipe within this time, you will get 0 points. <br>

If you reach 80 POINTS, within all the sections, another amazing recipe will be released for you to try!

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
