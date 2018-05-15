<?php

#Gets the family by the letter passed into the function. Improves code over other version.
function get_families_by_alpha($array_alpha2){
				
	global $db;
				
	$query = "SELECT * 
		FROM families 
		WHERE family_name LIKE :array_alpha2
		ORDER BY family_name";
					
	try {
		$statement = $db->prepare($query);
		$statement->bindValue(':array_alpha2', $array_alpha2);
		$statement->execute();
		$results = $statement->fetchAll();
		$statement->closeCursor();
		return $results;
	} 
				
	catch (PDOException $e) {
		$error_message = $e->getMessage();
		echo($error_message);
	}
}
	
#Gets the genera by the letter passed into the function.
function get_genera_by_alpha($array_alpha2){
				
	global $db;
				
	$query = "SELECT * 
		FROM genera 
		WHERE genus_name LIKE :array_alpha2
		ORDER BY genus_name";
					
	try {
		$statement = $db->prepare($query);
		$statement->bindValue(':array_alpha2', $array_alpha2);
		$statement->execute();
		$results = $statement->fetchAll();
		$statement->closeCursor();
		return $results;
	} 
				
	catch (PDOException $e) {
		$error_message = $e->getMessage();
		echo($error_message);
	}
}

##gets the species by the selected color
function get_species_by_color($choice){
				
	global $db;
				
	$query = "SELECT * 
		FROM species 
		WHERE flower_color = :choice
		ORDER BY species_name";
					
	try {
		$statement = $db->prepare($query);
		$statement->bindValue(':choice', $choice);
		$statement->execute();
		$results = $statement->fetchAll();
		$statement->closeCursor();
		return $results;
	} 
				
	catch (PDOException $e) {
		$error_message = $e->getMessage();
		echo($error_message);
	}
}

##Get all the colors from the color table.
function get_colors() {
	global $db;
	
	$query = "SELECT *
	FROM colors
	ORDER BY color_id";
	
	try {
        $statement = $db->prepare($query);
        $statement->execute();
        $result = $statement->fetchAll();
        $statement->closeCursor();
        return $result;
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        #display_db_error($error_message);
    }
}

##Get a particular color from the color table.
function get_color($color) {
	
	global $db;
	
	$query = "SELECT *
	FROM color
	WHERE color = :color";
	
	try {
		$statement = $db->prepare($query);
		$statement->bindValue(':color', $color);
		$statement->execute();
		$result = $statement->fetch();
		$statement->closeCursor();
		return $results;
	}
	
	catch (PDOException $e) {
		$error_message = $e->getMessage();
		echo($error_message);
	}
}

function get_shapes() {
	global $db;
	
	$query = "SELECT *
	FROM shapes
	ORDER BY shape_id";
	
	try{
		$statement = $db->prepare($query);
		$statement->execute();
		$result = $statement->fetchAll();
		$statement->closeCursor();
		return $result;
	}
	
	catch(PDOException $e){
		$error_message = $e->getMessage();
		echo($error_message);
	}
}

function get_habitats(){
	
	global $db;
	
	$query = "SELECT *
	FROM habitats
	ORDER BY habitat_id";
	try {
		$statement = $db->prepare($query);
		$statement->execute();
		$results = $statement->fetchAll();
		$statement->closeCursor();
		return $results;
	}
	 catch(PDOException $e) {
		 $errorMessage = $e->getMessage();
		 echo($errorMessage);
	 }
}

function get_forms() {
	
	global $db;
	
	$query = "SELECT *
	FROM forms
	ORDER BY form_id";
	
	try {
		$statement = $db->prepare($query);
		$statement->execute();
		$results = $statement->fetchAll();
		$statement->closeCursor();
		return $results;
	}
	 catch(PDOException $e) {
		 $errorMessage = $e->getMessage();
		 echo($errorMessage);
	 }
}
	
	function get_species_by_family_id($family_id) {
    global $db;
    $query = '
        SELECT *
        FROM species
        WHERE family_id = :family_id';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':family_id', $family_id);
        $statement->execute();
        $result = $statement->fetchAll();
        $statement->closeCursor();
        return $result;
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        ##display_db_error($error_message);
    }
}

function get_species_by_family_limited($family_id, $pn3, $rpp) {
    global $db;
    $query = '
        SELECT *
        FROM species
        WHERE family_id = :family_id 
		LIMIT :pn3, :rpp';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':family_id', $family_id);
		$statement->bindValue(':pn3', (int)$pn3, PDO::PARAM_INT);
		$statement->bindValue(':rpp', (int)$rpp, PDO::PARAM_INT);
        $statement->execute();
        $result = $statement->fetchAll();
        $statement->closeCursor();
        return $result;
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        ##display_db_error($error_message);
    }
}

