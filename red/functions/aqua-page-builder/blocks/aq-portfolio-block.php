<?php
/** Latest Portfolio block **/
class AQ_Portfolio_Block extends AQ_Block {
	
	//set and create block
	function __construct() {
		$block_options = array(
			'name' => 'Latest Portfolio',
			'size' => 'span12',
		);
		
		//create the block
		parent::__construct('aq_portfolio_block', $block_options);
	}
	
	function form($instance) {
		
		$defaults = array(
			'layout' => '3col',
			'entries' => '9',
			'showcategory' => '1',
			'hoverbgcolor' => '#202627',
			'hovertextcolor' => '#EFF4FF',
			'hoverbtncolor' => 'grey',
			'hoverboxshadow' => '#00A4F7',
		);
		$instance = wp_parse_args($instance, $defaults);
		extract($instance);

		$layout_options = array(
			'2col' => '2 Columns',
			'3col' => '3 Columns',
			'4col' => '4 Columns'
		);

		$entries_options = array(
			'2' => '2',
			'3' => '3',
			'4' => '4',
			'5' => '5',
			'6' => '6',
			'7' => '7',
			'8' => '8',
			'9' => '9',
			'10' => '10',
			'11' => '11',
			'12' => '12',
			'13' => '13',
			'14' => '14',
			'15' => '15',
			'16' => '16',
			'17' => '17',
			'18' => '18',
			'19' => '19',
			'20' => '20'
		);

		$hoverbtncolor_options = array(
			'grey' => 'Grey',
			'blue' => 'Blue',
			'lightblue' => 'Light Blue',
			'green' => 'Green',
			'red' => 'Red',
			'yellow' => 'Yellow',
			'black' => 'Black',
		);
		
		?>

		<div class="description third">
			<label for="<?php echo $this->get_field_id('layout') ?>">
				Layout<br/>
				<?php echo aq_field_select('layout', $block_id, $layout_options, $layout); ?>
			</label>
		</div>

		<div class="description third">
			<label for="<?php echo $this->get_field_id('entries') ?>">
				Number of Entries<br/>
				<?php echo aq_field_select('entries', $block_id, $entries_options, $entries); ?>
			</label>
		</div>

		<div class="description third last">
			<label for="<?php echo $this->get_field_id('showcategory') ?>">
				Show Category Menu<br />
				<?php echo aq_field_checkbox('showcategory', $block_id, $showcategory); ?>
			</label>
		</div>

		<div class="description half">
			<label for="<?php echo $this->get_field_id('hoverbgcolor') ?>">
				Hover Box: Background Color<br/>
				<?php echo aq_field_color_picker('hoverbgcolor', $block_id, $hoverbgcolor) ?>
			</label>
		</div>

		<div class="description half last">
			<label for="<?php echo $this->get_field_id('hovertextcolor') ?>">
				Hover Box: Text Color<br/>
				<?php echo aq_field_color_picker('hovertextcolor', $block_id, $hovertextcolor) ?>
			</label>
		</div>


		<div class="description half">
			<label for="<?php echo $this->get_field_id('hoverbtncolor') ?>">
				Hover Box: Button Color<br/>
				<?php echo aq_field_select('hoverbtncolor', $block_id, $hoverbtncolor_options, $hoverbtncolor); ?>
			</label>
		</div>

		<div class="description half last">
			<label for="<?php echo $this->get_field_id('hoverboxshadow') ?>">
				Hover Box: Box Shadow<br/>
				<?php echo aq_field_color_picker('hoverboxshadow', $block_id, $hoverboxshadow) ?>
			</label>
		</div>
		
		<?php
	}
	
