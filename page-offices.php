<?php
/*
 Template Name: Offices
 */
get_header(); ?>
  
  <div class="content-area">
    <main id="main" class="site-main col-lg-12 col-md-12 col-sm-12 col-xs-12" role="main">
      <div class="container row">
        <div class="contact-directory">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <h1 class="h1">Offices</h1>
            <ul class="list">
              <?php query_posts( 'post_type=offices'); ?>
              <?php while ( have_posts() ) : the_post(); ?>
                <li class="col-lg-3 col-md-3 col-sm-6 col-xs-12 office-box">
                  <h2 class="h2"><?php the_title(); ?></h2>
                  <div class="number">
                    O: <a href="tel:<?php the_field('office_number') ?>"><?php the_field('office_number') ?></a>
                  </div>
                  <?php if(get_field('office_fax') != ''){  ?>
                    <div class="number">F: <?php the_field('office_fax') ?></div>
                  <?php }else{} ?>
                  <div class="address">
                  <?php the_field('address') ?> <br>
                  <?php the_field('city') ?> <?php the_field('state') ?>, <?php the_field('zip_code') ?>
                </div>
                </li>
              <?php endwhile; // end of the loop. ?>
            </ul>
            <?php wp_reset_query(); ?>
          </div><!--end column-->
        </div><!--end contact-directory-->
      </div><!--end container row-->
      <div class="clearfix"></div>
      <section class="bg-yellow contact-directory">
        <div class="row container">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <?php echo do_shortcode("[contact-form-7 id='97' title='Contact Directory form']"); ?>  
          </div>
        </div>
      </section>
      <div class="row container contact-directory">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <h1>Staff Directory</h1>
          <h2 class="h2">Leadership</h2>
          <ul class="list row">
            <?php query_posts( 'post_type=Staff&cat=11'); ?>
            <?php while ( have_posts() ) : the_post(); ?>
              <li class="col-lg-3 col-md-3 col-sm-6 col-xs-12 office-box team">
                <h2 class="h2"><?php the_title(); ?></h2>
                <h4 class="title"><?php the_field('title') ?></h4>
                <div class="number">O: <?php the_field('office_phone') ?></div>
                <div class="number">C: <?php the_field('cell_phone') ?></div>
                <div class="number email"><a href="mailto:<?php the_field('email') ?>"><?php the_field('email') ?></a></div>
              </li>
            <?php endwhile; // end of the loop. ?>
          </ul>
          <?php wp_reset_query(); ?>
          <h2 class="h2">Property Team</h2>
           <ul class="list row">
            <?php query_posts( 'post_type=Staff&cat=12'); ?>
            <?php while ( have_posts() ) : the_post(); ?>
              <li class="col-lg-3 col-md-3 col-sm-6 col-xs-12 office-box team">
                <h2 class="h2"><?php the_title(); ?></h2>
                <h4 class="title"><?php the_field('title') ?></h4>
                <div class="number">O: <?php the_field('office_phone') ?></div>
                <div class="number">C: <?php the_field('cell_phone') ?></div>
                <div class="number email"><a href="mailto:<?php the_field('email') ?>"><?php the_field('email') ?></a></div>
              </li>
            <?php endwhile; // end of the loop. ?>
          </ul>
          <?php wp_reset_query(); ?>
          <h2 class="h2">Casualty Team</h2>
           <ul class="list row">
            <?php query_posts( 'post_type=Staff&cat=10'); ?>
            <?php while ( have_posts() ) : the_post(); ?>
              <li class="col-lg-3 col-md-3 col-sm-6 col-xs-12 office-box team">
                <h2 class="h2"><?php the_title(); ?></h2>
                <h4 class="title"><?php the_field('title') ?></h4>
                <div class="number">O: <?php the_field('office_phone') ?></div>
                <div class="number">C: <?php the_field('cell_phone') ?></div>
                <div class="number email"><a href="mailto:<?php the_field('email') ?>"><?php the_field('email') ?></a></div>
              </li>
            <?php endwhile; // end of the loop. ?>
          </ul>
          <?php wp_reset_query(); ?>
        </div><!-- columns -->
      </div><!-- row.container -->
    </main><!-- #main -->
  </div><!-- .content-area -->
<?php get_footer(); ?>
