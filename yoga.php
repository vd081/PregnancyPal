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
    <title>Yoga | PregnancyPal
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
                  <h1>Yoga Reccomendations for you
                  </h1> 
                </center>
              </div>
              </body>
          </div>
          <center>

            <div input type="button" class="button-section">
            <a href="yoga.php"><h1>Yoga</h1></a></div>
            <div input type="button" class="button-section">
           <a href="Aerobic.php"><h1>Aerobic</h1></a></div>
            <div input type="button" class="button-section">
             <a href="pilates.php"><h1>Pilates</h1></a></div>
			  <div input type="button" class="button-section">
              <a href="weight.php"><h1>Weight/Strength</h1></a></div>
            <div input type="button" class="button-section">
             <a href="exercisesToAvoid.php"><h1>Exercises to Avoid</h1></a></div>
          </center>
          <div class="wrap 5">
            <div class="container">
	<script>

$(document).ready(function() {
	
	var the_max = $('#the_max').val();
	
	//get all incompletes 
	var incomplete = document.getElementsByClassName('incomplete');
	
	for( var i = 0; i < incomplete.length; i++){
		
		(function( index ){
			//if index is less than 3 remove hide class otherwise leave it
			if ( i < the_max ){
				
				incomplete[index].classList.remove('hide');
				
			}
		})(i)
	}
});
</script>
<?php
include("dbConnect.php");
$UserID  = $_SESSION['currentUserID'];


// GET USER RESULTS
$dbQuery = $conn->prepare("select Date from ExerciseQuestionnaireResults where UserID=$UserID");
$dbQuery->execute();
$dbRow = $dbQuery->fetch(PDO::FETCH_ASSOC);
    $StartDate = $dbRow['Date']; //define start date when user got Exercise
    $CurrDate  = date("Y-m-d"); //define current date for comparsion
    $Days      = 7; // limit of days user allowed to complete Exercise
    $End       = 0;
	
// 7 DAY TIMER
$daysDiff = floor(strtotime($CurrDate) - strtotime($StartDate)) / (60 * 60 * 24); // get day difference
ceil($daysDiff); // ceil = ROUND UP
$daysLeft = ceil($Days - $daysDiff);
echo "<div class='countholder'>You currently have  ".$daysLeft." days to complete an Exercise!</div>"; // how many day user has left to complete Exercise

// ACTION WHEN USER HAS 0 DAYS LEFT TO COMPLETE Recipe
$dbQuery = $conn->prepare("select YPoints, YogaReward from ExercisePoints where UserID=:UserID");
$dbParams = array(':UserID'=>$UserID);
 $dbQuery->execute($dbParams);
$dbRow = $dbQuery->fetch(PDO::FETCH_ASSOC);
    $ypoints          = $dbRow['YPoints']; //define points 
 $yreward         = $dbRow['YogaReward']; // define YogaReward
$pointsDeduction = -20; //punishment 

if ($daysLeft == $End) { // no days left on timer
    $dbQuery = $conn->prepare("UPDATE ExercisePoints SET YPoints= :points + :pointsDeduction WHERE UserID=:UserID");
  $dbParams = array(':points'=>$ypoints);
    $dbParams = array(':pointsDeduction'=>$pointsDeduction);
   $dbQuery->execute($dbParams);
	$dbQuery = $conn->prepare("UPDATE ExerciseQuestionnaireResults SET Date = NOW() WHERE UserID=:UserID");
    $dbParams = array(':UserID'=>$UserID);
   $dbQuery->execute($dbParams);
    echo "<h4><center>Unfortunately, you have not completed the exercise in the completed time! A total of  - 20 points will be deducted</h4></center></h4>";
	echo "<br><p>Want to try again? Come on .. you can do this! Click this button to start again <input type='submit' name='submit' value=' class='button-exercise' ></p>";
	
	}else {
    // user not found - error handling here
}

// Define variables for points for days 1-7
$PointsD1+=40;
$PointsD2+=30;
$PointsD3+=25;
$PointsD4+=20;
$PointsD5+=15;
$PointsD6+=10;
$PointsD7+=5;

		
//Update date when user selects completed exercise
	if (isset($_POST['submit'])) {
    $stmt = $conn->prepare("UPDATE ExerciseQuestionnaireResults SET Date = NOW() WHERE UserID=$UserID");
    $stmt->execute();
}

