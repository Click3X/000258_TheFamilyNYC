<?php
/*
 Template Name: TEAM MEMBER SINGLE
*/

 get_header(); ?>

			<div id="content" data-transition-delay="1" class="hidden">

				<div id="inner-content" class="wrap cf">

					<main id="main" class="m-all t-3of3 d-7of7 cf" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">
						<!-- TITLE -->
						<header class="article-header">
							<h2 class="page-sub-title italic">Family</h2>
							<h1 class="page-title">Team Member</h1>
						</header>

						<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
							
							<?php
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
							?>

							<?php
							echo '<div id="team-member-list-slider" class="cf news-list team-member-list swiper-wrapper">';
								// echo '<h1>Team Member</h1>';
								echo '<div class="cf news tm swiper-slide">';
									echo '<div class="center-table">';
										// IMAGE
										echo '<div class="img-container">';
											echo '<img src="'.$teamMember['image'][0].'">';
										echo '</div>';

										// TEXT
										echo '<div class="txt-container">';
											echo '<div class="txt-wrapper">';
												// NEWS - FAMILY
												echo '<h2 class="page-sub-title italic">Team</h2>
														<h1 class="page-title">'.$teamMember['title'].'</h1>';
												// CONTENT
												echo $teamMember['description'];
												// EMAIL
												echo '<a href="mailto:'.$teamMember['email'].'" class="team-member-email">'.$teamMember['email'].'</a>';

											echo '</div>';
										echo '</div>';
									echo '</div>';
								echo '</div>';
							echo '</div>';
							?>

						<?php endwhile; ?>						

						<?php endif; ?>

					</main>

				</div>

			</div>

<?php get_footer(); ?>
