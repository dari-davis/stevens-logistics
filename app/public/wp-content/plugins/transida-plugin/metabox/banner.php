<?php

return array(
	'id'     => 'transida_banner_settings',
	'title'  => esc_html__( "Transida Banner Settings", "konia" ),
	'fields' => array(
		array(
			'id'      => 'banner_source_type',
			'type'    => 'button_set',
			'title'   => esc_html__( 'Banner Source Type', 'transida' ),
			'options' => array(
				'd' => esc_html__( 'Default', 'transida' ),
				'e' => esc_html__( 'Elementor', 'transida' ),
			),
			'default' => '',
		),
		array(
			'id'       => 'banner_elementor_template',
			'type'     => 'select',
			'title'    => __( 'Template', 'viral-buzz' ),
			'data'     => 'posts',
			'args'     => [
				'post_type' => [ 'elementor_library' ],
				'posts_per_page'=> -1,
			],
			'required' => [ 'banner_source_type', '=', 'e' ],
		),
		array(
			'id'       => 'banner_page_banner',
			'type'     => 'switch',
			'title'    => esc_html__( 'Show Banner', 'transida' ),
			'default'  => false,
			'required' => [ 'banner_source_type', '=', 'd' ],
		),
		array(
			'id'       => 'banner_banner_title',
			'type'     => 'text',
			'title'    => esc_html__( 'Banner Section Title', 'transida' ),
			'desc'     => esc_html__( 'Enter the title to show in banner section', 'transida' ),
			'required' => array( 'banner_page_banner', '=', true ),
		),
		array(
			'id'       => 'banner_banner_text',
			'type'     => 'text',
			'title'    => esc_html__( 'Transparent Title', 'transida' ),
			'desc'     => esc_html__( 'Enter the Transparent Title to show in banner section', 'transida' ),
			'required' => array( 'banner_page_banner', '=', true ),
		),
		array(
			'id'       => 'banner_page_background',
			'type'     => 'media',
			'url'      => true,
			'title'    => esc_html__( 'Background Image', 'transida' ),
			'desc'     => esc_html__( 'Insert background image for banner', 'transida' ),
			'default'  => array(
				'url' => TRANSIDA_URI . 'assets/images/background/bg-20.jpg',
			),
			'required' => array( 'banner_page_banner', '=', true ),
		),
	),
);