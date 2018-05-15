
<?php
// Create an empty list if it doesn't exist
if (!isset($_SESSION['plant_list']) ) {
    $_SESSION['plant_list'] = array();
}

// Add a species to the list
function add_species_to_list($species_id) {
	
    $_SESSION['plant_list'][$species_id] = '';
	

    // Set last category added to cart
    
}

function get_species_from_list() {
	
	$items = array();
	
	foreach($_SESSION['plant_list'] as $species_id => $quantity) {
		
		$species = get_species_by_species_id($species_id);
		
		$items[$species_id]['species_name'] = $species['species_name'];
		
		$items[$species_id]['species_description'] = $species['species_description'];
		
	}
	
	return $items;
	
}

// Remove all items from the cart
function clear_list() {
    $_SESSION['plant_list'] = array();
}


function delete_species_from_list($species_id) {
	
	if(isset($_SESSION['plant_list'][$species_id])) {
		
		unset($_SESSION['plant_list'][$species_id]);
	}
}

function remove_species_from_list($species_id) {
    if (isset($_SESSION['plant_list'][$species_id])) {
        unset($_SESSION['plant_list'][$species_id]);
    }
}

function list_species_count() {
	$count_items = count($_SESSION['plant_list']);
    return $count_items;
}

?>