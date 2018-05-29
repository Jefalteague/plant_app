<?php 
$fields = array();

$first_name = filter_input(INPUT_POST, 'first_name');

$last_name = filter_input(INPUT_POST, 'last_name');

$member_email = filter_input(INPUT_POST, 'member_email');

$member_password1 = filter_input(INPUT_POST, 'member_password1');

$member_password2 = filter_input(INPUT_POST, 'member_password2');

$item = array();
$item['first_name'] = $first_name;
$item['message'] = '';
$item['error'] = FALSE;

$fields[] = $item;

$item = array();
$item['last_name'] = $last_name;
$item['message'] = '';
$item['error'] = FALSE;

$fields[] = $item;

$item = array();
$item['member_email'] = $member_email;
$item['message'] = '';
$item['error'] = FALSE;

$fields[] = $item;

$item = array();
$item['member_password1'] = $member_password1;
$item['message'] = '';
$item['error'] = FALSE;

$fields[] = $item;

$item = array();
$item['member_password2'] = $member_password2;
$item['message'] = '';
$item['error'] = FALSE;

$fields[] = $item;

function clear_message($item) {
	global $fields;
	$fields[$item]['message'] = '';
	$fields[$item]['error'] = FALSE;
}

function set_message($item, $message) {
	global $fields;
	
	$fields[$item]['message'] = $message;
	$fields[$item]['error'] = TRUE;
	
}

function validate_text($item, $value, $required=TRUE, $min=1, $max=255) {
	
	global $fields;
	
	if(!$required && empty($value)) {
		clear_message($item);
		return;
	}
	
	if($required && empty($value)) {
		$message = 'Required.';
		set_message($item, $message);
	} else if(strlen($value) < $min) {
		$message = 'Too short.';
		set_message($item, $message);
	} else if(strlen($value) > $max) {
		$message = 'Too long.';
		set_message($item, $message);
	} else {
		clear_message($item);
	}
	
	
}

function validate_pattern($item, $value, $pattern, $message, $required = TRUE) {
	
	global $field;
	
	if(!$required && emtpy($value)) {
		clear_message();
		return;
	}
	
	$same = preg_match($pattern, $value);
	if($same === FALSE) {
		$message = 'Error';
		set_message($item, $message);
	} else if($same != 1) {
		set_message($item, $message);
	} else {
		clear_message($item);
	}
}

function validate_email($item, $value, $required=TRUE) {
	
	global $fields;
	
	if(!$required && empty($value)) {
		clear_message($item);
		return;
	}
	
	validate_text($item, $value, $required);
	if($fields[$item]['error'] == TRUE) {
		return;
	}
	
	$parts = explode('@', $value);
	
	if(count($parts) < 2){
		$message = 'Must contain @ sign.';
		set_message(2, $message);
		return;
	}
	
	if(count($parts) > 2) {
		$message = 'Must contain no more than 2 @ signs.';
		set_message(2, $message);
		return;
	}
	
	$local_part = $parts[0];
	$domain_part = $parts[1];
	
	if(strlen($local_part) > 64) {
		$message = 'The first part is too long.';
		set_message($item, $message);
	}
	
	if(strlen($domain_part) > 64) {
		$message = 'The second part is too long.';
		set_message($item, $message);
	}
	
	// Patterns for address formatted local part
    $atom = '[[:alnum:]_!#$%&\'*+\/=?^`{|}~-]+';
    $dotatom = '(\.' . $atom . ')*';
    $address = '(^' . $atom . $dotatom . '$)';

    // Patterns for quoted text formatted local part
    $char = '([^\\\\"])';
    $esc  = '(\\\\[\\\\"])';
    $text = '(' . $char . '|' . $esc . ')+';
    $quoted = '(^"' . $text . '"$)';

    // Combined pattern for testing local part
    $local_pattern = '/' . $address . '|' . $quoted . '/';
		
	validate_pattern($item, $local_part, $local_pattern, 'The email\'s first part is incorrect.');
	if($fields[$item]['error'] == TRUE) {
		return;
	}
		
	$hostname = '([[:alnum:]]([-[:alnum:]]{0,62}[[:alnum:]])?)';
	$hostnames = '(' . $hostname . '(\.' . $hostname . ')*)';
	$top_level = '(\.[[:alnum:]]{2,6})';
	$domain_pattern = '/^' . $hostnames . $top_level . '$/';
	
	validate_pattern($item, $domain_part, $domain_pattern, 'The email\'s domain is incorrect.');
	
}

function validate_password($item, $value, $required=TRUE) {
	global $fields;
	
	if(!$required && empty($value)) {
		clear_message($item);
		return;
	}
	
	validate_text($item, $value, $required);
	if($fields[$item]['error'] == TRUE) {
		return;
	}
	
}

