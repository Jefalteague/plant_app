<?php

include('../view/header.php');

?>

<div id="login_box">

	<h3 id="login">Login</h3>

	<form class="login" action="." method="post">

		<input type="hidden" name="do_this" value="login">

		<label for="member_email">Member Email</label><p class="warning"><?php if(!empty($fields[2]['message'])){echo $fields[2]['message'];}?></p>

		<input id="member_name" class="focus" maxlength="30" type="text" name="member_email" tabindex="1" placeholder="EMAIL" >
	
		<label for="password">Member Password</label><p class="warning"><?php if(!empty($fields[3]['message'])){echo $fields[3]['message'];}?></p>

		<input id="password" class="focus" maxlength="30" type="password" name="member_password1" tabindex="2" placeholder="PASSWORD">

		<a href="<?php echo $app_path . 'account?do_this=forgot_password';?>" tabindex="4">Forgot Password?</a>

		<input type="image" src="<?php echo $app_path . 'images/login.png';?>" alt="signin_button" tabindex="3">

		<p class="warning"><?php if (!empty($password_message)) : echo $password_message; endif;?></p>
	
	</form>

	<h3 id="register">Register</h3>

	<form class="login" action="." method="post">

		<input type="hidden" name="do_this" value="register_form">

		<input type="image" src="<?php echo $app_path . 'images/register.png';?>" alt="register_button" tabindex="3">
		
	</form>

</div>

<?php

include('../view/footer.php');

?>