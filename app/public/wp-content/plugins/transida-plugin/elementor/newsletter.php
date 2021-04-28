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
class Newsletter extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'transida_newsletter';
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
		return esc_html__( 'Newsletter', 'transida' );
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
			'newsletter',
			[
				'label' => esc_html__( 'Newsletter', 'transida' ),
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
            'title',
            [
                'label'       => __('Title', 'transida'),
                'type'        => Controls_Manager::TEXTAREA,
                'dynamic'     => [
                    'active' => true,
                ],
                'placeholder' => __('Enter your title', 'transida'),
            ]
        );
		$this->add_control(
            'mailchimp_form_code',
            [
                'label'       => __('Mail Chimp Form Url', 'transida'),
                'type'        => Controls_Manager::TEXT,
				'label_block' => true,
                'dynamic'     => [
                    'active' => true,
                ],
                'placeholder' => __('Enter your Mail Chimp Form Url', 'transida'),
            ]
        );
		$this->add_control(
            'style_two',
			[
				'label'   => esc_html__( 'Choose Spacing Isssues', 'transida' ),
				'label_block' => true,
				'type'    => Controls_Manager::SELECT,
				'default' => 'one',
				'options' => array(
					'one' => esc_html__( 'Enable Top Sapace', 'transida' ),
					'two'  => esc_html__( 'Disable Top Sapace', 'transida' ),
				),
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
        
        <section class="newsletter-section <?php if($settings['style_two'] == 'two' ) echo 'style-two'; else echo ''?>">
            <div class="auto-container">
                <div class="row">
                    <div class="col-lg-5">
                        <h3><?php if($settings['icons']): ?><span class="<?php echo esc_attr($settings['icons']);?>"></span><?php endif; ?> <?php echo wp_kses($settings['title'], true);?></h3>
                    </div>
                    <div class="col-lg-7">
                        <div class="newsletter-form">
                            <?php echo do_shortcode($settings['mailchimp_form_code'], true); ?>
                        </div>
                    </div>
                </div>
            </div>        
        </section>
               
		<?php 
	}

}
