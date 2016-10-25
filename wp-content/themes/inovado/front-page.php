<?php get_header(); ?>

<div id="page-wrap" class="row page-container">
	
	<div id="frontpage-slider" class="col-xs-12">

            <?php echo do_shortcode("[metaslider id=2624]"); ?>

	</div>

        <div id="frontpage-new-posts" class="col-sm-6 frontpage block">
                <h2>最新文章</h2>
               
                <?php
                    $args = array(
                        'post_type' => post,
			'orderby' => 'date',
                        'order' => 'DEC',
                        'posts_per_page' => 7,
         		);
                    $newPosts = new WP_Query($args); ?>
		<div class="col-sm-12 newPost-items">

                <?php
		    if ($newPosts->have_posts()) {
		        while ($newPosts->have_posts()):
	                    $newPosts->the_post(); ?>

		    <div class="row newPost-item">
		    <div class="col-xs-4 frontpage-thumbnail">
                    <a href="<?php the_permalink(); ?>">
                    <?php	
		    	if( has_post_thumbnail() ) {
                            the_post_thumbnail("front-page-thumbnail");
			}
                    ?>
                    </a>
		    </div>
		    <div class="col-xs-8 frontpage-new-post">
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
	<div id="frontpage-videos" class="col-sm-6 frontpage block">
		<h2>影音專區</h2>
		    <div class="row video-items">
                <?php
                    $args = array(
                        'post_type' => 'post',
			'category_name' => 'con_video',
			'orderby' => 'date',
                        'order' => 'DEC',
                        'posts_per_page' => 7,
         		);
                    $videoPosts = new WP_Query($args); ?>
                <?php
		    if ($videoPosts->have_posts()) {
		        while ($videoPosts->have_posts()):
			    $videoPosts->the_post();
                            
			    $content = apply_filters('the_content', $post->post_content);
			    $embed = get_media_embedded_in_content($content)[0]; ?>

		        <div class="col-xs-6 frontpage-video">
                            <div class="youtube-video-container">
                            <?php echo $embed; ?>	
			    </div>
		            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                            <time><?php echo get_the_date(); ?></time>
		        </div>
                    <?php
		    	endwhile;
		    	wp_reset_postdata();
		        }
                    ?>
		    </div>
	</div>
        <div id="frontpage-qa" class="col-sm-6 frontpage block">
                <h2>極憲QA</h2>
                <?php
                    $args = array(
                        'post_type' => 'post',
			'tag' => 'qa',
			'orderby' => 'date',
                        'order' => 'DEC',
                        'posts_per_page' => 7,
         		);
                    $qaPosts = new WP_Query($args); ?>
		<div class="qa-items col-sm-12">

                <?php
		    if ($qaPosts->have_posts()) {
		        while ($qaPosts->have_posts()):
	                    $qaPosts->the_post(); ?>

		    <div class="row qa-item">
		    <div class="col-xs-4 frontpage-thumbnail">
                    <a href="<?php the_permalink(); ?>">
                    <?php	
		    	if( has_post_thumbnail() ) {
                            the_post_thumbnail("front-page-thumbnail");
			}
                    ?>
                    </a>
		    </div>
		    <div class="col-xs-8 frontpage-qa">
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
</div>

<?php get_footer(); ?>
