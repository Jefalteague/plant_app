<?php

include('../view/header.php');

?>

			<div class="section_container">
	
				<?php include('../view/user_side_bar.php'); ?>

				<div class="results_box">
				 
					<div class="results_box_inner shadow">
	
						<h1 id="results_header" class="center_it">EWMA Plant Genera</h1>
						<p>Click on a Genus name to view more information.</p>
						
						<?php  /*fix spaghetti*/
			
require_once('../model/get_plants_database_functions.php');

for($i = 0; $i < $length_array; $i++) {
	
	$alpha_array2 = $alpha_array[$i] . '%';
	
	$genera = get_genera_by_alpha($alpha_array2);
	
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

	foreach ($genera as $genus):{
		
		$genus_name = $genus['genus_name'];
		
		$genus_id = $genus['genus_id'];
		
		$GLOBALS['genus_name'] = $genus_name;
		
		$url = $app_path . 'plant_catalogue/?do_this=taxonomy&amp;choice=species_by_genus_list&amp;genus_id=' . $genus_id;
			
?>
		
			<td>
		
				<a href="<?php echo $url;?>" id="tableData"><?php echo $genus_name;?></a>
			
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


			
			
			

<?php 
/*comment out to save and continue working. it works as is here, and 
			this should work from the familyDb.php file, but does not. why not?
			this should be the getFamilies() function.
			global $db;
			$query = 'SELECT * FROM family ORDER BY familyName';
			$statement = $db->prepare($query);
			$statement->execute();
			$result = $statement->fetch();
			
			$counter = 0;
			echo "					<tr>\n";
			while ($result != null) {
				$name = $result['familyName'];
                $id = $result['familyID'];
                $url = $app_path . '/searchApp?action=family' . '&amp;familyID=' . $id;
				echo "
						<td>
							<a href='" . $url . "' id='tableData'>" . $name . "</a>	
						</td>
					";
						$result = $statement->fetch();
				$counter++;
				if ($counter % 4 == 0){
					echo "
					</tr>
					<tr>";
					}
			}
			
			$statement->closeCursor();
				/*?>
		
			<?php/*try to fix to work from familyDb.php
			$counter = 0;
			echo "<tr>";
			while ($result != null) {
				$name = $result['familyName'];
                $id = $result['familyID'];
                $url = $app_path . 'family?family_id=' . $id;
				echo "<td><a href='" . $url . "'>" . $name . "</td>";
						$result = $statement->fetch();
				$counter++;
				if ($counter % 4 == 0){
					echo "</tr>";
					}
			}
			
			$statement->closeCursor();
				*/?>
	
		
						
					</div>
				

			</div>

			
			
		</section>
		
<?php include('../view/footer.php'); ?>
