<?php
/***********************************************************************
** Spidermag social links
************************************************************************/
if ( ! function_exists( 'spidermag_social_links' ) ){
    function spidermag_social_links() {  ?>
        <ul class="list-inline">
            <?php if ( get_theme_mod( 'spidermag_social_facebook' ) ) : ?>
                <li> <a href="<?php echo esc_url( get_theme_mod( 'spidermag_social_facebook' ) );?>" <?php if ( esc_attr( get_theme_mod( 'spidermag_social_facebook_checkbox', 0 ) )  == 1 ): echo "target=_blank"; endif; ?>><span class="ion-social-facebook"></span></a> </li>
            <?php endif;?>
            <?php if ( get_theme_mod( 'spidermag_social_twitter' ) ) : ?>
                <li> <a href="<?php echo esc_url( get_theme_mod( 'spidermag_social_twitter' ) ); ?>" <?php if ( esc_attr( get_theme_mod( 'spidermag_social_twitter_checkbox', 0 ) ) == 1 ): echo "target=_blank"; endif; ?>><span class="ion-social-twitter"></span></a> </li>
            <?php endif;?>
            <?php if ( get_theme_mod('spidermag_social_googleplus' ) ) : ?>
                <li> <a href="<?php echo esc_url( get_theme_mod( 'spidermag_social_googleplus' ) ); ?>" <?php if ( esc_attr( get_theme_mod( 'spidermag_social_googleplus_checkbox', 0 ) ) == 1 ): echo "target=_blank"; endif; ?>><span class="ion-social-googleplus"></span></a> </li>
            <?php endif;?>
            <?php if ( get_theme_mod( 'spidermag_social_instagram' ) ) : ?>
                <li> <a href="<?php echo esc_url( get_theme_mod( 'spidermag_social_instagram' ) ) ;?>" <?php if ( esc_attr( get_theme_mod( 'spidermag_social_instagram_checkbox', 0 ) ) == 1 ): echo "target=_blank"; endif; ?>><span class="ion-social-instagram"></span></a> </li>
            <?php endif;?>
            <?php if ( get_theme_mod( 'spidermag_social_pinterest' ) ) : ?>
                <li> <a href="<?php echo esc_url( get_theme_mod( 'spidermag_social_pinterest' ) ); ?>" <?php if ( esc_attr( get_theme_mod( 'spidermag_social_pinterest_checkbox', 0 ) ) == 1): echo "target=_blank"; endif; ?>><span class="ion-social-pinterest"></span></a> </li>
            <?php endif;?>
            <?php if ( get_theme_mod( 'spidermag_social_youtube' ) ) : ?>
                <li> <a href="<?php echo esc_url( get_theme_mod( 'spidermag_social_youtube' ) ); ?>" <?php if ( esc_attr( get_theme_mod( 'spidermag_social_youtube_checkbox', 0 ) ) == 1 ): echo "target=_blank"; endif; ?>><span class="ion-social-youtube"></span></a> </li>
            <?php endif;?>
        </ul>
    <?php 
    }
}
add_action( 'spidermag-social', 'spidermag_social_links', 10 );


/**********************************************************************
** Word ro Letter Count Function.
***********************************************************************/
function spidermag_new_excerpt_more($more) {
    return '<br/><a class="read-more" href="' . esc_url( get_permalink( get_the_ID() )  ) . '">' . esc_html__( 'Complete Reading', 'spidermag' ) . '</a>';
}
add_filter('excerpt_more', 'spidermag_new_excerpt_more');


/***********************************************************************
** spider mag hot news
************************************************************************/
if ( ! function_exists( 'spidermag_render_spider_hot_news' ) ) {
    function spidermag_render_spider_hot_news( $limit = 10 ){
        $get_featured_posts = new WP_Query( array(
            'posts_per_page' => $limit,
            'post_type'      => 'post'
        ) );

        ?>
          <ul id="js-news" class="js-hidden">
            <?php if( $get_featured_posts->have_posts() ) : while( $get_featured_posts->have_posts() ) : $get_featured_posts->the_post(); ?>
                <li class="news-item">
                    <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                        <?php the_title(); ?>
                    </a>
                </li>
            <?php endwhile; endif; wp_reset_postdata(); ?>
          </ul>
      <?php
    }
}


/***********************************************************************
** Archive Page Post Meta function
************************************************************************/
if( !function_exists( 'spidermag_archive_post_meta' ) ){

  function spidermag_archive_post_meta(){

      if( get_theme_mod('spidermag_archive_author','yes' ) == 'yes' ){ ?>

          <div class="author authormag"><span class="ion-person icon"></span><?php the_author_posts_link(); ?></div>
     
      <?php } if( get_theme_mod('spidermag_archive_post_date','yes' ) == 'yes'){ ?>  

          <div class="author timemag"><span class="ion-android-data icon"></span><a href="<?php the_permalink(); ?>"><?php echo esc_attr( get_the_date() ); ?></a></div>
      
      <?php } if( get_theme_mod('spidermag_archive_comment_count','yes' ) == 'yes'){ ?>

          <div class="author commentmag"><span class="ion-chatbubbles icon"></span><?php comments_popup_link( '0', '1', '%' );?></div>
      
      <?php } 
  }

}


