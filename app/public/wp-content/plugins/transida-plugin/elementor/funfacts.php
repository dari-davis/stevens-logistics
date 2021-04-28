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
class Funfacts extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'transida_funfacts';
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
		return esc_html__( 'Funfacts', 'transida' );
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
			'funfacts',
			[
				'label' => esc_html__( 'Funfacts', 'transida' ),
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
			'shape_img1',
				[
				  'label' => __( 'Shape Image V1' , 'transida' ),
				  'type' => Controls_Manager::MEDIA,
				  'default' => ['url' => Utils::get_placeholder_image_src(),],
				]
	    );
		$this->add_control(
			'shape_img2',
				[
				  'label' => __( 'Shape Image V2' , 'transida' ),
				  'type' => Controls_Manager::MEDIA,
				  'default' => ['url' => Utils::get_placeholder_image_src(),],
				]
	    );
		$this->add_control(
			'shape_img3',
				[
				  'label' => __( 'Shape Image V3' , 'transida' ),
				  'type' => Controls_Manager::MEDIA,
				  'default' => ['url' => Utils::get_placeholder_image_src(),],
				]
	    );
		$this->add_control(
			'shape_img4',
				[
				  'label' => __( 'Shape Image V4' , 'transida' ),
				  'type' => Controls_Manager::MEDIA,
				  'default' => ['url' => Utils::get_placeholder_image_src(),],
				]
	    );
		$this->add_control(
			'shape_img5',
				[
				  'label' => __( 'Shape Image V5' , 'transida' ),
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
              'funfact', 
			  	[
            		'type' => Controls_Manager::REPEATER,
            		'seperator' => 'before',
            		'default' => 
						[
                			['block_title' => esc_html__('Parcel Delivered', 'transida')],
                			['block_title' => esc_html__('Expert Employee', 'transida')],
                			['block_title' => esc_html__('Satisfied Clients', 'transida')],
							['block_title' => esc_html__('Branches Across', 'transida')],
							['block_title' => esc_html__('Tons of Goods', 'transida')]
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
        	
        <!-- Facts Section -->
        <section class="facts-section">
            <div class="auto-container">
                <div class="wrapper-box" <?php if($settings['bg_img']['id']): ?>style="background-image: url(<?php echo esc_url(wp_get_attachment_url($settings['bg_img']['id']));?>);"<?php endif; ?>>
                    <div class="shape">
                        <?php if($settings['shape_img1']['id']): ?><div class="shape-one"><img src="<?php echo esc_url(wp_get_attachment_url($settings['shape_img1']['id']));?>" alt="<?php esc_attr_e('Awesome Image', 'transida'); ?>"></div><?php endif; ?>
                        <?php if($settings['shape_img2']['id']): ?><div class="shape-two"><img src="<?php echo esc_url(wp_get_attachment_url($settings['shape_img2']['id']));?>" alt="<?php esc_attr_e('Awesome Image', 'transida'); ?>"></div><?php endif; ?>
                        <?php if($settings['shape_img3']['id']): ?><div class="shape-three"><img src="<?php echo esc_url(wp_get_attachment_url($settings['shape_img3']['id']));?>" alt="<?php esc_attr_e('Awesome Image', 'transida'); ?>"></div><?php endif; ?>
                        <?php if($settings['shape_img4']['id']): ?><div class="shape-four"><img src="<?php echo esc_url(wp_get_attachment_url($settings['shape_img4']['id']));?>" alt="<?php esc_attr_e('Awesome Image', 'transida'); ?>"></div><?php endif; ?>
                        <?php if($settings['shape_img5']['id']): ?><div class="shape-five"><img src="<?php echo esc_url(wp_get_attachment_url($settings['shape_img5']['id']));?>" alt="<?php esc_attr_e('Awesome Image', 'transida'); ?>"></div><?php endif; ?>
                    </div>
                    <div class="sec-title text-center light">
                        <div class="sub-title text-center"><?php echo wp_kses($settings['subtitle'], true);?></div>
                        <h2><?php echo wp_kses($settings['title'], true);?></h2>
                    </div>
                    <div class="outer-box">
                        <div class="row">
                            <?php foreach($settings['funfact'] as $item):?>
                            <!--Column-->
                            <div class="column counter-column col-md-6">
                                <div class="inner wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
                                    <div class="content">
                                        <?php if($item['icon_image']['id']): ?><div class="icon"><img src="<?php echo esc_url(wp_get_attachment_url($item['icon_image']['id']));?>" alt="<?php esc_attr_e('Awesome Image', 'transida'); ?>"></div><?php endif; ?>
                                        <div class="count-outer count-box">
                                            <span class="count-text" data-speed="3000" data-stop="<?php echo esc_attr($item['counter_stop']);?>"><?php echo esc_attr($item['counter_start']);?></span>
                                        </div>
                                        <div class="text"><?php echo wp_kses($item['block_title'], true);?></div>
                                    </div>
                                </div>
                            </div>
                            <!--Column-->
                            <?php endforeach;?>
                        </div>
                    </div>                
                </div>            
            </div>
        </section>
        
		<?php 
	}

}
