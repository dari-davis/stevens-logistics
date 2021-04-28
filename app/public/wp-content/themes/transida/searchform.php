<?php
/**
 * Search Form template
 *
 * @package TRANSIDA
 * @author Theme Kalia
 * @version 1.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	die( 'Restricted' );
}
?>

<div class="widget_search">
	<form action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get" class="search-form">
        <div class="form-group">
            <input type="search" name="s" value="<?php echo get_search_query(); ?>" placeholder="<?php echo esc_attr__( 'Enter Keyword...', 'transida' ); ?>" required="">
            <button type="submit"><i class="fas fa-search"></i></button>
        </div>
    </form>
</div>