<?php /* Template Name: Home Page */ ?>
<?php get_header(); ?>
<div id="content" class="container site-content sidebar-full">
    <div class="head-banner">
        <div class="row">
			<div class="hm_banner" style="background-image:url(<?php echo esc_url( get_home_url() . '/wp-content/uploads/2022/06/banner3-1.jpg') ?>")>
				<div class="mask">
					<div class="big_container">
						<div class="container-90">
							<div class="hm_banner_box">
							<div class="hm_banner-logo center">
								<img width="290px" height="290px" alt="Vitrak Logo" src="<?php echo esc_url( get_home_url() . '/wp-content/uploads/2022/05/Logo-Horizontal.png') ?>" loading="lazy">
							</div>
							<div class="hm_banner-c2a center">
								<h1 class="white font_2 capitalize bold">India's No One Selling Products Directory</h1>
							</div>
							<div class="hm_banner-search auto mobile-100">
								<h2 class="white hide-mobile">Find A Seller Shop Near You</h2>
								<div class="hm_banner-search_box">
									<div class="hm_banner-search_item sp-80 left">
										<div class="facetwp-facet facetwp-facet-Proximity facetwp-type-proximity" data-name="Proximity" data-type="proximity">
										<span class="facetwp-input-wrap">
											<i class="facetwp-icon locate-me"></i><input type="text" class="facetwp-location" value="" placeholder="Enter location" autocomplete="off" id="facetwp-location">
											<div class="location-results facetwp-hidden"></div>
										</span>
										<input class="facetwp-radius facetwp-hidden" value="5" id="facetwp-radius">
										<input type="hidden" class="facetwp-lat" value="">
										<input type="hidden" class="facetwp-lng" value="">
										</div>
									</div>
									<button class="fwp-submit hm_banner-search-btn pointer" data-href="/workshops/" style="background-image:url(<?php echo esc_url( get_home_url() . '/wp-content/uploads/2022/06/search.png') ?>")>Submit</button>
									<div class="clear"></div>
								</div>
							</div>
							<div class="hm_banner-seperator white auto center">OR</div>
							</div>
						</div>
					</div>
				</div>
			</div>
        </div>
    </div>
</div>
<?php get_footer(); ?>