<?php
return array(
	'title'      => 'Transida Service Setting',
	'id'         => 'transida_meta_service',
	'icon'       => 'el el-cogs',
	'position'   => 'normal',
	'priority'   => 'core',
	'post_types' => array( 'transida_service' ),
	'sections'   => array(
		array(
			'id'     => 'transida_service_meta_setting',
			'fields' => array(
				array(
					'id'       => 'icons_image',
					'type'     => 'media',
					'url'      => true,
					'title'    => esc_html__( 'Icon Image', 'transida' ),
					'desc'     => esc_html__( 'Insert Icon Image URl', 'transida' ),
				),
				array(
					'id'       => 'service_icon',
					'type'     => 'select',
					'title'    => esc_html__( 'Service Icons', 'transida' ),
					'options'  => get_fontawesome_icons(),
				),
				array(
					'id'    => 'ext_url',
					'type'  => 'text',
					'title' => esc_html__( 'Enter Read More Link', 'transida' ),
				),
			),
		),
	),
);