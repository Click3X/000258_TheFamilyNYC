<?php get_header(); ?>
			
			<div id="indexcontent" class="clearfix">
			
				<div id="slideshow"><?php $my_query = new WP_Query('post_type="large_video');
				  while ($my_query->have_posts()) : $my_query->the_post();
				  $do_not_duplicate[] = $post->ID ?>				    
				 <?php the_content(); ?>
				 <p><?php the_title(); ?></p>				  
				<?php endwhile;?></div>
				
				<div id="othervideos">
				  <?php $my_query = new WP_Query('category_name=featured&posts_per_page=3');
				    while ($my_query->have_posts()) : $my_query->the_post();
				    $do_not_duplicate[] = $post->ID ?>				    
				    <div class="spot">
				    	<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('grid-spot-image');?></a>
				    	<p><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></p>
				    </div>
				    
				  <?php endwhile;?>
				</div>
				
				<div id="main" class="col664 clearfix" role="main">
					<div id="about">
					<h1>Welcome to The Family</h1>
					<h2>Thanks for stopping by our virtual home. We're happy you’re here. Think of our online abode as a happy, fun, comfortable place to kick back with a (cyber) beer and take a break from your frantic travels along the information superhighway. Our house is your house. Come on in and put your feet up. 
					<br /><br /><a href="http://www.thefamilynyc.com/home/?page_id=52">Read More...</a></h2>
					</div>
				<h1>The Family Fridge</h1>
					<h2>The Family Fridge is traditionally a place where any accomplishment, big or small, gets hung proudly.  A good report card?  Stick it up on the fridge!  A mention in the school paper?  Put it on the fridge!  A kindergarten finger-painting that may (or may not) look something like a flower?  Fridge for sure.</h2>
					
					<h2>It's the same with our Family Fridge.  Except ours is virtual. </h2> 
					
					<h2>Here we highlight proof of a Family Member’s awesomeness.  Who gets to go up on our Fridge?  Maybe a specific talent, company, Brother or Sister, or whomever we feel is making leaps and bounds in their creative and/or personal pursuits.  Check it regularly to see whose work we have hanging up.<br /><br /><a href="http://www.thefamilynyc.com/home/?page_id=14">Visit the Fridge!</a></h2>
			
				</div> <!-- end #main -->
    
				<div id="familymembers">
				<h1>Family Members</h1>
				
				<p><a class="boldlink" href="http://www.backyard.com" target="_blank"><img src="wp-content/themes/thefamily_v2/library/images/familymembers/backyard_logo.jpg" alt="Backyard"/></a></p>
				
				<br />
				<p><a class="boldlink" href="http://www.believemedia.com" target="_blank"><img src="wp-content/themes/thefamily_v2/library/images/familymembers/believe.jpg" alt="Believe Media"/></a></p>
				<br />
				<!--<p><a class="boldlink" href="http://blackiris.tv/" target="_blank"><img src="wp-content/themes/thefamily_v2/library/images/familymembers/blackiris.jpg" alt="Black Iris Music"/></a></p>
				<br />-->
				<!--<p><a class="boldlink" href="http://www.huntergatherer.net" target="_blank"><img src="wp-content/themes/thefamily_v2/library/images/familymembers/hg.jpg" alt="HunterGatherer"/></a></p>
				
				<br />-->
				<p><a class="boldlink" href="http://www.imaginaryforces.com" target="_blank"><img  src="wp-content/themes/thefamily_v2/library/images/familymembers/if.jpg" alt="Imaginary Forces"/></a></p>
				<br />
                <p><a class="boldlink" href="http://boxerfilms.net" target="_blank"><img  src="wp-content/themes/thefamily_v2/library/images/familymembers/boxer.jpg" alt="Boxer FIlms"/></a></p>
				<br />
				<p><a class="boldlink" href="http://punkle.tv" target="_blank"><img  src="wp-content/themes/thefamily_v2/library/images/familymembers/punkle.jpg" alt="Punkle"/></a></p>
				<br />
				
				
				</div>
    
			</div> <!-- end #content -->

<?php get_footer(); ?>