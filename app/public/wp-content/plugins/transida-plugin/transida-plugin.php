<?php
/**
 * Plugin Name: Transida Plugin
 * Plugin URI: http://themeforest.net/user/template-path/
 * Description: Supported plugin for Transida WordPress theme
 * Author: Template Path
 * Version: 1.0
 * Author URI: https://themeforest.net/user/template-path/
 *
 * @package transida-plugin
 */

defined( 'TRANSIDAPLUGIN_PLUGIN_PATH' ) || define( 'TRANSIDAPLUGIN_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );
define( 'TRANSIDA_PLUGIN_URI', plugins_url( 'transida-plugin' ) . '/' );
require_once plugin_dir_path( __FILE__ ) . 'file_crop.php';
function transida_bunch_widget_init2()
{
	//footer Widget
	if( class_exists( 'Transida_Contact_Us' ) )register_widget( 'Transida_Contact_Us' );
	if( class_exists( 'Transida_Our_Gallery' ) )register_widget( 'Transida_Our_Gallery' );
	
	//footer Two Widget
	if( class_exists( 'Transida_About_Company' ) )register_widget( 'Transida_About_Company' );
	if( class_exists( 'Transida_Contact_Us_V2' ) )register_widget( 'Transida_Contact_Us_V2' );
	
	//footer Three Widget
	if( class_exists( 'Transida_About_Company_V2' ) )register_widget( 'Transida_About_Company_V2' );
	if( class_exists( 'Transida_Recent_Post' ) )register_widget( 'Transida_Recent_Post' );
	
	//footer Four Widget
	if( class_exists( 'Transida_About_Company_V3' ) )register_widget( 'Transida_About_Company_V3' );
	
	//Service Widget
	if( class_exists( 'Transida_services_sidebar' ) )register_widget( 'Transida_services_sidebar' );
	if( class_exists( 'Transida_Brochures' ) )register_widget( 'Transida_Brochures' );
	if( class_exists( 'Transida_Get_a_Quote' ) )register_widget( 'Transida_Get_a_Quote' );
	
	
	//Blog Widget
	if( class_exists( 'Transida_Popular_Post' ) )register_widget( 'Transida_Popular_Post' );
	if( class_exists( 'Transida_Advertisement' ) )register_widget( 'Transida_Advertisement' );
	
	
}
add_action( 'widgets_init', 'transida_bunch_widget_init2' );	

class TRANSIDAPLUGIN_Plugin_Core {

	/**
	 * The instance variable.
	 *
	 * @var [type]
	 */
	public static $instance;

	/**
	 * The main constructor
	 */
	function __construct() {
		self::includes();
		$this->init();

	}

	/**
	 * Load the instance.
	 *
	 * @return [type] [description]
	 */
	public static function instance() {

		if ( is_null( self::$instance ) ) {
			self::$instance = new self();
		}

		return self::$instance;
	}

	public static function includes() {
		require_once TRANSIDAPLUGIN_PLUGIN_PATH . '/inc/helpers/functions.php';
		require_once TRANSIDAPLUGIN_PLUGIN_PATH . '/elementor/elementor.php';
		require_once TRANSIDAPLUGIN_PLUGIN_PATH . '/inc/abstracts/class-post-type-abstract.php';
		require_once TRANSIDAPLUGIN_PLUGIN_PATH . '/inc/abstracts/class-taxonomy-abstract.php';
		require_once TRANSIDAPLUGIN_PLUGIN_PATH . '/inc/helpers/widgets.php';
		require_once TRANSIDAPLUGIN_PLUGIN_PATH . '/inc/post_types/project.php';
		require_once TRANSIDAPLUGIN_PLUGIN_PATH . '/inc/post_types/team.php';
		require_once TRANSIDAPLUGIN_PLUGIN_PATH . '/inc/post_types/testimonials.php';
		require_once TRANSIDAPLUGIN_PLUGIN_PATH . '/inc/post_types/services.php';
		require_once TRANSIDAPLUGIN_PLUGIN_PATH . '/inc/post_types/faqs.php';
		require_once TRANSIDAPLUGIN_PLUGIN_PATH . '/inc/post_types/history.php';
		require_once TRANSIDAPLUGIN_PLUGIN_PATH . '/inc/post_types/network.php';
		require_once TRANSIDAPLUGIN_PLUGIN_PATH . '/inc/taxonomies.php';
		
		if ( ! class_exists( 'Redux' ) ) {
			require_once TRANSIDAPLUGIN_PLUGIN_PATH . 'redux-framework/redux-framework.php';
			require_once TRANSIDAPLUGIN_PLUGIN_PATH . '/metabox/metaboxes.php';
		}

	}

	function init() {
		TRANSIDAPLUGIN\Inc\Post_Types\Project::init();
		TRANSIDAPLUGIN\Inc\Post_Types\Team::init();
		TRANSIDAPLUGIN\Inc\Post_Types\Testimonials::init();
		TRANSIDAPLUGIN\Inc\Post_Types\Services::init();
		TRANSIDAPLUGIN\Inc\Post_Types\Faqs::init();
		TRANSIDAPLUGIN\Inc\Post_Types\History::init();
		TRANSIDAPLUGIN\Inc\Post_Types\Network::init();
		
		add_action( 'init', array( '\TRANSIDAPLUGIN\Inc\Taxonomies', 'init' ) );
	}
}

/**
 * [transida_get_sidebars description]
 *
 * @param  boolean $multi [description].
 *
 * @return [type]         [description]
 */
function transidas_get_sidebars( $multi = false ) {
	global $wp_registered_sidebars;

	$sidebars = ! ( $wp_registered_sidebars ) ? get_option( 'wp_registered_sidebars' ) : $wp_registered_sidebars;

	if ( $multi ) {
		$data[] = array( 'value' => '', 'label' => 'No Sidebar' );
	} else {
		$data = array( '' => esc_html__( 'No Sidebar', 'hlc' ) );
	}

	foreach ( ( array ) $sidebars as $sidebar ) {

		if ( $multi ) {

			$data[] = array( 'value' => transida_set( $sidebar, 'id' ), 'label' => transida_set( $sidebar, 'name' ) );
		} else {

			$data[ transida_set( $sidebar, 'id' ) ] = transida_set( $sidebar, 'name' );
		}
	}

	return $data;
}

/**
 * [transida_social_profiler description]
 *
 * @param  [type] $obj [description]
 *
 * @return [type]      [description]
 */
function transida_social_profiler() {
	return array(
		'adn'                 => 'fa-adn',
		'android'             => 'fa-android',
		'apple'               => 'fa-apple',
		'behance'             => 'fa-behance',
		'behance_square'      => 'fa-behance-square',
		'bitbucket'           => 'fa-bitbucket',
		'bitcoin'             => 'fa-btc',
		'css3'                => 'fa-css3',
		'delicious'           => 'fa-delicious',
		'deviantart'          => 'fa-deviantart',
		'dribbble'            => 'fa-dribbble',
		'dropbox'             => 'fa-dropbox',
		'drupal'              => 'fa-drupal',
		'empire'              => 'fa-empire',
		'facebook'            => 'fa-facebook',
		'four_square'         => 'fa-foursquare',
		'git_square'          => 'fa-git-square',
		'github'              => 'fa-github',
		'github_alt'          => 'fa-github',
		'github_square'       => 'fa-github-square',
		'git_tip'             => 'fa-gittip',
		'google'              => 'fa-google',
		'google_plus'         => 'fa-google-plus',
		'google_plus_square'  => 'fa-google-plus-square',
		'hacker_news'         => 'fa-hacker-news',
		'html5'               => 'fa-html5',
		'instagram'           => 'fa-instagram',
		'joomla'              => 'fa-joomla',
		'js_fiddle'           => 'fa-jsfiddle',
		'linkedIn'            => 'fa-linkedin',
		'linkedIn_square'     => 'fa-linkedin-square',
		'linux'               => 'fa-linux',
		'MaxCDN'              => 'fa-maxcdn',
		'OpenID'              => 'fa-openid',
		'page_lines'          => 'fa-pagelines',
		'pied_piper'          => 'fa-pied-piper',
		'pinterest'           => 'fa-pinterest',
		'pinterest_square'    => 'fa-pinterest-square',
		'QQ'                  => 'fa-qq',
		'rebel'               => 'fa-rebel',
		'reddit'              => 'fa-reddit',
		'reddit_square'       => 'fa-reddit-square',
		'ren-ren'             => 'fa-renren',
		'share_alt'           => 'fa-share-alt',
		'share_square'        => 'fa-share-alt-square',
		'skype'               => 'fa-skype',
		'slack'               => 'fa-slack',
		'sound_cloud'         => 'fa-soundcloud',
		'spotify'             => 'fa-spotify',
		'stack_exchange'      => 'fa-stack-exchange',
		'stack_overflow'      => 'fa-stack-overflow',
		'steam'               => 'fa-steam',
		'steam_square'        => 'fa-steam-square',
		'stumble_upon'        => 'fa-stumbleupon',
		'stumble_upon_circle' => 'fa-stumbleupon-circle',
		'tencent_weibo'       => 'fa-tencent-weibo',
		'trello'              => 'fa-trello',
		'tumblr'              => 'fa-tumblr',
		'tumblr_square'       => 'fa-tumblr-square',
		'twitter'             => 'fa-twitter',
		'twitter_square'      => 'fa-twitter-square',
		'vimeo_square'        => 'fa-vimeo-square',
		'vine'                => 'fa-vine',
		'vK'                  => 'fa-vk',
		'weibo'               => 'fa-weibo',
		'weixin'              => 'fa-weixin',
		'windows'             => 'fa-windows',
		'wordPress'           => 'fa-wordpress',
		'xing'                => 'fa-xing',
		'xing_square'         => 'fa-xing-square',
		'yahoo'               => 'fa-yahoo',
		'yelp'                => 'fa-yelp',
		'youTube'             => 'fa-youtube',
		'youTube_play'        => 'fa-youtube-play',
		'youTube_square'      => 'fa-youtube-square',
	);
}

function TRANSIDAPLUGIN_P() {

	if ( ! isset( $GLOBALS['TRANSIDAPLUGIN_Plugin_p'] ) ) {
		$GLOBALS['TRANSIDAPLUGIN_Plugin'] = TRANSIDAPLUGIN_Plugin_Core::instance();
	}

	return $GLOBALS['TRANSIDAPLUGIN_Plugin'];
}

TRANSIDAPLUGIN_P();
if ( ! function_exists( 'transida_set' ) ) {

	function transida_set( $var, $key, $def = '' ) {
		/*if (!$var)
		return false;*/

		if ( is_object( $var ) && isset( $var->$key ) ) {
			return $var->$key;
		} elseif ( is_array( $var ) && isset( $var[ $key ] ) ) {
			return $var[ $key ];
		} elseif ( $def ) {
			return $def;
		} else {
			return false;
		}
	}

}

function transida_fontawesome_icons() {


	$pattern = '/\.(fa-(?:\w+(?:-)?)+):before\s*{\s*content/';

	$subject = wp_remote_get( get_template_directory_uri() . '/assets/css/font-awesome.min.css' );

	preg_match_all( $pattern, transida_set( $subject, 'body' ), $matches, PREG_SET_ORDER );
	$icons = array();
	foreach ( $matches as $match ) {
		$new_val            = ucwords( str_replace( 'fa-', '', $match[1] ) );
		$icons[ $match[1] ] = ucwords( str_replace( '-', ' ', $new_val ) );
	}

	return $icons;


}


function transida_encrypt( $param ) {
	return base64_encode( $param );
}


function transida_decrypt( $param ) {
	return base64_decode( $param );
}

function transida_taxonomy_regster($name, $post_type, $args) {
	// Register the taxonomy now so that the import works!
	register_taxonomy(
		$data['taxonomy'],
		apply_filters( 'woocommerce_taxonomy_objects_' . $data['taxonomy'], array( 'product' ) ),
		apply_filters( 'woocommerce_taxonomy_args_' . $data['taxonomy'], array(
			'hierarchical' => true,
			'show_ui'      => false,
			'query_var'    => true,
			'rewrite'      => false,
		) )
	);
}


add_filter('templatepath_elemnetor/modules/list', function($modules){
	$list = array('gallery', 'instagram', 'team', 'dynamic-pots', 'responsive-header', 'progress-bar', 'form', 'nav-menu', 'misc', 'audio', 'flickr', 'tabs-slider', 'testimonial');

	$modules = array_merge($modules, $list);

	return array_filter($modules);
});
