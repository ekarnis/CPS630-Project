<?php include("header.php");?>

<main class="container" id="link_1">
	<article class="col-xs-12">
		<input type="textbox" id="login-username-field" class="formattedTextBox" placeholder="Username"></textarea>

		<br>

		<input type="password" id="login-password-field" class="formattedTextBox" placeholder="Password"></textarea>
	</article>

	<article class="col-xs-12">
		<div class="col-xs-6">
			<button type="button" id="login-login-button" class="btn btn-xl btn-success leftButton">Login</textarea>
			</div>

			<div class="col-xs-6">
				<button type="button" id="login-singup-button" class="btn btn-xl btn-warning rightButton" >SignUp</textarea>
				</div>
			</article>

			<article class="col-xs-12 hidden">
				<div class="label label-warning hidden" id="login-error-div" ></div>
				<div class="label label-success hidden" id="login-success-div" ></div>
			</article>
		</main>

<?php include("footer.php");?>

<script>
$(document).on("click", "#login-singup-button", function(){
	window.location.href = 'signup.php';
});

$(document).on("click", "#login-login-button", function(){
	$.ajax({
		type: 'POST',
		url: 'ajax/ajax_login.php',
		data: { username: $("#login-username-field").val(), password: $("#login-password-field").val()  },
		dataType: 'json',
		success: function (data) {
			console.log(data);
			if(typeof data.error != "undefined" && data.error != true)
			{
				$("#login-error-div").addClass("hidden");
				$("#login-success-div").closest("article").removeClass("hidden");
				$("#login-success-div").removeClass("hidden");
				$("#login-success-div").text("Logged In!");
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
});
</script>
