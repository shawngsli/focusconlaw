<?php get_header(); ?>

<div id="page-wrap" class="row page-container">
	
	<div id="frontpage-slider" class="col-lg-12">

            <?php echo do_shortcode("[metaslider id=2624]"); ?>

	</div>

        <div id="frontpage-new-posts" class="col-lg-6 col-md-6 frontpage block">
                <h2>最新文章</h2>
               
                <?php
                    $args = array(
                        'post_type' => post,
			'orderby' => 'date',
                        'order' => 'DEC',
                        'posts_per_page' => 7,
         		);
                    $newPosts = new WP_Query($args); ?>
		<div class="newPost-items">

                <?php
		    if ($newPosts->have_posts()) {
		        while ($newPosts->have_posts()):
	                    $newPosts->the_post(); ?>

		    <div class="row newPost-item">
		    <div class="col-lg-4 frontpage-thumbnail">
                    <a href="<?php the_permalink(); ?>">
                    <?php	
		    	if( has_post_thumbnail() ) {
                            the_post_thumbnail("front-page-thumbnail");
			}
                    ?>
                    </a>
		    </div>
		    <div class="col-lg-8 frontpage-new-post">
			<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                        <time><?php echo get_the_date(); ?></time>
                    </div>
		    </div>
                    <?php
		    	endwhile;
		    	wp_reset_postdata();
		        }
                    ?>
                </div>
	</div>
	<div id="frontpage-videos" class="col-lg-6 col-md-6 frontpage block">
		<h2>影音專區</h2>
        </div>

</div>

<?php get_footer(); ?>
