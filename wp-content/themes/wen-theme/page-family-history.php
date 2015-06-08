<?php
/*
 Template Name: Family History
*/

?>

<?php get_header(); ?>

<?php 
	// PAGE INFO
	$history = array();
	// LOOP 1: NORMAL LOOP
	if (have_posts()) : while (have_posts()) : the_post(); 
		$history['title'] = get_the_title();
		$history['sub-title'] = get_field('sub-title');
		$history['time_line'] = get_field('time_line');
		$history['who_what'] = get_field('who_what');
		
	endwhile; 
	endif;
	wp_reset_postdata(); 
	// END LOOP 1: 

	$who_what = $history['who_what'];
	$time_line = $history['time_line'];
?>

			<div id="content">

				<div id="inner-content" class="cf">

					<main id="main" class="m-all t-3of3 d-7of7 cf" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

						<?php 
							// WORK PROJECTS ARRAY TO STORE VAR
							$teamMembers = [];
							// WORK PROJECT POSTS
							$args = array(
								'post_type' => 'team-member'
							);
							// QUERY
							$the_query = new WP_Query( $args );
							
							// LOOP 2: WP QUERY LOOP
							if ($the_query->have_posts()) : while ($the_query->have_posts()) : $the_query->the_post();
								// GET POST THUMBNAIL SRC
								$url_src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID) , 'full' );
								// GET PROJECT FIELDS
								$teamMember = array(
									'title'=>get_the_title(),
									'description'=>get_field('description'),
									'affiliated-projects'=>get_field('affiliated_projects'),
									'image'=>$url_src,
									'email'=>get_field('email'),
									'permalink'=>get_the_permalink(),
									'id'=>$post->ID
								);
								// PUSH PROJECT INTO PROJECTS ARRAY FOR LATER USE
								$teamMembers[] = $teamMember;
						
							endwhile; 
							endif;
							wp_reset_postdata(); 
							// END LOOP 2: WP QUERY LOOP
						?>
						
						<!-- TEAM MEMBERS SLIDER -->
						<div class="gold-line" style="background-image: url(<?php echo get_template_directory_uri(); ?>/library/images/gold-border-bottom.png);"></div>
						<article id="team-members-container" class="team-members-container cf">
							<?php
								// PRINT CUSTOM PROJECTS FUNCTION DECLARED IN FUNCTIONS PHP
								printTeamMemberSlider($teamMembers);
							?>
						</article>

						<!-- CHRONOLOGY & TIMELINE -->
						<div class="gold-line" style="background-image: url(<?php echo get_template_directory_uri(); ?>/library/images/gold-border-bottom.png);"></div>
						<article id="tab-holder" class="cf tab-holder">

							<div id="tabs" class="tabs">
								<nav>
									<ul>
										<li><a href="#section-1" class="btn tab-btn">Who? What?</a></li>
										<li><a href="#section-2" class="btn tab-btn">Chronology</a></li>
									</ul>
								</nav>

								<div class="content">
									<!-- WHO-WHAT -->
									<section id="section-1" class="cf wrap home-content-2 who-what">
											<?php 
												// helper($who_what); 
												foreach ($who_what as $key => $ww) {
													echo '<div class="page-content">';
														echo '<header class="article-header">'.$ww['headline'].'</header>';
														echo $ww['copy'];
													echo '</div>';
												}
											?>
									</section>

									<!-- TIME-LINE -->
									<section id="section-2" class="cf wrap home-content-2 time-line">
										<!-- PAGE FIELDS -->
										<header class="article-header">
											<?php echo '<h1 class="page-title">Chronology</h1>'; ?>
											<?php echo '<h2 class="page-sub-title italic">'.$history['sub-title'].'</h2>'; ?>
										</header>
										<!-- TIME LINE -->
										<?php 
											foreach ($time_line as $key => $tt) {
												echo '<div class="page-content">';
													echo '<header class="article-header">';
														echo '<h4 class="tt-date">'.$tt['date'].'</h2>';
														echo '<h3 class="tt-title">'.$tt['title'].'</h1>';
													echo '</header>';
													echo $tt['description'];
												echo '</div>';
											}
										?>
								</section>
								</div><!-- /content -->

							</div><!-- /tabs -->

						</article>

					</main>

				</div>

			</div>

<?php get_footer(); ?>