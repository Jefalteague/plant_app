<?php

include('../util/doc_dec.php');

include('../view/header.php');

?>

		<div class="section_container">

			<?php include('../view/user_side_bar.php'); ?>

			<div class="results_box">

				<div class="results_box_inner shadow">
				
					<h1 id="results_bar" class="center_it">Results for <?php echo $family_name;?>: <?php echo count($species);?></h1>
					
				</div>

<?php

foreach ($species as $spec):

	$species_id = $spec['species_id'];
	
	$species_name = $spec['species_name'];
	
	$species_description = $spec['species_description'];

?>

				
				
					<ul class="results_box_inner shadow">
					
						<li class="no_decoration">
		
							<a id="small_image_link" href="<?php echo $app_path;?>plant_catalogue/?do_this=taxonomy
							&amp;choice=individual&amp;species_id=<?php echo $species_id;?>">
						
								<img height=100px width=100px id="" src="<?php echo $app_path;?>images/Acer campestre.jpg">
								
							</a>

							<div id="description_paragraph">
							
								<p>
							
								<?php 
								
									echo $species_name;

								?>
								
								</p>
								
								<p>
								
								<?php echo $species_description;?>
								
								</p>
									
							</div>
							
						</li>	
					
					</ul>
					
					
				
				
<?php endforeach; ?>



				</div>
			
			</div>
			
	
		
<?php include('../view/footer.php'); ?>

	

