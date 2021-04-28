<?php
///----Blog widgets---
//Popular Post 
class Transida_Popular_Post extends WP_Widget
{
	/** constructor */
	function __construct()
	{
		parent::__construct( /* Base ID */'Transida_Popular_Post', /* Name */esc_html__('Transida Popular Post','transida'), array( 'description' => esc_html__('Show the Popular Post', 'transida' )) );
	}
 
	/** @see WP_Widget::widget */
	function widget($args, $instance)
	{
		extract( $args );
		$title = apply_filters( 'widget_title', $instance['title'] );
		
		echo wp_kses_post($before_widget); ?>
		
        
        <!-- Popular Posts -->
        <div class="news-widget-two">
            <?php echo wp_kses_post($before_title.$title.$after_title); ?>
            <div class="wrapper-box">
               <?php $query_string = 'posts_per_page='.$instance['number'];
					if( $instance['cat'] ) $query_string .= '&cat='.$instance['cat'];
					 
					$this->posts($query_string);
				?> 
            </div>
        </div>
        
		<?php echo wp_kses_post($after_widget);
	}
 
 
	/** @see WP_Widget::update */
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;
		
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['number'] = $new_instance['number'];
		$instance['cat'] = $new_instance['cat'];
		
		return $instance;
	}

	/** @see WP_Widget::form */
	function form($instance)
	{
		$title = ( $instance ) ? esc_attr($instance['title']) : esc_html__('Popular Post', 'transida');
		$number = ( $instance ) ? esc_attr($instance['number']) : 3;
		$cat = ( $instance ) ? esc_attr($instance['cat']) : '';?>
			
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title: ', 'transida'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('number')); ?>"><?php esc_html_e('No. of Posts:', 'transida'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('number')); ?>" name="<?php echo esc_attr($this->get_field_name('number')); ?>" type="text" value="<?php echo esc_attr( $number ); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('categories')); ?>"><?php esc_html_e('Category', 'transida'); ?></label>
            <?php wp_dropdown_categories( array('show_option_all'=>esc_html__('All Categories', 'transida'), 'selected'=>$cat, 'class'=>'widefat', 'name'=>$this->get_field_name('categories')) ); ?>
        </p>
            
		<?php 
	}
	
	function posts($query_string)
	{
		
		$query = new WP_Query($query_string);
		if( $query->have_posts() ):?>
        
           	<!-- Title -->
			<?php 
				while( $query->have_posts() ): $query->the_post(); 
				global $post ; 
				$post_thumbnail_id = get_post_thumbnail_id($post->ID);
            	$post_thumbnail_url = wp_get_attachment_url($post_thumbnail_id);
			?>
            <div class="post" style="background-image: url(<?php echo esc_url($post_thumbnail_url); ?>);">
                <div class="content">
                    <div class="date"><i class="far fa-calendar"></i> <?php echo get_the_date();?></div>
                    <h4><a href="<?php echo esc_url(get_the_permalink(get_the_id()));?>"><?php the_title(); ?></a></h4>
                </div>
            </div>
            <?php endwhile; ?>
            
        <?php endif;
		wp_reset_postdata();
    }
}

//Advertisement
class Transida_Advertisement extends WP_Widget
{
	
	/** constructor */
	function __construct()
	{
		parent::__construct( /* Base ID */'Transida_Advertisement', /* Name */esc_html__('Transida Advertisement','transida'), array( 'description' => esc_html__('Show the Advertisement', 'transida' )) );
	}

	/** @see WP_Widget::widget */
	function widget($args, $instance)
	{
		extract( $args );
		$title = apply_filters( 'widget_title', $instance['title'] );
		
		echo wp_kses_post($before_widget);?>
      		
			<!--Footer Column-->
            <div class="advertisement-widget">
                <?php echo wp_kses_post($before_title.$title.$after_title); ?>
                <div class="content">
                    <?php if($instance['logo_img']): ?><div class="logo"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url($instance['logo_img']); ?>" alt="<?php esc_attr_e('Awesome Image', 'transida'); ?>"></a></div><?php endif; ?>
                    <h4><?php echo wp_kses_post($instance['content']); ?></h4>
                    <?php if($instance['btn_link']): ?>
                    <div class="link-box">
                        <a href="<?php echo esc_url($instance['btn_link']); ?>" class="theme-btn btn-style-one"><span><i class="flaticon-up-arrow"></i><?php echo wp_kses_post($instance['btn_title']); ?></span></a>
                    </div>
                    <?php endif; ?>
                    <?php if($instance['advertisement_img']): ?><div class="image"><img src="<?php echo esc_url($instance['advertisement_img']); ?>" alt="<?php esc_attr_e('Awesome Image', 'transida'); ?>"></div><?php endif; ?>
                </div>
            </div>
            
        <?php
		
		echo wp_kses_post($after_widget);
	}
	
	
	/** @see WP_Widget::update */
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;

		$instance['title'] = strip_tags($new_instance['title']);
		$instance['logo_img'] = $new_instance['logo_img'];
		$instance['content'] = $new_instance['content'];
		$instance['btn_title'] = $new_instance['btn_title'];
		$instance['btn_link'] = $new_instance['btn_link'];
		$instance['advertisement_img'] = $new_instance['advertisement_img'];
		
