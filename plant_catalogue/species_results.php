<?php

include('../view/header.php');

?>

		<div class="section_container">

			<?php include('../view/user_side_bar.php'); ?>

			<div class="results_box">

				<div class="results_box_inner shadow">
			
					<?php 
					
					##echo '<h1 id="results_bar">Results for your browse of ' . $family_name . ': ' . count($species) . '</h1>';?>
				
					<h1 id="results_header" class="center_it">EWMA Plant Species</h1>
					<p>Click on a Species name to view more information.</p>
					
					<table>
				
					<tr>
				
						<td class="common_names">Species Name</td>
				
						<td class="common_names">Common Name</td>
				
					</tr>
					
				<?php foreach ($species as $spec):
			
				$species_id = $spec['species_id'];
				$species_name = $spec['species_name'];
				$species_common_name =  $spec['common_name'];?>				
				
				<tr>
				
				<td class="common_names"><a id="species_links" href="<?php echo $app_path;?>plant_catalogue/?do_this=taxonomy&amp;choice=individual&amp;species_id=<?php echo $species_id;?>">
					
						<?php echo $species_name; ?></a>
						
				</td>
				
				<td class="common_names">
				
					<?php echo $species_common_name;?>
				
				</td>
				</tr>
				
				
			
			<?php endforeach; ?>
				</table>
					
				</div>
				
				
				
			</div>
			
		</div>	

<?php include('../view/footer.php'); ?>

