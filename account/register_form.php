<?php

include('../view/header.php');

if (!isset($password_message)) { $password_message = ''; } 
if (!isset($email_message)) {$email_message = '';}


?>

<fieldset>
<legend>Register Your Account</legend>
<form action="." method="post">

<input type="hidden" name="do_this" value="register">

<label>First Name</label>
<input type="text" name="member_fname" value="<?php echo $member_fname;?>">
<?php echo $fields[0]['message'];?>
</br></br>

<label>Last Name</label>
<input type="text" name="member_lname" value="<?php echo $member_lname;?>">
<?php echo $fields[1]['message'];?>
</br></br>

<label>Email Address</label>
<input type="text" name="member_email" value="<?php echo $member_email;?>">
<?php echo $fields[2]['message'];?>
<?php echo $email_message;?>
</br></br>

<label>Password</label>
<input type="password" name="member_password1">
<?php echo $fields[3]['message'];?>
<?php echo $password_message;?>
</br></br>

<label>Reenter Password</label>
<input type="password" name="member_password2">
<?php echo $fields[4]['message'];?>
<?php echo $password_message;?>
</br></br>

<input type="submit" value="Register">

</form>
</fieldset>

<?php 

include('view/footer.php');

?>