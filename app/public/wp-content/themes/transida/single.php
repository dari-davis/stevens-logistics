<?php
/**
 * Blog Post Main File.
 *
 * @package TRANSIDA
 * @author  Theme Kalia
 * @version 1.0
 */

get_header();
$data    = \TRANSIDA\Includes\Classes\Common::instance()->data( 'single' )->get();
$layout = $data->get( 'layout' );
$sidebar = $data->get( 'sidebar' );
$layout = ( $layout ) ? $layout : 'right';
$sidebar = ( $sidebar ) ? $sidebar : 'default-sidebar';
if (is_active_sidebar( $sidebar )) {$layout = 'right';} else{$layout = 'full';}
$class = ( !$layout || $layout == 'full' ) ? 'col-xs-12 col-sm-12 col-md-12' : 'col-lg-8 col-md-12 col-sm-12';

$options = transida_WSH()->option();

global $post;

if ( class_exists( '\Elementor\Plugin' ) && $data->get( 'tpl-type' ) == 'e') {
	
	while(have_posts()) {
	   the_post();
	   the_content();
    }

} else {
	?>

<!-- Page Title -->
<section class="page-title" style="background-image: url('<?php echo esc_url( $data->get( 'banner' ) ); ?>');">
    <div class="auto-container">
        <div class="content-box">
            <div class="content-wrapper">
                <div class="title">
                </div>
                <ul class="bread-crumb clearfix">
                    <?php echo transida_the_breadcrumb(); ?>
                </ul>
            </div>                    
        </div>
    </div>
</section>

<!--Start blog area-->
<section class="news-section">
    <div class="auto-container">
        <div class="row clearfix">
        	<?php
				if ( $data->get( 'layout' ) == 'left' ) {
					do_action( 'transida_sidebar', $data );
				}
			?>
            <div class="content-side <?php echo esc_attr( $class ); ?>">
            	
				<?php while ( have_posts() ) : the_post(); ?>
				
                	<div class="thm-unit-test">    
                    
                        <div <?php post_class('blog-post'); ?>>    
                            
                            <div class="news-block-four blog-single-post">
                                <div class="inner-box">
                                    <div class="lower-content">
                                        <div class="top-content">
                                            <?php if(! $options->get( 'single_post_date' ) ):?><div class="date"><?php echo get_the_date('d'); ?> <br> <?php echo get_the_date('M'); ?></div><?php endif; ?>
                                            <?php if(has_category()): ?><div class="category"><i class="fas fa-folder"></i> <?php the_category(' '); ?></div><?php endif; ?>
                                            <h3><?php the_title(); ?></h3>
                                        </div> 
                                        <?php if((! $options->get( 'single_post_author' )) || (! $options->get( 'single_post_comments' )) ):?>                               
                                        <ul class="post-meta">
                                            <?php if(! $options->get( 'single_post_author' ) ):?>
                                            <li><a href="<?php echo esc_url(get_author_posts_url( get_the_author_meta('ID') )); ?>"><i class="far fa-user"></i>By: <?php the_author(); ?></a></li>
                                            <?php endif; ?>
                                            
											<?php if(! $options->get( 'single_post_comments' ) ):?>
                                            <li><a href="<?php echo esc_url(get_permalink(get_the_id()).'#comments'); ?>"><i class="far fa-comment"></i><?php comments_number( wp_kses(__('Comments 0' , 'transida'), true), wp_kses(__('Comment 1' , 'transida'), true), wp_kses(__('Comments %' , 'transida'), true)); ?></a></li>
                                        	<?php endif; ?>
                                        </ul>
                                        <?php endif; ?>
                                        <div class="text">
                                        	<?php the_content(); ?>
                                            <div class="clearfix"></div>
                                            <?php wp_link_pages(array('before'=>'<div class="paginate-links">'.esc_html__('Pages: ', 'transida'), 'after' => '</div>', 'link_before'=>'<span>', 'link_after'=>'</span>')); ?>
                                        </div>
                                        
                                        <div class="bottom-content">
                                            <?php if( has_tag() ):?>
                                            <ul class="tag">
                                                <?php the_tags( '<li>', '</li><li> ', '</li>' ); ?>
                                            </ul>
                                            <?php endif; ?>
                                            
											<?php if(function_exists('bunch_share_us')): ?>
                                            <div class="post-share-btn">
                                                <span class="hint"><?php esc_html_e('Share This Post', 'transida');?></span>
                                                <div class="social-links-wrapper">
                                                    <div class="icon"><span class="flaticon-share"></span></div>
                                                    <?php echo wp_kses(bunch_share_us(get_the_id(), $post->post_name ), true);?>
                                                </div>
                                            </div>
                                            <?php endif; ?>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            
                            <?php if((get_previous_post()) || (get_next_post())): 
								$post_thumbnail_id = get_post_thumbnail_id($post->ID);
            					$post_thumbnail_url = wp_get_attachment_url($post_thumbnail_id);
							?>
                            <div class="post-pagination">
                                <?php global $post; $prev_post = get_previous_post();
									if (!empty($prev_post)):
								?>
                                <div class="prev-post">
                                    <h5><i class="flaticon-right-arrow-6"></i> <?php esc_html_e('Prev Post', 'transida'); ?></h5>
                                    <div class="post" style="background-image: url(<?php echo esc_url($post_thumbnail_url); ?>);">
                                        <div class="content">
                                            <div class="date"><i class="far fa-calendar"></i> <?php echo get_the_date(); ?></div>
                                            <h4><a href="<?php echo esc_url(get_permalink($prev_post->ID)); ?>"><?php echo wp_kses(transida_trim( get_the_title($prev_post->ID), 8 ), true); ?></a></h4>
                                        </div>
                                    </div>
                                </div>
                                <?php endif; ?>
            					<div class="all-blog"><a href="javascript();"><i class="flaticon-grid"></i></a></div>
								<?php global $post; $next_post = get_next_post();
                                    if (!empty($next_post)): 
                                ?>
                                <div class="next-post">
                                    <h5> <?php esc_html_e('Next Post', 'transida'); ?><i class="flaticon-right-arrow-6"></i></h5>
                                    <div class="post" style="background-image: url(<?php echo esc_url($post_thumbnail_url); ?>);">
                                        <div class="content">
                                            <div class="date"><i class="far fa-calendar"></i> <?php echo get_the_date(); ?></div>
                                            <h4><a href="<?php echo esc_url(get_permalink($next_post->ID)); ?>"><?php echo wp_kses(transida_trim( get_the_title($next_post->ID), 8 ), true); ?></a></h4>
                                        </div>
                                    </div>
                                </div>
                                <?php endif; ?>
                            </div>
                            <?php endif; ?>
                            
                            <?php if( $options->get( 'single_post_author_box' ) ):?>
                            <div class="group-title"><h3><?php esc_html_e('About Author', 'transida'); ?></h3></div>
                            <div class="author-box">
                                <div class="image">
									<?php if($avatar = get_avatar(get_the_author_meta('ID')) !== FALSE): ?>
										<?php echo get_avatar(get_the_author_meta('ID'), 170); ?>
                                    <?php endif; ?>
                                </div>
                                <h4><?php the_author(); ?></h4>
                                <div class="text"><?php the_author_meta( 'description', get_the_author_meta('ID') ); ?></div>
                                <?php if( $options->get( 'single_post_author_links' ) ):?><h5><a href="<?php the_author_meta( 'url', get_the_author_meta('ID') ); ?>"><?php esc_html_e('Visit:', 'transida'); ?> <?php the_author_meta( 'url', get_the_author_meta('ID') ); ?></a></h5><?php endif; ?>
                            </div>
                            <?php endif; ?>
                            
                            <!--End Single blog Post-->
                            <?php comments_template(); ?>
                        
                    	</div>
                	
                    </div>        
				
                <?php endwhile; ?>
                
            </div>
        	<?php
				if ( $data->get( 'layout' ) == 'right' ) {
					do_action( 'transida_sidebar', $data );
				}
			?>
        </div>
    </div>
</section> 
<!--End blog area-->

<?php
}
get_footer();
