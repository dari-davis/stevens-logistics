<?php

return array(
	'title'      => esc_html__( 'Single Post Settings', 'transida' ),
	'id'         => 'single_post_setting',
	'desc'       => '',
	'subsection' => true,
	'fields'     => array(
		array(
			'id'      => 'single_source_type',
			'type'    => 'button_set',
			'title'   => esc_html__( 'Single Post Source Type', 'transida' ),
			'options' => array(
				'd' => esc_html__( 'Default', 'transida' ),
				'e' => esc_html__( 'Elementor', 'transida' ),
			),
			'default' => 'd',
		),

		array(
			'id'       => 'single_default_st',
			'type'     => 'section',
			'title'    => esc_html__( 'Post Default', 'transida' ),
			'indent'   => true,
			'required' => [ 'single_source_type', '=', 'd' ],
		),
		array(
			'id'      => 'single_post_date',
			'type'    => 'switch',
			'title'   => esc_html__( 'Show Date', 'transida' ),
			'desc'    => esc_html__( 'Enable to show post publish date on posts detail page', 'transida' ),
			'default' => false,
		),
		array(
			'id'      => 'single_post_author',
			'type'    => 'switch',
			'title'   => esc_html__( 'Show Author', 'transida' ),
			'desc'    => esc_html__( 'Enable to show author on posts detail page', 'transida' ),
			'default' => false,
		),

		array(
			'id'      => 'single_post_comments',
			'type'    => 'switch',
			'title'   => esc_html__( 'Show Comments', 'transida' ),
			'desc'    => esc_html__( 'Enable to show number of comments on posts single page', 'transida' ),
			'default' => false,
		),
		array(
			'id'      => 'facebook_sharing',
			'type'    => 'switch',
			'title'   => esc_html__( 'Show Facebook Post Share', 'transida' ),
			'desc'    => esc_html__( 'Enable to show Post Share to Facebook', 'transida' ),
			'default' => false,
		),
		array(
			'id'      => 'twitter_sharing',
			'type'    => 'switch',
			'title'   => esc_html__( 'Show Twitter Post Share', 'transida' ),
			'desc'    => esc_html__( 'Enable to show Post Share to Twitter', 'transida' ),
			'default' => false,
		),
		array(
			'id'      => 'linkedin_sharing',
			'type'    => 'switch',
			'title'   => esc_html__( 'Show Linkedin Post Share', 'transida' ),
			'desc'    => esc_html__( 'Enable to show Post Share to Linkedin', 'transida' ),
			'default' => false,
		),
		array(
			'id'      => 'pinterest_sharing',
			'type'    => 'switch',
			'title'   => esc_html__( 'Show Pinterest Post Share', 'transida' ),
			'desc'    => esc_html__( 'Enable to show Post Share to Pinterest', 'transida' ),
			'default' => false,
		),
		array(
			'id'      => 'reddit_sharing',
			'type'    => 'switch',
			'title'   => esc_html__( 'Show Reddit Post Share', 'transida' ),
			'desc'    => esc_html__( 'Enable to show Post Share to Reddit', 'transida' ),
			'default' => false,
		),
		array(
			'id'      => 'tumblr_sharing',
			'type'    => 'switch',
			'title'   => esc_html__( 'Show Tumblr Post Share', 'transida' ),
			'desc'    => esc_html__( 'Enable to show Post Share to Tumblr', 'transida' ),
			'default' => false,
		),
		array(
			'id'      => 'digg_sharing',
			'type'    => 'switch',
			'title'   => esc_html__( 'Show Digg Post Share', 'transida' ),
			'desc'    => esc_html__( 'Enable to show Post Share to Digg', 'transida' ),
			'default' => false,
		),
		array(
			'id'      => 'single_post_author_box',
			'type'    => 'switch',
			'title'   => esc_html__( 'Show Author Box', 'transida' ),
			'desc'    => esc_html__( 'Enable to show author box on post detail page.', 'transida' ),
			'default' => false,
		),
		array(
			'id'      => 'single_post_author_links',
			'type'    => 'switch',
			'title'   => esc_html__( 'Show Author Social Media', 'transida' ),
			'desc'    => esc_html__( 'Enable to show author Social Media on posts detail page', 'transida' ),
			'default' => false,
		),
		array(
			'id'    => 'single_post_author_social_share',
			'type'  => 'social_media',
			'title' => esc_html__( 'Author Social Profiles', 'transida' ),
			'desc'    => esc_html__( 'show author Social Media on posts detail page', 'transida' ),
		),
		array(
			'id'       => 'single_section_default_ed',
			'type'     => 'section',
			'indent'   => false,
			'required' => [ 'single_source_type', '=', 'd' ],
		),
	),
);





