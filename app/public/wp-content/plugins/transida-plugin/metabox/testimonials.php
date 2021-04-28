<?php
return array(
	'title'      => 'Transida Testimonials Setting',
	'id'         => 'transida_meta_testimonials',
	'icon'       => 'el el-cogs',
	'position'   => 'normal',
	'priority'   => 'core',
	'post_types' => array( 'tran_testimonials' ),
	'sections'   => array(
		array(
			'id'     => 'transida_testimonials_meta_setting',
			'fields' => array(
				array(
					'id'       => 'client_image',
					'type'     => 'media',
					'url'      => true,
					'title'    => esc_html__( 'Client Logo Image', 'transida' ),
					'desc'     => esc_html__( 'Insert Client Logo Image URl', 'transida' ),
				),
				array(
					'id'    => 'test_designation',
					'type'  => 'text',
					'title' => esc_html__( 'Designation', 'transida' ),
				),
				array(
					'id'    => 'testimonial_rating',
					'type'  => 'select',
					'title' => esc_html__( 'Choose the Client Rating', 'transida' ),
					'options'  => array(
						'1' => '1',
						'2' => '2',
						'3' => '3',
						'4' => '4',
						'5' => '5',
					),
					'default'  => '5',
				),
			),
		),
	),
);