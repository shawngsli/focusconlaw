<header id="header-v6" class="header header-megamenu clearfix">
		
	<div class="container">
	
		<div class="four columns">
			<div class="logo">
				<?php if($data['media_logo'] != "") { ?>
					<a href="<?php echo home_url(); ?>/"><img src="<?php echo $data['media_logo']; ?>" alt="<?php bloginfo('name'); ?>" class="logo_standard" /></a>
					<?php if($data['media_logo_retina'] != '') { ?><a href="<?php echo home_url(); ?>/"><img src="<?php echo $data['media_logo_retina'] ?>" width="<?php echo $data['logo_width']; ?>" height="<?php echo $data['logo_height']; ?>" alt="<?php bloginfo('name'); ?>" class="logo_retina" /></a><?php } ?>
				<?php } else { ?>
					<a href="<?php echo home_url(); ?>/"><?php bloginfo('name'); ?></a>
				<?php } ?>
			</div>
		</div>
		
		<div id="navigation" class="twelve columns clearfix">

			<?php if($data['check_searchform'] == true) { ?>
				<form action="<?php echo home_url(); ?>/" id="header-searchform" method="get">
				        <input type="text" id="header-s" name="s" value="" autocomplete="off" />
				        <input type="submit" value="Search" id="header-searchsubmit" />
				</form>
			<?php } ?>
			
			<?php if (class_exists('Woocommerce') && $data['check_woocommerceicon'] == true) { // Check if WooCommerce Exists ?>
				<?php global $woocommerce; ?>
				<a href="<?php echo $woocommerce->cart->get_cart_url(); ?>" id="header-cart" title="<?php echo sprintf(_n('%d item', '%d items', $woocommerce->cart->cart_contents_count, 'woothemes'), $woocommerce->cart->cart_contents_count);?>"></a>
			<?php } ?>

			<?php 
				if(has_nav_menu('main_navigation')) {
					wp_nav_menu( array(
						 'theme_location' => 'main_navigation',
						 'container' =>false,
						 'menu_id' => 'nav',
						 'echo' => true,
						 'before' => '',
						 'after' => '',
						 'link_before' => '',
						 'link_after' => '',
						 'depth' => 0)
					); 
				} else {
					echo '<ul><li><a href="#"><strong>No menu assigned!</strong><span>Assign in Appearance / Menus</span></a></li></ul>';
				}
			?>

		</div>

	</div>
	
</header>