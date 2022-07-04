<?php
$store_user               = dokan()->vendor->get(get_query_var('author'));
$store_info               = $store_user->get_shop_info();
$social_info              = $store_user->get_social_profiles();
$store_tabs               = dokan_get_store_tabs($store_user->get_id());
$social_fields            = dokan_get_social_profile_fields();

$dokan_store_times        = !empty($store_info['dokan_store_time']) ? $store_info['dokan_store_time'] : [];
$current_time             = dokan_current_datetime();
$today                    = strtolower($current_time->format('l'));

$dokan_appearance         = get_option('dokan_appearance');
$profile_layout           = empty($dokan_appearance['store_header_template']) ? 'default' : $dokan_appearance['store_header_template'];
$store_address            = dokan_get_seller_short_address($store_user->get_id(), false);

$dokan_store_time_enabled = isset($store_info['dokan_store_time_enabled']) ? $store_info['dokan_store_time_enabled'] : '';
$store_open_notice        = isset($store_info['dokan_store_open_notice']) && !empty($store_info['dokan_store_open_notice']) ? $store_info['dokan_store_open_notice'] : __('Store Open', 'dokan-lite');
$store_closed_notice      = isset($store_info['dokan_store_close_notice']) && !empty($store_info['dokan_store_close_notice']) ? $store_info['dokan_store_close_notice'] : __('Store Closed', 'dokan-lite');
$show_store_open_close    = dokan_get_option('store_open_close', 'dokan_appearance', 'on');

$general_settings         = get_option('dokan_general', []);
$banner_width             = dokan_get_vendor_store_banner_width();

if (('default' === $profile_layout) || ('layout2' === $profile_layout)) {
    $profile_img_class = 'profile-img-circle';
} else {
    $profile_img_class = 'profile-img-square';
}

if ('layout3' === $profile_layout) {
    unset($store_info['banner']);

    $no_banner_class      = ' profile-frame-no-banner';
    $no_banner_class_tabs = ' dokan-store-tabs-no-banner';
} else {
    $no_banner_class      = '';
    $no_banner_class_tabs = '';
}

