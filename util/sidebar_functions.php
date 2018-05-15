<?php 
/*This function is for generating the sidebar menu items*/
function side_bar($selections){
	global $app_path; /*note: mega trouble here! i hadn't used global $appPath, and was including util/main. this caused sooooo much grief!
	when trying to create the function for redirecting in the util/main file, i was getting a fatal error saying that i was trying to redeclare 
	a function that i just declared. by messing around, i managed to track it to this spot by noticing that the side_bar_functions weren't working properly.
	now i hope that i have it. fingers crossed.*/
	##require_once('../model/get_plants_database_functions.php');	
	$get = 'get_';	
	
	$selections2 = $get . $selections;

	$choices3 = $selections2();

	foreach($choices3 as $choice) :
		
		$selection = substr($selections, 0, -1);
		$_name = $selection . '_name';
		
		$selection_name = $choice[$_name];
		
		$name = $selection_name;
		$_id = $selection . '_id';
		$id = $choice[$_id];

		$url = $app_path . 'plant_catalogue?do_this=' . $selections . '&amp;choice=' . $id;						
		?>
		
		<a href="<?php echo $url;?>">
		<?php echo htmlspecialchars($name);?></a>
		
	<?php endforeach;
}


?>