// ACTION WHEN USER COMPLETES RECIPE WITHIN 1-7 DAYS
// Completed in 1 day

if (isset($_POST['submit']) && ($daysLeft == 7)){
	$dbQuery = $conn->prepare("UPDATE ExercisePoints SET YPoints= $ypoints + $PointsD1 WHERE UserID=:UserID");
      $dbParams = array(':UserID'=>$UserID);
   $dbQuery->execute($dbParams);
    echo "<h4 class='success-text'>YAY! You have completed the exercise within 1 Day! You have earned a total of $PointsD1 points. Well done!</h4>";
}else {
    // user not found - error handling here
}

// 2 DAYS
if (isset($_POST['submit']) && ($daysLeft == 6)){
	$dbQuery = $conn->prepare("UPDATE ExercisePoints SET YPoints= $ypoints + $PointsD2 WHERE UserID=:UserID");
     $dbParams = array(':UserID'=>$UserID);
   $dbQuery->execute($dbParams);
    echo "<div class='success-text'>YAY! You have completed the exercise within 2 Days! You have earned a total of $PointsD2 points. Well done!";
}else {
    // user not found - error handling here
}
//3 DAYS
if (isset($_POST['submit']) && ($daysLeft == 5)){
	$dbQuery = $conn->prepare("UPDATE ExercisePoints SET YPoints= $ypoints + $PointsD3 WHERE UserID=:UserID");
     $dbParams = array(':UserID'=>$UserID);
   $dbQuery->execute($dbParams);
    echo "YAY! You have completed the exercise within 3 Days! You have earned a total of $PointsD3 points. Well done!";
}else {
    // user not found - error handling here
}

//4 DAYS
if (isset($_POST['submit']) && ($daysLeft == 4)){
	$dbQuery = $conn->prepare("UPDATE ExercisePoints SET YPoints= $ypoints + $PointsD4 WHERE UserID=:UserID");
    $dbParams = array(':UserID'=>$UserID);
   $dbQuery->execute($dbParams);
    echo "YAY! You have completed the exercise within 4 Days! You have earned a total of $PointsD4 points. Well done!";
}else {
    // user not found - error handling here
}

//5 DAYS
if (isset($_POST['submit']) && ($daysLeft == 3)){
	$dbQuery = $conn->prepare("UPDATE ExercisePoints SET YPoints= $ypoints + $PointsD5 WHERE UserID=:UserID");
    $dbParams = array(':UserID'=>$UserID);
    $dbQuery->execute($dbParams);
    echo "YAY! You have completed the exercise within 5 Days! You have earned a total of $PointsD5 points. Well done!";
}else {
    // user not found - error handling here
}
//6 DAYS
if (isset($_POST['submit']) && ($daysLeft == 2)){
	$dbQuery = $conn->prepare("UPDATE ExercisePoints SET YPoints= $ypoints + $PointsD6 WHERE UserID=:UserID");
    $dbParams = array(':UserID'=>$UserID);
    $dbQuery->execute($dbParams);
    echo "YAY! You have completed the exercise within 6 Days! You have earned a total of $PointsD6 points. Well done!";
	
}else {
    // user not found - error handling here
}
//7 DAYS
if (isset($_POST['submit']) && ($daysLeft == 1)){
	$dbQuery = $conn->prepare("UPDATE ExercisePoints SET YPoints= $ypoints + $PointsD7 WHERE UserID=:UserID");
    $dbParams = array(':UserID'=>$UserID);
   $dbQuery->execute($dbParams);
    echo "YAY! You have completed the exercise within 7 Days! You have earned a total of $PointsD7 points. Well done!";
}else {
    // user not found - error handling here
}

//define and get points and rewards for user
$dbQuery = $conn->prepare("select YPoints, YogaReward from ExercisePoints where UserID=:UserID");
$dbParams = array(':UserID'=>$UserID);
 $dbQuery->execute($dbParams);