	function block($instance) {
		extract($instance);

		switch ($hoverbtncolor) {
			case 'grey':
				$btnclass .= '';
				$whiteicon = '';
				break;
			case 'blue':
				$btnclass .= ' btn-primary';
				$whiteicon = ' icon-white';
				break;
			case 'lightblue':
				$btnclass .= ' btn-info';
				$whiteicon = ' icon-white';
				break;
			case 'green':
				$btnclass .= ' btn-success';
				$whiteicon = ' icon-white';
				break;
			case 'yellow':
				$btnclass .= ' btn-warning';
				$whiteicon = ' icon-white';
				break;
			case 'red':
				$btnclass .= ' btn-danger';
				$whiteicon = ' icon-white';
				break;
			case 'black':
				$btnclass .= ' btn-inverse';
				$whiteicon = ' icon-white';
				break;
			
		}

	?>

	<div id="latest-portfolio">

		<style type="text/css" media="screen">#latest-portfolio .tooltip4background {background: <?php echo $hoverbgcolor; ?>;color: <?php echo $hovertextcolor; ?>;border: solid 3px <?php echo $hovertextcolor; ?>;-webkit-box-shadow: 0px 0px 3px 2px <?php echo $hoverboxshadow; ?>;box-shadow: 0px 0px 3px 2px <?php echo $hoverboxshadow; ?>;}</style>

		<?php if ($showcategory == '1') { ?>

			<ul class="portfolio-categories">
				<li id="all">All</li>
				<?php
					$args = array(
						'taxonomy' => 'portfolio-category',
						'orderby' => 'name',
						'order' => 'ASC'
					  );

					$categories = get_categories($args);

					if  ($categories) {
					  foreach($categories as $category) {
					    echo '<li id="'.$category->slug. '">'.$category->name. '</li>';
					  }
					}
				?>
			</ul>

			<div class="clear padding15"></div>

		<?php } ?>

		<div class="portfolio">

			<div class="row-fluid">

			<?php
				query_posts( 'showposts='.$entries.'&post_type=portfolio' );
				$count = 1;
			?>
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>	

				<?php 
					$id = get_the_ID(); 
					$terms = get_the_terms( $post->ID, 'portfolio-category' );
					$fullimage = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full'); 

					switch ($layout) {
						case '2col':
							$span = 'span6';
							$imagesize = 'tb-860';
							$counter = '2';
							$style = 'true';
							break;
						case '3col':
							$span = 'span4';
							$imagesize = 'tb-360';
							$counter = '3';
							$style = 'false';
							break;
						case '4col':
							$span = 'span3';
							$imagesize = 'tb-360';
							$counter = '4';
							$style = 'false';
							break;							
						default:
							$span = 'span4';
							$imagesize = 'tb-360';
							$counter = '3';
							$style = 'false';
							break;
					}

				?>

				<div class="<?php echo $span; ?> well well-small<?php if (!empty($terms)) {foreach ($terms as $term) {echo ' '.$term->slug;}} ?>">
					<div id="tooltip4-<?php echo $id; ?>" class="image-box"<?php echo ($style == 'true' ? ' style="max-width: 560px;"' : '') ?>>
						<?php if (has_post_thumbnail( $post->ID ) ): ?>
							<?php echo the_post_thumbnail($imagesize); ?>
						<?php endif; ?>

						<div class="hover-block"></div>
					</div>

					<div id="tooltiphtml-<?php echo the_id(); ?>">
						<h3><?php the_title(); ?></h3>
						<div class="hidden-tablet"><p><?php the_excerpt_max_charlength(100);?></p></div>
						<div class="btn-group">
							<a href="<?php echo $fullimage[0]; ?>" rel="prettyPhoto[portfolio]"><button class="btn<?php echo $btnclass;?>"><i class="icon-zoom-in<?php echo $whiteicon; ?>"></i></button></a>
							<a href="<?php the_permalink(); ?>"><button class="btn<?php echo $btnclass;?>"><i class="icon-file<?php echo $whiteicon; ?>"></i></button></a>
						</div>
					</div>

				</div>

				<script type="text/javascript">
				jQuery(document).ready(function () {
					jQuery('#tooltip4-<?php echo $id; ?>').HoverAlls({tooltip:true,starts:"-10px,-25px",ends:"-10px,0px",returns:"-10px,-25px",bg_class:"tooltip4background <?php echo $span; ?>",speed_in:1000,speed_out:380,effect_in:"easeOutBack",effect_out:"easeInSine",bg_width:"100%",bg_height:"250px",html_mode:"#tooltiphtml-<?php echo $id; ?>"});
				});
				</script>

				<?php if ( $count == $counter ): ?>
					</div>
					<div class="row-fluid">
					<?php $count = 0; ?>
				<?php endif; ?>
				<?php $count++; ?>
			<?php endwhile; endif; ?>

			<?php wp_reset_query(); ?>

			</div>

		</div>

	</div>

	<?php

	}
	
}