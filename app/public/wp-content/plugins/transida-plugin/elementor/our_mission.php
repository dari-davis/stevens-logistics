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
class Our_Mission extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'transida_our_mission';
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
		return esc_html__( 'Our Mission', 'transida' );
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
			'our_mission',
			[
				'label' => esc_html__( 'Our Mission', 'transida' ),
			]
		);
		$this->add_control(
			'image',
				[
				  'label' => __( 'Feature Image', 'transida' ),
				  'type' => Controls_Manager::MEDIA,
				  'default' => ['url' => Utils::get_placeholder_image_src(),],
				]
	    );
		$this->add_control(
			'badge_img',
				[
				  'label' => __( 'Badge Image', 'transida' ),
				  'type' => Controls_Manager::MEDIA,
				  'default' => ['url' => Utils::get_placeholder_image_src(),],
				]
	    );
		$this->add_control(
              'our_tabs', 
			  	[
            		'type' => Controls_Manager::REPEATER,
            		'separator' => 'before',
            		'default' => 
						[
                			['title' => esc_html__('Mission Statement', 'transida')],
							['title' => esc_html__('Vision Statement', 'transida')],
							['title' => esc_html__('Company Value', 'transida')]
            			],
            		'fields' => 
						[
                			[
                    			'name' => 'subtitle',
                    			'label' => esc_html__('Sub Title', 'transida'),
								'label_block' => true,
                    			'type' => Controls_Manager::TEXT,
                    			'default' => esc_html__('', 'transida')
                			],
							[
                    			'name' => 'title',
                    			'label' => esc_html__('Title', 'transida'),
								'label_block' => true,
                    			'type' => Controls_Manager::TEXT,
                    			'default' => esc_html__('', 'transida')
                			],
							[
                    			'name' => 'text',
                    			'label' => esc_html__('Description', 'transida'),
								'type' => Controls_Manager::TEXTAREA,
                    			'default' => esc_html__('', 'transida')
                			],
							[
                    			'name' => 'tab_btn_title',
                    			'label' => esc_html__('Tab Button Title', 'transida'),
								'label_block' => true,
                    			'type' => Controls_Manager::TEXT,
                    			'default' => esc_html__('', 'transida')
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
        
        <!-- Statement -->
        <section class="statement-section pt-0">
            <div class="auto-container">
                <div class="row">
                    <?php if($settings['image']['id']): ?>
                    <div class="col-lg-6">
                        <div class="image"><img src="<?php echo esc_url(wp_get_attachment_url($settings['image']['id']));?>" alt="<?php esc_attr_e('Awesome Image', 'transida'); ?>"></div>
                    </div>
                    <?php endif; ?>
                    <div class="col-lg-6">
                        <div class="content">  
                            <?php if($settings['badge_img']['id']): ?>
                            <div class="badge"><img src="<?php echo esc_url(wp_get_attachment_url($settings['badge_img']['id']));?>" alt="<?php esc_attr_e('Awesome Image', 'transida'); ?>"></div>
                            <?php endif; ?>
                            <!-- Tab panes -->
                            <div class="tab-content wow fadeInUp" data-wow-delay="200ms" data-wow-duration="1200ms">
                                <?php $count = 1; foreach($settings['our_tabs'] as $keys => $items):?>
                                <div class="tab-pane fadeInUp animated <?php if($count == 1) echo 'active'; ?>" id="tab-one<?php echo esc_attr($count); ?>" role="tabpanel" aria-labelledby="tab-one">
                                    <div class="text-block">
                                        <div class="sec-title mb-30">
                                            <?php if($items['subtitle']): ?><div class="sub-title"><?php echo wp_kses($items['subtitle'], true);?></div><?php endif; ?>
                                            <h2><?php echo wp_kses($items['title'], true);?></h2>
                                        </div>
                                        <div class="text"><?php echo wp_kses($items['text'], true);?></div>
                                    </div>
                                </div>
                                <?php $count++; endforeach; ?>
                            </div>
                            <ul class="nav nav-tabs tab-btn-style-one" role="tablist">
                                <?php $count = 1; foreach($settings['our_tabs'] as $keys => $items):?>
                                <li class="nav-item">
                                    <a class="nav-link <?php if($count == 1) echo 'active'; ?>" id="tab-one-area" data-toggle="tab" href="#tab-one<?php echo esc_attr($count); ?>" role="tab" aria-controls="price-tab-one" aria-selected="true">
                                        <h4><i class="flaticon-up-arrow"></i><?php echo wp_kses($items['tab_btn_title'], true);?></h4>
                                    </a>
                                </li>
                                <?php $count++; endforeach; ?>
                            </ul>                        
                        </div>
                    </div>
                </div>
            </div>
        </section>
           
		<?php 
	}

}
