<?php
return array(
	'title'      => esc_html__( 'Header 1 Setting', 'transida' ),
	'id'         => 'header_setting',
	'desc'       => '',
	'subsection' => true,
	'fields'     => array(
		array(
			'id'      => 'logo_type',
			'type'    => 'button_set',
			'title'   => esc_html__( 'Logo Style', 'transida' ),
			'desc'    => esc_html__( 'Select anyone logo style to show in header', 'transida' ),
			'options' => array(
				'image' => esc_html__( 'Image Logo', 'transida' ),
				'text'  => esc_html__( 'Text Logo', 'transida' ),
			),
			'default' => 'image',
		),
		array(
			'id'       => 'image_logo',
			'type'     => 'media',
			'url'      => true,
			'title'    => esc_html__( 'Logo', 'transida' ),
			'subtitle' => esc_html__( 'Insert site logo image with adjustable size for the logo section', 'transida' ),
			'default'  => array( 'url' => get_template_directory_uri() . '/assets/images/logo-2.png' ),
			'required' => array( array( 'logo_type', 'equals', 'image' ) ),
		),
		array(
			'id'       => 'logo_dimension',
			'type'     => 'dimensions',
			'title'    => esc_html__( 'Logo Dimentions', 'transida' ),
			'subtitle' => esc_html__( 'Select Logo Dimentions', 'transida' ),
			'units'    => array( 'em', 'px', '%' ),
			'default'  => array( 'Width' => '', 'Height' => '' ),
			'required' => array(
				array( 'logo_type', 'equals', 'image' ),
			),
		),
		array(
			'id'       => 'logo_text',
			'type'     => 'text',
			'title'    => esc_html__( 'Logo Text', 'transida' ),
			'subtitle' => esc_html__( 'Enter Logo Text', 'transida' ),
			'required' => array(
				array( 'logo_type', 'equals', 'text' ),
			),
		),
		array(
			'id'          => 'logo_typography',
			'type'        => 'typography',
			'title'       => esc_html__( 'Typography', 'transida' ),
			'google'      => true,
			'font-backup' => false,
			'text-align'  => false,
			'line-height' => false,
			'output'      => array( 'h2.site-description' ),
			'units'       => 'px',
			'subtitle'    => esc_html__( 'Select Styles for text logo', 'transida' ),
			'default'     => array(
				'color'       => '#333',
				'font-style'  => '700',
				'font-family' => 'Abel',
				'google'      => true,
				'font-size'   => '33px',
			),
			'required'    => array(
				array( 'logo_type', 'equals', 'text' ),
			),
		),

		array(
			'id'    => 'header_social_share',
			'type'  => 'social_media',
			'title' => esc_html__( 'Social Profiles', 'transida' ),
			'desc'  => esc_html__( 'Click an icon to activate social profile icons in header.', 'transida' ),
		),
	),
);
