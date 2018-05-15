<?php

function add_list($list_name) {
	
	global $db;
	
	$member_id = $_SESSION['member']['member_id'];
	$create_date = date("Y-m-d H-i-s");
	
	$query = '
	INSERT INTO member_lists (member_id, create_date, list_name)
	VALUES (:member_id, :create_date, :list_name)';
	
	$statement = $db->prepare($query);
	$statement->bindValue(':create_date', $create_date);
	$statement->bindValue(':member_id', $member_id);
	$statement->bindValue(':list_name', $list_name);	
	$statement->execute();
	$list_id = $db->lastInsertId();
	$statement->closeCursor();
	return $list_id;
	
}

function add_list_item($memberlist_id, $species_id) {
	
	global $db;
	
	$query = 
	'INSERT INTO list_items (memberlist_id, species_id)
	VALUES (:memberlist_id, :species_id)';
	
	$statement = $db->prepare($query);
	$statement->bindValue(':memberlist_id', $memberlist_id);
	$statement->bindValue(':species_id', $species_id);
	$statement->execute();
	$statement->closeCursor();
	
}

function get_list($member_id) {
	
	global $db;
	
	$query = '
	SELECT * FROM member_lists
	WHERE member_id = :member_id';
	
	$statement = $db->prepare($query);
	$statement->bindValue(':member_id', $member_id);
	$statement->execute();
	$list = $statement->fetch();
	$statement->closeCursor();
	return $list;
	
}



?>