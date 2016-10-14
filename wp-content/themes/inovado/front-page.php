<?php get_header(); ?>

<div id="page-wrap" class="row page-container">
	
	<div id="content" class="col-lg-12 blog blog-large">

            <?php echo do_shortcode("[metaslider id=2624]"); ?>

	</div>

        <div id="frontpage-new-posts" class="col-lg-6 frontpage block">
                <h2>最新文章</h2>
                <?php
                    $args = array(
                        'post_type' => post,
			'orderby' => 'date',
                        'order' => 'DEC',
                        'posts_per_page' => 7,
         		);
global $_wp_additional_image_sizes;
print_r($_wp_additional_image_sizes);
                    $newPosts = new WP_Query($args);
		    if ($newPosts->have_posts()) {
		        while ($newPosts->have_posts()):
	                    $newPosts->the_post();
			    if( has_post_thumbnail() ) {
                                the_post_thumbnail();
			    }
			endwhile;
			wp_reset_postdata();
		    }
                ?>
	</div>
	<div id="frontpage-videos" class="col-lg-6 frontpage block">
		<h2>影音專區</h2>
        </div>

</div>

<?php get_footer(); ?>
