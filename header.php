<?php


////////////////////////
//Define Database///////
////////////////////////
$hostname = "45.40.164.18";
$username = "cps630";
$password = "DontEat123!";
$dbname = "cps630";

//Connecting to your database
$conn = mysqli_connect($hostname, $username, $password, $dbname) OR DIE ("Unable to connect to database! Please try again later.");
//mysqli_select_db($dbname);

//Set Charset to UTF9
mysqli_query($conn, "SET NAMES 'utf8'");
mysqli_query($conn, "SET CHARACTER SET utf8");
mysqli_query($conn, "SET COLLATION_CONNECTION = 'utf8_unicode_ci'");

//Fetch the line information
$query = "Select User_Id, Login as 'username', Pass from Login";

$result = mysqli_query($conn, $query);


$headerCount=0;
if ($result)
{
	while($row = mysqli_fetch_array($result))
	{
		$userId[$headerCount]			=  $row["User_Id"];
		$usernames[$headerCount] 	=	 $row["username"];
		$pass[$headerCount]			  =  $row["Pass"];
		$headerCount++;
	}
}
?>


<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="description" content="PropUp">
	<meta name="keywords" content="">
	<meta name="author" content="Eli Liberzon">
	<title>Prop Up</title>

	<!-- Google Hosted jQuery -->
	<script src="http://code.jquery.com/jquery-2.1.0.min.js"></script>

	<!-- CDN Hosted Bootstrap -->
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

	<link href="themes\style.css" rel="stylesheet" type="text/css">


</head>

<body>
	<header>
		<nav class="navbar navbar-inverse navbar-fixed-top">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="../PropSwap/#">PropSwap</a>
				</div>

				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<!-- lEFT SIDE -->
					<ul class="nav navbar-nav">
						<li><a href="inventory.php">Find an Item</a></li>
					</ul>

					<!-- RIGHT SIDE -->
					<ul class="nav navbar-nav navbar-right">
						<li><a href="login.php">Login/Signup</a></li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li><a href="createitem.php">Add New Item</a></li>
								<li role="separator" class="divider"></li>
								<li><a href="logout.php">Logout</a></li>
							</ul>
						</li>
					</ul>

				</div>
			</div>
		</nav>
	</header>
