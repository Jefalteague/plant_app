<?php
/*this file provides the landing page for the plant database funcitionality. a similar file will exist for the glossary functionality.
these are the default pages, the first ones seen by the user when selecting to use the respective apps.*/

/*display the header from the separate file.*/

include('../view/header.php');

?>

		<div class="section_container">
	
				<?php include('../view/user_side_bar.php'); ?>

				<div class="results_box">
				 
					<div class="results_box_inner shadow">

						<div>
						
							<img><!--insert inspiring image of taxonomy here--></img>
							
						</div>
						
						<div>
						
							<h2>About the Species Records</h2>
							
							<p>
							
								The Flora Project Web App allows the user several approaches to finding and viewing information about species documented
								in the boundaries of EWMA.
								
							</p>
							<br />
							
							<h3>Simple Browsing</h3>
	
							<p>
								
								Perhaps the quickest way to begin is through a simple browse. The navigation bar to the left provides quick access to broad
								browse categories. Simply select a category and hover over it until further options appear. Select the link which best suits your
								interest to proceed to the next stage of selection. For example, hovering on taxonomy creates a list of browse options such as Family
								and Genus. The selected option will return a list of linked names for your browse selection. Clicking Genus will return a list of all
								genera in the database. Then select the genus you would like to view and click the link to proceed to a list of all species currently
								in the database for that genus. Finally, select a species of interest and follow the link to its individual page.
								
								
							</p>
							<br />
						
							<h3>Advanced Browsing</h3>
							
							<p>
							
								Advanced browse allows you to filter with greater control.
							
							</p>
							
							<br />
							<h3>Search</h3>
							
							<p>
							
								If you already know exactly what you are looking for, try the search.
							
							</p>
							
								<br>
								<br>
								For detailed information about using the app, please consult the Help pages.
								
								<br>
								<br>
								
								Bear in mind that the app is still in development and few records are available.
								
								<br>
								<br>
								
								Thanks, EWMAFP Staff
							
						</div>
						
					</div>
					
				</div>
				
		</div>

<?php
/*display the footer from the separate file.*/
include('view/footer.php');
?>
