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
class Global_Network extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'transida_global_network';
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
		return esc_html__( 'Global Network', 'transida' );
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
			'global_network',
			[
				'label' => esc_html__( 'Global Network', 'transida' ),
			]
		);
		$this->add_control(
              'contact_info', 
			  	[
            		'type' => Controls_Manager::REPEATER,
            		'separator' => 'before',
					'default' => 
						[
                			['country_name' => esc_html__('America', 'transida')],
                			['country_name' => esc_html__('Australia', 'transida')],
							['country_name' => esc_html__('Britain', 'transida')],
							['country_name' => esc_html__('Canada', 'transida')],
							['country_name' => esc_html__('India', 'transida')],
							['country_name' => esc_html__('Sweden', 'transida')],
            			],
            		'fields' => 
						[
                			[
                    			'name' => 'flag_image',
                    			'label' => __( 'Country Flag Image', 'transida' ),
								'type' => Controls_Manager::MEDIA,
								'default' => ['url' => Utils::get_placeholder_image_src(),],
                			],
							[
                    			'name' => 'country_name',
                    			'label' => esc_html__('Location Name', 'transida'),
								'label_block' => true,
                    			'type' => Controls_Manager::TEXT,
                    			'default' => esc_html__('', 'transida')
                			],
							[
								'name' => 'query_number',
								'label'   => esc_html__( 'Number of post', 'transida' ),
								'type'    => Controls_Manager::NUMBER,
								'default' => 3,
								'min'     => 1,
								'max'     => 100,
								'step'    => 1,
							],
							[
								'name' => 'query_orderby',
								'label'   => esc_html__( 'Order By', 'transida' ),
								'type'    => Controls_Manager::SELECT,
								'default' => 'date',
								'options' => array(
									'date'       => esc_html__( 'Date', 'transida' ),
									'title'      => esc_html__( 'Title', 'transida' ),
									'menu_order' => esc_html__( 'Menu Order', 'transida' ),
									'rand'       => esc_html__( 'Random', 'transida' ),
								),
							],
							[
								'name' => 'query_order',
								'label'   => esc_html__( 'Order', 'transida' ),
								'type'    => Controls_Manager::SELECT,
								'default' => 'DESC',
								'options' => array(
									'DESc' => esc_html__( 'DESC', 'transida' ),
									'ASC'  => esc_html__( 'ASC', 'transida' ),
								),
							],
							[
								'name' => 'query_exclude',
								'label'       => esc_html__( 'Exclude', 'transida' ),
								'label_block' => true,
								'type'        => Controls_Manager::TEXT,
								'description' => esc_html__( 'Exclude posts, pages, etc. by ID with comma separated.', 'transida' ),
							],
							[
							  'name' => 'query_category',
							  'type' => Controls_Manager::SELECT,
							  'label' => esc_html__('Category', 'transida'),
							  'label_block' => true,
							  'options' => get_network_categories()
							],
						],
					'title_field' => '{{country_name}}',
                 ]
        );
		$this->add_control(
			'bottom_description',
			[
				'label'       => __( 'Bottom Description', 'transida' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Bottom Description', 'transida' ),
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
		
		?>
		<!-- Contact Info section -->
        <section class="contact-info-section-three">
            <div class="auto-container">
                <div class="tab-area">
                    <ul class="nav nav-tabs tab-btn-style-one" role="tablist">
                        <?php foreach($settings['contact_info'] as $key => $item):?>
                        <li class="nav-item">
                            <a class="nav-link <?php if($key == 1) echo 'active';?>"  data-toggle="tab" href="#tab-one<?php echo esc_attr($key);?>" role="tab" aria-selected="true">
                                <?php if($item['flag_image']['id']): ?><div class="flag"><img src="<?php echo esc_url(wp_get_attachment_url($item['flag_image']['id']));?>" alt="<?php esc_attr_e('Awesome Image', 'transida'); ?>"></div><?php endif; ?>
                                <h4><?php echo wp_kses($item['country_name'], true);?></h4>
                            </a>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content wow fadeInUp" data-wow-delay="200ms" data-wow-duration="1200ms">
                        <?php foreach($settings['contact_info'] as $keys => $item):
													
							$paged = transida_set($_POST, 'paged') ? esc_attr($_POST['paged']) : 1;
							$this->add_render_attribute( 'wrapper', 'class', 'templatepath-transida' );
							$args = array(
								'post_type'      => 'transida_network',
								'posts_per_page' => transida_set( $item, 'query_number' ),
								'orderby'        => transida_set( $item, 'query_orderby' ),
								'order'          => transida_set( $item, 'query_order' ),
								'paged'         => $paged
							);
							if ( transida_set( $item, 'query_exclude' ) ) {
								$item['query_exclude'] = explode( ',', $item['query_exclude'] );
								$args['post__not_in']      = transida_set( $item, 'query_exclude' );
							}
							if( transida_set( $item, 'query_category' ) ) $args['network_cat'] = transida_set( $item, 'query_category' );
							$query = new \WP_Query( $args );
							if ( $query->have_posts()):	
						?>
                        <div class="tab-pane fadeInUp animated <?php if($keys == 1) echo 'active';?>" id="tab-one<?php echo esc_attr($keys);?>" role="tabpanel" >
                            <div class="row">
                                <?php 
									while ( $query->have_posts() ) : $query->the_post();
								?>
                                <div class="col-lg-3 col-md-6 contact-info-block-two">
                                    <div class="inner-box">
                                        <h4><?php the_title(); ?></h4>
                                        <ul>
                                            <li><a href="tel:<?php echo (get_post_meta( get_the_id(), 'phone_no', true ));?>"><span><?php echo (get_post_meta( get_the_id(), 'phone_no', true ));?></span></a></li>
                                            <li><a href="mailto:<?php echo (get_post_meta( get_the_id(), 'email_address', true ));?>"><?php echo (get_post_meta( get_the_id(), 'email_address', true ));?></a></li>
                                            <li><?php echo (get_post_meta( get_the_id(), 'address', true ));?></li>
                                        </ul>
                                    </div>
                                </div>
                                <?php endwhile;?>
                            </div>
                        </div>
                        <?php endif;?>
						<?php endforeach;?>
                    </div>
                </div>            
                <div class="bottom-content text-center">
                    <div class="text"><?php echo wp_kses($settings['bottom_description'], true);?> </div>
                </div>
            </div>
        </section>
    	
		<?php 
	}

}
