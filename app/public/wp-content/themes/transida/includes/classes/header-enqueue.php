<?php

namespace TRANSIDA\Includes\Classes;


/**
 * Header and Enqueue class
 */
class Header_Enqueue {


	public static function init() {
		add_action( 'wp_enqueue_scripts', array( __CLASS__, 'enqueue' ) );

		add_filter( 'wp_resource_hints', array( __CLASS__, 'resource_hints' ), 10, 2 );
	}

	/**
	 * Gets the arrays from method scripts and styles and process them to load.
	 * Styles are being loaded by default while scripts only enqueue and can be loaded where required.
	 *
	 * @return void This function returns nothing.
	 */
	public static function enqueue() {

		self::scripts();

		self::styles();

	}

	/**
	 * The major scripts loader to load all the scripts of the theme. Developer can hookup own scripts.
	 * All the scripts are being load in footer.
	 *
	 * @return array Returns the array of scripts to load
	 */
	public static function scripts() {
		$options = get_theme_mod( TRANSIDA_NAME . '_options-mods' );
		$ssl     = is_ssl() ? 'https' : 'http';

		$scripts = array(
			'popper'         => 'assets/js/popper.min.js',
			'bootstrap'         => 'assets/js/bootstrap.min.js',
			'bootstrap-select'         => 'assets/js/bootstrap-select.min.js',
			'jquery-fancybox'           => 'assets/js/jquery.fancybox.js',
			'isotope'      		=> 'assets/js/isotope.js',
			'owl'     => 'assets/js/owl.js',
			'appear'      => 'assets/js/appear.js',
			'wow'          => 'assets/js/wow.js',
			'lazyload'      		=> 'assets/js/lazyload.js',
			'scrollbar'      		=> 'assets/js/scrollbar.js',
			'tweenmax'      		=> 'assets/js/TweenMax.min.js',
			'swiper'      		=> 'assets/js/swiper.min.js',
			'jquery-polyglot-language-switcher'      		=> 'assets/js/jquery.polyglot.language.switcher.js',
			'jquery-ajaxchimp'      		=> 'assets/js/jquery.ajaxchimp.min.js',
			'parallax-scroll'      		=> 'assets/js/parallax-scroll.js',
			'pagenav'      		=> 'assets/js/pagenav.js',
			'main-script'      		=> 'assets/js/script.js',
		);

		$scripts = apply_filters( 'TRANSIDA/includes/classes/header_enqueue/scripts', $scripts );
		/**
		 * Enqueue the scripts
		 *
		 * @var array
		 */
		foreach ( $scripts as $name => $js ) {

			if ( strstr( $js, 'http' ) || strstr( $js, 'https' ) || strstr( $js, 'googleapis.com' ) ) {

				wp_register_script( "{$name}", $js, '', '', true );
			} else {
				wp_register_script( "{$name}", get_template_directory_uri() . '/' . $js, '', '', true );
			}
		}

		wp_enqueue_script( array(
			'jquery',
			'popper',
			'bootstrap',
			'bootstrap-select',
			'jquery-fancybox',
			'isotope',
			'owl',
			'appear',
			'wow',
			'lazyload',
			'scrollbar',
			'tweenmax',
			'swiper',
			'jquery-polyglot-language-switcher',
			'jquery-ajaxchimp',
			'parallax-scroll',
			'pagenav',
			'main-script',
		) );


		$header_data = array(
			'ajaxurl' => esc_url( admin_url( 'admin-ajax.php' ) ),
			'nonce'   => wp_create_nonce( TRANSIDA_NONCE ),
		);

		wp_localize_script( 'jquery', 'transida_data', $header_data );

		if ( transida_set( $options, 'footer_js' ) ) {

			wp_add_inline_script( 'jquery', transida_set( $options, 'footer_js' ) );
		}

	}