/*********************************************************************************
** Single Page Post Meta function
**********************************************************************************/
if( !function_exists( 'spidermag_single_post_meta' ) ){

    function spidermag_single_post_meta(){

     if(esc_attr(get_theme_mod('spidermag_single_author','yes')) == 'yes') : ?>

          <div class="author"><span class="ion-android-contact icon"></span><?php the_author_posts_link(); ?></div>
        
        <?php endif;  if(esc_attr(get_theme_mod('spidermag_single_post_date','yes')) == 'yes') : ?>          
          
          <div class="author"><span class="ion-android-data icon"></span><a href="<?php the_permalink(); ?>"><?php echo get_the_date(); ?></a></div>
        
        <?php endif;  if(esc_attr(get_theme_mod('spidermag_single_comment_count','yes')) == 'yes') : ?>
          
          <div class="author"><span class="ion-chatbubbles icon"></span><?php comments_popup_link( '0', '1', '%' );?></div>
        
        <?php endif;  if(esc_attr(get_theme_mod('spidermag_single_category','yes')) == 'yes') : ?>
          
          <div class="author"><span class="ion-android-folder icon"></span><?php the_category(', '); ?></div>
        
        <?php endif;  if(esc_attr(get_theme_mod('spidermag_single_tags','yes')) == 'yes') : ?>
          
          <?php if(get_the_tags() ) : ?><div class="category"><span class="ion-pricetag icon"></span><?php the_tags( '' ); ?></div><?php endif; ?>
        
        <?php endif;   
    }
}







/***********************************************************************
 **spider mag post update date
************************************************************************/
if ( ! function_exists( 'spidermag_time_elapsed_string' ) ) {
    function spidermag_time_elapsed_string( $datetime, $full = false ) {
        $now = new DateTime;
        $ago = new DateTime($datetime);
        $diff = $now->diff($ago);

        $diff->w = floor($diff->d / 7);
        $diff->d -= $diff->w * 7;

        $string = array(
            'y' => 'year',
            'm' => 'month',
            'w' => 'week',
            'd' => 'day',
            'h' => 'hour',
            'i' => 'minute',
            's' => 'second',
        );
        foreach ($string as $k => &$v) {
            if ($diff->$k) {
                $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
            } else {
                unset($string[$k]);
            }
        }

        if (!$full) $string = array_slice($string, 0, 1);
        return $string ? implode(', ', $string) . ' ago' : 'just now';
    }
}

if ( ! function_exists( 'spidermag_get_spider_post_update_date' ) ) {
    function spidermag_get_spider_post_update_date( $category = null, $label = null ){
        $latest_post_from_category = new WP_Query( array(
            'posts_per_page'  => 1,
            'post_type'       => 'post',
            'category__in'    => $category,
        ) );
        if($latest_post_from_category->have_posts() ) : while ($latest_post_from_category->have_posts()) : $latest_post_from_category->the_post();
            $post_date_latest = get_the_time('Y-m-d g:i:s');
        endwhile; endif;
        echo spidermag_time_elapsed_string( $post_date_latest );
        wp_reset_postdata();
        
    }
}


/***********************************************************************
 ** get post format icon with limited links
************************************************************************/
if ( ! function_exists( 'spidermag_get_spider_mag_post_format_icon' ) ) {
    function spidermag_get_spider_mag_post_format_icon( $format ){
        $spider_mag_post_formats = array(
            ''          => 'ion-happy-outline',
            'aside'     => 'ion-document-text',
            'image'     => 'ion-image',
            'audio'     => 'ion-mic-a',
            'link'      => 'ion-link',
            'chat'      => 'ion-chatbubble',
            'gallery'   => 'ion-images',
            'quote'     => 'ion-quote',
            'status'    => 'ion-stats-bars',
            'video'     => 'ion-social-youtube-outline'
        );
        if(!empty( $format ) ){

            echo $spider_mag_post_formats[$format];

        }else{

         echo 'ion-pin';
         
        }
    }
}

