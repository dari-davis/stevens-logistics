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

	<?php if ( is_active_sidebar( 'footer-sidebar' ) ) { ?>
    <!--Main Footer-->
    <footer class="main-footer">
        <div class="upper-box">
            <div class="auto-container">
                <div class="row">
                	<?php dynamic_sidebar( 'footer-sidebar' ); ?>
                </div>
            </div> 
        </div>               
    </footer>
    <!--End Main Footer-->
	<?php } ?> 
    <div class="footer-bottom">
        <div class="auto-container">
            <div class="row m-0 align-items-center justify-content-between">
                <div class="copyright-text"><?php echo wp_kses( $options->get( 'copyright_text', 'Copyright © 2020 <a href="#"> Transida.</a> All Rights Reserved.' ), $allowed_html ); ?></div>
                <?php if($options->get( 'footer_menu' )):?>
                <ul class="menu">
                    <?php echo wp_kses( $options->get( 'footer_menu'), $allowed_html ); ?>
                </ul>
                <?php endif;?>
            </div>            
        </div>
    </div>
	
</div>
<!--End pagewrapper-->

<!--Scroll to top-->
<div class="scroll-to-top scroll-to-target" data-target="html"><span class="flaticon-right-arrow-6"></span></div>