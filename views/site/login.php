<?php

/* @var $this yii\web\View */

$this->title = 'Login';
//$this->params['breadcrumbs'][] = $this->title;
?>

<div id="login">
	<div class="login_header">
		<h2>Prop Up!</h2>
	</div>
	<form>
		<div class="login_footer">
			<p><label for="email">Login</label></p>
			<p><input type="email" id="email" value="mail@address.com" onblur="if(this.value=='')this.value='mail@address.com'" onfocus="if(this.value=='mail@address.com')this.value=''"></p> 
			<p><label for="password">Password</label></p>
			
			<p><input type="password" id="password" value="password" onblur="if(this.value=='')this.value='password'" onfocus="if(this.value=='password')this.value=''"></p>
			<p>
			<input type="submit" value="Sign In">
			<input type="submit" value="Sign Up">
			</p>
		</div>
	</form>
</div>