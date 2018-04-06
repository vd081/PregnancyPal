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
	<title>breakfast | PregnancyPal</title>
	
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

      <center><h1>Breakfast Reccomendations for you</h1> 
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


$dbQuery=$conn->prepare("select Date from Results where UserID=$UserID");
$dbQuery->execute();

  while($dbRow = $dbQuery->fetch(PDO::FETCH_ASSOC)) {
  $StartDate=$dbRow['Date'];
   $CurrDate= date("Y-m-d");   
    $Days=7;
	$End=-0;

 $days = floor(strtotime($CurrDate) - strtotime($StartDate)) / (60 * 60 * 24);
echo $days;

$daysLeft= abs($Days );


while ($dbRow=$dbQuery->fetch(PDO::FETCH_ASSOC)) {
$points = $dbRow['Points'];
$pointsDeduction =-20;
 }

if($daysLeft == $End) {
		 $stmt = $conn->prepare("UPDATE Profile SET Points = $points + $pointsDeduction WHERE UserID= $UserID");
$dbQuery->execute();
	echo"<h4><center>Unfortunately, you have not completed the recipe in the completed time! A total of  - 20 points will be deducted</h4></center></h4>";
}





//define all keywords for breakfast

  $B1 = ("cheese");
  $B2 = ("yoghurt");
  $B3 = ("egg");
  $B4 = ("fruit");
  $B5 = ("cereal");
  $B6 = ("oatmeal");
  $B7 =  ("granola");
  $B8 =  ("bread");
  $B9 =  ("avocado");
  
//get results from user
$dbQuery=$conn->prepare("select * from FoodQuestionnaireResults where UserID=$UserID");
$dbQuery->execute();

while ($dbRow=$dbQuery->fetch(PDO::FETCH_ASSOC)) //loop through all Beywords 1-9
{
    for($number = 1; $number<=9; ++$number) {
        $breakfast = "B$number";
        $$breakfast = $dbRow[$breakfast]; //define row
    }
}

for($number = 1; $number<=9; ++$number) {
    $Keyword = "B$number"; //define Beyword
    $breakfast = "B$number"; //define breakfast ID
    if ($$breakfast == '1')  //whether the user selected the keyword. (1=True)
    {
        $dbQuery=$conn->prepare("select * from Recipes where RecipeCategory='breakfast' AND Keyword = '".($$Keyword)."'"); //get all recipes where keyword = word user selected
        $dbQuery->execute();
//output recipe information
        while ($dbRow=$dbQuery->fetch(PDO::FETCH_ASSOC)) 
        {
            echo "<b><br><br><h4>".$dbRow["RecipeName"]."</h4><br>"."<br><img src=breakfast/".$dbRow['RecipePicture']."' width='150' height='150' />"."</b><br><br>".$dbRow["RecipeInstructions"]."<input type='submit' name='submit' value='Completed Recipe' class='button-recipe'>";
   }
    } else {
        echo ""; //output nothing
    }
 } //end
 var_dump($breakfast);
?>






</div>

    </div>
</div>

    </div><br>
<!--- FOOTER --->
<?php
include_once 'footer.php';
?>
