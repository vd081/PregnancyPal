
<?php if(isset($_GET['action']) && $_GET['action'] == 'joined'){
    						echo "<h3>Registration successful</h3>";
}
?>

<?php
session_start();
 if (isset($_SESSION["currentUser"])) { 
		 $dbParams = array('userID'=>$_SESSION["currentUserForename"]);
		  $dbParams = array('userID'=>$_SESSION["currentUserDueDate"]);
 }
//var_dump($_SESSION["currentUserForename"]);

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

		<a href="index.html" class="logo">
			<center><img src="images/logo.png" alt="Logo"></center>
    <div class="logo">
	</div>
   <div class="submenu">
   <ul class="sf-menu" id="">
	<?php if(isset($_SESSION['currentUser'])){?>
		<a href="logout.php"><h2>Logout | </a><?php echo $_SESSION["currentUserForename"]; ?></h2>
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

      <h1>Welcome to PregnancyPal  <?php echo $_SESSION["currentUserForename"]; ?></a></h1>
	 

	  </div>
	  <div class="box mar-right40">
	  <h2>Your amazing journey starts here.. </h2>
<br></br>

		<body><p> PregnancyPal information covers everything you need to know about having a safe and healthy pregnancy</p>
      <br></br>  <p> Why not browse through our sections, with useful features you can use such as storing medical appointment and results and exercise and food reccomendations for you!</p>
	<br></br>	<p>You'll get to see what's happening week by week with both you and your baby</p>
		
		</div>
    </body>
  <div class="banner"> <img src="images/banner.jpg" alt="banner.jpg"    />
    <div class="banner-shadows"></div>
  </div>
<div class="clearing"></div>
</div>
</div>

<!---wrap3--->
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
            <p><b>Emily Skye On Being Pregnant for the First Time: 'I Feel Like a Superhero' </p></b>
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

<!---wrap4--->
<div class="wrap3">
<div class="container">
  <div class="footer">
      <h2 align="right">Follow us</h2>
	
	
					<a href="https://www.facebook.com/pregnancy.pal.39"><img src="E:\Final Year\Project\PregnancyPal\PregnancyPal\images\twitter.png" id="twitter"> </a>

				
					<a href="http://freewebsitetemplates.com/go/facebook/" id="facebook"></a>
		
				
	<div class="clearing"></div>
</div>
</div>
<div class="shadows2">
</div>
</body>
</html>
