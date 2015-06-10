<?php
/*
 Template Name: About
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

<?php get_header(); 

	$sub_title = get_field('sub-title'); ?>

			<div id="content" data-transition-delay="1" class="hidden">

				<div id="inner-content" class="wrap cf">

					<main id="main" class="m-all cf" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

						<div class="tabs-container">
							<a class="btn history-tab">WHO? WHAT?</a>
							<a class="btn history-tab">CHRONOLOGY</a>
						</div>


						<?php

						// check if the repeater field has rows of data
						if( have_rows('who_what') ):

						 	// loop through the rows of data
						    while ( have_rows('who_what') ) : the_row();

						        // display a sub field value
						        the_sub_field('headline'); ?>
						        <div class="dashed-border"></div>

						        <div class="copy-container">
						        <?php the_sub_field('copy'); ?>
						        </div>

						    <?php endwhile;

						else :

						    // no rows found

						endif; ?>




					</main>

				</div>

			</div>


<?php get_footer(); ?>
