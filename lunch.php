<?php
session_start();
 if (isset($_SESSION["currentUser"])) { 
		 $dbParams = array('userID'=>$_SESSION["currentUserForename"]);
		  $dbParams = array('userID'=>$_SESSION["currentUserDueDate"]);
 }
  if (!isset($_SESSION["currentUser"])) 
     header("Location: login.php");

?>

<!DOCTYPE html PUBLIC">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Lunch | PregnancyPal</title>
	
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

		<a href="index.php" class="logo">
			<center><img src="images/logo.png" alt="Logo"> </center>
    <div class="logo">
	</div>
   <div class="submenu">
   <ul class="sf-menu" id="">
	<?php if(isset($_SESSION['currentUser'])){?>
	<li><a href="logout.php">Logout |</a></li> <li><h1><?php echo $_SESSION["currentUserForename"]; ?></h1>
	<?}else{?>
		<li><a href="Register.php">Register|</a></li>
		<li><a href="Login.php"> Login</a></li>
	<?}?>
    </div>
				
    <div class="menu">
      <ul class="sf-menu" id="example">
        <li><a href="myProfile.php">My Profile</a></li>
		  <li><a href="Appointments.php"> Appointments</a></li>
		    <li><a href="weekByWeek.php">Week to Week</a></li>
			  <li><a href="Exercise.php">Exercise</a></li>
			    <li><a href="Food.php">Food</a></li>
				<li><a href="babyNameFinder.php">Baby Names</a></li>
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

      <center><h1>Lunch Reccomendations for you</h1> 
	 </center>
	  </div>
	
    </body>

  </div>
<center>
	        <div input type="button" class="button-section"><a href="Breakfastphp"><h1>Breakfast</h1></a></div>
	       <div input type="button" class="button-section"><a href="Lunch.php"><h1>Lunch</h1></a></div>
	         <div input type="button" class="button-section"><a href="Dinner.php"><h1>Dinner</h1></a></div>
	       <div input type="button" class="button-section"><a href="Snacks.php"><h1>Snacks</h1></a></div>
	      <div input type="button" class="button-section"><a href="foodsToAvoid.php"><h1>Foods to Avoid</h1></a></div>
		  </center>
<div class="wrap 5">
<div class="container">
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include ("dbConnect.php");

$UserID =$_SESSION['currentUserID'];

//define all keywords for lunch

  $K1 = ("soup");
  $K2 = ("rice");
  $K3 = ("pasta");
  $K4 = ("salad");
  $K5 = ("fruit");
  $K6 = ("sandwich");
  $K7 =  ("pizza");
  $K8 =  ("burger");
  $K9 =  ("burrito");
  
//get results from user
$dbQuery=$conn->prepare("select * from FoodQuestionnaireResults where UserID=$UserID");
$dbQuery->execute();

while ($dbRow=$dbQuery->fetch(PDO::FETCH_ASSOC)) //loop through all keywords 1-9
{
    for($number = 1; $number<=9; ++$number) {
        $lunch = "L$number";
        $$lunch = $dbRow[$lunch]; //define row
    }
}

for($number = 1; $number<=9; ++$number) {
    $Keyword = "K$number"; //define keyword
    $lunch = "L$number"; //define lunch ID
    if ($$lunch == '1')  //whether the user selected the keyword. (1=True)
    {
        $dbQuery=$conn->prepare("select * from Recipes where RecipeCategory='Lunch' AND Keyword = '".($$Keyword)."'"); //get all recipes where keyword = word user selected
        $dbQuery->execute();
//output recipe information

$cnt=0;
$max=5;

while($dbRow=$dbQuery->fetch(PDO::FETCH_ASSOC)) {
if($cnt < $max) 
$class = "display:block"; 
else 
$class= "display:none"; 	

            echo "<div id=".$dbRow["RecipeID"]." data-finish='false' style=".$class."><h4>".$dbRow["RecipeName"].
			"</h4>"."<br><img src=Lunch/".$dbRow['RecipePicture']."' width='150' height='150' />".
			"</b><br><br>".$dbRow["RecipeInstructions"]."
			<form method='POST'><input type='hidden' name='RecipeID' value= '".$dbRow['RecipeID']."'>
			<input type='submit' name='submit' value='Completed Recipe' class='button-recipe'></form>";
	  $cnt++;
	  
	  var_dump($class);
}
	}
	}
?>

<br><br><br>
<div class="greyed-box">
<input type='submit' name='submit' value='Locked Recipe' class='button-recipe'>





</div>

    </div>
</div>

    </div><br>
<!--- FOOTER --->
<?php
include_once 'footer.php';
?>
