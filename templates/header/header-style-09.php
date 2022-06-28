<?php

/**
 * Name:  Header style 09
 **/
?>
<?php
$header_top     = 'header-top has-start has-end';
$header_message = ecotech_theme_option_meta(
    '_custom_metabox_theme_options',
    'header_message',
    "metabox_header_message"
);
if (!empty($header_message)) $header_top .= ' has-center';
?>
<header id="header" class="header style-09 style-04">
    <!-- <div class="<?php //echo esc_attr($header_top); ?>">
        <div class="container">
            <div class="header-inner">
                <div class="header-box header-start">
                    <?php //ecotech_header_social(); ?>
                    <?php //ecotech_header_submenu('header_topmenu'); ?>
                </div>
                <?php //ecotech_header_message(); ?>
                <div class="header-box header-end">
                    <?php //ecotech_header_submenu('header_topmenu_2'); ?>
                </div>
            </div>
        </div>
    </div> -->
    <div class="header-mid header-sticky">
        <div class="container">
            <div class="header-inner megamenu-wrap">
                <?php ecotech_get_logo(); ?>
                <div class="box-header-nav">
                    <?php ecotech_primary_menu(); ?>
                </div>
                <div class="header-control">
                    <div class="inner-control">
                        <?php ecotech_header_menu_bar(); ?>
                        <?php //if (function_exists('ecotech_header_wishlist')) ecotech_header_wishlist(); ?>
                        <?php if(is_user_logged_in()): ?>
                            <?php 
                                if(checkRole('distributor') && get_field('gst', 'user_' . get_current_user_id())) {
                                    if (function_exists('ecotech_header_mini_cart') && get_field('account_verification', 'user_' . get_current_user_id()) && checkRole('distributor')) {
                                        ecotech_header_mini_cart('popup');                                
                                    }
                                }
                                echo '<div class="block-username">' . get_field('business_name', 'user_' . get_current_user_id()) . '</div>';
                            ?>
                            <?php ecotech_header_user(); ?>
                        <?php else: ?>
                            <div class="block-userlink ecotech-dropdown">
                                <a class="woo-user-link" href="<?php echo home_url('/register'); ?>">
                                    <span class="icon main-icon-user-2"></span>
                                    <span class="text power-show"><span class="highlight">Sign in</span><span> or </span>Register</span>
                                </a>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<?php if (function_exists('ecotech_header_mini_cart_popup')) ecotech_header_mini_cart_popup(); ?>