		return $instance;
	}

	/** @see WP_Widget::form */
	function form($instance)
	{
		$title = ($instance) ? esc_attr($instance['title']) : 'Advertisement';
		$logo_img = ($instance) ? esc_attr($instance['logo_img']) : 'http://el.commonsupport.com/newwp/transida/wp-content/uploads/2020/10/logo.png';
		$content = ($instance) ? esc_attr($instance['content']) : '';
		$btn_title = ($instance) ? esc_attr($instance['btn_title']) : 'Contact';
		$btn_link = ($instance) ? esc_attr($instance['btn_link']) : '';
		$advertisement_img = ($instance) ? esc_attr($instance['advertisement_img']) : 'http://el.commonsupport.com/newwp/transida/wp-content/uploads/2020/11/image-14.png';
		
		?>
        
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Enter Title:', 'transida'); ?></label>
            <input placeholder="<?php esc_attr_e('Advertisement', 'transida');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('logo_img')); ?>"><?php esc_html_e('Logo Image Url:', 'transida'); ?></label>
            <input placeholder="<?php esc_attr_e('Image Url', 'transida');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('logo_img')); ?>" name="<?php echo esc_attr($this->get_field_name('logo_img')); ?>" type="text" value="<?php echo esc_attr($logo_img); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('content')); ?>"><?php esc_html_e('Content:', 'transida'); ?></label>
            <textarea class="widefat" id="<?php echo esc_attr($this->get_field_id('content')); ?>" name="<?php echo esc_attr($this->get_field_name('content')); ?>" ><?php echo wp_kses_post($content); ?></textarea>
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('btn_title')); ?>"><?php esc_html_e('Button Title:', 'transida'); ?></label>
            <input placeholder="<?php esc_attr_e('Contact Us', 'transida');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('btn_title')); ?>" name="<?php echo esc_attr($this->get_field_name('btn_title')); ?>" type="text" value="<?php echo esc_attr($btn_title); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('btn_link')); ?>"><?php esc_html_e('Button Link:', 'transida'); ?></label>
            <input placeholder="<?php esc_attr_e('#', 'transida');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('btn_link')); ?>" name="<?php echo esc_attr($this->get_field_name('btn_link')); ?>" type="text" value="<?php echo esc_attr($btn_link); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('advertisement_img')); ?>"><?php esc_html_e('Advertisement Image Url:', 'transida'); ?></label>
            <input placeholder="<?php esc_attr_e('Image Url', 'transida');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('advertisement_img')); ?>" name="<?php echo esc_attr($this->get_field_name('advertisement_img')); ?>" type="text" value="<?php echo esc_attr($advertisement_img); ?>" />
        </p>
               
                
		<?php 
	}
	
}


///----footer One widgets---
//Contact Us
class Transida_Contact_Us extends WP_Widget
{
	
	/** constructor */
	function __construct()
	{
		parent::__construct( /* Base ID */'Transida_Contact_Us', /* Name */esc_html__('Transida Contact Us','transida'), array( 'description' => esc_html__('Show the information about company', 'transida' )) );
	}

	/** @see WP_Widget::widget */
	function widget($args, $instance)
	{
		extract( $args );
		$title = apply_filters( 'widget_title', $instance['title'] );
		
		echo wp_kses_post($before_widget);?>
      		
			<!--Footer Column-->
            <div class="contact-widget style-two">
                <?php echo wp_kses_post($before_title.$title.$after_title); ?>
                
                <div class="wrapper-box">
                    <?php if($instance['phone_no']): ?>
                    <div class="icon-box">
                        <div class="icon"><span class="flaticon-calling"></span></div>
                        <div class="text"><strong><?php esc_html_e('Phone', 'transida'); ?></strong><a href="tel:<?php echo esc_url($instance['phone_no']); ?>"><?php echo wp_kses_post($instance['phone_no']); ?></a></div>
                    </div>
                    <?php endif; ?>
                    <?php if($instance['email_address']): ?>
                    <div class="icon-box">
                        <div class="icon"><span class="flaticon-mail"></span></div>
                        <div class="text"><strong><?php esc_html_e('Email', 'transida'); ?></strong><a href="mailto:<?php echo esc_url($instance['email_address']); ?>"><?php echo wp_kses_post($instance['email_address']); ?></a></div>
                    </div>
                    <?php endif; ?>
                    <?php if($instance['opening_hours']): ?>
                    <div class="icon-box">
                        <div class="icon"><span class="flaticon-clock-1"></span></div>
                        <div class="text"><strong><?php esc_html_e('Mon - Satday', 'transida'); ?></strong><?php echo wp_kses_post($instance['opening_hours']); ?></div>
                    </div>
                    <?php endif; ?>
                    
                    <?php if( $instance['show'] ): ?>
                    <?php echo wp_kses_post(transida_get_social_icons2()); ?>
                	<?php endif; ?>
                    
                </div>
                    
            </div>
            
        <?php
		
		echo wp_kses_post($after_widget);
	}
	
	
	/** @see WP_Widget::update */
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;

		$instance['title'] = strip_tags($new_instance['title']);
		$instance['phone_no'] = $new_instance['phone_no'];
		$instance['email_address'] = $new_instance['email_address'];
		$instance['opening_hours'] = $new_instance['opening_hours'];
		$instance['show'] = $new_instance['show'];
		
		
		return $instance;
	}

	/** @see WP_Widget::form */
	function form($instance)
	{
		$title = ($instance) ? esc_attr($instance['title']) : 'Contact Us';
		$phone_no = ($instance) ? esc_attr($instance['phone_no']) : '';
		$email_address = ($instance) ? esc_attr($instance['email_address']) : '';
		$opening_hours = ($instance) ? esc_attr($instance['opening_hours']) : '';
		$show = ($instance) ? esc_attr($instance['show']) : '';
		?>
        
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Enter Title:', 'transida'); ?></label>
            <input placeholder="<?php esc_attr_e('Contact Us', 'transida');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('phone_no')); ?>"><?php esc_html_e('Phone Number:', 'transida'); ?></label>
            <input placeholder="<?php esc_attr_e('+00-555-67-890', 'transida');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('phone_no')); ?>" name="<?php echo esc_attr($this->get_field_name('phone_no')); ?>" type="text" value="<?php echo esc_attr($phone_no); ?>" />
        </p> 
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('email_address')); ?>"><?php esc_html_e('Email Addess:', 'transida'); ?></label>
            <input placeholder="<?php esc_attr_e('supportteam@info.com', 'transida');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('email_address')); ?>" name="<?php echo esc_attr($this->get_field_name('email_address')); ?>" type="text" value="<?php echo esc_attr($email_address); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('opening_hours')); ?>"><?php esc_html_e('Opening Hours:', 'transida'); ?></label>
            <input placeholder="<?php esc_attr_e('08.00 am to 9.00pm (Sun: Closed)', 'transida');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('opening_hours')); ?>" name="<?php echo esc_attr($this->get_field_name('opening_hours')); ?>" type="text" value="<?php echo esc_attr($opening_hours); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('show')); ?>"><?php esc_html_e('Show Social Icons:', 'transida'); ?></label>
			<?php $selected = ( $show ) ? ' checked="checked"' : ''; ?>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('show')); ?>"<?php echo esc_attr($selected); ?> name="<?php echo esc_attr($this->get_field_name('show')); ?>" type="checkbox" value="true" />
        </p>
        
               
                
		<?php 
	}
	
}

