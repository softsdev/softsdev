<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package VW Corporate Lite
 */
?>
    <div class="footersec">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-3">
                    <?php dynamic_sidebar('sidebar-3');?>
                </div>
                <div class="col-md-3 col-sm-3">
                    <?php dynamic_sidebar('sidebar-4');?>
                </div>
                <div class="col-md-3 col-sm-3">
                    <?php dynamic_sidebar('sidebar-5');?>
                </div>
                <div class="col-md-3 col-sm-3">
                    <?php dynamic_sidebar('sidebar-6');?>
                </div>        
            </div>
        </div>
    </div>
    <div id="footer" class="copyright-wrapper">
        <div class="inner">
            <div class="copyright">
            <p><?php echo esc_html(get_theme_mod('vw_corporate_lite_footer_copy',__('Professional WordPress Themes By','vw-corporate-lite'))); ?> <?php echo esc_html(vw_corporate_lite_credit(),'vw-corporate-lite'); ?></p>
            </div><!-- copyright -->
            <div class="clear"></div>
        </div><!-- inner -->
    </div>
    <?php wp_footer(); ?>

    </body>
</html>