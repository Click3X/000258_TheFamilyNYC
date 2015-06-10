<?php
/*
Author: Eddie Machado
URL: http://themble.com/bones/

This is where you can drop your custom functions or
just edit things like thumbnail sizes, header images,
sidebars, comments, etc.
*/

// LOAD BONES CORE (if you remove this, the theme will break)
require_once( 'library/bones.php' );

// CUSTOMIZE THE WORDPRESS ADMIN (off by default)
// require_once( 'library/admin.php' );

/*********************
LAUNCH BONES
Let's get everything up and running.
*********************/

function bones_ahoy() {

  //Allow editor style.
  add_editor_style( get_stylesheet_directory_uri() . '/library/css/editor-style.css' );

  // let's get language support going, if you need it
  load_theme_textdomain( 'bonestheme', get_template_directory() . '/library/translation' );

  // USE THIS TEMPLATE TO CREATE CUSTOM POST TYPES EASILY
  require_once( 'library/custom-post-type.php' );

  // launching operation cleanup
  add_action( 'init', 'bones_head_cleanup' );
  // A better title
  add_filter( 'wp_title', 'rw_title', 10, 3 );
  // remove WP version from RSS
  add_filter( 'the_generator', 'bones_rss_version' );
  // remove pesky injected css for recent comments widget
  add_filter( 'wp_head', 'bones_remove_wp_widget_recent_comments_style', 1 );
  // clean up comment styles in the head
  add_action( 'wp_head', 'bones_remove_recent_comments_style', 1 );
  // clean up gallery output in wp
  add_filter( 'gallery_style', 'bones_gallery_style' );

  // enqueue base scripts and styles
  add_action( 'wp_enqueue_scripts', 'bones_scripts_and_styles', 999 );
  // ie conditional wrapper

  // launching this stuff after theme setup
  bones_theme_support();

  // adding sidebars to Wordpress (these are created in functions.php)
  add_action( 'widgets_init', 'bones_register_sidebars' );

  // cleaning up random code around images
  add_filter( 'the_content', 'bones_filter_ptags_on_images' );
  // cleaning up excerpt
  add_filter( 'excerpt_more', 'bones_excerpt_more' );

} /* end bones ahoy */

// let's get this party started
add_action( 'after_setup_theme', 'bones_ahoy' );


/************* OEMBED SIZE OPTIONS *************/

if ( ! isset( $content_width ) ) {
	$content_width = 680;
}

/************* THUMBNAIL SIZE OPTIONS *************/

// Thumbnail sizes
add_image_size( 'bones-thumb-600', 600, 150, true );
add_image_size( 'bones-thumb-300', 300, 100, true );

/*
to add more sizes, simply copy a line from above
and change the dimensions & name. As long as you
upload a "featured image" as large as the biggest
set width or height, all the other sizes will be
auto-cropped.

To call a different size, simply change the text
inside the thumbnail function.

For example, to call the 300 x 100 sized image,
we would use the function:
<?php the_post_thumbnail( 'bones-thumb-300' ); ?>
for the 600 x 150 image:
<?php the_post_thumbnail( 'bones-thumb-600' ); ?>

You can change the names and dimensions to whatever
you like. Enjoy!
*/

add_filter( 'image_size_names_choose', 'bones_custom_image_sizes' );

function bones_custom_image_sizes( $sizes ) {
	return array_merge( $sizes, array(
		'bones-thumb-600' => __('600px by 150px'),
		'bones-thumb-300' => __('300px by 100px'),
	) );
}

/*
The function above adds the ability to use the dropdown menu to select
the new images sizes you have just created from within the media manager
when you add media to your content blocks. If you add more image sizes,
duplicate one of the lines in the array and name it according to your
new image size.
*/

/************* THEME CUSTOMIZE *********************/

/* 
  A good tutorial for creating your own Sections, Controls and Settings:
  http://code.tutsplus.com/series/a-guide-to-the-wordpress-theme-customizer--wp-33722
  
  Good articles on modifying the default options:
  http://natko.com/changing-default-wordpress-theme-customization-api-sections/
  http://code.tutsplus.com/tutorials/digging-into-the-theme-customizer-components--wp-27162
  
  To do:
  - Create a js for the postmessage transport method
  - Create some sanitize functions to sanitize inputs
  - Create some boilerplate Sections, Controls and Settings
*/

