<?php get_header(); ?>

			<div id="content" data-transition-delay="1" class="hidden">

				<div id="inner-content" class="cf">

					<main id="main" class="m-all t-3of3 d-7of7 cf" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">
						<!-- TITLE -->
						<header class="article-header">
							<h2 class="page-sub-title italic">The Family</h2>
							<!-- <h1 class="page-title">News</h1> -->
							<h1 class="page-title"><?php the_title(); ?></h1>
						</header>

						<!-- TOP GOLD LINE -->
						<div class="gold-line" style="background-image: url(<?php echo get_template_directory_uri(); ?>/library/images/gold-border-bottom.png);"></div>

						<div class="cf news-list">
							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

								<?php

									// GET POST THUMBNAIL SRC
									$url_src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID) , 'full' );
									// FILTER OUT FAMILY MEMBERS
									$news = array(
										'title'=>get_the_title(),
										'image'=>$url_src,
										'excerpt'=>get_the_excerpt(),
										'content'=>get_the_content(),
										'link'=>get_the_permalink(),
										'id'=>$post->ID
									);

									$youtube_link;
									if( get_field('youtube_link') ) {
										$youtube_link = get_field('youtube_link');
									}

									if( get_field('description') ) {
										$news['content'] = get_field('description');
									}

									$video_files;
									if(	get_field('video_files') ) {
										$video_files = get_field('video_files');
										if($video_files[0]['file'] != '') {
											$news['video_files'] = $video_files;
											$news['poster'] = $url_src[0];
										}
									}

									// helper($news);

									echo '<article id="news-'.$post->ID.'" class="cf news">';

										echo '<div class="center-table">';
											// IMAGE / VIDEO
											if( isset($youtube_link) ) {
												echo '<div class="vid-container">';
													echo '<div class="responsive-container">';
														echo '<iframe src="'.$youtube_link.'" frameborder="0" allowfullscreen></iframe>';
													echo '</div>';
													// GOLD LINE
												echo '<div class="gold-line" style="background-image: url(http://thefamily.dev/wp-content/themes/wen-theme/library/images/gold-border-bottom.png);"></div>';
												echo '</div>';
											} else if( isset($news['video_files']) ) {
												// VIDEO
												echo '<div class="video-container">';
													echo '<video poster="'.$news['poster'].'" preload="none" >';
														if($news['mp4']) { echo '<source src="'.$news['mp4'].'" type="video/mp4" />'; }
														if($news['ogg']) { echo '<source src="'.$news['ogg'].'" type="video/ogg" />'; }
														if($news['webm']) { echo '<source src="'.$news['webm'].'" type="video/webm" />'; }
													echo '</video>';
														// GOLD LINE
												echo '<div class="gold-line" style="background-image: url(http://thefamily.dev/wp-content/themes/wen-theme/library/images/gold-border-bottom.png);"></div>';
												echo '</div>';
												// END VIDEO

											} else if($news['image'][0]) {
												echo '<div class="img-container">';
													echo '<div class="responsive-container">';
														echo '<img src="'.$news['image'][0].'">';
														'</div>';
												echo '</div>';
											}


											// TEXT
											echo '<div class="txt-container">';

												echo '<div class="txt-wrapper">';
													// NEWS - FAMILY
													// echo '<h2 class="page-sub-title italic">The Family</h2>';'
													echo '<h1 class="page-title">'.$news['title'].'</h1>';
													// CONTENT
													echo '<p class="excerpt content">'.$news['content'].'</p>';
												echo '</div>';
											echo '</div>';

										echo '</div>'; // CLOSE PROJET TABLE CONTAINER

									echo '</article>';

								?>

							<?php endwhile; ?>						

							<?php endif; ?>

						</div>

					</main>

				</div>

			</div>

<?php get_footer(); ?>
