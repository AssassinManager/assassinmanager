<?php get_header(); ?>

	<!-- Revolution Slider -->

	<?php
		$revsliderselected = get_option('mpt_enable_rev_slider');
		$revslideralias = esc_attr(get_option('mpt_rev_slider_alias'));

		if ($revsliderselected == 'true' && !empty($revslideralias)) {
	?>
		<div id="slider-wrapper">
			
			<?php putRevSlider( $revslideralias ); ?>

		</div>

	<?php } else { ?>

		<div id="slider-wrapper" style="background: #f3f3f3;">
			<div class="container">
				<h2 class="page-header"style="color: #3e3e3e; border-bottom: 1px dashed #3e3e3e;">Revolution Slider Has Been Disabled</h2>

				<p style="color: #3e3e3e;">To enable the revolution slider:</p>
				<ol style="color: #3e3e3e;">
					<li>login into WordPress Admin Area.</li>
					<li>Go to <code>Appearance</code> > <code>Theme Options</code>.</li>
					<li>Hover over to <code>Homepage Layout</code> section.</li>
					<li>Check the "Show Revolution Slider" checkbox.</li>
					<li>Enter your slider alias.</li>
					<li>Click "Save All Changes".</li>
				</ol>

				<div class="clear padding30"></div>

			</div>
		</div>

	<?php } ?>

	<!-- End Slider Revolution -->

	<!-- Homepage Content -->

	<div id="homepage-content-wrapper">
		<div class="outercontainer">
			<div class="clear padding15"></div>	
			<div class="container">

				<?php 

					$homepagetemplateid = esc_attr(get_option('mpt_homepage_layout_code'));

					if (!empty($homepagetemplateid) && is_numeric($homepagetemplateid)) { 

						echo do_shortcode('[template id="'.$homepagetemplateid.'"]'); 

					}  else {

						echo '<h2>No Template Inserted</h2>';
						echo '<p>To insert a template into this section, first you have to create a homepage template using the page builder function. Then, copy the template id and paste it at the theme options panel.</p>';
						echo '<div class="clear padding30"></div>';
					} 

				?>

			</div><!-- / container -->
		</div><!-- / outercontainer -->	
	</div><!-- / homepage-content-wrapper -->

	<!-- End Homapage Content -->

	<!-- Footer Widget -->

	<?php 
		$selected = get_option('mpt_enable_homepage_footer_widget');

		if ($selected) {
			get_template_part('footer', 'widget'); 
		}
		
	?>

	<!-- End Footer Widget -->

<?php get_footer(); ?>