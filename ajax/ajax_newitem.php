<?php
				//Put form elements into post variables (this is where you would sanitize your data)
				$selecteditemname        = @$_POST['itemname'];
				$selecteditemdescription = @$_POST['itemdescription'];
				$selecteditemprice       = @$_POST['itemprice'];
        //$selecteditemdate        = @$_POST['itemdate'];
        //$selecteditemimage       = @$_POST['itemimage'];

        print($selecteditemdate);
        print($selecteditemimage);
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
				$query = "INSERT INTO Item (User_id,Category_id,Name,Description,Price)
        values(2,1,".'"'.$selecteditemname.'","'.$selecteditemdescription.'",'.$selecteditemprice.')';

				$result = mysql_query($query);

        if(!$result)
        {
          $message  = 'Invalid query: ' . mysql_error() . "\n";
          $message .= 'Whole query: ' . $query;
          die($message);
        }
?>
