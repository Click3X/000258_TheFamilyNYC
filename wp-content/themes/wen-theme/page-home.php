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
$pKey = 0;
$tmKey = 0;
$fmKey = 0;

// POST DATA VARS
$teamMembers = [];
$projects = [];
// $partners = [];
$familyMembers = [];


// GET FAMILY MEMBERS AND PROJECTS
$args = array(
  'post_type' => array('family-member', 'project', 'team-member'),
  'posts_per_page' => -1
);

$the_query = new WP_Query( $args );

// The Loop
if ( $the_query->have_posts() ) {
	while ( $the_query->have_posts() ) {
		$the_query->the_post();
		if($post->post_type == 'team-member') {
			$teamMembers[$tmKey] = $post;
			$tmKey++;
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
			$pKey++;
		} elseif($post->post_type == 'family-member' ) {
			$fam = $post;
			$familyMembers[] = $fam;
			$fmKey++;
		}
	}
}
/* Restore original Post Data */
wp_reset_postdata();

// OUR VARS
helper($familyMembers);
helper($teamMembers);
helper($projects);


?>

			<div id="content">

				<div id="inner-content" class="wrap cf">

					<main id="main" class="m-all t-3of3 d-7of7 cf" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

						<article id="post-<?php the_ID(); ?>" <?php post_class( 'cf' ); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

						</article>

						<article id="featured-posts" class="cs featured-posts" role="article" itemscope itemtype="http://schema.org/BlogPosting">

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