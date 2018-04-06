<?php
 session_start();
  if (!isset($_SESSION["currentUser"])) 
     header("Location: login.php");

?>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
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
<u><h1>Search baby names by letter</h1></u>
      </div>
      <div class="page-content">
      <div class="panel borderbotm-none">
        <div class="content">
         
	 <div class="contact-form mar-top30">
	 <center>
<?php

  session_start();
   include("dbConnect.php");
   error_reporting(E_ALL);
ini_set('display_errors', 1);
   
   if(isset($_SESSION['currentUserID'])){
   
   $letters="ABCDEFGHIJKLMNOPQRSTUVWXYZ";
for ($i=0; $i<=25; $i++) {
    $letter=substr($letters,$i,1);
    if ($i)
        echo " | ";
    echo "<a href='babyNameFinder.php?initial=$letter'>$letter</a> ";
}
   echo "</div><br><hr></br>";
   
   echo "<div class='bigMargin'>";
  if(isset($_GET["initial"])) {
  $initial=$_GET["initial"];
  $dbQuery=$conn->prepare("select * from BabyNames where babyNames like :initial");
  $initial=$initial.'%';
  $dbParams=array('initial'=>$initial);
  $dbQuery->execute($dbParams);
	
	  
  $arr = array();
  $count = 0;
  while($dbRow = $dbQuery->fetch(PDO::FETCH_ASSOC)) {
    if($dbRow['gender'] === 'B') { $arr['BoysName'][] = $dbRow['babyNames']; }
    elseif($dbRow['gender'] === 'G') { $arr['GirlsName'][] = $dbRow['babyNames']; }
    $count++;
  }
 
  echo '<style type="text/css">
.tableBG {
  border:1;
  width:400px;
}
.tableBG th, .tableBG td {
  border:2px solid white;

}
.tableBG td.noBorder {
  border:0;
}

</style>

<center>
<table class="tableBG">
<tr>
<th>Boy Names</th>
<th>Girls Names</th>
</tr>';

   $i = 0;
  while($i < $count) {
    echo '<tr>';
    if(isset($arr['BoysName'][$i])) { echo '<td>'. $arr['BoysName'][$i] . '<button style="text-align:right;float:right;" class="favourites"  id="' . $arr['BoysName'][$i] . '" value="' . $dbRow["UserID"] .'<span style="font-size:150%;color:red;">❤️</span></div></button></td>'; }
    else{ echo '<td class="noBorder">&nbsp;</td>'; }
    if(isset($arr['GirlsName'][$i])) { echo '<td>'.$arr['GirlsName'][$i] . '<button style="text-align:right;float:right;" class="favourites" id="'  . $arr['GirlsName'][$i] . '" value="' . $dbRow["UserID"] . $dbRow["nameID"] .'<span style="font-size:150%;color:red;">❤️</span></div></button></td>'; }
    else{ echo '<td class="noBorder">&nbsp;</td>'; }
    echo '</tr>';
    $i++;
  }
  echo '</table></center>';
  }
   }
?>

<script>

$(document).ready(function() {
    $("button[class='favourites']").click(function(e) {  
		e.preventDefault();
	 
	  var nameID = $(this).prop('id');  
	  var UserID = '<?php echo ($_SESSION['currentUserID'])?>';
	  
$.ajax({
  method: 'POST',
  url: 'insert.php',
  data: {nameID:nameID, UserID:UserID},
  success: function(data) {
    $('.favourites').html(data)
	 alert("baby name was successfully added to your favourites!");
  }
  	 
});
});
});

</script>
		

<br> <br>


</select>


  </div>
  </form>

</form>

 </div>
      </div>
      </div>
    </div>


    <div class="rightcol">
      <div class="title">
	  <u><h1>Still Unsure?</h1></u>
      </div>
	  
      <div class="panel">
        <div class="content">
          <ul>
            <div class="banner"> <center><img src="images/baby_name_finder.jpg" alt="image"  /></center>
    <div class="banner-shadows"></div>
    </div>
	     <br><br>
	 <br><br>
	 <br><br>
    <div class="service mar-right40"> <center><img src="images/baby_names.jpg" alt="image" />
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
<!--- FOOTER --->
<?php
include_once 'footer.php';
?>
</html>