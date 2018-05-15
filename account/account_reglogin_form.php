<?php
include('util/doctype_dec.php');
include ('../view/header.php');

?>


<section id="container">

<?php

include '../view/user_side_bar.php';

?>

	<div id="searchStuff">


		<h1>Login</h1>
		<form action="." method="post" id="login_form">
			<input type="hidden" name="do_this" value="login">
        
			<label>E-Mail:</label>
			<input type="text" name="email"
				value="<?php echo htmlspecialchars($email); ?>" size="30">
			<?php echo $fields->get_field('email')->get_html(); ?><br>

			<label>Password:</label>
			<input type="password" name="user_password1" size="30">
			<?php echo $fields->get_field('user_password1')->get_html(); ?><br>


			<input type="submit" value="Login">
			<?php if (!empty($password_message)) : ?>         
			<span class="error"><?php echo htmlspecialchars($password_message); ?></span><br>
			<?php endif; ?>
		</form>

		<h1>Register</h1>
		<form action="." method="post">
			<input type="hidden" name="do_this" value="show_reg_form">
			<input type="submit" value="Register">
		</form>


	</div>
	
</section>

<?php 

include('../view/footer.php');

?>