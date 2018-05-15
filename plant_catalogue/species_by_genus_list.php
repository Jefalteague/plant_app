<?php

include('../util/doc_dec.php');

include('../view/header.php');

?>

		<div class="section_container">

			<?php include('../view/user_side_bar.php'); ?>

			<div class="results_box">

				<div class="results_box_inner shadow">
			
					<?php 
					##already did: $family_name = $_GET['family_name'];
				
					##the following php is an example of spaghetti code. do not do this. the immediate following html is the best practice.
					##echo '<h1 id="results_bar">Results for your browse of ' . $family_name . ': ' . count($species) . '</h1>';?>
				
					<h1 id="results_bar" class="center_it">Results for <?php echo $genus_name;?>: <?php echo count($species);?></h1>
					
				</div>

<!--the following loop concerns me from the perspective of the goal of keeping php and html separate. i think ajax could be used here.
i am interested in paginating the results of this page, as in some cases (Asteraceae for example), the output can become quite lengthy.
this would create the opportunity to use ajax to avoid reloading the page. i could do something similar to 
http://www.developphp.com/video/JavaScript/Ajax-Pagination-Tutorial-PHP-MySQL-Database-Results-Paged. i think that at the previous page the logic could
be included, via an array of arrays. the array of arrays would be accessed via the ajax/js functionality, changing the content in the following code. begin
the species_parser.php file.-->

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
						
								<img height=90px width=90px id="" src="<?php echo $app_path;?>images/Acer campestre.jpg">
								
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
									
							</p>
							
						</li>	
					
					</ul>
					
					
				
				
<?php endforeach; ?>



				</div>
			
			</div>
			
	
		
<?php include('../view/footer.php'); ?>

	

