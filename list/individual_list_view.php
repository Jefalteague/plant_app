<?php

include('view/header.php');


?>
<div id="section_container">
		
		<?php 

include("../view/account_dashboard_nav.php");

?>	
<!--the following chunk needs to be put into a view file to be reused multiple times 11/16/17-->
			<div class="results_box">
			
				<div class="results_box_inner shadow">
				
						<h1 id="results_header" class="center_it">
						
						My Lists
						
						</h1>
						
				</div>

			
				<div id="searchStuff">

					<h1>List Name Goes here</h1>
					<h1>List Date goes here</h1>
				
				<form action="." method="post">
				<input type="hidden" name="do_this" value="delete_list">
					<table>
					
						<tr class="list_table">
							<th class="common_names">Species ID</th>
							<th class="common_names">Common Name</th>
							<th class="common_names">Species Name</th>
							
						
						</tr>
						
						<?php 

							foreach ($list as $list_item):

								$species_id = $list_item['species_id'];
								$list_id = $list_item['list_id'];

								$species = get_species_by_species_id($species_id);
		
										$species_name = $species['species_name'];
										$species_id = $species['species_id'];
										$common_name = $species['common_name'];
										?>
										
									<tr class="list_table">	
									
										<td class="common_names"><?php echo $species_id;?></td>
							
										<td class="common_names"><?php echo $common_name;?></td>
							
										<td class="common_names"><a href="<?php echo $app_path . 'plant_catalogue/?do_this=taxonomy&choice=individual&species_id=' . $species_id;?>"><?php echo $species_name;?></td>
										
										
									
									</tr>

							<?php endforeach; ?>
							
					</table>
					
									</form>
<!--how to get the data from the species table that is linked to the list table-->
				
					
				</div>
			
		

</div>

<?php
	include('view/footer.php');
?>	

