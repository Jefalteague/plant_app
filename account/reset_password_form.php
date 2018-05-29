<?php

include('../view/header.php');

?>


<div id="login_box">

	<form class="login" action="." method="post">

		<input type="hidden" name="do_this" value="change_password">

		<label>Email</label>
		<p class="warning"><?php if(!empty($fields[2]['message'])){echo $fields[2]['message'];}?></p>
		<input type="text" name="member_email" placeholder="EMAIL" tabindex="1">

		<label>New Password</label>
		<p class="warning"><?php if(!empty($fields[3]['message'])){echo $fields[3]['message'];}?></p>
		<input type="password" name="password1" placeholder="PASSWORD" tabindex="2">


		<label>Confirm New Password</label>
		<p class="warning"><?php if(!empty($fields[4]['message'])){echo $fields[4]['message'];}?></p>
		<span class="warning"><?php echo $password_message; ?></span><br>
		<input type="password" name="password2" placeholder="PASSWORD" tabindex="3">


		<input type="hidden" name="temppass" <?php echo 'value="' . $_REQUEST['temppass'] . '"';?>>
		
		<input type="image" src="<?php echo $app_path . 'images/register.png';?>" alt="too bad" tabindex="4">


	</form>

</div>

<?php
include('../view/footer.php');

?>