	<aside class="small-12 large-4 columns hide-for-print" id="sidebar"> 
		<!-- Start Featured Image -->

		<?php 
		if ( is_page() && has_post_thumbnail()  ) {  
			wp_reset_query();
				the_post_thumbnail('full', array('class'	=> "offset-gutter radius-topright featured show-for-large-up")); 
			 } 
		 ?>

		<!-- END Featured Image --> 

		<!-- Start Navigation for Sibling Pages -->	

			<?php 
			
				if( is_page() ) { 
					global $post;
				        $ancestors = get_post_ancestors( $post->ID ); // Get the array of ancestors
				        	//Get the top-level page slug for sidebar/widget content conditionals
							$ancestor_id = ($ancestors) ? $ancestors[count($ancestors)-1]: $post->ID;
					        $the_ancestor = get_page( $ancestor_id );
					        $ancestor_slug = $the_ancestor->post_name;

				     //If there are no ancestors display a menu of children
							if (count($ancestors) == 0 && is_front_page() == false || is_page('hammond-society')  ) {
								$page_name = $post->post_title;
								$test_menu = wp_nav_menu( array( 
									'theme_location' => 'main_nav', 
									'menu_class' => 'nav',
									'container_class' => 'offset-gutter',
									'items_wrap' =>  '<div class="radius-topright" id="sidebar_header"><h5 class="white">Also in <span class="grey bold">' . $page_name . '</span></h5></div><ul class="%2$s" role="navigation" aria-label="Sidebar Menu">%3$s</ul>',				
									'submenu' => $page_name,
									'depth' => 1,
									
								));
							if (strpos($test_menu,'<li id') !== false) : echo $test_menu; endif;
						}
				        //If there are one or more display a menu of siblings
							elseif (count($ancestors) >= 1) {
								$parent_page = get_post($post->post_parent);
								$parent_url  = get_permalink($post->post_parent);
								$parent_name = $parent_page->post_title;
							?>
						<!--Below is displayed when on a child page -->	
							<div class="offset-gutter radius-topright" id="sidebar_header">
								<h5 class="white">Also in <a href="<?php echo $parent_url;?>" class="grey bold"><?php echo $parent_name ?></a></h5>
							</div>
							<?php
								wp_nav_menu( array( 
									'theme_location' => 'main_nav', 
									'menu_class' => 'nav', 
									'container_class' => 'offset-gutter',
									'submenu' => $parent_name,
									'items_wrap' => '<ul class="%2$s" role="navigation" aria-label="Sidebar Menu">%3$s</ul>',
									'depth' => 1
								));
							}
			}
			?> 
		<!-- End Navigation for Sibling Pages -->
		<!-- Page Specific Sidebar -->
		<?php if ( is_page() && get_post_meta($post->ID, 'ecpt_page_sidebar', true) ) { ?>
				<div class="ecpt-page-sidebar">
				<?php wp_reset_query(); 
				echo apply_filters('the_content', get_post_meta($post->ID, 'ecpt_page_sidebar', true)); ?>
				</div
			<?php } ?>
		<?php if (is_page_template('template-bb-undergrad.php') ) {
				wp_reset_query(); 
				echo apply_filters('the_content', get_post_meta($post->ID, 'ecpt_page_sidebar', true));
			} ?>
		<!-- END Page Specific Sidebar -->
		
		<!-- Start Widget Content -->
			<?php
			if ( is_front_page() ) {    
				dynamic_sidebar( 'homepage-sb' );

			} elseif ( is_home() ) {    
				dynamic_sidebar( 'archive-sb' );
							
			} elseif ( is_page( 'graduate' ) || $ancestor_slug == 'graduate' ) {    
				dynamic_sidebar( 'graduate-sb' );
			
			} elseif ( is_page( 'research' ) || $ancestor_slug == 'research' ) {    
				dynamic_sidebar( 'research-sb' );
			
			} elseif ( is_page( 'undergraduate' ) || $ancestor_slug == 'undergraduate' ) {    
				dynamic_sidebar( 'undergrad-sb' ); 
			
			
			} else { 
				dynamic_sidebar( 'page-sb' );
			}	
			?>
	
	

		<!-- End Widget Content -->
	</aside> <!-- End Sidebar -->