function get_species_count($family_id) {
    global $db;
    $query = '
        SELECT COUNT(species_id)
        FROM species
        WHERE family_id = :family_id';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':family_id', $family_id);
        $statement->execute();
		$result = $statement->fetch();
        $statement->closeCursor();
        return $result;
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        ##display_db_error($error_message);
    }
}

function get_species_by_genus_id($genus_id){
	global $db;
	$query = '
		SELECT *
        FROM species
        WHERE genus_id = :genus_id';	
	try {
		$statement = $db->prepare($query);
		$statement->bindValue(':genus_id', $genus_id);
		$statement->execute();
		$result = $statement->fetchAll();
		$statement->closeCursor();
		return $result;	
	} catch (PDOException $e) {
        $error_message = $e->getMessage();
        ##display_db_error($error_message);
    }
}

function get_species_by_species_id($species_id){
	global $db;
	$query ='
        SELECT *
        FROM species
        WHERE species_id = :species_id';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':species_id', $species_id);
        $statement->execute();
        $result = $statement->fetch();
        $statement->closeCursor();
        return $result;
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
    }

}

function get_family_by_family_id($family_id){
	global $db;
	$query ='
        SELECT *
        FROM families
        WHERE family_id = :family_id';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':family_id', $family_id);
        $statement->execute();
        $result = $statement->fetch();
        $statement->closeCursor();
        return $result;
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        #display_db_error($error_message);
    }

}

function get_genus_by_genus_id($genus_id){
	global $db;
	$query ='
        SELECT *
        FROM genera
        WHERE genus_id = :genus_id';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':genus_id', $genus_id);
        $statement->execute();
        $result = $statement->fetch();
        $statement->closeCursor();
        return $result;
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        #display_db_error($error_message);
    }

}

##gets the species by the selected color
function get_species_by_color_choice($choice){
				
	global $db;
				
	$query = "SELECT * 
		FROM species 
		WHERE flower_color = :choice
		ORDER BY species_name";
					
	try {
		$statement = $db->prepare($query);
		$statement->bindValue(':choice', $choice);
		$statement->execute();
		$results = $statement->fetchAll();
		$statement->closeCursor();
		return $results;
	} 
				
	catch (PDOException $e) {
		$error_message = $e->getMessage();
		echo($error_message);
	}
}

function get_species (){
	global $db;
	$query = '
		SELECT *
        FROM species';	
	try {
		$statement = $db->prepare($query);
		$statement->execute();
		$result = $statement->fetchAll();
		$statement->closeCursor();
		return $result;	
	} catch (PDOException $e) {
        $error_message = $e->getMessage();
        ##display_db_error($error_message);
    }
}

function get_species_by_genus_individual ($species_id){
	
	global $db;
	$query = '
		SELECT *
        FROM species
		WHERE species_id = :species_id';	
	try {
		$statement = $db->prepare($query);
		$statement->execute();
		$result = $statement->fetchAll();
		$statement->closeCursor();
		return $result;	
	} catch (PDOException $e) {
        $error_message = $e->getMessage();
        ##display_db_error($error_message);
    }
	
}

function get_list_items($memberlist_id) {
	
	global $db;
	
	$query = '
	SELECT * FROM list_items
	WHERE memberlist_id = :memberlist_id';
	try {
	$statement = $db->prepare($query);
	$statement->bindValue(':memberlist_id', $memberlist_id);
	$statement->execute();
	$list = $statement->fetchAll();
	$statement->closeCursor();
	return $list;
	} catch (PDOException $e) {
        $error_message = $e->getMessage();
        ##display_db_error($error_message);
    }
	
}

function delete_list($list_id) {
	
	global $db;
	
	$query = '
	DELETE FROM member_lists
	WHERE memberlist_id = :list_id';
	try {
	$statement = $db->prepare($query);
	$statement->bindValue(':list_id', $list_id);
	$statement->execute();
	
	$statement->closeCursor();

	} catch (PDOException $e) {
        $error_message = $e->getMessage();
        ##display_db_error($error_message);
    }
	
}

function get_species_by_leaf_shape($leaf_shape) {
	
	global $db;
	
	$query =  '
	SELECT * FROM species
	WHERE leaf_shape = : leaf_shape';
	
	try {
		
		$statement = $db->prepare($query);
		$statement->bindValue(':leaf_shape', $leaf_shape);
		$statement->execute();
		$results = fetchAll();
		$statement->closeCursor();
	
	} catch (PDOException $e) {
        $error_message = $e->getMessage();
        ##display_db_error($error_message);
    }
	
}

?>