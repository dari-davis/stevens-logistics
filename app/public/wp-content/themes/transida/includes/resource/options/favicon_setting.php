<?php
return array(
	'title'      => esc_html__( 'Favicon Setting', 'transida' ),
	'id'         => 'favicon_setting',
	'desc'       => '',
	'subsection' => false,
	'fields'     => array(
		array(
			'id'       => 'image_favicon',
			'type'     => 'media',
			'url'      => true,
			'title'    => esc_html__( 'Favicon', 'transida' ),
			'subtitle' => esc_html__( 'Insert site favicon image', 'transida' ),
			'default'  => array( 'url' => get_template_directory_uri() . '/assets/images/favicon.png' ),
		),
		array(
			'id'       => 'favicon_settings_section_end',
			'type'     => 'section',
			'indent'      => false,
		),
	),
);
