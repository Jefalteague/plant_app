<?php

include('../view/header.php');

?>

			<div class="section_container">
	
				<?php include('../view/user_side_bar.php'); ?>

				<div class="results_box">
				 
					<div class="results_box_inner shadow">
	
						<h1 id="results_header" class="center_it">EWMA Species by Flower Color</h1>
						
						<?php foreach($species as $spec): {?>
						<div>
						
							<?php
							
							$species = $spec['species_name'];
							echo $species;
							
							?> 
						
						</div>
						
					</div>
				
<?php 


				</div>

			</div>
		
<?php include('../view/footer.php'); ?>


