<?php
/*
 Template Name: Splash
*/
?>

<?php get_header(); 

// TEAM MEMBERS AND PROJECTS DATA

// POST DATA VARS
$familyMembers = array();

// GET FAMILY MEMBERS AND PROJECTS
$args = array(
  'post_type' => array('family-member'),
  'posts_per_page' => -1
);

$the_query = new WP_Query( $args );

// The Loop
if ( $the_query->have_posts() ) {
	while ( $the_query->have_posts() ) {
		$the_query->the_post();
		// FILTER OUT FAMILY MEMBERS
		$fam = array(
			'title'=>get_the_title(),
			'image'=>get_field('image'),
			'link'=>get_field('link'),
			'permalink'=>get_the_permalink()
		);
		$familyMembers[] = $fam;
	}
}
/* Restore original Post Data */
wp_reset_postdata();

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


?>

			<div id="content" data-transition-delay="1" class="hidden">

				<div id="inner-content" class="cf">

					<main id="main" class="m-all t-3of3 d-7of7 cf" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">
						<!-- HOME PART 1 -->
						<article id="post-<?php the_ID(); ?>-1" class="cf" role="article" itemscope itemtype="http://schema.org/BlogPosting">
							<!-- TRANGLES HEADER BG-->
							 <?php 
								echo '<div class="tri-logo-wrapper splash-bg" style="background-image: url('.get_template_directory_uri().'/library/images/header-bg.png);">';
							 ?>
							
								<!-- ONLY IN PAGE TEMPLATE ON HOME PAGE - ALL OTHERS IN HEADER -->
								<div id="triangle-header">
									<div class="logo-wrapper cf">
										<div id="family-logo" style="background-image: url(<?php echo get_template_directory_uri(); ?>/library/images/family_logo_1x.png);"></div>
										<div id="down-arrow" style="background-image: url(<?php echo get_template_directory_uri(); ?>/library/images/down-arrow.png);"></div>
									</div>
								</div>
								<!-- END HEADER BG -->
								<header class="article-header">
									
									<?php echo '<h2 class="sub-title">'.$sub_title.'</h2>'; ?>
									
									<div class="splash-content-container">
										<div class="dot-border"></div>
										<?php echo '<div class="contact-us">'.$content.'</div>'; ?>
										<div class="dot-border"></div>
									</div>

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
										<h2 class="page-sub-title">Proudly Representing</h2>
										<h2 class="page-sub-title gold-letters">Family Members</h2>
								</header>
								
								<!-- FAMILY MEMBER LIST -->
								<?php 
								echo '<section id="spash-family-member-list-container" class="family-member-list-container cf">'; // START NEWS SECTION
							
									echo '<ul id="splash-family-member-list" class="cf family-member-list">';
										foreach ($familyMembers as $key => $familyMember) {
											$link = $familyMember['permalink']; 
											// IMAGE SRC
											$src = $familyMember['image'];
											// PERMALINK
											$permalink = $familyMember['permalink'];

											// ONLY PRINT FAMILY MEMBER IF THERE IS AN IMAGE ASSOCIATED WITH IT
											if($src['url'] != "") {
												echo '<li id="family-member-'.$key.'" class="cf family-member">';
														echo '<a href="'.$link.'" class="family-member-link" target="_blank">';
															echo '<img src="'.$src['url'].'">';
														echo '</a>';
												echo '</li>';
											}
										}
									echo '</ul>';
								echo '</section>'; // END FAMILY MEMBERS SECTION
								?>
							</article>
							<!-- BOTTOM GOLD LINE -->
							<!-- <div class="gold-line" style="background-image: url(<?php echo get_template_directory_uri(); ?>/library/images/gold-border-bottom.png);"></div> -->
						</div>


					</main>

				</div>

			</div>

<?php get_footer(); ?>