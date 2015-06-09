<!doctype html>

<!--[if lt IE 7]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 lt-ie7"><![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->

	<head>
		<meta charset="utf-8">

		<?php // force Internet Explorer to use the latest rendering engine available ?>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">

		<title><?php wp_title(''); ?></title>

		<?php // mobile meta (hooray!) ?>
		<meta name="HandheldFriendly" content="True">
		<meta name="MobileOptimized" content="320">
		<meta name="viewport" content="width=device-width, initial-scale=1"/>

		<?php // icons & favicons (for more: http://www.jonathantneal.com/blog/understand-the-favicon/) ?>
		<link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/library/images/apple-touch-icon.png">
		<!-- 
		<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicon.png">
		<link rel="apple-touch-icon" sizes="57x57" href="/apple-touch-icon-57x57.png"> 
		-->
		<link rel="apple-touch-icon" sizes="60x60" href="/apple-touch-icon-60x60.png">
		<link rel="icon" type="image/png" href="/favicon-32x32.png" sizes="32x32">
		<link rel="icon" type="image/png" href="/favicon-16x16.png" sizes="16x16">
		<link rel="manifest" href="/manifest.json">
		<meta name="msapplication-TileColor" content="#da532c">
		<meta name="theme-color" content="#ffffff">

		<!--[if IE]>
			<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">
		<![endif]-->
		<?php // or, set /favicon.ico for IE10 win ?>
		<meta name="msapplication-TileColor" content="#f01d4f">
		<meta name="msapplication-TileImage" content="<?php echo get_template_directory_uri(); ?>/library/images/win8-tile-icon.png">
            <meta name="theme-color" content="#121212">

		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

		<?php // wordpress head functions ?>
		<?php wp_head(); ?>
		<?php // end of wordpress head ?>

		<?php // drop Google Analytics Here ?>
		<?php // end analytics ?>
		
	</head>

	<body <?php body_class(); ?> itemscope itemtype="http://schema.org/WebPage" id="<?php echo $post->post_name; ?>">

		<div id="container">

			<!-- HEADER IS FIXED -->
			<header class="header" role="banner" itemscope itemtype="http://schema.org/WPHeader">
				<div id="inner-header" class="cf">

					<!-- START MAIN MENU -->
					<a id="logo" href="<?php echo home_url(); ?>" rel="nofollow"><img src="<?php echo get_template_directory_uri(); ?>/library/images/gold_logo.png"></a>
					<a id="hamburger"><img src="<?php echo get_template_directory_uri(); ?>/library/images/hamburger.png"></a>
					<div id="mobile-menu" class="family-navigation mobile-menu">
	                    <div class="mobile-menu-inner">
	                    	<h2 id="menu-title">MENU</h2>
	                    	<div class="dashed-border"></div>

			                <nav role="navigation" itemscope itemtype="http://schema.org/SiteNavigationElement">
								<?php wp_nav_menu(array(
		    					         'container' => false,                           // remove nav container
		    					         'container_class' => 'menu cf',                 // class of container (should you choose to use it)
		    					         'menu' => __( 'The Main Menu', 'bonestheme' ),  // nav name
		    					         'menu_class' => 'nav top-nav cf',               // adding custom nav class
		    					         'theme_location' => 'main-nav',                 // where it's located in the theme
		    					         'before' => '',                                 // before the menu
		        			               'after' => '',                                  // after the menu
		        			               'link_before' => '',                            // before each link
		        			               'link_after' => '',                             // after each link
		        			               'depth' => 0,                                   // limit the depth of the nav
		    					         'fallback_cb' => ''                             // fallback function (if there is one)
								)); ?>
							</nav>

							<div class="dashed-border"></div>

	                        <a id="menu-close"><img src="<?php echo get_template_directory_uri(); ?>/library/images/menu-close.png"></a>
	                    </div>
	                </div>
	                <!-- END MAIN MENU -->

	                <!-- // SORTING MENU -->
	                <!-- ONLY APPEARS ON WORK & NEWS PAGE & FAMILY MEMBER PATE & ARCHIVE-->
	                <?php if( is_page(13) || is_singular('family-member') || is_archive() ) { ?>
	                <div id="work-menu" class="family-navigation mobile-menu work-menu">
	                    <div class="mobile-menu-inner">
	                    	
	                    	<header class="article-header">
									<h2 class="page-sub-title italic">The Family</h2>
									<h1 class="page-title">Work &amp; News</h1>
									<h3 class="sort-title">Sort</h3>
									<div class="client-wrap"><img src="//localhost:3000/wp-content/themes/wen-theme/library/images/by.png" class="by"></div>
							</header>

			                <nav role="navigation" itemscope itemtype="http://schema.org/SiteNavigationElement">
								<?php wp_nav_menu(array(
		    					         'container' => false,                           // remove nav container
		    					         'container_class' => 'menu cf work-menu-container',                 // class of container (should you choose to use it)
		    					         'menu' => __( 'Footer Links', 'bonestheme' ),  // nav name
		    					         'menu_class' => 'nav cf',               // adding custom nav class
		    					         'theme_location' => 'footer-links',                 // where it's located in the theme
		    					         'before' => '',                                 // before the menu
		        			               'after' => '',                                  // after the menu
		        			               'link_before' => '',                            // before each link
		        			               'link_after' => '',                             // after each link
		        			               'depth' => 0,                                   // limit the depth of the nav
		    					         'fallback_cb' => ''                             // fallback function (if there is one)
								)); ?>
							</nav>
	                        <a id="work-menu-close"><img src="<?php echo get_template_directory_uri(); ?>/library/images/menu-close.png"></a>
	                    </div>
	                </div>
	                <!-- END SORTING MENU -->
	                <?php } ?>
				</div>
			</header><!--  END FIXED HEADER -->

			<!-- ONLY PRINT HEADER IF NOT HOME PAGE -->
			<?php if(!is_page(6)) { ?>
				<!-- TRANGLES HEADER BG-->
				<div id="triangle-header" style="background-image: url(<?php echo get_template_directory_uri(); ?>/library/images/header-bg.png);">
					<div class="logo-wrapper cf">
						<div id="family-logo" style="background-image: url(<?php echo get_template_directory_uri(); ?>/library/images/family_logo_1x.png);"></div>
						<div id="down-arrow" style="background-image: url(<?php echo get_template_directory_uri(); ?>/library/images/down-arrow.png);"></div>
					</div>
				</div>
			<?php } ?>