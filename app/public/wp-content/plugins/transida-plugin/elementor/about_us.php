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
class About_Us extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'transida_about_us';
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
		return esc_html__( 'About Us', 'transida' );
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
			'about_us',
			[
				'label' => esc_html__( 'About Us', 'transida' ),
			]
		);
		$this->add_control(
			'bg_img',
				[
				  'label' => __( 'Background Image', 'transida' ),
				  'type' => Controls_Manager::MEDIA,
				  'default' => ['url' => Utils::get_placeholder_image_src(),],
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
              'features', 
			  	[
            		'type' => Controls_Manager::REPEATER,
            		'separator' => 'before',
            		'default' => 
						[
                			['title1' => esc_html__('Our Company', 'transida')],
                			['title1' => esc_html__('Statement of', 'transida')],
            			],
            		'fields' => 
						[
                			[
                    			'name' => 'icons',
                    			'label' => esc_html__('Enter The icons', 'transida'),
                    			'type' => Controls_Manager::SELECT2,
                    			'options'  => get_fontawesome_icons(),
                			],
							[
                    			'name' => 'title1',
                    			'label' => esc_html__('Title', 'transida'),
                    			'type' => Controls_Manager::TEXTAREA,
                    			'default' => esc_html__('', 'transida')
                			],
							[
                    			'name' => 'ext_link',
								'label' => __( 'External Url', 'transida' ),
							    'type' => Controls_Manager::URL,
							    'placeholder' => __( 'https://your-link.com', 'plugin-domain' ),
							    'show_external' => true,
							    'default' => ['url' => '','is_external' => true,'nofollow' => true,],
                			],
            			],
            	    'title_field' => '{{title1}}',
                 ]
        );
		$this->add_control(
			'image',
				[
				  'label' => __( 'About Image', 'transida' ),
				  'type' => Controls_Manager::MEDIA,
				  'default' => ['url' => Utils::get_placeholder_image_src(),],
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
        	
        <!-- About Section -->
        <section class="about-section" id="about" <?php if($settings['bg_img']['id']): ?>style="background-image: url(<?php echo esc_url(wp_get_attachment_url($settings['bg_img']['id']));?>);"<?php endif; ?>>
            <div class="auto-container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="sec-title">
                            <div class="sub-title"><?php echo wp_kses($settings['subtitle'], true);?></div>
                            <h2><?php echo wp_kses($settings['title'], true);?></h2>
                            <div class="text"><?php echo wp_kses($settings['text'], true);?></div>
                            <a href="<?php echo esc_url($settings['btn_link']['url']);?>" class="readmore-link"><i class="flaticon-up-arrow"></i><?php echo wp_kses($settings['btn_title'], true);?></a>
                        </div>
                        <div class="row">
                            <?php $count = 1; foreach($settings['features'] as $key => $item):?>
                            <div class="col-md-6">
                                <div class="icon-box wow fadeInUp" data-wow-duration="1500ms">
                                    <div class="icon"><span class="<?php echo esc_attr($item['icons']);?>"></span></div>
                                    <div class="content">
                                        <a href="<?php echo esc_url($item['ext_link']['url']);?>"><h4><?php echo wp_kses($item['title1'], true);?></h4></a>
                                    </div>
                                </div>
                            </div>
                            <?php $count++; endforeach;?>
                        </div>
                    </div>
                    <?php if($settings['image']['id']): ?>
                    <div class="col-lg-6">
                        <div class="image wow fadeInRight" data-wow-duration="1500ms"><img src="<?php echo esc_url(wp_get_attachment_url($settings['image']['id']));?>" alt="<?php esc_attr_e('Awesome Image', 'transida');  ?>"></div>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </section>
                
		<?php 
	}

}
