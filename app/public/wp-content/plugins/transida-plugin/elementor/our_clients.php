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
class Our_Clients extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'transida_our_clients';
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
		return esc_html__( 'Our Clients', 'transida' );
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
			'our_clients',
			[
				'label' => esc_html__( 'Our Clients', 'transida' ),
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
              'clients', 
			  	[
            		'type' => Controls_Manager::REPEATER,
            		'separator' => 'before',
            		'default' => 
						[ ],
            		'fields' => 
						[
                			[
                    			'name' => 'client_image',
                    			'label' => __( 'Client Image' , 'transida' ),
								'type' => Controls_Manager::MEDIA,
								'default' => ['url' => Utils::get_placeholder_image_src(),],
                			],
							[
                    			'name' => 'client_hover_image',
                    			'label' => __( 'Client Hover Image' , 'transida' ),
								'type' => Controls_Manager::MEDIA,
								'default' => ['url' => Utils::get_placeholder_image_src(),],
                			],
            			],
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
		?>
        
        <!-- Clients Logo section -->
        <section class="clients-logo-section">
            <div class="auto-container">
                <div class="sec-title text-center">
                    <div class="sub-title text-center"><?php echo wp_kses($settings['subtitle'], true);?></div>
                    <h2><?php echo wp_kses($settings['title'], true);?></h2>
                </div>
                <div class="wrapper-box">
                    <?php foreach($settings['clients'] as $item):?>
                    <div class="logo-box">
                        <?php if($item['client_image']['id']): ?><img src="<?php echo esc_url(wp_get_attachment_url($item['client_image']['id']));?>" alt="<?php esc_attr_e('Awesome Image', 'transida'); ?>"><?php endif; ?>
                        <?php if($item['client_hover_image']['id']): ?><div class="hover-logo"><img src="<?php echo esc_url(wp_get_attachment_url($item['client_hover_image']['id']));?>" alt="<?php esc_attr_e('Awesome Image', 'transida'); ?>"></div><?php endif; ?>
                    </div>
                    <?php endforeach;?>
                </div> 
                <?php if($settings['btn_link']['url']): ?><div class="link text-center"><a href="<?php echo esc_url($settings['btn_link']['url']);?>" class="readmore-link"><i class="flaticon-up-arrow"></i><?php echo wp_kses($settings['btn_title'], true);?></a></div><?php endif; ?>         
            </div>
        </section>
        
		<?php 
	}

}
