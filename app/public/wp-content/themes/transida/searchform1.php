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
<form class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get">
    <input type="search" name="s" value="<?php echo get_search_query(); ?>" placeholder="<?php echo esc_attr__( 'Search...', 'transida' ); ?>">
    <button type="submit"><i class="far fa-search"></i></button>
</form>