<?php
return array(
	'title'      => 'Transida History Setting',
	'id'         => 'transida_meta_history',
	'icon'       => 'el el-cogs',
	'position'   => 'normal',
	'priority'   => 'core',
	'post_types' => array( 'transida_history' ),
	'sections'   => array(
		array(
			'id'     => 'transida_history_meta_setting',
			'fields' => array(
				array(
					'id'    => 'history_date',
					'type'  => 'textarea',
					'title' => esc_html__( 'Enter The History Date ', 'transida' ),
				),
			),
		),
	),
);