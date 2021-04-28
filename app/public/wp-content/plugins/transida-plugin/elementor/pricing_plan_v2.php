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
class Pricing_Plan_V2 extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'transida_pricing_plan_v2';
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
		return esc_html__( 'Pricing Plan V2', 'transida' );
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
			'pricing_plan_v2',
			[
				'label' => esc_html__( 'Pricing Plan V2', 'transida' ),
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
				'placeholder' => __( 'Enter your title', 'transida' ),
				'default'     => __( 'Pricing & Plans', 'transida' ),
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
				'placeholder' => __( 'Enter your Title', 'transida' ),
			]
		);
		$this->add_control(
              'pricing_table', 
			  	[
            		'type' => Controls_Manager::REPEATER,
            		'seperator' => 'before',
            		'default' => 
						[
                			['plan_title' => esc_html__('Basic Plan', 'transida')],
                			['plan_title' => esc_html__('Standard Plan', 'transida')],
                			['plan_title' => esc_html__('Advanced Plan', 'transida')]
            			],
            		'fields' => 
						[
                			[
                    			'name' => 'bg_img',
                    			'label' => __( 'BG Image', 'transida' ),
								'type' => Controls_Manager::MEDIA,
								'default' => ['url' => Utils::get_placeholder_image_src(),],
                			],
							[
                    			'name' => 'plan_title',
                    			'label' => esc_html__('Plan Title', 'transida'),
								'label_block' => true,
                    			'type' => Controls_Manager::TEXT,
								'default' => esc_html__('', 'transida')
                			],
							[
                    			'name' => 'price',
                    			'label' => esc_html__('Price', 'transida'),
								'label_block' => true,
                    			'type' => Controls_Manager::TEXTAREA,
								'default' => esc_html__('', 'transida')
                			],
							[
                    			'name' => 'text',
                    			'label' => esc_html__('Description', 'transida'),
								'label_block' => true,
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
                    			'default' => esc_html__('Buy Now', 'transida')
                			],
							[
                    			'name' => 'btn_link',
								'label' => __( 'Button Url', 'transida' ),
							    'type' => Controls_Manager::URL,
							    'placeholder' => __( 'https://your-link.com', 'plugin-domain' ),
							    'show_external' => true,
							    'default' => ['url' => '','is_external' => true,'nofollow' => true,],
                			],
							[
                    			'name' => 'style_two',
                    			'label'   => esc_html__( 'Choose Popular Table', 'transida' ),
								'type'    => Controls_Manager::SELECT,
								'default' => 'one',
								'options' => array(
									'one' => esc_html__( 'Choose Style One', 'transida' ),
									'two'  => esc_html__( 'Choose Style Two', 'transida' ),
								),
                			],
            			],
            	    'title_field' => '{{plan_title}}',
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
        
        <!-- Pricing Section two -->
        <section class="pricing-section-two mx-30">
            <div class="auto-container">
                <div class="sec-title text-center">
                    <div class="sub-title text-center"><?php echo wp_kses( $settings['subtitle'], true );?></div>
                    <h2><?php echo wp_kses( $settings['title'], true );?></h2>
                </div>
                <div class="row">
                    <?php foreach($settings['pricing_table'] as $key => $item):?>
                    <div class="col-lg-4 col-md-6 pricing-block-two <?php if($item['style_two'] == 'two') echo 'style-two'; else echo '' ; ?>">
                        <div class="inner-box wow fadeInUp" data-wow-duration="1500ms" <?php if($item['style_two'] == 'two'): ?>style="background-image: url(<?php echo esc_url(wp_get_attachment_url($item['bg_img']['id']));?>);"<?php endif; ?>>
                            <div class="category-wrapper"><div class="category"><?php echo wp_kses($item['plan_title'], true);?></div></div>
                            <div class="price"><?php echo wp_kses($item['price'], true);?></div>
                            <div class="text"><?php echo wp_kses($item['text'], true);?></div>
                            <?php $features_list = $item['features_list'];
							    if(!empty($features_list)){
								$features_list = explode("\n", ($features_list)); 
							?>
                            <ul class="content">
                                <?php foreach($features_list as $features): ?>
									<li><?php echo wp_kses($features, true); ?></li>
                                <?php endforeach; ?>
                            </ul>
                            <?php } ?>
                            <div class="link-box">
                                <a href="<?php echo esc_url($item['btn_link']['url']);?>" class="theme-btn btn-style-one"><span><i class="flaticon-up-arrow"></i><?php echo wp_kses($item['btn_title'], true);?> </span></a>
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
