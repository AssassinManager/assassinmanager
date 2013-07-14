<?php get_header(); ?>

	<!-- Page -->
	<div id="page-wrapper">

		<div class="header-section">
			<div class="outercontainer">
				<div class="container">

					<div class="clear padding50"></div>	
					<div class="padding100 visible-desktop"></div>	
					
					

					<div class="row-fluid">

						<div class="span6">
							
						<?php if (have_posts()) : ?>

							<?php $post = $posts[0]; ?>

							<?php $termname = $wp_query->queried_object->name; ?>

							<h2 class="page-header"><span>Archive for &#8216;<?php echo $termname; ?>&#8217;</span></h2>

							<div class="clear padding10"></div>
						
						</div>

						<div class="span6 hidden-phone"></div>

					</div>

				</div><!-- / container -->
			</div><!-- / outercontainer -->	
		</div><!-- / header-section -->	

		<div class="content-section">
			<div class="outercontainer">
				<div class="clear padding30"></div>	
				<div class="container port-folio" style="min-height: 450px;">

					<div class="row-fluid">

							<?php $count = 1; ?>

							<?php while (have_posts()) : the_post(); ?>	

								<div class="span6">

									<?php if (has_post_thumbnail( $post->ID ) ) : ?>

									<?php $fullimage = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full'); ?>

									<div class="image-box" style="max-width: 560px";>
										<?php 
											echo the_post_thumbnail('tb-860'); 
										?>
										<div class="hover-block">
											<div class="btn-group">
												<a href="<?php echo $fullimage[0]; ?>" rel="prettyPhoto[portfolio]"><button class="btn"><i class="icon-zoom-in"></i></button></a>
												<a href="<?php the_permalink(); ?>"><button class="btn"><i class="icon-file"></i></button></a>
											</div>
										</div>
									</div> 

									<?php endif; ?>

									<div class="clear padding10"></div>

									<div class="align-center">
										<a href="<?php the_permalink(); ?>"><h4 class="post-title"><?php the_title(); ?></h4></a>
									</div>

								</div>

								<?php 
									if ($count == 2) {
										$count = 0;
										echo '</div>';
										echo '<div class="clear padding20"></div>';
										echo '<div class="row-fluid">';
									}

								?>

								<?php $count++ ?>

							<?php endwhile; ?>

						<?php else : ?>

							<?php $post = $posts[0]; ?>

							<?php $termname = $wp_query->queried_object->name; ?>

							<h2 class="page-header"><span>Archive for &#8216;<?php echo $termname; ?>&#8217;</span></h2>

							<div class="clear padding10"></div>
						
						</div>

						<div class="span6 hidden-phone"></div>

					</div>

				</div><!-- / container -->
			</div><!-- / outercontainer -->	
		</div><!-- / header-section -->	

		<div class="content-section">
			<div class="outercontainer">
				<div class="clear padding30"></div>	
				<div class="container" style="min-height: 450px;">

							<h2>Nothing Found.</h2>

							<p>Perhaps try one of the links below:</p>
							<div class="padding10"></div>
							<h4>Most Used Categories</h4>
							<ul>
								<?php wp_list_categories( array( 'taxonomy' => 'portfolio-category' , 'orderby' => 'count', 'order' => 'DESC', 'show_count' => 1, 'title_li' => '', 'number' => 10 ) ); ?>
							</ul>				
							<div class="padding20"></div>
							<p>Or, use the search box below:</p>
							<?php get_search_form(); ?>
							<div class="padding20"></div>

						<?php endif; ?>

						<div class="clear"></div>

						<div class="pull-right">
						
							<?php 

							    $total_pages = $wp_query->max_num_pages;  
							    if ($total_pages > 1){  
							      $current_page = max(1, get_query_var('paged'));  
							      echo '<div class="pagination">';
							      echo paginate_links(array(  
							          'base' => get_pagenum_link(1) . '%_%',  
							          'format' => 'page/%#%',  
							          'current' => $current_page,  
							          'total' => $total_pages,  
							          'type'  => 'list'
							        ));  
							      echo '</div>';
							    }  
							
							 ?>

						</div>

						<?php wp_reset_query(); ?>
					
					<div class="padding20"></div>

				</div><!-- / container -->
			</div><!-- / outercontainer -->	
		</div><!-- / content-section -->	

	</div><!-- / page-wrapper -->

<?php get_template_part('footer', 'widget'); ?>

<?php get_footer(); ?>