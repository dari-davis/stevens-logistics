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
class Blog_Grid_View extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'transida_blog_grid_view';
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
		return esc_html__( 'Blog Grid View', 'transida' );
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
			'blog_grid_view',
			[
				'label' => esc_html__( 'Blog Grid View', 'transida' ),
			]
		);
		$this->add_control(
			'text_limit',
			[
				'label'   => esc_html__( 'Text Limit', 'transida' ),
				'type'    => Controls_Manager::NUMBER,
				'default' => 3,
				'min'     => 1,
				'max'     => 100,
				'step'    => 1,
			]
		);
		$this->add_control(
			'query_number',
			[
				'label'   => esc_html__( 'Number of post', 'transida' ),
				'type'    => Controls_Manager::NUMBER,
				'default' => 3,
				'min'     => 1,
				'max'     => 100,
				'step'    => 1,
			]
		);
		$this->add_control(
			'query_orderby',
			[
				'label'   => esc_html__( 'Order By', 'transida' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'date',
				'options' => array(
					'date'       => esc_html__( 'Date', 'transida' ),
					'title'      => esc_html__( 'Title', 'transida' ),
					'menu_order' => esc_html__( 'Menu Order', 'transida' ),
					'rand'       => esc_html__( 'Random', 'transida' ),
				),
			]
		);
		$this->add_control(
			'query_order',
			[
				'label'   => esc_html__( 'Order', 'transida' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'DESC',
				'options' => array(
					'DESc' => esc_html__( 'DESC', 'transida' ),
					'ASC'  => esc_html__( 'ASC', 'transida' ),
				),
			]
		);
		$this->add_control(
			'query_exclude',
			[
				'label'       => esc_html__( 'Exclude', 'transida' ),
				'type'        => Controls_Manager::TEXT,
				'description' => esc_html__( 'Exclude posts, pages, etc. by ID with comma separated.', 'transida' ),
			]
		);
		$this->add_control(
            'query_category', 
				[
				  'type' => Controls_Manager::SELECT,
				  'label' => esc_html__('Category', 'transida'),
				  'options' => get_blog_categories()
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
		
        $paged = get_query_var('paged');
		$paged = transida_set($_REQUEST, 'paged') ? esc_attr($_REQUEST['paged']) : $paged;

		$this->add_render_attribute( 'wrapper', 'class', 'templatepath-transida' );
		$args = array(
			'post_type'      => 'post',
			'posts_per_page' => transida_set( $settings, 'query_number' ),
			'orderby'        => transida_set( $settings, 'query_orderby' ),
			'order'          => transida_set( $settings, 'query_order' ),
			'paged'         => $paged
		);
		if ( transida_set( $settings, 'query_exclude' ) ) {
			$settings['query_exclude'] = explode( ',', $settings['query_exclude'] );
			$args['post__not_in']      = transida_set( $settings, 'query_exclude' );
		}
		if( transida_set( $settings, 'query_category' ) ) $args['category_name'] = transida_set( $settings, 'query_category' );
		$query = new \WP_Query( $args );

		if ( $query->have_posts() ) 
		{ ?>
		
        <!-- News Section -->
        <section class="news-section">
            <div class="auto-container">
                <div class="row">
                    <?php 
						while ( $query->have_posts() ) : $query->the_post(); 
					?>
                    <div class="news-block-one col-lg-4 col-md-6">
                        <div class="inner-box">
                            <?php if(has_post_thumbnail()): ?>
                            <div class="image">
                                <a href="<?php echo esc_url( the_permalink( get_the_id() ) );?>"><?php the_post_thumbnail('transida_370x270'); ?></a>
                                <div class="date"><?php echo get_the_date('d'); ?> <br> <?php echo get_the_date('M'); ?></div>
                            </div>
                            <?php endif; ?>
                            <div class="lower-content">
                                <div class="category"><i class="fas fa-folder"></i> <?php the_category(' '); ?></div>
                                <h3><a href="<?php echo esc_url( the_permalink( get_the_id() ) );?>"><?php the_title(); ?></a></h3>
                                <div class="text"><?php echo transida_trim(get_the_content(), $settings['text_limit']); ?></div>
                                <div class="link">
                                    <a href="<?php echo esc_url( the_permalink( get_the_id() ) );?>" class="readmore-link"><i class="flaticon-up-arrow"></i><?php esc_html_e('More Details', 'transida'); ?></a>
                                </div>
                            </div>
                            <div class="overlay">
                                <?php if(has_post_thumbnail()): ?>
                                <div class="image">
                                    <a href="<?php echo esc_url( the_permalink( get_the_id() ) );?>"><?php the_post_thumbnail('transida_370x533'); ?></a>
                                    <div class="date"><?php echo get_the_date('d'); ?> <br> <?php echo get_the_date('M'); ?></div>
                                </div>
                                <?php endif; ?>
                                <div class="lower-content">
                                    <div class="category"><i class="fas fa-folder"></i> <?php the_category(' '); ?></div>
                                    <h3><a href="<?php echo esc_url( the_permalink( get_the_id() ) );?>"><?php the_title(); ?></a></h3>
                                    <div class="link">
                                        <a href="<?php echo esc_url( the_permalink( get_the_id() ) );?>" class="readmore-link"><i class="flaticon-up-arrow"></i><?php esc_html_e('More Details', 'transida'); ?></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endwhile; ?>
                </div>
                <div class="pagination mt-4">
					<?php transida_the_pagination2(array('total'=>$query->max_num_pages, 'next_text' => '<i class="flaticon-right-arrow-6"></i> ', 'prev_text' => '<i class="flaticon-right-arrow-6"></i> ')); ?>
                </div>            
            </div>
        </section>
        
        <?php }
		wp_reset_postdata();
	}

}
