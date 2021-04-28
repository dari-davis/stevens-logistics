<?php

return array(
	'title'      => esc_html__( '404 Page Settings', 'transida' ),
	'id'         => '404_setting',
	'desc'       => '',
	'subsection' => true,
	'fields'     => array(
		array(
			'id'      => '404_source_type',
			'type'    => 'button_set',
			'title'   => esc_html__( '404 Source Type', 'transida' ),
			'options' => array(
				'd' => esc_html__( 'Default', 'transida' ),
				'e' => esc_html__( 'Elementor', 'transida' ),
			),
			'default' => 'd',
		),
		array(
			'id'       => '404_elementor_template',
			'type'     => 'select',
			'title'    => __( 'Template', 'transida' ),
			'data'     => 'posts',
			'args'     => [
				'post_type' => [ 'elementor_library' ],
			],
			'required' => [ '404_source_type', '=', 'e' ],
		),
		array(
			'id'       => '404_default_st',
			'type'     => 'section',
			'title'    => esc_html__( '404 Default', 'transida' ),
			'indent'   => true,
			'required' => [ '404_source_type', '=', 'd' ],
		),
		array(
			'id'      => '404_page_banner',
			'type'    => 'switch',
			'title'   => esc_html__( 'Show Banner', 'transida' ),
			'desc'    => esc_html__( 'Enable to show banner on blog', 'transida' ),
			'default' => true,
		),
		array(
			'id'       => 'error_page_banner_image',
			'type'     => 'media',
			'url'      => true,
			'title'    => esc_html__( 'Banner Background Image', 'transida' ),
			'desc'     => esc_html__( 'Insert background image for banner', 'transida' ),
			'default'  => '',
			'required' => array( '404_page_banner', '=', true ),
		),
		array(
			'id'       => 'error_page_bg_image',
			'type'     => 'media',
			'url'      => true,
			'title'    => esc_html__( 'Background Image', 'transida' ),
			'desc'     => esc_html__( 'Insert 404 Page Background image', 'transida' ),
			'default'  => '',
			'required' => array( '404_page_banner', '=', true ),
		),
		array(
			'id'       => 'error_image',
			'type'     => 'media',
			'url'      => true,
			'title'    => esc_html__( '404 Error Image', 'transida' ),
			'desc'     => esc_html__( 'Insert 404 Page Error image', 'transida' ),
			'default'  => '',
			'required' => array( '404_page_banner', '=', true ),
		),
		array(
			'id'    => '404-page_title',
			'type'  => 'text',
			'title' => esc_html__( '404 Title', 'transida' ),
			'desc'  => esc_html__( 'Enter 404 section title that you want to show', 'transida' ),
		),
		array(
			'id'    => '404-page-text',
			'type'  => 'textarea',
			'title' => esc_html__( '404 Page Description', 'transida' ),
			'desc'  => esc_html__( 'Enter 404 page description that you want to show.', 'transida' ),
		),
		array(
			'id'    => 'back_home_btn',
			'type'  => 'switch',
			'title' => esc_html__( 'Show Button', 'transida' ),
			'desc'  => esc_html__( 'Enable to show back to home button.', 'transida' ),
			'default'  => true,
		),
		array(
			'id'       => 'back_home_btn_label',
			'type'     => 'text',
			'title'    => esc_html__( 'Button Label', 'transida' ),
			'desc'     => esc_html__( 'Enter back to home button label that you want to show.', 'transida' ),
			'default'  => esc_html__( 'Back To Home', 'transida' ),
			'required' => array( 'back_home_btn', '=', true ),
		),
		array(
			'id'     => '404_post_settings_end',
			'type'   => 'section',
			'indent' => false,
		),

	),
);





