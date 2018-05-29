				<div class="left_nav shadow">
				
					<p class="center_it">Browse By:</p>
					
						<!--<button> seems to not allow the link to work. have to find other way to format <div>-->
						<!--These links should be generated programatically with php, from the respective db tables, where applicable?-->
						
						<div class='buttonBox'>
						
							<button class='dropButton'>Taxonomy</button>
							
							<div class='dropButtonContent'>
							
								<!--possibly change the paths to move functionality to independent files
								i.e <a href="<?php ##echo $app_path . 'family'?>">Family</a>
								i.e <a href="<?php ##echo $app_path . 'genus'?>">Genus</a>
								i.e <a href="<?php ##echo $app_path . 'species'?>">Species</a>
								i.e <a href="<?php ##echo $app_path . 'common_name'?>">Common Name</a>
								-->
								
								<a href="<?php echo $app_path . 'plant_catalogue?do_this=taxonomy&amp;choice=family'?>">Family</a>
								
								<a href="<?php echo $app_path . 'plant_catalogue?do_this=taxonomy&amp;choice=genus'?>">Genus</a>
								
								<a href="<?php echo $app_path . 'plant_catalogue?do_this=taxonomy&amp;choice=species'?>">Species</a>
								
								<a href="<?php echo $app_path . 'plant_catalogue?do_this=taxonomy&amp;choice=common_name'?>">Common Name</a>
								
							</div>
							
						</div>
						
						<?php /*This simplifies the programming by eliminating the repeat typed code. To be done with array for each case. be aware that all the functions
						are named by a pattern: get_'something'(). any changes will mess things up.*/
						
						$choices =  array('shapes', 'colors', 'forms', 'habitats');
						
						for($i=0; $i < count($choices); $i++){?>
						
							<div class='buttonBox'>
							
								<button class='dropButton'><?php echo ucwords($choices[$i]); ?></button>
							
								<div class='dropButtonContent'>
								
								<?php 
								require_once('../util/sidebar_functions.php');
								
								$selections = $choices[$i];
								
								side_bar($selections);?>
								
								</div>
							
							</div>
							
						<?php } ;?>

						<!--eventually an advanced search option here-->
						
				</div>
		

