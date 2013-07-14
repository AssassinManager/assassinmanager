<?php 
/*
Template Name: Portfolio Page
 */

get_header(); ?>

	<!-- Page -->
	<div id="page-wrapper">

					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

					<?php 
						$headerbgcolor = esc_attr(get_post_meta( $post->ID, '_mpt_page_header_bg_color', true ));
						$headertextcolor = esc_attr(get_post_meta( $post->ID, '_mpt_page_header_text_color', true ));
						$contentbgcolor = esc_attr(get_post_meta( $post->ID, '_mpt_page_content_bg_color', true ));
						$contenttextcolor = esc_attr(get_post_meta( $post->ID, '_mpt_page_content_text_color', true ));
						$headerimage = esc_url(get_post_meta( $post->ID, '_mpt_page_header_image', true ));

						$col = get_post_meta( $post->ID, '_mpt_page_layout', true );
						$showpost = get_post_meta( $post->ID, '_mpt_page_entries', true );
					?>

		<div class="header-section"<?php echo ($headerbgcolor != '#' && !empty($headerbgcolor) ? ' style="background: '.$headerbgcolor.';"' : '') ?>>
			<div class="outercontainer">
				<div class="container">

					<div class="clear padding50"></div>	
					<div class="padding100 visible-desktop"></div>	
					
					

					<div class="row-fluid">

						<div class="span6">
							
							<h1 class="page-header"><span<?php echo ($headertextcolor != '#' && !empty($headertextcolor) ? ' style="color: '.$headertextcolor.'; border-bottom-color: '.$headertextcolor.'; border-top-color: '.$headertextcolor.';"' : '') ?>><?php the_title(); ?></span></h1>

							<div class="clear padding10"></div>
						
						</div>

						<div class="span6 hidden-phone align-center"> 

							<?php if (!empty($headerimage)) { ?> 
								<img src="<?php echo $headerimage; ?>">
							<?php } ?>

						</div>

					</div>

				</div><!-- / container -->
			</div><!-- / outercontainer -->	
		</div><!-- / header-section -->	



		<div class="content-section"<?php echo ($contentbgcolor != '#' && !empty($contentbgcolor) ? ' style="background: '.$contentbgcolor.';"' : '') ?>>
			<div class="outercontainer">
				<div class="clear padding30"></div>	
				<div class="container"<?php echo ($contenttextcolor != '#' && !empty($contenttextcolor) ? ' style="color: '.$contenttextcolor.';"' : '') ?>>

					<?php the_content(); ?>					

					<?php endwhile; endif; ?>

					<?php
						$args = array(
							'taxonomy' => 'portfolio-category',
							'orderby' => 'name',
							'order' => 'ASC'
						  );

						$categories = get_categories($args);
					?>					

				    <ul id="portfolio-tabs" class="portfolio-categories page-portfolio" data-tabs="tabs">
				    	<li>By Category: </li>
				    	<li class="active"><a href="#all"  data-toggle="tab">All</a></li>
						<?php if  ($categories) {
							  foreach($categories as $category) {
							    echo '<li><a href="#'.$category->slug. '" data-toggle="tab">'.$category->name.'</a></li>';
							  }
							}
						?>
				    </ul>

				    <div class="clear padding20"></div>

				    <div id="portfolio-tab-content" class="tab-content">

						<?php if  ($categories) {
							  foreach($categories as $category) {
							  	$current_page = max(1, get_query_var('paged')); 

								echo '<div id="'.$category->slug.'" class="tab-pane fade port-folio">';
								echo '<div class="row-fluid">';

								load_portfolio_selected_category($category->term_id,$current_page,$col,$showpost);

								echo '</div>';
								echo '</div>';
							  }
							}
						?>

						<!-- All -->
						<div id="all" class="tab-pane fade in active port-folio">

							<div class="row-fluid">

							<?php
								$counter = load_counter_selected_layout($col);
								$span = load_portfolio_class_selected_layout($col);
								$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
								$query_arg = array (
										'showposts' => $showpost,
										'post_type' => 'portfolio',
										'paged' => $paged
									);
								query_posts( $query_arg );
								$count = 1;
								$id = get_the_ID(); 
							?>

							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>	

								<div class="<?php echo $span; ?>">

									<?php if (has_post_thumbnail( $post->ID ) ) : ?>

									<?php $fullimage = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full'); ?>

									<div class="image-box"<?php echo ($col == '2col' ? ' style="max-width: 560px;"' : '') ?>>
										<?php 
											if ($col == '2col') {$imagesize = 'tb-860';} else { $imagesize = 'tb-360'; }
											echo the_post_thumbnail($imagesize); 
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
									if ($count == $counter) {
										$count = 0;
										echo '</div>';
										echo '<div class="clear padding20"></div>';
										echo '<div class="row-fluid">';
									}

								?>

								<?php $count++ ?>

							<?php endwhile; endif; ?>

							</div><!-- / row-fluid -->

						</div><!-- / portfolio -->

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

					</div>
					
					<div class="padding20"></div>

					<script type="text/javascript">
						jQuery(document).ready(function () {
							jQuery('#portfolio-tabs').tab();
						});
					</script>  

				</div><!-- / container -->
			</div><!-- / outercontainer -->	
		</div><!-- / content-section -->	

	</div><!-- / page-wrapper -->

<?php get_template_part('footer', 'widget'); ?>

<?php get_footer(); ?>