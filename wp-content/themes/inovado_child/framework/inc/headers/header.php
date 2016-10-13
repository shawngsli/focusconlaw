<header id="header" class="header clearfix">
		
		<div class="container header-container">
			
			<div class="sixteen columns clearfix">
			
				<div class="six columns alpha">
					
                                        <div class="logo">
					
                                        	<a href="<?php echo home_url(); ?>/"><img src="wp-content/uploads/2015/10/focusconlaw_logo.png" alt="<?php bloginfo('name'); ?>" class="logo_standard" /></a>
							<?php if($data['media_logo_retina'] != '') { ?><a href="<?php echo home_url(); ?>/"><img src="<?php echo $data['media_logo_retina'] ?>" width="<?php echo $data['logo_width']; ?>" height="<?php echo $data['logo_height']; ?>" alt="<?php bloginfo('name'); ?>" class="logo_retina" /></a><?php } ?>
					</div>
				</div>

				<form action="<?php echo home_url(); ?>/" id="header-searchform" method="get">
			            <input type="text" id="header-s" name="s" value="" autocomplete="off" />
			            <input type="submit" value="Search" id="header-searchsubmit" />
				</form>
			
			</div>

		</div>
		
		<div id="navigation" class="sixteen columns clearfix alpha omega">
			<div class="container">
				<div class="sixteen columns">
					<?php wp_nav_menu(array('theme_location' => 'main_navigation', 'menu_id' => 'nav')); ?>
				</div>
			</div>
		</div>
		
</header>
	
	
