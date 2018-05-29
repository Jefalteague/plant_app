	
		<div class="content_main_container">

			<div id="header_main_container">
		
				<div class="header_logo_container">
		
					<div id="logo_container">
			
						<div id="left"><a class="EWMAFA-logo" href="<?php echo $app_path . '.';?>">
							
							<img src="<?php echo $app_path . 'images/logo.png';?>" width='150'> Flora Project</a>
							
						</div>
			
					</div>
			
					<div id="slogan_container">
			
						<div id="right">THE ONLY DATABASE-DRIVEN WEBAPP DEDICATED TO ERWIN FLORA</div>
			
					</div>
				
				</div>
		
				<div class="header_nav_container">
			
					<div class="header_nav_box">
			
						<a class="header_nav_link" href="<?php echo $app_path . '.';?>">HOME</a>
					
					</div>
				
					<div class="header_nav_box">

						<a class="header_nav_link" href="<?php echo $app_path . "about";?>">ABOUT</a>

					</div>
					
					<div class="header_nav_box">

						<a class="header_nav_link" href="<?php echo $app_path . 'plant_catalogue';?>">DISCOVER PLANTS</a>

					</div>
				
					<div class="header_nav_box">

						<a class="header_nav_link" href="<?php echo $app_path . 'botany';?>">DISCOVER BOTANY</a>
					
					</div>
					
					<div class="header_nav_box">

						<a class="header_nav_link" href="<?php echo $app_path . 'help';?>">HELP</a>

					</div>
					
					<?php if(isset($_SESSION['member'])){?>
				
					<div class="header_nav_box">

						<a href="<?php echo $app_path . 'account/?do_this=logout'?>"><span class="headerDropButton">SIGN OUT</a>
	
					</div>
				
					<div class="header_nav_box" id="account">

						<a class="header_nav_link" href="<?php echo $app_path . 'account/?do_this=view_account';?>">ACCOUNT</a>

					</div>
				
					<?php } else { ?>
					
					<div class="header_nav_box">

						<a class="header_nav_link" href="<?php echo $app_path . 'account';?>">SIGN IN</a>
	
					</div>

					<?php };?>

				
				</div>

			</div>
		