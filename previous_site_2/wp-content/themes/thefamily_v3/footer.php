			<footer role="contentinfo">
			
				<p>&copy; 2011 The Family.</p>				
			</footer> <!-- end footer -->
		
		</div> <!-- end #container -->

		<!-- custom scripts -->
		<script src="<?php echo get_template_directory_uri(); ?>/library/js/scripts.js"></script>
		
		<!--[if (lt IE 9) & (!IEMobile)]>
			<script src="<?php echo get_template_directory_uri(); ?>/library/js/libs/ie/DOMAssistantCompressed-2.8.js"></script>
			<script src="<?php echo get_template_directory_uri(); ?>/library/js/libs/ie/selectivizr-1.0.1.js"></script>
			<script src="<?php echo get_template_directory_uri(); ?>/library/js/libs/respond.min.js"></script>
		<![endif]-->		
		
		<!--[if lt IE 7 ]>
    		<script src="<?php echo get_template_directory_uri(); ?>/library/js/libs/ie/dd_belatedpng.js"></script>
    		<script>DD_belatedPNG.fix("img, .png_bg");</script>
  		<![endif]-->
		
		<?php wp_footer(); // js scripts are inserted using this function ?>
		
		<!-- Insert Analytics -->
		
		<!-- End Analytics -->

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

</html>

<?php 
	print "\n<!-- Server IP: {$_SERVER['SERVER_ADDR']} -->" ;
?>