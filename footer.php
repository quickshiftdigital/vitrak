<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Ecotech
 * @since 1.0
 * @version 1.2
 */
?>
<div class="sign_up_creation none" id="vitrak_loading">
    <div class="sc_box">
        <div class="sc_loader">
            <img class="lazyload" src="<?php echo home_url('/wp-content/uploads/2022/06/Double-Ring-1.6s-200px.gif'); ?>" alt="Loader">
        </div>
        <div class="sc_text font_2 white strong"> Vitrak in Process.</div>
    </div>
</div>
<?php if ( ecotech_get_option( 'enable_backtotop' ) == 1 ): ?>
    <a href="#" class="action-to-top backtotop"></a>
<?php endif; ?>
<?php
    /* FOOTER */
    do_action( 'ovic_footer_content' );
    /* NEWSLETTER */
    ecotech_popup_newsletter();
?>
</div><!-- #page -->
<div id="ecotech-modal-popup" class="modal fade"></div>
<?php
    /* WP FOOTER */
    wp_footer();
?>
</body>
</html>
