<?php
$options = transida_WSH()->option(); 
$allowed_html = wp_kses_allowed_html( 'post' );

$image_logo = $options->get( 'image_normal_logo' );
$logo_dimension = $options->get( 'normal_logo_dimension' );

$logo_type = '';
$logo_text = '';
$logo_typography = '';
?>

<div class="page-wrapper">
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
    <header class="main-header header-style-one">
		<?php if( $options->get('show_topbar_v1') ):?>
        <!-- Header Top -->
        <div class="header-top">
            <div class="auto-container">
                <div class="inner-container">
                    <div class="left-column">
                        <?php
							$icons = $options->get( 'header_v1_social_share' );
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
						<?php if( $options->get('header_v1_search_form') ):?>
                        <div class="search-box">
                            <?php get_template_part('searchform1')?>
                        </div>
                        <?php endif; ?>
                    </div>
                    <?php if( $options->get('phone_no_v1') ):?>
                    <div class="right-column">
                        <div class="phone-number"><i class="flaticon-calling"></i><a href="tel:<?php echo esc_url($options->get('phone_no_v1'));?>"></a><?php echo wp_kses($options->get('phone_no_v1'), true);?></div>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
		<?php endif; ?>
        <!-- Header Upper -->
        <div class="header-upper">
            <div class="auto-container">
                <div class="inner-container">
                    <!--Logo hppay-->
                    <div class="logo-box">
                        <div class="logo"><?php echo transida_logo( $logo_type, $image_logo, $logo_dimension, $logo_text, $logo_typography ); ?></div>
                    </div>
                    <div class="right-column">
                        <!--Nav Box-->
                        <div class="nav-outer">
                            <!--Mobile Navigation Toggler-->
                            <div class="mobile-nav-toggler"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/icon-bar-2.png" alt="<?php esc_attr_e('Awesome Image', 'transida'); ?>"></div>

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
                        <?php if( $options->get('signin_link_v1') ):?>
                        <div class="navbar-right-info">
                            <div class="sign-in"><a href="<?php echo esc_url($options->get('signin_link_v1'));?>"><i class="flaticon-delivery-man"></i><?php echo wp_kses($options->get('signin_title_v1'), true);?></a></div>
                        </div>
                        <?php endif; ?>
                    </div>                        
                </div>
            </div>
        </div>
        <!--End Header Upper-->

        <!-- Sticky Header  -->
        <div class="sticky-header">
            <div class="header-upper">
                <div class="auto-container">
                    <div class="inner-container">
                        <!--Logo-->
                        <div class="logo-box">
                            <div class="logo"><?php echo transida_logo( $logo_type, $image_logo, $logo_dimension, $logo_text, $logo_typography ); ?></div>
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
                            <?php if( $options->get('signin_link_v1') ):?>
                            <div class="navbar-right-info">
                                <div class="sign-in"><a href="<?php echo esc_url($options->get('signin_link_v1'));?>"><i class="flaticon-delivery-man-1"></i><?php echo wp_kses($options->get('signin_title_v1'), true);?></a></div>
                            </div>
                            <?php endif; ?>
                        </div>                        
                    </div>
                </div>
            </div>
        </div><!-- End Sticky Menu -->

        <!-- Mobile Menu  -->
        <div class="mobile-menu">
            <div class="menu-backdrop"></div>
            <div class="close-btn"><span class="icon flaticon-remove"></span></div>
            
            <nav class="menu-box">
                <div class="nav-logo"><?php echo transida_logo( $logo_type, $image_logo, $logo_dimension, $logo_text, $logo_typography ); ?></div>
                <div class="menu-outer"><!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header--></div>
				<?php
					$icons = $options->get( 'header_v1_social_share' );
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
    <!-- End Main Header -->
	
    <?php if( $options->get('show_hidden_sidebar_v1') ):
		$pdf_img_v1    = $options->get( 'pdf_image_v1' );
		$pdf_img_v1    = transida_set( $pdf_img_v1, 'url', TRANSIDA_URI . 'assets/images/icons/icon-8.png' );
		
		$pdf_img_v2    = $options->get( 'pdf_image_v2' );
		$pdf_img_v2    = transida_set( $pdf_img_v2, 'url', TRANSIDA_URI . 'assets/images/icons/icon-8.png' );
	?>
    <!-- Hidden Sidebar -->
    <section class="hidden-sidebar close-sidebar">
        <div class="wrapper-box">
            <div class="content-wrapper">
                <div class="hidden-sidebar-close"><span class="flaticon-remove"></span></div>
                <div class="text-widget sidebar-widget">
                    <div class="logo"><?php echo transida_logo( $logo_type, $image_logo, $logo_dimension, $logo_text, $logo_typography ); ?></div>
                    <?php if( $options->get('sidebar_content_v1') ):?>
                    <div class="text"><?php echo wp_kses($options->get('sidebar_content_v1'), true);?></div>
                    <?php endif; ?>
                </div>
                <!-- PDF Widget -->
                <div class="pdf-widget sidebar-widget">
                    <div class="row">
                        <?php if( $pdf_img_v1 ):?>
                        <div class="col-sm-6 column">
                            <div class="content">
                                <div class="icon"><img src="<?php echo esc_url($pdf_img_v1);?>" alt="<?php esc_attr_e('Awesome Image', 'transida'); ?>"></div>
                                <h4><?php echo wp_kses($options->get('pdf_title_v1'), true);?></h4>
                            </div>
                        </div>
                        <?php endif; ?>
                        <?php if( $pdf_img_v2 ):?>
                        <div class="col-sm-6 column">
                            <div class="content">
                                <div class="icon"><img src="<?php echo esc_url($pdf_img_v2);?>" alt="<?php esc_attr_e('Awesome Image', 'transida'); ?>"></div>
                                <h4><?php echo wp_kses($options->get('pdf_title_v2'), true);?></h4>
                            </div>
                        </div>
                        <?php endif; ?>
                    </div>                            
                </div>
                <!-- Contact Widget -->
                <div class="contact-widget">
                    <?php if( $options->get('sidebar_address_v1') ):?>
                    <div class="icon-box">
                        <div class="icon"><span class="flaticon-cursor"></span></div>
                        <div class="text"><?php echo wp_kses($options->get('sidebar_address_v1'), true);?></div>
                    </div>
                    <?php endif; ?>
                    <?php if( $options->get('sidebar_phone_no_v1') ):?>
                    <div class="icon-box">
                        <div class="icon"><span class="flaticon-calling"></span></div>
                        <div class="text"><?php echo wp_kses($options->get('sidebar_phone_no_v1'), true);?></div>
                    </div>
                    <?php endif; ?>
                    <?php if( $options->get('sidebar_email_address_v1') ):?>
                    <div class="icon-box">
                        <div class="icon"><span class="flaticon-mail"></span></div>
                        <div class="text"><?php echo wp_kses($options->get('sidebar_email_address_v1'), true);?></div>
                    </div>
                    <?php endif; ?>
                </div>
                <?php if( $options->get('sidebar_btn_link_v1') ):?>
                <!-- Link Btn -->
                <div class="link-btn"><a href="<?php echo esc_url($options->get('sidebar_btn_link_v1'), true);?>" class="theme-btn btn-style-one style-two"><span><i class="flaticon-up-arrow"></i><?php echo wp_kses($options->get('sidebar_btn_title_v1'), true);?> </span></a></div>
                <?php endif; ?>
            </div>
        </div>
    </section>
    <?php endif; ?>
    
    <?php if( $options->get('Show_search_popup_form_v1') ):?>
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
