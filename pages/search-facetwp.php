<?php /* Template Name: Search */ ?>
<?php get_header(); ?>
<script type="text/javascript">
</script>
<div class="page-wrapper border-top">
	<div class="container-85 mobile-95 tablet-95">
		<div class="search-page business-page">
			<div class="bp-1 sp-20 inline hide-inline-mobile mobile-100 tablet-30">
				<div class="modal-card">
					<div class="filters">
						<div class="md-head">
							<h5>Services 
								<a href="https://workshops.ae/search">
									<span class="reset hide-mobile">
										<i class="fa fa-refresh" aria-hidden="true"></i>Reset
									</span>
								</a>
								<span class="show-mobile right" onclick="toggle_visibility('filter');">X</span>
							</h5>
						</div>
						<?php echo do_shortcode('[facetwp facet="Proximity"]'); ?>
						<?php echo do_shortcode('[facetwp facet="services"]'); ?>
						<div class="md-head">
							<h5>Brands</h5>
						</div>
						<?php echo do_shortcode('[facetwp facet="brand"]'); ?>
						<div class="md-head">
							<h5>Workshop Type</h5>
						</div>
						<?php echo do_shortcode('[facetwp facet="category"]'); ?>
						<div class="md-head">
							<h5>Emirate</h5>
						</div>
						<?php echo facetwp_display( 'facet', 'Emirate' ); ?>
						<div class="md-head">
							<h5>Area</h5>
						</div>
						<?php echo do_shortcode('[facetwp facet="area"]'); ?>
						<div class="md-head">
							<h5>More Filters</h5>
						</div>	
						<?php echo do_shortcode('[facetwp facet="more_filters"]'); ?>
					</div>
				</div>
			</div>
			<div class="bp-2 sp-60 inline mobile-100 tablet-70">
				<?php echo do_shortcode('[facetwp template="temp_1" sort="true" map="true"]'); ?>
				<?php echo do_shortcode('[facetwp pager="true"]'); ?>
				<span class='map-close'><i class='fa fa-times' aria-hidden='true'></i> Close</span>
			</div>
			<div class="bp-3 sp-20 inline hide-inline-mobile hide-tablet">
				<div class="map-open none">
					<div class="map-mask">
						View Search Results On Map
					</div>
				</div>
				<div class="sp-head">
					<h4>SPONOSORED</h4>
				</div>
				<div class="sponsored">
					<?php 

					// args
					$args = array(
						'posts_per_page'	=> 5,
						'post_type'		=> 'product',
						'orderby' => 'rand',
						'meta_key'		=> 'featured',
						'meta_value'	=> 'Yes'
					);


					// query
					$the_query = new WP_Query( $args );
					?>
					<?php if( $the_query->have_posts() ): ?>
						<?php while( $the_query->have_posts() ) : $the_query->the_post(); ?>
						    <a href="<?php the_permalink(); ?>">
								<div class="sp-box">
									<div class="sp-box-up">
										<?php
										    $attachment_id = get_field('logo');
										    $size = "str-logo"; 
										    $image = wp_get_attachment_image_src( $attachment_id, $size );
										?>
							            <img class="sp-100" src="<?php echo $image[0]; ?>" width="300px" height="180px">
							            <?php if( get_field('tagline') ): ?>
							            	<div class="sp-tagline absolute"><?php the_field('tagline'); ?></div>
							            <?php endif; ?>
									</div>
									<div class="sp-box-btm text-wrap">
										<?php the_title(); ?>
									</div>
								</div>
							</a>	
						<?php endwhile; ?>
					<?php endif; ?>
					<?php wp_reset_query();	 // Restore global post data stomped by the_post(). ?>
				</div>
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>