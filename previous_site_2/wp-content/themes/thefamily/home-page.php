<?php
/**
 * Template Name: home Page
 *
 * the home page
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
			<img id="splash" src="wp-content/themes/thefamily/images/familylogo_big.png" />
			<!-- The rotating headline thingy goes here -->
			<?php if (function_exists('dfrads')) { echo dfrads('6888166'); } ?>
		</div>
		
		</div> <!--end content -->
		
		<?php get_footer(); ?>
		