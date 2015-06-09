<?php
/*
 Template Name: TEAM MEMBER SINGLE
*/

 get_header(); ?>

			<div id="content">

				<div id="inner-content" class="wrap cf">

					<main id="main" class="m-all t-3of3 d-7of7 cf" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

						<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<?php
								echo '<h1>Team Member</h1>';
							?>

						<?php endwhile; ?>						

						<?php endif; ?>

					</main>

				</div>

			</div>

<?php get_footer(); ?>