	/**
	 * The major styles loader to load all the styles of the theme. Developer can hookup own styles.
	 * All the styles are being load in head.
	 *
	 * @return array Returns the array of styles to load
	 */
	public static function styles() {
		
		$options     = transida_WSH()->option();
		$header_meta = get_post_meta( get_the_ID(), 'header_style_settings');
		$header_option = $options->get( 'header_style_settings' );
		$header = ( $header_meta ) ? $header_meta['0'] : $header_option;
		
		if ( $header == 'header_v1' ) {
		  $color_scheme =  'assets/css/color.css';
		} elseif ( $header == 'header_v2' ) {
			$color_scheme =  'assets/css/color-2.css';
		} elseif ( $header == 'header_v3' ) {
			$color_scheme =  'assets/css/color-3.css';
		} elseif ( $header == 'header_v4' ) {
			$color_scheme =  'assets/css/color-4.css';
		} else {
			$color_scheme =  'assets/css/color.css';
		}
		
		$styles = array(
			'google-fonts'      => self::fonts_url(),
			'bootstrap'      => 'assets/css/bootstrap.css',
			'fontawesome-all'      => 'assets/css/fontawesome-all.css',
			'animate'      => 'assets/css/animate.css',
			'custom-animate'      => 'assets/css/custom-animate.css',
			'flaticon'      => 'assets/css/flaticon.css',
			'stroke-gap'      => 'assets/css/stroke-gap.css',
			'owl'      => 'assets/css/owl.css',
			'jquery-ui'      => 'assets/css/jquery-ui.css',
			'jquery-fancybox'      => 'assets/css/jquery.fancybox.min.css',
			'scrollbar'      => 'assets/css/scrollbar.css',
			'hover'      => 'assets/css/hover.css',
			'jquery-touchspin'      => 'assets/css/jquery.touchspin.css',
			'botstrap-select'      => 'assets/css/botstrap-select.min.css',
			'swiper'      => 'assets/css/swiper.min.css',
			'color'      =>  $color_scheme,
			'polyglot-language-switcher'      => 'assets/css/polyglot-language-switcher.css',
			'main-style'        => 'assets/css/style.css',
			'custom'			=> 'assets/css/custom.css',
			'responsive'        => 'assets/css/responsive.css',
		);

		$styles = apply_filters( 'TRANSIDA/includes/classes/header_enqueue/styles', $styles );

		/**
		 * Enqueue the styles
		 *
		 * @var array
		 */
		foreach ( $styles as $name => $style ) {

			if ( strstr( $style, 'http' ) || strstr( $style, 'https' ) || strstr( $style, 'fonts.googleapis' ) ) {
				wp_enqueue_style( "transida-{$name}", $style );
			} else {
				wp_enqueue_style( "transida-{$name}", get_template_directory_uri() . '/' . $style );
			}
		}
		$options      = transida_WSH()->option();
		$custom_style = '';

		wp_add_inline_style( 'color', $custom_style );

		$header_styles = self::header_styles(); 
		
		if ( $custom_font = $options->get('theme_custom_font') ) {
            $header_styles .= transida_custom_fonts_load( $custom_font );
        }

		wp_add_inline_style( 'transida-main-style', $header_styles );
	}

	/**
	 * Register custom fonts.
	 */
	public static function fonts_url() {
		$fonts_url = '';

		$font_families['poppins']      = 'Poppins:wght@400,600,700,800';
		$font_families['yantramanav']      = 'Yantramanav:wght@300,400,500,700,900&display=swap';
		
		$font_families = apply_filters( 'TRANSIDA/includes/classes/header_enqueue/font_families', $font_families );

		$query_args = array(
			'family' => urlencode( implode( '|', $font_families ) ),
			'subset' => urlencode( 'latin,latin-ext' ),
		);

		$protocol  = is_ssl() ? 'https' : 'http';
		$fonts_url = add_query_arg( $query_args, $protocol . '://fonts.googleapis.com/css' );

		return esc_url_raw($fonts_url);
	}


	/**
	 * Add preconnect for Google Fonts.
	 *
	 * @since TRANSIDA 1.0
	 *
	 * @param array  $urls          URLs to print for resource hints.
	 * @param string $relation_type The relation type the URLs are printed.
	 *
	 * @return array $urls           URLs to print for resource hints.
	 */
	public static function resource_hints( $urls, $relation_type ) {
		if ( wp_style_is( 'transida-fonts', 'queue' ) && 'preconnect' === $relation_type ) {
			$urls[] = array(
				'href' => 'https://fonts.gstatic.com',
				'crossorigin',
			);
		}

		return $urls;
	}

	/**
	 * header_styles
	 *
	 * @since TRANSIDA 1.0
	 *
	 * @param array $urls URLs to print for resource hints.
	 */
	public static function header_styles() {

		$data = \TRANSIDA\Includes\Classes\Common::instance()->data( 'blog' )->get();

		$options = transida_WSH()->option();

		$styles = '';
		if ( $options->get( 'footer_top_button' ) ) :
			$styles .= "#topcontrol {
				background: " . $options->get( 'button_bg' ) . " none repeat scroll 0 0 !important;
				opacity: 0.5;

				color: " . $options->get( 'button_color' ) . " !important;

			}";

		endif;

		$settings = get_theme_mod( TRANSIDA_NAME . '_options-mods' );

		if ( $custom_font = transida_set( $settings, 'theme_custom_font' ) ) {

			$styles .= apply_filters('transida_redux_custom_fonts_load', $custom_font );


		}

		return $styles;
	}


}