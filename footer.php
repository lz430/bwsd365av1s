<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Blain
 */
?>
  </div><!-- #content -->
  <footer id="colophon" class="site-footer" role="contentinfo">
        <div class="container">
    <div class="col-lg-4">
     <?php if((of_get_option('logo', true) != "") && (of_get_option('logo', true) != 1) ) { ?>
              <h1 class="site-title logo-container">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
                  <?php
                    echo "<img class='main_logo' src='".of_get_option('logo', true)."' title='".esc_attr(get_bloginfo( 'name','display' ) )."'></a></h1>";  
                  ?>
                </a>
                <?php } ?>
                <div class="copyright">
                  <?php
                    if ( (function_exists( 'of_get_option' ) && (of_get_option('footertext2', true) != 1) ) ) {
                    echo of_get_option('footertext2', true); } 
                  ?>
                </div>
    </div>
    <div class="col-lg-2">
      <?php
          wp_nav_menu( array(
              'theme_location'    => 'footer',
              'depth'             => 1,
              'container'         => 'div',
              'container_class'   => 'collapse navbar-collapse navbar-ex1-collapse',
              'menu_class'        => 'footer-nav nav navbar-nav',
              'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
              'walker'            => new wp_bootstrap_navwalker())
          );
      ?>
      <?php if ( of_get_option('linkedin', true) != "") { ?>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <h2>FOLLOW</h2>
          <a target='_blank' href="<?php echo esc_url(of_get_option('linkedin', true)); ?>" class="icon-social" title="LinkedIn" ><i class="social-icon icon-linkedin"></i></a>
        </div>
      <?php } ?>
    </div>
    <div class="col-lg-6">
      <?php echo do_shortcode('[contact-form-7 id="26" title="Footer contact form"]' ); ?>
    </div>
        </div> <!--end container-->
      <div id="sub-floor">
        <div class="row container">
          <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
            <p>&copy; <?php the_date("Y") ?> Burns &amp; Wilcox Brokerage,  a Kaufman Financial Group company. All rights reserved.</p>
          </div>
          <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
            <p>
              <ul>
                <li><a href=" <?php echo home_url(); ?>/terms-of-service">Terms of Service</a></li>
                <li><a href=" <?php echo home_url(); ?>/privacy-policy">Privacy Policy</a></li>
              </ul>
            </p>
          </div>
      </div> <!--end row container-->
    </div> <!--end subfloor-->
  </footer><!-- #colophon -->
</div><!-- #page -->
<script>
  jQuery(window).load(function(){
    // jQuery(".nivo-controlNav").prependTo("#masthead #slider");
  }) ;
  // Top slider magic
    function clickMe(clickEle, actionEle, animate){
      jQuery(clickEle).click(function(){
        jQuery(actionEle).addClass("animated " + animate);
        jQuery("#top-slider .row").show();    
        window.setTimeout( function(){
          jQuery(actionElement).removeClass('animated ' + animation);
        }, 2000);   
      });
    }
  jQuery(document).ready(function(){
    //Slide down
    jQuery("#top-slider").hide();
    jQuery(".top-slider, .btn-close").click(function(){
      jQuery("#top-slider").slideToggle();
      jQuery(".top-slider").toggleClass("arrow-down");
    });
    jQuery.fn.absoluteTable = function() {
      var myElement;
      return this.each(function() {
        myElement = jQuery(this);
        var newDiv = jQuery("<div />", {
          "class": "innerWrapper",
          "css"  : {
            "height"  : myElement.outerHeight(true),
            "width"   : "100%",
            "position": "relative"
          }
        });
        myElement.wrapInner(newDiv);    
      });
    };
    jQuery(".solution-box").absoluteTable();
    // Kaufman adding classes to get the dual column look
    jQuery("#menu-kaufman li").addClass("col-lg-6 col-md-6 col-sm-6 col-xs-12");
   
   // Off canvas mobile menu
  // jQuery('[data-toggle=offcanvas]').click(function () {
  //   jQuery('.row-offcanvas').toggleClass('active')
  // });

  // Sticky footer stuff
  function positionFooter() {
    var mFoo = jQuery("#colophon");
    if (((jQuery(document.body).height() + mFoo.outerHeight()) < jQuery(window).height() && mFoo.css("position") == "fixed") || (jQuery(document.body).height() < jQuery(window).height() && mFoo.css("position") != "fixed")) {
        mFoo.css({
            position: "fixed",
            bottom: "0px",
            width: "100%"
        });
    } else {
        mFoo.css({
            position: "static"
        });
    }
}
    positionFooter();
    jQuery(window).scroll(positionFooter);
    jQuery(window).resize(positionFooter);
    jQuery(window).load(positionFooter);

jQuery('.navbar-toggle').click(function () {
  jQuery('.row-offcanvas').toggleClass('active')
});

});
</script>
<?php wp_footer(); ?>
</body>
</html>