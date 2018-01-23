
<!DOCTYPE html PUBLIC">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Baby Name Finder| PregnancyPal</title>
	
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
      <center><h2>Having trouble thinking of baby names? </h2><h3><br>Why not try our baby name finder to help you!</br></h3> 

	  </div>	 </center>
</div>
</div>

<div class="wrap2">
  <div class="container">
    <div class="leftcol">
      <div class="title">

      </div>
      <div class="page-content">
      <div class="panel borderbotm-none">
        <div class="content">
         <u><h2>Search baby names</h2></u>
	 <div class="contact-form mar-top30">
<i>Gender</i>
<br> <br>
 <input type="radio" name="gender" value="Boy"> Boy
  <input type="radio" name="gender" value="Girl">Girl
  <input type="radio" name="gender" value="Both">Both<br><br>
  </div>
  
<select name="Letters A-Z">

<?php
	
for ($letter= 'A'; $letter <= 'Z'; $letter++) {
    echo $letter . "\n";
}

?>

<input type="radio" name="gender" value="all">All

       <br><div input type="button" class="button-form"><a href='#' onclick=\"button"('$letter')\">$Search</div>

  <br><br>
  <br><h2>Results</h2>
  
	  <select name="Search By">
	 
<option value=""><h3>Search By</h3></option>
  <option value="A">A</option></select>
</form>

 </div>
 	  <?php
   include("dbConnect.php");
   
   $letters="abcdefghijklmnopqrstuvwxyz";
   echo "<div class='bigMargin'>";
      echo "<span class=\"bold\">Search By: </span>";
   for ($i=0; $i<=35; $i++) {
      $letter=substr($letters,$i,1);
      echo "<a href='babyNameFinder.php?initial=$letter'>$letter</a> ";
   }  
   echo "</div>";
   
   echo "<div class='bigMargin'>";
   if (isset($_GET["initial"])) {
      $initial=$_GET["initial"];
      $dbQuery=$conn->prepare("select * from BabyNames where GirlNames like :initial order by GirlNames asc");
      $initial=$initial.'%';
      $dbParams=array('initial'=>$initial);
      $dbQuery->execute($dbParams);
      echo "<ul>";
      while ($dbRow = $dbQuery->fetch(PDO::FETCH_ASSOC)) {
		      echo "<a href='#,' onclick=\"listBabyNames('$babyName')\">$letter</a> ";
         $babyName=$dbRow["GirlNames"];
		 echo "<table border='1' width='5%' rows=''2";
         echo "<p><li>$babyName</li></p>";
      }
      echo "</ul>";
   } else {
      
   }
   echo "</div>";      
?>
 
      </div>
      </div>
    </div>


    <div class="rightcol">
      <div class="title">
      </div>
      <div class="panel">
        <div class="content">
          <ul>
            <div class="banner"> <img src="images/baby_names.jpg" alt="baby_names.jpg"    />
    <div class="banner-shadows"></div>
    </div>
	     <br><br>
	 <br><br>
	 <br><br>
    <div class="service mar-right40"> <img src="images/baby_names2.jpg" alt="image" />
      <div class="shadows"></div>
      </div>
<center>
        <h4>Most quirky unusual names for babies revealed!</h4>
        <br><div input type="button" class="button-form"><a href="http://www.sheknows.com/parenting/articles/977121/unique-baby-names">Read More </a></div>
	 </center> </br>
	 </div>
    </div>
          </ul>
        </div>
      </div>

	
  <div class="clearing"></div>  
  </div>
</div>
<!---wrap4--->
<div class="wrap3">
<div class="container">
  <div class="footer"> Copyright (c) websitename. All rights reserved.<a href="www.alltemplateneeds.com" target="_blank"> < www.alltemplateneeds.com ></a><br />
    <span>Image courtesy .</span><a href="www.photorack.net" target="_blank" class="active"> www.photorack.net</a> </div>
<div class="clearing"></div>
</div>
</div>
<div class="shadows2">
</div>
</body>
</html>