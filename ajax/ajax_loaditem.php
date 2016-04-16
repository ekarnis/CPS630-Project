<?php
	class ajaxValidate {
		function formValidate() {
				//Put form elements into post variables (this is where you would sanitize your data)
				$searchtext = @$_POST['searchtext'];
				$myitemsonly = @$_POST['myitemsonly'];

				////////////////////////
				//Define Database///////
				////////////////////////
				$hostname = "45.40.164.18";
				$username = "cps630";
				$password = "DontEat123!";
				$dbname = "cps630";

				//Connecting to your database
				$conn = mysqli_connect($hostname, $username, $password, $dbname) OR DIE ("Unable to connect to database! Please try again later.");

				//Set Charset to UTF9
				mysqli_query($conn, "SET NAMES 'utf8'");
				mysqli_query($conn, "SET CHARACTER SET utf8");
				mysqli_query($conn, "SET COLLATION_CONNECTION = 'utf8_unicode_ci'");

				$inventoryCount=0;

				if($myitemsonly != null)
				{
					if($searchtext != "")
					{
						$query = "SELECT user_id, Category_id, Name, Description, Price, Image FROM Item WHERE ((Name LIKE '". "%" . "' '". $searchtext . "' '". "%" . "') OR (Description LIKE '". "%" . "' '". $searchtext . "' '". "%" . "')) and user_id =".$_COOKIE["LoggedInUser"];
					}
					else
					{
						$query = "SELECT user_id, Category_id, Name, Description, Price, Image FROM Item Where user_id =".$_COOKIE["LoggedInUser"];
					}
				}
				else{
					if($searchtext != "")
					{
						$query = "SELECT user_id, Category_id, Name, Description, Price, Image FROM Item WHERE (Name LIKE '". "%" . "' '". $searchtext . "' '". "%" . "') OR (Description LIKE '". "%" . "' '". $searchtext . "' '". "%" . "')";
					}
					else
					{
						$query = "SELECT user_id, Category_id, Name, Description, Price, Image FROM Item";
					}
				}
				
				$result = mysqli_query($conn, $query);
				if ($result)
				{
					while($row = mysqli_fetch_array($result))
					{
						$name[$inventoryCount]			=	 $row["Name"];
						$description[$inventoryCount]	=	 $row["Description"];
						$price[$inventoryCount]			=  	 $row["Price"];
						$image[$inventoryCount] 		=    $row["Image"];
						$inventoryCount++;
					}
				}

				
				$return = array();
				$return['error'] = false;
				
				$return['itemCount'] = $inventoryCount;
				$return['itemName'] = $name;
				$return['itemDescription'] = $description;
				$return['itemPrice'] = $price;
				$return['itemImageLocation'] = $image;
				$return['itemPhone'] = "";
				
				//Return json encoded results
				return json_encode($return);
			}
	}

	$ajaxValidate = new ajaxValidate;
	echo $ajaxValidate -> formValidate();
?>
