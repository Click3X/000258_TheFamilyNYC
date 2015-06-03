<?php
/*
 Template Name: Team
*/
?>

<?php get_header(); ?>

			<div id="content">

				<div id="inner-content" class="wrap cf">

					<main id="main" class="m-all t-3of3 d-7of7 cf" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

						<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<article id="post-<?php the_ID(); ?>" <?php post_class( 'cf' ); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
								<header class="article-header">
									<h2 class="page-sub-title italic"><?php bloginfo('title'); ?></h2>
									<h1 class="page-title">Team</h1>
								</header>

								<section class="cf" itemprop="articleBody">
									<div class="gold-line outlines" style="background-image: url(http://thefamily.dev/wp-content/themes/wen-theme/library/images/gold-border-bottom.png);"></div>
								</section>

							</article>

						<?php endwhile; else : ?>
						<?php endif; ?>

					</main>

				</div>

			</div>


<?php get_footer(); ?>
