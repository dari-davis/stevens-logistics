<?php

namespace TRANSIDAPLUGIN\Element;


class Elementor {
	static $widgets = array(
		//Home Page
		'slider_v1',
		'our_services',
		'about_us',
		'why_choose_us',
		'how_we_work',
		'our_industries',
		'pricing_plan',
		'funfacts',
		'testimonials_v1',
		'latest_news',
		'google_map',
		'contact_info',
		'newsletter',
		//Home Page 02
		'slider_v2',
		'about_us_v2',
		'funfacts_v2',
		'our_services_v2',
		'get_a_quote',
		'how_we_work_v2',
		'recent_projects',
		'why_choose_us_v2',
		'testimonials_v2',
		'our_clients',
		'latest_news_v2',
		//Home Page 03
		'slider_v3',
		'about_us_v3',
		'our_services_v3',
		'funfacts_v3',
		'our_skills',
		'video_section',
		'our_team',
		'get_a_quote_v2',
		'pricing_plan_v2',
		'testimonials_v3',
		'contact_info_v2',
		//Home Page 04
		'banner_v4',
		'our_services_v4',
		'about_us_v4',
		'funfacts_and_services',
		'our_team_v2',
		'industries_tabs',
		'recent_projects_v2',
		'testimonials_v4',
		'get_a_quote_v3',
		'latest_news_v3',
		'call_to_action',
		//Inner Pages
		'about_us_v5',
		'our_mission',
		'why_choose_us_v3',
		'our_certificate',
		'our_history',
		'our_team_v3',
		'global_network',
		'our_services_v5',
		'service_single',
		'portfolio_2_column',
		'portfolio_3_column',
		'portfolio_4_column',
		'portfolio_single',
		'related_projects',
		'faqs_tab',
		'request_a_quote',
		'blog_grid_view',
		'blog_width_sidebar',
		'contact_us_info',
		'contact_us',
		
	);

	static function init() {
		add_action( 'elementor/init', array( __CLASS__, 'loader' ) );
		add_action( 'elementor/elements/categories_registered', array( __CLASS__, 'register_cats' ) );
	}

	static function loader() {

		foreach ( self::$widgets as $widget ) {

			$file = TRANSIDAPLUGIN_PLUGIN_PATH . '/elementor/' . $widget . '.php';
			if ( file_exists( $file ) ) {
				require_once $file;
			}

			add_action( 'elementor/widgets/widgets_registered', array( __CLASS__, 'register' ) );
		}
	}

	static function register( $elemntor ) {
		foreach ( self::$widgets as $widget ) {
			$class = '\\TRANSIDAPLUGIN\\Element\\' . ucwords( $widget );

			if ( class_exists( $class ) ) {
				$elemntor->register_widget_type( new $class );
			}
		}
	}

	static function register_cats( $elements_manager ) {

		$elements_manager->add_category(
			'transida',
			[
				'title' => esc_html__( 'Transida', 'transida' ),
				'icon'  => 'fa fa-plug',
			]
		);
		$elements_manager->add_category(
			'templatepath',
			[
				'title' => esc_html__( 'Template Path', 'transida' ),
				'icon'  => 'fa fa-plug',
			]
		);

	}
}

Elementor::init();