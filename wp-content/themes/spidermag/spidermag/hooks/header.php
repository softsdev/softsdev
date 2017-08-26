<?php
/**
 * Header Section Skip Area
*/

if ( ! function_exists( 'spidermag_skip_links' ) ) {
    /**
     * Skip links
     * @since  1.0.0
     * @return void
     */
    function spidermag_skip_links() { ?>
            <a class="skip-link screen-reader-text" href="#main"><?php esc_html_e( 'Skip to content', 'spidermag' ); ?></a>
        <?php
    }
}
add_action( 'spidermag_skip_links', 'spidermag_skip_links', 5 );


if ( ! function_exists( 'spidermag_header_before' ) ) {
    /**
     * Skip links
     * @since  1.0.0
     * @return void
     */
    function spidermag_header_before() {
        ?>
        <header id="masthead" class="site-header" role="banner">        
            <div class="header-container">
        <?php
    }
}
add_action( 'spidermag_header_before', 'spidermag_header_before', 10 );


if ( ! function_exists( 'spidermag_top_header' ) ) {
    /**
     * Skip links
     * @since  1.0.0
     * @return void
     */
    function spidermag_top_header() { ?>
        <div class="header-toolbar">
            <div class="container">
                <div class="row">
                    <div class="col-md-16 text-uppercase">                        
                        <div class="col-sm-10 col-xs-16">

                            <div class="topmain-nav" id="top-nav">
                                <?php 
                                    global $user_ID, $user_identity; wp_get_current_user(); 

                                    if (!$user_ID){ 

                                        if( esc_attr( get_theme_mod('spidermag_login_display',1 ) ) ){ ?>

                                            <li><a class="open-popup-link" href="#log-in" data-effect="mfp-zoom-in"><?php esc_html_e( 'login','spidermag' ); ?></a></li>
                                    
                                    <?php } if( esc_attr( get_theme_mod('spidermag_create_account_display',1 ) ) ){ ?>
                                            
                                            <li><a class="open-popup-link" href="#create-account" data-effect="mfp-zoom-in"><?php esc_html_e( 'create account','spidermag' ); ?></a></li>
                                    
                                    <?php } } else{

                                            echo '<li>'.esc_html__( 'Welcome','spidermag' ).', <span class="text-danger">'.esc_attr( $user_identity ).' !!!</span></li>';
                                        
                                        }
                                ?>
                                <?php  wp_nav_menu( array('theme_location' => 'top', 'container' => '' ) ); ?>   
                            </div>
                        </div><!-- top header left section -->

                        <div class="col-sm-6 col-xs-16">                           
                            <?php if( esc_attr( get_theme_mod( 'spidermag_right_side_header_setting','yes') ) == 'yes' ){ ?>
                                
                                <div class="list-inline pull-right"> 

                                   <?php the_time( 'l, d F Y, g:i A' ); ?>

                                </div>

                            <?php }else{ ?>

                                <div class="f-social pull-right">

                                    <?php do_action( 'spidermag-social', 10 );  ?>

                                </div>

                            <?php  } ?>
                        </div><!-- top header right section -->

                    </div>
                </div> <!-- .row -->
            </div><!-- .container -->
        </div><!-- Top header section end -->
        <?php
    }
}
add_action( 'spidermag_header', 'spidermag_top_header', 15 );

