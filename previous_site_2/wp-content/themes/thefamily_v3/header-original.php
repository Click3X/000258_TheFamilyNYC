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

		

	</head>

	

	<body <?php body_class(); ?>>

	

		<div id="container">

			

			<header role="banner">

			

				<div id="inner-header" class="clearfix">

				

					<p id="logo" class="h1"><a href="<?php echo home_url(); ?>" rel="nofollow"><img src="wp-content/themes/thefamily_v2/library/images/familylogo.png" /></a></p>

					

					<p id="contactinfo">54 West 21st Street, Room 508, NYC, NY 10010<br />Tel: 212 477 4278</p>

					</div><!-- end inner header -->

					

					<nav role="navigation">
                    	<?php wp_nav_menu( array('menu' => 'navigation', 'container_class' => 'menu' )); ?>
						<?php //bones_main_nav(); ?>
					</nav>

				<div id="rightheader">

					<div id="searchfield">

					<form method="get" id="searchform" action="<?php bloginfo('home'); ?>/">

					<div><input type="submit" value="Search" id="searchbtn" /><input type="text" size="10" value="<?php echo wp_specialchars($s, 1); ?>" name="s" id="s" />

					</div>

					</form>

					</div> <!-- end search form -->

		

		<div id="socialmedia">

			<a id="facebook" href="http://www.facebook.com/pages/The-Family-NYC/317279850808"></a>

			<a id="twitter" href="http://twitter.com/#!/thefamilynyc"></a>

			<a id="rss" href="<?php bloginfo('rss2_url'); ?>"></a>

		</div>

		</div>

			</header> <!-- end header -->