if (!is_user_logged_in(get_current_user())) {
    header('location: ' . get_home_url() . '/vendor/register');
}
?>
<div class="dokan-profile-frame-wrapper">
    <div class="profile-frame<?php echo esc_attr($no_banner_class); ?>">

        <div class="profile-info-box profile-layout-<?php echo esc_attr($profile_layout); ?>">
            <?php if ($store_user->get_banner()) { ?>
                <img src="<?php echo esc_url($store_user->get_banner()); ?>" alt="<?php echo esc_attr($store_user->get_shop_name()); ?>" title="<?php echo esc_attr($store_user->get_shop_name()); ?>" class="profile-info-img">
            <?php } else { ?>
                <div class="profile-info-img dummy-image">&nbsp;</div>
            <?php } ?>

            <div class="profile-info-summery-wrapper dokan-clearfix">
                <div class="profile-info-summery">
                    <div class="profile-info-head">
                        <div class="profile-img <?php echo esc_attr($profile_img_class); ?>">
                            <img src="<?php echo esc_url($store_user->get_avatar()) ?>" alt="<?php echo esc_attr($store_user->get_shop_name()) ?>" size="150">
                        </div>
                        <?php if (!empty($store_user->get_shop_name()) && 'default' === $profile_layout) { ?>
                            <h1 class="store-name"><?php echo esc_html($store_user->get_shop_name()); ?> <?php apply_filters('dokan_store_header_after_store_name', $store_user); ?></h1>
                        <?php } ?>
                    </div>

                    <div class="profile-info">
                        <?php if (!empty($store_user->get_shop_name()) && 'default' !== $profile_layout) { ?>
                            <h1 class="store-name"><?php echo esc_html($store_user->get_shop_name()); ?></h1>
                        <?php } ?>

                        <ul class="dokan-store-info">
                            <?php if (!dokan_is_vendor_info_hidden('address') && isset($store_address) && !empty($store_address)) { ?>
                                <li class="dokan-store-address"><i class="fas fa-map-marker-alt"></i>
                                    <?php echo wp_kses_post($store_address); ?>
                                </li>
                            <?php } ?>

                            <?php if (!dokan_is_vendor_info_hidden('phone') && !empty($store_user->get_phone())) { ?>
                                <li class="dokan-store-phone">
                                    <i class="fas fa-mobile-alt"></i>
                                    <a href="tel:<?php echo esc_html($store_user->get_phone()); ?>"><?php echo esc_html($store_user->get_phone()); ?></a>
                                </li>
                            <?php } ?>

                            <?php if (!dokan_is_vendor_info_hidden('email') && $store_user->show_email() == 'yes') { ?>
                                <li class="dokan-store-email">
                                    <i class="far fa-envelope"></i>
                                    <a href="mailto:<?php echo esc_attr(antispambot($store_user->get_email())); ?>"><?php echo esc_attr(antispambot($store_user->get_email())); ?></a>
                                </li>
                            <?php } ?>

                            <li class="dokan-store-rating">
                                <i class="fas fa-star"></i>
                                <?php echo wp_kses_post(dokan_get_readable_seller_rating($store_user->get_id())); ?>
                            </li>

                            <?php if ($show_store_open_close == 'on' && $dokan_store_time_enabled == 'yes') : ?>
                                <li class="dokan-store-open-close">
                                    <i class="fas fa-shopping-cart"></i>
                                    <div class="store-open-close-notice">
                                        <?php if (dokan_is_store_open($store_user->get_id())) : ?>
                                            <span class='store-notice'><?php echo esc_attr($store_open_notice); ?></span>
                                        <?php else : ?>
                                            <span class='store-notice'><?php echo esc_attr($store_closed_notice); ?></span>
                                        <?php endif; ?>

                                        <span class="fa fa-angle-down"></span>
                                        <div id="vendor-store-times">
                                            <div class="store-times-heading">
                                                <i class="fas fa-calendar-day"></i>
                                                <h4><?php esc_html_e('Weekly Store Timing', 'dokan-lite'); ?></h4>
                                            </div>
                                            <?php
                                            foreach (dokan_get_translated_days() as $day_key => $day) :
                                                $store_info   = !empty($dokan_store_times[$day_key]) ? $dokan_store_times[$day_key] : [];
                                                $store_status = !empty($store_info['status']) ? $store_info['status'] : 'close';
                                            ?>
                                                <div class="store-time-tags">
                                                    <div class="store-days <?php echo $today === $day_key ? 'current_day' : ''; ?>"><?php echo esc_html($day); ?></div>
                                                    <div class="store-times">
                                                        <?php if ($store_status === 'close') : ?>
                                                            <span class="store-close"><?php esc_html_e('CLOSED', 'dokan-lite'); ?></span>
                                                        <?php endif; ?>

                                                        <?php
                                                        // Get store times.
                                                        $opening_times = !empty($store_info['opening_time']) ? $store_info['opening_time'] : [];

                                                        // If dokan pro doesn't exists then get single item.
                                                        if (!dokan()->is_pro_exists()) {
                                                            $opening_times = !empty($opening_times) && is_array($opening_times) ? $opening_times[0] : [];
                                                        }

                                                        $times_length = !empty($opening_times) ? count((array) $opening_times) : 0;

                                                        // Get formatted times.
                                                        for ($index = 0; $index < $times_length; $index++) :
                                                            $formatted_opening_time = $current_time->modify($store_info['opening_time'][$index]);
                                                            $formatted_closing_time = $current_time->modify($store_info['closing_time'][$index]);

                                                            // check if store is open or closed time is valid.
                                                            if (empty($formatted_opening_time) || empty($formatted_closing_time)) {
                                                                continue;
                                                            }

                                                            $exact_time = '';

                                                            if ($today === $day_key && $formatted_opening_time <= $current_time && $formatted_closing_time >= $current_time) {
                                                                $exact_time = 'current_time';
                                                            }
                                                        ?>
                                                            <span class="store-open <?php echo $exact_time; ?>" href="#"><?php echo esc_html($formatted_opening_time->format(wc_time_format()) . ' - ' . $formatted_closing_time->format(wc_time_format())); ?></span>
                                                        <?php endfor; ?>
                                                    </div>
                                                </div>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                </li>
                            <?php endif ?>

                            <?php //do_action('dokan_store_header_info_fields', $store_user->get_id()); ?>
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 02d31d227c2fc0320448bc5fcb569f3f8ad6b716
                            <?php if(checkRole('distributor') || checkRole('administrator')): ?>
                                <?php if(!checkDistributorship($store_user->get_id())): ?>
                                    <li class="sign_agreement">
                                        <a data-id="<?php the_ID(); ?>">Request Distributorship</a>
                                    </li>
                                <?php endif; ?>
                            <?php endif; ?>
<<<<<<< HEAD
=======
=======
                            <li class="sign_agreement">
                                <a data-id="<?php the_ID(); ?>">Sign Agreement</a>
                            </li>
