<?php
/**
 * The template for displaying Archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Blain
 */
get_header(); ?>
  <section id="primary" class="content-area col-md-8">
    <main id="main" class="site-main" role="main">
      <?php if ( have_posts() ) : ?>
      <?php while ( have_posts() ) : the_post(); ?>
      
       <?php
              /* translators: used between list items, there is a space after the comma */
              $category_list = get_the_category_list( __( ' | ', 'blain' ) );
              /* translators: used between list items, there is a space after the comma */
              $tag_list = get_the_tag_list( '', __( ' | ', 'blain' ) );
              if ( ! blain_categorized_blog() ) {
                // This blog only has 1 category so we just need to worry about tags in the meta text
                if ( '' != $tag_list ) {
                  $meta_text = __( 'This entry was tagged %2$s. Bookmark the <a href="%3$s" rel="bookmark">permalink</a>.', 'blain' );
                } else {
                  $meta_text = __( 'Bookmark the <a href="%3$s" rel="bookmark">permalink</a>.', 'blain' );
                }
              } else {
                // But this blog has loads of categories so we should probably display them here
                if ( '' != $tag_list ) {
                  $meta_text = __( 'Also in:  %1$s and tagged %2$s.', 'blain' );
                } else {
                  $meta_text = __( 'Also in: %1$s.', 'blain' );
                }
              } // end check for categories on this blog
            ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
          <header class="entry-header">
            <h3 class="entry-title h3"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
            <div class="categories">
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
            <?php the_excerpt(); ?>
          </div><!-- .entry-content -->
          <footer class="entry-meta">
            Also in:  <?php $parentscategory ="";
                foreach((get_the_category()) as $category) {
                  if ($category->category_parent != 1) {
                    $parentscategory .= ' <a href="' . get_category_link($category->cat_ID) . '" title="' . $category->name . '">' . $category->name . '</a>, ';
                  }
                }
                echo substr($parentscategory,0,-1); ?>
                <a href="<?php the_permalink(); ?>" class="btn-yellow">Read More</a>
          </footer><!-- .entry-meta -->
        </article><!-- #post-## -->
        <div class="clearfix"></div>
      <?php endwhile; ?>
      <?php blain_content_nav( 'nav-below' ); ?>
    <?php else : ?>
      <?php get_template_part( 'no-results', 'archive' ); ?>
    <?php endif; ?>
    </main><!-- #main -->
  </section><!-- #primary -->
  
<?php get_sidebar('blog'); ?>
<?php get_footer(); ?>