/***********************************************************************
 ** Breadcrumbs function section
************************************************************************/
if (!function_exists('spidermag_breadcrumbs')) {
  function spidermag_breadcrumbs() {
      global $post;
      $showOnHome = 0; // 1 - show breadcrumbs on the homepage, 0 - don't show
      $delimiter = '/';    
      $home = '<i class="fa fa-home"></i>'; // text for the 'Home' link
      echo '<ul class="breadcrumb">';
      $showCurrent = 1; // 1 - show current post/page title in breadcrumbs, 0 - don't show
      $before = '<li class="active">'; // tag before the current crumb
      $after = '</li>'; // tag after the current crumb
      $homeLink = esc_url( home_url() );

      if (is_home() || is_front_page()) {
        if ($showOnHome == 1)
          echo '<li><a href="' . esc_url($homeLink) . '">' . wp_kses_post($home) . '</a></li>';
      } else {
          echo '<li><a href="' . esc_url($homeLink) . '">' . wp_kses_post($home) . '</a></li>' . esc_attr($delimiter) . ' ';
        if (is_category()) {
          $thisCat = get_category( get_query_var('cat') , false);
          if ($thisCat->parent != 0)
            echo get_category_parents($thisCat->parent, TRUE, ' ' . esc_attr($delimiter) . ' ');
          echo esc_html__('Archive by category','spidermag').' "' . single_cat_title('', false) . '" ';
        } elseif (is_search()) {
          echo esc_html__('Search results for','spidermag'). '"' . get_search_query() . '"';
        } elseif (is_day()) {
          echo '<a href="' . esc_url(get_year_link(get_the_time('Y'))) . '">' . esc_attr(get_the_time('Y')) . '</a> ' . esc_attr($delimiter) . ' ';
          echo '<a href="' . esc_url(get_month_link(get_the_time('Y')), esc_attr(get_the_time('m'))) . '">' . esc_attr(get_the_time('F')) . '</a> ' . esc_attr($delimiter) . ' ';
          echo esc_attr(get_the_time('d'));
        } elseif (is_month()) {
          echo '<a href="' . esc_url(get_year_link(get_the_time('Y'))) . '">' . esc_attr(get_the_time('Y')) . '</a> ' . esc_attr($delimiter) . ' ';
          echo esc_attr(get_the_time('F'));
        } elseif (is_year()) {
          echo esc_attr(get_the_time('Y'));
        } elseif (is_single() && !is_attachment()) {
          
          if (get_post_type() != 'post') {
            $post_type = get_post_type_object(get_post_type());
            $slug = $post_type->rewrite;
            echo '<a href="' . esc_url($homeLink) . '/' . esc_attr($slug['slug']) . '/">' . esc_attr( $post_type->labels->singular_name ) . '</a>';
            if ($showCurrent == 1)
              echo ' ' . esc_attr( $delimiter ) . ' ' . esc_attr( $before ) . wp_kses_post(get_the_title()) . esc_attr( $after );
          } else {
            $cat = get_the_category();
            $cat = $cat[0];
            $cats = get_category_parents($cat, TRUE, ' ' . esc_html( $delimiter ) . ' ');
            if ($showCurrent == 0)
              $cats = preg_replace("#^(.+)\s$delimiter\s$#", "$1", $cats);
            echo wp_kses_post( $cats );
            if ($showCurrent == 1)
              echo wp_kses_post(get_the_title());
          }

        } elseif (!is_single() && !is_page() && get_post_type() != 'post' && !is_404()) {
          $post_type = get_post_type_object(get_post_type());
          echo esc_attr($post_type->labels->singular_name);
        } elseif ( is_attachment() ) {
            $parent = get_post($post->post_parent);
            $cat    = get_the_category($parent->ID);
            if ( isset($cat) && !empty($cat)) {
                $cat    = $cat[0];
                echo get_category_parents($cat, TRUE, ' ' . esc_html( $delimiter ) . ' ');
                echo '<li><a href="' . esc_url( get_permalink( $parent ) ) . '">' . wp_kses_post( $parent->post_title ) . '</a></li>';
            }
            if ($showCurrent == 1)
                echo esc_attr( $before ) . wp_kses_post( get_the_title() ) . esc_attr( $after );
        } elseif (is_page() && !$post->post_parent) {
          if ($showCurrent == 1){
            echo esc_html(get_the_title());
          }
        } elseif (is_page() && $post->post_parent) {
          $parent_id = $post->post_parent;
          $breadcrumbs = array();
          while ($parent_id) {
            if(!empty($parent_id)){              
              $page = get_post($parent_id);
              $breadcrumbs[] = '<a href="' . esc_url( get_permalink($page->ID) ) . '">' . wp_kses_post(get_the_title($page->ID)) . '</a>';
              $parent_id = $page->post_parent;
            }
          }
          $breadcrumbs = array_reverse($breadcrumbs);
          for ($i = 0; $i < esc_attr(count($breadcrumbs)); $i++) {
            echo sprintf( $breadcrumbs[$i] );
            if ($i != count($breadcrumbs) - 1)
              echo ' ' . esc_attr( $delimiter ) . ' ';
          }
          if ($showCurrent == 1){
            echo ' ' . esc_attr($delimiter) . ' ' . wp_kses_post(get_the_title());
          }
        } elseif (is_tag()) {
          echo esc_html__('Posts tagged','spidermag').' "' . single_tag_title('', false) . '"';
        } elseif (is_author()) {
          global $author;
          $userdata = get_userdata($author);
          echo esc_html__('Articles posted by ','spidermag'). wp_kses_post($userdata->display_name);
        } elseif (is_404()) {
          echo esc_html__('Error 404','spidermag');
        }

        if (get_query_var('paged')) {
          if (is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author()){
            echo ' (';
            echo esc_html__('Page', 'spidermag') . ' ' . esc_attr( get_query_var('paged') );
          }
          if (is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author()){
                echo ')';
        }
      }

      echo '</ul>';
    }
  }
}

