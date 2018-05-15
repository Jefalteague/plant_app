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
						
						My List
						
						</h1>
						
				</div>
						
					<div id="searchStuff">
					
							<?php ##$_SESSION['list_session'] = array();
	
							$member_id = $_SESSION['member']['member_id'];
		
							$lists = get_lists($member_id);?>
					
						<!--Insert here the landing code, which consists of a dashboard of functionality. Account-->
					
							<?php 
							if ($lists == null):
							?>
					
							<p>
								<?php echo 'No lists to display';?>
							</p>
					
							<?php
							else:
					
							?>
					
							<!--Transfer the table below to a different file, one that loads after click on view lists button, whereever that is.-->
						<div id="list_form_box">
					
							<form action="." method="post">
					
								<input type="hidden" name="do_this" value="delete_list">
					
								<table>
						
									<tr>
							
										<td class="common_names">List ID</td>

										<td class="common_names">List Name</td>
							
										<td class="common_names">List Date</td>
							
										<td class="common_names">Delete List?</td>

									</tr>
						
								<?php foreach ($lists as $list):
			
									$memberlist_id = $list['memberlist_id'];
									$list_name = $list['list_name'];
									$member_id = $list['member_id'];
									$list_comment = $list['list_comment'];
									$create_date =  $list['create_date'];?>
						
									<tr>
							
										<td class="common_names"><?php echo $memberlist_id;?></td>
							
										<td class="common_names"><a id="species_links" href="<?php echo $app_path . 'list/?do_this=individual_list_view&memberlist_id=' . $memberlist_id;?>"><?php echo $list_name;?></a></td>
							
										<td class="common_names"><?php echo $create_date;?></td>
							
										<td  class="common_names"><input type="checkbox" name="lists[]" value="<?php echo $memberlist_id ;?>"></td>
						
									</tr>
				
								<?php endforeach; ?>
					
								</table>
					
								<input type="submit" value="Delete Selected"></input>
					
							</form>
						
						</div>
					
						<?php endif;?>
			
					</div>
			
			</div>

		</div>

<?php
	include('view/footer.php');
?>	
	