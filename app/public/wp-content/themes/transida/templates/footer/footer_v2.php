<?php
/**
 * Footer Template  File
 *
 * @package TRANSIDA
 * @author  Theme Kalia
 * @version 1.0
 */

$options = transida_WSH()->option();
$footer_bg_img    = $options->get( 'footer_bg_img' );
$footer_bg_img    = transida_set( $footer_bg_img, 'url', TRANSIDA_URI . 'assets/images/background/bg-10.jpg' );

$footer_logo_img    = $options->get( 'footer_logo_img' );
$footer_logo_img    = transida_set( $footer_logo_img, 'url', TRANSIDA_URI . 'assets/images/logo-v2.png' );

$allowed_html = wp_kses_allowed_html( 'post' );
?>

    <!--Main Footer-->
    <footer class="main-footer style-two" style="background-image: url(<?php echo esc_url($footer_bg_img);?>);">
        <?php if( $options->get('show_subscribe_form')) :?>
        <div class="footer-top">
            <div class="auto-container">
                <div class="wrapper-box">
                    <div class="logo"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url($footer_logo_img);?>" alt="<?php esc_attr_e('Awesome Image', 'transida'); ?>"></a></div>
                    <div class="newsletter-form-two">
                        <?php echo do_shortcode($options->get('footer_mailchimp_form_id'));?>
                    </div>
                    <?php if( $options->get('mobile_app_title')) :?>
                    <div class="download-app">
                        <h4><?php echo wp_kses($options->get('mobile_app_title'), true);?></h4>
                        <?php if( $options->get('footer_apple_link_v2') || $options->get('footer_android_link_v2') ):?>
                        <ul>
                            <li><a href="<?php echo esc_url($options->get('footer_apple_link_v2'));?>"><span class="flaticon-apple"></span> </a></li>
                            <li><a href="<?php echo esc_url($options->get('footer_android_link_v2'));?>"><span class="flaticon-android"></span> </a></li>
                        </ul>
                        <?php endif; ?>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <?php endif; ?>
        <?php if ( is_active_sidebar( 'footer-sidebar-2' ) ) { ?>
        <div class="upper-box">
            <div class="auto-container">
                <div class="row">
                    <?php dynamic_sidebar( 'footer-sidebar-2' ); ?>
                </div>
            </div> 
        </div>
        <?php } ?> 
    </footer>
    <!--End Main Footer-->
    
    <div class="footer-bottom style-two">
        <div class="auto-container">
            <div class="bg">
                <div class="row m-0 align-items-center justify-content-between">
                    <div class="copyright-text"><?php echo wp_kses( $options->get( 'copyright_text_v2', 'Copyright © 2020 <a href="#"> Transida.</a> All Rights Reserved.' ), $allowed_html ); ?></div>
                    <?php if($options->get( 'footer_menu_2' )):?>
                    <ul class="menu">
                        <?php echo wp_kses( $options->get( 'footer_menu_2'), $allowed_html ); ?>
                    </ul>
                    <?php endif;?>
                </div>
            </div>                        
        </div>
    </div>

</div>
<!--End pagewrapper-->

<!--Scroll to top-->
<div class="scroll-to-top scroll-to-target" data-target="html"><span class="flaticon-right-arrow-6"></span></div>