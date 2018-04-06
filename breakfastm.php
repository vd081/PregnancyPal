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
    <title>Breakfast | PregnancyPal
    </title>
    <link href="css/styles.css" rel="stylesheet" type="text/css" />
    <link href='http://fonts.googleapis.com/css?family=Economica' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
    <!----menu--->
    <link rel="stylesheet" href="css/superfish.css" media="screen">
    <script src="js/jquery-1.9.0.min.js">
    </script>
    <script src="js/hoverIntent.js">
    </script>
    <script src="js/superfish.js">
    </script>
    <script>
      // initialise plugins
      jQuery(function(){
        jQuery('#example').superfish({
          //useClick: true
        }
                                    );
      }
            );
    </script>
  </head>
  <body>
    <div class="wrap1">
      <div class="container">
        <div class="header">
          <a href="index.php" class="logo">
            <center>
              <img src="images/logo.png" alt="Logo"> 
            </center>
            <div class="logo">
            </div>
            <div class="submenu">
              <ul class="sf-menu" id="">
                <?php if(isset($_SESSION['currentUser'])){?>
                <li>
                  <a href="logout.php">Logout |
                  </a>
                </li> 
                <li>
                  <h1>
                    <?php echo $_SESSION["currentUserForename"]; ?>
                  </h1>
                  <?}else{?>
                <li>
                  <a href="Register.php">Register|
                  </a>
                </li>
                <li>
                  <a href="Login.php"> Login
                  </a>
                </li>
                <?}?>
                </div>
              <div class="menu">
                <ul class="sf-menu" id="example">
                  <li>
                    <a href="myProfile.php">My Profile
                    </a>
                  </li>
                  <li>
                    <a href="Appointments.php"> Appointments
                    </a>
                  </li>
                  <li>
                    <a href="weekByWeek.php">Week to Week
                    </a>
                  </li>
                  <li>
                    <a href="Exercise.php">Exercise
                    </a>
                  </li>
                  <li>
                    <a href="Food.php">Food
                    </a>
                  </li>
                  <li>
                    <a href="babyNameFinder.php">Baby Names
                    </a>
                  </li>
                  </div>
              </div>
              <div class="clearing">
              </div>
            </div>
            <div class="clearing">
            </div>
            </div>
          <!---header-wrap--->
          <div class="wrap2">
            <div class="container">
              <div class="title">
                <!---- MAIN SECTION--->
                <center>
                  <h1>Breakfast Reccomendations for you
                  </h1> 
                </center>
              </div>
              </body>
          </div>
          <center>
            <div input type="button" class="button-section">
              <a href="Breakfastphp">
                <h1>Breakfast
                </h1>
              </a>
            </div>
            <div input type="button" class="button-section">
              <a href="Lunch.php">
                <h1>Lunch
                </h1>
              </a>
            </div>
            <div input type="button" class="button-section">
              <a href="Dinner.php">
                <h1>Dinner
                </h1>
              </a>
            </div>
            <div input type="button" class="button-section">
              <a href="Snacks.php">
                <h1>Snacks
                </h1>
              </a>
            </div>
            <div input type="button" class="button-section">
              <a href="foodsToAvoid.php">
                <h1>Foods to Avoid
                </h1>
              </a>
            </div>
          </center>
          <div class="wrap 5">
            <div class="container">
			<script>
$(document).ready(function() {
  // When you click on a button = when a challenge is over
  $("input").click(function() {
    // 1. You hide him and mark him as finished
    var $challenge_div = $(this).parent().parent();
    $challenge_div.data("finish", "true");
    $challenge_div.removeClass("show").addClass("hide");
    
   // 2. You display a challenge that is hide and not finish
   
   // 2.1. Select all the hide div
   var $challenge_list = $("div[class='hide']");
   
   // 2.2. Check if the hide div is already finish or not
   $.each($challenge_list, function() {
    var new_challenge = $(this);
    
    // 2.3. If you find a challenge hide and not finish : display it and stop the loop
    if (new_challenge.data("finish") == false) {
      new_challenge.removeClass("hide").addClass("show");
     
     return false;
    }
   });
   
   // 3. If after this you have nothing to show = all challenge are finished : I display a message
   if ($("div[class='show']").length == 0) {
    $("#message p").html("You finished all your challenges !");
   }
   
  });
});
</script>

<?php
include("dbConnect.php");
$UserID  = $_SESSION['currentUserID'];

