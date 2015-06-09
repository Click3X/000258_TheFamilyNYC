<?php
/*
 Template Name: family member SINGLE
*/

 get_header(); ?>

			<div id="content">

				<div id="inner-content" class="cf">

					<main id="main" class="m-all t-3of3 d-7of7 cf" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

						<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
							<header class="article-header">
								<h2 class="page-sub-title italic"><?php bloginfo('title');?></h2>
								<h1 class="page-title"><?php the_title(); ?></h1>
								<a id="work-menu-link" href="#" class="btn sort-by work-menu-link">Sort By</a>
							</header>

							<?php
								// PROJECTS HOLDER ARRAY
								$projects =array();
								// GET PROJECTS AFFILIATED WITH FAMILY MEMEBR
								$af_projects = get_field('affiliated_projects');

								foreach ($af_projects as $key => $af_project) {
									// GET POST THUMBNAIL SRC
									$url_src = wp_get_attachment_image_src( get_post_thumbnail_id($af_project->ID) , 'full' );
									// STORE POST ID
									$post_id = $af_project->ID;
									// GET PROJECT FIELDS
									$project = array(
										'title'=>$af_project->post_title,
										'client'=>get_field('client', $post_id),
										'featured_project'=>get_field('featured_project', $post_id),
										'video_files'=>get_field('video_files', $post_id),
										'description'=>get_field('description', $post_id),
										'poster'=>$url_src[0],
										'id'=>$post_id
									);
									// STORE PROJECT IN PROJECTS ARRAY
									$projects[] = $project;
								}

								// PRINT CUSTOM PROJECTS FUNCTION DECLARED IN FUNCTIONS PHP
								printProject($projects);

							?>

						<?php endwhile; ?>						

						<?php endif; ?>

					</main>

				</div>

			</div>

<?php get_footer(); ?>