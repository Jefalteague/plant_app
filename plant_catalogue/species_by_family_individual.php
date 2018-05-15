<?php

include('../view/header.php');

?>

			<div class="section_container">
	
				<?php include('../view/user_side_bar.php'); ?>

				<div class="results_box">
				 
					<div class="results_box_inner shadow">
	
						<h1 class="name_result">
		
							<span style="color:green"><?php echo 'Family: ';?></span><?php echo strtoupper($family_name);?>
		
						</h1>
		
						<a id="return_to_list_link" href="<?php echo './?do_this=taxonomy&amp;choice=species_by_family_list&amp;family_id=' . $family_id;?>">Return to Species List</a>
						
						<?php if(isset($_SESSION['list_session'])) {
			
							echo '<form id="add_to_list_button" action="' . $app_path . 'list" method="get" id="submit_to_list">
							<input type="hidden" name="do_this" value="add">
							<input type="hidden" name="species_id" value="' . $species_id . '">
							<input type="image" src="' . $app_path . 'images/add_to_list_button.png" height=25 width=55>
							</form>';
							
						/* this will add the option of making a list by sending to create account*/
						} else {
						
							echo
							'<form id="create_list_button" action="' . $app_path . 'account" method="get" id="register">
							<input type="hidden" name="do_this" value="">
							<input type="image" src="' . $app_path . 'images/create_new_list_button.png" height=25 width=55>
							</form>';}
			
						?>

		
						<h3 class="name_result">
		
							<span style="color:green"><?php echo 'Species: ';?></span><?php echo $species_name;?>
			
						</h3>
		
						<h3 class="name_result">
		
							<span style="color:green"><?php echo 'Common Name: ';?></span><?php echo $common_name;?>
		
						</h3>
		
						<!--php here to apply correct key images. the following are only to demonstrate what it should look like. they are hardcoded right now.-->
						<div class="key_image"><img class="key_ima" src="<?php echo $app_path . 'images/opposite_leaves.png';?>" height="50" width="50">
		
							<span class="key_image_text">Opposite leaves</span>
			
						</div>
		
						<div class="key_image"><img class="key_ige" src="<?php echo $app_path . 'images/simple_leaf.png';?>" height="50" width="50">
		
							<span class="key_image_text">Simple leaves</span>
			
						</div>
		
						<div class="key_image"><img class="key_ime" src="<?php echo $app_path . 'images/pink_flowers.png';?>" height="50" width="50">
		
							<span class="key_image_text">Pink flowers</span>
			
						</div>
		
						<div id="leaf" class="individual_species_div">
		
							<h1 class="individual_results_label">Leaf</h1>
		
							<div class="inner"><img src="<?php echo $app_path . 'images/Acer campestre.jpg';?>" height="90" width="90">
							
							</div>
			
							<?php ##if ($species_flower_color == 1) {echo '<h1>Flower Color: </h1><p>Red</p>';}?>
				
							<p class="result_text"><?php echo $species_leaf_description;?></p>Slightly elongated, round clusters about 1½ inches long and 1 inch across appear at the tips of branches after leaves have reached maturity. The yellowish white flowers are andromonecious, meaning some are perfect with both stamens and styles while some are just staminate. Both types are about 1/8 inch across with 5 sepals and petals that remain obscurely curved in over the base of the flower. 8 stamens spread above and, when present, a single, 2-parted style is in the center with tips that curl back. </p>
		
				
						</div>
		
						<div id="flower" class="individual_species_div">
			
							<h1 class="individual_results_label">Flower</h1>
			
							<div class="inner">
							
								<img src="<?php echo $app_path . 'images/Acer campestre.jpg';?>" height="90" width="90">
							
							</div>
			
							<p class="result_text"></p>Slightly elongated, round clusters about 1½ inches long and 1 inch across appear at the tips of branches after leaves have reached maturity. The yellowish white flowers are andromonecious, meaning some are perfect with both stamens and styles while some are just staminate. Both types are about 1/8 inch across with 5 sepals and petals that remain obscurely curved in over the base of the flower. 8 stamens spread above and, when present, a single, 2-parted style is in the center with tips that curl back. </p>
		
		
						</div>
		
						<div id="stem" class="individual_species_div">
			
							<!--This will need to have php to process for the different type of plants, changing for trees, herbs, ferns, etc.-->
							<h1 class="individual_results_label">Trunk/Stem</h1>
			
							<div class="inner">
							
								<img src="<?php echo $app_path . 'images/Acer campestre.jpg';?>" height="90" width="90">
								
							</div>
			
							<p class="result_text"></p>Slightly elongated, round clusters about 1½ inches long and 1 inch across appear at the tips of branches after leaves have reached maturity. The yellowish white flowers are andromonecious, meaning some are perfect with both stamens and styles while some are just staminate. Both types are about 1/8 inch across with 5 sepals and petals that remain obscurely curved in over the base of the flower. 8 stamens spread above and, when present, a single, 2-parted style is in the center with tips that curl back. </p>
		
		
						</div>
		
						<div id="fruit" class="individual_species_div">
			
							<h1 class="individual_results_label">Fruit</h1>
			
							<div class="inner">
							
								<img src="<?php echo $app_path . 'images/Acer campestre.jpg';?>" height="90" width="90">
								
							</div>
			
							<p class="result_text">Slightly elongated, round clusters about 1½ inches long and 1 inch across appear at the tips of branches after leaves have reached maturity. The yellowish white flowers are andromonecious, meaning some are perfect with both stamens and styles while some are just staminate. Both types are about 1/8 inch across with 5 sepals and petals that remain obscurely curved in over the base of the flower. 8 stamens spread above and, when present, a single, 2-parted style is in the center with tips that curl back. </p>
		
						</div>
		
						<a href="<?php echo './?do_this=taxonomy&amp;choice=species_by_family_list&amp;family_id=' . $family_id;?>">Return to Species List</a>
		
						<?php if(isset($_SESSION['list_session'])) {echo
	
							'<form action="' . $app_path . 'list" method="get" id="submit_to_list">
							<input type="hidden" name="do_this" value="add">
							<input type="hidden" name="species_id" value="' . $species_id . '">
							<input type="image" src="' . $app_path . 'images/add_to_list_button.png" height=25 width=55>
							</form>';}?>

					</div>

				</div>
	
			</div>

<?php 

include('../view/footer.php');

?>