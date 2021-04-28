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
class Industries_Tabs extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'transida_industries_tabs';
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
		return esc_html__( 'Industries Tabs', 'transida' );
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
			'industries_tabs',
			[
				'label' => esc_html__( 'Industries Tabs', 'transida' ),
			]
		);
		$this->add_control(
			'bg_image',
			[
				'label' => __( 'BG Image', 'transida' ),
				'type' => Controls_Manager::MEDIA,
				'default' => ['url' => Utils::get_placeholder_image_src(),],
			]
		);
		$this->add_control(
              'services', 
			  	[
            		'type' => Controls_Manager::REPEATER,
            		'separator' => 'before',
            		'default' => 
						[
                			['title' => esc_html__('Industrial and Aerospace', 'transida')],
                			['title' => esc_html__('Automotive and Mobility', 'transida')],
							['title' => esc_html__('Health Care and Pharma', 'transida')],
							['title' => esc_html__('Technology and Media', 'transida')],
            			],
            		'fields' => 
						[
                			[
                    			'name' => 'icons',
                    			'label' => esc_html__('Enter The icons', 'transida'),
								'label_block' => true,
                    			'type' => Controls_Manager::SELECT2,
                    			'options'  => get_fontawesome_icons(),
                			],
							[
                    			'name' => 'title',
                    			'label' => esc_html__('Title', 'transida'),
								'type' => Controls_Manager::TEXTAREA,
                    			'default' => esc_html__('', 'transida')
                			],
							[
                    			'name' => 'text',
                    			'label' => esc_html__('Text', 'transida'),
                    			'type' => Controls_Manager::TEXTAREA,
                    			'default' => esc_html__('', 'transida')
                			],
							[
                    			'name' => 'features_list',
                    			'label' => esc_html__('Feature List', 'transida'),
                    			'type' => Controls_Manager::TEXTAREA,
								'default' => esc_html__('', 'transida')
                			],
							[
                    			'name' => 'btn_title',
                    			'label' => esc_html__('Button Title', 'transida'),
								'label_block' => true,
                    			'type' => Controls_Manager::TEXT,
                    			'default' => esc_html__('Read More', 'transida')
                			],
							[
                    			'name' => 'btn_link',
								'label' => __( 'External Url', 'transida' ),
							    'type' => Controls_Manager::URL,
							    'placeholder' => __( 'https://your-link.com', 'plugin-domain' ),
							    'show_external' => true,
							    'default' => ['url' => '','is_external' => true,'nofollow' => true,],
                			],
							[
                    			'name' => 'btn_title2',
                    			'label' => esc_html__('Button Title V2', 'transida'),
								'label_block' => true,
                    			'type' => Controls_Manager::TEXT,
                    			'default' => esc_html__('Connect With Specialist', 'transida')
                			],
							[
                    			'name' => 'btn_link2',
								'label' => __( 'External Url', 'transida' ),
							    'type' => Controls_Manager::URL,
							    'placeholder' => __( 'https://your-link.com', 'plugin-domain' ),
							    'show_external' => true,
							    'default' => ['url' => '','is_external' => true,'nofollow' => true,],
                			],
							[
                    			'name' => 'feature_image',
                    			'label' => __( 'Feature Image', 'transida' ),
								'type' => Controls_Manager::MEDIA,
								'default' => ['url' => Utils::get_placeholder_image_src(),],
                			],
            			],
            	    'title_field' => '{{title}}',
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
		?>
		
        <!-- Industries covered two -->
        <section class="industries-covered-two" <?php if($settings['bg_image']['id']):?>style="background-image: url(<?php echo esc_url(wp_get_attachment_url($settings['bg_image']['id'] ));?>);"<?php endif; ?>>
            <div class="auto-container">
                <div class="nav-tabs-wrapper side-container">
                    <div class="nav nav-tabs tab-btn-style-one">
                        <div class="owl_1 owl-carousel owl-theme">
                            <?php foreach($settings['services'] as $key => $item):?>
                            <ul class="item">
                                <li><a class="<?php if($key == 1) echo 'active'; ?>" data-toggle="tab" href="#tab-one<?php echo esc_attr($key); ?>">
                                    <div class="icon-box">
                                        <div class="icon"><span class="<?php echo esc_attr(str_replace( "icon ",  "", $item['icons']));?>"></span></div>
                                        <h4><?php echo wp_kses($item['title'], $allowed_tags);?></h4>
                                    </div>
                                </a></li>
                            </ul>
                            <?php endforeach;?>
                        </div>
                    </div>
                </div>
                
                <div class="tab-content">
                    <?php foreach($settings['services'] as $key => $item):?>
                    <div class="tab-pane fadeInUp animated <?php if($key == 1) echo 'active'; ?>" id="tab-one<?php echo esc_attr($key); ?>">
                        <div class="row no-gutters">
                            <?php if($item['feature_image']['id']):?>
                            <div class="col-lg-6">
                                <div class="image"><img src="<?php echo esc_url(wp_get_attachment_url($item['feature_image']['id'] ));?>" alt="<?php esc_attr_e('Awesome Image', 'transida'); ?>"></div>
                            </div>
                            <?php endif; ?>
                            <div class="col-lg-6">
                                <div class="text-block">
                                    <h4><?php echo wp_kses($item['title'], $allowed_tags);?></h4>
                                    <div class="text"><?php echo wp_kses($item['text'], $allowed_tags);?></div>
                                    
									<?php $features_list = $item['features_list'];
										if(!empty($features_list)){
										$features_list = explode("\n", ($features_list)); 
									?>
									<ul class="list">
										<?php foreach($features_list as $features): ?>
											<li><?php echo wp_kses($features, true); ?></li>
										<?php endforeach; ?>
									</ul>
									<?php } ?>
                                    <div class="link">
                                        <a href="<?php echo esc_url($item['btn_link']['url']);?>" class="theme-btn btn-style-one style-2"><span><i class="flaticon-up-arrow"></i><?php echo wp_kses($item['btn_title'], true);?></span></a>
                                        <a href="<?php echo esc_url($item['btn_link2']['url']);?>" class="theme-btn-two"><i class="flaticon-mail"></i><?php echo wp_kses($item['btn_title2'], true);?></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach;?>
                </div>
            </div>
        </section>
        
        <?php 
	}

}
