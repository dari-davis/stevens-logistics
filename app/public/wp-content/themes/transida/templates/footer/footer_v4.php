<?php
/**
 * Footer Template  File
 *
 * @package TRANSIDA
 * @author  Theme Kalia
 * @version 1.0
 */

$options = transida_WSH()->option();
$footer_bg_img2    = $options->get( 'footer_bg_img2' );
$footer_bg_img2    = transida_set( $footer_bg_img2, 'url', TRANSIDA_URI . 'assets/images/resource/image-11.png' );
$allowed_html = wp_kses_allowed_html( 'post' );
?>
	<?php if ( is_active_sidebar( 'footer-sidebar-4' ) ) { ?>
	<!--Main Footer-->
    <footer class="main-footer style-four">
        <?php if($footer_bg_img2):?><div class="side-image"><img src="<?php echo esc_url($footer_bg_img2);?>" alt="<?php esc_attr_e('Awesome Image', 'transida'); ?>"></div><?php endif; ?>
        <div class="upper-box">
            <div class="auto-container">
                <div class="row">
                	<?php dynamic_sidebar( 'footer-sidebar-4' ); ?>
                </div>
            </div> 
        </div>
    </footer>
    <!--End Main Footer-->
	<?php } ?>
    <div class="footer-bottom style-four">
        <div class="auto-container">
            <div class="bg">
                <div class="row m-0 align-items-center justify-content-between">
                    <div class="copyright-text"><?php echo wp_kses( $options->get( 'copyright_text_v4', 'Copyright © 2020 <a href="#"> Transida.</a> All Rights Reserved.' ), $allowed_html ); ?></div>
                    <?php
						$icons = $options->get( 'footer_v4_social_share' );
						if ( ! empty( $icons ) ) :
					?>
                    <div class="social-icon-area">
                        <span><?php esc_html_e('Social Conected', 'transida'); ?></span>
                        <ul class="social-icon">
                        <?php
                            foreach ( $icons as $h_icon ) :
                            $header_social_icons = json_decode( urldecode( transida_set( $h_icon, 'data' ) ) );
                            if ( transida_set( $header_social_icons, 'enable' ) == '' ) {
                                continue;
                            }
                            $icon_class = explode( '-', transida_set( $header_social_icons, 'icon' ) );
                            ?>
                            <li><a href="<?php echo esc_url(transida_set( $header_social_icons, 'url' )); ?>" style="background-color:<?php echo esc_attr(transida_set( $header_social_icons, 'background' )); ?>; color: <?php echo esc_attr(transida_set( $header_social_icons, 'color' )); ?>"><i class="fab <?php echo esc_attr( transida_set( $header_social_icons, 'icon' ) ); ?>"></i></a></li>
                        <?php endforeach; ?>
                        </ul>
                    </div>
                    <?php endif; ?>
                </div>
            </div>                        
        </div>
    </div>
	
</div>
<!--End pagewrapper-->

<!--Scroll to top-->
<div class="scroll-to-top scroll-to-target style-two" data-target="html"><span class="flaticon-right-arrow-6"></span></div>
