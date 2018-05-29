
<?php


include('../view/header.php');

$sessData = !empty($_SESSION['sessData'])?$_SESSION['sessData']:'';

if(!empty($sessData['status']['msg'])){
    $statusMsg = $sessData['status']['msg'];
    $statusMsgType = $sessData['status']['type'];
    unset($_SESSION['sessData']['status']);
}

?>

<div id="login_box">

	<h3 id="password_change">Password Change Request</h3>

	<form class="login" action="." method="post">
		
		<input type="hidden" name="do_this" value="send_email">
		
		<label for="user_email">Please enter your email, and we will send you password reset instructions.</label>
		
		<input type="text" name="member_email" placeholder="EMAIL" tabindex="1">
		<p class="warning"><?php if(!empty($fields[2]['message'])){echo $fields[2]['message'];}?></p>
		
		<input type="image" src="<?php echo $app_path . 'images/register.png';?>" alt="too bad" tabindex="2">
		
	</form>

</div>

<?php 

include('../view/footer.php');
?>
