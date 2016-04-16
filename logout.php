<?php
	//Delete Cookie
	if (isset($_COOKIE['LoggedInUser'])) {
		unset($_COOKIE['LoggedInUser']);
		setcookie('LoggedInUser', null, -1, '/');
	}
?>

<?php include("header.php");?>

    <main class="container" id="link_1">
        <article class="col-xs-12">
			<h2>We thank you for your business!</h2>
        </article>
    </main>
	
<?php include("footer.php");?>
