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
class Our_Skills extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'transida_our_skills';
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
		return esc_html__( 'Our Skills', 'transida' );
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
			'our_skills',
			[
				'label' => esc_html__( 'Our Skills', 'transida' ),
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
              'accordion', 
			  	[
            		'type' => Controls_Manager::REPEATER,
            		'separator' => 'before',
            		'default' => 
						[
                			['acc_title' => esc_html__('About Company', 'transida')],
							['acc_title' => esc_html__('Company History', 'transida')]
            			],
            		'fields' => 
						[
                			[
                    			'name' => 'acc_title',
                    			'label' => esc_html__('Title', 'transida'),
                    			'type' => Controls_Manager::TEXTAREA,
                    			'default' => esc_html__('', 'transida')
                			],
							[
                    			'name' => 'acc_text',
                    			'label' => esc_html__('Text', 'transida'),
                    			'type' => Controls_Manager::TEXTAREA,
                    			'default' => esc_html__('', 'transida')
                			],
							[
                    			'name' => 'btn_title',
                    			'label' => esc_html__('Title', 'transida'),
								'label_block' => true,
                    			'type' => Controls_Manager::TEXT,
                    			'default' => esc_html__('Read More', 'transida')
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
            	    'title_field' => '{{acc_title}}',
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
			'image',
				[
				  'label' => __( 'Badge BG Image', 'transida' ),
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
              'skill', 
			  	[
            		'type' => Controls_Manager::REPEATER,
            		'separator' => 'before',
            		'default' => 
						[
                			['block_title' => esc_html__('Air Freight', 'transida')],
							['block_title' => esc_html__('Ocean Freight', 'transida')],
							['block_title' => esc_html__('Road Freight', 'transida')]
            			],
            		'fields' => 
						[
                			[
                    			'name' => 'block_title',
                    			'label' => esc_html__('Title', 'transida'),
								'label_block' => true,
                    			'type' => Controls_Manager::TEXT,
                    			'default' => esc_html__('', 'transida')
                			],
							[
                    			'name' => 'fill_bar_value_start',
                    			'label' => esc_html__('Fill Bar Value Start', 'transida'),
								'label_block' => true,
                    			'type' => Controls_Manager::TEXT,
                    			'default' => esc_html__('', 'transida')
                			],
							[
                    			'name' => 'fill_bar_value_end',
                    			'label' => esc_html__('Fill Bar Value End', 'transida'),
								'label_block' => true,
                    			'type' => Controls_Manager::TEXT,
                    			'default' => esc_html__('', 'transida')
                			],
							[
                    			'name' => 'percent_sign',
                    			'label' => esc_html__('Percent Sign', 'transida'),
								'label_block' => true,
                    			'type' => Controls_Manager::TEXT,
                    			'default' => esc_html__('%', 'transida')
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
        
        <!-- About Us section three -->
        <section class="about-section-three mx-30">
            <div class="auto-container">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="sec-title">
                            <div class="sub-title"><?php echo wp_kses($settings['subtitle'], true);?></div>
                            <h2><?php echo wp_kses($settings['title'], true);?> </h2>
                        </div>
                        <ul class="accordion-box style-three">        
                            <?php $count = 1; foreach($settings['accordion'] as $key => $item):?>
                            <!--Accordion Block-->
                            <li class="accordion block">
                                <div class="acc-btn <?php if($count == 1) echo 'active' ?>"><?php echo wp_kses($item['acc_title'], true);?> <i class="flaticon-right-arrow-3"></i></div>
                                <div class="acc-content <?php if($count == 1) echo 'current' ?>">
                                    <div class="content">
                                        <div class="text"><?php echo wp_kses($item['acc_text'], true);?></div>
                                        <div class="link-two">
                                            <a href="<?php echo esc_url($item['btn_link']['url']);?>" class="readmore-link style-two"><span><i class="flaticon-up-arrow"></i><?php echo wp_kses($item['btn_title'], true);?></span></a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <?php $count++; endforeach;?>
                        </ul>
                    </div>
                    <div class="col-lg-4">
                        <?php if($settings['about_img']['id']): ?><div class="image wow fadeInUp" data-wow-duration="1500ms"><img src="<?php echo esc_url(wp_get_attachment_url($settings['about_img']['id']));?>" alt="<?php esc_attr_e('Awesome Image', 'transida'); ?>"></div><?php endif; ?>
                    </div>
                    <div class="col-lg-4">
                        <?php if($settings['image']['id'] || $settings['badge_img']['id']): ?>
                        <div class="image-two wow fadeInUp" data-wow-duration="1500ms">
                            <?php if($settings['image']['id']): ?><img src="<?php echo esc_url(wp_get_attachment_url($settings['image']['id']));?>" alt="<?php esc_attr_e('Awesome Image', 'transida'); ?>"><?php endif; ?>
                            <?php if($settings['badge_img']['id']): ?><div class="badge"><img src="<?php echo esc_url(wp_get_attachment_url($settings['badge_img']['id']));?>" alt="<?php esc_attr_e('Awesome Image', 'transida'); ?>"></div><?php endif; ?>
                        </div>
                        <?php endif; ?>
                        <!--Skills-->
                        <div class="skills">
                            <?php foreach($settings['skill'] as $keys => $items):?>
                            <!--Skill Item-->
                            <div class="skill-item">
                                <div class="skill-header clearfix">
                                    <div class="skill-title"><?php echo wp_kses($items['block_title'], true);?></div>
                                    <div class="skill-percentage"><div class="count-box"><span class="count-text" data-speed="2000" data-stop="<?php echo wp_kses($items['fill_bar_value_end'], true);?>"><?php echo wp_kses($items['fill_bar_value_start'], true);?></span><?php echo wp_kses($items['percent_sign'], true);?></div></div>
                                </div>
                                <div class="skill-bar">
                                    <div class="bar-inner"><div class="bar progress-line" data-width="<?php echo wp_kses($items['fill_bar_value_end'], true);?>"></div></div>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
             
		<?php 
	}

}
