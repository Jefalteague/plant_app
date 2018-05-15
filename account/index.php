<?php

/*this is to develop a functional approach to the validation component of the form fields.
what needs to be accomplished?*/
require_once('../util/main.php');
require_once('../model/get_plants_database_functions.php');	
require_once('../util/secure_connection.php');
require_once('../model/register_functions.php');


// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load composer's autoloader
require 'vendor/autoload.php';

$do_this = filter_input(INPUT_POST, 'do_this');
if($do_this == null) {
	$do_this = filter_input(INPUT_GET, 'do_this');
	if($do_this == null) {
		$do_this = 'login_register_form';
			if (isset($_SESSION['member'])) {
				$do_this = 'view_account';
			}
	}
}

/*here there must be some array of arrays created. could all of this be in separate file?*/

switch($do_this) {
	
	case 'view_account':
	
		include('success.php');
		
		break;
	
	case 'forgot_password':
		
		include('forgot_password.php');
		
		break;
		
	case 'send_email':
		
		##some type of validation should be coded here to ensure that the 
		if(!empty($_POST['member_email'])){
			
			$member_email = $_POST['member_email'];
			
		}
		
		##below: already have this as does_email_exist? can i eliminate the redundancy?
		##$count = get_member_by_email_count($member_email);
		
		$account_exists = does_email_exist($member_email);
		
		##if the given email is in the db
		##if($count > 0){
		if($account_exists) {
			$forgot_password_temp = md5(uniqid(mt_rand()));
			$expiration_time = date('Y-m-d H:i:s', strtotime("+1 minute"));
			$update = update_member_temp($forgot_password_temp, $member_email, $expiration_time);
		##need to create a control here to test for accounts not in the db, to return that error, etc.
		} else {
			
			redirect('.');
			break;
		}
		
		$reset_link = $app_path . 'account?do_this=reset_password_form&amp;temppass=' . $forgot_password_temp;
		$member = get_member_by_email($member_email);
		$member_first_name = $member['member_fname'];
		

/*
		$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
		try {
			//Server settings
			$mail->SMTPDebug = 0;                                 // Disable verbose debug output
			$mail->isSMTP();                                      // Set mailer to use SMTP
			$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
			$mail->SMTPAuth = true;                               // Enable SMTP authentication
			$mail->Username = 'jefalteague@gmail.com';                 // SMTP username
			$mail->Password = 'Ev0lk00b05!';                           // SMTP password
			$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
			$mail->Port = 465;                                    // TCP port to connect to

			//Recipients
			$mail->setFrom('jefalteague@gmail.com', 'Jeffrey Teague');
			$mail->addAddress('jefalteague@gmail.com', 'Jeffrey Teague');     // Add a recipient
			// Optional name

			$body = '<p><strong>Someone at this email address recently requested to change a password associated with </br>
			an account at EWMAFA.org. If you have received this message in error, please igonore it. If you have requested the </br>
			password change, please click on this link<a href="' . $reset_link . '">' . $reset_link . '</a> and follow the instructions to change your password. Thanks.</strong><p>';
   
			//Content
			$mail->isHTML(true);                                  // Set email format to HTML
			$mail->Subject = 'First test email';
			$mail->Body    = $body;
			$mail->AltBody = strip_tags($body);

			$mail->send();*/
			echo 'Message has been sent to ' . $member_email . '</br>';
			echo '<a href="' . $reset_link . '">Temp Link</a>';
		/*} catch (Exception $e) {
			echo 'Message could not be sent.';
			echo 'Mailer Error: ' . $mail->ErrorInfo;
		}*/
		
		$sessData['status']['type'] = 'success';
                
		break;
		
	case 'reset_password_form':
	
		include('reset_password_form.php');
		
		break;
		
	case 'change_password':
		$member_email = $_POST['member_email'];
		$new_password = $_POST['password1'];
		$confirm_password = $_POST['password2'];
		$temp_pass_code = $_POST['temppass'];
		
		echo $member_email . '</br>';
		echo $new_password . '</br>';
		echo $confirm_password . '</br>';
		echo $temp_pass_code . '</br>';

		$member_stuff = get_member_by_email($member_email);

		$expiration_time = $member_stuff['pswd_timeout'];
		
		##only the beginning of the validation
		$proceed_to_change = change_pw_validate ($new_password, $confirm_password, $expiration_time);
		
		##see if you can get the new password into the db
		
		if($proceed_to_change == false) {
			echo 'too bad';
		} else {
			update_member_pw($new_password, $member_email);
			echo 'good job';
		}
		
		redirect('.');
		
		break;
		
	case 'login_register_form':
	
		$member_email = '';
		$member_password = '';
		$password_message = '';
	
		include('login_register_form.php');
		
		break;
		
	case 'login':
	
		$member_email = filter_input(INPUT_POST, 'member_email');
		$member_password1 = filter_input(INPUT_POST, 'member_password1');
		
		/*develop a test for the account at this point?
		$email_exist = does_email_exist($member_email);
		if(!$email_exist) {
			
		}*/
		
		validate_email(2, $member_email);
		validate_password(3, $member_password1);
		
		if(has_errors()) {
			include('login_register_form.php');
			exit;
		}
		
		if(is_valid_member_login($member_email, $member_password1)) {
			$_SESSION['member']= get_member_by_email($member_email);
			$_SESSION['list_session'] = array();
			include('success.php');

			} else {
				$password_message = 'Care to register an account?';
				include('login_register_form.php');
				break;
			} 

		break;
	
	case 'register':
		
		validate_text(0, $member_fname);
		
		validate_text(1, $member_lname);
		
		validate_email(2, $member_email);
		
		validate_password(3, $member_password1);
		
		validate_password(4, $member_password2);
		
		if(has_errors()){
			include('account/register_form.php');
			exit;
			
		}
		
		if($member_password1 != $member_password2) {
			$password_message = 'Passwords do not match.';
            include 'account/register_form.php';
            exit;
		}
		
		if(does_email_exist($member_email)) {
			$email_message = ' is in use.';
			include 'account/register_form.php';
			exit;
		}
		
		$member_id = add_member($member_email, $member_fname, $member_lname, $member_password1);
		
		redirect('.');
		
		break;
	
	case 'register_form':
	
		include('register_form.php');
	
		break;
		
	case 'logout':
	
        unset($_SESSION['member']);
		unset($_SESSION['list_session']);
        redirect($app_path);
        break;
		
	case 'manage_lists':
	
		redirect('../list');
	
	default:
	
		echo 'huh?';
		break;
		
}

?> 