
<?php 
?>


<!DOCTYPE html PUBLIC">
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js">
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
<!---header-wrap--->

<div class="wrap2">
<div class="container">
<div class="title">

<!---- MAIN SECTION--->

      <center><h1>Your Pregnancy Week by Week</h1> 
	  <h4> all you need to know what's happening with you and your baby</h4></center>
	  </div>

<?php

//Get Week Photo
$dir_path = "WeekByWeekPhotos/";
$extensions_array = array('jpg','png','jpeg');

/*
if(is_dir($dir_path))
{
    $files = scandir($dir_path);
    
    for($i = 0; $i < count($files); $i++)
    {
        if($files[$i] !='.' && $files[$i] !='..')
        {
            // get file name
            echo "File Name -> $files[$i]<br>";
            
            // get file extension
            $file = pathinfo($files[$i]);
            $extension = $file['extension'];
            echo "File Extension-> $extension<br>";
            
           // check file extension
            if(in_array($extension, $extensions_array))
            {
            // show image
            echo "<img src='$dir_path$files[$i]' style='width:100px;height:100px;'><br>";
            }
        }
    }
}
*/

if(isset($_POST['week'])) {
	$imageName = $_POST['week'] . ".jpg";
} else {
	$imageName = "1.jpg";
}
echo "<img src='$dir_path$imageName' style='width:300px;height:300px;'><br>";
?>

<?php   
 
   include ("dbConnect.php");
  
  $weekID=$_GET["WeekID"];
   $dbQuery=$conn->prepare("select * FROM WeekByWeek");
   $dbParams = array('weekID'=>$WeekID);
   $dbQuery->execute($dbParams);
  // echo $WeekID."\n";
      echo $dbQuery->rowCount()."\n";
   while ($dbRow=$dbQuery->fetch(PDO::FETCH_ASSOC)) {
   }

  //weeks 1-40 Buttons
  echo "<form method='POST'>";
for ($button = 0; $button <=40; $button ++) {
       //echo "$button";
		echo "<button type='submit' name='week' value=".$button.">".$button."</button>";
 }

 ?>
 </form>
	 
    </body>

  </div>
<div class="clearing"></div>
</div>
</div>

<!---Info displayed on baby--->

<div class="wrap1 ">
  <div class="container">
    <div class="title">
      <h2>What's happening with your baby!</h2>
      </div>
      <div class="content">
     
		<?php 
			if(isset($_POST['week'])){
				//var_dump('SUBMITTED');
				$value = $_POST['week'];
				$dbQuery = $conn->prepare("SELECT BabyUpdates, MotherUpdates FROM WeekByWeek WHERE WeekID =".$value);
				$dbQuery->execute($dbParams);
				
				$dbQuery->rowCount()."\n";
			   while ($dbRow=$dbQuery->fetch(PDO::FETCH_ASSOC)) {
				  echo $dbRow["BabyUpdates"];
				  $motherUpdates = $dbRow["MotherUpdates"];
				   
			   }
			}else{
				var_dump('NOT SUBMITTED');
			}		
		?>

    </div>

    </div>


<!---Info displayed on mother --->
<div class="wrap1 ">
  <div class="container">
    <div class="title">
      <h2>What's happening with you!</h2>
 
      </div>
      <div class="content">
       <? echo $motherUpdates; ?>

    </div>


    </div><br>
<!---FOOTER --->

<div class="wrap3">
<div class="container">
  <div class="footer">


      <h2>Follow us</h2>
	
					<a href="https://www.facebook.com/pregnancy.pal.39"><img src="E:\Final Year\Project\PregnancyPal\PregnancyPal\images\twitter.png" id="twitter"> </a>

				
					<a href="http://freewebsitetemplates.com/go/facebook/" id="facebook"></a>
		
				
	<div class="clearing"></div>
</div>
</div>
<div class="shadows2">
</div>
</body>
</html>
