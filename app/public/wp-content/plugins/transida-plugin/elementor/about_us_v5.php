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
class About_Us_V5 extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'transida_about_us_v5';
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
		return esc_html__( 'About Us V5', 'transida' );
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
			'about_us_v5',
			[
				'label' => esc_html__( 'About Us V5', 'transida' ),
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
				'placeholder' => __( 'Enter your Heading', 'transida' ),
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
				'placeholder' => __( 'Enter your Title ', 'transida' ),
			]
		);
		$this->add_control(
			'icons',
				[
				    'label' => esc_html__('Enter The icons', 'transida'),
					'label_block' => true,
					'type' => Controls_Manager::SELECT2,
					'options'  => get_fontawesome_icons(),
				]
	    );
		$this->add_control(
			'experience_year',
			[
				'label'       => __( 'Experience Year', 'transida' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Year', 'transida' ),
			]
		);
		$this->add_control(
			'experience_year_title',
			[
				'label'       => __( 'Year Title', 'transida' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Year Title', 'transida' ),
			]
		);
		$this->add_control(
			'experience_desc',
			[
				'label'       => __( 'Experience Description', 'transida' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Experience Description', 'transida' ),
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
		$this->add_control(
			'about_img',
				[
				  'label' => __( 'About Image', 'transida' ),
				  'type' => Controls_Manager::MEDIA,
				  'default' => ['url' => Utils::get_placeholder_image_src(),],
				]
	    );
		$this->add_control(
			'heading',
			[
				'label'       => __( 'Heading/Title', 'transida' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Heading/Title ', 'transida' ),
			]
		);
		$this->add_control(
			'description',
			[
				'label'       => __( 'Description', 'transida' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Description', 'transida' ),
			]
		);
		$this->add_control(
			'video_link',
				[
				  'label' => __( 'Video Link', 'transida' ),
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
			'signature_img',
				[
				  'label' => __( 'Signature Image', 'transida' ),
				  'type' => Controls_Manager::MEDIA,
				  'default' => ['url' => Utils::get_placeholder_image_src(),],
				]
	    );
		$this->add_control(
			'author_title',
			[
				'label'       => __( 'Author Title', 'transida' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Author Title', 'transida' ),
			]
		);
		$this->add_control(
			'author_designation',
			[
				'label'       => __( 'Author Designation', 'transida' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Author Designation', 'transida' ),
			]
		);
		$this->add_control(
			'total_value_start',
			[
				'label'       => __( 'Count Value Start', 'transida' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Count Value Start', 'transida' ),
			]
		);
		$this->add_control(
			'total_value_end',
			[
				'label'       => __( 'Count Value End', 'transida' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Count Value End', 'transida' ),
			]
		);
		$this->add_control(
			'alphabet_letter',
			[
				'label'       => __( 'Alphabet Letter', 'transida' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Alphabet Letter', 'transida' ),
			]
		);
		$this->add_control(
			'title1',
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
			'text1',
			[
				'label'       => __( 'Text', 'transida' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
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
                			['block_title' => esc_html__('Air', 'transida')],
                			['block_title' => esc_html__('Ocean', 'transida')],
                			['block_title' => esc_html__('Road', 'transida')]
            			],
            		'fields' => 
						[
                			[
                    			'name' => 'icons2',
                    			'label' => esc_html__('Enter The icons', 'transida'),
								'label_block' => true,
                    			'type' => Controls_Manager::SELECT2,
                    			'options'  => get_fontawesome_icons(),
                			],
							[
                    			'name' => 'counter_start',
                    			'label' => esc_html__('Counter Start', 'transida'),
								'label_block' => true,
                    			'type' => Controls_Manager::TEXT,
                			],
							[
                    			'name' => 'counter_stop',
                    			'label' => esc_html__('Counter Stop', 'transida'),
								'label_block' => true,
                    			'type' => Controls_Manager::TEXT,
                			],
							[
                    			'name' => 'alphabet_letter1',
                    			'label' => esc_html__('Alphabet Letter', 'transida'),
								'label_block' => true,
                    			'type' => Controls_Manager::TEXT,
                			],
							[
                    			'name' => 'block_title',
                    			'label' => esc_html__('Title', 'transida'),
								'label_block' => true,
                    			'type' => Controls_Manager::TEXT,
                    			'default' => esc_html__('Enter Title', 'transida')
                			],
            			],
            	    'title_field' => '{{block_title}}',
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
        
        <!-- Who we are -->
        <section class="who-we-are-section">
            <div class="top-content">
                <div class="auto-container">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="sec-title mb-30">
                                <?php if($settings['subtitle']): ?><div class="sub-title"><?php echo wp_kses($settings['subtitle'], true);?></div><?php endif; ?>
                                <h2><?php echo wp_kses($settings['title'], true);?></h2>
                            </div>
                            <div class="experience-year">
                                <?php if($settings['icons']): ?><div class="icon"><i class="<?php echo esc_attr(str_replace( "icon ",  "", $settings['icons']));?>"></i></div><?php endif; ?>
                                <div class="content">
                                    <h3><?php echo wp_kses($settings['experience_year'], true);?> <span><?php echo wp_kses($settings['experience_year_title'], true);?></span></h3>
                                    <h5><?php echo wp_kses($settings['experience_desc'], true);?></h5>
                                </div>
                                
                            </div>
                            <?php if($settings['btn_link']['url']): ?><div class="link mb-30"><a href="<?php echo esc_url($settings['btn_link']['url']);?>" class="theme-btn btn-style-one"><span><i class="flaticon-up-arrow"></i><?php echo wp_kses($settings['btn_title'], true);?></span></a></div><?php endif; ?>
                        </div>
                        <?php if($settings['about_img']['id']): ?>
                        <div class="col-lg-8">
                            <div class="image mb-30"><img src="<?php echo esc_url(wp_get_attachment_url($settings['about_img']['id']));?>" alt="<?php esc_attr_e('Awesome Image', 'transida'); ?>"></div>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="overview">
                <div class="auto-container">
                    <div class="wrapper-box">
                        <h2><?php echo wp_kses($settings['heading'], true);?></h2>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="text">
                                    <?php echo wp_kses($settings['description'], true);?>
                                </div>
                                <div class="author-info wow fadeInUp" data-wow-duration="1500ms">
                                    <?php if($settings['video_link']['url']): ?>
                                    <div class="video-btn">
                                        <a href="<?php echo esc_url($settings['video_link']['url']);?>" class="overlay-link lightbox-image video-fancybox"><i class="flaticon-play-arrow"></i></a>
                                    </div>
                                    <?php endif; ?>
                                    
                                    <?php if($settings['signature_img']['id']): ?>
                                    <div class="signature"><img src="<?php echo esc_url(wp_get_attachment_url($settings['signature_img']['id']));?>" alt="<?php esc_attr_e('Awesome Image', 'transida'); ?>"></div>
                                    <?php endif; ?>
                                    
                                    <?php if($settings['author_title'] || $settings['author_designation']): ?>
                                    <div>
                                        <div class="author-title"><?php echo wp_kses($settings['author_title'], true);?> </div>
                                        <div class="designation"><?php echo wp_kses($settings['author_designation'], true);?></div>
                                    </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="row m-10">
                                    <!--Column-->
                                    <div class="column counter-column col-md-3">
                                        <div class="inner wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
                                            <div class="content">
                                                <div class="count-outer count-box">
                                                    <span class="count-text" data-speed="3000" data-stop="<?php echo wp_kses($settings['total_value_end'], true);?>"><?php echo wp_kses($settings['total_value_start'], true);?></span><span><?php echo wp_kses($settings['alphabet_letter'], true);?></span>
                                                </div>
                                                <h4><?php echo wp_kses($settings['title1'], true);?></h4>
                                                <h5><?php echo wp_kses($settings['text1'], true);?></h5>
                                            </div>
                                        </div>
                                    </div>
                                    <?php $count = 1; foreach($settings['funfact'] as $item):?>
									<?php if($count % 2) { ?>
                                    <!--Column-->
                                    <div class="column counter-column col-md-3">
                                        <div class="inner wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
                                            <div class="content">
                                                <div class="count-outer count-box">
                                                    <span class="count-text" data-speed="3000" data-stop="<?php echo esc_attr($item['counter_stop']);?>"><?php echo esc_attr($item['counter_start']);?></span><span><?php echo esc_attr($item['alphabet_letter1']);?></span>
                                                </div>
                                                <h5><?php echo wp_kses($item['block_title'], true);?></h5>
                                                <div class="icon"><span class="<?php echo esc_attr(str_replace( "icon ",  "", $item['icons2']));?>"></span></div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php } else { ?>
                                    <!--Column-->
                                    <div class="column counter-column col-md-3">
                                        <div class="inner wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
                                            <div class="content">
                                                <div class="icon"><span class="<?php echo esc_attr(str_replace( "icon ",  "", $item['icons2']));?>"></span></div>
                                                <div class="count-outer count-box">
                                                    <span class="count-text" data-speed="3000" data-stop="<?php echo esc_attr($item['counter_stop']);?>"><?php echo esc_attr($item['counter_start']);?></span><span><?php echo esc_attr($item['alphabet_letter1']);?></span>
                                                </div>
                                                <h5><?php echo wp_kses($item['block_title'], true);?></h5>
                                            </div>
                                        </div>
                                    </div>
                                    <!--Column-->
                                    <?php } ?>
                                    <?php $count++; endforeach;?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
           
		<?php 
	}

}
