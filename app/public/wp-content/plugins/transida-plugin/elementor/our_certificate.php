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
class Our_Certificate extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'transida_our_certificate';
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
		return esc_html__( 'Our Certificate', 'transida' );
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
			'Our_Certificate',
			[
				'label' => esc_html__( 'Our Certificate', 'transida' ),
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
              'certificate', 
			  	[
            		'type' => Controls_Manager::REPEATER,
            		'separator' => 'before',
            		'default' => 
						[
                			['title1' => esc_html__('iso 9001', 'transida')],
                			['title1' => esc_html__('iso 14001', 'transida')],
							['title1' => esc_html__('iso 22301', 'transida')],
            			],
            		'fields' => 
						[
                			[
                    			'name' => 'certificate_image',
                    			'label' => __( 'Certificate Image', 'transida' ),
								'type' => Controls_Manager::MEDIA,
								'default' => ['url' => Utils::get_placeholder_image_src(),],
                			],
							[
                    			'name' => 'title1',
                    			'label' => esc_html__('Certificate Title', 'transida'),
								'label_block' => true,
                    			'type' => Controls_Manager::TEXT,
                    			'default' => esc_html__('Enter Certificate Title', 'transida')
                			],
							[
                    			'name' => 'text1',
                    			'label' => esc_html__('Certificate Text', 'transida'),
                    			'type' => Controls_Manager::TEXTAREA,
                    			'default' => esc_html__('Enter Certificate Text Here', 'transida')
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
        
        <!-- Certificate section -->
        <section class="certificate-section">
            <div class="auto-container">
                <div class="sec-top row m-0 justify-content-md-between align-items-center">
                    <div class="sec-title">
                        <?php if($settings['subtitle']): ?><div class="sub-title"><?php echo wp_kses($settings['subtitle'], $allowed_tags);?></div><?php endif; ?>
                        <h2><?php echo wp_kses($settings['title'], $allowed_tags);?></h2>
                    </div>
                    <div class="link">
                        <a href="<?php echo esc_url($settings['btn_link']['url']);?>" class="readmore-link"><i class="flaticon-up-arrow"></i> <?php echo wp_kses($settings['btn_title'], $allowed_tags);?></a>
                    </div>
                </div>
                <div class="row">
                    <div class="theme_carousel owl-theme owl-carousel" data-options='{"loop": true, "margin": 0, "autoheight":true, "lazyload":true, "nav": true, "dots": true, "autoplay": true, "autoplayTimeout": 6000, "smartSpeed": 1000, "responsive":{ "0" :{ "items": "1" }, "600" :{ "items" : "1" }, "768" :{ "items" : "2" } , "992":{ "items" : "2" }, "1200":{ "items" : "3" }}}'>
                        <?php foreach($settings['certificate'] as $key => $item):?>
                        <div class="col-lg-12 certificate-block">
                            <div class="inner-box">
                                <?php if($item['certificate_image']['id']): ?><div class="image"><img src="<?php echo esc_url(wp_get_attachment_url($item['certificate_image']['id']));?>" alt="<?php esc_attr_e('Awesome Image', 'transida');  ?>"></div><?php endif; ?>
                                <div class="content">
                                    <h4><?php echo wp_kses($item['title1'], true);?></h4>
                                    <div class="text"><?php echo wp_kses($item['text1'], true);?></div>
                                </div>
                            </div>
                        </div>
                        <?php endforeach;?>
                    </div>
                    
                </div>
            </div>
        </section>
          
		<?php 
	}

}
