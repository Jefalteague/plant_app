<?php
include('util/doctype_dec.php');

include('view/header.php');

?>

<section id="container">

<?php include('../view/user_side_bar.php'); ?>

<div id="searchStuff">

<form action="." method="post" id="registration_form">
<input type="hidden" name="do_this" value="register">
<fieldset>
<legend>Email & Password
</legend>

<h1>Email</h1><input type="text" name="email"></input></br>
<h1>Password</h1><input type="password" name ="user_password1"></input></br>
<h1>Reenter Password</h1><input type="password" name="user_password2"></input></br>

</fieldset>

<fieldset>
<legend>Personal Information
</legend>

<h1>First Name</h1><input type="text" name="first_name"></input></br>
<h1>Last Name</h1><input type="text" name ="last_name"></input></br>

</fieldset>

<input type="submit" value="Register">

</form>
</div>
</section>

<?php

include('view/footer.php');
?>