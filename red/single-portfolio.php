<?php get_header(); ?>

	<!-- Post -->
	<div id="portfolio-single-wrapper">

					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

					<?php 
						$headerbgcolor = esc_attr(get_post_meta( $post->ID, '_mpt_post_header_bg_color', true ));
						$headertextcolor = esc_attr(get_post_meta( $post->ID, '_mpt_post_header_text_color', true ));
						$contentbgcolor = esc_attr(get_post_meta( $post->ID, '_mpt_post_content_bg_color', true ));
						$contenttextcolor = esc_attr(get_post_meta( $post->ID, '_mpt_post_content_text_color', true ));
					?>

		<div class="header-section"<?php echo ($headerbgcolor != '#' && !empty($headerbgcolor) ? ' style="background: '.$headerbgcolor.';"' : '') ?>>
			<div class="outercontainer">
				<div class="container">

					<div class="clear padding30"></div>	
					<div class="padding60 visible-desktop"></div>	

					<div class="row-fluid">

						<div class="span2">

							<div class="date-comment-box">

								<?php 
									$year  = get_the_time('Y'); 
									$month = get_the_time('M'); 
									$day   = get_the_time('j'); 
								?>

								<div class="date">

									<span class="month"><?php echo $month; ?></span>

									<div class="clear"></div>

									<span class="day"><?php echo $day; ?></span>

									<div class="clear"></div>

									<span class="year"><?php echo $year; ?></span>

								</div>

								<div class="comments"><a href="<?php comments_link(); ?>"><?php comments_number( 'No Comments' , '1 Comment' , '% Comments' ); ?></a></div>

							</div>

						</div>

						<div class="span10">
							
							<h1 class="page-header"><span<?php echo ($headertextcolor != '#' && !empty($headertextcolor) ? ' style="color: '.$headertextcolor.'; border-bottom-color: '.$headertextcolor.'; border-top-color: '.$headertextcolor.';"' : '') ?>><?php the_title(); ?></span></h1>	

							<div class="post-meta">
								<p>Posted By <?php the_author(); ?> In <?php the_terms( $post->ID, 'portfolio-category' ); ?></p>
							</div>

						</div>

						<div class="clear padding10"></div>

					</div>

				</div><!-- / container -->
			</div><!-- / outercontainer -->	
		</div><!-- / header-section -->	



		<div class="content-section"<?php echo ($contentbgcolor != '#' && !empty($contentbgcolor) ? ' style="background: '.$contentbgcolor.';"' : '') ?>>
			<div class="outercontainer">
				<div class="clear padding30"></div>	
				<div class="container">

					<div class="row-fluid">
						<div class="span8">

							<div class="post" id="post-<?php the_ID(); ?>"<?php echo ($contenttextcolor != '#' && !empty($contenttextcolor) ? ' style="color: '.$contenttextcolor.';"' : '') ?>>

								<?php mpt_load_top_code(); ?>	

								<?php if (has_post_thumbnail( $post->ID ) ) : ?>

									<?php $fullimage = wp_get_attachment_image_src( get_post_thumbnail_id($id), 'full'); ?>

									<div class="image-box transparent">
										<a href="<?php echo $fullimage[0]; ?>" rel="prettyPhoto[post-<?php the_ID(); ?>]">
											<?php echo the_post_thumbnail('tb-860' , array('id' => 'nav3' , 'alt' => '')); ?>
										</a>
									</div>	

								<?php endif; ?>							

								<div class="clear padding20"></div>

								<div class="row-fluid">
									<!-- Project Info -->
									<div class="span4 well project-info">

										<h3 class="title">Project Info</h3>

										<?php
											$client = esc_attr(get_post_meta( $post->ID, '_mpt_portfolio_info_client', true ));
											$technology = esc_attr(get_post_meta( $post->ID, '_mpt_portfolio_info_tech', true ));
											$projecturl = esc_url(get_post_meta( $post->ID, '_mpt_portfolio_info_project_url', true ));
										?>

										<ul>
											<?php if (!empty($client)) { ?>
												<li>Client: <br /><span><?php echo $client; ?></span></li>
											<?php } ?>
											<li>Date: <br /><span><?php echo the_date('F j, Y'); ?></span></li>
											<li>Category: <br /><span><?php the_terms( $post->ID, 'portfolio-category' ); ?></span></li>
											<?php if (!empty($technology)) { ?>
												<li>Technology: <br /><span><?php echo $technology; ?></span></li>
											<?php } ?>
											<?php if (!empty($projecturl)) { ?>
												<li>Project URL: <br /><span><a href="<?php echo $projecturl; ?>" target="_blank">Visit Online  &rarr;</a></span></li>
											<?php } ?>
										</ul>

									</div>
									<!-- Project Description -->
									<div class="span8 project-desc">

										<h3 class="title">Project Description</h3>

										<?php the_content(); ?>
									</div>
								</div>
								
								<div class="padding20"></div>
								<?php edit_post_link('Edit this entry.', '<p>', '</p>'); ?>
								<div class="clear padding30"></div>
								
								<?php 

									$showcomments = get_post_meta( $post->ID, '_mpt_portfolio_single_show_comments', true );

									if ( $showcomments == 'on') {
										comments_template();
									} 
								?>

							</div>

					<?php endwhile; endif; ?>

						<?php mpt_load_bottom_code(); ?>
						
						</div><!-- / span8 -->
						
						<div id="sidebar" class="span4">
								<?php get_sidebar(); ?>
						</div>

					</div><!-- / row-fluid -->

					
					<div class="padding20"></div>

				</div><!-- / container -->
			</div><!-- / outercontainer -->	
		</div><!-- / content-section -->	

	</div><!-- / page-wrapper -->

<?php get_template_part('footer', 'widget'); ?>

<?php get_footer(); ?>