$dbRow = $dbQuery->fetch(PDO::FETCH_ASSOC);
    $ypoints          = $dbRow['YPoints'];
	$yreward             = $dbRow['YogaReward'];
	
	//if user reaches 80 points - reward them
	if ( $ypoints > 0 && ($ypoints >= 80) ){
	echo '<h4 class="reward-text">Congratulations! You have reached 80 points! You will now be rewarded with an bonus exercise!!</h4>';
$dbQuery = $conn->prepare("UPDATE ExercisePoints SET YPoints = '0', YogaReward = YogaReward + 1 WHERE UserID=:UserID");
    $dbParams = array(':UserID'=>$UserID);
   $dbQuery->execute($dbParams);
}

$dbQuery = $conn->prepare("select YPoints, YogaReward from ExercisePoints where UserID=:UserID");
$dbParams = array(':UserID'=>$UserID);
 $dbQuery->execute($dbParams);
$dbRow = $dbQuery->fetch(PDO::FETCH_ASSOC);
    $ypoints          = $dbRow['YPoints'];
	$yreward         = $dbRow['YogaReward'];

echo"<h2 class='button-section-points'>";
echo $_SESSION['currentUserForename'];   
echo"'s Points: ".$ypoints." </h2>"; // Display user total points
//adding extra reward exercise
if ( $yreward     > 0 ){
	$show =  3 + $yreward    ;
   echo '<input type="hidden" value="'. $show .'" id="the_max">';
} else {
	echo '<input type="hidden" value="3" id="the_max">';
}

// Get all user results from questionnaire
$dbQuery = $conn->prepare("SELECT * FROM ExerciseQuestionnaireResults where UserID=:UserID");
  $dbParams = array(':UserID'=>$UserID);
   $dbQuery->execute($dbParams);

$cnt=0;
$max=3;


	if( isset( $_POST['submit'], $_POST['completed']) && ! empty( $_POST['completed']) ){
		
		$User_ID = $_POST['User_ID'];
		$ExerciseID = $_POST['ExerciseID'];
		
		
		$dbQuery=$conn->prepare("select * from UserExercises where UserID = :User_ID and ExerciseID = :ExerciseID and Completed = :completed"); 
		$dbParams = array(
		':User_ID'=>$User_ID, 
		':ExerciseID'=>$ExerciseID,
		':completed' => '1' );
		$dbQuery->execute($dbParams);
		$row = $dbQuery->fetchAll(PDO::FETCH_ASSOC);
		
		if ( ! $row ) {
			
			$dbQuery=$conn->prepare("insert into UserExercises ( UserID, ExerciseID, Completed ) values ( :User_ID, :ExerciseID, :completed) "); 
			$dbParams = array(
			':User_ID'=>$User_ID, 
			':ExerciseID'=>$ExerciseID,
			':completed' => '1' );
			$dbQuery->execute($dbParams);
		}
	}
 $stmt=$conn->prepare("select ExerciseID from UserExercises where Completed = '1' group by(ExerciseID) "); //get all recipes where keyword = word user selected
       $stmt->execute();
		$results = $stmt->fetchAll();
		//create empty array and check if user has already completed exercise and add ID to array
		
		$user_already_select = array();
		foreach( $results as $result ){
			array_push( $user_already_select , $result['ExerciseID']);
		}
	
//Get all Yoga recipes
        $dbQuery=$conn->prepare("select * from Exercise where ExerciseCategory='Yoga'"); 
        $dbQuery->execute();


//output exercise information
while($dbRow=$dbQuery->fetch(PDO::FETCH_ASSOC)) {
	
	$class= "incomplete hide";

	if ( ! in_array( $dbRow["ExerciseID"], $user_already_select ) ){
		 echo '<div id="'.$dbRow["ExerciseID"].'" data-finish="false" class="'.$class.'">
		 <h4><div>'.$dbRow["ExerciseName"].
         '</div></h4><br><img src="ExercisePhotos/'.$dbRow['ExercisePicture'].'" width="200" height="200" />
			</b><br><br><p>'.$dbRow["ExerciseInstructions"].'<br><br>
			<form method="POST" action="">
			<input type="hidden" name="ExerciseID" value="'.$dbRow['ExerciseID'].'">
			<input type="hidden" name="User_ID" value="'.$UserID.'">
			<input type="hidden" name="ExerciseID" value="'.$dbRow["ExerciseID"].'">
			<input type="hidden" name="completed" value="true">
			<input type="submit" name="submit" value="Completed Exercise" class="button-exercise"id='.$dbRow["ExerciseID"].'">
			</form></div></p>';
	}      
	 $cnt++;	
	
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
