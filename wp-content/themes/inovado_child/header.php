<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html <?php language_attributes(); ?>> <!--<![endif]-->
<head>

<!-- Basic Page Needs 
========================================================= -->
<meta charset="<?php bloginfo('charset'); ?>">
<title><?php bloginfo('name'); ?> <?php wp_title(' - ', true, 'left'); ?></title>

<!--[if lt IE 9]>
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

<?php global $data; ?>

<!-- Mobile Specific Metas & Favicons
========================================================= -->
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

<link rel="shortcut icon" href="wp-content/uploads/2015/10/focusconlaw_favicon.gif">

<?php if($data['media_favicon_iphone'] != "") { ?><link rel="apple-touch-icon" href="<?php echo $data['media_favicon_iphone']; ?>"><?php } ?>

<?php if($data['media_favicon_iphone_retina'] != "") { ?><link rel="apple-touch-icon" sizes="114x114" href="<?php echo $data['media_favicon_iphone_retina']; ?>"><?php } ?>

<?php if($data['media_favicon_ipad'] != "") { ?><link rel="apple-touch-icon" sizes="72x72" href="<?php echo $data['media_favicon_ipad']; ?>"><?php } ?>

<?php if($data['media_favicon_ipad_retina'] != "") { ?><link rel="apple-touch-icon" sizes="144x144" href="<?php echo $data['media_favicon_ipad_retina']; ?>"><?php } ?>


<!-- WordPress Stuff
========================================================= -->
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>

<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

        <?php include_once('analyticstracking.php') ?>

	<div id="boxed-layout">

	<div class="wrapall">
	
	<?php if($data['check_topbar'] == true) { ?>
	<div id="topbar" class="clearfix <?php if($data['check_socialtopbar'] == false) { echo 'no-social'; } ?>">
	
		<div class="container">
		
			<div class="eight columns">
				<?php if($data['text_callus'] != "") { ?>
					<div class="callus"><?php echo $data['text_callus']; ?></div>
					<div class="clear"></div>
				<?php } ?>
			</div>
			
			<?php if($data['check_socialtopbar'] == true) { ?>
			<div class="eight columns">
				<div class="social-icons clearfix">
					<ul>
					</ul>
				</div>
			</div>
			<?php } ?>
		
		</div>
	
	</div> <!-- end topbar -->
	<?php } ?>

	<?php
            include_once('framework/inc/headers/header.php');
	?>		