//Our Gallery
class Transida_Our_Gallery extends WP_Widget
{
	/** constructor */
	function __construct()
	{
		parent::__construct( /* Base ID */'Transida_Our_Gallery', /* Name */esc_html__('Transida Our Gallery','transida'), array( 'description' => esc_html__('Show the Our Gallery', 'transida' )) );
	}
 
	/** @see WP_Widget::widget */
	function widget($args, $instance)
	{
		extract( $args );
		$title = apply_filters( 'widget_title', $instance['title'] );
		
		echo wp_kses_post($before_widget); ?>
		
        <!-- instagram -->
        <div class="instagram-widget">
            <?php echo wp_kses_post($before_title.$title.$after_title); ?>
            <div class="wrapper-box">
                <?php 
					$args = array('post_type' => 'transida_project', 'showposts'=>$instance['number']);
					if( $instance['cat'] ) $args['tax_query'] = array(array('taxonomy' => 'project_cat','field' => 'id','terms' => (array)$instance['cat']));
					 
					$this->posts($args);
				?>
            </div><!-- /.gallery-wrapper -->
        </div>
        
        <?php echo wp_kses_post($after_widget);
	}
 
 
	/** @see WP_Widget::update */
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;
		
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['number'] = $new_instance['number'];
		$instance['cat'] = $new_instance['cat'];
		
		return $instance;
	}
	/** @see WP_Widget::form */
	function form($instance)
	{
		$title = ($instance) ? esc_attr($instance['title']) : 'Our Gallery';
		$number = ( $instance ) ? esc_attr($instance['number']) : 6;
		$cat = ( $instance ) ? esc_attr($instance['cat']) : '';?>
		
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title:', 'transida'); ?></label>
            <input placeholder="<?php esc_attr_e('Our Gallery', 'transida');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('number')); ?>"><?php esc_html_e('Number of posts: ', 'transida'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('number')); ?>" name="<?php echo esc_attr($this->get_field_name('number')); ?>" type="text" value="<?php echo esc_attr( $number ); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('cat')); ?>"><?php esc_html_e('Category', 'transida'); ?></label>
            <?php wp_dropdown_categories( array('show_option_all'=>esc_html__('All Categories', 'transida'), 'selected'=>$cat, 'taxonomy' => 'project_cat', 'class'=>'widefat', 'name'=>$this->get_field_name('cat')) ); ?>
        </p>
            
		<?php 
	}
	
	function posts($args)
	{
		
		$query = new WP_Query($args);
		if( $query->have_posts() ):?>
        
           	<!-- Title -->
            <?php 
				while( $query->have_posts() ): $query->the_post(); 
				global $post ; 
				$post_thumbnail_id = get_post_thumbnail_id($post->ID);
            	$post_thumbnail_url = wp_get_attachment_url($post_thumbnail_id);
			?>
            <div class="image">
                <?php the_post_thumbnail('transida_80x80'); ?>
                <div class="overlay-link"><a href="<?php echo esc_url($post_thumbnail_url); ?>" class="lightbox-image" data-fancybox="gallery"><span class="fa fa-plus"></span></a></div>
            </div>
            <?php endwhile; ?>
                
        <?php endif;
		wp_reset_postdata();
    }
}


///----footer Two widgets---
//About Company
class Transida_About_Company extends WP_Widget
{
	
	/** constructor */
	function __construct()
	{
		parent::__construct( /* Base ID */'Transida_About_Company', /* Name */esc_html__('Transida About Company','transida'), array( 'description' => esc_html__('Show the About Company', 'transida' )) );
	}

	/** @see WP_Widget::widget */
	function widget($args, $instance)
	{
		extract( $args );
		$title = apply_filters( 'widget_title', $instance['title'] );
		
		echo wp_kses_post($before_widget);?>
      		
			<!--Footer Column-->
            <div class="about-widget">
                <?php echo wp_kses_post($before_title.$title.$after_title); ?>
                <div class="text"><?php echo wp_kses_post($instance['content']); ?></div>
                <div class="link">
                    <a href="<?php echo esc_url($instance['btn_link']); ?>" class="readmore-link"><i class="flaticon-up-arrow"></i> <?php echo wp_kses_post($instance['btn_title']); ?></a>
                </div>
                <div class="download-pdf">
                    <div class="icon"><img src="<?php echo esc_url($instance['pdf_icon_img']); ?>" alt="<?php esc_attr_e('Awesome Image', 'transida'); ?>"></div>
                    <h5><?php echo wp_kses_post($instance['pdf_title']); ?></h5>
                    <a href="<?php echo esc_url($instance['pdf_link']); ?>"><i class="flaticon-download"></i></a>
                </div>
            </div>
            
        <?php
		
		echo wp_kses_post($after_widget);
	}
	
	
	/** @see WP_Widget::update */
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;

