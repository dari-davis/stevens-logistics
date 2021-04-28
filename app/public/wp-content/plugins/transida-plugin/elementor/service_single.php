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
class Service_Single extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'transida_service_single';
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
		return esc_html__( 'Service Single', 'transida' );
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
			'service_single',
			[
				'label' => esc_html__( 'Service Single', 'transida' ),
			]
		);
		$this->add_control(
			'sidebar_slug',
			[
				'label'   => esc_html__( 'Choose Sidebar', 'transida' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'Choose Sidebar',
				'options'  => transida_get_sidebars(),
			]
		);
		$this->add_control(
			'image',
				[
				  'label' => __( 'Image', 'transida' ),
				  'type' => Controls_Manager::MEDIA,
				  'default' => ['url' => Utils::get_placeholder_image_src(),],
				]
	    );
		$this->add_control(
			'image_title',
			[
				'label'       => __( 'Image Caption Title', 'transida' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your title', 'transida' ),
			]
		);
		$this->add_control(
			'image_desc',
			[
				'label'       => __( 'Image Caption Text', 'transida' ),
				'type'        => Controls_Manager::TEXTAREA,
				'label_block' => true,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Text', 'transida' ),
			]
		);
		$this->add_control(
			'video_image',
				[
				  'label' => __( 'Video Image', 'transida' ),
				  'type' => Controls_Manager::MEDIA,
				  'default' => ['url' => Utils::get_placeholder_image_src(),],
				]
	    );
		$this->add_control(
			'video_link',
				[
				  'label' => __( 'Video Url', 'transida' ),
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
		$this->add_control(
			'title',
			[
				'label'       => __( 'Title', 'transida' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Title', 'transida' ),
			]
		);
		$this->add_control(
			'text',
			[
				'label'       => __( 'Text', 'transida' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Text', 'transida' ),
			]
		);
		$this->add_control(
              'funfact', 
			  	[
            		'type' => Controls_Manager::REPEATER,
            		'separator' => 'before',
            		'default' => 
						[
                			['block_title' => esc_html__('We Handled', 'transida')],
                			['block_title' => esc_html__('We Covered', 'transida')]
            			],
            		'fields' => 
						[
                			[
                    			'name' => 'icon_image',
                    			'label' => __( 'Icons Image' , 'transida' ),
								'type' => Controls_Manager::MEDIA,
								'default' => ['url' => Utils::get_placeholder_image_src(),],
                			],
							[
                    			'name' => 'block_title',
                    			'label' => esc_html__('Title', 'transida'),
								'label_block' => true,
                    			'type' => Controls_Manager::TEXT,
                    			'default' => esc_html__('', 'transida')
                			],
							[
                    			'name' => 'counter_start',
                    			'label' => esc_html__('Counter Start', 'transida'),
								'label_block' => true,
                    			'type' => Controls_Manager::TEXT,
								'default' => esc_html__('', 'transida')
                			],
							[
                    			'name' => 'counter_stop',
                    			'label' => esc_html__('Counter Stop', 'transida'),
								'label_block' => true,
                    			'type' => Controls_Manager::TEXT,
								'default' => esc_html__('', 'transida')
                			],
							[
                    			'name' => 'alphabet_letter',
                    			'label' => esc_html__('Alphabet Letter', 'transida'),
								'label_block' => true,
                    			'type' => Controls_Manager::TEXT,
								'default' => esc_html__('', 'transida')
                			],
							[
                    			'name' => 'block_text',
                    			'label' => esc_html__('Description', 'transida'),
								'label_block' => true,
                    			'type' => Controls_Manager::TEXT,
                    			'default' => esc_html__('Enter Description', 'transida')
                			],
            			],
            	    'title_field' => '{{block_title}}',
                 ]
        );
		$this->add_control(
			'title1',
			[
				'label'       => __( 'Title', 'transida' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your title', 'transida' ),
			]
		);
		$this->add_control(
			'text1',
			[
				'label'       => __( 'Text', 'transida' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Text', 'transida' ),
			]
		);
		$this->add_control(
              'tabs', 
			  	[
            		'type' => Controls_Manager::REPEATER,
            		'separator' => 'before',
            		'default' => 
						[
                			['tab_title' => esc_html__('Air Premium', 'transida')],
                			['tab_title' => esc_html__('Air Economy', 'transida')],
							['tab_title' => esc_html__('Air Time Critical', 'transida')],
            			],
            		'fields' => 
						[
                			[
                    			'name' => 'feature_image',
                    			'label' => __( 'Feature Image' , 'transida' ),
								'type' => Controls_Manager::MEDIA,
								'default' => ['url' => Utils::get_placeholder_image_src(),],
                			],
							[
								'name' => 'icons',
								'label' => esc_html__('Enter The icons', 'transida'),
								'type' => Controls_Manager::SELECT2,
								'options'  => get_fontawesome_icons(),
							],
							[
                    			'name' => 'tab_title',
                    			'label' => esc_html__('Title', 'transida'),
								'label_block' => true,
                    			'type' => Controls_Manager::TEXT,
                    			'default' => esc_html__('Enter Title Here', 'transida')
                			],
							[
                    			'name' => 'tab_text',
                    			'label' => esc_html__('Text', 'transida'),
                    			'type' => Controls_Manager::TEXTAREA,
                    			'default' => esc_html__('Enter Text Here', 'transida')
                			],
							[
                    			'name' => 'btn_title',
                    			'label' => esc_html__('Button Title', 'transida'),
                    			'type' => Controls_Manager::TEXT,
                    			'default' => esc_html__('More Details', 'transida')
                			],
							[
                    			'name' => 'btn_link',
								'label' => __( 'Button Url', 'transida' ),
							    'type' => Controls_Manager::URL,
							    'placeholder' => __( 'https://your-link.com', 'plugin-domain' ),
							    'show_external' => true,
							    'default' => ['url' => '','is_external' => true,'nofollow' => true,],
                			],
            			],
            	    'title_field' => '{{tab_title}}',
                 ]
        );
		$this->add_control(
			'title2',
			[
				'label'       => __( 'Title', 'transida' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your title', 'transida' ),
			]
		);
		$this->add_control(
			'text2',
			[
				'label'       => __( 'Text', 'transida' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Text', 'transida' ),
			]
		);
		$this->add_control(
              'shipping', 
			  	[
            		'type' => Controls_Manager::REPEATER,
            		'separator' => 'before',
            		'default' => 
						[
                			['block_title2' => esc_html__('Cost Optimisation', 'transida')],
                			['block_title2' => esc_html__('Reduced Transit Time', 'transida')],
							['block_title2' => esc_html__('Real Time Monitoring', 'transida')],
							['block_title2' => esc_html__('Operational Excellence', 'transida')],
            			],
            		'fields' => 
						[
                			[
								'name' => 'icons2',
								'label' => esc_html__('Enter The icons', 'transida'),
								'type' => Controls_Manager::SELECT2,
								'options'  => get_fontawesome_icons(),
							],
							[
                    			'name' => 'block_title2',
                    			'label' => esc_html__('Title', 'transida'),
								'label_block' => true,
                    			'type' => Controls_Manager::TEXT,
                    			'default' => esc_html__('Enter Title Here', 'transida')
                			],
						],
            	    'title_field' => '{{block_title2}}',
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
        
        <!-- service details -->
        <section class="service-details">
            <div class="auto-container">
                <div class="row">
                    <div class="col-lg-8 content-side order-lg-2">
                        <div class="image-block">
                            <div class="row">
                                <?php if($settings['image']['id']): ?>
                                <div class="col-lg-6">
                                    <div class="image">
                                        <img src="<?php echo esc_url(wp_get_attachment_url($settings['image']['id']));?>" alt="<?php esc_attr_e('Awesome Image', 'transida'); ?>">
                                        <div class="text-block">
                                            <h4><?php echo wp_kses($settings['image_title'], true);?></h4>
                                            <div class="text"><?php echo wp_kses($settings['image_desc'], true);?></div>
                                        </div>
                                    </div>
                                </div>
                                <?php endif; ?>
                                <?php if($settings['video_image']['id']): ?>
                                <div class="col-lg-6">
                                    <div class="image">
                                        <img src="<?php echo esc_url(wp_get_attachment_url($settings['video_image']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image', 'transida'); ?>">
                                        <?php if($settings['video_link']['url']): ?><div class="video-btn"><a href="<?php echo esc_url($settings['video_link']['url']); ?>" class="overlay-link lightbox-image video-fancybox"><i class="flaticon-play-arrow"></i></a></div><?php endif; ?>
                                    </div>
                                </div>
                                <?php endif; ?>
                            </div> 
                        </div> 
                        <?php if($settings['title'] || $settings['text']): ?>
                        <div class="text-block-two">
                            <h3><?php echo wp_kses($settings['title'], true);?></h3>
                            <div class="text"><?php echo wp_kses($settings['text'], true);?></div>
                        </div>
                        <div class="facts-counter">
                            <div class="row">
                                <?php foreach($settings['funfact'] as $item):?>
                                <!--Column-->
                                <div class="column counter-column col-md-6">
                                    <div class="inner wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
                                        <div class="content">
                                            <?php if($item['icon_image']['id']): ?><div class="icon"><img src="<?php echo esc_url(wp_get_attachment_url($item['icon_image']['id']));?>" alt="<?php esc_attr_e('Awesome Image', 'transida'); ?>"></div><?php endif; ?>
                                            <h5><?php echo wp_kses($item['block_title'], true);?></h5>
                                            <div class="count-outer count-box">
                                                <span class="count-text" data-speed="3000" data-stop="<?php echo esc_attr($item['counter_stop']);?>"><?php echo esc_attr($item['counter_start']);?></span><?php if($item['alphabet_letter']): ?><span><?php echo esc_attr($item['alphabet_letter']);?></span><?php endif; ?>
                                            </div>
                                            <div class="text"><?php echo wp_kses($item['block_text'], true);?></div>
                                        </div>
                                    </div>
                                </div>
                                <!--Column-->
                                <?php endforeach;?>
                            </div>
                        </div> 
                        <?php endif; ?>                                       
                        <?php if($settings['title1'] || $settings['text1']): ?>
                        <div class="text-block-three">
                            <h3><?php echo wp_kses($settings['title1'], true);?></h3>
                            <div class="text"><?php echo wp_kses($settings['text1'], true);?></div>
                            <div class="tab-area">
                                <ul class="nav nav-tabs tab-btn-style-one" role="tablist">
                                    <?php foreach($settings['tabs'] as $key => $item):?>
                                    <li class="nav-item">
                                        <a class="nav-link <?php if($key == 1) echo 'active';?>"  data-toggle="tab" href="#tab-one<?php echo esc_attr($key);?>" role="tab" aria-selected="true">
                                            <h4><?php echo wp_kses($item['tab_title'], true);?></h4>
                                        </a>
                                    </li>
                                    <?php endforeach;?>
                                </ul>
                                <!-- Tab panes -->
                                <div class="tab-content wow fadeInUp" data-wow-delay="200ms" data-wow-duration="1200ms">
                                    <?php foreach($settings['tabs'] as $keys => $item):?>
                                    <div class="tab-pane fadeInUp animated <?php if($keys == 1) echo 'active';?>" id="tab-one<?php echo esc_attr($keys);?>" role="tabpanel">
                                        <div class="row no-gutters">
                                            <?php if($item['feature_image']['id']): ?>
                                            <div class="left-column col-md-5">
                                                <div class="image"><img src="<?php echo esc_url(wp_get_attachment_url($item['feature_image']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image', 'transida'); ?>"></div>
                                            </div>
                                            <?php endif; ?>
                                            <div class="right-column col-md-7">
                                                <div class="icon-box">
                                                    <div class="icon"><span class="<?php echo esc_attr(str_replace( "icon ",  "", $item['icons']));?>"></span></div>
                                                    <h4><?php echo wp_kses($item['tab_title'], true);?></h4>
                                                </div>
                                                <div class="content">
                                                    <div class="text"><?php echo wp_kses($item['tab_text'], true);?></div>
                                                    <div class="link">
                                                        <a href="<?php echo esc_url($item['btn_link']['url']); ?>" class="readmore-link"><i class="flaticon-up-arrow"></i><?php echo wp_kses($item['btn_title'], true);?></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php endforeach;?>
                                </div>
                            </div>                        
                        </div>
                        <?php endif; ?>
                        <?php if($settings['title2'] || $settings['text2']): ?>
                        <div class="features">
                            <h3><?php echo wp_kses($settings['title2'], true);?></h3>
                            <div class="text"><?php echo wp_kses($settings['text2'], true);?></div>
                            
                            <div class="row">
                                <?php foreach($settings['shipping'] as $key => $items):?>
                                <div class="col-md-3 col-sm-6">
                                    <div class="icon-box">
                                        <div class="icon"><span class="<?php echo esc_attr(str_replace( "icon ",  "", $items['icons2']));?>"></span></div>
                                        <h4><?php echo wp_kses($items['block_title2'], true);?></h4>
                                    </div>
                                </div>
                                <?php endforeach;?>
                            </div>
                        </div>
                        <?php endif; ?>
                    </div>
                    
                    <?php if ( is_active_sidebar( $settings['sidebar_slug'] ) ) : ?>
                    <aside class="col-lg-4">
                        <div class="service-sidebar">
                        	<?php dynamic_sidebar( $settings['sidebar_slug'] ); ?>
                        </div>
                    </aside>
                    <?php endif; ?>
                </div>
            </div>
        </section>
         
		<?php 
	}

}