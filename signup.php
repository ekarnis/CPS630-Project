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

	//Fetch the line information
	$var = $_GET['searchitem'];

	$query = "SELECT i.`Key`, i.Name FROM `Institution` i;";

	$uniCount=0;
	$result = mysql_query($query);
	if ($result)
	{
		while($row = mysql_fetch_array($result))
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
			<input type="textbox" id="login-username-field" class="formattedTextBox" placeholder="User Name"></input>

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
					<input type="number" id="login-lattitude-field" class="formattedTextBox disabled hidden" placeholder="Lattitude" disabled="disabled"></input>
				</div>

				<div class="col-xs-6">
					<input type="number" id="login-longitude-field" class="formattedTextBox disabled hidden" placeholder="Longitude" disabled="disabled"></input>
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

		 <article class="col-xs-12 hidden">
			<div class="label label-warning hidden" id="login-error-div">There is an error with the information above!</div>
			<div class="label label-success hidden" id="login-success-div">Saved</div>
		</article>
    </main>

<?php include("footer.php");?>


<script>
	$(document).on("change", "input", function(){
		$("#login-error-div").closest("article").addClass("hidden");
		$("#login-error-div").addClass("hidden");
	});


	$(document).on("click", "#login-singup-button", function(){
		var loginVars = {
			username: $("#login-username-field").val(),
			password: $("#login-password-field").val(),
			name: $("#login-name-field").val(),
			institution: $("#login-institution-field").val(),
			phone: $("#login-phone-field").val(),
			address: $("#login-address-field").val(),
			lattitude: $("#login-lattitude-field").val(),  //Not being used
			longitude: $("#login-longitude-field").val()   //Not being used
		};

		if(
			loginVars.username == null || loginVars.username == "" ||
			loginVars.password == null || loginVars.password == "" ||
			loginVars.name == null || loginVars.name == "" ||
			loginVars.institution == null || loginVars.institution == "" ||
			loginVars.phone == null || loginVars.phone == "" ||
			loginVars.address == null || loginVars.address == ""
		){
			$("#login-error-div").closest("article").removeClass("hidden");
			$("#login-error-div").removeClass("hidden");
		}
		else{
			$.ajax({
				type: 'POST',
				url: 'ajax/ajax_signup.php',
				data: {
						username: $("#login-username-field").val(),
						password: $("#login-password-field").val(),
						name: $("#login-name-field").val(),
						institution: $("#login-institution-field").val(),
						phone: $("#login-phone-field").val(),
						address: $("#login-address-field").val(),
				},
				dataType: 'json',
				success: function (data) {
					if(typeof data.error != "undefined" && data.error != true)
					{
						console.log(data);
						$("#login-error-div").addClass("hidden");
						$("#login-success-div").closest("article").removeClass("hidden");
						$("#login-success-div").removeClass("hidden");
						$(location).attr('href', 'login.php')
					}
					else
					{
						$("#login-success-div").addClass("hidden");
						$("#login-error-div").closest("article").removeClass("hidden");
						$("#login-error-div").removeClass("hidden");
						$("#login-error-div").text("Error, Please Try Again");
					}
				}
			});
		}
	});
</script>
