<?php
 session_start();
  if (!isset($_SESSION["currentUser"])) 
     header("Location: login.php");

?>
<!DOCTYPE html PUBLIC">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Appointments| PregnancyPal</title>
	
<link href="css/styles.css" rel="stylesheet" type="text/css" />
<link href='http://fonts.googleapis.com/css?family=Economica' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
<!----menu--->
<link rel="stylesheet" href="css/superfish.css" media="screen">
<script src="js/jquery-1.9.0.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="js/hoverIntent.js"></script>
<script src="js/superfish.js"></script>
<script src="https://use.fontawesome.com/df026a8165.js"></script>
 <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" ></script>
        <script src="js/calendar.js" ></script>
		<script src="../includes/jquery/jquery-1.4.2.js"></script>
        <script type="text/javascript">
            var ajaxurl = "http://demo.pluginus.net/calendar/";
            var pn_appointments_calendar = null;
            jQuery(function() {
                pn_appointments_calendar = new PN_CALENDAR();
                pn_appointments_calendar.init();
          
		// initialise plugins
		jQuery(function(){
			jQuery('#example').superfish({
				//useClick: true
			});
		});
</script>
</head>

<?php
session_start();

include ("dbConnect.php");
echo ($_SESSION['currentUserID']);

if(isset($_POST['submit'])){


if (empty($_POST['Time']))
	
	{
		
		$error[] = 'Please Enter a Time';
	}
	else 
	{
		$stmt = $conn->prepare('SELECT Time FROM MedicalAppointment WHERE Time = :Time');
		$stmt->execute(array(':Time' => $_POST['Time']));
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
	}

if(!isset($error)){
	
	try {

 $UserID = $_SESSION['currentUserID'];
			//insert into database with a prepared statement
			$stmt = $conn->prepare('INSERT INTO MedicalAppointment (Time, Date, Notes, AppointmentType,UserID) VALUES (:Time, :Date, :Notes, :AppointmentType, :UserID)');
			$stmt->execute(array( 
				':Time' =>$_POST['Time'],
				':Date' => $_POST['Date'],	
				':Notes' => $_POST['Notes'],	
				':AppointmentType' =>$_POST['AppointmentType'],
				':UserID' =>$UserID
				));
				
				
		//$UserID = $conn->lastInsertId('UserID');
			ob_start();
			//redirect to index page
			echo'<script>window.location = "Appointments.php?action=joined";</script>';
		
 
			
			//header("Location: index.php?action=joined");
			exit;

		//else catch the exception and show the error.
		} catch(PDOException $e) {
			$error[] = $e->getMessage();
		}
}
	}
	elseif (isset($_POST['save'])) {
        # Save-button was clicked
		
//Register Form Validation
//FirstName required
if (empty($_POST['Date']))
	# Submit-button was clicked
	{
		
		$error[] = 'Please Enter a Time';
	}
	else 
	{
		//$stmt = $conn->prepare('SELECT Time FROM MedicalAppointment WHERE Time = :Time');
		//$stmt->execute(array(':Time' => $_POST['Time']));
		//$row = $stmt->fetch(PDO::FETCH_ASSOC);
	}

if(!isset($error)){
	
	try {

 $UserID = $_SESSION['currentUserID'];
			//insert into database with a prepared statement
			$stmt = $conn->prepare('INSERT INTO MedicalAppointmentResults (Date, BabySize, UrineTest, BloodPressure, UserID) VALUES (:Date, :BabySize, :UrineTest, :BloodPressure, :UserID)');
			$stmt->execute(array( 
				':Date' =>$_POST['Date'],
				':BabySize' => $_POST['BabySize'],	
				':UrineTest' => $_POST['UrineTest'],	
				':BloodPressure' =>$_POST['BloodPressure'],
				':UserID' =>$UserID
				));
		
		
		//$UserID = $conn->lastInsertId('UserID');
			ob_start();
			//redirect to index page
			echo'<script>window.location = "Appointments.php?action=savef1";</script>';
					
			//header("Location: index.php?action=joined");
			exit;

		//else catch the exception and show the error.
		} catch(PDOException $e) {
			$error[] = $e->getMessage();
		}
}
	}
 	
?>

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
    <div class="leftcol">
      <div class="title">
</i><u><h1>Please select a date to see the details</h1></u>
</div>

<?php
	session_start();

		// get params
	$monthArg = $_GET['m'];
// calc dates and weekdays
				if ($monthArg == null || $monthArg == '')		
					$currMonth= date("m");				
				else
					$currMonth = intval($monthArg);	
								
				$currYear = date("Y");
				$startDate = strtotime($currYear . "-" . $currMonth . "-01 00:00:01");
				$startDay= date("N", $startDate);
				$monthName = date("M",$startDate );
				
				//echo("start day=". $startDay . "<br>");

				$daysInMonth = cal_days_in_month(CAL_GREGORIAN, date("m", $startDate), date( "Y", $startDate));
				$endDate = strtotime($currYear . "-" . $currMonth . "-" .  $daysInMonth ." 00:00:01");

				//echo(date("Y", $endDate) . "-" . date("m", $endDate) . "-". date("d", $endDate));
				$endDay = date("N", $endDate);
				//echo("end day=" . $endDay . "<br>");		

				// initialize structure array matching the calendar grid
				// 6 rows and 7 columns

					// php date sunday is zero
				if ($startDay> 6)
					$startDay = 7 -$startDay;

				$currElem = 0;
				$dayCounter = 0;
				$firstDayHasCome = false;
				$arrCal = array();
				for($i = 0; $i <= 5; $i ++) {
					for($j= 0; $j <= 6; $j++) {
								// decide what to show in the cell
					    if($currElem < $startDay && !$firstDayHasCome)			
							$arrCal[$i][$j] = "";
						else if ($currElem == $startDay && !$firstDayHasCome) {
							$firstDayHasCome= true;
							$arrCal[$i][$j] = ++$dayCounter;
						}
						else if ($firstDayHasCome) {
							if ($dayCounter < $daysInMonth)
								$arrCal[$i][$j] = ++ $dayCounter; 
							else
								$arrCal[$i][$j] = "";	
						}							
				
						$currElem ++;				
					}
				}

?>
<style>
body{
font-family:"Helvetica Neue",Arial,Helvetica,sans-serif;-webkit-text-size-adjust:none;color:#000000;font-size:14px;font-style:normal;font-weight:normal;line-height:line-height;text-decoration:none; margin:0; padding:0;
}
div.wrapper{
	display:inline;
	width:4%;
	margin:0;
	text-align:left;
}

.heading2{
font-family: 'Economica', sans-serif; 
	font-weight:bold;
	font-size:30px;
	text-align:center;
	color:#d1869b;
	margin-bottom:10px;
	}
.closingDate{
	margin-top:40px;
	text-align:center;
	font-weight:bold;
	color:#FF0000;
	}
	
.clear{
	clear:both;
	}
.container_col2{
	width:400px;
	min-height:300px;
	margin:0 auto;
	padding:10px;
	background-color:#FFFFFF;
	}
.container_comp{
	width:880px;
	height:600px;
	margin:0 auto;
	padding:40px;
	background-color:#f7f7f7;
	border-radius:20px;
	border:1px solid #999999;
	margin-bottom:25px;
	align:left;
	}
.container_calendar{
	width:500px;
	height:200px;
	margin-bottom:25px;
	}
.navg_month{
	height:10px;
	text-align:center;
	margin-bottom:10px;
	font-size:12px;
	word-spacing:7px;
	text-decoration:uppercase;
	}
.month{
	font-size:9.5px;
	color:#d1869b;
	text-decoration:uppercase;
	text-align:center;
	}
.month:hover{
	color:#000066;
	text-decoration:none;
	}
.day{
	width:109px;
	height:25px;
	color:#330000;
	float:left;
	padding:5px;
	text-align:left;
	font:bold 16px arial;
	border-bottom:1px solid #999999;
	border-right:1px solid #999999;
	background-color:#cccccc;
	}
.date{
	width:50px;
	height:50px;
	float:left;
	}
.date:hover{
	background-color:#ededed;
	cursor:pointer;
	}
.date .top{
	width:20px;
	height:48px;
	/*border:1px solid red;*/
	}
.date .bottom{
	width:118px;
	height:48px;
	/*border:1px solid red;*/
	}
.date .bottom .part{
	width:10px;
	height:20px;
	float:left;
	/*border:1px solid red;*/
	}

.day{
	width:60px;
	height:20px;
	color:#330000;
	padding:5px;
	text-align:center;
	font:bold 16px arial;
	border-bottom:1px solid #999999;
	border-right:1px solid #999999;
background: url(../images/bg4.jpg)
	}
.date{
	width:70px;
	height:20px;
	float:left;
	border-bottom:1px solid #999999;
	border-right:1px solid #999999;
background: url(../images/bg1.jpg);
	}
.date:hover{
	background-color:#d1869b;;
	cursor:pointer;
	}

.date .bottom .part{
	width:10px;
	height:20px;
	/*border:1px solid red;*/
	}

.date_topright{
	height:15px; 
	width:20px;
	color:#000000;
	text-align:right;
	padding:0px;

	}
.seprator{
	color:#333333;
	text-shadow:#000000;
	}
</style>

<center>

            	<div class="heading2"><?php echo($monthName. "&nbsp;" . $currYear);?></div>
		
				<br>
                <div class="navg_month">
                	    <a href="Appointments.php?m=1" class="month">JAN</a>
                        <span class="seprator">|</span>
                        <a href="Appointments.php?m=2" class="month">FEB</a>
                        <span class="seprator">|</span>
                        <a href="Appointments.php?m=3" class="month">MAR</a>
                        <span class="seprator">|</span>
                        <a href="Appointments.php?m=4" class="month">APR</a>
                        <span class="seprator">|</span>
                        <a href="Appointments.php?m=5" class="month">MAY</a>
                        <span class="seprator">|</span>
                        <a href="Appointments.php?m=6" class="month">JUN</a>
                        <span class="seprator">|</span>
                        <a href="Appointments.php?m=7" class="month">JUL</a>
                        <span class="seprator">|</span>
                        <a href="Appointments.php?m=8" class="month">AUG</a>
                        <span class="seprator">|</span>
                        <a href="Appointments.php?m=9" class="month">SEP</a>
                        <span class="seprator">|</span>
                        <a href="Appointments.php?m=10" class="month">OCT</a>
                        <span class="seprator">|</span>
                        <a href="Appointments.php?m=11" class="month">NOV</a>
                        <span class="seprator">|</span>
                        <a href="Appointments.php?m=12" class="month">DEC</a>
				</div>
				<br>
            	<div class="container_calendar">
                	<div>
                    	<div class="day" style="">Sun</div>
                        <div class="day">Mon</div>
                        <div class="day">Tues</div>
                        <div class="day">Wed</div>
                        <div class="day">Thurs</div>
                        <div class="day">Fri</div>
                        <div class="day">Sat</div>
                        <div class="clear"></div>
                    </div>

					<?php
						$currElem = 0;
						$dayCounter = 0;
						$firstDayHasCome = false;
						$lowerLeftCorner= "style=\"border-bottom-left-radius:6px;\"";
						$lowerRightCorner= "style=\"border-bottom-right-radius:6px;\"";
	
						for($i = 0; $i <= 5; $i ++) {
							echo("<div>\r\n");
							for($j= 0; $j <= 6; $j++) {
								
								$divId = $currYear . "-";
								$divId .= $currMonth . "-";
								if(intval($arrCal[$i][$j]) < 10)
									$divId .= "0";
								$divId .= $arrCal[$i][$j];

								$leftCorner = "";
								$rightCorner = "";
								if ($i == 5 && $j ==0)
									$leftCorner = $lowerLeftCorner;

								if ($i == 5 && $j == 6)
									$leftCorner = $lowerRightCorner;

								// decide what to show in the cell
							    if($currElem < $startDay && !$firstDayHasCome)	{		
									echo("<div class=\"date\"". $leftCorner .">\r\n");
									echo("</div>\r\n");

								}
								else if ($currElem == $startDay && !$firstDayHasCome) {
									$firstDayHasCome= true;
									echo("<div id=" . $divId . " class=\"date\"". $leftCorner .">\r\n");
									echo("<div class=\"top\">\r\n");
	                            	echo("<div class=\"date_topright\">" . $arrCal[$i][$j] ."</div>\r\n");
	                            	echo("</div>\r\n");
			                        echo("<div class=\"bottom\">\r\n");
            			            echo("<div class=\"part\"></div>\r\n");
                        		    echo("<div class=\"part\"></div>\r\n");
		                            echo("<div class=\"part\"></div>\r\n");
        			                echo("</div>\r\n");
									echo("</div>\r\n");
									$dayCounter ++;

								}
								else if ($firstDayHasCome) {
									if ($dayCounter < $daysInMonth) {
										echo("<div id=". $divId . " class=\"date\">\r\n");
										echo("<div class=\"top\">\r\n");
		                            	echo("<div class=\"date_topright\">" . $arrCal[$i][$j] ."</div>\r\n");
		                            	echo("</div>\r\n");
				                        echo("<div class=\"bottom\">\r\n");
            				            echo("<div class=\"part\"></div>\r\n");
                	        		    echo("<div class=\"part\"></div>\r\n");
		            	                echo("<div class=\"part\"></div>\r\n");
        			    	            echo("</div>\r\n");
										echo("</div>\r\n");
										$dayCounter ++;
									}	
									else {
										echo("<div class=\"date\"". $leftCorner . ">\r\n");
										echo("</div>\r\n");
									}
								}								
				
							$currElem ++;				
							}
							echo("</div>\r\n");
						}
?>
<script>
	$(document).ready(function() {
		$('.date').click(function(){
			alert($(this).attr('id'));
			  


$.ajax({
  method: 'GET',
  url: 'Appointments.php',
  data: {id},
  success: function(data) {
    $('.date').html(data)
	 alert("success!");
	  }
});
});
});
</script>

<?php 
if(isset($_GET['id'])){
				$value = $_GET['id'];
				$dbQuery = $conn->prepare("SELECT * FROM MedicalAppointment WHERE Date=$('.date')");
				$dbQuery->execute($dbParams);
				
				$dbQuery->rowCount()."\n";
			   while ($dbRow=$dbQuery->fetch(PDO::FETCH_ASSOC)) {
				  echo $dbRow["AppointmentType"];
				  echo $dbRow["Date"];
				  echo $dbRow["Time"];
				  echo $dbRow["Notes"];
			   }
			}	
			var_dump( $_GET["id"]);
			var_dump($dbRow["AppointmentType"]);
		?>
				
<center><h2>Appointment Details</h2></center>
<br><br>
  <h4>Appointment Type:<br>
  Time:<br>
   Notes:<br>
	Baby Size:<br>
	 Urine test:</br>
	  Blood Pressure</h4>
	 

                 </div>


<div class="wrap2">
      </div>
      <div class="page-content">
      <div class="panel borderbotm-none">
        <div class="content">
         
	 <div class="contact-form mar-top30">
	 <center>
		

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
   <i class="fa fa-plus-square fa-2x" aria-hidden="true">&nbsp;</i>	<h2> Record Medical Appointments</h2>
      </div>
	  
      <div class="panel">
        <div class="content">
		
		<form method="POST">
		 <div class="contact-form mar-top30">
            <label> <span></span>
  <select name="AppointmentType" STYLE="width:300px; height:50px; background: url(../images/bg1.jpg);" size="0">
  <option selected disabled><i>Choose One</i></option>
    <option value="Health Visitor">Health Visitor</option>
    <option value="Hospital">Hospital</option>
    <option value="GP">GP</option>
    <option value="Other">Midwife</option>
	   <option value="Other">Other</option>
	</select>
            <label> <span></span>
	
     <input type="text" class="input_text"  name="Time" id="Time" placeholder="Time" value="<?php if(isset($error)){ echo $_POST['Time']; } ?>"
	</label>
     <label> <span></span>
	 <input type="date" class="input_text" name="Date" placeholder="Date" value="<?php if(isset($error)){ echo $_POST['Date']; } ?>"
	 </label>
     <label> <span></span>
     <input type="textarea"  class="input_text_notes" name="Notes" id="Notes" placeholder="Notes" value="<?php if(isset($error)){ echo $_POST['Notes']; } ?>" tabindex="3">
    </label><span></span>
	  <br><br>
		    <center> <input type="submit" name="submit" value="Save" class="button-form" >
          </center>
		  <br><br>
<?php if(isset($_GET['action']) && $_GET['action'] == 'savef1'){
    						echo "<h4>Appointmenthas now been Added!</h4>";
}
?>
    <div class="banner-shadows">
    <div class="contact-form mar-top30">
	  <div class="rightcol">
      <div class="title">
<?php

?>
   <i class="fa fa-plus-square fa-2x" aria-hidden="true">&nbsp;</i>	<h2> Record Medical Results</h2>
  </div>
	   <label> <span></span>
	 <input type="date" class="input_text" name="Date" placeholder="Date" value="">
	 </label>
	   <label> <span></span>
	  <input type="text"  class="input_text" name="BabySize" id="babySize" placeholder="Baby Size"  value="">
    </label><span></span>
	<label> <span></span>
 <select name="UrineTest" STYLE="width:300px; height:50px; background: url(../images/bg1.jpg);" size="0">
	 <option selected disabled>Urine Test</option>
    <option value="Yes">Yes</option>
    <option value="No">No</option>
	</select>
	 <label> <span></span>
	  <input type="text"  class="input_text" name="BloodPressure" id="bloodPressure" placeholder="Blood Pressure"  value="">
    </label><span></span>
	<center> <input type="submit" name="save" value="Save" class="button-form" >
          <ul></center>
<center>
        <?php if(isset($_GET['action']) && $_GET['action'] == 'savef1'){
    						echo "<h4>Appointmenthas now been Added!</h4>";
}
?>
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