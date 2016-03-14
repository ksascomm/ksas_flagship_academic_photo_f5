<!doctype html>
<html class="no-js" lang="en">
<head>
  	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title><?php wp_title('|', true, 'right'); ?><?php bloginfo('name'); ?></title>
	<link rel="shortcut icon" href="<?php echo get_template_directory_uri() ?>/assets/images/favicon.ico" />
	<link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo get_template_directory_uri() ?>/assets/images/apple-touch-icon-144x144-precomposed.png" />
	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo get_template_directory_uri() ?>/assets/images/apple-touch-icon-114x114-precomposed.png" />
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo get_template_directory_uri() ?>/assets/images/apple-touch-icon-72x72-precomposed.png" />
	<link rel="apple-touch-icon-precomposed" href="<?php echo get_template_directory_uri() ?>/assets/images/apple-touch-icon-57x57-precomposed.png" />
  
  <!-- CSS Files: All pages -->
  <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/assets/stylesheets/app.css">
    <!-- IE Fix for HTML5 Tags -->
    <!--[if lt IE 10]>
        <script async src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
        <script async src="http://ie7-js.googlecode.com/svn/version/2.1(beta4)/IE9.js"></script>
        <script async src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
        <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri() ?>/assets/stylesheets/app.ie.css">
    <![endif]-->
  <!-- CSS Files: Conditionals -->
  <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri() ?>/style.css">

  <!-- Modernizr and Jquery Script -->
  <script src="<?php echo get_template_directory_uri() ?>/assets/js/vendor/modernizr-min.js"></script>
  <?php wp_enqueue_script('jquery'); ?> 
  <?php wp_head(); ?>
  <?php include_once("parts-analytics.php"); ?>
</head>
<?php $theme_option = flagship_sub_get_global_options(); $color_scheme = $theme_option['flagship_sub_color_scheme']; global $blog_id; $site_id = 'site-' . $blog_id; ?>
<body <?php body_class($color_scheme . ' ' . $site_id); ?> onLoad="viewport()">
	<header>
	   <div id="mobile-nav">
			<div class="row">
				<div class="small-12 large-4 columns centered">
					<div class="mobile-logo centered"><a href="<?php echo network_site_url(); ?>"><img src="<?php echo get_template_directory_uri() ?>/assets/images/ksas-logo-horizontal.png" alt="jhu logo"></a>
						<h1><a class="white" href="<?php echo site_url(); ?>"><?php echo get_bloginfo( 'title' ); ?></a></h1>
					</div>
				</div>
			</div>
			<div class="row hide-for-print">
				<?php get_template_part( 'parts', 'search-mobile' ); ?>
			</div>
		</div>
		
		<div id="desktop-nav">
			<?php get_template_part( 'parts', 'offcanvas' ); ?>
			<div class="row" id="department">
				<div class="medium-12 columns" id="logo_nav">
					<div class="medium-3 columns">
						<li class="logo"><a href="<?php echo network_home_url(); ?>" title="Krieger School of Arts & Sciences"><img src="<?php echo get_template_directory_uri() ?>/assets/images/ksas-logo.png" alt="jhu logo"></a></li>
					</div>
					<div class="medium-9 columns">
						<h1><a class="white" href="<?php echo site_url(); ?>"><span class="small"><?php echo get_bloginfo ( 'description' ); ?></span><?php echo get_bloginfo( 'title' ); ?></a></h1>
					</div>			
				</div>
			</div>
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
		</div>
	</header>