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
class Get_A_Quote_V2 extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'transida_get_a_quote_v2';
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
		return esc_html__( 'Get A Quote V2', 'transida' );
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
			'get_a_quote_v2',
			[
				'label' => esc_html__( 'Get A Quote V2', 'transida' ),
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
			'image',
				[
				  'label' => __( 'Feature Image', 'transida' ),
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
			'quote_form_url2',
			[
				'label'       => __( 'Contact Form 7 Url', 'transida' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Contact Form 7 Url', 'transida' ),
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
				'placeholder' => __( 'Enter your Title', 'transida' ),
			]
		);
		$this->add_control(
			'author_img',
				[
				  'label' => __( 'Author Image', 'transida' ),
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
			'phone_no',
			[
				'label'       => __( 'Phone Number', 'transida' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Phone Number', 'transida' ),
			]
		);
		$this->add_control(
			'email_address',
			[
				'label'       => __( 'Email Address', 'transida' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Email Address', 'transida' ),
			]
		);
		$this->add_control(
              'social_icon', 
			  	[
            		'type' => Controls_Manager::REPEATER,
            		'separator' => 'before',
            		'default' => 
						[
                			['social_link' => esc_html__('Social_link', 'transida')],
            			],
            		'fields' => 
						[
                			[
                    			'name' => 'social_icons',
                    			'label' => esc_html__('Enter Social icons', 'transida'),
                    			'type' => Controls_Manager::SELECT2,
                    			'options'  => get_fontawesome_icons(),
                			],
							[
                    			'name' => 'social_link',
								'label' => __( 'Social Link', 'transida' ),
							    'type' => Controls_Manager::URL,
							    'placeholder' => __( 'https://your-link.com', 'plugin-domain' ),
							    'show_external' => true,
							    'default' => ['url' => '','is_external' => true,'nofollow' => true,],
                			],
            			],
            	    'title_field' => '{{social_link}}',
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
        
        <!-- Getaquote Section -->
        <section class="getaquote-section style-two mx-30" <?php if($settings['bg_img']['id']): ?>style="background-image: url(<?php echo esc_url(wp_get_attachment_url($settings['bg_img']['id']));?>);"<?php endif; ?>>
            <div class="auto-container">
                <div class="wrapper-box">
                    <?php if($settings['image']['id']): ?><div class="side-image"><img src="<?php echo esc_url(wp_get_attachment_url($settings['image']['id']));?>" alt="<?php esc_attr_e('Awesome Image', 'transida'); ?>"></div><?php endif; ?>
                    <div class="row no-gutters">
                        <div class="left-column">
                            <div class="inner-container">
                                <div class="sec-title light">
                                    <div class="sub-title"><?php echo wp_kses($settings['subtitle'], true);?></div>
                                    <h2><?php echo wp_kses($settings['title'], true);?> </h2>
                                </div>
                                <?php echo do_shortcode($settings['quote_form_url2']);?>
                            </div>
                        </div>
                        <div class="right-column">
                            <div class="inner-container">
                                <div class="investor wow fadeInRight" data-wow-duration="1500ms">
                                    <h2><?php echo wp_kses($settings['title1'], true);?></h2>
                                    <?php if($settings['author_img']['id']): ?><div class="image"><img src="<?php echo esc_url(wp_get_attachment_url($settings['author_img']['id']));?>" alt="<?php esc_attr_e('Awesome Image', 'transida'); ?>"></div><?php endif; ?>
                                    <h4><?php echo wp_kses($settings['author_title'], true);?></h4>
                                    <div class="text"> <?php echo wp_kses($settings['author_designation'], true);?></div>
                                    <ul class="contact-info">
                                        <li><a href="tel:<?php echo esc_url($settings['phone_no']);?>"><i class="flaticon-calling"></i><?php echo wp_kses($settings['phone_no'], true);?></a></li>
                                        <li><a href="mailto:<?php echo esc_url($settings['email_address']);?>"><i class="flaticon-mail"></i><?php echo wp_kses($settings['email_address'], true);?></a></li>
                                    </ul>
                                    
                                    <ul class="social-icon">
                                        <?php foreach($settings['social_icon'] as $key => $item):?>
                                        <li><a href="<?php echo esc_url($item['social_link']['url']);?>"><i class="fab <?php echo esc_attr($item['social_icons']);?>"></i></a></li>
                                    	<?php endforeach;?>
                                    </ul>
                                    
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
