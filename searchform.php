<?php
/**
 * The template for displaying search forms in Blain
 *
 * @package Blain
 */
?>
<div class="row">
  <form role="search" method="get" class="search-form col-lg-8 col-md-8 col-sm-8 col-xs-12" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <span class="screen-reader-text"><?php _ex( 'Search for:', 'label', 'blain' ); ?></span>
    <input type="search" class="search-field col-lg-8 col-md-8 col-sm-8 col-xs-12" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'blain' ); ?>" value="<?php echo esc_attr( get_search_query() ); ?>" name="s">
    <input type="submit" class="search-submit" value="<?php echo esc_attr_x( 'Search', 'submit button', 'blain' ); ?>">
  </form>
</div>