if ( ! function_exists( 'spidermag_main_header' ) ) {
    /**
     * Skip links
     * @since  1.0.0
     * @return void
     */
    function spidermag_main_header() { ?>
            <div class="sticky-header">
                <div class="container header">
                    <div class="row">
                        <div class="col-sm-8 col-md-8">
                            <div class="site-branding">
                                <div class="spidermag-logo">
                                    <?php 
                                        if ( function_exists( 'the_custom_logo' ) ) { 
                                            the_custom_logo();
                                        } 
                                    ?>
                                </div>
                                <div class="spidermag-logotitle">
                                    <h1 class="site-title">
                                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                                            <?php bloginfo( 'name' ); ?>
                                        </a>
                                    </h1>
                                    <?php 
                                        $description = get_bloginfo( 'description', 'display' );
                                        if ( $description || is_customize_preview() ) { ?>
                                            <p class="buzz-site-description site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
                                    <?php } ?>
                                </div>
                            </div>
                        </div><!-- header main logo section -->

                        <div class="col-sm-8 col-md-8">
                            <?php 
                                if( is_active_sidebar( 'spider_header_ads' ) ){
                                    dynamic_sidebar( 'spider_header_ads' );
                                }
                            ?>
                        </div><!-- header ads section -->
                    </div> <!-- .row -->
                </div><!-- container --><!-- header end -->    

                <div class="<?php if ( esc_attr(get_theme_mod('spidermag_primary_sticky_menu', 1 ) ) == 1){ echo 'nav-search-outer'; } ?>">
                    <nav class="navbar navbar-inverse" role="navigation">
                        <div class="container">
                            <div class="row">
                                <div class="col-sm-16">
                                    <?php if ( esc_attr( get_theme_mod( 'spidermag_search_icon_in_menu', 1 ) ) == 1 ){ ?>
                                        <a href="javascript:;" class="toggle-search pull-right"><span class="ion-ios7-search"></span></a>
                                    <?php } ?>

                                    <div class="navbar-header">
                                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                                                data-target="#navbar-collapse">
                                                <span class="sr-only"><?php esc_html_e('Toggle navigation','spidermag'); ?></span>
                                                <span class="icon-bar"></span>
                                                <span class="icon-bar"></span> 
                                                <span class="icon-bar"></span>
                                        </button>
                                    </div>

                                    <div class="collapse navbar-collapse" id="navbar-collapse">
                                        <ul class="nav navbar-nav text-uppercase main-nav ">
                                            <?php
                                                if(esc_attr(get_theme_mod('spidermag_home_icon_display', 1)) == 1) {
                                                    $home_icon_class = 'spider-home spider-home-active';
                                            ?>
                                                <li>
                                                    <a href="<?php echo esc_url(home_url('/')); ?>"
                                                       title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>"
                                                       class="<?php echo esc_attr( $home_icon_class ); ?> ion-home">&nbsp;</a>
                                                </li>
                                            <?php
                                                }
                                            ?>                                                              
                                        </ul>
                                        <?php 
                                            wp_nav_menu( array(
                                                'theme_location' => 'primary',
                                                'container' => false,
                                                'menu_class' => 'nav navbar-nav text-uppercase main-nav second',
                                                'echo' => true,
                                                'before' => '',
                                                'after' => '',
                                                'link_before' => '',
                                                'link_after' => '',
                                                'walker' => new Spidermag_menu_Walker(),
                                                'fallback_cb' => 'spidermag_menu_default'
                                            ));
                                        ?>
                                    </div> <!-- collapse navbar-collapse -->
                                </div><!-- col-sm-16 -->
                            </div><!-- row -->
                        </div><!-- container -->

                        <div class="search-container ">
                            <div class="container">
                                <form method="get" class="search-form" action="<?php echo esc_url(home_url( '/' )); ?>">
                                    <input type="search" name="s" id="search-bar" placeholder="<?php echo esc_html__( 'Type & Hit Enter..', 'spidermag' ); ?>" value="<?php echo get_search_query() ?>" autocomplete="off">
                                </form>
                            </div>
                        </div><!-- search end -->
                    </nav><!--nav end-->
                </div><!-- nav and search end-->
            </div><!-- sticky header end -->
        <?php
    }
}
add_action( 'spidermag_header', 'spidermag_main_header', 20 );

if ( ! function_exists( 'spidermag_header_after' ) ) {
    /**
     * Skip links
     * @since  1.0.0
     * @return void
     */
    function spidermag_header_after() {
        ?>
            </div>
        </header><!-- #masthead -->
        <?php
    }
}
add_action( 'spidermag_header_after', 'spidermag_header_after', 25 );