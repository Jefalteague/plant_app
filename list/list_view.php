<?php

include('../view/header.php');

?>

		<div class="section_container">

<?php 

include('../view/user_side_bar.php');

?>
			<div class="results_box">

				<div class="results_box_inner shadow">

		
<?php

if($plant_list == null):
	
	echo 'Your List is empty.</br>';
	
else:

?>		
				
				<h1 id="results_header" class="center_it">My List</h1>

				</div>
				
					<form action="." method="post">
					
						<input type="hidden" name="do_this" value="remove_plant_species">
		
						<table id="list_table">
							
							<tr  class="common_names" id="table_header">
		
								<td class="common_names">Name</td>
		
								<td class="common_names">Description</td>
		
								<td class="common_names">Remove Species</td>
								
							</tr>
	
<?php

foreach($plant_list as $species_id => $plant) :
		
?>
							<tr  class="common_names">
	
								<td class="common_names">
								
									<a href="<?php echo $app_path . 'plant_catalogue/?do_this=taxonomy&choice=individual&species_id=' . $species_id;?>"><?php echo $plant['species_name'];?></a>
									
								</td>
		
								<td class="common_names"><?php echo $plant['species_description']; ?></td>
		
								<td class="common_names">
								
									<input type="checkbox" name="items[<?php echo $species_id ;?>]">
									
								</td>
	
							</tr>
			
<?php

endforeach;
?>

							<tr class="common_names">

								<td class="common_names">
	
									<input type="submit" value="Update List">

								</td>

								<td class="common_names">
	
									<a href="?do_this=clear_list">Empty List</a>

								</td>

						</table>

					</form>


<?php
endif;
?>


					<a href="<?php echo $app_path . 'plant_catalogue/?doThis=taxonomy&choice=family';?>">New Browse</a>
<!--here create code for saving the list to the user's list table. this is a link to the index file
for the save directory, which is the analog to the checkout directory.-->



<?php 
/*this should be conditioned upon the setting of the list. if the session list is empty, the save button should be absent. if the list
filled, the button should be available.*/
if ($plant_list) {
	
?>
	<form action="." method="post"/>
		<input type="text" name="list_name"/>
		<input type="hidden" name="do_this" value="save"/>
		<input type="submit" value="Save"/>
	</form>
	
<?php };?>

			</div>
				
		</div>

<?php
include('../view/footer.php');
?>