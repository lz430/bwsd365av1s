<?php
/**
* The main template file.
*
* This is the most generic template file in a WordPress theme
* and one of the two required files for a theme (the other being style.css).
* It is used to display a page when nothing more specific matches a query.
* E.g., it puts together the home page when no home.php file exists.
* Learn more: http://codex.wordpress.org/Template_Hierarchy
*
* @package Blain
*/
get_header(); ?>
<div id="primary" class="content-area col-xs-12 col-sm-12 col-md-12 col-lg-12">
  <main id="main" class="site-main container" role="main">
   <!--  <div class="row">
      <div class="secondary col-xs-12 col-sm-12 col-md-12 col-lg-12">
        Recent Solutions boxes -->
        <!-- <h1>Recent Solutions</h1>
        <?php if ( have_posts() ) : ?>
          <?php 
            query_posts( array ( 'category_name' => 'home', 'posts_per_page' => 4, 'order' => 'DESC' ) );
            while ( have_posts() ) : the_post(); 
            ?>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 solution-box">
              <h4><?php the_title(); ?></h4>
              <p><?php the_excerpt(); ?></p>
              <a href="<?php the_permalink(); ?>" class="btn-black">More</a>
            </div>
          <?php endwhile; ?>   
        <?php endif; ?>
        <?php wp_reset_query(); ?> -->
      <!-- </div> end secondary -->
      <!-- <div class="shadow-lg col-xs-12 col-sm-12 col-md-12 col-lg-12"></div> -->
    <!-- </div>end row -->
    
    <div class="clearfix"></div>
    <div class="row">
      <div class="secondary col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <!-- Custom Product box -->
        <h1>Custom Products</h1>
          <?php if ( have_posts() ) : ?>
          <?php 
            query_posts( array ( 'post_type' => 'Products', 'category_name' => 'home', 'posts_per_page' => 1, 'order' => 'DESC' ) );
            while ( have_posts() ) : the_post(); 
            $background = wp_get_attachment_image_src( get_post_thumbnail_id( $page->ID ), 'full' );
          ?>
          <div class="cust-prod bg-blue">
            <style>
              .cust-prod{background-image: url('<?php echo $background[0]; ?>');background-position: center center;}
            </style>
              <div class="col-lg-3 col-md-3 col-sm-1 col-xs-1 no-pad">
                <div class="small-col bg-blue"></div>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 trans-blk">
                <h4><?php the_field('headline') ?></h4>
                <h3 class="bg-blue"><?php the_title(); ?></h3>
                <p><?php the_content(); ?></p>
                <p><a href="<?php the_field("link1") ?>" target="_blank"><?php the_field("link_1_text") ?></a></p>
                <p><a href="<?php the_field("link2") ?>"><?php the_field("link_2_text") ?></a></p>
                <p><a href="<?php the_field("link3") ?>"><?php the_field("link_3_text") ?></a></p>
              </div>
              <div class="col-lg-3 col-md-3 col-sm-5 col-xs-12 bg-blue">
                <h4>
                  Do you need a custom product solution?
                </h4>
                <h4><a href="/bwsd365av1s/contact/">Contact us today to get started</a></h4>
              </div>
            </div> <!--end .cust-prod-->
          
          <?php endwhile; ?>   
          <?php endif; ?>
        <?php wp_reset_query(); ?>
        </div> <!--end secondary-->
      </div> <!--end row-->
      <div class="shadow-lg col-xs-12 col-sm-12 col-md-12 col-lg-12"></div>
      <div class="clearfix"></div>
    <div class="row">
      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 secondary-box">
        <h2>News</h2>
          <ul class="news-feed">
            <?php 
              query_posts( array ( 'category_name' => 'home', 'posts_per_page' => 4, 'post_type' => 'news' ) );
              while ( have_posts() ) : the_post(); 
              ?>
              <li class="news-item">
                <a href="<?php the_permalink(); ?>"><h4><?php the_title(); ?></h4></a>
                <div class="date"><?php the_date(); ?></div>
              </li>
            <?php endwhile; ?>
          </ul>
          <?php wp_reset_query(); ?>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 secondary-box">
          <h2>Resources</h2>
           <ul class="resources-container">
            <?php 
              query_posts( array ( 'category_name' => 'home', 'posts_per_page' => 4, 'post_type' => 'resources' ) );
              while ( have_posts() ) : the_post(); 
              ?>
              <li class="resources-item">
                <h4><?php the_title(); ?></h4>
                <a href="<?php the_field('resource_link'); ?>" class="btn-black" target="_blank">Download</a>
              </li>
            <?php endwhile; ?>
          </ul>
          <?php wp_reset_query(); ?>
        </div> <!-- .secondary-box -->
      </div> <!-- .row -->
    </main><!-- #main -->
  </div><!-- #primary -->
<?php get_footer(); ?>