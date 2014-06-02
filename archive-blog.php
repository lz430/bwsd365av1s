<?php
/**
 * The template for displaying Archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Blain
 */

get_header(); ?>

  <section id="primary" class="content-area col-md-9">
    <main id="main" class="site-main" role="main">
      <?php if ( have_posts() ) : ?>
      <?php while ( have_posts() ) : the_post(); ?>

    

      <?php endwhile; ?>
      <?php blain_content_nav( 'nav-below' ); ?>
    <?php else : ?>
      <?php get_template_part( 'no-results', 'archive' ); ?>
    <?php endif; ?>
    </main><!-- #main -->
  </section><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
