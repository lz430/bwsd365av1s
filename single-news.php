<?php
/**
 * The Template for displaying all single posts.
 *
 * @package Blain
 */

get_header(); ?>

	<div id="primary" class="content-area col-md-7">
		<main id="main" class="site-main" role="main">
		  <?php while ( have_posts() ) : the_post(); ?>
                
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
          <header class="entry-header">
            <h3 class="entry-title"><?php the_title(); ?></h3>
            <div class="categories" >
              <?php $parentscategory ="";
                foreach((get_the_category()) as $category) {
                  if ($category->category_parent != 0) {
                    $parentscategory .= ' <a href="' . get_category_link($category->cat_ID) . '" title="' . $category->name . '">' . $category->name . '</a> | ';
                  }
                }
                echo substr($parentscategory,0,-1); ?>
            </div>
            <div class="entry-meta"><?php the_date(); ?></div><!-- .entry-meta -->
          </header><!-- .entry-header -->

          <div class="entry-content">
            <?php the_content(); ?>
          </div><!-- .entry-content -->

          <footer class="entry-meta">
            Also in:  <?php $parentscategory ="";
                foreach((get_the_category()) as $category) {
                  if ($category->category_parent != 1) {
                    $parentscategory .= ' <a href="' . get_category_link($category->cat_ID) . '" title="' . $category->name . '">' . $category->name . '</a>, ';
                  }
                }
                echo substr($parentscategory,0,-1); ?>
          </footer><!-- .entry-meta -->
        </article><!-- #post-## -->
		  <?php endwhile; // end of the loop. ?>
		</main><!-- #main -->
	</div><!-- #primary -->
<?php get_sidebar('blog'); ?>
<?php get_footer(); ?>