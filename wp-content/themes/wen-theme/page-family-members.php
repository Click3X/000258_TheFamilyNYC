<?php
/*
 Template Name: Family Members
*/
?>

<?php get_header(); ?>

<?php
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

		$fam = array(
			'title'=>get_the_title(),
			'image'=>get_field('image'),
			'link'=>get_field('link'),
			'permalink'=>get_the_permalink(),
			'affiliated-projects' => get_field('affiliated_projects')
		);
		$familyMembers[] = $fam;

	}
}
/* Restore original Post Data */
wp_reset_postdata();

// helper($familyMembers);

?>


			<div id="content" data-transition-delay="1" class="hidden">

				<div id="inner-content" class="cf">

					<main id="main" class="m-all t-3of3 d-7of7 cf" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">
							<!-- TITLE -->
							<header class="article-header">
									<h2 class="page-sub-title italic">Family</h2>
									<h1 class="page-title">Members</h1>
							</header>
						<!-- FAMILY MEMBERS -->
						<div class="family-members-container">
							<!-- TOP GOLD LINE -->
							<div class="gold-line" style="background-image: url(<?php echo get_template_directory_uri(); ?>/library/images/gold-border-bottom.png);"></div>
							<article id="family-members" class="cs wrap family-members" role="article" itemscope itemtype="http://schema.org/BlogPosting">
								<!-- FAMILY MEMBER LIST -->
								<?php 
								usort($familyMembers, 'compareByName');

								echo '<section id="family-member-list-container" class="family-member-list-container cf">'; // START NEWS SECTION
	
									echo '<ul id="family-member-list" class="cf family-member-list">';
										foreach ($familyMembers as $key => $familyMember) {
											// IF NO LINK SUPPLIED, THEN HREF IS HASH #
											if($familyMember['link'] == '') { $link = $familyMember['permalink']; } 
												else { $link = $familyMember['link']; }
											// IMAGE SRC
											$src = $familyMember['image'];
											// PERMALINK
											$permalink = $familyMember['permalink'];

											// ONLY PRINT FAMILY MEMBER IF THERE IS AN IMAGE ASSOCIATED WITH IT
											if($src['url'] != "") {
												echo '<li id="family-member-'.$key.'" class="cf family-member">';
														echo '<a href="'.$link.'" class="family-member-link" target="_blank">';
															echo '<img src="'.$src['url'].'" style="max-width:'.$src['width'].'px; max-height:'.$src['height'].'px;">';
														echo '</a>';
												echo '</li>';
											}
										}
									echo '</ul>';
								echo '</section>'; // END FAMILY MEMBERS SECTION
								?>
							</article>
						</div>

					</main>

				</div>

			</div>


<?php get_footer(); ?>
