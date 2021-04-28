<?php

return array(
	'title'      => esc_html__( 'Footer Setting', 'transida' ),
	'id'         => 'footer_setting',
	'desc'       => '',
	'subsection' => false,
	'fields'     => array(
		array(
			'id'      => 'footer_source_type',
			'type'    => 'button_set',
			'title'   => esc_html__( 'Footer Source Type', 'transida' ),
			'options' => array(
				'd' => esc_html__( 'Default', 'transida' ),
				'e' => esc_html__( 'Elementor', 'transida' ),
			),
			'default' => 'd',
		),
		array(
			'id'       => 'footer_elementor_template',
			'type'     => 'select',
			'title'    => __( 'Template', 'transida' ),
			'data'     => 'posts',
			'args'     => [
				'post_type' => [ 'elementor_library' ],
				'posts_per_page'	=> -1
			],
			'required' => [ 'footer_source_type', '=', 'e' ],
		),
		array(
			'id'       => 'footer_style_section_start',
			'type'     => 'section',
			'indent'      => true,
			'title'    => esc_html__( 'Footer Settings', 'transida' ),
			'required' => array( 'footer_source_type', '=', 'd' ),
		),
		array(
		    'id'       => 'footer_style_settings',
		    'type'     => 'image_select',
		    'title'    => esc_html__( 'Choose Footer Styles', 'transida' ),
		    'subtitle' => esc_html__( 'Choose Footer Styles', 'transida' ),
		    'options'  => array(

			    'footer_v1'  => array(
				    'alt' => esc_html__( 'Footer Style 1', 'transida' ),
				    'img' => get_template_directory_uri() . '/assets/images/redux/footer/footer1.png',
			    ),
			    'footer_v2'  => array(
				    'alt' => esc_html__( 'Footer Style 2', 'transida' ),
				    'img' => get_template_directory_uri() . '/assets/images/redux/footer/footer2.png',
			    ),
				'footer_v3'  => array(
				    'alt' => esc_html__( 'Footer Style 3', 'transida' ),
				    'img' => get_template_directory_uri() . '/assets/images/redux/footer/footer3.png',
			    ),
			    'footer_v4'  => array(
				    'alt' => esc_html__( 'Footer Style 4', 'transida' ),
				    'img' => get_template_directory_uri() . '/assets/images/redux/footer/footer4.png',
			    ),
			),
			'required' => array( 'footer_source_type', '=', 'd' ),
			'default' => 'footer_set',
	    ),
		
		
		/***********************************************************************
								Footer Version 1 Start
		************************************************************************/
		array(
			'id'       => 'footer_v1_settings_section_start',
			'type'     => 'section',
			'indent'      => true,
			'title'    => esc_html__( 'Footer Style One Settings', 'transida' ),
			'required' => array( 'footer_style_settings', '=', 'footer_v1' ),
		),
		array(
			'id'      => 'copyright_text',
			'type'    => 'textarea',
			'title'   => __( 'Copyright Text', 'transida' ),
			'desc'    => esc_html__( 'Enter the Copyright Text', 'transida' ),
			'required' => array( 'footer_style_settings', '=', 'footer_v1' ),
		),
		array(
			'id'      => 'footer_menu',
			'type'    => 'textarea',
			'title'   => __( 'Footer Menu html', 'transida' ),
			'desc'    => esc_html__( 'Enter the raw html', 'transida' ),
			'default' => '',
			'required' => array( 'footer_style_settings', '=', 'footer_v1' ),
		),
		/***********************************************************************
								Footer Version 2 Start
		************************************************************************/
		array(
			'id'       => 'footer_v2_settings_section_start',
			'type'     => 'section',
			'indent'      => true,
			'title'    => esc_html__( 'Footer Style Two Settings', 'transida' ),
			'required' => array( 'footer_style_settings', '=', 'footer_v2' ),
		),
		array(
			'id'       => 'footer_bg_img',
			'type'     => 'media',
			'url'      => true,
			'title'    => esc_html__( 'Footer BG Image', 'transida' ),
			'required' => array( 'footer_style_settings', '=', 'footer_v2' ),
		),
		array(
		    'id'       => 'show_subscribe_form',
		    'type'     => 'switch',
		    'title'    => esc_html__( 'Enable Subscribe Form', 'transida' ),
		    'desc'     => esc_html__( 'Enable/Disable Subscribe Form.', 'transida' ),
			'default'  => '',
		    'required' => array( 'footer_style_settings', '=', 'footer_v2' ),
	    ),
		array(
			'id'       => 'footer_logo_img',
			'type'     => 'media',
			'url'      => true,
			'title'    => esc_html__( 'Footer Logo Image', 'transida' ),
			'required' => array( 'show_subscribe_form', '=', true ),
		),
		array(
			'id'      => 'footer_mailchimp_form_id',
			'type'    => 'text',
			'title'   => __( 'MailChimp Form ID', 'transida' ),
			'desc'    => esc_html__( 'Enter the MailChimp Form ID', 'transida' ),
			'required' => array( 'show_subscribe_form', '=', true ),
		),
		array(
			'id'      => 'mobile_app_title',
			'type'    => 'text',
			'title'   => __( 'Mobile App Title', 'transida' ),
			'desc'    => esc_html__( 'Enter the Mobile App Title', 'transida' ),
			'required' => array( 'show_subscribe_form', '=', true ),
		),
		array(
			'id'      => 'footer_apple_link_v2',
			'type'    => 'text',
			'title'   => __( 'Apple Link', 'transida' ),
			'desc'    => esc_html__( 'Enter the Apple External Link', 'transida' ),
			'required' => array( 'show_subscribe_form', '=', true ),
		),
		array(
			'id'      => 'footer_android_link_v2',
			'type'    => 'text',
			'title'   => __( 'Android Link', 'transida' ),
			'desc'    => esc_html__( 'Enter the Android External Link', 'transida' ),
			'required' => array( 'show_subscribe_form', '=', true ),
		),
		array(
			'id'      => 'copyright_text_v2',
			'type'    => 'textarea',
			'title'   => __( 'Copyright Text', 'transida' ),
			'desc'    => esc_html__( 'Enter the Copyright Text', 'transida' ),
			'required' => array( 'footer_style_settings', '=', 'footer_v2' ),
		),
		array(
			'id'      => 'footer_menu_2',
			'type'    => 'textarea',
			'title'   => __( 'Footer Menu html', 'transida' ),
			'desc'    => esc_html__( 'Enter the raw html', 'transida' ),
			'default' => '',
			'required' => array( 'footer_style_settings', '=', 'footer_v2' ),
		),
		/***********************************************************************
								Footer Version 3 Start
		************************************************************************/
		array(
			'id'       => 'footer_v3_settings_section_start',
			'type'     => 'section',
			'indent'      => true,
			'title'    => esc_html__( 'Footer Style Three Settings', 'transida' ),
			'required' => array( 'footer_style_settings', '=', 'footer_v3' ),
		),
		array(
			'id'      => 'copyright_text_v3',
			'type'    => 'textarea',
			'title'   => __( 'Copyright Text', 'transida' ),
			'desc'    => esc_html__( 'Enter the Copyright Text', 'transida' ),
			'required' => array( 'footer_style_settings', '=', 'footer_v3' ),
		),
		array(
			'id'    => 'footer_v3_social_share',
			'type'  => 'social_media',
			'title' => esc_html__( 'Social Profiles', 'transida' ),
			'required' => array( 'footer_style_settings', '=', 'footer_v3' ),
		),
		/***********************************************************************
								Footer Version 4 Start
		************************************************************************/
		array(
			'id'       => 'footer_v4_settings_section_start',
			'type'     => 'section',
			'indent'      => true,
			'title'    => esc_html__( 'Footer Style Four Settings', 'transida' ),
			'required' => array( 'footer_style_settings', '=', 'footer_v4' ),
		),
		array(
			'id'       => 'footer_bg_img2',
			'type'     => 'media',
			'url'      => true,
			'title'    => esc_html__( 'Left Side Image', 'transida' ),
			'required' => array( 'footer_style_settings', '=', 'footer_v4' ),
		),
		array(
			'id'      => 'copyright_text_v4',
			'type'    => 'textarea',
			'title'   => __( 'Copyright Text', 'transida' ),
			'desc'    => esc_html__( 'Enter the Copyright Text', 'transida' ),
			'required' => array( 'footer_style_settings', '=', 'footer_v4' ),
		),
		array(
			'id'    => 'footer_v4_social_share',
			'type'  => 'social_media',
			'title' => esc_html__( 'Social Profiles', 'transida' ),
			'required' => array( 'footer_style_settings', '=', 'footer_v4' ),
		),
		array(
			'id'       => 'footer_default_ed',
			'type'     => 'section',
			'indent'   => false,
			'required' => [ 'footer_source_type', '=', 'd' ],
		),
	),
);