// GET USER RESULTS
$dbQuery = $conn->prepare("select Date from FoodQuestionnaireResults where UserID=$UserID");
$dbQuery->execute();
$dbRow = $dbQuery->fetch(PDO::FETCH_ASSOC);
    $StartDate = $dbRow['Date']; //define start date when user got recipe
    $CurrDate  = date("Y-m-d"); //define current date for comparsion
    $Days      = 7; // limit of days user allowed to complete recipe
    $End       = 0;

$daysDiff = floor(strtotime($CurrDate) - strtotime($StartDate)) / (60 * 60 * 24); // get day difference
ceil($daysDiff); // ceil = ROUND UP
$daysLeft = ceil($Days - $daysDiff);
echo "<div class='countholder'>You currently have  ".$daysLeft." days to complete the recipe!</div>"; // how many day user has left to complete recipe

// ACTION WHEN USER HAS 0 DAYS LEFT TO COMPLETE Recipe
$dbQuery = $conn->prepare("select Points from Profile where UserID=:UserID");
$dbParams = array(':UserID'=>$UserID);
 $dbQuery->execute($dbParams);
$dbRow = $dbQuery->fetch(PDO::FETCH_ASSOC);
    $points          = $dbRow['Points'];
$pointsDeduction = -20; 

echo"<h2>";
echo $_SESSION['currentUserForename'];   
echo"<class='button-section'>'s Points: ".$points." </h2>"; // Display user total points

if ($daysLeft == $End) {
    $dbQuery = $conn->prepare("UPDATE Profile SET Points= :points + :pointsDeduction WHERE UserID=:UserID");
  $dbParams = array(':points'=>$points);
    $dbParams = array(':pointsDeduction'=>$pointsDeduction);
   $dbQuery->execute($dbParams);
	$dbQuery = $conn->prepare("UPDATE FoodQuestionnaireResults SET Date = NOW() WHERE UserID=:UserID");
    $dbParams = array(':UserID'=>$UserID);
   $dbQuery->execute($dbParams);
    echo "<h4><center>Unfortunately, you have not completed the recipe in the completed time! A total of  - 20 points will be deducted</h4></center></h4>";
}else {
    // user not found - error handling here
}

// Define variables for points for days 1-7

$PointsD1+=50;
$PointsD2+=40;
$PointsD3+=30;
$PointsD4+=20;
$PointsD5+=15;
$PointsD6+=10;
$PointsD7+=5;

//Update date when user selects completed recipe
	if (isset($_POST['submit'])) {
    $stmt = $conn->prepare("UPDATE FoodQuestionnaireResults SET Date = NOW() WHERE UserID=$UserID");
    $stmt->execute();
}

// ACTION WHEN USER COMPLETES RECIPE WITHIN 1-7 DAYS
// Completed in 1 day

if (isset($_POST['submit']) && ($daysLeft == 7)){
	$dbQuery = $conn->prepare("UPDATE Profile SET Points= $points + $PointsD1 WHERE UserID=:UserID");
      $dbParams = array(':UserID'=>$UserID);
   $dbQuery->execute($dbParams);
    echo "YAY! You have completed the recipe within 1 Day! You have earned a total of $PointsD1 points. Well done!";
}else {
    // user not found - error handling here
}

// 2 DAYS
if (isset($_POST['submit']) && ($daysLeft == 6)){
	$dbQuery = $conn->prepare("UPDATE Profile SET Points= $points - $PointsD2 WHERE UserID=:UserID");
     $dbParams = array(':UserID'=>$UserID);
   $dbQuery->execute($dbParams);
    echo "<div class='success-text'>YAY! You have completed the recipe within 2 Days! You have earned a total of $PointsD2 points. Well done!";
}else {
    // user not found - error handling here
}
//3 DAYS
if (isset($_POST['submit']) && ($daysLeft == 5)){
	$dbQuery = $conn->prepare("UPDATE Profile SET Points= $points + $PointsD3 WHERE UserID=:UserID");
     $dbParams = array(':UserID'=>$UserID);
   $dbQuery->execute($dbParams);
    echo "YAY! You have completed the recipe within 3 Days! You have earned a total of $PointsD3 points. Well done!";
}else {
    // user not found - error handling here
}

//4 DAYS
if (isset($_POST['submit']) && ($daysLeft == 4)){
	$dbQuery = $conn->prepare("UPDATE Profile SET Points= $points + $PointsD4 WHERE UserID=:UserID");
    $dbParams = array(':UserID'=>$UserID);
   $dbQuery->execute($dbParams);
    echo "YAY! You have completed the recipe within 4 Days! You have earned a total of $PointsD4 points. Well done!";
}else {
    // user not found - error handling here
}

