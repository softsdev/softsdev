jQuery(window).load(function() {
    var upgrade_notice = '<a class="spidermag-pro" target="_blank" href="https://www.sparklewpthemes.com/wordpress-themes/spidermagpro">UPGRADE TO SPIDERMAG PRO</a>';
    upgrade_notice += '<a class="spidermag-pro" target="_blank" href="http://demo.sparklewpthemes.com/spidermagpro/demos/">SPIDERMAG PRO DEMO</a>';
    jQuery('#customize-info .preview-notice').append(upgrade_notice);
});

jQuery(document).ready(function( $ ) {
  /** 
    * Preloader Selection 
  */  
  $(".cmizer-preloader").click(function (e) {
      e.preventDefault();
      var preloader = $(this).attr("preloader");
      
      $(this).parents(".cmizer-preloader-container").find('.cmizer-preloader').removeClass('active');
      $(this).addClass('active');
      $(this).parents(".cmizer-preloader-container").next('input:hidden').val(preloader).change();
  });

});