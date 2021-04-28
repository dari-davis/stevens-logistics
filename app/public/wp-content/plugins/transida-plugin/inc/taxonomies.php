<?php

namespace TRANSIDAPLUGIN\Inc;


use TRANSIDAPLUGIN\Inc\Abstracts\Taxonomy;


class Taxonomies extends Taxonomy {


	public static function init() {

		$labels = array(
			'name'              => _x( 'Project Category', 'wptransida' ),
			'singular_name'     => _x( 'Project Category', 'wptransida' ),
			'search_items'      => __( 'Search Category', 'wptransida' ),
			'all_items'         => __( 'All Categories', 'wptransida' ),
			'parent_item'       => __( 'Parent Category', 'wptransida' ),
			'parent_item_colon' => __( 'Parent Category:', 'wptransida' ),
			'edit_item'         => __( 'Edit Category', 'wptransida' ),
			'update_item'       => __( 'Update Category', 'wptransida' ),
			'add_new_item'      => __( 'Add New Category', 'wptransida' ),
			'new_item_name'     => __( 'New Category Name', 'wptransida' ),
			'menu_name'         => __( 'Project Category', 'wptransida' ),
		);
		$args   = array(
			'hierarchical'       => true,
			'labels'             => $labels,
			'show_ui'            => true,
			'show_admin_column'  => true,
			'query_var'          => true,
			'public'             => true,
			'publicly_queryable' => true,
			'rewrite'            => array( 'slug' => 'project_cat' ),
		);

		register_taxonomy( 'project_cat', 'transida_project', $args );
		
		//Services Taxonomy Start
		$labels = array(
			'name'              => _x( 'Service Category', 'wptransida' ),
			'singular_name'     => _x( 'Service Category', 'wptransida' ),
			'search_items'      => __( 'Search Category', 'wptransida' ),
			'all_items'         => __( 'All Categories', 'wptransida' ),
			'parent_item'       => __( 'Parent Category', 'wptransida' ),
			'parent_item_colon' => __( 'Parent Category:', 'wptransida' ),
			'edit_item'         => __( 'Edit Category', 'wptransida' ),
			'update_item'       => __( 'Update Category', 'wptransida' ),
			'add_new_item'      => __( 'Add New Category', 'wptransida' ),
			'new_item_name'     => __( 'New Category Name', 'wptransida' ),
			'menu_name'         => __( 'Service Category', 'wptransida' ),
		);
		$args   = array(
			'hierarchical'       => true,
			'labels'             => $labels,
			'show_ui'            => true,
			'show_admin_column'  => true,
			'query_var'          => true,
			'public'             => true,
			'publicly_queryable' => true,
			'rewrite'            => array( 'slug' => 'service_cat' ),
		);


		register_taxonomy( 'service_cat', 'transida_service', $args );
		
		//Testimonials Taxonomy Start
		$labels = array(
			'name'              => _x( 'Testimonials Category', 'wptransida' ),
			'singular_name'     => _x( 'Testimonials Category', 'wptransida' ),
			'search_items'      => __( 'Search Category', 'wptransida' ),
			'all_items'         => __( 'All Categories', 'wptransida' ),
			'parent_item'       => __( 'Parent Category', 'wptransida' ),
			'parent_item_colon' => __( 'Parent Category:', 'wptransida' ),
			'edit_item'         => __( 'Edit Category', 'wptransida' ),
			'update_item'       => __( 'Update Category', 'wptransida' ),
			'add_new_item'      => __( 'Add New Category', 'wptransida' ),
			'new_item_name'     => __( 'New Category Name', 'wptransida' ),
			'menu_name'         => __( 'Testimonials Category', 'wptransida' ),
		);
		$args   = array(
			'hierarchical'       => true,
			'labels'             => $labels,
			'show_ui'            => true,
			'show_admin_column'  => true,
			'query_var'          => true,
			'public'             => true,
			'publicly_queryable' => true,
			'rewrite'            => array( 'slug' => 'testimonials_cat' ),
		);


		register_taxonomy( 'testimonials_cat', 'tran_testimonials', $args );
		
		
		//Team Taxonomy Start
		$labels = array(
			'name'              => _x( 'Team Category', 'wptransida' ),
			'singular_name'     => _x( 'Team Category', 'wptransida' ),
			'search_items'      => __( 'Search Category', 'wptransida' ),
			'all_items'         => __( 'All Categories', 'wptransida' ),
			'parent_item'       => __( 'Parent Category', 'wptransida' ),
			'parent_item_colon' => __( 'Parent Category:', 'wptransida' ),
			'edit_item'         => __( 'Edit Category', 'wptransida' ),
			'update_item'       => __( 'Update Category', 'wptransida' ),
			'add_new_item'      => __( 'Add New Category', 'wptransida' ),
			'new_item_name'     => __( 'New Category Name', 'wptransida' ),
			'menu_name'         => __( 'Team Category', 'wptransida' ),
		);
		$args   = array(
			'hierarchical'       => true,
			'labels'             => $labels,
			'show_ui'            => true,
			'show_admin_column'  => true,
			'query_var'          => true,
			'public'             => true,
			'publicly_queryable' => true,
			'rewrite'            => array( 'slug' => 'team_cat' ),
		);


		register_taxonomy( 'team_cat', 'transida_team', $args );
		
		//Faqs Taxonomy Start
		$labels = array(
			'name'              => _x( 'Faqs Category', 'wptransida' ),
			'singular_name'     => _x( 'Faq Category', 'wptransida' ),
			'search_items'      => __( 'Search Category', 'wptransida' ),
			'all_items'         => __( 'All Categories', 'wptransida' ),
			'parent_item'       => __( 'Parent Category', 'wptransida' ),
			'parent_item_colon' => __( 'Parent Category:', 'wptransida' ),
			'edit_item'         => __( 'Edit Category', 'wptransida' ),
			'update_item'       => __( 'Update Category', 'wptransida' ),
			'add_new_item'      => __( 'Add New Category', 'wptransida' ),
			'new_item_name'     => __( 'New Category Name', 'wptransida' ),
			'menu_name'         => __( 'Faq Category', 'wptransida' ),
		);
		$args   = array(
			'hierarchical'       => true,
			'labels'             => $labels,
			'show_ui'            => true,
			'show_admin_column'  => true,
			'query_var'          => true,
			'public'             => true,
			'publicly_queryable' => true,
			'rewrite'            => array( 'slug' => 'faqs_cat' ),
		);


		register_taxonomy( 'faqs_cat', 'transida_faqs', $args );
		
		
		//Our History Taxonomy Start
		$labels = array(
			'name'              => _x( 'History Category', 'wptransida' ),
			'singular_name'     => _x( 'History Category', 'wptransida' ),
			'search_items'      => __( 'Search Category', 'wptransida' ),
			'all_items'         => __( 'All Categories', 'wptransida' ),
			'parent_item'       => __( 'Parent Category', 'wptransida' ),
			'parent_item_colon' => __( 'Parent Category:', 'wptransida' ),
			'edit_item'         => __( 'Edit Category', 'wptransida' ),
			'update_item'       => __( 'Update Category', 'wptransida' ),
			'add_new_item'      => __( 'Add New Category', 'wptransida' ),
			'new_item_name'     => __( 'New Category Name', 'wptransida' ),
			'menu_name'         => __( 'History Category', 'wptransida' ),
		);
		$args   = array(
			'hierarchical'       => true,
			'labels'             => $labels,
			'show_ui'            => true,
			'show_admin_column'  => true,
			'query_var'          => true,
			'public'             => true,
			'publicly_queryable' => true,
			'rewrite'            => array( 'slug' => 'history_cat' ),
		);


		register_taxonomy( 'history_cat', 'transida_history', $args );
		
		//Global Network Taxonomy Start
		$labels = array(
			'name'              => _x( 'Network Category', 'wptransida' ),
			'singular_name'     => _x( 'Network Category', 'wptransida' ),
			'search_items'      => __( 'Search Category', 'wptransida' ),
			'all_items'         => __( 'All Categories', 'wptransida' ),
			'parent_item'       => __( 'Parent Category', 'wptransida' ),
			'parent_item_colon' => __( 'Parent Category:', 'wptransida' ),
			'edit_item'         => __( 'Edit Category', 'wptransida' ),
			'update_item'       => __( 'Update Category', 'wptransida' ),
			'add_new_item'      => __( 'Add New Category', 'wptransida' ),
			'new_item_name'     => __( 'New Category Name', 'wptransida' ),
			'menu_name'         => __( 'Network Category', 'wptransida' ),
		);
		$args   = array(
			'hierarchical'       => true,
			'labels'             => $labels,
			'show_ui'            => true,
			'show_admin_column'  => true,
			'query_var'          => true,
			'public'             => true,
			'publicly_queryable' => true,
			'rewrite'            => array( 'slug' => 'network_cat' ),
		);


		register_taxonomy( 'network_cat', 'transida_network', $args );
	}
	
}
