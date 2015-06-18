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
		} elseif($post->post_type == 'project') {
			$project = $post;
			// GET POST THUMBNAIL SRC
			$url_src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID) , 'full' );
			// FILTER OUT ONLY FEATURED PROJECTS
			if( get_field('featured_project') ) {
				// GET PROJECT FIELDS
				$project = array(
					'title'=>get_the_title(),
					'client'=>get_field('client'),
					'featured_project'=>get_field('featured_project'),
					'video_files'=>get_field('video_files'),
					'description'=>get_field('description'),
					'poster'=>$url_src[0],
					'id'=>$post->ID
				);
				// PUSH PROJECT INTO PROJECTS ARRAY FOR LATER USE
				$projects[] = $project;
			}	
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
				'content'=>get_the_content(),
				'link'=>get_the_permalink()
			);
			$newss[] = $news;
		}
	}
}
/* Restore original Post Data */
wp_reset_postdata();

// VARS WE WANT FROM HOME PAGE
$sub_title = "";
$content = "";
// STANDARD LOOP for HOME PAGE FIELDS
if (have_posts()) : while (have_posts()) : the_post(); 
	// $partners = get_field('partners');
	$sub_title = get_field('sub-title');
	$content = get_the_content();
endwhile;
endif;
/* Restore original Post Data */
wp_reset_postdata();


?>

			<div id="content" data-transition-delay="1" class="hidden">

				<div id="inner-content" class="cf">

					<main id="main" class="m-all t-3of3 d-7of7 cf" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">
						<!-- HOME PART 1 -->
						<article id="post-<?php the_ID(); ?>-1" class="cf" role="article" itemscope itemtype="http://schema.org/BlogPosting">
							<!-- TRANGLES HEADER BG-->
							<div class="tri-logo-wrapper" style="background-image: url(<?php echo get_template_directory_uri(); ?>/library/images/header-bg.png);">
							<!-- <div id="tri-logo-wrapper" class="tri-logo-wrapper"> -->
								<!-- ONLY IN PAGE TEMPLATE ON HOME PAGE - ALL OTHERS IN HEADER -->
								<div id="triangle-header">

									<?php // include('library/svg/gold.php'); ?>

									<div class="logo-wrapper cf">
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
								<?php printFamilyMembers($familyMembers); ?>
							</article>
							<!-- BOTTOM GOLD LINE -->
							<div class="gold-line" style="background-image: url(<?php echo get_template_directory_uri(); ?>/library/images/gold-border-bottom.png);"></div>
						</div>


						<!-- HOME PART 2 -->
						<article id="post-<?php the_ID(); ?>-2" class="cf wrap home-content-2" role="article" itemscope itemtype="http://schema.org/BlogPosting">
							<header class="article-header">
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
								<?php printProject($projects); ?>
							</section>
						</article>

					</main>

				</div>

			</div>

<?php get_footer(); ?>