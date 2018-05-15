<?php

include('../view/header.php');

?>

			<div class="section_container">
	
				<?php include('../view/user_side_bar.php'); ?>

				<div class="results_box">
				 
					<div class="results_box_inner shadow">
	
						<h1 id="results_header" class="center_it">EWMA Plant Families</h1>
						<p>Click on a Family name to view more information.</p>
						
						<?php 
			
require_once('../model/get_plants_database_functions.php');

for($i = 0; $i < $length_array; $i++) {
	
	$alpha_array2 = $alpha_array[$i] . '%';
	
	$families = get_families_by_alpha($alpha_array2);
	
	$bob = $alpha_array[$i];
	
?>

	<div id="table_div">
	
		<h2 id="<?php echo $bob;?>"><?php echo $bob;?></h2>
		
	</div>
	
	<table>
	<col width='80'>
	<col width='80'>
	<col width='80'>
	<col width='80'>
	
<?php

$counter = "";

?>

		<tr>
		
<?php 

	$counter = 0;

	foreach ($families as $family):{
		
		$family_name = $family['family_name'];
		
		$family_id = $family['family_id'];
		
		$GLOBALS['family_name'] = $family_name;
		
		$url = $app_path . 'plant_catalogue/?do_this=taxonomy&amp;choice=species_by_family_list&amp;family_id=' . $family_id;
		
?>
		
			<td>
		
				<a href="<?php echo $url;?>" id="tableData"><?php echo $family_name;?></a>
			
			</td>
		
<?php

		$counter++;
		
		if ($counter % 4 == 0){
			
?>

		</tr>
		
		<tr>

<?php		
		}
		
	} endforeach;
	
		if ($counter == 0){
			
?>
			<td>There are no listings.</td>
			<!--or<div>There are no listings.</div>-->
			
		</tr>
		
<?php

		}
		
?>
		
<?php

		if (($counter % 4 > 0) || ($counter % 4 < 1)){
			
?>
		
		</tr>

<?php
		}
?>
		
	</table>
	
<?php 
	
}
	
?>


<!--spaghetti follows-->
<?php
/*
for($i = 0; $i < $length_array; $i++){
	$alpha_array2 = $alpha_array[$i] . '%';
	$families = get_families_by_alpha($alpha_array2);
	$bob = $alpha_array[$i];
	echo "					<div id='table_div'>\n\n						<h2 id='" . $bob . "'>" . $bob . "</h2>\n\n";
	echo "					</div>\n\n";
	echo "						<table><col width='80'><col width='80'><col width='80'><col width='80'>\n\n";
		
	$counter = "";
				
	echo "							<tr>\n\n";
	$counter = 0;
	
	foreach ($families as $family):{
		$family_name = $family['family_name'];
		$family_id = $family['family_id'];
		#$GLOBALS['family_name'] = $family_name;
		
		$url = $app_path . 'plant_catalogue/?do_this=taxonomy&amp;choice=species_by_family_list&amp;family_id=' . $family_id;
		echo "								<td>\n\n";
		echo "									<a href='" . $url . "' id='tableData'>" . $family_name . "</a>\n\n";
		echo "								</td>\n\n";
		}
					
		$counter++;
		
		if ($counter % 4 == 0){
		
			echo "							</tr>\n\n";
			echo "							<tr>\n\n";
			
		} 
					
	endforeach;
	
if ($counter == 0){
	echo "								<td>There are no records.</td>\n\n";
	echo "							</tr>\n\n";
}
			
if (($counter % 4 > 0) || ($counter % 4 < 1)){
			echo "							</tr>\n\n";
		}	

echo "						</table>\n\n";

}
*/?>
						
					</div>
				

				</div>

			</div>
		
<?php include('../view/footer.php'); ?>


