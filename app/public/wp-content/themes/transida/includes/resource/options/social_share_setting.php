<?php
return  array(
    'title'      => esc_html__( 'Social Share Setting', 'transida' ),
    'id'         => 'social_share_setting',
    'desc'       => '',
    'icon'			=> 'el el-globe',
	'fields'     => array(
        array(
            'id'    => 'icons_social_share',
            'type'  => 'social_media',
            'title' => esc_html__( 'Social Media', 'transida' ),
        ),
    ),
);
