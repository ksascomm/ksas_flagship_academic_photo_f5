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
						'posts_per_page' => 3)); 
				} else {
					$news_query = new WP_Query(array(
						'post_type' => 'post',
						'posts_per_page' => 3)); 
				}
			set_transient( 'news_mainpage_query', $news_query, 2592000 );
			} 	

?>

<!-- Set photo background -->
<?php if ( $slider_query->have_posts() ) : while ($slider_query->have_posts()) : $slider_query->the_post(); ?>
		<div class="row" id="photo">
			<div class="small-12 columns">
				<script defer type="text/javascript">
				    jQuery(document).ready(function() {
				        jQuery.backstretch(["<?php echo get_post_meta($post->ID, 'ecpt_slideimage', true); ?>"], {fade: 750});
				    });
				</script>
				<h5 class="white text-shadow hide-for-small-only" id="caption"><strong><?php the_title(); ?></strong></h5>
			</div>
		</div>
		<?php the_content(); ?>
<?php endwhile; endif; ?>

<!-- Begin main content area -->
<div class="row wrapper radius10" id="page" role="main">
	<div class="small-12 columns">
	    <?php if ( $news_query->have_posts() ) : ?>
	    	<div class="row">
	    		<main class="content small-12 columns" itemprop="mainEntity" itemscope="itemscope" itemtype="http://schema.org/Blog">
	            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                    <?php the_content(); ?>
                <?php endwhile; endif; ?>
	    		</main>
	    	</div>
	        <div class="row">
		        <div class="small-12 columns">
		        	<h4><?php echo $theme_option['flagship_sub_feed_name']; ?></h4>
		        </div>
           		<?php while ($news_query->have_posts()) : $news_query->the_post(); ?>
	                <article class="small-12 large-4 columns post-container news-item" aria-labelledby="post-<?php the_ID(); ?>" itemscope="itemscope" itemtype="http://schema.org/BlogPosting" itemprop="blogPost">
	                    <div class="row">
	                        <div class="small-11 small-centered columns post">
        	                    <?php if(has_post_thumbnail()) { ?>
        	                        <div class="row">
        	                            <div class="small-12 columns">
        	                                <?php the_post_thumbnail('rss'); array('class'	=> "floatleft", 'itemprop' => 'image'); ?>
        	                            </div>
        	                        </div>
                                <?php } ?>
                                <div class="row">
                                    <div class="small-12 columns">
                                        <h1 itemprop="headline">
                                        	<a href="<?php the_permalink();?>" title="<?php the_title(); ?>" id="post-<?php the_ID(); ?>"><?php the_title(); ?></a>
                                        </h1>
                                        <meta name="dateModified" itemprop="dateModified" content="<?php the_modified_date(); ?>" />
                                        <div class="entry-content" itemprop="text">	
                                       		<?php the_excerpt(); ?>
                                        </div>
                                    </div>
                                </div>
	                        </div>
	                    </div>
	                </article>
          		<?php endwhile; ?>
	        </div>
	        <div class="row">
			    <h5>
			    	<a href="<?php echo get_permalink( get_option( 'page_for_posts' ) ); ?>">View All <?php echo $theme_option['flagship_sub_feed_name']; ?></a>
			    </h5>
			</div>
		<?php endif; ?>
	</div>
	<?php locate_template('parts-sidebar.php', true, false); ?>	
</div>
<?php get_footer(); ?>