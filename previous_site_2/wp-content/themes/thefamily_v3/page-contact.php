<?php
/*
Template Name: Contact Page
*/
?>

<?php get_header(); ?>
			
			<div id="content" class="clearfix">
			
				<div id="main" class="col664 clearfix" role="main">
				
				<div id="contact">
				<h1>Address</h1>
				<br />
				<p>54 West 21st Street, Room 508<br /> NYC, NY 10010<br />Tel: 212 477 4278<br /> </p>
				<br /><br />
				<a href="https://www.facebook.com/pages/The-Family-NYC/317279850808" target="_blank"><div id="facebook-big"><p class="hidetext">Like us on Facebook!</p></div>
				</a>
				<a href="http://twitter.com/#!/thefamilynyc" target="_blank"><div id="twitter-big"><p class="hidetext">Follow us on Twitter</p></div>
				</a>
				<a href="<?php bloginfo('rss2_url'); ?>" target="_blank"><div id="rss-big"><p class="hidetext">Subscribe to our RSS Feed!</p></div>
				</a>
				</div>

				<div id="contactpost" class="clearfix">
					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					
					<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?>>
											
						<section class="post_content">
							<?php the_content(); ?>
					
						</section> <!-- end article section -->
						
						<footer>
			
							<p class="clearfix"><?php the_tags('<span class="tags">Tags: ', ', ', '</span>'); ?></p>
							
						</footer> <!-- end article footer -->
					
					</article> <!-- end article -->
				
					
					<?php endwhile; ?>	
					
					<?php else : ?>
					
					<article id="post-not-found">
					    <header>
					    	<h1>Not Found</h1>
					    </header>
					    <section class="post_content">
					    	<p>Sorry, but the requested resource was not found on this site.</p>
					    </section>
					    <footer>
					    </footer>
					</article>
					
					<?php endif; ?>
			</div>
			
				</div> <!-- end #main -->
    
				<div id="family">
				<h1>The Family</h1>
				<br />
				<p id="name">Diane Patrone</p>
				<p id="tite">SISTER</p>
				<p><span class="green">T: </span> 212.477.4278</p>
				<p><a href="mailto:diane@thefamilynyc.com">diane@thefamilynyc.com</a></p>
				</br>
				<p id="name">Anna Rotholz</p>
				<p id="tite">SISTER</p>
				<p><span class="green">T: </span> 212.477.4278</p>
				<p><a href="mailto:anna@thefamilynyc.com">anna@thefamilynyc.com</a></p>
				</br>
				<p id="name">Emily Friendship</p>
				<p id="tite">STEP SISTER</p>
				<p><span class="green">T: </span> 212.477.4278</p>
				<p><a href="mailto:emily@thefamilynyc.com">emily@thefamilynyc.com</a></p>
                                </br>
				<p id="name">Alexa Tupler</p>
				<p id="tite">LITTLE SISTER</p>
				<p><span class="green">T: </span> 212.477.4278</p>
				<p><a href="mailto:alexa@thefamilynyc.com">alexa@thefamilynyc.com</a></p>



    
			</div> <!-- end #content -->

<?php get_footer(); ?>