<?php /* Template Name: Companies */ ?>
<?php get_header(); ?>
<div id="content" class="container site-content sidebar-full">
    <div class="head-banner">
        <div class="container">
            <div class="inner">
                <h1 class="page-title entry-title">
                    <span>All Vendor List</span>
                </h1>
            </div>
        </div>
    </div>
    <div id="primary" class="content-area">
        <main id="main" class="site-main">
            <article id="post-4705" class="post-4705 page type-page status-publish hentry">
                <div class="entry-content">
                    <div id="dokan-seller-listing-wrap" class="grid-view">
                        <div class="seller-listing-content">
                            <?php 
                                $args = array(
                                    'role' => 'seller',
                                );
                                $my_user_query = new WP_User_Query( $args );
                                $editors = $my_user_query->get_results(); 
                            ?>
                            <?php if ( ! empty( $editors ) ): ?>
                                <ul class="dokan-seller-wrap">
                                    <?php foreach ( $editors as $editor ): ?>
                                        <?php $editor_info = get_userdata( $editor->ID ); ?>
                                        <li class="dokan-single-seller woocommerce coloum-4 ">
                                            <div class="store-wrapper">
                                                <div class="store-header">
                                                    <div class="store-banner">
                                                        <a href="<?php echo home_url(); ?>/vendors/cadbury/">
                                                            <img class=" lazyloaded" loading="lazy"
                                                                src="<?php echo home_url(); ?>/wp-content/uploads/2022/05/Main-image-Landing-Page@3x-compressor.jpg"
                                                                data-src="<?php echo home_url(); ?>/wp-content/uploads/2022/05/Main-image-Landing-Page@3x-compressor.jpg">
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="store-content ">
                                                    <div class="store-data-container">
                                                        <div class="featured-favourite">
                                                        </div>
                                                        <div class="store-data ">
                                                            <h2>
                                                                <a href="<?php echo home_url(); ?>/vendors/cadbury/"><?php echo '<li>' . $editor_info->display_name . '</li>'; ?></a>
                                                            </h2>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="lst_realted_text_box center">
                                                    <h4 class="store-title"><i class="fas fa-map-marker-alt"></i> What is Lorem Ipsum?</h4>
                                                    <div class="lst_related_shrt_add uppercase strong"> Beach Rotana Residences</div>
                                                    <div class="lst_related_shrt_add uppercase strong"> 10th Street, Al Zahiyah, Abu Dhabi</div>
                                                    <div class="lst_related_rating center"> <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i></div>
                                                </div>
                                            </div>
                                        </li>
                                        
                                    <?php endforeach; ?>
                            <?php endif; ?>
                                <div class="dokan-clearfix"></div>
                            </ul> <!-- .dokan-seller-wrap -->
                        </div>
                    </div>
                </div><!-- .entry-content -->
            </article><!-- #post-## -->
        </main><!-- #main -->
    </div><!-- #primary -->
</div>
<?php get_footer(); ?>