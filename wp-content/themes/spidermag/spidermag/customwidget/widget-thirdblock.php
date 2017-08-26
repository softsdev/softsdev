<?php
/**
 ** Adds spidermag_third_block_widget widget.
*/
add_action('widgets_init', 'spidermag_third_block_widget');
function spidermag_third_block_widget() {
    register_widget('spidermag_third_block');
}
class spidermag_third_block extends WP_Widget {
    /**
     * Register widget with WordPress.
    */
    public function __construct() {
        parent::__construct(
            'spidermag_third_block', esc_html__('SPMag : Third Block Section','spidermag'), array(
            'description' => esc_html__('A widget that shows category Posts thumbnail in slider grid view', 'spidermag')
            )
        );
    }

    /**
     * Helper function that holds widget fields
     * Array is used in update and form functions
    */
    private function widget_fields() {
        
        $args = array(
            'type'       => 'post',
            'child_of'   => 0,
            'orderby'    => 'name',
            'order'      => 'ASC',
            'hide_empty' => 1,
            'taxonomy'   => 'category',
        );
        $multi_categories = get_categories( $args );
        $mag_categories_lists = array();
        foreach( $multi_categories as $multi_categorie ) {
            $mag_categories_lists[$multi_categorie->term_id] = $multi_categorie->name;
        }

        $fields = array(  

            'grid_block_title' => array(
                'bizintro_widgets_name' => 'grid_block_title',
                'bizintro_widgets_title' => esc_html__('Title', 'spidermag'),
                'bizintro_widgets_field_type' => 'title',
            ),

            'grid_block_category' => array(
              'bizintro_widgets_name' => 'grid_block_category',
              'bizintro_mulicheckbox_title' => esc_html__('Select Block Category', 'spidermag'),
              'bizintro_widgets_field_type' => 'multicheckboxes',
              'bizintro_widgets_field_options' => $mag_categories_lists
            ), 

            'third_block_number_post' => array(
                'bizintro_widgets_name' => 'third_block_number_post',
                'bizintro_widgets_title' => esc_html__('Display Number of Posts', 'spidermag'),
                'bizintro_widgets_field_type' => 'number',
            )

        );
        return $fields;
    }

    /**
     * Front-end display of widget.
     *
     * @see WP_Widget::widget()
     *
     * @param array $args     Widget arguments.
     * @param array $instance Saved values from database.
    */
    public function widget($args, $instance) {
        extract($args);
        extract($instance);

        $third_block_number_post = empty( $instance['third_block_number_post'] ) ? 5 : $instance['third_block_number_post'];
        $grid_block_title        = empty( $instance['grid_block_title'] ) ? '' : $instance['grid_block_title'];
       
        $grid_block_category     = empty($instance['grid_block_category']) ? 0 : $instance['grid_block_category']; 
        
        $multi_left_cat_id = array();
        if(!empty($grid_block_category)){
            $multi_left_cat_id = array_keys($grid_block_category);
        }

        $get_grid_slider_block_posts = new WP_Query( array(
            'posts_per_page'        => $third_block_number_post,
            'post_type'             => 'post',
            'category__in'          => $multi_left_cat_id,
            'ignore_sticky_posts'   => true
        ) );
      
        echo $before_widget; ?>

        <div class="row">
        <div class="col-sm-16 wow fadeInUp animated " data-wow-delay="0.5s" data-wow-offset="100">
            
            <div class="main-title-outer pull-left">
                <div class="main-title"><?php echo esc_html( $grid_block_title ); ?></div>
                <div class="span-outer">
                    <span class="pull-right text-danger last-update">
                        <span class="ion-android-data icon"></span><?php esc_html_e('Last update:','spidermag'); ?> 
                        <?php spidermag_get_spider_post_update_date( $multi_left_cat_id );?>
                    </span>
                </div>
            </div>

            <div class="row">
                <div id="owl-lifestyle" class="owl-carousel owl-theme lifestyle pull-left">
                    <?php if( $get_grid_slider_block_posts->have_posts() ){ while( $get_grid_slider_block_posts->have_posts() ){  $get_grid_slider_block_posts->the_post(); ?>
                        <div class="item topic">
                            <div class="box img-thumbnail">
                                <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                                    <?php 
                                        if(has_post_thumbnail()){
                                            $image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'spidermag-block-post', true);
                                    ?>
                                        <img src="<?php echo esc_url( $image[0] ); ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>"/>
                                    <?php } ?>
                                </a>
                            </div>

                            <h3><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h3>

                            <div class="text-danger sub-info-bordered remove-borders">
                                <?php spidermag_meta_options( array( 'time','comments' ) ); ?>
                            </div> 

                        </div>
                    <?php } } wp_reset_postdata(); ?>
                </div>
            </div>            
        </div>
        </div><!-- lifestyle end -->
        <?php
        echo $after_widget;
    }

    public function update($new_instance, $old_instance) {
        $instance = $old_instance;
        $widget_fields = $this->widget_fields();
        foreach ($widget_fields as $widget_field) {
            extract($widget_field);
            $instance[$bizintro_widgets_name] = bizintro_widgets_updated_field_value($widget_field, $new_instance[$bizintro_widgets_name]);
        }
        return $instance;
    }
    
    public function form($instance) {
        $widget_fields = $this->widget_fields();
        foreach ($widget_fields as $widget_field) {
            extract($widget_field);
            $bizintro_widgets_field_value = !empty($instance[$bizintro_widgets_name]) ? $instance[$bizintro_widgets_name] : '';
            bizintro_widgets_show_widget_field($this, $widget_field, $bizintro_widgets_field_value);
        }
    }
}