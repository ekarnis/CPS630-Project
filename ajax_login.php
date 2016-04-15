<?php
	class ajaxValidate {
		function formValidate() {
				//Put form elements into post variables (this is where you would sanitize your data)
				$selectedUsername = @$_POST['username'];
				$selectedPass = @$_POST['password'];	
				
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
				
				
				//for sercurity reasons do not return the following
				//$return['users'] = $usernames;
				//$return['pass'] = $pass;
				
				
				$loggedIn_User = null;
				for($x = 0; $x < $count; $x++){
					if($usernames[$x] == $selectedUsername && $pass[$x] == $selectedPass){
						$loggedIn_User = $userId[$x];

						break;
					}
				}
			
			
				//Error Checking
				//Begin form validation functionality
				if (!isset($selectedUsername) || empty($selectedUsername) || !isset($selectedPass) || empty($selectedPass)){
						$return['error'] = true;
				}
				
				if($loggedIn_User == null){
					$return['error'] = true;
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