<?php

function add_member($first_name, $last_name, $member_email, $member_password) {
	
	global $db;
	$password = sha1($member_email . $member_password);
	
	$query = 'INSERT INTO member (first_name, last_name, member_email, member_password)
	VALUES (:first_name, :last_name, :member_email, :member_password)';
	
	$statement = $db->prepare($query);
	$statement->bindValue('first_name', $first_name);
	$statement->bindValue('last_name', $last_name);
	$statement->bindValue(':member_email', $member_email);
	$statement->bindValue(':member_password', $member_password);
	$statement->execute();
	$statement->closeCursor();
	
}

function get_member_by_email($member_email) {
	
	global $db;
	
	$query = '
	SELECT *
	FROM member
	WHERE member_email = :member_email';
	
	$statement = $db->prepare($query);
	$statement->bindValue(':member_email', $member_email);
	$statement->execute();
	$result = $statement->fetch();
	$statement->closeCursor();
	return $result;
	
}

function get_member_by_email_count($member_email) {
	
	global $db;
	
	$query = '
	SELECT *
	FROM member
	WHERE member_email = :member_email';
	
	$statement = $db->prepare($query);
	$statement->bindValue(':member_email', $member_email);
	$statement->execute();
	$result = $statement->num_rows();
	$statement->closeCursor();
	return $result;
	
}

function update_member() {
	global $db;
}

function get_member_by_id($member_id) {
	
	global $db;
	
	$query = '
	SELECT *
	FROM member
	WHERE member_id = :member_id';
	
	$statement = $db->prepare($query);
	$statement->bindValue(':member_id', $member_id);
	$statement->execute();
	$result = $statement->fetch();
	$statement->closeCursor();
	return $result;
	
}

function email_exists($member_email) {
	
	global $db;
	
	$query = '
	SELECT member_id
	FROM member
	WHERE member_email 
	LIKE :member_email';

	$statement = $db->prepare($query);
	$statement->bindValue(':member_email', $member_email);
	$statement->execute();
	$result = ($statement->rowCount() == 1);
	$statement->closeCursor();
	return $result;
	
}

function valid_password() {
	global $db;
}

?>