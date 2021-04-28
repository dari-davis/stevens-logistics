<?php

namespace TRANSIDAPLUGIN\Element;

use Elementor\Controls_Manager;
use Elementor\Controls_Stack;
use Elementor\Group_Control_Typography;
use Elementor\Scheme_Typography;
use Elementor\Scheme_Color;
use Elementor\Group_Control_Border;
use Elementor\Repeater;
use Elementor\Widget_Base;
use Elementor\Utils;
use Elementor\Group_Control_Text_Shadow;
use Elementor\Plugin;

/**
 * Elementor button widget.
 * Elementor widget that displays a button with the ability to control every
 * aspect of the button design.
 *
 * @since 1.0.0
 */
class Our_Services_V5 extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'transida_our_services_v5';
	}

	/**
	 * Get widget title.
	 * Retrieve button widget title.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'Our Services V5', 'transida' );
	}

	/**
	 * Get widget icon.
	 * Retrieve button widget icon.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'fa fa-briefcase';
	}

	/**
	 * Get widget categories.
	 * Retrieve the list of categories the button widget belongs to.
	 * Used to determine where to display the widget in the editor.
	 *
	 * @since  2.0.0
	 * @access public
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ 'transida' ];
	}
	
	/**
	 * Register button widget controls.
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since  1.0.0
	 * @access protected
	 */
	protected function _register_controls() {
		$this->start_controls_section(
			'our_services_v5',
			[
				'label' => esc_html__( 'Our Services V5', 'transida' ),
			]
		);
		$this->add_control(
			'subtitle',
			[
				'label'       => __( 'Sub Title', 'transida' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Sub title', 'transida' ),
			]
		);
		$this->add_control(
			'title',
			[
				'label'       => __( 'Title', 'transida' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your title', 'transida' ),
			]
		);
		$this->add_control(
			'text_limit',
			[
				'label'   => esc_html__( 'Text Limit', 'transida' ),
				'type'    => Controls_Manager::NUMBER,
				'default' => 3,
				'min'     => 1,
				'max'     => 100,
				'step'    => 1,
			]
		);
		$this->add_control(
			'query_number',
			[
				'label'   => esc_html__( 'Number of post', 'transida' ),
				'type'    => Controls_Manager::NUMBER,
				'default' => 3,
				'min'     => 1,
				'max'     => 100,
				'step'    => 1,
			]
		);
		$this->add_control(
			'query_orderby',
			[
				'label'   => esc_html__( 'Order By', 'transida' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'date',
				'options' => array(
					'date'       => esc_html__( 'Date', 'transida' ),
					'title'      => esc_html__( 'Title', 'transida' ),
					'menu_order' => esc_html__( 'Menu Order', 'transida' ),
					'rand'       => esc_html__( 'Random', 'transida' ),
				),
			]
		);
		$this->add_control(
			'query_order',
			[
				'label'   => esc_html__( 'Order', 'transida' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'DESC',
				'options' => array(
					'DESc' => esc_html__( 'DESC', 'transida' ),
					'ASC'  => esc_html__( 'ASC', 'transida' ),
				),
			]
		);
		$this->add_control(
			'query_exclude',
			[
				'label'       => esc_html__( 'Exclude', 'transida' ),
				'type'        => Controls_Manager::TEXT,
				'description' => esc_html__( 'Exclude posts, pages, etc. by ID with comma separated.', 'transida' ),
			]
		);
		$this->add_control(
            'query_category', 
				[
				  'type' => Controls_Manager::SELECT,
				  'label' => esc_html__('Category', 'transida'),
				  'options' => get_service_categories()
				]
		);
		$this->add_control(
			'icon_img',
				[
				  'label' => __( 'Icon Image', 'transida' ),
				  'type' => Controls_Manager::MEDIA,
				  'default' => ['url' => Utils::get_placeholder_image_src(),],
				]
	    );
		$this->add_control(
			'cta_title',
			[
				'label'       => __( 'Title', 'transida' ),
				'type'        => Controls_Manager::TEXTAREA,
				'label_block' => true,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Title', 'transida' ),
			]
		);
		$this->add_control(
			'cta_text',
			[
				'label'       => __( 'Text', 'transida' ),
				'type'        => Controls_Manager::TEXTAREA,
				'label_block' => true,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Text', 'transida' ),
			]
		);
		$this->add_control(
			'btn_title',
			[
				'label'       => __( 'Button Title', 'transida' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Button Title', 'transida' ),
			]
		);
		$this->add_control(
			'btn_link',
				[
				  'label' => __( 'Button Url', 'transida' ),
				  'type' => Controls_Manager::URL,
				  'placeholder' => __( 'https://your-link.com', 'plugin-domain' ),
				  'show_external' => true,
				  'default' => [
				    'url' => '',
				    'is_external' => true,
				    'nofollow' => true,
				  ],
			  ]
		);
		$this->end_controls_section();
	}

	/**
	 * Render button widget output on the frontend.
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since  1.0.0
	 * @access protected
	 */
	protected function render() {
		$settings = $this->get_settings_for_display();
        $allowed_tags = wp_kses_allowed_html('post');
		
        $paged = transida_set($_POST, 'paged') ? esc_attr($_POST['paged']) : 1;

		$this->add_render_attribute( 'wrapper', 'class', 'templatepath-transida' );
		$args = array(
			'post_type'      => 'transida_service',
			'posts_per_page' => transida_set( $settings, 'query_number' ),
			'orderby'        => transida_set( $settings, 'query_orderby' ),
			'order'          => transida_set( $settings, 'query_order' ),
			'paged'         => $paged
		);
		if ( transida_set( $settings, 'query_exclude' ) ) {
			$settings['query_exclude'] = explode( ',', $settings['query_exclude'] );
			$args['post__not_in']      = transida_set( $settings, 'query_exclude' );
		}
		if( transida_set( $settings, 'query_category' ) ) $args['service_cat'] = transida_set( $settings, 'query_category' );
		$query = new \WP_Query( $args );

		if ( $query->have_posts() ) 
		{ ?>
	 	
        <!-- Services Section -->
        <section class="services-section style-two">
            <div class="auto-container">
                <div class="sec-title text-center">
                    <?php if($settings['subtitle']): ?><div class="sub-title"><?php echo wp_kses($settings['subtitle'], true);?></div><?php endif; ?>
                    <h2><?php echo wp_kses($settings['title'], true);?></h2>
                </div>
                <div class="row">
                    <div class="theme_carousel owl-theme owl-carousel" data-options='{"loop": true, "margin": 0, "autoheight":true, "lazyload":true, "nav": true, "dots": true, "autoplay": true, "autoplayTimeout": 6000, "smartSpeed": 1000, "responsive":{ "0" :{ "items": "1" }, "600" :{ "items" : "1" }, "768" :{ "items" : "2" } , "992":{ "items" : "2" }, "1200":{ "items" : "3" }}}'>
                        <?php 
							global $post;
							while ( $query->have_posts() ) : $query->the_post(); 
							$post_thumbnail_id = get_post_thumbnail_id($post->ID);
							$post_thumbnail_url = wp_get_attachment_url($post_thumbnail_id);
						?>
                        <div class="col-lg-12 service-block">
                            <div class="inner-box">
                                <div class="image-box">
                                    <?php if(has_post_thumbnail()): ?>
									<?php the_post_thumbnail('transida_370x300'); ?>
                                    <?php endif; ?>
                                    <div class="content">
                                        <div>
                                            <div class="icon"><span class="<?php echo wp_kses(str_replace( "icon ",  "",  get_post_meta(get_the_id(), 'service_icon', true )), $allowed_tags); ?>"></span></div>
                                            <h4><?php the_title(); ?></h4>
                                        </div>            
                                    </div>
                                </div>
                                <div class="lower-content">
                                    <div class="text"><?php echo wp_kses(transida_trim(get_the_content(), $settings['text_limit']), true); ?></div>
                                    <div class="link"><a href="<?php echo esc_url(get_post_meta( get_the_id(), 'ext_url', true ));?>" class="readmore-link"><i class="flaticon-up-arrow"></i><?php esc_html_e('More Details', 'transida'); ?></a></div>
                                </div>
                                <div class="overlay" style="background-image: url(<?php echo esc_url($post_thumbnail_url);?>);">
                                    <div>
                                        <div class="content">
                                            <div class="icon"><span class="<?php echo wp_kses(str_replace( "icon ",  "",  get_post_meta(get_the_id(), 'service_icon', true )), $allowed_tags); ?>"></span></div>
                                            <h4><?php the_title(); ?></h4>
                                        </div>
                                        <div class="text"><?php echo wp_kses(transida_trim(get_the_content(), $settings['text_limit']), true); ?></div>
                                        <div class="link"><a href="<?php echo esc_url(get_post_meta( get_the_id(), 'ext_url', true ));?>" class="readmore-link"><i class="flaticon-up-arrow"></i><?php esc_html_e('More Details', 'transida'); ?></a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endwhile; ?>
                    </div>
                </div>
                <div class="cta-section-two">
                    <div class="wrapper-box">
                        <?php if($settings['icon_img']['id']): ?><div class="icon"><img src="<?php echo esc_url(wp_get_attachment_url($settings['icon_img']['id']));?>" alt="<?php esc_attr_e('Awesome Image', 'transida'); ?>"></div><?php endif; ?>
                        <div class="text">
                            <h4><?php echo wp_kses($settings['cta_title'], true);?></h4>
                            <p><?php echo wp_kses($settings['cta_text'], true);?></p>
                        </div>
                        <?php if($settings['btn_link']['url']):?>
                        <div class="link">
                            <a href="<?php echo esc_url($settings['btn_link']['url']);?>" class="theme-btn btn-style-one"><span><i class="flaticon-up-arrow"></i><?php echo wp_kses($settings['btn_title'], true);?></span></a>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </section>
        
        <?php }
		wp_reset_postdata();
	}

}