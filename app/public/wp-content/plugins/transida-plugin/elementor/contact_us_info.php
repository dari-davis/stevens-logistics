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
class Contact_Us_Info extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'transida_contact_us_info';
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
		return esc_html__( 'Contact Us_Info', 'transida' );
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
			'contact_us_info',
			[
				'label' => esc_html__( 'Contact Us Info', 'transida' ),
			]
		);
		$this->add_control(
              'features', 
			  	[
            		'type' => Controls_Manager::REPEATER,
            		'separator' => 'before',
            		'default' => 
						[
                			['tab_btn_title' => esc_html__('Hoxton - HO', 'transida')],
                			['tab_btn_title' => esc_html__('Melbourne', 'transida')],
							['tab_btn_title' => esc_html__('Houston', 'transida')],
            			],
            		'fields' => 
						[
                			[
                    			'name' => 'tab_btn_title',
                    			'label' => esc_html__('Tab Button Title', 'transida'),
                    			'type' => Controls_Manager::TEXT,
								'label_block' => true,
                    			'default' => esc_html__('', 'transida')
                			],
							[
                    			'name' => 'address',
                    			'label' => esc_html__('Address', 'transida'),
                    			'type' => Controls_Manager::TEXTAREA,
								'default' => esc_html__('', 'transida')
                			],
							[
                    			'name' => 'phone_no',
                    			'label' => esc_html__('Phone Number', 'transida'),
                    			'type' => Controls_Manager::TEXTAREA,
								'default' => esc_html__('', 'transida')
                			],
							[
                    			'name' => 'email_address',
                    			'label' => esc_html__('Email Address', 'transida'),
                    			'type' => Controls_Manager::TEXTAREA,
								'default' => esc_html__('', 'transida')
                			],
							[
                    			'name' => 'working_days',
                    			'label' => esc_html__('Working Days and Time', 'transida'),
                    			'type' => Controls_Manager::TEXTAREA,
								'default' => esc_html__('', 'transida')
                			],
							[
                    			'name' => 'closing_days',
                    			'label' => esc_html__('Close Working Day', 'transida'),
                    			'type' => Controls_Manager::TEXTAREA,
								'default' => esc_html__('', 'transida')
                			],
							[
                    			'name' => 'subtitle',
                    			'label' => esc_html__('Sub Title', 'transida'),
                    			'type' => Controls_Manager::TEXT,
								'label_block' => true,
                    			'default' => esc_html__('', 'transida')
                			],
							[
                    			'name' => 'title',
                    			'label' => esc_html__('Title', 'transida'),
                    			'type' => Controls_Manager::TEXT,
								'label_block' => true,
                    			'default' => esc_html__('', 'transida')
                			],
							[
                    			'name' => 'text',
                    			'label' => esc_html__('Description', 'transida'),
                    			'type' => Controls_Manager::TEXTAREA,
								'default' => esc_html__('', 'transida')
                			],
							[
                    			'name' => 'btn_title',
                    			'label' => esc_html__('Button Title', 'transida'),
                    			'type' => Controls_Manager::TEXT,
								'label_block' => true,
                    			'default' => esc_html__('', 'transida')
                			],
							[
                    			'name' => 'btn_link',
								'label' => __( 'External Url', 'transida' ),
							    'type' => Controls_Manager::URL,
							    'placeholder' => __( 'https://your-link.com', 'plugin-domain' ),
							    'show_external' => true,
							    'default' => ['url' => '','is_external' => true,'nofollow' => true,],
                			],
            			],
            	    'title_field' => '{{tab_btn_title}}',
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
        
        <!-- Contact Info section two -->
        <section class="contact-info-section-two">
            <div class="auto-container">
                <div class="nav-tabs-wrapper">
                    <div class="nav nav-tabs tab-btn-style-two">
                        <div class="theme_carousel owl-theme owl-carousel" data-options='{"loop": false, "margin": 0, "autoheight":true, "lazyload":true, "nav": true, "dots": true, "autoplay": true, "autoplayTimeout": 6000, "smartSpeed": 1000, "responsive":{ "0" :{ "items": "1" }, "600" :{ "items" : "1" }, "768" :{ "items" : "2" } , "992":{ "items" : "2" }, "1200":{ "items" : "3" }}}'>
                            <?php foreach($settings['features'] as $key => $item):?>
                            <ul class="item">
                                <li><a class="<?php if($key == 1) echo 'active';  ?>" data-toggle="tab" href="#tab-one<?php echo esc_attr($key);?>">
                                    <h4><?php echo wp_kses($item['tab_btn_title'], true);?></h4>
                                </a></li>
                            </ul>
                            <?php endforeach;?>
                        </div>
                    </div>
                </div>
                
                <div class="tab-content">
                    <?php foreach($settings['features'] as $key => $item):?>
                    <div class="tab-pane fadeInUp animated <?php if($key == 1) echo 'active';  ?>" id="tab-one<?php echo esc_attr($key); ?>" role="tabpanel">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="outer-box">
                                    <h4><span class="flaticon-cursor"></span><?php echo wp_kses($item['address'], true);?></h4>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="wrapper-box">
                                                <?php if($item['phone_no']): ?>
                                                <div class="icon-box">
                                                    <div class="icon"><span class="flaticon-calling"></span></div>
                                                    <div class="text-area">
                                                        <div class="text"><?php echo wp_kses($item['phone_no'], true);?></div>
                                                    </div>
                                                </div>
                                                <?php endif; ?>
                                                <?php if($item['email_address']): ?>
                                                <div class="icon-box">
                                                    <div class="icon"><span class="flaticon-mail"></span></div>
                                                    <div class="text-area">
                                                        <div class="text"><?php echo wp_kses($item['email_address'], true);?></div>
                                                    </div>
                                                </div>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <?php if(($item['working_days']) || ($item['closing_days'])): ?>
                                        <div class="col-md-6">
                                            <div class="icon-box">
                                                <div class="icon"><span class="fa fa-calendar"></span></div>
                                                <div class="text-area">
                                                    <div class="text"><?php echo wp_kses($item['working_days'], true);?></div>
                                                    <div class="text"><?php echo wp_kses($item['closing_days'], true);?></div>
                                                </div>                                    
                                            </div>
                                        </div>
                                        <?php endif; ?>
                                    </div>
                                </div>                            
                            </div>
                            <div class="col-lg-6">
                                <div class="sec-title">
                                    <div class="sub-title"><?php echo wp_kses($item['subtitle'], true);?></div>
                                    <h2><?php echo wp_kses($item['title'], true);?></h2>
                                </div>
                                <div class="text"><?php echo wp_kses($item['text'], true);?></div>
                                <div class="link">
                                    <a href="<?php echo esc_url($item['btn_link']['url']);?>" class="theme-btn btn-style-one"><span><i class="flaticon-up-arrow"></i><?php echo wp_kses($item['btn_title'], true);?></span></a>
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
