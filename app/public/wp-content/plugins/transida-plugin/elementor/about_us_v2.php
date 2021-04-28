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
class About_Us_V2 extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'transida_about_us_v2';
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
		return esc_html__( 'About Us V2', 'transida' );
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
			'about_us_v2',
			[
				'label' => esc_html__( 'About Us V2', 'transida' ),
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
				'placeholder' => __( 'Enter your Sub Title', 'transida' ),
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
			'shape_img',
				[
				  'label' => __( 'BG Shape Image', 'transida' ),
				  'type' => Controls_Manager::MEDIA,
				  'default' => ['url' => Utils::get_placeholder_image_src(),],
				]
	    );
		$this->add_control(
			'about_img1',
				[
				  'label' => __( 'About Image V1', 'transida' ),
				  'type' => Controls_Manager::MEDIA,
				  'default' => ['url' => Utils::get_placeholder_image_src(),],
				]
	    );
		$this->add_control(
			'about_img2',
				[
				  'label' => __( 'About Image V2', 'transida' ),
				  'type' => Controls_Manager::MEDIA,
				  'default' => ['url' => Utils::get_placeholder_image_src(),],
				]
	    );
		$this->add_control(
			'video_img',
				[
				  'label' => __( 'Video BG Image', 'transida' ),
				  'type' => Controls_Manager::MEDIA,
				  'default' => ['url' => Utils::get_placeholder_image_src(),],
				]
	    );
		$this->add_control(
			'video_desc',
			[
				'label'       => __( 'Video Title', 'transida' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Video Title', 'transida' ),
			]
		);
		$this->add_control(
			'video_url',
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
			'heading',
			[
				'label'       => __( 'Heading', 'transida' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Heading', 'transida' ),
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
				'placeholder' => __( 'Enter your Description', 'transida' ),
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
				'placeholder' => __( 'Enter your Author Title', 'transida' ),
			]
		);
		$this->add_control(
              'info', 
			  	[
            		'type' => Controls_Manager::REPEATER,
            		'separator' => 'before',
            		'default' => 
						[
                			['title1' => esc_html__('Enter Title', 'transida')],
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
                    			'name' => 'title1',
                    			'label' => esc_html__('Title', 'transida'),
                    			'type' => Controls_Manager::TEXTAREA,
                    			'default' => esc_html__('', 'transida')
                			],
            			],
            	    'title_field' => '{{title1}}',
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
        
        <!-- About Section Two -->
        <section class="about-section-two">
            <div class="auto-container">
                <div class="sec-title text-center">
                    <div class="sub-title"><?php echo wp_kses($settings['subtitle'], true);?></div>
                    <h2><?php echo wp_kses($settings['title'], true);?> </h2>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="image-box wow fadeInUp" data-wow-duration="1500ms">
                            <?php if($settings['shape_img']['id']): ?><div class="shape"><img src="<?php echo esc_url(wp_get_attachment_url($settings['shape_img']['id']));?>" alt="<?php esc_attr_e('Awesome Image', 'transida'); ?>"></div><?php endif; ?>
                            <?php if($settings['about_img1']['id']): ?><div class="image-one" data-parallax='{"y": -70}'><img src="<?php echo esc_url(wp_get_attachment_url($settings['about_img1']['id']));?>" alt="<?php esc_attr_e('Awesome Image', 'transida'); ?>"></div><?php endif; ?>
                            <?php if($settings['about_img2']['id']): ?><div class="image-two" data-parallax='{"y": 70}'><img src="<?php echo esc_url(wp_get_attachment_url($settings['about_img2']['id']));?>" alt="<?php esc_attr_e('Awesome Image', 'transida'); ?>"></div><?php endif; ?>
                            <?php if($settings['video_img']['id']): ?><div class="video-box" style="background-image: url(<?php echo esc_url(wp_get_attachment_url($settings['video_img']['id']));?>);"><a href="<?php echo esc_url($settings['video_url']['url']);?>" class="overlay-link lightbox-image video-fancybox"><i class="flaticon-play-arrow"></i><?php echo wp_kses($settings['video_desc'], true);?></a></div><?php endif; ?>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="content">
                            <div class="quote"><span class="flaticon-right-quote"></span></div>
                            <h3><?php echo wp_kses($settings['heading'], true);?></h3>
                            <div class="text wow fadeInUp" data-wow-duration="1500ms"><?php echo wp_kses($settings['text'], true);?>
                            </div>
                            <div class="author-info wow fadeInUp" data-wow-duration="1500ms">
                                <?php if($settings['signature_img']['id']): ?><div class="signature"><img src="<?php echo esc_url(wp_get_attachment_url($settings['signature_img']['id']));?>" alt="<?php esc_attr_e('Awesome Image', 'transida'); ?>"></div><?php endif; ?>
                                <div>
                                    <div class="author-title"><?php echo wp_kses($settings['author_title'], true);?> </div>
                                    <div class="designation"><?php echo wp_kses($settings['author_designation'], true);?></div>
                                </div>
                            </div>
                            <div class="row">
                                <?php foreach($settings['info'] as $key => $item):?>
                                <div class="col-md-4">
                                    <div class="icon-box">
                                        <div class="icon"><span class="<?php echo esc_attr($item['icons']);?>"></span></div>
                                        <h4><?php echo wp_kses($item['title1'], true);?></h4>
                                    </div>
                                </div>
                                <?php endforeach;?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
              
		<?php 
	}

}
