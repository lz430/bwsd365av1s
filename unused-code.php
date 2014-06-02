<!-- 
This file is just a bunch of stuff I'm not using in this build. 


-->
<!-- Social functions -->
    <div id="social-icons" class="col-md-6">
        <?php if ( of_get_option('facebook', true) != "") { ?>
       <a target='_blank' href="<?php echo esc_url(of_get_option('facebook', true)); ?>" title="Facebook" ><i class="social-icon icon-facebook-sign"></i></a>
               <?php } ?>
              <?php if ( of_get_option('twitter', true) != "") { ?>
         <a target='_blank' href="<?php echo esc_url("http://twitter.com/".of_get_option('twitter', true)); ?>" title="Twitter" ><i class="social-icon icon-twitter-sign"></i></a>
               <?php } ?>
               <?php if ( of_get_option('google', true) != "") { ?>
         <a target='_blank' href="<?php echo esc_url(of_get_option('google', true)); ?>" title="Google Plus" ><i class="social-icon icon-google-plus-sign"></i></a>
               <?php } ?>
               <?php if ( of_get_option('feedburner', true) != "") { ?>
         <a target='_blank' href="<?php echo esc_url(of_get_option('feedburner', true)); ?>" title="RSS Feeds" ><i class="social-icon icon-rss-sign"></i></a>
               <?php } ?>
               <?php if ( of_get_option('pinterest', true) != "") { ?>
         <a target='_blank' href="<?php echo esc_url(of_get_option('pinterest', true)); ?>" title="Pinterest" ><i class="social-icon icon-pinterest-sign"></i></a>
               <?php } ?>
               <?php if ( of_get_option('instagram', true) != "") { ?>
         <a target='_blank' href="<?php echo esc_url(of_get_option('instagram', true)); ?>" title="Instagram" ><i class="social-icon icon-instagram"></i></a>
               <?php } ?>
               <?php if ( of_get_option('linkedin', true) != "") { ?>
         <a target='_blank' href="<?php echo esc_url(of_get_option('linkedin', true)); ?>" title="LinkedIn" ><i class="social-icon icon-linkedin-sign"></i></a>
               <?php } ?>
               <?php if ( of_get_option('youtube', true) != "") { ?>
         <a target='_blank' href="<?php echo esc_url(of_get_option('youtube', true)); ?>" title="YouTube" ><i class="social-icon icon-youtube-sign"></i></a>
               <?php } ?>
               <?php if ( of_get_option('tumblr', true) != "") { ?>
         <a target='_blank' href="<?php echo esc_url(of_get_option('tumblr', true)); ?>" title="Tumblr" ><i class="social-icon icon-tumblr-sign"></i></a>
               <?php } ?>
               <?php if ( of_get_option('flickr', true) != "") { ?>
         <a target='_blank' href="<?php echo esc_url(of_get_option('flickr', true)); ?>" title="Flickr" ><i class="social-icon icon-flickr"></i></a>
               <?php } ?>
               <?php if ( of_get_option('dribble', true) != "") { ?>
         <a target='_blank' href="<?php echo esc_url(of_get_option('dribble', true)); ?>" title="Dribbble" ><i class="social-icon icon-dribbble"></i></a>
               <?php } ?>
         </div>



         <!-- Footer code -->
         <?php if ( of_get_option('credit1', true) == 0 ) { ?>
    <div class="site-info col-md-5">
      <?php do_action( 'blain_credits' ); ?>
      <?php printf( __( 'Blain Theme by %1$s.', 'blain' ), '<a href="http://inkhive.com/" rel="designer">InkHive</a>' ); ?>
    </div><!-- .site-info -->
  <?php } ?>  
    <div id="footertext" class="col-md-7">
         
        </div>   

<!-- Archive news header tag -->

        <!-- Comment code on page.php -->
        <?php
          // If comments are open or we have at least one comment, load up the comment template
          if ( comments_open() || '0' != get_comments_number() )
            comments_template();
        ?>

        <h1 class="page-title">
          <?php
            if ( is_category() ) :
              single_cat_title();

            elseif ( is_tag() ) :
              single_tag_title();

            elseif ( is_author() ) :
              /* Queue the first post, that way we know
               * what author we're dealing with (if that is the case).
              */
              the_post();
              printf( __( 'Author: %s', 'blain' ), '<span class="vcard">' . get_the_author() . '</span>' );
              /* Since we called the_post() above, we need to
               * rewind the loop back to the beginning that way
               * we can run the loop properly, in full.
               */
              rewind_posts();

            elseif ( is_day() ) :
              printf( __( 'Day: %s', 'blain' ), '<span>' . get_the_date() . '</span>' );

            elseif ( is_month() ) :
              printf( __( 'Month: %s', 'blain' ), '<span>' . get_the_date( 'F Y' ) . '</span>' );

            elseif ( is_year() ) :
              printf( __( 'Year: %s', 'blain' ), '<span>' . get_the_date( 'Y' ) . '</span>' );

            elseif ( is_tax( 'post_format', 'post-format-aside' ) ) :
              _e( 'Asides', 'blain' );

            elseif ( is_tax( 'post_format', 'post-format-image' ) ) :
              _e( 'Images', 'blain');

            elseif ( is_tax( 'post_format', 'post-format-video' ) ) :
              _e( 'Videos', 'blain' );

            elseif ( is_tax( 'post_format', 'post-format-quote' ) ) :
              _e( 'Quotes', 'blain' );

            elseif ( is_tax( 'post_format', 'post-format-link' ) ) :
              _e( 'Links', 'blain' );

            else :
              _e( 'Archives', 'blain' );

            endif;
          ?>
        </h1>

        <!--Single article footer  -->
          <footer class="entry-meta">
    <?php
      /* translators: used between list items, there is a space after the comma */
      $category_list = get_the_category_list( __( ', ', 'blain' ) );

      /* translators: used between list items, there is a space after the comma */
      $tag_list = get_the_tag_list( '', __( ', ', 'blain' ) );

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
          $meta_text = __( 'This entry was posted in %1$s and tagged %2$s. Bookmark the <a href="%3$s" rel="bookmark">permalink</a>.', 'blain' );
        } else {
          $meta_text = __( 'This entry was posted in %1$s. Bookmark the <a href="%3$s" rel="bookmark">permalink</a>.', 'blain' );
        }

      } // end check for categories on this blog

      printf(
        $meta_text,
        $category_list,
        $tag_list,
        get_permalink()
      );
    ?>

    <?php edit_post_link( __( 'Edit', 'blain' ), '<span class="edit-link">', '</span>' ); ?>
  </footer><!-- .entry-meta -->