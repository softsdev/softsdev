 <?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package VW Corporate Lite
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <div id="header">
        <div class="header-top">
            <div class="container">
                <div class="top-contact col-md-2 col-xs-12 col-sm-4">
                  <?php if(esc_url( get_theme_mod( 'vw_corporate_lite_contact_corporate','' ) ) != '') { ?>
                    <span class="call"><i class="fa fa-phone" aria-hidden="true"></i><?php echo esc_html( get_theme_mod('vw_corporate_lite_contact_corporate',__('(518) 356-5373','vw-corporate-lite') )); ?></span>
                   <?php } ?>
                </div>   
                <div class="top-contact col-md-3 col-xs-12 col-sm-4">
                  <?php if(esc_url( get_theme_mod( 'vw_corporate_lite_email_corporate','' ) ) != '') { ?>
                    <span class="email_corporate"><i class="fa fa-envelope" aria-hidden="true"></i><?php echo esc_html( get_theme_mod('vw_corporate_lite_email_corporate',__('support@vwthemes.com','vw-corporate-lite')) ); ?></span>
                  <?php } ?>
                </div>
                <div class="social-media col-md-2 col-sm-4 col-xs-12">
                   <?php if(esc_url( get_theme_mod( 'vw_corporate_lite_youtube_url','' ) ) != '') { ?>
                    <a href="<?php echo esc_url( get_theme_mod( 'vw_corporate_lite_youtube_url','' ) ); ?>"><i class="fa fa-youtube" aria-hidden="true"></i></a>
                  <?php } ?>
                  <?php if(esc_url( get_theme_mod( 'vw_corporate_lite_facebook_url','' ) ) != '') { ?>
                    <a href="<?php echo esc_url( get_theme_mod( 'vw_corporate_lite_facebook_url','' ) ); ?>"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                  <?php } ?>
                  <?php if(esc_url( get_theme_mod( 'vw_corporate_lite_twitter_url','' ) ) != '') { ?>
                    <a href="<?php echo esc_url( get_theme_mod( 'vw_corporate_lite_twitter_url','' ) ); ?>"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                  <?php } ?>
                  <?php if(esc_url( get_theme_mod( 'vw_corporate_lite_rss_url','' ) ) != '') { ?>
                    <a href="<?php echo esc_url( get_theme_mod( 'vw_corporate_lite_rss_url','' ) ); ?>"><i class="fa fa-rss" aria-hidden="true"></i></a>
                  <?php } ?>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="menu-sec header">
          <div class="container">
            <div class="logo col-md-4 col-sm-4 wow bounceInDown">
                <?php if( has_custom_logo() ){ vw_corporate_lite_the_custom_logo();
                 }else{ ?>
                <h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                <?php $description = get_bloginfo( 'description', 'display' );
                if ( $description || is_customize_preview() ) : ?> 
                  <p class="site-description"><?php echo esc_html($description); ?></p>       
                <?php endif; }?>
            </div>
            <div class="toggle"><a class="toggleMenu" href="#"><?php esc_html_e('Menu','vw-corporate-lite'); ?></a></div>
            <div class="menubox col-md-8 col-sm-8 ">
              <div class="nav">
                  <?php wp_nav_menu( array('theme_location'  => 'primary') ); ?>
              </div>
            </div>
          </div>
        </div>
        <div class="clear"></div>   
    </div>