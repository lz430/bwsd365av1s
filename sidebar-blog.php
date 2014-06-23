<?php
/**
 * The Sidebar for the blog/news section.
 *
 * @package burnsWilcox
 */
?>
  <div id="secondary" class="widget-area col-md-4" role="complementary">
    <?php do_action( 'before_sidebar' ); ?>
    <?php if ( ! dynamic_sidebar( 'sidebar-blog' ) ) : ?>
    <?php endif; // end sidebar widget area ?>
  </div><!-- #secondary -->
