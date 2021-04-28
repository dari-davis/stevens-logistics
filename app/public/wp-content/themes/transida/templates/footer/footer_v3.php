<?php
/**
 * Footer Template  File
 *
 * @package TRANSIDA
 * @author  Theme Kalia
 * @version 1.0
 */

$options = transida_WSH()->option();
$allowed_html = wp_kses_allowed_html( 'post' );
?>
	<?php if ( is_active_sidebar( 'footer-sidebar-3' ) ) { ?>
	<!--Main Footer-->
    <footer class="main-footer style-three">
        <div class="upper-box">
            <div class="auto-container">
                <div class="row">
                	<?php dynamic_sidebar( 'footer-sidebar-3' ); ?>
                </div>
            </div> 
        </div>
    </footer>
    <!--End Main Footer-->
	<?php } ?>
    <div class="footer-bottom style-three">
        <div class="auto-container">
            <div class="bg">
                <div class="row m-0 align-items-center justify-content-between">
                    <div class="copyright-text"><?php echo wp_kses( $options->get( 'copyright_text_v3', 'Copyright © 2020 <a href="#"> Transida.</a> All Rights Reserved.' ), $allowed_html ); ?></div>
                    <?php
						$icons = $options->get( 'footer_v3_social_share' );
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