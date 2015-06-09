<?php get_header(); ?>

			<div id="content">

				<div id="inner-content" class="cf">


					<main id="main" class="m-all t-3of3 d-7of7 cf" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">
						
						<!-- TOP GOLD LINE -->
						<div class="gold-line" style="background-image: url(<?php echo get_template_directory_uri(); ?>/library/images/gold-border-bottom.png);"></div>

						<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<?php
								// GET POST THUMBNAIL SRC
								$url_src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID) , 'full' );
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

								echo '<article id="project-'.$project['id'].'" class="cf project">';

									echo '<div class="center-table">';
										// IMAGE / VIDEO
										echo '<div class="img-container">';
											echo '<div class="img-wrapper">';
												// VIDEO
													// NEW VIDEO WRAPPER
												echo '<div class="video-container">';
													echo '<video poster="'.$project['poster'].'" preload="none" >';
														if($project['mp4']) { echo '<source src="'.$project['mp4'].'" type="video/mp4" />'; }
														if($project['ogg']) { echo '<source src="'.$project['ogg'].'" type="video/ogg" />'; }
														if($project['webm']) { echo '<source src="'.$project['webm'].'" type="video/webm" />'; }
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

									echo '</div>'; // CLOSE PROJET TABLE CONTAINER

								echo '</article>';
							?>

						<?php endwhile; ?>						

						<?php endif; ?>

					</main>

				</div>

			</div>

<?php get_footer(); ?>
