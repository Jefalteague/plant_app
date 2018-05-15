

<?php

include('../view/header.php');

?>



<div id="login_box">

	<form class="login" action="." method="post">

		<input type="hidden" name="do_this" value="change_password">

		<label>Email</label>
		
		<input type="text" name="member_email" placeholder="EMAIL" tabindex="1">

		<label>New Password<label>

		<input type="password" name="password1" placeholder="PASSWORD" tabindex="2">

		<label>Confirm New Password<label>

		<input type="password" name="password2" placeholder="PASSWORD" tabindex="3">

		<input type="hidden" name="temppass" <?php echo 'value="' . $_REQUEST['temppass'] . '"';?>>
		
		<input type="image" src="<?php echo $app_path . 'images/register.png';?>" alt="too bad" tabindex="4">


	</form>

</div>

<?php
include('../view/footer.php');

?>