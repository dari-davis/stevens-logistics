<?php

return array(
	'title'  => esc_html__( 'Blog Page Settings', 'transida' ),
	'id'     => 'blog_setting',
	'desc'   => '',
	'icon'   => 'el el-indent-left',
	'fields' => array(
		array(
			'id'      => 'blog_source_type',
			'type'    => 'button_set',
			'title'   => esc_html__( 'Blog Source Type', 'transida' ),
			'options' => array(
				'd' => esc_html__( 'Default', 'transida' ),
				'e' => esc_html__( 'Elementor', 'transida' ),
			),
			'default' => 'd',
		),
		array(
			'id'       => 'blog_elementor_template',
			'type'     => 'select',
			'title'    => __( 'Template', 'transida' ),
			'data'     => 'posts',
			'args'     => [
				'post_type' => [ 'elementor_library' ],
				'posts_per_page'=> -1,
			],
			'required' => [ 'blog_source_type', '=', 'e' ],
		),

		array(
			'id'       => 'blog_default_st',
			'type'     => 'section',
			'title'    => esc_html__( 'Blog Default', 'transida' ),
			'indent'   => true,
			'required' => [ 'blog_source_type', '=', 'd' ],
		),
		array(
			'id'      => 'blog_page_banner',
			'type'    => 'switch',
			'title'   => esc_html__( 'Show Banner', 'transida' ),
			'desc'    => esc_html__( 'Enable to show banner on blog', 'transida' ),
			'default' => true,
		),
		array(
			'id'       => 'blog_banner_title',
			'type'     => 'text',
			'title'    => esc_html__( 'Banner Section Title', 'transida' ),
			'desc'     => esc_html__( 'Enter the title to show in banner section', 'transida' ),
			'required' => array( 'blog_page_banner', '=', true ),
		),
		array(
			'id'       => 'banner_banner_text',
			'type'     => 'text',
			'title'    => esc_html__( 'Banner Transparent Title', 'transida' ),
			'desc'     => esc_html__( 'Enter the Transparent Title to show in Banner section', 'transida' ),
			'required' => array( 'blog_page_banner', '=', true ),
		),
		array(
			'id'       => 'blog_page_background',
			'type'     => 'media',
			'url'      => true,
			'title'    => esc_html__( 'Background Image', 'transida' ),
			'desc'     => esc_html__( 'Insert background image for banner', 'transida' ),
			'default'  => '',
			'required' => array( 'blog_page_banner', '=', true ),
		),

		array(
			'id'       => 'blog_sidebar_layout',
			'type'     => 'image_select',
			'title'    => esc_html__( 'Layout', 'transida' ),
			'subtitle' => esc_html__( 'Select main content and sidebar alignment.', 'transida' ),
			'options'  => array(

				'left'  => array(
					'alt' => esc_html__( '2 Column Left', 'transida' ),
					'img' => get_template_directory_uri() . '/assets/images/redux/2cl.png',
				),
				'full'  => array(
					'alt' => esc_html__( '1 Column', 'transida' ),
					'img' => get_template_directory_uri() . '/assets/images/redux/1col.png',
				),
				'right' => array(
					'alt' => esc_html__( '2 Column Right', 'transida' ),
					'img' => get_template_directory_uri() . '/assets/images/redux/2cr.png',
				),
			),

			'default' => 'right',
		),

		array(
			'id'       => 'blog_page_sidebar',
			'type'     => 'select',
			'title'    => esc_html__( 'Sidebar', 'transida' ),
			'desc'     => esc_html__( 'Select sidebar to show at blog listing page', 'transida' ),
			'required' => array(
				array( 'blog_sidebar_layout', '=', array( 'left', 'right' ) ),
			),
			'options'  => transida_get_sidebars(),
		),
		array(
			'id'      => 'blog_post_author',
			'type'    => 'switch',
			'title'   => esc_html__( 'Show Author', 'transida' ),
			'desc'    => esc_html__( 'Enable to show author on posts listing', 'transida' ),
			'default' => true,
		),
		array(
			'id'      => 'blog_post_comments',
			'type'    => 'switch',
			'title'   => esc_html__( 'Show Post Comments', 'transida' ),
			'desc'    => esc_html__( 'Enable to show post comments on posts listing', 'transida' ),
			'default' => true,
		),
		array(
			'id'       => 'blog_default_ed',
			'type'     => 'section',
			'indent'   => false,
			'required' => [ 'blog_source_type', '=', 'd' ],
		),
	),
);





