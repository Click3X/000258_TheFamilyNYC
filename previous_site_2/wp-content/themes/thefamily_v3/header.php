<!doctype html>  



<!--[if IEMobile 7 ]> <html <?php language_attributes(); ?>class="no-js iem7"> <![endif]-->

<!--[if lt IE 7 ]> <html <?php language_attributes(); ?> class="no-js ie6"> <![endif]-->

<!--[if IE 7 ]>    <html <?php language_attributes(); ?> class="no-js ie7"> <![endif]-->

<!--[if IE 8 ]>    <html <?php language_attributes(); ?> class="no-js ie8"> <![endif]-->

<!--[if (gte IE 9)|(gt IEMobile 7)|!(IEMobile)|!(IE)]><!--><html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->

	

	<head>

		<meta charset="utf-8">

		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

		

		<title><?php wp_title('', true, 'right'); ?></title>

		

		<meta name="description" content="">

		<meta name="author" content="">



		<!-- default stylesheet -->

		<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/library/css/default.css">

		

		<!-- icons & favicons -->

		<!-- For iPhone 4 -->

		<link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo get_template_directory_uri(); ?>/library/images/icons/h/apple-touch-icon.png">

		<!-- For iPad 1-->

		<link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo get_template_directory_uri(); ?>/library/images/icons/m/apple-touch-icon.png">

		<!-- For iPhone 3G, iPod Touch and Android -->

		<link rel="apple-touch-icon-precomposed" href="<?php echo get_template_directory_uri(); ?>/library/images/icons/l/apple-touch-icon-precomposed.png">

		<!-- For Nokia -->

		<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/library/images/icons/l/apple-touch-icon.png">

		<!-- For everything else -->

		<link rel="shortcut icon" href="<?php bloginfo('stylesheet_directory'); ?>/favicon.ico" />

		

		<!-- Grab Google CDN's jQuery, with a protocol relative URL; fall back to local if necessary -->

		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>

		<script>window.jQuery || document.write(unescape('%3Cscript src="<?php echo get_template_directory_uri(); ?>/library/js/libs/jquery-1.6.1.min.js"%3E%3C/script%3E'))</script>

		

		<script src="<?php echo get_template_directory_uri(); ?>/library/js/modernizr-2.0.min.js"></script>

		

		<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/library/css/accordion.css"/>

			

		    <!-- ========== IE FIX ========== -->

		    <!--[if IE]><link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/library/css/accordion_ie.css" /><![endif]-->

		

		    <!-- ========== IE6-8 TARGET FALLBACK ========== -->

		    <!--[if (gte IE 6)&(lte IE 8)]>

		    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/library/js/ie-target.js"></script>

		    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/library/js/selectivizr-min.js"></script>

		    <noscript><link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/library/css/accordion.css" /></noscript>

		    <![endif]-->

		

  		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">



<!-- Begin FB Sharing for WP by Chad Von Lind. Get the latest code here: http://vonlind.com/?p=539  -->

<?php

	$thumb = get_post_meta($post->ID,'_thumbnail_id',false);

	$thumb = wp_get_attachment_image_src($thumb[0], false);

	$thumb = $thumb[0];

	$default_img = get_bloginfo('stylesheet_directory').'/images/default_icon.jpg';

 

	?>

 

<?php if(is_single() || is_page()) { ?>

	<meta property="og:type" content="article" />

	<meta property="og:title" content="<?php single_post_title(''); ?>" />

	<meta property="og:description" content="<?php

	while(have_posts()):the_post();

	$out_excerpt = str_replace(array("\r\n", "\r", "\n"), "", get_the_excerpt());

	echo apply_filters('the_excerpt_rss', $out_excerpt);

	endwhile; 	?>" />

	<meta property="og:url" content="<?php the_permalink(); ?>"/>

	<meta property="og:image" content="<?php if ( $thumb[0] == null ) { echo $default_img; } else { echo $thumb; } ?>" />

<?php  } else { ?>

	<meta property="og:type" content="article" />

   <meta property="og:title" content="<?php bloginfo('name'); ?>" />

	<meta property="og:url" content="<?php bloginfo('url'); ?>"/>

	<meta property="og:description" content="<?php bloginfo('description'); ?>" />

    <meta property="og:image" content="<?php  if ( $thumb[0] == null ) { echo $default_img; } else { echo $thumb; } ?>" />

<?php  }  ?>

<!-- End FB Sharing for WP -->

		

		<!-- wordpress head functions -->

		<?php wp_head(); ?>

		<!-- end of wordpress head -->

		

		<!-- stylesheet is called after wp_head so you can overwrite plugin styles if needed -->

		<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">


		<link href="<?php bloginfo('template_directory'); ?>/library/stylesheets/screen.css" media="screen, projection" rel="stylesheet" type="text/css" />
		

	</head>

	

	<body <?php body_class(); ?>>

		<header class="header" role="banner" itemscope="" itemtype="http://schema.org/WPHeader" data-transition-delay="0">
			<div id="inner-header" class="cf">

				<!-- START MAIN MENU -->
				<a id="logo" href="http://thefamilynyc.com" rel="nofollow"><img src="http://thefamilynyc.com/wp-content/themes/wen-theme/library/images/gold_logo.png"></a>
				<a id="hamburger"><img src="http://thefamilynyc.com/wp-content/themes/wen-theme/library/images/hamburger.png"></a>
				<div id="mobile-menu" class="family-navigation mobile-menu">
                    <div class="mobile-menu-inner">
                    	<h2 id="menu-title">MENU</h2>
                    	<div class="dashed-border"></div>

		                <nav role="navigation" itemscope="" itemtype="http://schema.org/SiteNavigationElement">
							<ul id="menu-main-menu" class="nav top-nav cf"><li id="menu-item-7" class="menu-item menu-item-type-post_type menu-item-object-page current-menu-item page_item page-item-6 current_page_item menu-item-7 main-menu-selected"><a href="http://thefamilynyc.com/?page_id=6">Home</a></li>
								<li id="menu-item-14" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-14"><a href="http://thefamilynyc.com/?page_id=13">Work &amp; News</a></li>
								<li id="menu-item-17" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-17"><a href="http://thefamilynyc.com/?page_id=16">Family Members</a></li>
								<li id="menu-item-20" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-20"><a href="http://thefamilynyc.com/?page_id=19">Family History</a></li>
								<li id="menu-item-43" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-43"><a href="http://thefamilynyc.com/?page_id=42">Contact</a></li>
							</ul>							
						</nav>

						<div class="dashed-border"></div>

                        <a id="menu-close"><img src="http://thefamilynyc.com/wp-content/themes/wen-theme/library/images/menu-close.png"></a>
                    </div>
                </div>
                <!-- END MAIN MENU -->
            </div>
		</header>
	

		<div id="container">
