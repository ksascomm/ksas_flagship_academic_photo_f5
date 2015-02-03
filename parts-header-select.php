	<div class="row hide-for-print program">
	<div class="medium-3 columns">	
		<select id="program_switch">
			<option>Select Program &#9662;</option>
			<option value="<?php echo $home_url; ?>">Department Home</option>
			<option value="http://www.jhu.edu/~biophys/">Biophysics Department</option>
			<option value="http://www.chemistry.jhu.edu/">Chemistry Department</option>
			<option value="http://www.ciwemb.edu/">Carnegie Institution</option>
			<option value="http://www.training.nih.gov/">NIH</option>
		</select>
	</div>
	<div class="medium-9 columns">
			<?php wp_nav_menu( array( 
				'theme_location' => 'main_nav', 
				'menu_class' => 'nav-bar', 
				'container' => 'nav',
				'container_id' => 'main_nav', 
				//'container_class' => 'small-12 columns',
				'fallback_cb' => 'foundation_page_menu',
				'walker' => new foundation_navigation(),
				'depth' => 2  )); ?> 
	</div>
	</div>