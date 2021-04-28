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
class Faqs_Tab extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'transida_faqs_tab';
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
		return esc_html__( 'Faqs Tab', 'transida' );
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
			'faqs_tab',
			[
				'label' => esc_html__( 'Faqs Tab', 'transida' ),
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
              'faq_tab', 
			  	[
            		'type' => Controls_Manager::REPEATER,
            		'separator' => 'before',
					'default' => 
						[
                			['block_title' => esc_html__('I am a  Customer', 'transida')],
                			['block_title' => esc_html__('I am a Supplier', 'transida')],
							['block_title' => esc_html__('I am a Job Applicant', 'transida')],
							['block_title' => esc_html__('About Company', 'transida')]
            			],
            		'fields' => 
						[
                			[
                    			'name' => 'block_title',
                    			'label' => esc_html__('Button Title', 'transida'),
								'label_block' => true,
                    			'type' => Controls_Manager::TEXT,
                    			'default' => esc_html__('Button Title', 'transida')
                			],
							[
								'name' => 'text_limit',
								'label'   => esc_html__('Text Limit', 'transida'),
								'type'    => Controls_Manager::NUMBER,
								'default' => 3,
								'min'     => 1,
								'max'     => 100,
								'step'    => 1,
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
							  'options' => get_faqs_categories()
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
		
		?>
		
		<!-- Faq Section -->
		<section class="faq-section">
			<div class="auto-container">
				<div class="sec-title text-center">
					<?php if($settings['subtitle']): ?><div class="sub-title"><?php echo wp_kses($settings['subtitle'], true);?></div><?php endif; ?>
					<h2><?php echo wp_kses($settings['title'], true);?></h2>
				</div>
				<div class="tab-area">
					<ul class="nav nav-tabs tab-btn-style-one" role="tablist">
						<?php foreach($settings['faq_tab'] as $key => $item):?>
						<li class="nav-item">
							<a class="nav-link <?php if($key == 1) echo 'active';?>" data-toggle="tab" href="#tab-one<?php echo esc_attr($key);?>" role="tab" aria-selected="true">
								<h4><?php echo wp_kses($item['block_title'], true);?> <i class="flaticon-up-arrow"></i></h4>
							</a>
						</li>
						<?php endforeach; ?>
					</ul>
					<!-- Tab panes -->
					<div class="tab-content wow fadeInUp" data-wow-delay="200ms" data-wow-duration="1200ms">
						<?php foreach($settings['faq_tab'] as $keys => $item):
													
							$paged = transida_set($_POST, 'paged') ? esc_attr($_POST['paged']) : 1;
							$this->add_render_attribute( 'wrapper', 'class', 'templatepath-transida' );
							$args = array(
								'post_type'      => 'transida_faqs',
								'posts_per_page' => transida_set( $item, 'query_number' ),
								'orderby'        => transida_set( $item, 'query_orderby' ),
								'order'          => transida_set( $item, 'query_order' ),
								'paged'         => $paged
							);
							if ( transida_set( $item, 'query_exclude' ) ) {
								$item['query_exclude'] = explode( ',', $item['query_exclude'] );
								$args['post__not_in']      = transida_set( $item, 'query_exclude' );
							}
							if( transida_set( $item, 'query_category' ) ) $args['faqs_cat'] = transida_set( $item, 'query_category' );
							$query = new \WP_Query( $args );
							if ( $query->have_posts()):	
						?>
						<div class="tab-pane fadeInUp animated <?php if($keys == 1) echo 'active';?>" id="tab-one<?php echo esc_attr($keys);?>" role="tabpanel">
							<ul class="accordion-box style-two mb-30">
								<?php 
									$count = 0;
									$i = 1;
									while ( $query->have_posts() ) : $query->the_post();
								?>
								<!--Accordion Block-->
								<li class="accordion block">
									<div class="acc-btn <?php if($count == 0) echo 'active';?>"><div class="icon-outer"><span class="icon icon_plus far fa-plus"></span> <span class="icon icon_minus far fa-plus "></span></div><strong><?php $i = sprintf('%02d', $i); echo $i; ?>.</strong>  <?php the_title();?></div>
									<div class="acc-content <?php if($count == 0) echo 'current';?>">
										<div class="content">
											<div class="text"><?php echo transida_trim(get_the_content(), $item['text_limit']); ?>
											</div>
										</div>
									</div>
								</li>
								<?php $count++; $i++; endwhile;?>
							</ul>
						</div>
						<?php endif;?>
						<?php endforeach;?>
					</div>
				</div>
			</div>
		</section>	
         
		<?php 
	}

}