//5 DAYS
if (isset($_POST['submit']) && ($daysLeft == 3)){
	$dbQuery = $conn->prepare("UPDATE Profile SET Points= $points + $PointsD5 WHERE UserID=:UserID");
    $dbParams = array(':UserID'=>$UserID);
    $dbQuery->execute($dbParams);
    echo "YAY! You have completed the recipe within 5 Days! You have earned a total of $PointsD5 points. Well done!";
}else {
    // user not found - error handling here
}
//6 DAYS
if (isset($_POST['submit']) && ($daysLeft == 2)){
	$dbQuery = $conn->prepare("UPDATE Profile SET Points= $points + $PointsD6 WHERE UserID=:UserID");
    $dbParams = array(':UserID'=>$UserID);
    $dbQuery->execute($dbParams);
    echo "YAY! You have completed the recipe within 6 Days! You have earned a total of $PointsD6 points. Well done!";
	
}else {
    // user not found - error handling here
}
//7 DAYS
if (isset($_POST['submit']) && ($daysLeft == 1)){
	$dbQuery = $conn->prepare("UPDATE Profile SET Points= $points + $PointsD7 WHERE UserID=:UserID");
    $dbParams = array(':UserID'=>$UserID);
   $dbQuery->execute($dbParams);
    echo "YAY! You have completed the recipe within 7 Days! You have earned a total of $PointsD7 points. Well done!";
}else {
    // user not found - error handling here
}

//define all keywords for breakfast
$K1      = ("cheese");
$K2      = ("yoghurt");
$K3      = ("egg");
$K4      = ("fruit");
$K5      = ("cereal");
$K6      = ("oatmeal");
$K7      = ("granola");
$K8      = ("bread");
$K9      = ("avocado");


// Get all user results from questionnaire
$dbQuery = $conn->prepare("SELECT * FROM FoodQuestionnaireResults where UserID=:UserID");
  $dbParams = array(':UserID'=>$UserID);
   $dbQuery->execute($dbParams);

 
 $rowCount= 0;  // this is the counter

   
while ($dbRow=$dbQuery->fetch(PDO::FETCH_ASSOC)) //loop through all keywords 1-9
{
    for($number = 1; $number<=9; ++$number) {
        $breakfast = "B$number";
        $$breakfast = $dbRow[$breakfast]; //define row
    }
}
$cnt=0;
	
for($number = 1; $number<=9; ++$number) {
    $Keyword = "K$number"; //define keyword
    $breakfast = "B$number"; //define lunch ID
    if ($$breakfast == '1')  //whether the user selected the keyword. (1=True)
    {
        $dbQuery=$conn->prepare("select * from Recipes where RecipeCategory='Breakfast' AND Keyword = '".($$Keyword)."'"); //get all recipes where keyword = word user selected
        $dbQuery->execute();
		$result = $dbQuery->fetchAll(PDO::FETCH_ASSOC);
    
    
	}
//output recipe information

$cnt = 0; 
foreach ($result as $key => $dbRow) { 
if ($cnt > 4) 
$class = "hide"; 
else 
$class = "show";

 echo "<b><br><br><h4>".$dbRow["RecipeName"].
			"</h4><br>"."<br><img src=Breakfast/".$dbRow['RecipePicture']."' width='150' height='150' />"."</b><br><br>".$dbRow["RecipeInstructions"]."
			<form method='POST'><input type='hidden' name='RecipeID' value= '".$dbRow['RecipeID']."'>
			<input type='submit' name='submit' value='Completed Recipe' class='button-recipe'></form>";
 $cnt++;
	  
	$RecipeID=$dbRow["RecipeID"];
    $Displayed = false;
		$stmt=$conn->prepare("INSERT into UserRecipes (UserID, RecipeID, Displayed) VALUES (:UserID, :RecipeID, :Displayed) "); 
		$stmt->execute(array(
	   ':UserID' => $UserID,
		':RecipeID' => $RecipeID,
		':Displayed' => $Displayed
		)); 
}
 } //end //http://php.net/manual/en/language.variables.variable.php4
$value = $_POST['RecipeID'];

if(($_POST['RecipeID'])) {
$dbQuery=$conn->prepare("UPDATE UserRecipes SET Displayed = 1 WHERE UserID=:UserID AND RecipeID=$value"); 
$dbParams = array(':UserID'=>$UserID);
$dbQuery->execute($dbParams);
$stmt=$conn->prepare("SELECT Displayed FROM UserRecipes WHERE UserID=:UserID AND RecipeID=$value"); 
$dbParams= array(':UserID'=>$UserID);
$stmt->execute($dbParams);
}


 ?>

 
 
 
            </div>
          </div>
        </div>
      </div>
      <br>
      <!--- FOOTER --->
      <?php
include_once 'footer.php';
?>
