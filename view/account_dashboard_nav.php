<nav class="left_nav" id="account_nav">
			
				<ul>
				
					<li class="account_nav_li">
					
						<a class="account_nav_button" href="<?php echo $app_path;?>">
						
							<img src="<?php echo $app_path . 'images/home_icon.png';?>" height="100" width="100"></img>
							
						</a>
					
					</li>
					
					<li class="account_nav_li">
					
						<form id="logout_button_img" action="<?php $app_path . 'account';?>" method="post">
						
							<input type="hidden" name="do_this" value="logout">
							
							<input type="image" src="<?php echo $app_path . 'images/logout_icon1.png';?>" height=95 width=95>
							
						</form>
					
					</li>
				
					<li class="account_nav_li">
					
						<a class="account_nav_button" href="<?php echo $app_path . 'account';?> ">
						
							<img class="dashboard_icon" src="<?php echo $app_path . 'images/dashboard_icon2.png';?>" height="100" width="100"></img>
							
						</a>
					
					</li>
				
					<li class="account_nav_li">
					
						<a class="account_nav_button" href="./?do_this=view_account">
						
							<img class="dashboard_icon" src="<?php echo $app_path . 'images/account_icon2.png';?>" height="100" width="100"></img>
						
						</a>
					
					</li>
						
					<li class="account_nav_li">
					
						<a class="account_nav_button" href="./?do_this=manage_lists">
						
							<img class="dashboard_icon" src="<?php echo $app_path . 'images/list_icon2.png';?>" height="100" width="100"></img>
						
						</a>
					
					</li>
					
					<li class="account_nav_li">
						
						<a class="account_nav_button" href=#>
						
							<img class="dashboard_icon" src="<?php echo $app_path . 'images/sightings_icon1.png';?>" height="100" width="100"></img>
						
						</a>
					
					</li>
					
					<li class="account_nav_li">
					
						<a href=#>
							
							Connect
						
						</a>
					
					</li>
					
				</ul>
			
			</nav>