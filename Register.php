<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
include ("dbConnect.php");


if(isset($_POST['submit'])){

//Register Form Validation
//FirstName required
if (empty($_POST['firstname']))
	{
		
		$error[] = 'Please enter your forename';
	}
	else 
	{
		$stmt = $conn->prepare('SELECT FirstName FROM Profile WHERE FirstName = :firstname');
		$stmt->execute(array(':firstname' => $_POST['firstname']));
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
	}

//Ensure Password isnt less than 3 characters

if(strlen($_POST['Password']) < 3){
		$error[] = 'Password is too short.';
	}
		else 
	{
		$stmt = $conn->prepare('SELECT Password FROM Profile WHERE Password = :Password');
		$stmt->execute(array(':Password' => $_POST['Password']));
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
	}
	
	//email validation
	if(!filter_var($_POST['EmailAddress'], FILTER_VALIDATE_EMAIL)){
		$error[] = 'Please enter a valid email address';
	} else {
		$stmt = $conn->prepare('SELECT EmailAddress FROM Profile WHERE EmailAddress = :EmailAddress');
		$stmt->execute(array(':EmailAddress' => $_POST['EmailAddress']));
		$row = $stmt->fetch(PDO::FETCH_ASSOC);

		if(!empty($row['email'])){
			$error[] = 'Email provided is already in use.';
		}
		
	}
	
//Ensure Due Date is entered

if (empty($_POST['DueDate']))
	{
		
		$error[] = 'Please enter your due date';
	}

	else 
	{
		$stmt = $conn->prepare('SELECT DueDate FROM Profile WHERE DueDate = :DueDate');
		$stmt->execute(array(':DueDate' => $_POST['DueDate']));
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
	}
if(!isset($error)){
	
	try {

			//insert into database with a prepared statement
			$stmt = $conn->prepare('INSERT INTO Profile (FirstName, Password,  EmailAddress, DueDate) VALUES (:firstname, :Password, :EmailAddress, :DueDate)');
			$stmt->execute(array(
				':firstname' =>$_POST['firstname'],
				':Password' => $_POST['Password'],	
				':EmailAddress' => $_POST['EmailAddress'],	
				':DueDate' => $_POST['DueDate']	
				));
				
				
		//$UserID = $conn->lastInsertId('UserID');
			ob_start();
			//redirect to index page
			
			echo'<script>window.location = "login.php?action=joined";</script>';
			//header("Location: index.php?action=joined");
			exit;

		//else catch the exception and show the error.
		} catch(PDOException $e) {
			$error[] = $e->getMessage();
		}

	
}
	}
 	
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Register | PregnancyPal</title>
	
<link href="css/styles.css" rel="stylesheet" type="text/css" />
<link href='http://fonts.googleapis.com/css?family=Economica' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
<!----menu--->
<link rel="stylesheet" href="css/superfish.css" media="screen">
<script src="js/jquery-1.9.0.min.js"></script>
<script src="js/hoverIntent.js"></script>
<script src="js/superfish.js"></script>
<script src="https://use.fontawesome.com/df026a8165.js"></script>
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
				<li><a href="test.php"> Login</a></li>
    </div>
				
    <div class="menu">

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
      <h1><center>Register Now!</h1></center>
	  </div>

<?php
//check for any errors
    					if(isset($error)){
    						foreach($error as $error){
    							echo '<center><h4>'.$error.'</h4></center>';
    						}
    					}
?>

<form method="POST">
          <div class="contact-form mar-top30">
            <label> <span></span>
			<i class="fa fa-user fa-2x" aria-hidden="true"></i>
			
            <input type="text" class="input_text"  name="firstname" id="FirstName" placeholder="First Name" value="<?php if(isset($error)){ echo $_POST['firstname']; } ?>"
            </label>
            <label> <span></span>
			<i class="fa fa-envelope fa-2x" aria-hidden="true"></i>
            <input type="text" class="input_text" name="EmailAddress" id="EmailAddress" placeholder="Email Address"  value="<?php if(isset($error)){ echo $_POST['EmailAddress']; } ?>" tabindex="2">
            </label>
            <label> <span></span>
			<i class="fa fa-key fa-2x" aria-hidden="true"></i>
            <input type="password" class="input_text" name="Password" placeholder="Password" value="<?php if(isset($error)){ echo $_POST['Password']; } ?>" tabindex="3">
            </label>
            <label> <span></span>
			<i class="fa fa-calendar fa-2x" aria-hidden="true" "Due Date"></i>
           <input type="date" class="input_text" name="DueDate" placeholder="Due Date" value="<?php if(isset($error)){ echo $_POST['DueDate']; } ?>" tabindex="4">
		   <br></br><br>
		   <input type="submit" name="submit" value="Register" class="button-form" tabindex="5">

		
            </label>
          </div>
        </form>
<br><br><br><br><br><br><br><br>
</div>

    </div>
  <div class="clearing"></div>  
  </div>
  <div class="clearing"></div>
</div>
<?php
include_once 'footer.php';
?>
</body>
</html>
</html>