		$instance['title'] = strip_tags($new_instance['title']);
		$instance['content'] = $new_instance['content'];
		$instance['btn_title'] = $new_instance['btn_title'];
		$instance['btn_link'] = $new_instance['btn_link'];
		$instance['pdf_icon_img'] = $new_instance['pdf_icon_img'];
		$instance['pdf_title'] = $new_instance['pdf_title'];
		$instance['pdf_link'] = $new_instance['pdf_link'];
		
		return $instance;
	}

	/** @see WP_Widget::form */
	function form($instance)
	{
		$title = ($instance) ? esc_attr($instance['title']) : 'About Company';
		$content = ($instance) ? esc_attr($instance['content']) : '';
		$btn_title = ($instance) ? esc_attr($instance['btn_title']) : 'More About Us';
		$btn_link = ($instance) ? esc_attr($instance['btn_link']) : '';
		$pdf_icon_img = ($instance) ? esc_attr($instance['pdf_icon_img']) : 'http://el.commonsupport.com/newwp/transida/wp-content/uploads/2020/11/icon-13.png';
		$pdf_title = ($instance) ? esc_attr($instance['pdf_title']) : '';
		$pdf_link = ($instance) ? esc_attr($instance['pdf_link']) : '';
		
		?>
        
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Enter Title:', 'transida'); ?></label>
            <input placeholder="<?php esc_attr_e('About Company', 'transida');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('content')); ?>"><?php esc_html_e('Content:', 'transida'); ?></label>
            <textarea class="widefat" id="<?php echo esc_attr($this->get_field_id('content')); ?>" name="<?php echo esc_attr($this->get_field_name('content')); ?>" ><?php echo wp_kses_post($content); ?></textarea>
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('btn_title')); ?>"><?php esc_html_e('Button Title:', 'transida'); ?></label>
            <input placeholder="<?php esc_attr_e('More About Us', 'transida');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('btn_title')); ?>" name="<?php echo esc_attr($this->get_field_name('btn_title')); ?>" type="text" value="<?php echo esc_attr($btn_title); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('btn_link')); ?>"><?php esc_html_e('Button Link:', 'transida'); ?></label>
            <input placeholder="<?php esc_attr_e('#', 'transida');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('btn_link')); ?>" name="<?php echo esc_attr($this->get_field_name('btn_link')); ?>" type="text" value="<?php echo esc_attr($btn_link); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('pdf_icon_img')); ?>"><?php esc_html_e('PDF Icon Image Url:', 'transida'); ?></label>
            <input placeholder="<?php esc_attr_e('Image Url', 'transida');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('pdf_icon_img')); ?>" name="<?php echo esc_attr($this->get_field_name('pdf_icon_img')); ?>" type="text" value="<?php echo esc_attr($pdf_icon_img); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('pdf_title')); ?>"><?php esc_html_e('PDF Title:', 'transida'); ?></label>
            <textarea class="widefat" id="<?php echo esc_attr($this->get_field_id('pdf_title')); ?>" name="<?php echo esc_attr($this->get_field_name('pdf_title')); ?>" ><?php echo wp_kses_post($pdf_title); ?></textarea>
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('pdf_link')); ?>"><?php esc_html_e('PDF Download Link:', 'transida'); ?></label>
            <input placeholder="<?php esc_attr_e('#', 'transida');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('pdf_link')); ?>" name="<?php echo esc_attr($this->get_field_name('pdf_link')); ?>" type="text" value="<?php echo esc_attr($pdf_link); ?>" />
        </p>
               
                
		<?php 
	}
	
}

//Contact Us V2
class Transida_Contact_Us_V2 extends WP_Widget
{
	
	/** constructor */
	function __construct()
	{
		parent::__construct( /* Base ID */'Transida_Contact_Us_V2', /* Name */esc_html__('Transida Contact Us V2','transida'), array( 'description' => esc_html__('Show the Contact Us V2', 'transida' )) );
	}

	/** @see WP_Widget::widget */
	function widget($args, $instance)
	{
		extract( $args );
		$title = apply_filters( 'widget_title', $instance['title'] );
		
		echo wp_kses_post($before_widget);?>
      		
			<!--Footer Column-->
            <div class="contact-widget">
                <?php echo wp_kses_post($before_title.$title.$after_title); ?>
                <div class="wrapper-box">                                
                    <?php if($instance['address']): ?>
                    <div class="icon-box">
                        <div class="icon"><span class="flaticon-cursor"></span></div>
                        <div class="text"><?php echo wp_kses_post($instance['address']); ?></div>
                    </div>
                    <?php endif; ?>
                    <?php if($instance['phone_no']): ?>
                    <div class="icon-box">
                        <div class="icon"><span class="flaticon-calling"></span></div>
                        <div class="text"><strong><?php esc_html_e('Phone', 'transida'); ?></strong><a href="tel:<?php echo esc_url($instance['phone_no']); ?>"><?php echo wp_kses_post($instance['phone_no']); ?></a></div>
                    </div>
                    <?php endif; ?>
                    <?php if($instance['email_address']): ?>
                    <div class="icon-box">
                        <div class="icon"><span class="flaticon-mail"></span></div>
                        <div class="text"><strong><?php esc_html_e('Email', 'transida'); ?></strong><a href="mailto:<?php echo esc_url($instance['email_address']); ?>"><?php echo wp_kses_post($instance['email_address']); ?></a></div>
                    </div>
                    <?php endif; ?>                               
                    <?php if($instance['opening_hours']): ?>
                    <div class="icon-box">
                        <div class="icon"><span class="flaticon-clock-1"></span></div>
                        <div class="text"><strong><?php esc_html_e('Mon - Satday', 'transida'); ?></strong>
                            <?php echo wp_kses_post($instance['opening_hours']); ?></div>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
            
        <?php
		
		echo wp_kses_post($after_widget);
	}
	
	
	/** @see WP_Widget::update */
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;