/*********************************************************************************
** spidermag Meta Options function
**********************************************************************************/
if( !function_exists( 'spidermag_meta_options' ) ) {
  function spidermag_meta_options( $meta_options = array() ){
        if(empty($meta_options)) {  ?>
          <div class="author"><span class="ion-android-contact icon"></span><?php the_author_posts_link(); ?></div>
          <div class="author"><span class="ion-android-data icon"></span><a href="<?php the_permalink(); ?>"><?php echo esc_attr( get_the_date() ); ?></a></div>
          <div class="author"><span class="ion-chatbubbles icon"></span><?php comments_popup_link( '0', '1', '%' ); ?></div>
      <?php
      } else {

          if(in_array('author', $meta_options)){

              echo '<div class="author"><span class="ion-android-contact icon"></span>' .get_the_author_posts_link(). '</div>';
          
          }

          if(in_array('time', $meta_options)){

            echo '<div class="author"><span class="ion-android-data icon"></span><a href=" '.esc_url( get_the_permalink() ).' ">' .esc_attr( get_the_date() ). '</a></div>';
          
          }
          if(in_array('comments', $meta_options)){ ?>

            <div class="author"><span class="ion-chatbubbles icon"></span><?php comments_popup_link( '0', '1', '%' ); ?></div>
          
          <?php }
      }     
  }
}


/***********************************************************************
 ** Display the related posts
************************************************************************/
if ( ! function_exists( 'spidermag_related_posts_function' ) ) {
   function spidermag_related_posts_function() {
      wp_reset_postdata();
      global $post;
      $args = array(
         'no_found_rows'          => true,
         'update_post_meta_cache' => false,
         'update_post_term_cache' => false,
         'ignore_sticky_posts'    => true,
         'orderby'                => 'rand',
         'post__not_in'           => array( $post->ID ),
         'posts_per_page'         => 12
      );
      if ( get_theme_mod('spidermag_related_posts', 'categories') == 'categories' ) {
         $cats = get_post_meta( $post->ID, 'related-posts', true );
         if ( !$cats ) {
            $cats = wp_get_post_categories( $post->ID, array('fields'=>'ids') );
            $args['category__in'] = $cats;
         } else {
            $args['cat'] = $cats;
         }
      }
      // Related by tags
      if ( get_theme_mod('spidermag_related_posts', 'categories') == 'tags' ) {
         $tags = get_post_meta($post->ID, 'related-posts', true);
         if ( !$tags ) {
            $tags = wp_get_post_tags($post->ID, array('fields'=>'ids'));
            $args['tag__in'] = $tags;
         } else {
            $args['tag_slug__in'] = explode(',', $tags);
         }
         if ( !$tags ) { $break = true; }
      }
      $query = !isset($break)?new WP_Query($args):new WP_Query;
      return $query;
   }
}


/***********************************************************************
 ** Function to show the footer info, copyright information
************************************************************************/
if ( ! function_exists( 'spidermag_footer_copyright' ) ){
    function spidermag_footer_copyright() {
        printf( esc_html__('&copy; %1$s %2$s', 'spidermag'), esc_attr( get_the_time("Y") ), esc_attr( get_bloginfo('name') ) );
      ?> - <?php  
          printf( esc_html__( 'WordPress Theme : by %2$s', 'spidermag' ), '', '<a href="'.esc_url('https://sparklewpthemes.com' ).'">Sparkle Themes</a>'  );
    }
}



/***********************************************************************
 ** Frontend Login And Register Popup Box
************************************************************************/
//1. Add a new form element...
if ( ! function_exists( 'spidermag_register_form' ) ){
    function spidermag_register_form() {
        if ( !empty( $_POST['first_name'] ) ) {
            $first_name = sanitize_text_field( wp_unslash( $_POST['first_name'] ) );
        }else{
           $first_name = '';
        }

        ?>
            <p>
                <label for="first_name"><?php esc_html_e( 'First Name', 'spidermag' ) ?><br />
                <input type="text" name="first_name" id="first_name" class="input" value="<?php echo esc_attr( trim( $first_name ) ); ?>" size="25" /></label>
            </p>
        <?php
    }
}
add_action( 'register_form', 'spidermag_register_form' );

//2. Add validation. In this case, we make sure first_name is required.
if ( ! function_exists( 'spidermag_registration_errors' ) ){
    function spidermag_registration_errors( $errors, $sanitized_user_login, $user_email ) { 
        $firstname = sanitize_text_field( wp_unslash( $_POST['first_name'] ) );  
        if(!empty( $firstname ) && trim( $firstname ) == '' ) {
            $errors->add( 'first_name_error', esc_html__( '<strong>ERROR</strong>: You must include a first name.', 'spidermag' ) );
        }
        return $errors;
    }
}
add_filter( 'registration_errors', 'spidermag_registration_errors', 10, 3 );

