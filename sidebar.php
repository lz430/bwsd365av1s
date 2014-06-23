<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package burnsWilcox
 */
?>
	<div id="secondary" class="widget-area col-md-4" role="complementary">
		<?php do_action( 'before_sidebar' ); ?>
		<?php if ( ! dynamic_sidebar( 'sidebar-1' ) ) : ?>

			

		<?php endif; // end sidebar widget area ?>
	</div><!-- #secondary -->