		$instance['title'] = strip_tags($new_instance['title']);
		$instance['address'] = $new_instance['address'];
		$instance['phone_no'] = $new_instance['phone_no'];
		$instance['email_address'] = $new_instance['email_address'];
		$instance['opening_hours'] = $new_instance['opening_hours'];
		
		
		return $instance;
	}

	/** @see WP_Widget::form */
	function form($instance)
	{
		$title = ($instance) ? esc_attr($instance['title']) : 'Contact Us';
		$address = ($instance) ? esc_attr($instance['address']) : '';
		$phone_no = ($instance) ? esc_attr($instance['phone_no']) : '';
		$email_address = ($instance) ? esc_attr($instance['email_address']) : '';
		$opening_hours = ($instance) ? esc_attr($instance['opening_hours']) : '';
		?>
        
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Enter Title:', 'transida'); ?></label>
            <input placeholder="<?php esc_attr_e('Contact Us', 'transida');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('address')); ?>"><?php esc_html_e('Address:', 'transida'); ?></label>
            <textarea class="widefat" id="<?php echo esc_attr($this->get_field_id('address')); ?>" name="<?php echo esc_attr($this->get_field_name('address')); ?>" ><?php echo wp_kses_post($address); ?></textarea>
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('phone_no')); ?>"><?php esc_html_e('Phone Number:', 'transida'); ?></label>
            <input placeholder="<?php esc_attr_e('+00-555-67-890', 'transida');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('phone_no')); ?>" name="<?php echo esc_attr($this->get_field_name('phone_no')); ?>" type="text" value="<?php echo esc_attr($phone_no); ?>" />
        </p> 
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('email_address')); ?>"><?php esc_html_e('Email Addess:', 'transida'); ?></label>
            <input placeholder="<?php esc_attr_e('supportteam@info.com', 'transida');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('email_address')); ?>" name="<?php echo esc_attr($this->get_field_name('email_address')); ?>" type="text" value="<?php echo esc_attr($email_address); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('opening_hours')); ?>"><?php esc_html_e('Opening Hours:', 'transida'); ?></label>
            <input placeholder="<?php esc_attr_e('08.00 am to 9.00pm (Sun: Closed)', 'transida');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('opening_hours')); ?>" name="<?php echo esc_attr($this->get_field_name('opening_hours')); ?>" type="text" value="<?php echo esc_attr($opening_hours); ?>" />
        </p>
               
		<?php 
	}
	
}


///----footer Three widgets---
//About Company V2
class Transida_About_Company_V2 extends WP_Widget
{
	
	/** constructor */
	function __construct()
	{
		parent::__construct( /* Base ID */'Transida_About_Company_V2', /* Name */esc_html__('Transida About Company V2','transida'), array( 'description' => esc_html__('Show the About Company', 'transida' )) );
	}

	/** @see WP_Widget::widget */
	function widget($args, $instance)
	{
		extract( $args );
		
		echo wp_kses_post($before_widget);?>
      		
			<!--Footer Column-->
            <div class="about-widget-two">
                <?php if($instance['logo_icon_img']): ?><div class="logo"><img src="<?php echo esc_url($instance['logo_icon_img']); ?>" alt="<?php esc_attr_e('Awesome Image', 'transida'); ?>"></div><?php endif; ?>
                <div class="text"><?php echo wp_kses_post($instance['content']); ?></div>
                <ul class="list">
                    <?php echo wp_kses_post($instance['feature_list']); ?>
                </ul>
                <?php if($instance['certificate_img']): ?><div class="certificate"><img src="<?php echo esc_url($instance['certificate_img']); ?>" alt="<?php esc_attr_e('Awesome Image', 'transida'); ?>"></div><?php endif; ?>
            </div>
            
        <?php
		
		echo wp_kses_post($after_widget);
	}
	
	
	/** @see WP_Widget::update */
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;

		$instance['logo_icon_img'] = $new_instance['logo_icon_img'];
		$instance['content'] = $new_instance['content'];
		$instance['feature_list'] = $new_instance['feature_list'];
		$instance['certificate_img'] = $new_instance['certificate_img'];
		
		return $instance;
	}

	/** @see WP_Widget::form */
	function form($instance)
	{	
		$logo_icon_img = ($instance) ? esc_attr($instance['logo_icon_img']) : 'http://el.commonsupport.com/newwp/transida/wp-content/uploads/2020/11/logo-v3-2.png';
		$content = ($instance) ? esc_attr($instance['content']) : '';
		$feature_list = ($instance) ? esc_attr($instance['feature_list']) : '';
		$certificate_img = ($instance) ? esc_attr($instance['certificate_img']) : 'http://el.commonsupport.com/newwp/transida/wp-content/uploads/2020/11/certificate.png';
		
		?>
        
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('logo_icon_img')); ?>"><?php esc_html_e('Logo Icon Image Url:', 'transida'); ?></label>
            <input placeholder="<?php esc_attr_e('Image Url', 'transida');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('logo_icon_img')); ?>" name="<?php echo esc_attr($this->get_field_name('logo_icon_img')); ?>" type="text" value="<?php echo esc_attr($logo_icon_img); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('content')); ?>"><?php esc_html_e('Content:', 'transida'); ?></label>
            <textarea class="widefat" id="<?php echo esc_attr($this->get_field_id('content')); ?>" name="<?php echo esc_attr($this->get_field_name('content')); ?>" ><?php echo wp_kses_post($content); ?></textarea>
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('feature_list')); ?>"><?php esc_html_e('Feature List:', 'transida'); ?></label>
            <textarea class="widefat" id="<?php echo esc_attr($this->get_field_id('feature_list')); ?>" name="<?php echo esc_attr($this->get_field_name('feature_list')); ?>" ><?php echo wp_kses_post($feature_list); ?></textarea>
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('certificate_img')); ?>"><?php esc_html_e('Certificate ISO Image Url:', 'transida'); ?></label>
            <input placeholder="<?php esc_attr_e('Image Url', 'transida');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('certificate_img')); ?>" name="<?php echo esc_attr($this->get_field_name('certificate_img')); ?>" type="text" value="<?php echo esc_attr($certificate_img); ?>" />
        </p>
                      
                
		<?php 
	}
	
}

