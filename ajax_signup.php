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
				
				
				
				//Insert into login
					//select login_id
				
				//Insert into User
					//select user id
					
				//if user does not exist, throw error
				
				
				
				//Fetch the line information
				$query = "Select User_Id, Login as 'username', Pass from Login";
				
				$result = mysql_query($query);
				
				
				
				$count=0;
				if (!$result) 
				{
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