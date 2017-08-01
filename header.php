<!doctype html>
<html class="no-js" lang="en">
<head>
  	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="date" content="<?php the_modified_date(); ?>" />
	<title><?php create_page_title(); ?></title>
	<link rel="shortcut icon" href="<?php echo get_template_directory_uri() ?>/assets/images/favicon.ico" />
	<link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo get_template_directory_uri() ?>/assets/images/apple-touch-icon-144x144-precomposed.png" />
	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo get_template_directory_uri() ?>/assets/images/apple-touch-icon-114x114-precomposed.png" />
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo get_template_directory_uri() ?>/assets/images/apple-touch-icon-72x72-precomposed.png" />
	<link rel="apple-touch-icon-precomposed" href="<?php echo get_template_directory_uri() ?>/assets/images/apple-touch-icon-57x57-precomposed.png" />
  
  <!-- CSS Files: All pages -->
  <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/assets/stylesheets/app.min.css">
	<!-- Make IE a modern browser -->
	<!--[if IE]>
		<script src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script>
		<script src="https://cdn.jsdelivr.net/css3-mediaqueries/0.1/css3-mediaqueries.min.js"></script>
	<![endif]-->
  	<!--[if lt IE 11]>
		<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri() ?>/assets/css/app.ie.css">
		<div data-alert class="alert-box alert">
		<?php _e('You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.'); ?>	
		</div>		
	<![endif]-->
  <!-- CSS Files: Conditionals -->
  <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri() ?>/style.min.css">

  <?php wp_enqueue_script('jquery'); ?> 
  <?php wp_head(); ?>


  <?php include_once("analytics.php"); ?>

</head>
<?php $theme_option = flagship_sub_get_global_options(); $color_scheme = $theme_option['flagship_sub_color_scheme']; global $blog_id; $site_id = 'site-' . $blog_id; ?>
<body <?php body_class($color_scheme . ' ' . $site_id); ?> itemscope="itemscope" itemtype="http://schema.org/WebPage">
	<header itemscope="itemscope" itemtype="http://schema.org/WPHeader" role="banner">
	<a href="#page" class="skipLink">Skip to main content</a>
	<div class="print-only">
		<img src="<?php echo get_template_directory_uri() ?>/assets/images/krieger.small.horizontal.blue.jpg" alt="krieger logo">
		<h1><?php echo get_bloginfo ( 'description' ); ?> <?php echo get_bloginfo( 'title' ); ?></h1>
	</div>
	   <div id="mobile-nav" class="hide-on-print">
			<div class="row">
				<div class="small-12 large-4 columns centered">
					<?php if ($blog_id == 79)  : ?>
						<div class="mobile-logo centered"><a href="http://jhu.edu"><img src="<?php echo get_template_directory_uri() ?>/assets/images/jhu-horizontal.png" alt="jhu logo"></a>
					<?php else : ?> 
						<div class="mobile-logo centered"><a href="<?php echo network_site_url(); ?>"><img src="<?php echo get_template_directory_uri() ?>/assets/images/ksas-logo-horizontal.png" alt="krieger logo"></a>
					<?php endif; ?>	
						<h1 itemprop="headline"><a class="white" href="<?php echo site_url(); ?>"><?php echo get_bloginfo( 'title' ); ?></a></h1>
					</div>
				</div>
			</div>
		</div>
		
		<div id="desktop-nav" class="hide-on-print">
			<?php get_template_part( '/parts/offcanvas' ); ?>
			<div class="row" id="department">
				<div class="medium-12 columns" id="logo_nav">
					<div class="medium-3 columns">
						<li class="logo"><a href="<?php echo network_home_url(); ?>" title="Krieger School of Arts & Sciences"><img src="<?php echo get_template_directory_uri() ?>/assets/images/ksas-logo.png" alt="jhu logo"></a></li>
					</div>
					<div class="medium-9 columns">
						<h1 itemprop="headline">
							<a class="white" href="<?php echo site_url(); ?>">
								<?php if( !empty( get_bloginfo('description') )) : ?>
										<span class="small" itemprop="description"><?php echo get_bloginfo ( 'description' ); ?></span>
								<?php endif; ?>
								<?php echo get_bloginfo( 'title' ); ?>
							</a>
						</h1>
					</div>			
				</div>
			</div>
			<div class="row" aria-label="Main Menu" id="main_nav" itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement" role="navigation">
				<?php wp_nav_menu( array( 
					'theme_location' => 'main_nav', 
					'menu_class' => 'nav-bar', 
					'fallback_cb' => 'foundation_page_menu',
					'walker' => new foundation_navigation(),
					'depth' => 2  )); ?> 
			</div>
		</div>
	</header>