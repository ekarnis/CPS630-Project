<?php
	class ajaxValidate {
		function formValidate() {
				//Put form elements into post variables (this is where you would sanitize your data)
				$signupUsername = @$_POST['username'];
				$signupPassword = @$_POST['password'];
				$signUpName = @$_POST['name'];
				$signUpInstitutionId = @$_POST['institution'];
				$signUpPhone  = @$_POST['phone'];
				$signUpAddress = @$_POST['address'];


				//Establish values that will be returned via ajax
				$return = array();
				$return['msg'] = '';
				$return['error'] = false;

				$return['users'] = "";
				$return['pass'] = "";

				//$return['selectedUser'] = $selectedUsername;
				//$return['selectedPass'] = $selectedPass;

				////////////////////////
				//Define Database///////
				////////////////////////
				$hostname = "45.40.164.18";
				$username = "cps630";
				$password = "DontEat123!";
				$dbname = "cps630";

				//Connecting to your database
				mysql_connect($hostname, $username, $password) OR DIE ("Unable to connect to database! Please try again later.");
				mysql_select_db($dbname);

				//Set Charset to UTF9
				mysql_query("SET NAMES 'utf8'");
				mysql_query("SET CHARACTER SET utf8");
				mysql_query("SET COLLATION_CONNECTION = 'utf8_unicode_ci'");

				//Fetch the line information
				$query = "Select User_Id, Login as 'username', Pass from Login";

				$result = mysql_query($query);


				$count=0;
				if ($result)
				{
					while($row = mysql_fetch_array($result))
					{
						$userId[$count]			= 	 $row["User_Id"];
						$usernames[$count] 		=	 $row["username"];
						$pass[$count]			=	 $row["Pass"];

						$count++;
					}
				}

				//Check if username already exists
				$loggedIn_User = null;
				for($x = 0; $x < $count; $x++){
					if($usernames[$x] == $username){
						//$return['error'] = true;
						break;
					}
				}

				/////
				///// ADD INSERT CODE HERE
				/////
				mysql_query('SET foreign_key_checks = 0');

				$query = "INSERT INTO User (Name,Institution_id,Phone_number,Role_id,Address)
				values('$signUpName','$signUpInstitutionId','$signUpPhone','1','$signUpAddress')";

				$result = mysql_query($query);

				if(!$result)
				{
					$message  = 'Invalid query: ' . mysql_error() . "\n";
					$message .= 'Whole query: ' . $query;
					die($message);
				}
				mysql_query('SET foreign_key_checks = 1');

				$query = "SELECT User.Key FROM User WHERE Name=".'"'.$signUpName.'"';
				$result = mysql_query($query);

				if ($result)
				{
					while($row = mysql_fetch_array($result))
					{
						$key = $row["Key"];
						$count++;
					}
				}


				$query = "INSERT INTO Login (User_Id,Login,Pass)
				values('$key','$signupUsername','$signupPassword')";

				$result = mysql_query($query);

				if(!$result)
				{
					$message  = 'Invalid query: ' . mysql_error() . "\n";
					$message .= 'Whole query: ' . $query;
					die($message);
				}

				//Error Checking
				//Begin form validation functionality
				if (!isset($selectedUsername) || empty($selectedUsername) || !isset($selectedPass) || empty($selectedPass)){
						//$return['error'] = true;
				}

				//Begin form success functionality
				if ($return['error'] === false){
						$return['msg'] = '<li>Success Message</li>';
				}

				//Return json encoded results
				return json_encode($return);
			}
	}

	$ajaxValidate = new ajaxValidate;
	echo $ajaxValidate -> formValidate();
?>
