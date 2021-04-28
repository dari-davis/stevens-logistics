<?php namespace TRANSIDAPLUGIN\Element;

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
class Latest_News_V2 extends Widget_Base {

    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'transida_latest_news_v2';
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
        return esc_html__( 'Latest News V2', 'transida' );
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
            'latest_news_v2',
            [
                'label' => esc_html__( 'General', 'transida' ),
				'tab' => Controls_Manager::TAB_LAYOUT,
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
				'placeholder' => __( 'Enter your Sub title', 'transida' ),
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
		$this->add_control(
			'style_two',
            [
				'label'   => esc_html__( 'Choose News Style', 'transida' ),
				'type'    => Controls_Manager::SELECT,
				'label-block' => true,
				'default' => 'one',
				'options' => array(
					'one' => esc_html__( 'Choose News One', 'transida' ),
					'two'  => esc_html__( 'Choose News Two', 'transida' ),
				),
			]
		);
		$this->end_controls_section();
		
		//Blog With Image
		$this->start_controls_section(
            'grid_view',
            [
                'label' => esc_html__( 'Post Grid View', 'transida' ),
				'tab' => Controls_Manager::TAB_LAYOUT,
            ]
        );
        $this->add_control(
            'text_limit',
            [
                'label'   => esc_html__( 'Text Limit', 'transida' ),
                'type'    => Controls_Manager::NUMBER,
                'default' => 11,
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
                'default' => 5,
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
                'default' => 'ASC',
                'options' => array(
                    'DESC' => esc_html__( 'DESC', 'transida' ),
                    'ASC'  => esc_html__( 'ASC', 'transida' ),
                ),
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
		
		//Blog Without Image
		$this->start_controls_section(
            'list_view',
            [
                'label' => esc_html__( 'Post List View', 'transida' ),
				'tab' => Controls_Manager::TAB_LAYOUT,
            ]
        );
		$this->add_control(
            'text_limit2',
            [
                'label'   => esc_html__( 'Text Limit', 'transida' ),
                'type'    => Controls_Manager::NUMBER,
                'default' => 11,
                'min'     => 1,
                'max'     => 100,
                'step'    => 1,
            ]
        );
        $this->add_control(
            'query_numbers',
            [
                'label'   => esc_html__( 'Number of post', 'transida' ),
                'type'    => Controls_Manager::NUMBER,
                'default' => 5,
                'min'     => 1,
                'max'     => 100,
                'step'    => 1,
            ]
        );
        $this->add_control(
            'query_orderbys',
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
            'query_orders',
            [
                'label'   => esc_html__( 'Order', 'transida' ),
                'type'    => Controls_Manager::SELECT,
                'default' => 'ASC',
                'options' => array(
                    'DESC' => esc_html__( 'DESC', 'transida' ),
                    'ASC'  => esc_html__( 'ASC', 'transida' ),
                ),
            ]
        );
        $this->add_control(
            'query_categorys',
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

        $paged = transida_set($_POST, 'paged') ? esc_attr($_POST['paged']) : 1;

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
		
		//Second Query
		$args2 = array(
            'post_type'      => 'post',
            'posts_per_page' => transida_set( $settings, 'query_numbers' ),
            'orderby'        => transida_set( $settings, 'query_orderbys' ),
            'order'          => transida_set( $settings, 'query_orders' ),
            'paged'         => $paged
        );

        if ( transida_set( $settings, 'query_excludes' ) ) {
            $settings['query_excludes'] = explode( ',', $settings['query_excludes'] );
            $args2['post__not_in']      = transida_set( $settings, 'query_excludes' );
        }

        if( transida_set( $settings, 'query_categorys' ) ) $args2['category_name'] = transida_set( $settings, 'query_categorys' );
        $query2 = new \WP_Query( $args2 );
		
        if ( $query->have_posts() ) { 
		
		
		?>
		
        <?php if($settings['style_two'] == 'two'): ?>
        <!-- News Section Two -->
        <section class="news-section-two style-two mx-30">
            <div class="auto-container">
                <div class="sec-title text-center">
                    <div class="sub-title"><?php echo wp_kses($settings['subtitle'], true);?></div>
                    <h2><?php echo wp_kses($settings['title'], true);?></h2>
                </div>
                
                <div class="row">
                    <?php 
						while ( $query->have_posts() ) : $query->the_post(); 
						global  $post;
						$post_thumbnail_id = get_post_thumbnail_id($post->ID);
						$post_thumbnail_url = wp_get_attachment_url($post_thumbnail_id);
					?>
                    <div class="news-block-two col-lg-6 col-md-12">
                        <div class="inner-box wow fadeInUp" data-wow-duration="1500ms">
                            <?php if(has_post_thumbnail()): ?>
                            <div class="image">
                                <a href="<?php echo esc_url( the_permalink( get_the_id() ) );?>"><?php the_post_thumbnail('transida_570x270'); ?></a>
                                <div class="date"><?php echo get_the_date('d'); ?> <br> <?php echo get_the_date('M'); ?></div>
                                <div class="overlay"><a href="<?php echo esc_url($post_thumbnail_url);?>" class="lightbox-image" data-fancybox="gallery"><span class="flaticon-full-size"></span></a></div>
                            </div>
                            <?php endif; ?>
                            <div class="lower-content">
                                <div class="category"><i class="fas fa-folder"></i> <?php the_category(' ');?></div>
                                <h3><a href="<?php echo esc_url( the_permalink( get_the_id() ) );?>"><?php the_title(); ?></a></h3>
                                <div class="text"><?php echo transida_trim(get_the_content(), $settings['text_limit']); ?></div>
                                <div class="link">
                                    <a href="<?php echo esc_url( the_permalink( get_the_id() ) );?>" class="readmore-link style-two"><span><i class="flaticon-up-arrow"></i><?php esc_html_e('More Details', 'transida'); ?></span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endwhile; ?>
                    <?php 
						while ( $query2->have_posts() ) : $query2->the_post(); 
						global  $post;
						$post_thumbnail_id2 = get_post_thumbnail_id($post->ID);
						$post_thumbnail_url2 = wp_get_attachment_url($post_thumbnail_id2);
					?>
                    <div class="news-block-two col-lg-3 col-md-6">
                        <div class="inner-box style-two wow fadeInUp" data-wow-duration="1500ms">
                            <?php if(has_post_thumbnail()): ?>
                            <div class="image">
                                <a href="<?php echo esc_url( the_permalink( get_the_id() ) );?>"><?php the_post_thumbnail('transida_270x270'); ?></a>
                                <div class="date"><?php echo get_the_date('d'); ?> <br> <?php echo get_the_date('M'); ?></div>
                                <div class="overlay"><a href="<?php echo esc_url($post_thumbnail_url2);?>" class="lightbox-image" data-fancybox="gallery"><span class="flaticon-full-size"></span></a></div>
                            </div>
                            <?php endif; ?>
                            <div class="lower-content">
                                <div class="category"><i class="fas fa-folder"></i> <?php the_category(' ');?></div>
                                <h3><a href="<?php echo esc_url( the_permalink( get_the_id() ) );?>"><?php the_title(); ?></a></h3>
                                <div class="text"><?php echo transida_trim(get_the_content(), $settings['text_limit2']); ?></div>
                                <div class="link">
                                    <a href="<?php echo esc_url( the_permalink( get_the_id() ) );?>" class="readmore-link style-two"><span><i class="flaticon-up-arrow"></i><?php esc_html_e('More Details', 'transida'); ?></span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endwhile; ?>
                </div>
                
                <div class="read-more-link text-center">
                    <a href="<?php echo esc_url($settings['btn_link']['url']);?>" class="theme-btn btn-style-one"><span><i class="flaticon-up-arrow"></i><?php echo wp_kses($settings['btn_title'], true);?></span></a>
                </div>
            </div>
        </section>
        
        <?php else: ?>
        
        <!-- News Section Two -->
        <section class="news-section-two">
            <div class="auto-container">
                <div class="sec-top row m-0 justify-content-md-between align-items-center">
                    <div class="sec-title">
                        <div class="sub-title"><?php echo wp_kses($settings['subtitle'], true);?></div>
                        <h2><?php echo wp_kses($settings['title'], true);?></h2>
                    </div>
                    <div class="link">
                        <a href="<?php echo esc_url($settings['btn_link']['url']);?>" class="readmore-link"><i class="flaticon-up-arrow"></i><?php echo wp_kses($settings['btn_title'], true);?></a>
                    </div>
                </div>
                <div class="row">
                    <?php 
						while ( $query->have_posts() ) : $query->the_post(); 
						global  $post;
						$post_thumbnail_id = get_post_thumbnail_id($post->ID);
						$post_thumbnail_url = wp_get_attachment_url($post_thumbnail_id);
					?>
                    <div class="news-block-two col-lg-6 col-md-12">
                        <div class="inner-box wow fadeInUp" data-wow-duration="1500ms">
                            <?php if(has_post_thumbnail()): ?>
                            <div class="image">
                                <a href="<?php echo esc_url( the_permalink( get_the_id() ) );?>"><?php the_post_thumbnail('transida_570x270'); ?></a>
                                <div class="date"><?php echo get_the_date('d'); ?> <br> <?php echo get_the_date('M'); ?></div>
                                <div class="overlay"><a href="<?php echo esc_url($post_thumbnail_url);?>" class="lightbox-image" data-fancybox="gallery"><span class="flaticon-full-size"></span></a></div>
                            </div>
                            <?php endif; ?>
                            <div class="lower-content">
                                <div class="category"><i class="fas fa-folder"></i> <?php the_category(' ');?></div>
                                <h3><a href="<?php echo esc_url( the_permalink( get_the_id() ) );?>"><?php the_title(); ?></a></h3>
                                <div class="text"><?php echo transida_trim(get_the_content(), $settings['text_limit']); ?></div>
                                <div class="link">
                                    <a href="<?php echo esc_url( the_permalink( get_the_id() ) );?>" class="readmore-link"><i class="flaticon-up-arrow"></i><?php esc_html_e('More Details', 'transida'); ?></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endwhile; ?>
                    <?php while ( $query2->have_posts() ) : $query2->the_post(); 
						global  $post;
						$post_thumbnail_id2 = get_post_thumbnail_id($post->ID);
						$post_thumbnail_url2 = wp_get_attachment_url($post_thumbnail_id2);
					?>
                    <div class="news-block-two col-lg-3 col-md-6">
                        <div class="inner-box style-two wow fadeInUp" data-wow-duration="1500ms">
                            <?php if(has_post_thumbnail()): ?>
                            <div class="image">
                                <a href="<?php echo esc_url( the_permalink( get_the_id() ) );?>"><?php the_post_thumbnail('transida_270x270'); ?></a>
                                <div class="date"><?php echo get_the_date('d'); ?> <br> <?php echo get_the_date('M'); ?></div>
                                <div class="overlay"><a href="<?php echo esc_url($post_thumbnail_url2);?>" class="lightbox-image" data-fancybox="gallery"><span class="flaticon-full-size"></span></a></div>
                            </div>
                            <?php endif; ?>
                            <div class="lower-content">
                                <div class="category"><i class="fas fa-folder"></i> <?php the_category(' ');?></div>
                                <h3><a href="<?php echo esc_url( the_permalink( get_the_id() ) );?>"><?php the_title(); ?></a></h3>
                                <div class="text"><?php echo transida_trim(get_the_content(), $settings['text_limit2']); ?></div>
                                <div class="link">
                                    <a href="<?php echo esc_url( the_permalink( get_the_id() ) );?>" class="readmore-link"><i class="flaticon-up-arrow"></i><?php esc_html_e('More Details', 'transida'); ?></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endwhile; ?>
                </div>
            </div>
        </section>
        
        <?php endif; }

        wp_reset_postdata();
    }
}
