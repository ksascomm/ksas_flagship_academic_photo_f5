<div class="row hide-for-print">
			<?php wp_nav_menu( array( 
				'theme_location' => 'main_nav', 
				'menu_class' => 'nav-bar', 
				'container' => 'nav',
				'container_id' => 'main_nav', 
				'container_class' => 'small-12 columns',
				'fallback_cb' => 'foundation_page_menu',
				'walker' => new foundation_navigation(),
				'depth' => 2  )); ?> 
		</div>