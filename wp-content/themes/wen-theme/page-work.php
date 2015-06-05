<?php
/*
 Template Name: Work
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
										<h1 class="page-title"><?php the_title(); ?></h1>
										<a id="sort-by" href="#" class="btn sort-by">Sort By</a>
								</header>
						<?php 
							endwhile; 
							endif;
							wp_reset_postdata(); 
							// END LOOP 1: 
						?>

						<?php 
							// WORK PROJECTS ARRAY TO STORE VAR
							$projects = [];
							// WORK PROJECT POSTS
							$args = array(
								'post_type' => 'project'
							);
							// QUERY
							$the_query = new WP_Query( $args );
							
							// LOOP 2: WP QUERY LOOP
							if ($the_query->have_posts()) : while ($the_query->have_posts()) : $the_query->the_post();
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
								// PUSH PROJECT INTO PROJECTS ARRAY FOR LATER USE
								$projects[] = $project;
						
							endwhile; 
							endif;
							wp_reset_postdata(); 
							// END LOOP 2: WP QUERY LOOP

							// PRINT CUSTOM PROJECTS FUNCTION DECLARED IN FUNCTIONS PHP
							printProject($projects);
						?>

					</main>

				</div>

			</div>

<?php get_footer(); ?>