//Recent Post 
class Transida_Recent_Post extends WP_Widget
{
	/** constructor */
	function __construct()
	{
		parent::__construct( /* Base ID */'Transida_Recent_Post', /* Name */esc_html__('Transida Recent Post','transida'), array( 'description' => esc_html__('Show the Recent Post', 'transida' )) );
	}
 

	/** @see WP_Widget::widget */
	function widget($args, $instance)
	{
		extract( $args );
		$title = apply_filters( 'widget_title', $instance['title'] );
		
		echo wp_kses_post($before_widget); ?>
		
        <!-- Trending Posts -->
        <div class="news-widget">
            <?php echo wp_kses_post($before_title.$title.$after_title); ?>
            <div class="wrapper-box">                                
                <?php $query_string = 'posts_per_page='.$instance['number'];
					if( $instance['cat'] ) $query_string .= '&cat='.$instance['cat'];
					 
					$this->posts($query_string);
				?>
            </div>
        </div>
                
		<?php echo wp_kses_post($after_widget);
	}
 
 
	/** @see WP_Widget::update */
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;
		
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['number'] = $new_instance['number'];
		$instance['cat'] = $new_instance['cat'];
		
		return $instance;
	}

	/** @see WP_Widget::form */
	function form($instance)
	{
		$title = ( $instance ) ? esc_attr($instance['title']) : esc_html__('Recent Post', 'transida');
		$number = ( $instance ) ? esc_attr($instance['number']) : 2;
		$cat = ( $instance ) ? esc_attr($instance['cat']) : '';?>
			
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title: ', 'transida'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('number')); ?>"><?php esc_html_e('No. of Posts:', 'transida'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('number')); ?>" name="<?php echo esc_attr($this->get_field_name('number')); ?>" type="text" value="<?php echo esc_attr( $number ); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('categories')); ?>"><?php esc_html_e('Category', 'transida'); ?></label>
            <?php wp_dropdown_categories( array('show_option_all'=>esc_html__('All Categories', 'transida'), 'selected'=>$cat, 'class'=>'widefat', 'name'=>$this->get_field_name('categories')) ); ?>
        </p>
            
		<?php 
	}
	
	function posts($query_string)
	{
		
		$query = new WP_Query($query_string);
		if( $query->have_posts() ):?>
        
           	<!-- Title -->
			<?php 
				while( $query->have_posts() ): $query->the_post(); 
				global $post ; 
				$post_thumbnail_id = get_post_thumbnail_id($post->ID);
            	$post_thumbnail_url = wp_get_attachment_url($post_thumbnail_id);
			?>
            <div class="post">
                <div class="image"><a href="<?php echo esc_url(get_the_permalink(get_the_id()));?>" style="background-image:url(<?php echo esc_url($post_thumbnail_url); ?>); "></a></div>
                <div class="content">
                    <h4><a href="<?php echo esc_url(get_the_permalink(get_the_id()));?>"><?php the_title(); ?></a></h4>
                    <div class="date"><i class="far fa-calendar"></i><?php echo get_the_date();?></div>
                </div>
            </div>
            <?php endwhile; ?>
            
        <?php endif;
		wp_reset_postdata();
    }
}


///----footer Four widgets---
//About Company V3
class Transida_About_Company_V3 extends WP_Widget
{
	
	/** constructor */
	function __construct()
	{
		parent::__construct( /* Base ID */'Transida_About_Company_V3', /* Name */esc_html__('Transida About Company V3','transida'), array( 'description' => esc_html__('Show the About Company V3', 'transida' )) );
	}

	/** @see WP_Widget::widget */
	function widget($args, $instance)
	{
		extract( $args );
		$title = apply_filters( 'widget_title', $instance['title'] );
		
		echo wp_kses_post($before_widget);?>
      		
			<!--Footer Column-->
            <div class="about-widget-three">
                <?php echo wp_kses_post($before_title.$title.$after_title); ?>
                <div class="text"><?php echo wp_kses_post($instance['content']); ?></div>
                <div class="link">
                    <a href="<?php echo esc_url($instance['btn_link']); ?>" class="readmore-link"><span><i class="flaticon-up-arrow"></i><?php echo wp_kses_post($instance['btn_title']); ?></span></a>
                </div>
                <div class="newsletter-form">
                    <?php echo do_shortcode($instance['newletter_form']); ?>
                </div>
            </div>
            
        <?php
		
		echo wp_kses_post($after_widget);
	}
	
	
	/** @see WP_Widget::update */
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;

		$instance['title'] = strip_tags($new_instance['title']);
		$instance['content'] = $new_instance['content'];
		$instance['btn_title'] = $new_instance['btn_title'];
		$instance['btn_link'] = $new_instance['btn_link'];
		$instance['newletter_form'] = $new_instance['newletter_form'];
		
