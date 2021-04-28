<?php
/**
 * 404 page file
 *
 * @package    WordPress
 * @subpackage Transida
 * @author     Theme Kalia <admin@theme-kalia.com>
 * @version    1.0
 */

$text = sprintf(__('It seems we can\'t find what you\'re looking for. Perhaps searching can help or go back to <a href="%s">Homepage</a>', 'transida'), esc_html(home_url('/')));
$allowed_html = wp_kses_allowed_html( 'post' );

$error_page_banner_img    = $options->get( 'error_page_banner_image' );
$error_page_banner_img    = transida_set( $error_page_banner_img, 'url', TRANSIDA_URI . 'assets/images/background/bg-20.jpg' );

$error_page_bg_img    = $options->get( 'error_page_bg_image' );
$error_page_bg_img    = transida_set( $error_page_bg_img, 'url', TRANSIDA_URI . 'assets/images/background/bg-21.jpg' );

$error_img   = $options->get( 'error_image' );
$error_img   = transida_set( $error_img, 'url', TRANSIDA_URI . 'assets/images/resource/404.png' );

?>
<?php get_header();
$data = \TRANSIDA\Includes\Classes\Common::instance()->data( '404' )->get();
//do_action( 'transida_banner', $data );
$options = transida_WSH()->option();
if ( class_exists( '\Elementor\Plugin' ) AND $data->get( 'tpl-type' ) == 'e' AND $data->get( 'tpl-elementor' ) ) {
	echo Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $data->get( 'tpl-elementor' ) );
} else {
	?>
	
    <!-- Error Page -->
    <section class="error-page">
        <div class="sec-bg" <?php if($error_page_banner_img): ?>style="background-image: url(<?php echo esc_url($error_page_banner_img);?>);"<?php endif; ?>></div>
        <div class="auto-container">
            <div class="content text-center" <?php if($error_page_bg_img): ?>style="background-image: url(<?php echo esc_url($error_page_bg_img);?>);"<?php endif; ?>>
                <div class="error-page-title"><?php esc_html_e( '404', 'transida' );?></div>
                <h2><?php if($options->get( '404-page_title' )) echo wp_kses( $options->get( '404-page_title' ), $allowed_html ); else esc_html_e( 'Sorry this page isn’t available', 'transida' ); ?></h2>
                <p><?php if($options->get( '404-page-text' )) echo wp_kses( $options->get('404-page-text'), $allowed_html ); else echo  wp_kses($text, true); ?></p>
                <?php if ( $options->get( 'back_home_btn', true ) ) : ?>
                <div class="read-more-link text-center">
                    <a href="<?php echo( home_url( '/' ) ); ?>" class="theme-btn btn-style-one"><span><i class="flaticon-up-arrow"></i><?php echo wp_kses( $options->get('back_home_btn_label'), $allowed_html ) ? wp_kses( $options->get('back_home_btn_label'), $allowed_html ) : esc_html_e( 'Back To Home', 'transida' ); ?></span></a>
                </div>
                <?php endif; ?>
            </div>            
        </div>
    </section>
    
<?php
}
get_footer(); ?>
