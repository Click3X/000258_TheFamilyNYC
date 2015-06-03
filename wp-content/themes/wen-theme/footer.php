<?php 
    // $my_query = new WP_Query( 'name=contact' ); // I used a category id 1 as an example
    ?>
    <?php //if ( $my_query->have_posts() ) : 


    // $address = get_field('address'); ?>


    <!-- <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>> -->
    <?php //while ($my_query->have_posts()) : $my_query->the_post(); ?>


    <?php //endwhile; ?>

    <!-- </div> -->

    <?php
    // wp_reset_postdata(); 
    // endif;
    ?>

			<div class="gold-line" style="background-image: url(<?php echo get_template_directory_uri(); ?>/library/images/gold-border-bottom.png);"></div>

			<footer class="footer" role="contentinfo" itemscope itemtype="http://schema.org/WPFooter">

				<div id="inner-footer" class="cf">

					<ul>
						<li class="contact-item">
							<div class="footer-icon" style="background-image: url(<?php echo get_template_directory_uri(); ?>/library/images/logo-icon.svg);"></div>
							<h4>Address</h4>
							<p>54 West 21st Street, RM 508<br>NYC, NY 10010</p>
						</li>

						<li class="contact-item">
							<div class="footer-icon" style="background-image: url(<?php echo get_template_directory_uri(); ?>/library/images/logo-icon.svg);"></div>
							<h4>Email</h4>
							<p>reps@thefamilynyc.com</p>
						</li>

						<li class="contact-item">
							<div class="footer-icon" style="background-image: url(<?php echo get_template_directory_uri(); ?>/library/images/logo-icon.svg);"></div>
							<h4>Phone</h4>
							<p>T: 212 477 4248</p>
						</li>
					</ul>

					<div class="social-container">
						<a href="#" target="_blank"><div id="facebook" style="background-image: url(<?php echo get_template_directory_uri(); ?>/library/images/social/fb.svg);"></div></a>						
						<a href="#" target="_blank"><div id="twitter" style="background-image: url(<?php echo get_template_directory_uri(); ?>/library/images/social/twitter.svg);"></div></a>
						<a href="#" target="blank"><div id="instagram" style="background-image: url(<?php echo get_template_directory_uri(); ?>/library/images/social/instagram.svg);"></div></a>
					</div>

					<div id="footer-logo" style="background-image: url(<?php echo get_template_directory_uri(); ?>/library/images/footer_logo.svg);"></div>
					<div class="footer-credits">
						<p>Branding by The Second Column.<span>|</span></p>
						<p>&copy; <?php echo date('Y'); ?> <?php bloginfo( 'name' ); ?>.<span>|</span></p>
						<p>Website by ClickFire Media.</p>
					</div>

				</div>

			</footer>

		</div>

		<?php // all js scripts are loaded in library/bones.php ?>
		<?php wp_footer(); ?>
		<?php
            // CONDITIONALLY LOAD OUTLINE SCRIPT
            $server = $_SERVER['REMOTE_ADDR'];
            // IF SERVER IS LOCAL, ADD OUTLINE BUTTON
            if($server == '127.0.0.1') {
                echo "<script>
                    jQuery('head').append('<style>#outline {position:fixed;z-index:1000;bottom:50px;right:50px;} .outlines {outline:1px solid rgba(255, 0, 0, 0.3);}</style>');
                    jQuery('body').append('<input id=\"outline\" type=\"button\">');

                    jQuery('#outline').click(function() {
                        jQuery('*').toggleClass('outlines');
                   });
                </script>";
            }
        ?>

	</body>

</html> <!-- end of site. what a ride! -->
