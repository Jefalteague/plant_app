<?php 

require_once('../util/main.php');
require_once('util/secure_connection.php');

require_once('model/get_plants_database_functions.php');	
require_once('model/list_database_functions.php');
require_once('model/list_functions.php');


$do_this = filter_input(INPUT_POST, 'do_this');
if($do_this == NULL) {
	$do_this = filter_input(INPUT_GET, 'do_this');
	if ($do_this == NULL) {
		$do_this = 'save';
	}
}

switch($do_this) {
	
	case 'save':
	
		if (list_species_count() == 0) {
			echo $count_items;
            redirect('Location: ' . $app_path . 'list');
        } else {
			echo 'yep';
		}
		
        $list_species = get_species_from_list();
		
		$list_name = $_GET['list_name'];
		
		$memberlist_id = add_list($list_name);
		
		foreach($list_species as $species_id => $item) {
			add_list_item($memberlist_id, $species_id);
		}
		
		clear_list();
		
		redirect('../account');
        break;
		
	case 'delete_list':
	
		echo 'help';
	
		
	
}

?>

