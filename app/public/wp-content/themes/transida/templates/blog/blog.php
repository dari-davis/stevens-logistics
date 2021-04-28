<?php

/**
 * Blog Content Template
 *
 * @package    WordPress
 * @subpackage TRANSIDA
 * @author     Theme Kalia
 * @version    1.0
 */

if ( class_exists( 'Transida_Resizer' ) ) {
	$img_obj = new Transida_Resizer();
} else {
	$img_obj = array();
}
$allowed_tags = wp_kses_allowed_html('post');

$options = transida_WSH()->option();

global $post;
$post_thumbnail_id = get_post_thumbnail_id($post->ID);
$post_thumbnail_url = wp_get_attachment_url($post_thumbnail_id);
						
?>

<div <?php post_class(); ?>>
    <div class="news-block-four">
        <div class="inner-box">
            <?php if( has_post_thumbnail() ):?>
            <div class="image">
                <?php the_post_thumbnail('transida_1170x460'); ?>
                <div class="date"><?php echo get_the_date('d'); ?> <br> <?php echo get_the_date('M'); ?></div>
                <div class="overlay-two"><a href="<?php echo esc_url($post_thumbnail_url);?>" class="lightbox-image" data-fancybox="gallery"><span class="flaticon-zoom-in"></span></a></div>
            </div>
            <?php endif; ?>
            <div class="lower-content">
                <?php if(has_category()): ?><div class="category"><i class="fas fa-folder"></i> <?php the_category(' '); ?></div><?php endif; ?>
                <h3><a href="<?php echo esc_url( the_permalink( get_the_id() ) );?>"><?php the_title(); ?></a></h3>
                <?php if($options->get( 'blog_post_author' ) || $options->get( 'blog_post_comments' )): ?>
                <ul class="post-meta">
                    <?php if( $options->get( 'blog_post_author' ) ):?>
                    <li><a href="<?php echo esc_url(get_author_posts_url( get_the_author_meta('ID') )); ?>"><i class="far fa-user"></i>By: <?php the_author(); ?></a></li>
                    <?php endif;?>
                    <?php if( $options->get( 'blog_post_comments' ) ):?>
                    <li><a href="<?php echo esc_url(get_permalink(get_the_id()).'#comments'); ?>"><i class="far fa-comment"></i><?php comments_number( wp_kses(__('Comments 0' , 'transida'), true), wp_kses(__('Comment 1' , 'transida'), true), wp_kses(__('Comments %' , 'transida'), true)); ?></a></li>
                    <?php endif;?>
                </ul>
                <?php endif; ?>
                <div class="text"><?php the_excerpt(); ?></div>
                <div class="bottom-content">
                    <div class="link-box">
                        <a href="<?php echo esc_url( the_permalink( get_the_id() ) );?>" class="theme-btn btn-style-one"><span><i class="flaticon-up-arrow"></i><?php esc_html_e('More Details', 'transida'); ?> </span></a>
                    </div>
                    <?php if(function_exists('bunch_share_us')):?>
                    <div class="post-share-btn">
                        <span class="hint"><?php esc_html_e('Share This Post', 'transida');?></span>
                        <div class="social-links-wrapper">
                            <div class="icon"><span class="flaticon-share"></span></div>
                            <?php echo wp_kses(bunch_share_us(get_the_id(),$post->post_name ), true);?>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>                                
            </div>
        </div>
    </div>
    
</div>