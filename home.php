<?php

require_once('view/header.php');

?>
				
					<div class="center_it" id="banner_img">
				
						<img src="<?php echo $app_path . 'images/header_img.png';?>" id="banner" alt="banner">
					
					</div>

			<div class="discover" id="discover_plants">
							
				<h1 class="center_it">Discover Plants!</h1>
				
				<div class="center_it" id="center_it">
						
					<div class="info_box">
						
						<p>Hundreds of plants! Right at your finger tips. Click on the button below to start learning what is in the Erwin Wildlife Management Area.</p>
				
					</div>
						
				</div>
						
				<br>
	
				<br>

				<div class="center_it">
				
					<a href="<?php echo $app_path . 'plant_catalogue';?>" class="center_it">
					
						<img src="<?php echo $app_path . 'images/discover_submit.png';?>" class="button_img">
					
					</a>
				
				</div>
						
			</div>

			<div class="discover" id="discover_botany">
	
				<h1 class="center_it">Discover Botany!</h1>
				
				<div class="center_it" id="center_it">
					
					<div class="info_box">
				
						<p>Hundreds of terms! Right at your finger tips. Click on the button below to start learning the terminology you need to understand the flora of EWMA.</p>
					
					</div>
				
				</div>
							
				<br>
							
				<br>
				
				<div class="center_it">
				
					<a href="<?php echo $app_path . 'plant_catalogue';?>" class="center_it">
					
						<img src="<?php echo $app_path . 'images/discover_submit.png';?>" class="button_img">
					
					</a>
				
				</div>
						
			</div>

<?php

require_once('view/footer.php');

?>

