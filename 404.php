<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package burnsWilcox
 */

get_header(); ?>

  <div id="primary" class="content-area col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <div class="container">
    <main id="main" class="site-main" role="main">

      <section class="error-404 not-found">
        <header class="page-header">
          <h1 class="page-title">We can't find what you're looking for</h1>
        </header><!-- .page-header -->

        <div class="page-content">
          <h4>Try searching</h4>
          <p><?php get_search_form(); ?></p>


          <?php //the_widget( 'WP_Widget_Recent_Posts' ); ?>

          
        </div><!-- .page-content -->
      </section><!-- .error-404 -->

    </main><!-- #main -->
  </div><!-- .container -->
  </div><!-- #primary -->

<?php get_footer(); ?>