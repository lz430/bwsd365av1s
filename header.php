<?php
/**
 * The Header for our theme.
 * Displays all of the <head> section and everything up till <div id="content">
 * @package Blain BWBrokerage
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/animate.css">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
  <div id="page" class="hfeed site">
	<?php do_action( 'before' ); ?>
  <!-- class="collapse" data-toggle="collapse" -->
      <div id="top-slider"> 
        <div class="row container">
          <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
            <img src="<?php echo get_template_directory_uri(); ?>/images/kaufman-financial-group-logo.png" alt="Kaufman Financial Group Logo" class="kaufman-logo">
            <?php
                    wp_nav_menu( array(
                        'theme_location'    => 'kaufman',
                        'depth'             => 2,
                        'container'         => 'div',
                        // 'container_class'   => 'collapse navbar-collapse navbar-ex1-collapse',
                        'menu_class'        => 'two-col-list',
                        'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                        'walker'            => new wp_bootstrap_navwalker())
                    );
                ?>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
            <h3>Companies</h3>
            <?php
                wp_nav_menu( array(
                    'theme_location'    => 'companies',
                    'depth'             => 2,
                    'container'         => 'div',
                    // 'container_class'   => 'collapse navbar-collapse navbar-ex1-collapse',
                    'menu_class'        => 'two-col-list',
                    'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                    'walker'            => new wp_bootstrap_navwalker())
                );
            ?>
          </div>
           <!-- <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
            <h3>News</h3>
             <ul class="news-feed nav navbar-nav">
            <?php 
              query_posts( array ( 'category_name' => 'home', 'posts_per_page' => 4, 'post_type' => 'news' ) );
              while ( have_posts() ) : the_post(); 
              ?>
              <li class="news-item"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
            <?php endwhile; ?>
          </ul>
          <?php wp_reset_query(); ?>
          </div> -->
          <a href="#" class="btn-close" data-toggle="collapse" >
            <img src="<?php echo get_template_directory_uri(); ?>/images/btn-close.png" alt="Close">
          </a>
        </div>
          
      </div>
      <?php if(is_home() ){ ?>
      <!-- This is the home page header -->
  	<header id="masthead" class="site-header row" role="banner">
          <div class="slider-wrapper theme-default"> 
            <div class="container">
                <div id="top-menu" class="row row-offcanvas row-offcanvas-right">
                 <div class="nav-wrapper container">
                  <nav id="site-navigation" class="navbar navbar-default main-navigation" role="navigation">
                    <div class="navbar-header">
                      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                      </button>
                    </div>
                    <?php
                        wp_nav_menu( array(
                            'theme_location'    => 'primary',
                            'depth'             => 2,
                            'container'         => 'div',
                            'container_class'   => 'collapse navbar-collapse navbar-ex1-collapse',
                            'menu_class'        => 'nav navbar-nav',
                            'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                            'walker'            => new wp_bootstrap_navwalker())
                        );
                    ?>
                  </nav><!-- #site-navigation -->
                </div>
                <!-- <a href="#" class="top-slider"><span class="icon-arrow-up"></span> Kaufman Financial Group </a> -->
                </div>
              </div> <!--end container-->
              <!-- Large top slider -->
              <?php
                if ( (function_exists( 'of_get_option' )) && (of_get_option('slidetitle5',true) !=1) ) {
                if ( ( of_get_option('slider_enabled') != 0 ) && (is_home())  ) {
              ?>
              <div class="ribbon">
                <div class="row container">
                <div class="site-branding">
                  <div class="col-md-4 col-sm-12 col-xs-12">
                    <?php if((of_get_option('logo', true) != "") && (of_get_option('logo', true) != 1) ) { ?>
                      <h1 class="site-title logo-container">
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
                          <?php
                            echo "<img class='main_logo' src='".of_get_option('logo', true)."' title='".esc_attr(get_bloginfo( 'name','display' ) )."'></a></h1>";  
                            }else {  }?>
                    </div> <!--end logo column -->
                    <div class="col-md-8 col-lg-8 col-sm-12 col-xs-12">
                      <?php
                        wp_nav_menu( array(
                          'theme_location'    => 'secondary',
                          'depth'             => 2,
                          'container'         => 'div',
                          'container_class'   => 'collapse navbar-collapse navbar-ex1-collapse menu-secondary-top ',
                          'menu_class'        => 'nav navbar-nav col-lg-6',
                          'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                          'walker'            => new wp_bootstrap_navwalker())
                        );
                      ?>
                    </div> <!--end column--> 
                  </div>  <!--end site-branding--> 
              </div>   <!--end .row.container--> 
              </div>   <!--end .ribbon--> 
              <div class="row container">
                <div id="slider" class="nivoSlider">
                  <?php
                    $slider_flag = false;
                    for ($i=1;$i<6;$i++) {
                      $caption = ((of_get_option('slidetitle'.$i, true)=="")?"":"#caption_".$i);
                      if ( of_get_option('slide'.$i, true) != "" ) {
                        echo "<a href='".of_get_option('slideurl'.$i, true)."'><img src='".of_get_option('slide'.$i, true)."' title='".$caption."'></a>"; 
                        $slider_flag = true;
                      }
                    }
                  ?>  
                </div><!--#slider-->
                <?php 
                  for ($i=1;$i<6;$i++) {
                    $caption = ((of_get_option('slidetitle'.$i, true)=="")?"":"#caption_".$i);
                    if ($caption != ""){
                      echo "<div id='caption_".$i."' class='nivo-html-caption'>";
                      echo "<a href='".of_get_option('slideurl'.$i, true)."'><div class='slide-title'>".of_get_option('slidetitle'.$i, true)."</div></a>";
                      echo "<div class='slide-description'>".of_get_option('slidedesc'.$i, true)."</div>";
                      echo "</div>";
                    }
                  } 
                ?>
                </div>  
                <?php 
                  } //ending if
                  } // ending if
                ?>
                <div class="nivo-controlNav"></div>
              </div>
            </div> <!--end .row.container--> 
      </header><!-- #masthead -->
          <div class="row ">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 directory-container">
              <div class="yellow-strip col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div>Partner with us: </div>
              </div>
              <!-- <div class="arrow-yellow"><img src=" <?php echo get_template_directory_uri(); ?>/images/bg-yellow-arrow.png" alt="arrow-divider"></div> -->
              <div class="black-strip col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div>
                  <a href="/bwsd365av1s/contact/">Contact Directory</a>
                </div>
              </div> <!--end black-strip-->
              <!-- <div class="bg-blue col-lg-5 col-md-4 col-sm-4 col-xs-12">
                <div>
                  <a href="#">Make a Payment</a>
                </div>
              </div> <!--end blue-strip--> 
            </div> <!--end col-->
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 shadow-lg"></div>
          </div><!--end row-->
      <!-- End of home page header -->
      <?php 
        /*######################################################
        #######Ending of home page header#########################
        #######################################################
        */
       ?>
	<?php } else{ ?>
      <header id="masthead" class="site-header row " role="banner">
          <div class="slider-wrapper theme-default"> 
            <div class="container">
            <div id="top-menu">
             <div class="nav-wrapper container">
              <nav id="site-navigation" class="navbar navbar-default main-navigation" role="navigation">
                <div class="navbar-header">
                  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                  </button>
                </div>
                <?php
                    wp_nav_menu( array(
                        'theme_location'    => 'primary',
                        'depth'             => 2,
                        'container'         => 'div',
                        'container_class'   => 'collapse navbar-collapse navbar-ex1-collapse',
                        'menu_class'        => 'nav navbar-nav',
                        'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                        'walker'            => new wp_bootstrap_navwalker())
                    );
                ?>
              </nav><!-- #site-navigation -->
            </div>
            <!-- <a href="#" class="top-slider"><span class="icon-arrow-up"></span> Kaufman Financial Group </a> -->
            </div> <!--end top-menu-->
            </div> <!--end container-->
           
            <div class="ribbon">
                <div class="row container">
                <div class="site-branding">
                  <div class="col-md-4 col-sm-12 col-xs-12">
                    <?php if((of_get_option('logo', true) != "") && (of_get_option('logo', true) != 1) ) { ?>
                      <h1 class="site-title logo-container">
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
                          <?php
                            echo "<img class='main_logo' src='".of_get_option('logo', true)."' title='".esc_attr(get_bloginfo( 'name','display' ) )."'></a></h1>";  
                            }else {  }?>
                    </div> <!--end logo column -->
                    <div class="col-md-8 col-lg-8 col-sm-12 col-xs-12">
                      <?php
                        wp_nav_menu( array(
                          'theme_location'    => 'secondary',
                          'depth'             => 2,
                          'container'         => 'div',
                          'container_class'   => 'collapse navbar-collapse navbar-ex1-collapse menu-secondary-top ',
                          'menu_class'        => 'nav navbar-nav col-lg-6',
                          'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                          'walker'            => new wp_bootstrap_navwalker())
                        );
                      ?>
                    </div> <!--end column--> 
                  </div>  <!--end site-branding--> 
              </div>   <!--end .row.container--> 
              </div>   <!--end .ribbon--> 
            <div class="row container">
              <h2 class="col-lg-12 col-md-12 col-sm-12 col-xs-12 page-title">
                <?php 
                  if (is_archive() || is_singular('news')) {
                    echo "News ";
                  }
                  if (is_single() && is_singular('news') === false || is_page_template("page-solutions.php") ){
                    echo the_title(); 
                  }
                  ?>
              </h2>
            </div> 
            </div>
            </div>
          <?php 
            } // ending if
          ?>
   </header><!-- #masthead -->
    <div id="content" class="site-content row <?php if(is_page_template('page-solutions.php') || is_single() || is_archive() )echo 'container' ?>">
