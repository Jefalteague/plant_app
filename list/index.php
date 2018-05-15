<?php

require_once('../util/main.php');
require_once('../model/get_plants_database_functions.php');	
require_once('../util/secure_connection.php');
require_once('../model/functions.php');
require_once('../model/list_functions.php');

##include('../model/species_database_functions.php');


require_once('../model/list_database_functions.php');

$do_this = filter_input(INPUT_POST, 'do_this');

if($do_this == NULL) {
	
	$do_this = filter_input(INPUT_GET, 'do_this');
	
	if($do_this == NULL) {
		
		$do_this = 'manage_lists';
		
	}
	
}

switch ($do_this) {
	
	case 'add':
	
		$species_id = filter_input(INPUT_GET, 'species_id');

		add_species_to_list($species_id);
		
		$plant_list = get_species_from_list();
		
		include('./list_view.php');
		
		break;
		
	case 'remove_plant_species':
		
		$items = filter_input(INPUT_POST, 'items', FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);
		
		if (isset($items)){
        
			foreach ( $items as $species_id => $bob) {
				
				delete_species_from_list($species_id);

			}
	
		}
        
		$plant_list = get_species_from_list();
		
		include('./list_view.php');
		
		break;
		
	case 'view':
		
		$plant_list = get_species_from_list();
		
		include('./list_view.php');
		
		break;
		
	case 'clear_list':
	
		clear_list();
		
		$plant_list = get_species_from_list();
		
		include('./list_view.php');
		
		break;
		
	case 'manage_lists':
	
		include('manage_lists.php');
		
		break;
		
	case 'individual_list_view':
		
		$memberlist_id = $_GET['memberlist_id'];
		
		$memberlist_id = (int)$memberlist_id;
		
		$list = get_list_items($memberlist_id);
						
		/*need function to get the specifics for each list item: family, genus, species, common name, etc. this must use the species
						table, which contains all the releveant data. the function should be placed at the index level.*/
						
		
							
		include('individual_list_view.php');
	
		break;
		
	case 'logout':
	
		echo 'hello';
		
		redirect('../account?do_this=logout');
		
		break;
		
	case 'delete_list':

		if (isset($_POST['lists'])){
			
			$lists = $_POST['lists'];
			
			foreach ($lists as $key => $value) {
				
				delete_list($value);
				
			}

		} else {
				
			echo 'nope';
		}
		
		redirect('.');
		
		break;
		
	case 'save':
	
		$list_name = $_POST['list_name'];
		
		redirect($app_path . 'save_list/?do_this=save&list_name=' . $list_name);
		
	default: 
		
		break;
		
}

?>