		return $instance;
	}

	/** @see WP_Widget::form */
	function form($instance)
	{
		$title = ($instance) ? esc_attr($instance['title']) : 'About Company';
		$content = ($instance) ? esc_attr($instance['content']) : '';
		$btn_title = ($instance) ? esc_attr($instance['btn_title']) : 'Read More';
		$btn_link = ($instance) ? esc_attr($instance['btn_link']) : '';
		$newletter_form = ($instance) ? esc_attr($instance['newletter_form']) : '';		
		?>
        
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Enter Title:', 'transida'); ?></label>
            <input placeholder="<?php esc_attr_e('About Company', 'transida');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('content')); ?>"><?php esc_html_e('Content:', 'transida'); ?></label>
            <textarea class="widefat" id="<?php echo esc_attr($this->get_field_id('content')); ?>" name="<?php echo esc_attr($this->get_field_name('content')); ?>" ><?php echo wp_kses_post($content); ?></textarea>
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('btn_title')); ?>"><?php esc_html_e('Button Title:', 'transida'); ?></label>
            <input placeholder="<?php esc_attr_e('Read More', 'transida');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('btn_title')); ?>" name="<?php echo esc_attr($this->get_field_name('btn_title')); ?>" type="text" value="<?php echo esc_attr($btn_title); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('btn_link')); ?>"><?php esc_html_e('Button Link:', 'transida'); ?></label>
            <input placeholder="<?php esc_attr_e('#', 'transida');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('btn_link')); ?>" name="<?php echo esc_attr($this->get_field_name('btn_link')); ?>" type="text" value="<?php echo esc_attr($btn_link); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('newletter_form')); ?>"><?php esc_html_e('MailChimp Form URL:', 'transida'); ?></label>
            <textarea class="widefat" id="<?php echo esc_attr($this->get_field_id('newletter_form')); ?>" name="<?php echo esc_attr($this->get_field_name('newletter_form')); ?>" ><?php echo wp_kses_post($newletter_form); ?></textarea>
        </p>
                
		<?php 
	}
	
}


///----Service Sidebar widgets---
//Services SideBar
class Transida_services_sidebar extends WP_Widget
{
	/** constructor */
	function __construct()
	{
		parent::__construct( /* Base ID */'Transida_services_sidebar', /* Name */esc_html__('Transida Services Sidebar','transida'), array( 'description' => esc_html__('Show the Services Sidebar', 'transida' )) );
	}
 
	/** @see WP_Widget::widget */
	function widget($args, $instance)
	{
		extract( $args );
		$title = apply_filters( 'widget_title', $instance['title'] );
		
		echo wp_kses_post($before_widget); ?>
		
        <!--Start Single sidebar-->
        <div class="widget_categories-two">
            <?php echo wp_kses_post($before_title.$title.$after_title); ?>
            <div class="widget-content">
                <ul class="categories-list">
                    <?php 
						$args = array('post_type' => 'transida_service', 'showposts'=>$instance['number']);
						if( $instance['cat'] ) $args['tax_query'] = array(array('taxonomy' => 'service_cat','field' => 'id','terms' => (array)$instance['cat']));
						 
						$this->posts($args);
					?>
                </ul>
            </div>
        </div>
                
        <?php echo wp_kses_post($after_widget);
	}
 
 
	/** @see WP_Widget::update */
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['number'] = $new_instance['number'];
		$instance['cat'] = $new_instance['cat'];
		
		return $instance;
	}
	/** @see WP_Widget::form */
	function form($instance)
	{
		$title = ($instance) ? esc_attr($instance['title']) : 'Services';
		$number = ( $instance ) ? esc_attr($instance['number']) : 6;
		$cat = ( $instance ) ? esc_attr($instance['cat']) : '';?>
		
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Enter Title:', 'transida'); ?></label>
            <input placeholder="<?php esc_attr_e('Services', 'transida');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('number')); ?>"><?php esc_html_e('Number of posts: ', 'transida'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('number')); ?>" name="<?php echo esc_attr($this->get_field_name('number')); ?>" type="text" value="<?php echo esc_attr( $number ); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('cat')); ?>"><?php esc_html_e('Category', 'transida'); ?></label>
            <?php wp_dropdown_categories( array('show_option_all'=>esc_html__('All Categories', 'transida'), 'selected'=>$cat, 'taxonomy' => 'service_cat', 'class'=>'widefat', 'name'=>$this->get_field_name('cat')) ); ?>
        </p>
            
		<?php 
	}
	
	function posts($args)
	{
		
		$query = new WP_Query($args);
		if( $query->have_posts() ):?>
        
           	<!-- Title -->
            <?php while( $query->have_posts() ): $query->the_post(); 
				global $post ; 
			?>
            <li><a href="<?php echo esc_url(get_post_meta( get_the_id(), 'ext_url', true ));?>"><i class="<?php echo wp_kses(str_replace( "icon ",  "",  get_post_meta(get_the_id(), 'service_icon', true )), true); ?>"></i><?php the_title(); ?> </a></li>
            <?php endwhile; ?>
                
        <?php endif;
		wp_reset_postdata();
    }
}

//Our Brochures
class Transida_Brochures extends WP_Widget
{
	
	/** constructor */
	function __construct()
	{
		parent::__construct( /* Base ID */'Transida_Brochures', /* Name */esc_html__('Transida Our Brochures','transida'), array( 'description' => esc_html__('Show the info Our Brochures', 'transida' )) );
	}
	/** @see WP_Widget::widget */
	function widget($args, $instance)
	{
		extract( $args );
		$title = apply_filters( 'widget_title', $instance['title'] );
		
		echo wp_kses_post($before_widget);?>
      		
            <!--Start Single sidebar-->
            <div class="widget pdf-widget">
                <?php echo wp_kses_post($before_title.$title.$after_title); ?>
                <div class="text"><?php echo wp_kses_post($instance['content']); ?></div>
                <div class="row">
                    
                    <div class="col-sm-6 column">
                        <div class="content">
                            <div class="icon"><img src="<?php echo wp_kses_post($instance['pdf_image_v1']); ?>" alt="<?php esc_attr_e('Awesome Image', 'transida'); ?>"></div>
                            <h4><?php echo wp_kses_post($instance['pdf_file_title']); ?></h4>
                        </div>
                    </div>
                    
                    <div class="col-sm-6 column">
                        <div class="content">
                            <div class="icon"><img src="<?php echo wp_kses_post($instance['pdf_image_v2']); ?>" alt="<?php esc_attr_e('Awesome Image', 'transida'); ?>"></div>
                            <h4><?php echo wp_kses_post($instance['pdf_file_title2']); ?></h4>
                        </div>
                    </div>
                    
                </div>                            
            </div>
            
		<?php
		
		echo wp_kses_post($after_widget);
	}
	
	
	/** @see WP_Widget::update */
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;
		