//3. Finally, save our extra registration user meta.
if ( ! function_exists( 'spidermag_user_register' ) ){
    function spidermag_user_register( $user_id ) {
        $firstname = sanitize_text_field( wp_unslash( $_POST['first_name'] ) );
        if ( ! empty( $firstname ) ) {
            update_user_meta( $user_id, 'first_name', $firstname );
        }
    }
}
add_action( 'user_register', 'spidermag_user_register' );


/**************************************************************************
** Category Color for widgets
***************************************************************************/
if ( !function_exists('spidermag_colored_category') ){
   function spidermag_colored_category() {
      global $post;
      $categories = get_the_category();
      $separator = '&nbsp;';
      $output = '';
      if($categories) {
        $output .= '<span class="cat-links">';
          foreach($categories as $category) {
            $color_code = spidermag_category_color( get_cat_id( $category->cat_name ) );
            if (!empty($color_code)) {
               $output .= '<a href="'.esc_url( get_category_link( $category->term_id ) ).'" style="background:' . spidermag_category_color( get_cat_id( $category->cat_name ) ) . '" rel="category tag">'.esc_html( $category->cat_name ).'</a>'.$separator;
            } else {
               $output .= '<a href="'.esc_url( get_category_link( $category->term_id ) ).'"  rel="category tag">'.esc_html( $category->cat_name ).'</a>'.$separator;
            }
          }
        $output .='</span>';
         echo trim( $output, $separator );
      }
   }
}

if ( ! function_exists( 'spidermag_category_color' ) ){
    function spidermag_category_color( $wp_category_id ) {
        $args = array(
          'orderby' => 'id',
          'hide_empty' => 0
        );
        $category = get_categories( $args );
        foreach ( $category as $category_list ) {
          $color = get_theme_mod( 'spidermag_category_color_'.$wp_category_id );
          return $color;
        }
    }
}

/****************************************************************************************************
**Add "parent" class to pages with subpages, change submenu class name, add depth class
*****************************************************************************************************/
class Spidermag_menu_Walker extends Walker_Nav_Menu {
    function display_element( $element, &$children_elements, $max_depth, $depth=0, $args, &$output ){
        $GLOBALS['dd_children'] = ( isset( $children_elements[$element->ID] ) ) ? 1 : 0;
        $GLOBALS['dd_depth'] = (int) $depth;
        parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
    }
    function start_lvl( &$output, $depth = 0, $args = array() ){
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<ul class=\"dropdown-menu text-capitalize\">\n";
    }

}
add_filter('nav_menu_css_class','spidermag_add_parent_css',10,2);
function  spidermag_add_parent_css( $classes, $item ){
     global  $dd_depth, $dd_children;
     $classes[] = '';
     if($dd_children)
         $classes[] = 'dropdown dropdown-toggle';
    return $classes;
}


/***********************************************************************************
** Spider Mag Default Main Menu Content
**********************************************************************************/
if ( ! function_exists( 'spidermag_menu_default' ) ){
    function spidermag_menu_default(){ ?>
        <div class="navbar-left spidermag-default-menu">
            <?php esc_html_e('Define your main menu bar navigation in Apperance > Menus ','spidermag') ?>>
        </div>
    <?php
    }
}


/***********************************************************************************
** SpiderMag Cusomt Comment List
**********************************************************************************/
if ( ! function_exists( 'spidermag_comment' ) ) {
    function spidermag_comment( $comment, $args, $depth ) { ?>
        <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
            <div class="media" id="comment-<?php comment_ID(); ?>">
                <a href="javascript();" class="pull-left">
                  <?php echo wp_kses_post( get_avatar( $comment, $size='100' ) ); ?>
                </a>
                <?php if ($comment->comment_approved == '0') : ?>
                     <em><?php esc_html_e('Your comment is awaiting moderation.','spidermag') ?></em>
                     <br />
                <?php endif; ?>
                <div class="media-body">
                      <div>
                          <?php printf( wp_kses_post('<h4 class="media-heading">%s</h4> <div class="time text-danger"><span class="ion-android-data icon"></span></div>','spidermag'), get_comment_author_link() ) ?>
                            <a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>">
                              <?php printf( esc_html__('%1$s at %2$s','spidermag'), get_comment_date(),  get_comment_time()) ?>
                            </a>
                      </div>
                          <?php comment_text() ?>
                        <div class="row">
                            <div class="col-sm-8 pull-left">
                                <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
                          </div>
                          <div class="col-sm-8 pull-right">
                              <?php edit_comment_link( wp_kses_post('<span class="reply pull-right ion-ios7-compose"></span>','spidermag'),'  ','') ?>
                          </div>
                        </div>
                </div>
            </div>
        </li>
        <?php
    }
}


