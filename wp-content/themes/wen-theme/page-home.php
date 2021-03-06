<?php
/*
 Template Name: Home
 *
 * This is your custom page template. You can create as many of these as you need.
 * Simply name is "page-whatever.php" and in add the "Template Name" title at the
 * top, the same way it is here.
 *
 * When you create your page, you can just select the template and viola, you have
 * a custom page template to call your very own. Your mother would be so proud.
 *
 * For more info: http://codex.wordpress.org/Page_Templates
*/
?>

<?php get_header(); 

// TEAM MEMBERS AND PROJECTS DATA

// POST DATA VARS
$teamMembers = array();
$familyMembers = array();
$projects = array();
$featuredProjects = array();
$newss = array();

// GET FAMILY MEMBERS AND PROJECTS
$args = array(
  'post_type' => array('family-member', 'project', 'team-member', 'post'),
  'posts_per_page' => -1
);

$the_query = new WP_Query( $args );


// The Loop
if ( $the_query->have_posts() ) {
	while ( $the_query->have_posts() ) {
		$the_query->the_post();
		if($post->post_type == 'team-member') {
			// PUT POST IN TEAM MEMBER ARRAY
			$teamMembers[] = $post;
		} elseif($post->post_type == 'family-member' ) {
			// FILTER OUT FAMILY MEMBERS
			$fam = array(
				'title'=>get_the_title(),
				'image'=>get_field('image'),
				'link'=>get_field('link'),
				'permalink'=>get_the_permalink()
			);
			$familyMembers[] = $fam;

		// NEWS POSTS
		} elseif($post->post_type == 'post' ) {
			// GET POST THUMBNAIL SRC
			$url_src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID) , 'full' );

			// FILTER OUT FAMILY MEMBERS
			$news = array(
				'title'=>get_the_title(),
				'image'=>$url_src,
				'excerpt'=>get_the_excerpt(),
				'description'=>'<p>'.get_the_excerpt().'</p>',
				'content'=>get_the_content(),
				'link'=>get_the_permalink(),
				'featured_project'=>get_field('featured_project'),
				'video_files'=>get_field('video_files'),
				'poster'=>$url_src[0],
				'id'=>$post->ID,
				'link-through'=>get_field('link-through')
			);

			if( get_field('youtube_link') ) {
				$link = get_field('youtube_link');
				$news['youtube_link'] = $link;
			}

			// $newss[] = $news;
			// helper($news);
			// ADD TO FEATURED PROJECTS ARRAY IF PROJECT FEATURED CHECKBOX IS CHECKED
			// if( $news['featured_project'][0] == 'Featured' ) {
			if( $news['featured_project']) {
				$featuredProjects[] = $news;
			} else {
				// ONLY OUTPUT 'NOT FEATURED' POSTS IN NEWS ARRAY
				$newss[] = $news;				
			}
		}
	}
}
/* Restore original Post Data */
wp_reset_postdata();

// helper($featuredProjects);

// VARS WE WANT FROM HOME PAGE
$sub_title = "";
$content = "";
// STANDARD LOOP for HOME PAGE FIELDS
if (have_posts()) : while (have_posts()) : the_post(); 
	$sub_title = get_field('sub-title');
	$content = get_the_content();
endwhile;
endif;
/* Restore original Post Data */
wp_reset_postdata();

// WHILE PARALLAX IS IN WORKS, ONLY SHOW PARALLAX IF ON LOCAL CPU
$server = $_SERVER['REMOTE_ADDR'];

?>

			<div id="content" data-transition-delay="1" class="hidden">

				<div id="inner-content" class="cf">

					<main id="main" class="m-all t-3of3 d-7of7 cf" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

						<?php 
							// if($server == '127.0.0.1') {
								include('php/tri-header-png.php');
							// }
						?>
						<!-- HOME PART 1 -->
						<article id="post-<?php the_ID(); ?>-1" class="cf" role="article" itemscope itemtype="http://schema.org/BlogPosting">
							<!-- TRANGLES HEADER BG-->
							 <?php 
								echo '<div id="tri-logo-wrapper" class="tri-logo-wrapper">';
							 ?>
								<!-- ONLY IN PAGE TEMPLATE ON HOME PAGE - ALL OTHERS IN HEADER -->
								<div id="triangle-header">
									<div id="family-logo-holder" data-type="content" data-speed="-2" class="logo-wrapper cf">
										<div id="family-logo" style="background-image: url(<?php echo get_template_directory_uri(); ?>/library/images/family_logo_1x.png);"></div>
										<div id="down-arrow" style="background-image: url(<?php echo get_template_directory_uri(); ?>/library/images/down-arrow.png);"></div>
									</div>
								</div>
								<!-- END HEADER BG -->
								<header class="article-header">
									<?php echo '<h2 class="sub-title">'.$sub_title.'</h2>'; ?>
									<a href="#post-6-2" class="btn learn-more">Learn More</a>
								</header>
							</div>
							<!-- END HEADER BG -->
						</article>


						<!-- FAMILY MEMBERS -->
						<div class="family-members-container">
							<!-- TOP GOLD LINE -->
							<div class="gold-line" style="background-image: url(<?php echo get_template_directory_uri(); ?>/library/images/gold-border-bottom.png);"></div>
							<article id="family-members" class="cs wrap family-members" role="article" itemscope itemtype="http://schema.org/BlogPosting">
								<!-- TITLE -->
								<header class="article-header">
										<h2 class="page-sub-title italic">Family</h2>
										<h1 class="page-title">Members</h1>
								</header>
								<!-- FAMILY MEMBER LIST -->
								<?php
									usort($familyMembers, 'compareByName');
									printFamilyMembers($familyMembers); 
								?>
							</article>
							<!-- BOTTOM GOLD LINE -->
							<div class="gold-line" style="background-image: url(<?php echo get_template_directory_uri(); ?>/library/images/gold-border-bottom.png);"></div>
						</div>


						<!-- HOME PART 2 -->
						<article id="post-<?php the_ID(); ?>-2" class="cf home-content-2" role="article" itemscope itemtype="http://schema.org/BlogPosting">
							<header class="article-header wrap">
								<?php echo '<div class="page-content">'.$content.'</div>'; ?>
								<a href="<?php echo get_the_permalink(19);?>" class="btn learn-more">Learn More</a>
							</header>
						</article>


						<!-- NEWS -->
						<!-- FAMILY MEMBERS -->
						<div class="news-container">
							<!-- TOP GOLD LINE -->
							<div class="gold-line" style="background-image: url(<?php echo get_template_directory_uri(); ?>/library/images/gold-border-bottom.png);"></div>
							<article id="news" class="cf wrap news" role="article" itemscope itemtype="http://schema.org/BlogPosting">
								<h2 class="page-sub-title italic work-news-title">Work &amp; News</h2>
								<!-- NEWS LIST -->
								<?php printNews($newss); ?>
							</article>
							<!-- BOTTOM GOLD LINE -->
							<div class="gold-line" style="background-image: url(<?php echo get_template_directory_uri(); ?>/library/images/gold-border-bottom.png);"></div>
						</div>

						<article id="featured-posts" class="cf warp featured-posts" role="article" itemscope itemtype="http://schema.org/BlogPosting">
							<header class="article-header">
									<h2 class="page-sub-title italic">Featured</h2>
									<h1 class="page-title">Posts</h1>
							</header>

							<section id="projects-list" class="projects-list cf" itemprop="articleBody">
								<?php printNewProject($featuredProjects); ?>
							</section>
						</article>

					</main>

				</div>

			</div>

<?php get_footer(); ?>