		$instance['title'] = $new_instance['title'];
		$instance['content'] = $new_instance['content'];
		$instance['pdf_image_v1'] = $new_instance['pdf_image_v1'];
		$instance['pdf_file_title'] = $new_instance['pdf_file_title'];
		$instance['pdf_image_v2'] = $new_instance['pdf_image_v2'];
		$instance['pdf_file_title2'] = $new_instance['pdf_file_title2'];
		
		return $instance;
	}
	/** @see WP_Widget::form */
	function form($instance)
	{
		$title = ($instance) ? esc_attr($instance['title']) : 'Downloads';
		$content = ($instance) ? esc_attr($instance['content']) : '';
		$pdf_image_v1 = ($instance) ? esc_attr($instance['pdf_image_v1']) : 'http://el.commonsupport.com/newwp/transida/wp-content/uploads/2020/10/icon-8.png';
		$pdf_file_title = ($instance) ? esc_attr($instance['pdf_file_title']) : '';
		$pdf_image_v2 = ($instance) ? esc_attr($instance['pdf_image_v2']) : 'http://el.commonsupport.com/newwp/transida/wp-content/uploads/2020/10/icon-8.png';
		$pdf_file_title2 = ($instance) ? esc_attr($instance['pdf_file_title2']) : '';
		
		?>
        
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Enter Title:', 'transida'); ?></label>
            <input placeholder="<?php esc_attr_e('Downloads', 'transida');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('content')); ?>"><?php esc_html_e('Content:', 'transida'); ?></label>
            <textarea class="widefat" id="<?php echo esc_attr($this->get_field_id('content')); ?>" name="<?php echo esc_attr($this->get_field_name('content')); ?>" ><?php echo wp_kses_post($content); ?></textarea>
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('pdf_image_v1')); ?>"><?php esc_html_e('PDF Image V1:', 'transida'); ?></label>
            <input placeholder="<?php esc_attr_e('Image Url', 'transida');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('pdf_image_v1')); ?>" name="<?php echo esc_attr($this->get_field_name('pdf_image_v1')); ?>" type="text" value="<?php echo esc_attr($pdf_image_v1); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('pdf_file_title')); ?>"><?php esc_html_e('PDF Title:', 'transida'); ?></label>
            <textarea class="widefat" id="<?php echo esc_attr($this->get_field_id('pdf_file_title')); ?>" name="<?php echo esc_attr($this->get_field_name('pdf_file_title')); ?>" ><?php echo wp_kses_post($pdf_file_title); ?></textarea>
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('pdf_image_v2')); ?>"><?php esc_html_e('PDF Image V2:', 'transida'); ?></label>
            <input placeholder="<?php esc_attr_e('Image Url', 'transida');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('pdf_image_v2')); ?>" name="<?php echo esc_attr($this->get_field_name('pdf_image_v2')); ?>" type="text" value="<?php echo esc_attr($pdf_image_v2); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('pdf_file_title2')); ?>"><?php esc_html_e('PDF Title V2:', 'transida'); ?></label>
            <textarea class="widefat" id="<?php echo esc_attr($this->get_field_id('pdf_file_title2')); ?>" name="<?php echo esc_attr($this->get_field_name('pdf_file_title2')); ?>" ><?php echo wp_kses_post($pdf_file_title2); ?></textarea>
        </p>
                
		<?php 
	}
	
}

//Get a Quote
class Transida_Get_a_Quote extends WP_Widget
{
	
	/** constructor */
	function __construct()
	{
		parent::__construct( /* Base ID */'Transida_Get_a_Quote', /* Name */esc_html__('Transida Get a Quote','transida'), array( 'description' => esc_html__('Show the Get a Quote', 'transida' )) );
	}

	/** @see WP_Widget::widget */
	function widget($args, $instance)
	{
		extract( $args );
		$title = apply_filters( 'widget_title', $instance['title'] );
		
		echo wp_kses_post($before_widget);?>
      		
			<!--Footer Column-->
            <div class="getaquote-widget">
                <?php echo wp_kses_post($before_title.$title.$after_title); ?>
                <div class="text"><?php echo wp_kses_post($instance['content']); ?></div>
                <?php echo do_shortcode($instance['contact_form_url']); ?>
            </div>
                        
		<?php
		
		echo wp_kses_post($after_widget);
	}
	
	
	/** @see WP_Widget::update */
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;

		$instance['title'] = strip_tags($new_instance['title']);
		$instance['content'] = $new_instance['content'];
		$instance['contact_form_url'] = $new_instance['contact_form_url'];
				
		
		return $instance;
	}

	/** @see WP_Widget::form */
	function form($instance)
	{
		$title = ($instance) ? esc_attr($instance['title']) : 'Get a Quote';
		$content = ($instance) ? esc_attr($instance['content']) : '';
		$contact_form_url = ($instance) ? esc_attr($instance['contact_form_url']) : '';
		
		?>
        
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Enter Title:', 'transida'); ?></label>
            <input placeholder="<?php esc_attr_e('Get a Quote', 'transida');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('content')); ?>"><?php esc_html_e('Content:', 'transida'); ?></label>
            <textarea class="widefat" id="<?php echo esc_attr($this->get_field_id('content')); ?>" name="<?php echo esc_attr($this->get_field_name('content')); ?>" ><?php echo wp_kses_post($content); ?></textarea>
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('contact_form_url')); ?>"><?php esc_html_e('Contact Form 7 Url:', 'transida'); ?></label>
            <textarea class="widefat" id="<?php echo esc_attr($this->get_field_id('contact_form_url')); ?>" name="<?php echo esc_attr($this->get_field_name('contact_form_url')); ?>" ><?php echo wp_kses_post($contact_form_url); ?></textarea>
        </p>
               
		<?php 
	}
	
}