/**
 * Schema type
 * @return string schema itemprop type
 * @since  1.0.0
*/
function spidermag_html_tag_schema() {
    $schema     = 'http://schema.org/';
    $type       = 'WebPage';
    // Is single post
    if ( is_singular( 'post' ) ) {
        $type   = 'Article';
    }
    // Is author page
    elseif ( is_author() ) {
        $type   = 'ProfilePage';
    }
    // Is search results page
    elseif ( is_search() ) {
        $type   = 'SearchResultsPage';
    }
    echo 'itemscope="itemscope" itemtype="' . esc_attr( $schema ) . esc_attr( $type ) . '"';
}


/********************************************************************************
** Preloader Frontend Section area
*********************************************************************************/
if ( ! function_exists( 'spidermag_dynamic_preloader' ) ) {
    function spidermag_dynamic_preloader() {
        $preloader = esc_attr( get_theme_mod( 'spidermag_preloader', 'default' ) );    
        if( isset( $preloader ) && $preloader != '' ) { ?>
            <style type='text/css'>
                .no-js #loader {
                    display: none; 
                }
                .js #loader { 
                    display: block;
                    position: absolute; 
                    left: 100px; 
                    top: 0; 
                }
                .spidermag-preloader {
                    position: fixed;
                    left: 0px;
                    top: 0px;
                    width: 100%;
                    height: 100%;
                    z-index: 9999999;
                    background: url('<?php echo esc_url( get_template_directory_uri() )."/assets/images/preloader/".esc_attr( $preloader ).".gif"; ?>') center no-repeat #fff;
                }
            </style>
        <?php  }
    }
}
add_action( 'wp_head', 'spidermag_dynamic_preloader');


/*****************************************************************
**spidermag page or post layout metabox
******************************************************************/
if ( ! function_exists( 'spidermag_metabox_section' ) ){
    function spidermag_metabox_section(){   
        
        add_meta_box('spidermag_display_layout', 
                     esc_html__( 'Display Layout Options', 'spidermag' ), 
                     'spidermag_display_layout_callback', 
                     array('page','post'),
                     'normal', 
                     'high'
        );


        add_meta_box('spidermag_post_settings_layout', 
                     esc_html__( 'Post settings', 'spidermag' ), 
                     'spidermag_post_settings_layout_callback', 
                     'post', 
                     'normal', 
                     'high'
        );

    }
}
add_action('add_meta_boxes', 'spidermag_metabox_section');

/**
 * Page Layout Meta Box Functionality
*/
$spidermag_page_layouts =array(       
    'leftsidebar' => array(
        'value'     => 'leftsidebar',
        'label'     => esc_html__( 'Left Sidebar', 'spidermag' ),
        'thumbnail' => get_template_directory_uri() . '/assets/images/left-sidebar.png',
    ),
    'rightsidebar' => array(
        'value'     => 'rightsidebar',
        'label'     => esc_html__( 'Right Sidebar', 'spidermag' ),
        'thumbnail' => get_template_directory_uri() . '/assets/images/right-sidebar.png',
    ),
     'nosidebar' => array(
        'value'     => 'nosidebar',
        'label'     => esc_html__( 'Full width', 'spidermag' ),
        'thumbnail' => get_template_directory_uri() . '/assets/images/no-sidebar.png',
    ), 
    'bothsidebar' => array(
        'value' => 'bothsidebar',
        'label' => esc_html__( 'Both Sidebar', 'spidermag' ),
        'thumbnail' => get_template_directory_uri() . '/assets/images/both-sidebar.png',
));


$spidermag_post_settings_layouts =array(       
    'standardpost' => array(
        'value'     => 'standardpost',
        'label'     => esc_html__( 'Standard Post', 'spidermag' ),
        'thumbnail' => get_template_directory_uri() . '/assets/images/standardpost.jpg',
    ),
    'classicpost' => array(
        'value'     => 'classicpost',
        'label'     => esc_html__( 'Classic Post', 'spidermag' ),
        'thumbnail' => get_template_directory_uri() . '/assets/images/classicpost.jpg',
    ),
     'screenwidthpost' => array(
        'value'     => 'screenwidthpost',
        'label'     => esc_html__( 'Screen Width Post', 'spidermag' ),
        'thumbnail' => get_template_directory_uri() . '/assets/images/screenwidthpost.jpg',
    ));

/***********************************************************************
 ** Function for Page layout meta box
***********************************************************************/
if ( ! function_exists( 'spidermag_display_layout_callback' ) ){
  function spidermag_display_layout_callback(){
      global $post, $spidermag_page_layouts;
      wp_nonce_field( basename( __FILE__ ), 'spidermag_settings_nonce' );
  ?>
      <table class="form-table">
          <tr>
            <td>            
              <?php
                $i = 0;  
                foreach ($spidermag_page_layouts as $field) {  
                $spidermag_page_metalayouts = esc_attr( get_post_meta( $post->ID, 'spidermag_page_layouts', true ) ); 
              ?>            
                <div class="radio-image-wrapper slidercat" id="slider-<?php echo intval( $i ); ?>" style="float:left; margin-right:30px;">
                  <label class="description">
                        <span><img src="<?php echo esc_url( $field['thumbnail'] ); ?>" alt="" /></span></br>
                        <input type="radio" name="spidermag_page_layouts" value="<?php echo esc_attr( $field['value'] ); ?>" <?php checked( $field['value'], $spidermag_page_metalayouts ); 
                        if( empty( $spidermag_page_metalayouts ) && $field['value'] == 'rightsidebar' ) { 
                            echo "checked='checked'"; 
                        } ?>/>&nbsp;<?php echo esc_attr( $field['label'] ); ?>
                  </label>
                </div>
              <?php $i++; } ?>
            </td>
          </tr>            
      </table>
  <?php
  }
}

