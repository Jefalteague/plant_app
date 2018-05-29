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
require './vendor/autoload.php';

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
	
		$password_message = '';
		$member_email = '';
		if(!empty($_POST['member_email'])){
			
			$member_email = $_POST['member_email'];

		}
		
		validate_email(2, $member_email);
		
		if(has_errors()){
			
			include('account/forgot_password.php');
			break;
			
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
			$password_message = 'Is this your email?';
			include('account/forgot_password.php');
			break;
		}
		
		$reset_link = $app_path . 'account?do_this=reset_password_form&amp;temppass=' . $forgot_password_temp;
		$member = get_member_by_email($member_email);
		$member_first_name = $member['member_fname'];
		


		$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
		try {
			//Server settings
			$mail->SMTPDebug = 0;                                 // Disable verbose debug output
			$mail->isSMTP();                                      // Set mailer to use SMTP
			$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
			$mail->SMTPAuth = true;                               // Enable SMTP authentication
			$mail->Username = 'jefalteague@gmail.com';                 // SMTP username
			$mail->Password = 'Ev0lk00b05!';                           // SMTP password
			$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
			$mail->Port = 587;                                    // TCP port to connect to
			$mail->SMTPOptions = array(
				'ssl' => array(
					'verify_peer' => false,
					'verify_peer_name' => false,
					'allow_self_signed' => true
				)
);
			//Recipients
			$mail->setFrom('jefalteague@gmail.com', 'Jeffrey Teague');
			$mail->addAddress($member_email, 'Jeffrey Teague');     // Add a recipient
			// Optional name

			$body = '<p><strong>Someone at this email address recently requested to change a password associated with </br>
			an account at EWMAFA.org. If you have received this message in error, please igonore it. If you have requested the </br>
			password change, please click on this link<a href="' . $reset_link . '">' . $reset_link . '</a> and follow the instructions to change your password. Thanks.</strong><p>';
   
			//Content
			$mail->isHTML(true);                                  // Set email format to HTML
			$mail->Subject = 'First test email';
			$mail->Body    = $body;
			$mail->AltBody = strip_tags($body);

			$mail->send();
			echo 'Message has been sent to ' . $member_email . '</br>';
			echo '<a href="' . $reset_link . '">Temp Link</a>';
		} catch (Exception $e) {
			echo 'Message could not be sent.';
			echo ' Mailer Error: ' . $mail->ErrorInfo;
		}
		
		$sessData['status']['type'] = 'success';
                
		break;
		
	case 'reset_password_form':
	
		$password_message = '';
		include('reset_password_form.php');
		
		break;
		
	case 'change_password':
	
		$member_email = filter_input(INPUT_POST, 'member_email');
		$member_password1 = $_POST['password1'];
		$member_password2 = $_POST['password2'];
		$temp_pass_code = $_POST['temppass'];
		$password_message = '';
		$member_stuff = get_member_by_email($member_email);
		$expiration_time = $member_stuff['pswd_timeout'];
		
		validate_email(2, $member_email);		
		validate_password(3, $member_password1);		
		validate_password(4, $member_password2);		
		change_pw_validate ($member_password1, $member_password2, $expiration_time);

		if(has_errors()){
			
			include('account/reset_password_form.php');
			break;
			
		}
		
		if ($member_password1 !== $member_password2 ){
			$password_message = 'Passwords do not match.';
			include('account/reset_password_form.php');
			break;
			
		}
		
		$current_date = date('Y-m-d H:i:s');
		if($current_date >= $expiration_time ) {
			$password_message = 'Your token expired.';
			include('account/reset_password_form.php');
			break;
		}
		
		$new_password = $member_password1;
		update_member_pw($new_password, $member_email);
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
	
		$email_message = '';
	
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