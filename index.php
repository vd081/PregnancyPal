<?php
session_start();
include("dbConnect.php");
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
	<title>Home | PregnancyPal</title>
	
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

<?php if(isset($_GET['action']) && $_GET['action'] == 'joined'){
    						echo "<i><h2>Registration successful</h2>";
}


//GET TOTLA POINTS FOR USER - calculate then display ?!
?>
      <h1>Welcome to PregnancyPal  <?php echo $_SESSION["currentUserForename"]; ?></a></h1>
	 

	  </div>
	   <? echo $_SESSION["currentUserLastActive"] ?> <br>


	  <div class="box mar-right40">
	
	  <h2>Your amazing journey starts here.. </h2>
<br></br>

		<p>PregnancyPal information covers everything you need to know about having a safe and healthy pregnancy
      <br></br><p>   Why not browse through our sections, with useful features you can use such as storing medical appointment and results and exercise and food reccomendations for you!
	<br></br>	You'll get to see what's happening week by week with both you and your baby
	<br><br></p>
	<h2> Some key information about your journey here at PregnancyPal...<br>
	<br></h2>
		  <h4> You were last logged in at:
<p>You last completed a Recipe:<br>
You last completed an Exercise:<br><br>
Your total points for Exercise:
Your total points for Food:  <? echo $totalPoints?> <br>
</p>

Come on, why not go get some more points and gain some more new recipes and exercises to try! You can do it.
</h4>
<br>
		</div>
    </body>
  <div class="banner"> <img src="images/banner.jpg" alt="banner.jpg"    />
    <div class="banner-shadows"></div>
  </div>
<div class="clearing"></div>
</div>
</div>


<div class="wrap1 ">
  <div class="container">
    <div class="title">
      <h1>News of the week!</h1>
    </div>
	
    <div class="service mar-right40"> <img src="images/article1.jpg" alt="image" />
      <div class="shadows"></div>
      <div class="title">
     
      </div>
      <div class="content">
        <h2>Cheska Hull has a baby boy!</h2>
		<br></br>
		<p><i>Ex-Made in Chelsea star Cheska Hull gives birth to a baby boy and reveals his traditional name</p></i>
        <center><br> <div input type="button" class="button-form"><a href="https://www.thesun.co.uk/tvandshowbiz/4932473/ex-made-in-chelsea-star-cheska-hull-gives-birth-to-a-baby-boy-and-reveals-his-traditional-name/">Read More </a></div>
	 </center> </br>
	 </div>
    </div>
    <div class="service mar-right40"> <img src="images/article2.jpg" alt="image" />
      <div class="shadows"></div>
      <div class="title">
     
      </div>
      <div class="content">
        <h2>Kate’s morning sickness cure? </h2>
		<br></br>
		<p><i> The Duchess of Cambridge may be trying out a new panacea for her severe morning sickness..</p></i>
     <center> <br> <div input type="button" class="button-form"><a href="http://www.express.co.uk/news/royal/854265/kate-middleton-pregnant-morning-sickness-avocado">Read More </a></div>
      </center> </br>
	  </div>
    </div>
    <div class="service"> <img src="images/article3.jpg" alt="image" />
      <div class="shadows"></div>
      <div class="title">
      
      </div>
      <div class="content">
           <h2>Emily Skye On Being Pregnant for the First Time: 'I Feel Like a Superhero' </h2>
			<br>
			<p> Australian trainer Emily Skye doesn't BS her nearly 13 million social-media followers about pregnancy. She's full of body confidence—but it's not a glow-fest.</p>
  <center><br><div input type="button" class="button-form"><a href="https://www.fitpregnancy.com/parenting/celebrity/emily-skye-on-being-pregnant-for-the-first-time-i-feel-like-a-superhero">Read More </a></div>
 </center> </br>     
	 </div>
    </div>
  <div class="clearing"></div>  
  </div>
  <div class="clearing"></div>
</div>
<!--- FOOTER --->
<?php
include_once 'footer.php';
?>
