<?php
$options = transida_WSH()->option();
$allowed_html = wp_kses_allowed_html( 'post' );

$image_logo3 = $options->get( 'image_normal_logo3' );
$logo_dimension3 = $options->get( 'normal_logo_dimension3' );

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
    <header class="main-header header-style-three">
		<?php if( $options->get('show_topbar_v3') ):?>
        <!-- Header Top -->
        <div class="header-top">
            <div class="auto-container">
                <div class="inner-container">
                    <div class="left-column">
                        <?php if( $options->get('signin_link_v3') ):?>
                        <div class="sign-in"><a href="<?php echo esc_url($options->get('signin_link_v3'));?>"><i class="flaticon-delivery-man"></i><?php echo wp_kses($options->get('signin_title_v3'), true);?></a></div>
                        <?php endif; ?>
                        
						<?php if( $options->get('header_v3_search_form') ):?>
                        <div class="search-box">
                            <?php get_template_part('searchform1')?>
                        </div>
                        <?php endif; ?>
                    </div>
                    <div class="right-column">
                        <?php if( $options->get('pages_link_v3')): ?>
                        <ul class="links">
                            <?php echo wp_kses($options->get('pages_link_v3'), true);?>
                        </ul>
                        <?php endif; ?>
                        <?php
							$icons = $options->get( 'header_v3_social_share' );
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
                    <!--Logo Pizza-->
                    <div class="logo-box">
                    pizza
                        <div class="logo"><?php echo transida_logo( $logo_type, $image_logo3, $logo_dimension3, $logo_text, $logo_typography ); ?></div>
                    </div>
                    <div class="right-column">
                        <div class="contact-info-two">
                            <?php if( $options->get('address_v3')): ?>
                            <div class="icon-box">
                                <div class="icon"><span class="flaticon-cursor"></span></div>
                                <div class="text"><?php echo wp_kses($options->get('address_v3'), true);?></div>
                            </div>
                            <?php endif; ?>
                            <?php if( $options->get('opening_hours_v3')): ?>
                            <div class="icon-box">
                                <div class="icon"><span class="flaticon-clock-1
                                    "></span></div>
                                <div class="text"><?php echo wp_kses($options->get('opening_hours_v3'), true);?></div>
                            </div>
                            <?php endif; ?>
                            <?php if( $options->get('phone_no_v3') || $options->get('email_address_v3')): ?>
                            <div class="icon-box">
                                <div class="icon"><span class="flaticon-chat"></span></div>
                                <div class="text"><strong><?php echo wp_kses($options->get('phone_no_v3'), true);?></strong><a href="mailto:<?php echo esc_url($options->get('email_address_v3'));?>"><?php echo wp_kses($options->get('email_address_v3'), true);?></a></div>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>                        
                </div>
            </div>
        </div>
        <!--End Header Upper-->
        <!-- Header Lower -->
        <div class="header-lower">
            <div class="auto-container">
                <div class="inner-container">
                    <div class="left-column">
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
                    </div>
                    <div class="right-column">                        
                        <div class="navbar-right-info">
                            <?php if( $options->get('quote_btn_link_v3') ):?>
                            <div class="getaquote">
                                <a href="<?php echo esc_url($options->get('quote_btn_link_v3'));?>" class="theme-btn btn-style-one"><span><i class="flaticon-up-arrow"></i><?php echo wp_kses($options->get('quote_btn_title_v3'), true);?></span></a>
                            </div>
                            <?php endif; ?>
                            
                            <?php if( $options->get('apple_link_v3') || $options->get('android_link_v3') ):?>
                            <div class="link-btn">
                                <a href="<?php echo esc_url($options->get('apple_link_v3'));?>"><span class="flaticon-apple"></span> </a>
                                <a href="<?php echo esc_url($options->get('android_link_v3'));?>"><span class="flaticon-android"></span> </a>
                            </div>
                            <?php endif; ?>
                            
                            <?php if( $options->get('show_hidden_sidebar_v3') ):?>
                            <div class="side-menu-nav sidemenu-nav-toggler"><span class="flaticon-menu"></span></div>
                        	<?php endif; ?>
                        </div>
                    </div>                        
                </div>
            </div>
        </div>
        <!--End Header Upper-->


        <!-- Sticky Header  -->
        <div class="sticky-header">
            <!-- Header Lower -->
            <div class="header-lower">
                <div class="auto-container">
                    <div class="inner-container">
                        <div class="left-column">
                            <!--Nav Box-->
                            <div class="nav-outer">
                                <!--Mobile Navigation Toggler-->
                                <div class="mobile-nav-toggler"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/icon-bar-2.png" alt=""></div>

                                <!-- Main Menu -->
                                <nav class="main-menu navbar-expand-md navbar-light">
                                </nav>
                            </div>
                        </div>
                        <div class="right-column">                        
                            <div class="navbar-right-info">
                                <?php if( $options->get('quote_btn_link_v3') ):?>
                                <div class="getaquote">
                                    <a href="<?php echo esc_url($options->get('quote_btn_link_v3'));?>" class="theme-btn btn-style-one"><span><i class="flaticon-up-arrow"></i><?php echo wp_kses($options->get('quote_btn_title_v3'), true);?></span></a>
                                </div>
                                <?php endif; ?>
                                
                                <?php if( $options->get('apple_link_v3') || $options->get('android_link_v3') ):?>
                                <div class="link-btn">
                                    <a href="<?php echo esc_url($options->get('apple_link_v3'));?>"><span class="flaticon-apple"></span> </a>
                                    <a href="<?php echo esc_url($options->get('android_link_v3'));?>"><span class="flaticon-android"></span> </a>
                                </div>
                                <?php endif; ?>
                                
                                <?php if( $options->get('show_hidden_sidebar_v3') ):?>
                                <div class="side-menu-nav sidemenu-nav-toggler"><span class="flaticon-menu"></span></div>
                                <?php endif; ?>
                                
                            </div>
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
                <div class="nav-logo"><?php echo transida_logo( $logo_type, $image_logo3, $logo_dimension3, $logo_text, $logo_typography ); ?></div>
                <div class="menu-outer"><!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header--></div>
				<?php
					$icons = $options->get( 'header_v3_social_share' );
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
	
    <?php if( $options->get('show_hidden_sidebar_v3') ):
		$pdf_img_v3    = $options->get( 'pdf_image_v3' );
		$pdf_img_v3    = transida_set( $pdf_img_v3, 'url', TRANSIDA_URI . 'assets/images/icons/icon-8.png' );
		
		$pdf_img_v4    = $options->get( 'pdf_image_v4' );
		$pdf_img_v4    = transida_set( $pdf_img_v4, 'url', TRANSIDA_URI . 'assets/images/icons/icon-8.png' );
	?>
    <!-- Hidden Sidebar -->
    <section class="hidden-sidebar close-sidebar">
        <div class="wrapper-box">
            <div class="content-wrapper">
                <div class="hidden-sidebar-close"><span class="flaticon-remove"></span></div>
                <div class="text-widget sidebar-widget">
                    <div class="logo"><?php echo transida_logo( $logo_type, $image_logo3, $logo_dimension3, $logo_text, $logo_typography ); ?></div>
                    <?php if( $options->get('sidebar_content_v3') ):?>
                    <div class="text"><?php echo wp_kses($options->get('sidebar_content_v3'), true);?></div>
                    <?php endif; ?>
                </div>
                <!-- PDF Widget -->
                <div class="pdf-widget sidebar-widget">
                    <div class="row">
                        <?php if( $pdf_img_v3 ):?>
                        <div class="col-sm-6 column">
                            <div class="content">
                                <div class="icon"><img src="<?php echo esc_url($pdf_img_v3);?>" alt="<?php esc_attr_e('Awesome Image', 'transida'); ?>"></div>
                                <h4><?php echo wp_kses($options->get('pdf_title_v3'), true);?></h4>
                            </div>
                        </div>
                        <?php endif; ?>
                        <?php if( $pdf_img_v4 ):?>
                        <div class="col-sm-6 column">
                            <div class="content">
                                <div class="icon"><img src="<?php echo esc_url($pdf_img_v4);?>" alt="<?php esc_attr_e('Awesome Image', 'transida'); ?>"></div>
                                <h4><?php echo wp_kses($options->get('pdf_title_v4'), true);?></h4>
                            </div>
                        </div>
                        <?php endif; ?>
                    </div>                            
                </div>
                <!-- Contact Widget -->
                <div class="contact-widget">
                    <?php if( $options->get('sidebar_address_v3') ):?>
                    <div class="icon-box">
                        <div class="icon"><span class="flaticon-cursor"></span></div>
                        <div class="text"><?php echo wp_kses($options->get('sidebar_address_v3'), true);?></div>
                    </div>
                    <?php endif; ?>
                    <?php if( $options->get('sidebar_phone_no_v3') ):?>
                    <div class="icon-box">
                        <div class="icon"><span class="flaticon-calling"></span></div>
                        <div class="text"><?php echo wp_kses($options->get('sidebar_phone_no_v3'), true);?></div>
                    </div>
                    <?php endif; ?>
                    <?php if( $options->get('sidebar_email_address_v3') ):?>
                    <div class="icon-box">
                        <div class="icon"><span class="flaticon-mail"></span></div>
                        <div class="text"><?php echo wp_kses($options->get('sidebar_email_address_v3'), true);?></div>
                    </div>
                    <?php endif; ?>
                </div>
                <?php if( $options->get('sidebar_btn_link_v3') ):?>
                <!-- Link Btn -->
                <div class="link-btn"><a href="<?php echo esc_url($options->get('sidebar_btn_link_v3'), true);?>" class="theme-btn btn-style-one style-two"><span><i class="flaticon-up-arrow"></i><?php echo wp_kses($options->get('sidebar_btn_title_v3'), true);?> </span></a></div>
                <?php endif; ?>
            </div>
        </div>
    </section>
    <?php endif; ?>
    
    <?php if( $options->get('Show_search_popup_form_v3') ):?>
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