##can't member the othe pwvalidate, so must make new one for forgot password functionality" this is just the beginning to check that it works 10/28/17
function change_pw_validate($password1, $password2, $expiration_time) {
	
	if($password1 !== $password2) {
		$message = 'The passwords do not match.';
		return $message;
	}
	
}

function has_errors() {
	
	global $fields;
	
	for($i = 0; $i < count($fields); $i++) {
		foreach($fields[$i] as $k => $v) {
			if($k == 'error' && $v == TRUE){
				
				return TRUE;
			}
		}
	}return FALSE; /*I really struggled here for a while. I had originally placed this statement behind the above bracket. This created problems. Do it and remind yourself!*/
}

function does_email_exist($member_email) {
	
    global $db;
	
    $query = '
        SELECT member_id FROM members
        WHERE member_email = :member_email';
    $statement = $db->prepare($query);
    $statement->bindValue(':member_email', $member_email);
    $statement->execute();
    $valid = ($statement->rowCount() == 1);
    $statement->closeCursor();
    return $valid;
}

function add_member($member_email, $member_fname, $member_lname,
                      $member_password1) {
    global $db;
    $password = sha1($member_email . $member_password1);
    $query = '
        INSERT INTO members (member_email, member_password, member_fname, member_lname)
        VALUES (:member_email, :member_password1, :member_fname, :member_lname)';
    $statement = $db->prepare($query);
    $statement->bindValue(':member_email', $member_email);
    $statement->bindValue(':member_password1', $member_password1);
    $statement->bindValue(':member_fname', $member_fname);
    $statement->bindValue(':member_lname', $member_lname);
    $statement->execute();
    $member_id = $db->lastInsertId();
    $statement->closeCursor();
    return $member_id;
}

function get_member_by_email($member_email) {
	
	global $db;
	
	$query = 'SELECT * FROM members WHERE member_email = :member_email';
    $statement = $db->prepare($query);
    $statement->bindValue(':member_email', $member_email);
    $statement->execute();
    $member = $statement->fetch();
    $statement->closeCursor();
    return $member;
	
}

/*another way to do does_email_exist
function get_member_by_email_count($member_email) {
	
	global $db;
	
	$query = '
	SELECT *
	FROM members
	WHERE member_email = :member_email';
	
	$statement = $db->prepare($query);
	$statement->bindValue(':member_email', $member_email);
	$statement->execute();
	$result = $statement->rowCount();
	$statement->closeCursor();
	return $result;
	
}*/

function update_member_temp($forgot_password_temp, $member_email, $expiration_time){
	
	global $db;
	
	$query = '
	UPDATE members
	SET forgot_password_temp = :forgot_password_temp, expiration_time = :expiration_time
	WHERE member_email = :member_email';
	
	$statement = $db->prepare($query);
	$statement->bindValue(':forgot_password_temp', $forgot_password_temp);
	$statement->bindValue(':member_email', $member_email);
	$statement->bindValue(':expiration_time', $expiration_time);

	$update = $statement->execute();
	$statement->closeCursor();
	return $update?true:false;
	
}

function is_valid_member_login($member_email, $member_password1) {
    global $db;
    $password = sha1($member_email . $member_password1);
    $query = '
        SELECT * FROM members
        WHERE member_email = :member_email AND member_password = :member_password1';
    $statement = $db->prepare($query);
    $statement->bindValue(':member_email', $member_email);
    $statement->bindValue(':member_password1', $member_password1);
    $statement->execute();
    $valid = ($statement->rowCount() == 1);
    $statement->closeCursor();
    return $valid;
}



##update member pw from "forgot password functionality" 10/28/17
function update_member_pw($member_password, $member_email) {
	
	global $db;
	
	$query = '
	UPDATE members
	SET member_password = :member_password
	WHERE member_email = :member_email';
	
	$statement = $db->prepare($query);
	$statement->bindValue(':member_password', $member_password);
	$statement->bindValue(':member_email', $member_email);

	$update = $statement->execute();
	$statement->closeCursor();
	return $update?true:false;
	
}

##get items from a saved list
function get_all_items_from_saved_list($list_id, $member_id) {
	
	global $db;
	
	$query = '
		SELECT * FROM list_items
        WHERE member_id = :member_id AND list_id = :list_id';
	
	$statement = $db->prepare($query);
	$statement->bindValue(':member_id', $member_id);
	$statement->bindValue(':list_id', $list_id);

	$result = $statement->execute();
	$statement->closeCursor();
	return $result;
	
}

##get the lists
function get_lists($member_id) {
	
	global $db;
	
	try {
		
		$query = '
		SELECT * FROM member_lists
        WHERE member_id = :member_id';
	
	$statement = $db->prepare($query);
	$statement->bindValue(':member_id', $member_id);
	$statement->execute();
	$lists = $statement->fetchAll();
	$statement->closeCursor();
	return $lists;
	} catch (PDOException $e) {
		$error_message = $e->getMessage();
		echo($error_message);
	}
	
}

?>