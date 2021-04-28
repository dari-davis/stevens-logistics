<?php

return array(
	'id'     => 'transida_header_settings',
	'title'  => esc_html__( "Transida Header Settings", "konia" ),
	'fields' => array(
		array(
			'id'      => 'header_source_type',
			'type'    => 'button_set',
			'title'   => esc_html__( 'Header Source Type', 'transida' ),
			'options' => array(
				'd' => esc_html__( 'Default', 'transida' ),
				'e' => esc_html__( 'Elementor', 'transida' ),
			),
			'default'=> '',
		),
		array(
			'id'       => 'header_new_elementor_template',
			'type'     => 'select',
			'title'    => __( 'Template', 'transida-plugin' ),
			'data'     => 'posts',
			'args'     => [
				'post_type' => [ 'elementor_library' ],
				'posts_per_page' => -1,
				'orderby'  => 'title',
				'order'     => 'DESC'
			],
			'required' => [ 'header_source_type', '=', 'e' ],
		),
		array(
			'id'       => 'header_style_settings',
			'type'     => 'image_select',
			'title'    => esc_html__( 'Choose Header Styles', 'transida' ),
			'options'  => array(
				'header_v1' => array(
					'alt' => 'Header Style 1',
					'img' => get_template_directory_uri() . '/assets/images/redux/header/header1.png',
				),
				'header_v2' => array(
					'alt' => 'Header Style 2',
					'img' => get_template_directory_uri() . '/assets/images/redux/header/header2.png',
				),
				'header_v3' => array(
					'alt' => 'Header Style 3',
					'img' => get_template_directory_uri() . '/assets/images/redux/header/header3.png',
				),
				'header_v4' => array(
					'alt' => 'Header Style 4',
					'img' => get_template_directory_uri() . '/assets/images/redux/header/header4.png',
				),
				'header_v5' => array(
					'alt' => 'OnePage Header Style',
					'img' => get_template_directory_uri() . '/assets/images/redux/header/header5.png',
				),
			),
			'required' => array( array( 'header_source_type', 'equals', 'd' ) ),
		),
	),
);