<?php
/**
 * Theme config file.
 *
 * @package TRANSIDA
 * @author  ThemeKalia
 * @version 1.0
 * changed
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( 'Restricted' );
}

$config = array();

$config['default']['transida_main_header'][] 	= array( 'transida_preloader', 98 );
$config['default']['transida_main_header'][] 	= array( 'transida_main_header_area', 99 );

$config['default']['transida_main_footer'][] 	= array( 'transida_preloader', 98 );
$config['default']['transida_main_footer'][] 	= array( 'transida_main_footer_area', 99 );

$config['default']['transida_sidebar'][] 	    = array( 'transida_sidebar', 99 );

$config['default']['transida_banner'][] 	    = array( 'transida_banner', 99 );


return $config;
