<?php get_header(); ?>

<?php if($data['check_stripedborder']) { ?><div class="hr-border"><div><?php } ?>

<?php
// Get Blog Layout from Theme Options
if($data['select_bloglayout'] == 'Blog Medium') {
        $blogclass = 'blog-medium';
	$blogtype = 'medium';
} else {
	$blogclass = 'blog-large';
	$blogtype = 'large';
}
?>

<div id="page-wrap" class="row page-container">

        <div id="content" class="col-md-9 col-md-push-3">
   
                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

                        <?php get_template_part( 'framework/inc/post-format/content', get_post_format() ); ?>

                <?php endwhile; ?>


                <?php get_template_part( 'framework/inc/nav' ); ?>

                <?php else : ?>
			
			<h2><?php _e('Not Found', 'minti') ?></h2>

                <?php endif; ?>

        </div>

<?php get_sidebar(); ?>

</div>

<?php get_footer(); ?>
