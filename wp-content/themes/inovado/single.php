<?php get_header(); ?>

<div id="page-wrap" class="row page-container">
	
	<div id="content" class="col-md-9 col-md-push-3">
	
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			
			<?php get_template_part( 'framework/inc/post-format/single', get_post_format() ); ?>
			
			<?php if($data['check_sharebox'] == true) { ?>
				<?php get_template_part( 'framework/inc/sharebox' ); ?>
			<?php } ?>
			
			<?php if($data['check_authorinfo'] == true) { ?>
			<div id="author-info" class="clearfix">
				    <div class="author-image">
				    	<a href="<?php echo get_author_posts_url(get_the_author_meta( 'ID' )); ?>"><?php echo get_avatar( get_the_author_meta('user_email'), '35', '' ); ?></a>
				    </div>   
				    <div class="author-bio">
				        <h4><?php _e('About the Author', 'minti'); ?></h4>
				        <?php the_author_meta('description'); ?>
				    </div>
			</div>
			<?php } ?>
				
			<?php if($data['check_relatedposts'] == true) { ?>	
			
			<div id="related-posts">
					<?php
					//for use in the loop, list 5 post titles related to first tag on current post
					$tags = wp_get_post_tags($post->ID);
					if ($tags) {
					?>
					  
					  <h3 class="title"><span><?php _e('Related Posts', 'minti'); ?></span></h3>
					  
					  <ul>
					<?php  $first_tag = $tags[0]->term_id;
					  $args=array(
					    'tag__in' => array($first_tag),
					    'post__not_in' => array($post->ID),
					    'showposts'=>3
					   );
					  $my_query = new WP_Query($args);
					  if( $my_query->have_posts() ) {
					    while ($my_query->have_posts()) : $my_query->the_post(); ?>
					      <li><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?> <span>(<?php the_time(get_option('date_format')); ?>)</span></a></li>
					      <?php
					    endwhile;
					    wp_reset_query();
					  }
					}
					?>
					 </ul>
			</div>

			<?php } ?>
		
		<div class="comments"><?php comments_template(); ?></div>
		
		<div class="post-navigation">
			<div class="alignleft prev"><?php previous_post_link('%link', 'Prev Post', FALSE); ?></div>
			<div class="alignright next"><?php next_post_link('%link', 'Next Post', FALSE); ?> </div>
		</div>
	
		<?php endwhile; endif; ?>
	
	</div>

<?php get_sidebar(); ?>

</div>

<?php get_footer(); ?>
