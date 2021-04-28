<?php
return array(
	'title'      => 'Transida Network Setting',
	'id'         => 'transida_meta_network',
	'icon'       => 'el el-cogs',
	'position'   => 'normal',
	'priority'   => 'core',
	'post_types' => array( 'transida_network' ),
	'sections'   => array(
		array(
			'id'     => 'transida_network_meta_setting',
			'fields' => array(
				array(
					'id'    => 'phone_no',
					'type'  => 'text',
					'title' => esc_html__( 'Enter The Phone Number ', 'transida' ),
				),
				array(
					'id'    => 'email_address',
					'type'  => 'text',
					'title' => esc_html__( 'Enter The Email Address ', 'transida' ),
				),
				array(
					'id'    => 'address',
					'type'  => 'textarea',
					'title' => esc_html__( 'Enter The Address ', 'transida' ),
				),
			),
		),
	),
);