<?php /* Template Name: Companies */ ?>
<?php get_header(); ?>
<div id="content" class="sidebar-full" style="background-color:rgb(227,231,232);">
	<div class="fs-container">
		<div class="fs-inner-container content">
			<div class="fs-content">
				<section class="search">
					<div class="row">
						<div class="col-md-12">
							<div class="row with-forms">
								<div class="col-fs-6">
									<div class="input-with-icon">
										<i class="sl sl-icon-magnifier"></i>
										<?php echo facetwp_display( 'facet', 'search' ); ?>
										<?php echo facetwp_display( 'facet', 'categories' ); ?>
									</div>
								</div>
								<div class="col-fs-6">
									<?php echo facetwp_display( 'facet', 'location' ); ?>
								</div>
							</div>
						</div>
					</div>
				</section>
				<section class="listings-container margin-top-30">
					<div class="row fs-switcher">
						<div class="col-md-6">
							<p class="showing-results"><?php echo do_shortcode('[facetwp counts="true"]'); ?> Companies Found</p>
						</div>
					</div>
					<div class="row fs-listings">
						<?php echo do_shortcode('[facetwp template="search" sort="true" map="true"]'); ?>
					</div>
				</section>
			</div>
		</div>
		<div class="fs-inner-container">
			<div id="map-container">
				<?php echo do_shortcode('[facetwp facet="map"]'); ?>
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>