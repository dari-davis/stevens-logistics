<?php
$options = transida_WSH()->option();
$allowed_html = wp_kses_allowed_html( 'post' );

$image_logo4 = $options->get( 'image_normal_logo4' );
$logo_dimension4 = $options->get( 'normal_logo_dimension4' );

$image_logo5 = $options->get( 'image_normal_logo5' );
$logo_dimension5 = $options->get( 'normal_logo_dimension5' );

$logo_type = '';
$logo_text = '';
$logo_typography = '';
?>

<div class="page-wrapper color-style-two">
    <?php if( $options->get( 'theme_preloader' ) ):?>
    <!-- Preloader -->
    <div class="loader-wrap">
        <div class="preloader"><div class="preloader-close"><?php esc_html_e('Preloader Close', 'transida'); ?></div></div>
        <div class="layer layer-one"><span class="overlay"></span></div>
        <div class="layer layer-two"><span class="overlay"></span></div>        
        <div class="layer layer-three"><span class="overlay"></span></div>        
    </div>
	<?php endif; ?>
    <!-- Main Header -->
    <header class="main-header header-style-four">
		<?php if( $options->get('show_topbar_v4') ):?>
        <!-- Header Top -->
        <div class="header-top">
            <div class="auto-container">
                <div class="inner-container">
                    <div class="left-column">
                        
                        <?php if( $options->get('signin_link_v4') ):?>
                        <div class="sign-in"><a href="<?php echo esc_url($options->get('signin_link_v4'));?>"><i class="flaticon-delivery-man"></i><?php echo wp_kses($options->get('signin_title_v4'), true);?></a></div>
                        <?php endif; ?>
                        
                        <?php if( $options->get('header_v4_search_form') ):?>
                        <div class="search-box">
                            <?php get_template_part('searchform1')?>
                        </div>
                        <?php endif; ?>
                        
                    </div>
                    <div class="right-column">
                        <?php if( $options->get('pages_link_v4')): ?>
                        <ul class="links">
                            <?php echo wp_kses($options->get('pages_link_v4'), true);?>
                        </ul>
                        <?php endif; ?>
                        <?php
							$icons = $options->get( 'header_v4_social_share' );
							if ( ! empty( $icons ) ) :
						?>
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
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
		<?php endif; ?>
        <!-- Header Upper -->
        <div class="header-upper">
            <div class="auto-container">
                <div class="inner-container">
                    <!--Logo-->
                    <div class="logo-box">
                        <div class="logo"><?php echo transida_logo( $logo_type, $image_logo4, $logo_dimension4, $logo_text, $logo_typography ); ?></div>
                    </div>
                    <div class="right-column">
                        <!--Nav Box-->
                        <div class="nav-outer">
                            <!--Mobile Navigation Toggler-->
                            <div class="mobile-nav-toggler"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/icon-bar.png" alt=""></div>

                            <!-- Main Menu -->
                            <nav class="main-menu navbar-expand-md navbar-light">
                                <div class="collapse navbar-collapse show clearfix" id="navbarSupportedContent">
                                    <ul class="navigation">
                                        <?php wp_nav_menu( array( 'theme_location' => 'main_menu', 'container_id' => 'navbar-collapse-1',
											'container_class'=>'navbar-collapse collapse navbar-right',
											'menu_class'=>'nav navbar-nav',
											'fallback_cb'=>false, 
											'items_wrap' => '%3$s', 
											'container'=>false,
											'depth'=>'3',
											'walker'=> new Bootstrap_walker()  
										) ); ?>
                                    </ul>
                                </div>
                            </nav>
                        </div>
                        <?php if( $options->get('phone_title_v4') || $options->get('phone_no_v4') ):?>
                        <div class="navbar-right-info">
                            <div class="contact-info-three">
                                <div class="icon"><span class="flaticon-phone-with-wire"></span></div>
                                <div class="content">
                                    <h5><?php echo wp_kses($options->get('phone_title_v4'), true);?></h5>
                                    <h4><?php echo wp_kses($options->get('phone_no_v4'), true);?></h4>
                                </div>
                            </div>
                        </div>
                        <?php endif; ?>
                    </div>                        
                </div>
            </div>
        </div>
        <!--End Header Upper-->

        <!-- Sticky Header  -->
        <div class="sticky-header">
            <!-- Header Upper -->
            <div class="header-upper">
                <div class="auto-container">
                    <div class="inner-container">
                        <!--Logo-->
                        <div class="logo-box">
                            <div class="logo"><?php echo transida_logo( $logo_type, $image_logo4, $logo_dimension4, $logo_text, $logo_typography ); ?></div>
                        </div>
                        <div class="right-column">
                            <!--Nav Box-->
                            <div class="nav-outer">
                                <!--Mobile Navigation Toggler-->
                                <div class="mobile-nav-toggler"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/icon-bar-2.png" alt=""></div>

                                <!-- Main Menu -->
                                <nav class="main-menu navbar-expand-md navbar-light">
                                </nav>
                            </div>
                            <?php if( $options->get('phone_title_v4') || $options->get('phone_no_v4') ):?>
                            <div class="navbar-right-info">
                                <div class="contact-info-three">
                                    <div class="icon"><span class="flaticon-phone-with-wire"></span></div>
                                    <div class="content">
                                        <h5><?php echo wp_kses($options->get('phone_title_v4'), true);?></h5>
                                        <h4><?php echo wp_kses($options->get('phone_no_v4'), true);?></h4>
                                    </div>
                                </div>
                            </div>
                            <?php endif; ?>
                        </div>                        
                    </div>
                </div>
            </div>
            <!--End Header Upper-->
        </div><!-- End Sticky Menu -->

        <!-- Mobile Menu  -->
        <div class="mobile-menu">
            <div class="menu-backdrop"></div>
            <div class="close-btn"><span class="icon flaticon-remove"></span></div>
            
            <nav class="menu-box">
                <div class="nav-logo"><?php echo transida_logo( $logo_type, $image_logo5, $logo_dimension5, $logo_text, $logo_typography ); ?></div>
                <div class="menu-outer"><!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header--></div>
				
                <?php
					$icons = $options->get( 'header_v4_social_share' );
					if ( ! empty( $icons ) ) :
				?>
                <!--Social Links-->
				<div class="social-links">
					<ul class="clearfix">
					<?php
						foreach ( $icons as $h_icon ) :
						$header_social_icons = json_decode( urldecode( transida_set( $h_icon, 'data' ) ) );
						if ( transida_set( $header_social_icons, 'enable' ) == '' ) {
							continue;
						}
						$icon_class = explode( '-', transida_set( $header_social_icons, 'icon' ) );
						?>
						<li><a href="<?php echo esc_url(transida_set( $header_social_icons, 'url' )); ?>" style="background-color:<?php echo esc_attr(transida_set( $header_social_icons, 'background' )); ?>; color: <?php echo esc_attr(transida_set( $header_social_icons, 'color' )); ?>"><span class="fab <?php echo esc_attr( transida_set( $header_social_icons, 'icon' ) ); ?>"></span></a></li>
					<?php endforeach; ?>
					</ul>
                </div>
                <?php endif; ?>
            </nav>
        </div><!-- End Mobile Menu -->

        <div class="nav-overlay">
            <div class="cursor"></div>
            <div class="cursor-follower"></div>
        </div>
    </header>
    
    <?php if( $options->get('Show_search_popup_form_v4') ):?>
    <!--Search Popup-->
    <div id="search-popup" class="search-popup">
        <div class="close-search theme-btn"><span class="flaticon-remove"></span></div>
        <div class="popup-inner">
            <div class="overlay-layer"></div>
            <div class="search-form">
                <?php get_template_part('searchform2')?>
            </div>
        </div>
    </div>
	<?php endif; ?>