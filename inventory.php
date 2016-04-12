<?php
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

	$inventoryCount=0;
	//Fetch the line information
	$var = $_GET['searchitem'];

	if($var != "")
	{
		$query = "SELECT user_id, Category_id, Name, Description, Price FROM Item WHERE Name LIKE". '"' . $var. '%"';
	}
	else
	{
		$query = "SELECT user_id, Category_id, Name, Description, Price FROM Item";
	}
	$result = mysql_query($query);
	if ($result)
	{
		while($row = mysql_fetch_array($result))
		{
			$name[$inventoryCount]				=	 $row["Name"];
			$description[$inventoryCount]	=	 $row["Description"];
			$price[$inventoryCount]			  =  $row["Price"];
			$inventoryCount++;
		}
	}
?>
<?php include("header.php");?>
<main class="container" id="link_1">
	<article class="col-xs-12">
		<form>
			<input type="textbox" name="searchitem" class="searchedTextBox" placeholder="Search Item...">
			<button type="submit" class="btn btn-default" onclick="searchItem">Search</button>
		</from>

		<div class="row">
<?php
			for ( $x = 0; $x < $inventoryCount; $x++)
			{
				echo "<div class='col-lg-3 col-md-6 col-sm-12'>";
					echo "<div class='item'>";
						echo "<div class='item-header'>";
							echo "<h2>". $name[$x]."</h2>";
						echo "</div>";
						
						echo "<div class='item-description'>";
							echo "<p>". $description[$x]."</p>";
							echo "<p>". $price[$x]."</p>";
						
							echo '
									<button type="button" class="btn btn-primary">Request Item</button>
									<button type="button" class="btn btn-primary">Report</button>
								';
						echo "</div>";	
					echo "</div>";
				echo "</div>";
			}
?>
		
		</div>
	</article>
</main>
<?php include("footer.php");?>
<!-- Local Javascript -->
 <script>
	function searchItem(){
		if (str!="") {
    if (window.XMLHttpRequest) {
			// code for IE7+, Firefox, Chrome, Opera, Safari
		  	xmlhttp=new XMLHttpRequest();
		} else { // code for IE6, IE5
				xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		}
		xmlhttp.onreadystatechange=function() {
			if (xmlhttp.readyState==4 && xmlhttp.status==200) {
				document.getElementByName("searchitem").innerHTML = xmlhttp.responseText;
			}
		}
		xmlhttp.open("GET","inventory.php?q="+str,true);
		xmlhttp.send();
		}
	}
 </script>
