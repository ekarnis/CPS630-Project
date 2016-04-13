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
	//mysql_select_db($dbname);

	//Set Charset to UTF9
	mysqli_query($conn, "SET NAMES 'utf8'");
	mysqli_query($conn, "SET CHARACTER SET utf8");
	mysqli_query($conn, "SET COLLATION_CONNECTION = 'utf8_unicode_ci'");

	$inventoryCount=0;
	//Fetch the line information
    //check if $GET_ is set to avoid undefined index error
	if(isset($_GET['searchitem']))
	{
    $var = $_GET['searchitem'];
        /*if(isset($_GET['sortby'])) {
            $sortby = $_GET['sortby'];
        }
        else {
            $sortby = "Name ASC";
        } */
		$query = "SELECT user_id, Category_id, Name, Description, Price, Image_Link FROM Item
        WHERE (Name LIKE '". "%" . "' '". $var . "' '". "%" . "')
        OR (Description LIKE '". "%" . "' '". $var . "' '". "%" . "')";
	}
	else
    {
		$query = "SELECT user_id, Category_id, Name, Description, Price, Image_Link FROM Item";
	}
	$result = mysqli_query($conn, $query);
	if ($result)
	{
		while($row = mysqli_fetch_array($result))
		{
			$name[$inventoryCount]			= $row["Name"];
			$description[$inventoryCount]	= $row["Description"];
			$price[$inventoryCount]			= "$".$row["Price"];
            $link[$inventoryCount] = $row["Image_Link"];
			$inventoryCount++;
		}
	}
 /* IMPORTANT: when adding images for each item, the image name that goes into the database should be "item_name",
 that exactly matches the actual image file saved as "item_name.jpg". Images also must be saved in .jpg form.
 */
?>
<?php include("header.php");?>
<main class="container" id="link_1">
	<article class="col-xs-12">
		<form>
			<input type="textbox" name="searchitem" class="searchedTextBox" placeholder="Search Item...">
			<button type="submit" class="btn btn-default" onclick="searchItem">Search</button>
		</form>
 <!--   <form align="right">
            <select name="sortby">
                <option value="Name DESC">By Name Descending</option>
                <option value="Name ASC">By Name Ascending</option>
                <option value="Price DESC">By Price High-Low</option>
                <option value="Price ASC">By Price Low-High</option>
            </select>
            <input type="submit">
        </form> -->
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

              echo "<div class='item-picture'>";
              	echo "<img src='img/".$link[$x] .".jpg' alt='". $x ."'>";
              echo "</div>";
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
