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

	//Fetch the line information
	//$var = $_GET['searchitem'];

	$query = "SELECT i.`Key`, i.Name FROM `Institution` i;";

	$uniCount=0;
	$result = mysqli_query($conn, $query);
	if ($result)
	{
		while($row = mysqli_fetch_array($result))
		{
			$uniName[$uniCount]		=	 $row["Name"];
			$uniKey[$uniCount]		=	 $row["Key"];
			$uniCount++;
		}
	}
?>


<?php include("header.php");?>

    <main class="container" id="link_1">
        <article class="col-xs-12">
			<input type="textbox" id="login-username-field" class="formattedTextBox" placeholder="Name"></input>
		
			<br>

			<input type="password" id="login-password-field" class="formattedTextBox" placeholder="Password"></input>

			<br>
		
			<input type="textbox" id="login-name-field" class="formattedTextBox" placeholder="Name"></input>

			<br>

			<select id="login-institution-field" class="formattedTextBox">
				<option value="" disabled selected>University/College</option>
				
				<?php
					for($x = 0; $x < $uniCount; $x++)
					{
						?>
							<option value="<?php echo $uniKey[$x]; ?>"><?php echo $uniName[$x]; ?></option>
						<?php
					}
				?>
			</select>

			<br>

			<input type="textbox" id="login-phone-field" class="formattedTextBox" placeholder="Phone Number"></input>
        </article>

		<article class="col-xs-12">
			<div class="row">
				<div class="col-xs-12">
					<input type="textbox" id="login-address-field" class="formattedTextBox" placeholder="Address"></input>
				</div>
			</div>

			<div class="row10px">
				<div class="col-xs-6">
					<input type="number" id="login-username-field" class="formattedTextBox disabled" placeholder="Lattitude" disabled="disabled"></input>
				</div>

				<div class="col-xs-6">
					<input type="number" id="login-username-field" class="formattedTextBox disabled" placeholder="Longitude" disabled="disabled"></input>
				</div>
			</div>

			<div class="row">
				<div class="col-xs-12">
					<div id="append-geo-here"></div>
				</div>
			</div>
		</article>

		<div class="col-xs-12">
				<button type="button" id="login-singup-button" class="btn btn-xl btn-warning centeredButton">Done</textarea>
        </div>
    </main>

<?php include("footer.php");?>