/********************************************************************
 ** save the custom metabox data
********************************************************************/
if ( ! function_exists( 'spidemag_save_page_settings' ) ){
  function spidemag_save_page_settings( $post_id ) { 
      global $spidermag_page_layouts, $post; 
      if ( !isset( $_POST[ 'spidermag_settings_nonce' ] ) || ! wp_verify_nonce( sanitize_key( $_POST[ 'spidermag_settings_nonce' ] ) , basename( __FILE__ ) ) )
          return;
      if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE)  
          return;        
      if ('page' == $_POST['post_type']) {  
          if (!current_user_can( 'edit_page', $post_id ) )  
              return $post_id;  
      } elseif (!current_user_can( 'edit_post', $post_id ) ) {  
              return $post_id;  
      } 
      foreach ($spidermag_page_layouts as $field) {  
        $old = esc_attr( get_post_meta( $post_id, 'spidermag_page_layouts', true) ); 
        $new = wp_unslash( $_POST['spidermag_page_layouts'] );
        if ($new && $new != $old) {  
            update_post_meta( $post_id, 'spidermag_page_layouts', $new );  
        } elseif ('' == $new && $old) {  
            delete_post_meta( $post_id,'spidermag_page_layouts', $old );  
        } 
      }   
  }
}
add_action('save_post', 'spidemag_save_page_settings');


/***********************************************************************
 ** Function for post settings layout meta box
***********************************************************************/
if ( ! function_exists( 'spidermag_post_settings_layout_callback' ) ){
  function spidermag_post_settings_layout_callback(){
      global $post, $spidermag_post_settings_layouts;
      wp_nonce_field( basename( __FILE__ ), 'spidermag_post_settings_nonce' ); ?>
      <table class="form-table">
          <tr>
            <h4><?php esc_html_e( 'Choose Post Template Layout as You Want', 'spidermag' ); ?></h4>
            <td>
              <?php
                $i = 0;  
                foreach ($spidermag_post_settings_layouts as $field) {  
                $spidermag_post_settings_metalayouts = esc_attr( get_post_meta( $post->ID, 'spidermag_post_settings_layouts', true ) ); 
              ?>            
                  <div class="radio-image-wrapper slidercat" id="slider-<?php echo intval( $i ); ?>" style="float:left; margin-right:30px;">
                      <label class="description">
                        <span class="post-layout"><img src="<?php echo esc_url( $field['thumbnail'] ); ?>" alt="" /></span></br>
                        <input type="radio" name="spidermag_post_settings_layouts" value="<?php echo esc_attr( $field['value'] ); ?>" <?php checked( $field['value'], $spidermag_post_settings_metalayouts ); 
                        if(empty($spidermag_post_settings_metalayouts) && $field['value'] =='classicpost'){ 
                            echo "checked='checked'"; 
                        } ?>/>&nbsp;<?php echo esc_attr( $field['label'] ); ?>
                      </label>
                  </div>
              <?php $i++; } ?>
            </td>
          </tr>            
      </table>
    <?php
  }
}

/********************************************************************
 ** save post settings layout custom metabox data
********************************************************************/
if ( ! function_exists( 'spidemag_save_post_settings_layout' ) ){
  function spidemag_save_post_settings_layout( $post_id ) { 
      global $spidermag_post_settings_layouts, $post; 
      if ( !isset( $_POST[ 'spidermag_post_settings_nonce' ] ) || !wp_verify_nonce( wp_unslash( $_POST[ 'spidermag_post_settings_nonce' ] ), basename( __FILE__ ) ) )
          return;
      if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE)  
          return;        
      if ('page' == $_POST['post_type']) {  
          if (!current_user_can( 'edit_page', $post_id ) )  
              return $post_id;  
      } elseif (!current_user_can( 'edit_post', $post_id ) ) {  
              return $post_id;  
      }    
      foreach ( $spidermag_post_settings_layouts as $field ) {  
          $old = esc_attr( get_post_meta( $post_id, 'spidermag_post_settings_layouts', true) ); 
          $new = sanitize_text_field( wp_unslash( $_POST['spidermag_post_settings_layouts'] ) );
          if ($new && $new != $old) {  
              update_post_meta( $post_id, 'spidermag_post_settings_layouts', $new );  
          } elseif ('' == $new && $old) {  
              delete_post_meta( $post_id,'spidermag_post_settings_layouts', $old );  
          } 
       } // end foreach    
  }
}
add_action('save_post', 'spidemag_save_post_settings_layout');


