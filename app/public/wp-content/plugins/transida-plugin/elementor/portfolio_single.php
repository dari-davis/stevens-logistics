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
class Portfolio_Single extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'transida_portfolio_single';
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
		return esc_html__( 'Portfolio Single', 'transida' );
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
			'portfolio_single',
			[
				'label' => esc_html__( 'Portfolio Single', 'transida' ),
			]
		);
		$this->add_control(
			'portfolio_img',
				[
				  'label' => __( 'Portfolio Image', 'transida' ),
				  'type' => Controls_Manager::MEDIA,
				  'default' => ['url' => Utils::get_placeholder_image_src(),],
				]
	    );
		$this->add_control(
			'project_title',
			[
				'label'       => __( 'Project Title', 'transida' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Project Title', 'transida' ),
			]
		);
		$this->add_control(
			'project_text',
			[
				'label'       => __( 'Project Text', 'transida' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Project Text', 'transida' ),
			]
		);
		$this->add_control(
              'info', 
			  	[
            		'type' => Controls_Manager::REPEATER,
            		'separator' => 'before',
            		'default' => 
						[
                			['info_title' => esc_html__('Category', 'transida')],
                			['info_title' => esc_html__('Client', 'transida')],
							['info_title' => esc_html__('Date', 'transida')],
                			['info_title' => esc_html__('Project Link', 'transida')],
            			],
            		'fields' => 
						[
                			[
                    			'name' => 'info_title',
                    			'label' => esc_html__('Title', 'transida'),
								'label_block' => true,
                    			'type' => Controls_Manager::TEXT,
                    			'default' => esc_html__('', 'transida')
                			],
							[
                    			'name' => 'info_description',
                    			'label' => esc_html__('Descritpion', 'transida'),
								'label_block' => true,
                    			'type' => Controls_Manager::TEXT,
                    			'default' => esc_html__('', 'transida')
                			],
            			],
            	    'title_field' => '{{info_title}}',
                 ]
        );
		$this->add_control(
			'title',
			[
				'label'       => __( 'Title', 'transida' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
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
              'features', 
			  	[
            		'type' => Controls_Manager::REPEATER,
            		'separator' => 'before',
            		'default' => 
						[
                			['block_title' => esc_html__('Challenges', 'transida')],
                			['block_title' => esc_html__('Solutions', 'transida')]
            			],
            		'fields' => 
						[
                			[
                    			'name' => 'feature_img',
                    			'label' => __( 'Feature Image', 'transida' ),
								'type' => Controls_Manager::MEDIA,
								'default' => ['url' => Utils::get_placeholder_image_src(),],
                			],
							[
                    			'name' => 'block_title',
                    			'label' => esc_html__('Title', 'transida'),
								'label_block' => true,
                    			'type' => Controls_Manager::TEXT,
                    			'default' => esc_html__('', 'transida')
                			],
							[
                    			'name' => 'block_text',
                    			'label' => esc_html__('Descritpion', 'transida'),
								'type' => Controls_Manager::TEXTAREA,
                    			'default' => esc_html__('', 'transida')
                			],
							[
                    			'name' => 'features_list',
                    			'label' => esc_html__('Feature List', 'transida'),
								'type' => Controls_Manager::TEXTAREA,
                    			'default' => esc_html__('', 'transida')
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
       	
        <!-- Project details -->
        <section class="project-details">
            <div class="auto-container">
                <div class="image-block">
                    <?php if($settings['portfolio_img']['id']): ?><div class="image"><img src="<?php echo esc_url(wp_get_attachment_url($settings['portfolio_img']['id']));?>" alt="<?php esc_attr_e('Awesome Image', 'transida'); ?>"></div><?php endif; ?>
                    <div class="project-info">
                        <h4><?php echo wp_kses($settings['project_title'], true);?></h4>
                        <div class="text"><?php echo wp_kses($settings['project_text'], true);?></div>
                        <div class="content">
                            <div class="row">
                                <?php foreach($settings['info'] as $key => $item):?>
                                <div class="column col-sm-6">
                                    <h5><?php echo wp_kses($item['info_title'], true);?></h5>
                                    <p><?php echo wp_kses($item['info_description'], true);?></p>
                                </div>
                                <?php endforeach;?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-block">
                    <h3><?php echo wp_kses($settings['title'], true);?></h3>
                    <div class="text"><?php echo wp_kses($settings['text'], true);?></div>
                </div>
                <div class="row">
                    <?php $count = 0; foreach($settings['features'] as $key => $item):?>
                    <div class="col-md-6">
                        <div class="image-block-two">
                            <?php if($item['feature_img']['id']): ?>
                            <div class="image">
                                <img src="<?php echo esc_url(wp_get_attachment_url($item['feature_img']['id']));?>" alt="<?php esc_attr_e('Awesome Image', 'transida'); ?>">
                                <h4><?php echo wp_kses($item['block_title'], true);?></h4>
                            </div>
                            <?php endif; ?>
                            <div class="content">
                                <div class="text"><?php echo wp_kses($item['block_text'], true);?></div>
                                <?php $features_list = $item['features_list'];
									if(!empty($features_list)){
									$features_list = explode("\n", ($features_list)); 
								?>
                                <?php if($count % 2) { ?>
                                <ul class="list style-two">
                                    <?php foreach($features_list as $features): ?>
									<li><?php echo wp_kses($features, true); ?></li>
                                	<?php endforeach; ?>
                                </ul>
                                <?php } else { ?>
                                <ul class="list">
                                    <?php foreach($features_list as $features): ?>
									<li><?php echo wp_kses($features, true); ?></li>
                                	<?php endforeach; ?>
                                </ul>
                                <?php } ?>
                                <?php } ?>
                            </div>                        
                        </div>
                    </div>
                    <?php  $count++; endforeach;?>
                </div>
                
            </div>
        </section>
                
		<?php 
	}

}
