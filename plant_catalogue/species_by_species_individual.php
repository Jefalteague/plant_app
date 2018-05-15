<?php

include('../view/header.php');
include('../model/get_images_function.php');
?>

			<div class="section_container">
	
				<?php include('../view/user_side_bar.php'); ?>

				<div class="results_box">
				 
					<div class="results_box_inner shadow">
	
						<h1 class="name_result">
		
							<span style="color:green"><?php echo 'Family: ';?></span><?php echo strtoupper($family_name);?>
		
						</h1>
		
						<a id="return_to_list_link" href="<?php echo './?do_this=taxonomy&amp;choice=species_by_family_list&amp;family_id=' . $family_id;?>">Related Species</a>
						
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
		
							<span style="color:green">Species: </span><?php echo $species_name;?>
			
						</h3>
		
						<h3 class="name_result">
		
							<span style="color:green">Common Name: </span><?php echo $common_name;?>
		
						</h3>
		
						<h3 class="name_result">
		
							<span style="color:green">Quick Key: </span>
		
						</h3>
						<!--php here to apply correct key images. the following are only to demonstrate what it should look like. they are hardcoded right now.
						Will need to begin to program the functionality to select the "quick key images" based upon the data that is in the database. For example, if
						the species has opposite leaves, this would be indicated in the species table. The php code must take the data and render it here. The data,
						at this point, already should be available through the "get_species_by_species_id" function, which returns everything, including all the
						morphological data that can be used in the "quick key images". this is probably a matter of building a for (type) loop that runs an array
						and renders a div like below for each morphology datum. look at murach's code. should be similar to his products images coding, which is based
						upon a selection. very similar, other than he doesn't need a loop because he only displays the one image related to the product. i need to
						display multiple images related to many individual datum. this is the "quick key system" that i hope i am developing. the images give a quick
						overview of key/diagnostic features of each plant. this must be standardized though. exactly the same number of "quick key images" for each
						species. simplifies the programming and makes a better product. see the "workinprocess.php" file for the basic approach, which works in that
						file anyway!-->
						
						<?php

						
		
						$array1 = array();
						$array1[] = $leaf_margins;
						$array1[] = $leaf_type;
						$array1[] = $flower_color;
						$array1[] = $habitat;
						$array1[] = $plant_type;

						$file_type = '.png';
		
						foreach($array1 as $img) {
			
							$image = $img . $file_type;
						
							if ($img === 'toothed' || $img === 'smooth') {
							
								$img = $img . ' margins';
							
							} else if ($img === 'blue' || $img === 'pink' || $img === 'red' || $img === 'yellow') {
								$img = $img . ' flowers';
								
							} else if ($img === 'compound' || $img === 'simple') {
								$img = $img . ' leaves';
							}
						
			
						?>

						<div class="key_image">
						
							<img class="key_ima" src="<?php echo $app_path . 'images/' . $image;?>" height="50" width="50"/>
							
							<span class="key_image_text"><?php echo $img;?></span>
						
						</div>
						
						<?php 
						
						};
						
						?>
						
						<div class="scroll-menu">
			
									<?php
								
									/*species hard coded now. just testing immediately below*/
									
									$bob = get_images($species_name);
									
									if ($bob == null) {
										
									?>
										
										<img class="myImg" alt="Soon to come" class="indi_image" src="<?php echo $app_path . 'images/soon_to_come.png'?>" height="200" width="200">
										
									<?php
										
									} else {
								
									for($i = 0; $i < count($bob); $i++) {
								
									?>
								
								
							
									<img class="myImg" alt="Place info here" class="indi_image" src="<?php echo $bob[$i];?>" height="200" width="200">
								
								
								
									<?php
								
									}
									}
								
									?>
							
						</div>
						
						<div id="copy-statement">		
								<p id="copy-statement-par">Copyright: various copyright holders. To reuse an image, please click it to see who you will need to contact.</p>
								
							</div>
						
													
							<!--added from w3. need to determine how to modify to apply to my site. 01/14/2018-->
							<div id="myModal" class="modal">

								<!-- The Close Button -->
								<span class="close">&times;</span>

								<!-- Modal Content (The Image) -->
								<img class="modal-content" id="img01">

								<!-- Modal Caption (Image Text) -->
								<div id="caption"></div>
		
							</div>
								
		
						<div id="leaf" class="individual_species_div">
		
							<div class="inner">
							
								<h1>Species Characteristics</h1>
							
								<div class="morph-description">
								
									<h3 class="individual_results_label">Leaf</h1>

									<p class="result_text"><?php echo $leaf_description;?></p>

								</div>
								
								<div class="morph-description">
								
									<h3 class="individual_results_label">Flower</h1>
							
									<p class="result_text"><?php echo $flower_description;?></p>
								
								</div>
								
								<div class="morph-description">
								
									<h3 class="individual_results_label">Trunk/Stem</h1>
								
									<p class="result_text"><?php echo $branch_description;?></p>
									
								</div>
								
								<div class="morph-description">
								
									<h3 class="individual_results_label">Fruit</h1>
								
									<p class="result_text"><?php echo $fruit_description;?></p>
									
								</div>
								
							</div>
			
						</div>
		
							
					</div>
						
						<script>
		
			// Get the modal
			var modal = document.getElementById('myModal');
			
			var img = document.getElementsByClassName('myImg');
			
			for(i = 0; i < img.length; i++){

				// Get the image and insert it inside the modal - use its "alt" text as a caption
			
				var captionText = document.getElementById("caption");
				
				var modalImg = document.getElementById("img01");
				
				img[i].onclick = function(){
			
					modal.style.display = "block";
				
					modalImg.src = this.src;
				
					captionText.innerHTML = this.alt;
				
				}

				// Get the <span> element that closes the modal
				var span = document.getElementsByClassName("close")[0];

				// When the user clicks on <span> (x), close the modal
				span.onclick = function() {
			
					modal.style.display = "none";
				
				}
				
			}
		</script>
		
						<a id="indi_return" href="<?php echo './?do_this=taxonomy&amp;choice=species_by_family_list&amp;family_id=' . $family_id;?>">Related Species</a>
		
						<?php if(isset($_SESSION['list_session'])) {echo
	
							'<form action="' . $app_path . 'list" method="get" id="submit_to_list">
							<input type="hidden" name="do_this" value="add">
							<input type="hidden" name="species_id" value="' . $species_id . '">
							<input type="image" src="' . $app_path . 'images/add_to_list_button.png" height=25 width=55>
							</form>';}?>

				</div>

			</div>

<?php 

include('../view/footer.php');

?>