>>>>>>> 63a504891237c2d0140b7368782ed14e3627e7df
>>>>>>> 02d31d227c2fc0320448bc5fcb569f3f8ad6b716
                        </ul>

                        <?php if ($social_fields) { ?>
                            <div class="store-social-wrapper">
                                <ul class="store-social">
                                    <?php foreach ($social_fields as $key => $field) { ?>
                                        <?php if (!empty($social_info[$key])) { ?>
                                            <li>
                                                <a href="<?php echo esc_url($social_info[$key]); ?>" target="_blank"><i class="fab fa-<?php echo esc_attr($field['icon']); ?>"></i></a>
                                            </li>
                                        <?php } ?>
                                    <?php } ?>
                                </ul>
                            </div>
                        <?php } ?>

                    </div> <!-- .profile-info -->
                </div><!-- .profile-info-summery -->
            </div><!-- .profile-info-summery-wrapper -->
        </div> <!-- .profile-info-box -->
    </div> <!-- .profile-frame -->

    <?php if ($store_tabs) { ?>
        <div class="dokan-store-tabs<?php echo esc_attr($no_banner_class_tabs); ?>">
            <ul class="dokan-list-inline">
                <?php foreach ($store_tabs as $key => $tab) { ?>
                    <?php if ($tab['url']) : ?>
                        <li><a href="<?php echo esc_url($tab['url']); ?>"><?php echo esc_html($tab['title']); ?></a></li>
                    <?php endif; ?>
                <?php } ?>
                <?php //do_action('dokan_after_store_tabs', $store_user->get_id()); ?>
            </ul>
        </div>
    <?php } ?>

    <?php if(checkRole('distributor') || checkRole('administrator')): ?>
        <?php if(!checkDistributorship($store_user->get_id())): ?>
            <div class="rqdis-box">
                <div class="rqdis-content">
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Quae magnam ratione hic aperiam ducimus sunt blanditiis odio beatae. Earum beatae in dicta asperiores nulla reprehenderit eveniet voluptatem odio velit mollitia?
                    </p>
                </div>
                <div class="rgdis-request">
                    <div class="rqdis-box-clicker">
                        <a data-id="<?php the_ID(); ?>">Request Distributorship</a>
                    </div>
                </div>
            </div>
        <?php else: ?>
            <?php $agreements = checkDistributorship($store_user->get_id()); ?>
            <?php if($agreements['status'] == 'Pending'): ?>
                <div class="rqdis-box status-pending">
                    <div class="rqdis-content">
                        <p>
                            Your request for distributorship with <?php echo $agreements['vendor_name']; ?> is currently under review. Someone from the vitrak team will get in touch with you soon.
                        </p>
                    </div>
                </div>
            <?php elseif($agreements['status'] == 'Rejected'): ?>
                <div class="rqdis-box status-rejected">
                    <div class="rqdis-content">
                        <p>
                            Your request for distributorship with <?php echo $agreements['vendor_name']; ?> has been rejected. Please contact our team for more information.
                        </p>
                    </div>
                    <div class="rgdis-request">
                        <div class="rqdis-box-clicker">
                            <a href="<?php echo home_url('/contact-us/'); ?>">Contact Us</a>
                        </div>
                    </div>
                </div>
            <?php elseif($agreements['status'] == 'Approved'): ?>
                <div class="rqdis-box status-approved">
                    <div class="rqdis-content">
                        <p>
                            Your distributorship for <?php echo $agreements['vendor_name']; ?> has been approved. You can now start purchasing products listed below.
                        </p>
                    </div>
                </div>
            <?php endif; ?>
        <?php endif; ?>
    <?php endif; ?>
</div>

<?php if(!checkDistributorship($store_user->get_id())): ?>
    <div class="iframe-contract<?php if(isset($_GET['agreement']) && $_GET['agreement'] == true) {echo ' show';} ?>">
        <div class="iContract-box">
            <div class="agreement-box">
                <div class="agreement">
                    <?php echo do_shortcode('[distributor_agreement]'); ?>
                </div>
                <div class="contract-agree">
                    <input type="checkbox" name="contract_agree" id="contract_agree" value="1">
                    <label for="contract_agree">I have the entire agreement and agree to all the terms and conditions of the agreement</label>
                </div>
                <div class="contract-submit">
                    <button type="submit" disabled data-company-id="<?php echo $store_user->get_id(); ?>" data-distributor-id="<?php echo get_current_user_id(); ?>">Submit</button>
                </div>
            </div>
        </div>
        <div class="iContract-mask"></div>
    </div>
<?php endif; ?>
