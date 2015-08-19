<?php
/*
Template Name: Family Fridge
*/
?>

<?php get_header(); ?>
			
			<div id="content" class="clearfix">
			
				<div id="main" class="col940 clearfix" role="main">

					<?php $my_query = new WP_Query('post_type="family_fridge&posts_per_page=1');
					  while ($my_query->have_posts()) : $my_query->the_post();
					  $do_not_duplicate[] = $post->ID ?>				    
					 
					 <h1><?php the_title(); ?></h1>
					 <?php the_content(); ?>
					 				  
					<?php endwhile;?>
					
					
			
				</div> <!-- end #main -->
    <p><a href="http://www.thefamilynyc.com/home/?custom_cat=family-fridge">View all posts from the Fridge</a></p>
				
    
			</div> <!-- end #content -->

<?php get_footer(); ?>