function bones_theme_customizer($wp_customize) {
  // $wp_customize calls go here.
  //
  // Uncomment the below lines to remove the default customize sections 

  // $wp_customize->remove_section('title_tagline');
  // $wp_customize->remove_section('colors');
  // $wp_customize->remove_section('background_image');
  // $wp_customize->remove_section('static_front_page');
  // $wp_customize->remove_section('nav');

  // Uncomment the below lines to remove the default controls
  // $wp_customize->remove_control('blogdescription');
  
  // Uncomment the following to change the default section titles
  // $wp_customize->get_section('colors')->title = __( 'Theme Colors' );
  // $wp_customize->get_section('background_image')->title = __( 'Images' );
}

add_action( 'customize_register', 'bones_theme_customizer' );

/************* ACTIVE SIDEBARS ********************/

// Sidebars & Widgetizes Areas
function bones_register_sidebars() {
	register_sidebar(array(
		'id' => 'sidebar1',
		'name' => __( 'Sidebar 1', 'bonestheme' ),
		'description' => __( 'The first (primary) sidebar.', 'bonestheme' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));

	/*
	to add more sidebars or widgetized areas, just copy
	and edit the above sidebar code. In order to call
	your new sidebar just use the following code:

	Just change the name to whatever your new
	sidebar's id is, for example:

	register_sidebar(array(
		'id' => 'sidebar2',
		'name' => __( 'Sidebar 2', 'bonestheme' ),
		'description' => __( 'The second (secondary) sidebar.', 'bonestheme' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));

	To call the sidebar in your template, you can just copy
	the sidebar.php file and rename it to your sidebar's name.
	So using the above example, it would be:
	sidebar-sidebar2.php

	*/
} // don't remove this bracket!


/************* COMMENT LAYOUT *********************/

// Comment Layout
function bones_comments( $comment, $args, $depth ) {
   $GLOBALS['comment'] = $comment; ?>
  <div id="comment-<?php comment_ID(); ?>" <?php comment_class('cf'); ?>>
	<article  class="cf">
	  <header class="comment-author vcard">
		<?php
		/*
		  this is the new responsive optimized comment image. It used the new HTML5 data-attribute to display comment gravatars on larger screens only. What this means is that on larger posts, mobile sites don't have a ton of requests for comment images. This makes load time incredibly fast! If you'd like to change it back, just replace it with the regular wordpress gravatar call:
		  echo get_avatar($comment,$size='32',$default='<path_to_url>' );
		*/
		?>
		<?php // custom gravatar call ?>
		<?php
		  // create variable
		  $bgauthemail = get_comment_author_email();
		?>
		<img data-gravatar="http://www.gravatar.com/avatar/<?php echo md5( $bgauthemail ); ?>?s=40" class="load-gravatar avatar avatar-48 photo" height="40" width="40" src="<?php echo get_template_directory_uri(); ?>/library/images/nothing.gif" />
		<?php // end custom gravatar call ?>
		<?php printf(__( '<cite class="fn">%1$s</cite> %2$s', 'bonestheme' ), get_comment_author_link(), edit_comment_link(__( '(Edit)', 'bonestheme' ),'  ','') ) ?>
		<time datetime="<?php echo comment_time('Y-m-j'); ?>"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><?php comment_time(__( 'F jS, Y', 'bonestheme' )); ?> </a></time>

	  </header>
	  <?php if ($comment->comment_approved == '0') : ?>
		<div class="alert alert-info">
		  <p><?php _e( 'Your comment is awaiting moderation.', 'bonestheme' ) ?></p>
		</div>
	  <?php endif; ?>
	  <section class="comment_content cf">
		<?php comment_text() ?>
	  </section>
	  <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
	</article>
  <?php // </li> is added by WordPress automatically ?>
<?php
} // don't remove this bracket!


/*
This is a modification of a function found in the
twentythirteen theme where we can declare some
external fonts. If you're using Google Fonts, you
can replace these fonts, change it in your scss files
and be up and running in seconds.
*/
function bones_fonts() {
  wp_enqueue_style('googleFonts', 'http://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic');
}

// add_action('wp_enqueue_scripts', 'bones_fonts');


// CHARLES FUNCTIONS
// CHARLES HELPER FUNCTIONS
function helper($var) {
  $type = gettype ( $var );
  echo '<h2>Var is type: '.$type.'.</h2>';

  if($type == 'array') {
	echo '<pre>'.print_r($var).'</pre>';  
  } elseif($type == 'object') {
	echo '<pre>'.var_dump($var).'</pre>';  
  } elseif( ($type == "string") || ($type == "integer") ) {
	echo '<h2>'.$var.'</h2>';
  }
  
}

// Wen Clean String format
function cleanString($string){
  $search = '/[^[:alpha:]]/';
  $space = array("?","!",",",";", " ");
  $replace = '-';
  $newString = str_replace($search, $replace, $string);
  $newString = strtolower($newString);
  $newString = str_replace($space, $replace, $newString);

  return $newString;

}

// ADD PROJECTS CUSTOM POST TYPE TO ARCHIVE.PHP
function namespace_add_custom_types( $query ) {
  if( is_category() || is_tag() && empty( $query->query_vars['suppress_filters'] ) ) {
    $query->set( 'post_type', array(
     'post', 'nav_menu_item', 'project'
		));
	  return $query;
	}
}
add_filter( 'pre_get_posts', 'namespace_add_custom_types' );


// PROJECTS FUNCXTION - PASS IN AN ARRAY OF PROJECTS
function printProject($projects) {
	echo '<ul id="project-list" class="cf projects-list">';

	foreach ($projects as $key => $project) {
		// GET PROJECT VIDEO FIELDS
		$video_source = $project['video_files'];

		if($video_source) {
			// FOR EACH OF THE FOLLOWING VIDEO TYPES, MAKE A NEW PROJECT ARRAY KEY AND STORE THE VALUE
			foreach ($video_source as $vidKey => $source) {
		        if( $source['file']['mime_type'] == 'video/mp4' ) { $project['mp4'] = $source['file']['url']; }
		        if( $source['file']['mime_type'] == 'video/ogg' ) { $project['ogg'] = $source['file']['url']; }
		        if( $source['file']['mime_type'] == 'video/webm' ) { $project['webm'] = $source['file']['url']; }
		    }
		}

		// helper($project);

		// OUTPUT PROJECT
		echo '<li id="project-'.$project['id'].'" class="cf project">';
			echo '<div class="center-table">';
			// MODOLU TESTING IS FOR FRONT-END 'CHECKERED LOOK'
			if($key % 2 != 0) {
				// IMAGE / VIDEO
				echo '<div class="img-container">';
					echo '<div class="img-wrapper">';
						// VIDEO
						echo '<div class="video-container">';
							echo '<video poster="'.$project['poster'].'" preload="none" >';
								if( isset($project['mp4']) ) { echo '<source src="'.$project['mp4'].'" type="video/mp4" />'; }
								if( isset($project['ogg']) ) { echo '<source src="'.$project['ogg'].'" type="video/ogg" />'; }
								if( isset($project['webm']) ) { echo '<source src="'.$project['webm'].'" type="video/webm" />'; }
							echo '</video>';
						echo '</div>';
						// END VIDEO
					echo '</div>';
				echo '</div>';

				// TEXT
				echo '<div class="txt-container">';
					echo '<div class="txt-wrapper">';
						echo '<h1 class="p-title">'.$project['title'].'</h1>';
						echo '<div class="client-wrap"><img src="'.get_bloginfo("template_url").'/library/images/by.png" class="by"><h2 class="p-client">'.$project['client'].'</h2></div>';
						echo $project['description'];
					echo '</div>';
				echo '</div>';
			} else {
				// TEXT
				echo '<div class="txt-container">';
					echo '<div class="txt-wrapper">';
						echo '<h1 class="p-title">'.$project['title'].'</h1>';
						echo '<div class="client-wrap"><img src="'.get_bloginfo("template_url").'/library/images/by.png" class="by"><h2 class="p-client">'.$project['client'].'</h2></div>';
						echo $project['description'];
					echo '</div>';
				echo '</div>';

				// IMAGE / VIDEO
				echo '<div class="img-container">';
					echo '<div class="img-wrapper">';
						// VIDEO
						echo '<div class="video-container">';
							echo '<video poster="'.$project['poster'].'" preload="none" >';
								if( isset($project['mp4']) ) { echo '<source src="'.$project['mp4'].'" type="video/mp4" />'; }
								if( isset($project['ogg']) ) { echo '<source src="'.$project['ogg'].'" type="video/ogg" />'; }
								if( isset($project['webm']) ) { echo '<source src="'.$project['webm'].'" type="video/webm" />'; }
							echo '</video>';
						echo '</div>';
						// END VIDEO
					echo '</div>';
				echo '</div>';
			}
			echo '</div>';
		echo '</li>';
	}
	echo '</ul>';
}

// TEAM MEMBERS
function printTemaMembers($teamMembers) {
	echo '<section class="team-member-list-container cf">'; // START TEAM MEMBERS SECTION
		echo '<ul id="team-member-list" class="cf team-member-list">';
				foreach ($teamMembers as $key => $teamMember) {
					// TITLE
					$title = cleanString($teamMember['title']);

					// OUTPUT PROJECT
					echo '<li id="team-member-'.$teamMember['id'].'" class="cf team-member">';
						echo '<!-- TOP GOLD LINE -->
							<div class="gold-line" style="background-image: url('.get_template_directory_uri().'/library/images/gold-border-bottom.png);"></div>';
						echo '<div class="center-table wrap">';
							// MODOLU TESTING IS FOR FRONT-END 'CHECKERED LOOK'
							if($key % 2 != 0) {
								// IMAGE
								echo '<div class="img-container">';
									echo '<div class="img-wrapper">';
										echo '<img src="'.$teamMember['image'][0].'">';
									echo '</div>';
								echo '</div>';

								// TEXT
								echo '<div class="txt-container">';
									echo '<div class="txt-wrapper">';
										echo '<h1 class="p-title">'.$teamMember['title'].'</h1>';
										echo $teamMember['description'];
										echo '<a href="mailto:'.$teamMember['email'].'" class="team-member-email">'.$teamMember['email'].'</a>';
									echo '</div>';
								echo '</div>';
							} else {
								// TEXT
								echo '<div class="txt-container">';
									echo '<div class="txt-wrapper">';
										echo '<h1 class="p-title">'.$teamMember['title'].'</h1>';
										echo $teamMember['description'];
										echo '<a href="mailto:'.$teamMember['email'].'" class="team-member-email">'.$teamMember['email'].'</a>';
									echo '</div>';
								echo '</div>';

								// IMAGE
								echo '<div class="img-container">';
									echo '<div class="img-wrapper">';
										echo '<img src="'.$teamMember['image'][0].'">';
									echo '</div>';
								echo '</div>';
							}
						echo '</div>';
					echo '</li>';
				}
		echo '</ul>';
	echo '</section>'; // END TEAM MEMBERS SECTION
}


// FAMILY MEMBERS
function printFamilyMembers($familyMembers) {
	echo '<section id="family-member-list-container" class="family-member-list-container cf swiper-container">'; // START NEWS SECTION
		echo '<a href="#" class="arrow arrow-left"></a>';
		echo '<ul id="family-member-list" class="cf family-member-list swiper-wrapper">';
			foreach ($familyMembers as $key => $familyMember) {
				// IF NO LINK SUPPLIED, THEN HREF IS HASH #
				if($familyMember['link'] == '') { $link = '#'; } 
					else { $link = $familyMember['link']; }
				// IMAGE SRC
				$src = $familyMember['image'];
				// PERMALINK
				$permalink = $familyMember['permalink'];

				// ONLY PRINT FAMILY MEMBER IF THERE IS AN IMAGE ASSOCIATED WITH IT
				if($src['url'] != "") {
					echo '<li id="family-member-'.$key.'" class="cf family-member swiper-slide">';
							// echo '<a href="'.$link.'" class="family-member-link">';
							echo '<a href="'.$permalink.'" class="family-member-link">';
								echo '<img src="'.$src['url'].'">';
							echo '</a>';
					echo '</li>';
				}
			}
		echo '</ul>';
		echo '<a href="#" class="arrow arrow-right"></a>';
	echo '</section>'; // END FAMILY MEMBERS SECTION
}

// NEWS MODULE
function printNews($newss) {
	echo '<section id="news-container" class="news-list-container cf swiper-container">'; // START NEWS SECTION
		echo '<a href="#" class="arrow arrow-left"></a>';
		echo '<ul id="news-list" class="cf news-list swiper-wrapper">';
		foreach ($newss as $key => $news) {
			// OUTPUT news
			echo '<li id="news-'.$key.'" class="cf news swiper-slide">';
				echo '<div class="center-table">';
					// IMAGE
					echo '<div class="img-container">';
						echo '<img src="'.$news['image'][0].'">';
					echo '</div>';

					// TEXT
					echo '<div class="txt-container">';
						echo '<div class="txt-wrapper">';
							// NEWS - FAMILY
							echo '<h2 class="page-sub-title italic">The Family</h2>
									<h1 class="page-title">News</h1>';
							// CONTENT
							echo '<p class="excerpt">'.$news['excerpt'].'</p>';
							// BUTTON
							echo '<a href="'.$news['link'].'" class="btn news-link">Learn More</a>';
						echo '</div>';
					echo '</div>';
				echo '</div>';
			echo '</li>';
		}
		echo '</ul>';
		echo '<a href="#" class="arrow arrow-right"></a>';
		// echo '<a href="#" class="swiper-button-next"></a>';
	echo '</section>'; // END NEWS SECITION
}


// -TEAM MEMBER SLIDER FOR TEAM HISTORY PAGE
function printTeamMemberSlider($teamMembers) {
	echo '<section id="team-member-list-container" class="team-member-list-container wrap cf swiper-container">'; // START NEWS SECTION
		echo '<a href="#" class="arrow arrow-left"></a>';
		echo '<ul id="team-member-list-slider" class="cf news-list team-member-list swiper-wrapper">';
		foreach ($teamMembers as $key => $teamMember) {
			// OUTPUT news
			echo '<li id="tm-'.$key.'" class="cf news tm swiper-slide">';
				echo '<div class="center-table">';
					// IMAGE
					echo '<div class="img-container">';
						echo '<img src="'.$teamMember['image'][0].'">';
					echo '</div>';

					// TEXT
					echo '<div class="txt-container">';
						echo '<div class="txt-wrapper">';
							// NEWS - FAMILY
							echo '<h2 class="page-sub-title italic">The Family</h2>
									<h1 class="page-title">Team</h1>';
							// CONTENT
							echo $teamMember['description'];
							// EMAIL
							echo '<a href="mailto:'.$teamMember['email'].'" class="team-member-email">'.$teamMember['email'].'</a>';

						echo '</div>';
					echo '</div>';
				echo '</div>';
			echo '</li>';
		}
		echo '</ul>';
		echo '<a href="#" class="arrow arrow-right"></a>';
	echo '</section>'; // END NEWS SECITION
}

// // -TEAM MEMBER SLIDER FOR TEAM HISTORY PAGE
// function printTeamMemberSlider($teamMembers) {
// 	echo '<section class="team-member-list-container wrap cf">'; // START NEWS SECTION
// 		echo '<a href="#" class="arrow arrow-left"></a>';
// 		echo '<ul id="team-member-list-slider" class="cf news-list team-member-list">';
// 		foreach ($teamMembers as $key => $teamMember) {
// 			// OUTPUT news
// 			echo '<li id="tm-'.$key.'" class="cf news tm">';
// 				echo '<div class="center-table">';
// 					// IMAGE
// 					echo '<div class="img-container">';
// 						echo '<img src="'.$teamMember['image'][0].'">';
// 					echo '</div>';

// 					// TEXT
// 					echo '<div class="txt-container">';
// 						echo '<div class="txt-wrapper">';
// 							// NEWS - FAMILY
// 							echo '<h2 class="page-sub-title italic">The Family</h2>
// 									<h1 class="page-title">Team</h1>';
// 							// CONTENT
// 							echo $teamMember['description'];
// 							// EMAIL
// 							echo '<a href="mailto:'.$teamMember['email'].'" class="team-member-email">'.$teamMember['email'].'</a>';

// 						echo '</div>';
// 					echo '</div>';
// 				echo '</div>';
// 			echo '</li>';
// 		}
// 		echo '</ul>';
// 		echo '<a href="#" class="arrow arrow-right"></a>';
// 	echo '</section>'; // END NEWS SECITION
// }

/* DON'T DELETE THIS CLOSING TAG */ ?>