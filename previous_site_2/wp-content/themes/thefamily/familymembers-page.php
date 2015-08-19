<?php
/**
 * Template Name: Family Members
 * A custom page.
 *
 * The "Template Name:" bit above allows this to be selectable
 * from a dropdown menu on the edit page screen.
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */

get_header(); ?>

		<div id="main" class="grid_9 float_left">
			<div id="content" role="main">
			<h1 class="pagetitle">These are the companies we call family.</h1>
			<?php
			/* Run the loop to output the page.
			 * If you want to overload this in a child theme then include a file
			 * called loop-page.php and that will be used instead.
			 */
			 get_template_part( 'loop', 'page' );
			?>
			</div><!-- #content -->
		</div><!-- #container -->

<?php get_footer(); ?>
