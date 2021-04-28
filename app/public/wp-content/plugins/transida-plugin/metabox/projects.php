<?php
return array(
	'title'      => 'Transida Project Setting',
	'id'         => 'transida_meta_projects',
	'icon'       => 'el el-cogs',
	'position'   => 'normal',
	'priority'   => 'core',
	'post_types' => array( 'transida_project' ),
	'sections'   => array(
		array(
			'id'     => 'transida_projects_meta_setting',
			'fields' => array(
				array(
					'id'       => 'project_icon',
					'type'     => 'select',
					'title'    => esc_html__( 'Select Icons', 'transida' ),
					'options'  => get_fontawesome_icons(),
				),
				array(
					'id'    => 'project_link',
					'type'  => 'text',
					'title' => esc_html__( 'Read More Link', 'transida' ),
				),
			),
		),
	),
);