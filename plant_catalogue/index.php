<?php 

/*This file must use switch coding to select between broad levels of browse: taxonomic browse, flower color browse, etc. then family and genus and species, etc.*/

/*typical openings*/
require_once('../util/main.php');

require_once('../model/get_plants_database_functions.php');

/*Get the data from the user selection and code it for this page*/
/*default is selected at first level of selection from "discover button"*/
if (!isset($_GET['do_this']) && !isset($_POST['do_this'])){
	
	$do_this = '';

/*look for POST data and use it if it is there*/
} else if (isset($_POST['do_this'])){
	
	$do_this = $_POST['do_this'];

/*look for GET data and use it if it is there*/
} else if (isset($_GET['do_this'])){
	
	$do_this = $_GET['do_this'];
	
}

/*make the switch depending upon what is in the $do_this variable*/
switch ($do_this){

	/*taxonomic browse*/
	case 'taxonomy':
	
		/*choose which direction*/
		$choice = $_GET['choice'];

		/*all the families*/
		if ($choice == 'family') {
			
			$alpha_array = range('A', 'Z');
			
			$length_array = count($alpha_array);

			include('family_table.php');

		/*all the species per selected family*/
		} else if ($choice == 'species_by_family_list'){
			
			$family_id = $_GET['family_id'];
			
			$family = get_family_by_family_id($family_id);
			
			$family_name = $family['family_name'];
		
			$species = get_species_by_family_id($family_id);

			include('species_by_family_list.php');
	
		/*all the genera*/
		} else if ($choice == 'genus') {

			$alpha_array = range('A', 'Z');
			
			$length_array = count($alpha_array);
			
			include('genus_table.php');
	
		/*all the species by selected genus*/
		} else if ($choice == 'species_by_genus_list') {
			
			$genus_id = $_GET['genus_id'];
			
			$genus = get_genus_by_genus_id($genus_id);
			
			$genus_name = $genus['genus_name'];
			
			$species = get_species_by_genus_id($genus_id);

			include('species_by_genus_list.php');		

		/*all the species*/
		} else if ($choice == 'species') {
	
			$species = get_species();
			
			include('species_results.php');
			
		/*each species individualy, from either family, genus or species lists*/
		} else if ($choice == 'individual') {
	
			$species_id = $_GET['species_id'];
			
			$species = get_species_by_species_id($species_id);
			
			$family_id = $species['family_id'];
			
			$family = get_family_by_family_id($family_id);
			
			$family_name = $family['family_name'];
			
			$species_name = $species['species_name'];
			
			$common_name = $species['common_name'];
			
			$leaf_margins = $species['leaf_margins'];
			
			$leaf_type = $species['leaf_type'];
			
			$plant_type = $species['plant_type'];
			
			$flower_color = $species['flower_color'];
			
			$habitat = $species['habitat'];
			
			$plant_type = $species['plant_type'];
			
			$leaf_description = $species['leaf_description'];
			
			$branch_description = $species['branch_description'];
			
			$flower_description = $species['flower_description'];
			
			$fruit_description = $species['fruit_description'];
			
			include('species_by_species_individual.php');
			
		/*common name list*/
		} else if ($choice == 'common_name'){

			include('common_names_results.php');
			
		
		}
		
		break;
	
	case 'flower_colors':
	
		$choice = $_GET['choice'];
		
		$color = get_species_by_color($choice);
		
		include('colorResults.php');
		
		break;
		
	case 'shapes':
		break;
		
	case 'habitat':
		break;
		
	case 'forms':
		break;
		
	case 'advanced_browse':
		break;
		
	default:
	
		include('learn_plant.php');
		break;
}
?>