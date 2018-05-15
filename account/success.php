<?php

include('../view/header.php');


?>
		<div id="section_container">
		
		<?php 

include("../view/account_dashboard_nav.php");

?>	
<!--the following chunk needs to be put into a view file to be reused multiple times 11/16/17-->
			<div class="results_box">
			
				<div class="results_box_inner shadow">
				
						<h1 id="results_header" class="center_it">
						
						<?php
						echo 'Welcome, ' . $_SESSION['member']['member_fname'];?>
						
						</h1>

				</div>
			
			</div>

			<div id="dash_main">
			
				<div class="panel" id="panel-1">
				
					<h1 class="inner_panel">News and Updates</h1>
				
				</div>
				
				<div class="panel" id="panel-2">
				
				<h1 class="inner_panel">Snippets from Lists</h1>
					
				</div>
				
				<div class="panel" id="panel-3">
				
					<h1 class="inner_panel">My Sightings</h1>
					<div class="panel_content">
						
						<p >Add plant sightings. Set goals and track your progress. Create and view maps of your sightings data. And more...
						</p>
							
					</div>
					
				
						<div id="map">
					
						</div>
				
							<script>
								var map;
								function initMap() {
									map = new google.maps.Map(document.getElementById('map'), {
									center: {lat: -34.397, lng: 150.644},
									zoom: 8,
									disableDefaultUI: true

									});
								}
							</script>

							<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCeKdmTTLUsaHGRUJr8_1aR6oW7ct1hj8c&callback=initMap" async defer></script>
				
						
			
				</div>
				<div class="panel" id="panel-4">
				
					<h1 class="inner_panel">People</h1>
					
					

				</div>
				
			</div>
</div>

<?php
	include('view/footer.php');
?>	
	
