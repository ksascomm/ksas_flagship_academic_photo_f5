<?php
/*
Template Name: Home - Background Photo
*/
?>
<?php get_header(); 
    $theme_option = flagship_sub_get_global_options();
    
    		$slider_query = new WP_Query(array(
			'post_type' => 'slider',
			'orderby'=>'rand',
			'post_status' => 'publish',
			'posts_per_page' => '1'));
		

		if ( false === ( $latest_profile_query = get_transient( 'latest_profile_query' ) ) ) {
		// It wasn't there, so regenerate the data and save the transient
		$latest_profile_query = new WP_Query(array(
			'post_type' => 'profile',
			'posts_per_page' => 1)); 
			set_transient( 'latest_profile_query', $latest_profile_query, 2592000 );
        } 
		$news_query_cond = $theme_option['flagship_sub_news_query_cond'];
			if ( false === ( $news_query = get_transient( 'news_mainpage_query' ) ) ) {
				if ($news_query_cond === 1) {
					$news_query = new WP_Query(array(
						'post_type' => 'post',
						'tax_query' => array(
							array(
								'taxonomy' => 'category',
								'field' => 'slug',
								'terms' => array( 'books' ),
								'operator' => 'NOT IN'
							)
						),
						'posts_per_page' => 4)); 
				} else {
					$news_query = new WP_Query(array(
						'post_type' => 'post',
						'posts_per_page' => 4)); 
				}
			set_transient( 'news_mainpage_query', $news_query, 2592000 );
			} 	

?>

<?php if ( $slider_query->have_posts() ) : while ($slider_query->have_posts()) : $slider_query->the_post(); ?>
		<div class="row" id="photo">
			<div class="small-12 columns">

				<script type="text/javascript">
				    jQuery(document).ready(function() {
				        jQuery.backstretch("<?php echo get_post_meta($post->ID, 'ecpt_slideimage', true); ?>");
				    });
				</script>
				<h5 class="white text-shadow hide-for-small-only" id="caption"><strong><?php the_title(); ?></strong></h5>
			</div>
		</div>
		<?php the_content(); ?>
<?php endwhile; endif; ?>

<!-- Begin main content area -->
<div class="row wrapper radius10" id="page" role="main">
	<div class="small-12 large-8 columns">

	    <?php if ( $news_query->have_posts() ) : ?>
	    	<div class="row">
	    		<div class="small-12 columns">
	    			<div class="panel callout radius10 small-12 columns last">
	            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	                <h4><?php the_title(); ?></h4>
                    <?php the_content(); ?>
                <?php endwhile; endif; ?>
	        </div>
	    		</div>
	    	</div>
	        <div class="row">
	        <h4><?php echo $theme_option['flagship_sub_feed_name']; ?></h4>
	           <?php while ($news_query->have_posts()) : $news_query->the_post(); ?>
	                <div class="small-12 medium-6 columns post-container">
	                    <div class="row">
	                        <div class="small-11 small-centered columns post">
        	                    <a href="<?php the_permalink();?>" title="<?php the_title(); ?>">
            	                    <?php if(has_post_thumbnail()) { ?>
            	                        <div class="row">
            	                            <div class="small-12 columns">
            	                                <?php the_post_thumbnail('rss', array('align'=>'center')); ?>
            	                            </div>
            	                        </div>
                                    <?php } ?>
                                    <div class="row">
                                        <div class="small-12 columns">
                                            <h5><?php the_title(); ?></h5>
                                            <?php the_excerpt(); ?>
                                        </div>
                                    </div>
        	                    </a>
	                        </div>
	                    </div>
	                </div>
	           <?php endwhile; ?>
	        </div>
	        <div class="row">
			    <a href="<?php echo get_permalink( get_option( 'page_for_posts' ) ); ?>"><h5 class="black">View All <?php echo $theme_option['flagship_sub_feed_name']; ?></h5></a>
			</div>
		<?php endif; ?>
	</div>
	<?php locate_template('parts-sidebar.php', true, false); ?>	
</div>
<?php get_footer(); ?>
