<?php
/*
 Template Name: Contact
*/

?>

<?php get_header(); ?>

			<div id="content">

				<div id="inner-content" class="cf">

					<main id="main" class="m-all t-3of3 d-7of7 cf" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

						<?php 
							// PAGE INFO
							// LOOP 1: NORMAL LOOP
							if (have_posts()) : while (have_posts()) : the_post(); ?>
								<header class="article-header">
										<h2 class="page-sub-title italic"><?php bloginfo('title');?></h2>
										<h1 class="page-title">Team</h1>
								</header>
						<?php 
							endwhile; 
							endif;
							wp_reset_postdata(); 
							// END LOOP 1: 
						?>

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

							// helper($teamMembers);
							// PRINT CUSTOM PROJECTS FUNCTION DECLARED IN FUNCTIONS PHP
							printTemaMembers($teamMembers);
						?>

					</main>

				</div>

			</div>

<?php get_footer(); ?>