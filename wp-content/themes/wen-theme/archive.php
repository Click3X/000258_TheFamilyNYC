<?php get_header(); ?>

			<div id="content" data-transition-delay="1" class="hidden">

				<div id="inner-content" class="cf">

					<main id="main" class="m-all t-3of3 d-7of7 cf" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

						<header class="article-header">
							<h2 class="page-sub-title italic">The Family</h2>
							<?php the_archive_title( '<h1 class="page-title">', '</h1>' ); ?>
							<a id="work-menu-link" href="#" class="btn sort-by work-menu-link">Sort By</a>
						</header>
						
						<?php 
						// SET UP ARRAY
						$projects = array();

						if (have_posts()) : while (have_posts()) : the_post(); ?>

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

								$projects[] = $project;
								// helper($projects);
							?>

						<?php endwhile; ?>
						<?php endif; ?>

						<article class="cf archive-projects-container">
							<?php 
								if($projects) {
									printProject($projects);
								}
							 ?>
						</article>

					</main>

				</div>

			</div>

<?php get_footer(); ?>