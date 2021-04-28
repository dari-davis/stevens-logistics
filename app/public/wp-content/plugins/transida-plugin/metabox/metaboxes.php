<?php
if ( ! function_exists( "transida_add_metaboxes" ) ) {
	function transida_add_metaboxes( $metaboxes ) {
		$directories_array = array(
			'page.php',
			'projects.php',
			'service.php',
			'team.php',
			'testimonials.php',
			'history.php',
			'network.php',
			'event.php'
		);
		foreach ( $directories_array as $dir ) {
			$metaboxes[] = require_once( TRANSIDAPLUGIN_PLUGIN_PATH . '/metabox/' . $dir );
		}

		return $metaboxes;
	}

	add_action( "redux/metaboxes/transida_options/boxes", "transida_add_metaboxes" );
}

