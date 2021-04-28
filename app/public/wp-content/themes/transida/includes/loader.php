<?php


defined( 'TRANSIDA_NAME' ) or define( 'TRANSIDA_NAME', 'transida' );

define( 'TRANSIDA_ROOT', get_template_directory() . '/' );

require_once get_template_directory() . '/includes/functions/functions.php';
include_once get_template_directory() . '/includes/classes/base.php';
include_once get_template_directory() . '/includes/classes/dotnotation.php';
include_once get_template_directory() . '/includes/classes/header-enqueue.php';
include_once get_template_directory() . '/includes/classes/options.php';
include_once get_template_directory() . '/includes/classes/ajax.php';
include_once get_template_directory() . '/includes/classes/common.php';
include_once get_template_directory() . '/includes/classes/bootstrap_walker.php';
include_once get_template_directory() . '/includes/library/class-tgm-plugin-activation.php';
require_once get_template_directory() . '/includes/library/hook.php';

// Merlin demo import.
require_once get_template_directory() . '/demo-import/class-merlin.php';
require_once get_template_directory() . '/demo-import/merlin-config.php';
require_once get_template_directory() . '/demo-import/merlin-filters.php';

add_action( 'after_setup_theme', 'transida_wp_load', 5 );

function transida_wp_load() {

	defined( 'TRANSIDA_URL' ) or define( 'TRANSIDA_URL', get_template_directory_uri() . '/' );
	define(  'TRANSIDA_KEY','!@#transida');
	define(  'TRANSIDA_URI', get_template_directory_uri() . '/');

	if ( ! defined( 'TRANSIDA_NONCE' ) ) {
		define( 'TRANSIDA_NONCE', 'transida_wp_theme' );
	}

	( new \TRANSIDA\Includes\Classes\Base )->loadDefaults();
	( new \TRANSIDA\Includes\Classes\Ajax )->actions();

}