/**
 * Themes required Plugins Install Section
*/
if ( ! function_exists( 'spidermag_root_register_required_plugins' ) ) {
  function spidermag_root_register_required_plugins() {

      $plugins = array(
        
            array(
              'name' => 'WooCommerce',
              'slug' => 'woocommerce',
              'required' => false,
            ),
            array(
              'name' => 'AccessPress Social Counter',
              'slug' => 'accesspress-social-counter',
              'required' => false,
            ),
            array(
              'name' => 'AccessPress Social Share',
              'slug' => 'accesspress-social-share',
              'required' => false,
            ),
            array(
              'name' => 'Contact Form 7',
              'slug' => 'contact-form-7',
              'required' => false,
            ),
            array(
            'name' => 'Regenerate Thumbnails',
            'slug' => 'regenerate-thumbnails',
            'required' => false,
            )
      );

      $config = array(
          'id' => 'tgmpa', // Unique ID for hashing notices for multiple instances of TGMPA.
          'default_path' => '', // Default absolute path to pre-packaged plugins.
          'menu' => 'tgmpa-install-plugins', // Menu slug.
          'parent_slug' => 'themes.php', // Parent menu slug.
          'capability' => 'edit_theme_options', // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
          'has_notices' => true, // Show admin notices or not.
          'dismissable' => true, // If false, a user cannot dismiss the nag message.
          'dismiss_msg' => '', // If 'dismissable' is false, this message will be output at top of nag.
          'is_automatic' => true, // Automatically activate plugins after installation or not.
          'message' => '', // Message to output right before the plugins table.
          'strings' => array(
              'page_title' => __('Install Required Plugins', 'spidermag'),
              'menu_title' => __('Install Plugins', 'spidermag'),
              'installing' => __('Installing Plugin: %s', 'spidermag'), // %s = plugin name.
              'oops' => __('Something went wrong with the plugin API.', 'spidermag'),
              'notice_can_install_required' => _n_noop(
                      'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.', 'spidermag'
              ), // %1$s = plugin name(s).
              'notice_can_install_recommended' => _n_noop(
                      'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.', 'spidermag'
              ), // %1$s = plugin name(s).
              'notice_cannot_install' => _n_noop(
                      'Sorry, but you do not have the correct permissions to install the %1$s plugin.', 'Sorry, but you do not have the correct permissions to install the %1$s plugins.', 'spidermag'
              ), // %1$s = plugin name(s).
              'notice_ask_to_update' => _n_noop(
                      'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.', 'spidermag'
              ), // %1$s = plugin name(s).
              'notice_ask_to_update_maybe' => _n_noop(
                      'There is an update available for: %1$s.', 'There are updates available for the following plugins: %1$s.', 'spidermag'
              ), // %1$s = plugin name(s).
              'notice_cannot_update' => _n_noop(
                      'Sorry, but you do not have the correct permissions to update the %1$s plugin.', 'Sorry, but you do not have the correct permissions to update the %1$s plugins.', 'spidermag'
              ), // %1$s = plugin name(s).
              'notice_can_activate_required' => _n_noop(
                      'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.', 'spidermag'
              ), // %1$s = plugin name(s).
              'notice_can_activate_recommended' => _n_noop(
                      'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.', 'spidermag'
              ), // %1$s = plugin name(s).
              'notice_cannot_activate' => _n_noop(
                      'Sorry, but you do not have the correct permissions to activate the %1$s plugin.', 'Sorry, but you do not have the correct permissions to activate the %1$s plugins.', 'spidermag'
              ), // %1$s = plugin name(s).
              'install_link' => _n_noop(
                      'Begin installing plugin', 'Begin installing plugins', 'spidermag'
              ),
              'update_link' => _n_noop(
                      'Begin updating plugin', 'Begin updating plugins', 'spidermag'
              ),
              'activate_link' => _n_noop(
                      'Begin activating plugin', 'Begin activating plugins', 'spidermag'
              ),
              'return' => __('Return to Required Plugins Installer', 'spidermag'),
              'plugin_activated' => __('Plugin activated successfully.', 'spidermag'),
              'activated_successfully' => __('The following plugin was activated successfully:', 'spidermag'),
              'plugin_already_active' => __('No action taken. Plugin %1$s was already active.', 'spidermag'), // %1$s = plugin name(s).
              'plugin_needs_higher_version' => __('Plugin not activated. A higher version of %s is needed for this theme. Please update the plugin.', 'spidermag'), // %1$s = plugin name(s).
              'complete' => __('All plugins installed and activated successfully. %1$s', 'spidermag'), // %s = dashboard link.
              'contact_admin' => __('Please contact the administrator of this site for help.', 'spidermag'),
              'nag_type' => 'updated', // Determines admin notice type - can only be 'updated', 'update-nag' or 'error'.
          )
      );
      tgmpa($plugins, $config);
  }
}
add_action('tgmpa_register', 'spidermag_root_register_required_plugins');
