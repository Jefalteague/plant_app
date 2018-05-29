<?php

include('../view/header.php');

if (!isset($password_message)) { $password_message = ''; } 
if (!isset($email_message)) {$email_message = '';}


?>
<div id="login_box">

	<h3 id="login">Register Your Account</h3>

	<form class="login" action="." method="post">

		<input type="hidden" name="do_this" value="register">

		<label>First Name</label>
		<p class="warning"><?php if(!empty($fields[0]['message'])){echo $fields[0]['message'];}?></p>
		<input class="focus" maxlength="30" type="text" name="member_fname" tabindex="1" placeholder="FIRST NAME" value="<?php echo $member_fname;?>"/></br>

		<label>Last Name</label>
		<p class="warning"><?php if(!empty($fields[1]['message'])){echo $fields[1]['message'];}?></p>
		<input class="focus" maxlength="30" type="text" name="member_lname" tabindex="2" placeholder="LAST NAME" value="<?php echo $member_lname;?>"/></br>

		<label>Email Address</label>
		<p class="warning"><?php if(!empty($fields[2]['message'])){echo $fields[2]['message'];}?></p>
				<span class="warning"><?php echo $email_message; ?></span><br>
		<input class="focus" maxlength="30" type="text" name="member_email" tabindex="3" placeholder="EMAIL" value="<?php echo $member_email;?>"/>


		<label>Password</label><p class="warning"><?php if(!empty($fields[3]['message'])){echo $fields[3]['message'];}?></p>
		<input class="focus" maxlength="30" type="password" name="member_password1" tabindex="4" placeholder="PASSWORD1"/>
		</br>

		<label>Reenter Password</label><p class="warning"><?php if(!empty($fields[4]['message'])){echo $fields[4]['message'];}?></p>
		<input type="password" name="member_password2" tabindex="5" placeholder="PASSWORD2"/>

		
		<input type="submit" value="Register">
		
	</form>

</div>


<?php 

include('view/footer.php');

?>