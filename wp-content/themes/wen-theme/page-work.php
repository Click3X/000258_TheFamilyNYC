<?php
/*
 Template Name: Work
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

<?php get_header(); ?>

			<div id="content" data-transition-delay="1" class="hidden">

				<div id="inner-content" class="cf">

					<main id="main" class="m-all t-3of3 d-7of7 cf" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

						<?php 
							// PAGE INFO
							// LOOP 1: NORMAL LOOP
							if (have_posts()) : while (have_posts()) : the_post(); ?>
								<header class="article-header">
									<h2 class="page-sub-title italic"><?php bloginfo('title');?></h2>
									<h1 class="page-title"><?php the_title(); ?></h1>
									<a id="work-menu-link" href="#" class="btn sort-by work-menu-link">Sort By</a>

									<div class="cf archive-select-container">
										<select name="archive-dropdown" onchange="document.location.href=this.options[this.selectedIndex].value;" class="btn">
											<option value="">Select Month</option>
											<option value="http://www.thefamilynyc.com/previous_site_2/?m=201504"> April 2015 </option>
											<option value="http://www.thefamilynyc.com/previous_site_2/?m=201503"> March 2015 </option>
											<option value="http://www.thefamilynyc.com/previous_site_2/?m=201410"> October 2014 </option>
											<option value="http://www.thefamilynyc.com/previous_site_2/?m=201409"> September 2014 </option>
											<option value="http://www.thefamilynyc.com/previous_site_2/?m=201408"> August 2014 </option>
											<option value="http://www.thefamilynyc.com/previous_site_2/?m=201407"> July 2014 </option>
											<option value="http://www.thefamilynyc.com/previous_site_2/?m=201406"> June 2014 </option>
											<option value="http://www.thefamilynyc.com/previous_site_2/?m=201405"> May 2014 </option>
											<option value="http://www.thefamilynyc.com/previous_site_2/?m=201404"> April 2014 </option>
											<option value="http://www.thefamilynyc.com/previous_site_2/?m=201403"> March 2014 </option>
											<option value="http://www.thefamilynyc.com/previous_site_2/?m=201402"> February 2014 </option>
											<option value="http://www.thefamilynyc.com/previous_site_2/?m=201401"> January 2014 </option>
											<option value="http://www.thefamilynyc.com/previous_site_2/?m=201312"> December 2013 </option>
											<option value="http://www.thefamilynyc.com/previous_site_2/?m=201311"> November 2013 </option>
											<option value="http://www.thefamilynyc.com/previous_site_2/?m=201310"> October 2013 </option>
											<option value="http://www.thefamilynyc.com/previous_site_2/?m=201309"> September 2013 </option>
											<option value="http://www.thefamilynyc.com/previous_site_2/?m=201308"> August 2013 </option>
											<option value="http://www.thefamilynyc.com/previous_site_2/?m=201307"> July 2013 </option>
											<option value="http://www.thefamilynyc.com/previous_site_2/?m=201306"> June 2013 </option>
											<option value="http://www.thefamilynyc.com/previous_site_2/?m=201305"> May 2013 </option>
											<option value="http://www.thefamilynyc.com/previous_site_2/?m=201304"> April 2013 </option>
											<option value="http://www.thefamilynyc.com/previous_site_2/?m=201302"> February 2013 </option>
											<option value="http://www.thefamilynyc.com/previous_site_2/?m=201301"> January 2013 </option>
											<!-- <option value="http://www.thefamilynyc.com/previous_site_2/?m=201212"> December 2012 </option>
											<option value="http://www.thefamilynyc.com/previous_site_2/?m=201211"> November 2012 </option>
											<option value="http://www.thefamilynyc.com/previous_site_2/?m=201210"> October 2012 </option>
											<option value="http://www.thefamilynyc.com/previous_site_2/?m=201209"> September 2012 </option>
											<option value="http://www.thefamilynyc.com/previous_site_2/?m=201205"> May 2012 </option>
											<option value="http://www.thefamilynyc.com/previous_site_2/?m=201204"> April 2012 </option>
											<option value="http://www.thefamilynyc.com/previous_site_2/?m=201203"> March 2012 </option>
											<option value="http://www.thefamilynyc.com/previous_site_2/?m=201202"> February 2012 </option>
											<option value="http://www.thefamilynyc.com/previous_site_2/?m=201201"> January 2012 </option>
											<option value="http://www.thefamilynyc.com/previous_site_2/?m=201112"> December 2011 </option>
											<option value="http://www.thefamilynyc.com/previous_site_2/?m=201111"> November 2011 </option>
											<option value="http://www.thefamilynyc.com/previous_site_2/?m=201110"> October 2011 </option>
											<option value="http://www.thefamilynyc.com/previous_site_2/?m=201109"> September 2011 </option>
											<option value="http://www.thefamilynyc.com/previous_site_2/?m=201108"> August 2011 </option>
											<option value="http://www.thefamilynyc.com/previous_site_2/?m=201107"> July 2011 </option>
											<option value="http://www.thefamilynyc.com/previous_site_2/?m=201106"> June 2011 </option>
											<option value="http://www.thefamilynyc.com/previous_site_2/?m=201105"> May 2011 </option>
											<option value="http://www.thefamilynyc.com/previous_site_2/?m=201104"> April 2011 </option>
											<option value="http://www.thefamilynyc.com/previous_site_2/?m=201103"> March 2011 </option>
											<option value="http://www.thefamilynyc.com/previous_site_2/?m=201102"> February 2011 </option>
											<option value="http://www.thefamilynyc.com/previous_site_2/?m=201101"> January 2011 </option>
											<option value="http://www.thefamilynyc.com/previous_site_2/?m=201012"> December 2010 </option>
											<option value="http://www.thefamilynyc.com/previous_site_2/?m=201011"> November 2010 </option>
											<option value="http://www.thefamilynyc.com/previous_site_2/?m=201010"> October 2010 </option>
											<option value="http://www.thefamilynyc.com/previous_site_2/?m=201009"> September 2010 </option>
											<option value="http://www.thefamilynyc.com/previous_site_2/?m=201008"> August 2010 </option>
											<option value="http://www.thefamilynyc.com/previous_site_2/?m=201003"> March 2010 </option>
											<option value="http://www.thefamilynyc.com/previous_site_2/?m=201002"> February 2010 </option>
											<option value="http://www.thefamilynyc.com/previous_site_2/?m=201001"> January 2010 </option>
											<option value="http://www.thefamilynyc.com/previous_site_2/?m=200911"> November 2009 </option>
											<option value="http://www.thefamilynyc.com/previous_site_2/?m=200907"> July 2009 </option>
											<option value="http://www.thefamilynyc.com/previous_site_2/?m=200905"> May 2009 </option>
											<option value="http://www.thefamilynyc.com/previous_site_2/?m=200903"> March 2009 </option>
											<option value="http://www.thefamilynyc.com/previous_site_2/?m=200902"> February 2009 </option>
											<option value="http://www.thefamilynyc.com/previous_site_2/?m=200901"> January 2009 </option>
											<option value="http://www.thefamilynyc.com/previous_site_2/?m=200810"> October 2008 </option>
											<option value="http://www.thefamilynyc.com/previous_site_2/?m=200809"> September 2008 </option>
											<option value="http://www.thefamilynyc.com/previous_site_2/?m=200808"> August 2008 </option>
											<option value="http://www.thefamilynyc.com/previous_site_2/?m=200807"> July 2008 </option>
											<option value="http://www.thefamilynyc.com/previous_site_2/?m=200806"> June 2008 </option>
											<option value="http://www.thefamilynyc.com/previous_site_2/?m=200804"> April 2008 </option>
											<option value="http://www.thefamilynyc.com/previous_site_2/?m=200802"> February 2008 </option>
											<option value="http://www.thefamilynyc.com/previous_site_2/?m=200712"> December 2007 </option>
											<option value="http://www.thefamilynyc.com/previous_site_2/?m=200711"> November 2007 </option>
											<option value="http://www.thefamilynyc.com/previous_site_2/?m=200710"> October 2007 </option>
											<option value="http://www.thefamilynyc.com/previous_site_2/?m=200709"> September 2007 </option>
											<option value="http://www.thefamilynyc.com/previous_site_2/?m=200707"> July 2007 </option>
											<option value="http://www.thefamilynyc.com/previous_site_2/?m=200705"> May 2007 </option>
											<option value="http://www.thefamilynyc.com/previous_site_2/?m=200702"> February 2007 </option>
											<option value="http://www.thefamilynyc.com/previous_site_2/?m=200701"> January 2007 </option>
											<option value="http://www.thefamilynyc.com/previous_site_2/?m=200612"> December 2006 </option>
											<option value="http://www.thefamilynyc.com/previous_site_2/?m=200611"> November 2006 </option>
											<option value="http://www.thefamilynyc.com/previous_site_2/?m=200610"> October 2006 </option>
											<option value="http://www.thefamilynyc.com/previous_site_2/?m=200609"> September 2006 </option>
											<option value="http://www.thefamilynyc.com/previous_site_2/?m=200608"> August 2006 </option>
											<option value="http://www.thefamilynyc.com/previous_site_2/?m=200607"> July 2006 </option> -->
										</select>
									</div>
								</header>
						<?php 
							endwhile; 
							endif;
							wp_reset_postdata(); 
							// END LOOP 1: 
						?>


						<?php 
							// WORK PROJECTS ARRAY TO STORE VAR
							$projects = array();
							// WORK PROJECT POSTS
							$args = array(
								'post_type' => array(
									'project',
									'post'
								)
							);
							// QUERY
							$the_query = new WP_Query( $args );
							
							// LOOP 2: WP QUERY LOOP
							if ($the_query->have_posts()) : while ($the_query->have_posts()) : $the_query->the_post();


								// GET POST THUMBNAIL SRC
								$url_src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID) , 'full' );
								// GET PROJECT FIELDS
								$project = array(
									'title'=>get_the_title(),
									// 'client'=>get_field('client'),
									'featured_project'=>get_field('featured_project'),
									'video_files'=>get_field('video_files'),
									'description'=>get_field('description'),
									'poster'=>$url_src[0],
									'id'=>$post->ID,
									'link'=>get_the_permalink($post->ID),
									'link-through'=>get_field('link-through')
								);

								if(get_field('client')) {
									$project['client']=get_field('client');
								}

								if(get_the_content() != '') {
									$project['description'] = '<p style="margin:1.75em auto;">'.get_the_excerpt().'</p>';
								}

								// YOU TUBE LINK
								if(get_field('youtube_link')) {
									$project['youtube_link'] = get_field('youtube_link');
								} 

								// helper($project);
								// PUSH PROJECT INTO PROJECTS ARRAY FOR LATER USE
								$projects[] = $project;
						
							endwhile; 
							endif;
							wp_reset_postdata(); 
							// END LOOP 2: WP QUERY LOOP

							// PRINT CUSTOM PROJECTS FUNCTION DECLARED IN FUNCTIONS PHP
							printNewProject($projects);
						?>

					</main>

				</div>

			</div>

<?php get_footer(); ?>