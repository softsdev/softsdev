<?php
/**
 * @package Spider_Mag
 * Adds spidermag_latest_random_post_widget widget.
 * Display Latest or Random posts.
*/
add_action('widgets_init', 'spidermag_latest_random_post_widget');
function spidermag_latest_random_post_widget() {
    register_widget('spidermag_latest_random_post');
}
class spidermag_latest_random_post extends WP_Widget {
    /**
     ** Register widget with WordPress.
    */
    public function __construct() {
        parent::__construct(
            'spidermag_latest_random_post', esc_html__('SPMag : Latest or Random Posts','spidermag'), array(
            'description' => esc_html__('A widget that display the latest or random posts', 'spidermag')
            )
        );
    }

    /**
     * Helper function that holds widget fields
     * Array is used in update and form functions
    */
    private function widget_fields() {
        $fields = array(   
            'latest_random_title' => array(
                'bizintro_widgets_name' => 'latest_random_title',
                'bizintro_widgets_title' => esc_html__('Title', 'spidermag'),
                'bizintro_widgets_field_type' => 'title',
            ),
            'latest_random_post' => array(
                'bizintro_widgets_name' => 'latest_random_post',
                'bizintro_widgets_field_type' => 'select',
                'bizintro_widgets_title' => esc_html__('Choose Posts Options', 'spidermag'),
                'bizintro_widgets_field_options' => array('desc' => 'Latest Posts', 'rand' => 'Random Posts')
            ),
            'latest_random_post_img' => array(
                'bizintro_widgets_name' => 'latest_random_post_img',
                'bizintro_widgets_field_type' => 'checkbox',
                'bizintro_widgets_title' => esc_html__('Checked to Display Images', 'spidermag'),
            ),
            'latest_random_number_post' => array(
                'bizintro_widgets_name' => 'latest_random_number_post',
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

        $latest_random_post        = empty( $instance['latest_random_post'] ) ? 'desc' : $instance['latest_random_post'];
        $latest_random_number_post = empty( $instance['latest_random_number_post'] ) ? 4 : $instance['latest_random_number_post'];
        $latest_random_post_img = empty( $instance['latest_random_post_img'] ) ? '' : $instance['latest_random_post_img'];

        $get_latest_random_post = new WP_Query( array(
          'posts_per_page'        => $latest_random_number_post,
          'post_type'             => 'post',
          'orderby'               => $latest_random_post,
          'ignore_sticky_posts' => true
        ));

    echo $before_widget; 
    $latest_random_title = empty($latest_random_title) ? "": $latest_random_title;
    ?>
    <div class="pull-left">
        <div class="f-title">
            <?php echo esc_html( $latest_random_title ); ?>
        </div>
    </div>
    <ul class="list-unstyled">
        <?php 
            if( $get_latest_random_post->have_posts() ){ while( $get_latest_random_post->have_posts() ){  $get_latest_random_post->the_post();
        ?>
        <li class="clearfix">   
            <?php if( $latest_random_post_img == 1 ){ ?>
                <div class="col-sm-4 box img-thumbnail">                        
                    <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                        <?php 
                            if( has_post_thumbnail() ){
                                the_post_thumbnail( array(150, 150) );
                            }
                        ?>
                    </a>                                              
                </div>
            <?php } ?>
            <div class="col-sm-12">
                <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                <div class="f-sub-info">
                    <?php spidermag_meta_options( array( 'time','comments' ) ); ?>
                </div>
            </div>
        </li>
        <?php } } wp_reset_postdata(); ?>                    
    </ul>
    <?php        
        echo $after_widget;
    }

    /**
     * Sanitize widget form values as they are saved.
     *
     * @see WP_Widget::update()
     *
     * @param   array   $new_instance   Values just sent to be saved.
     * @param   array   $old_instance   Previously saved values from database.
     *
     * @uses    bizintro_widgets_updated_field_value()      defined in widget-fields.php
     *
     * @return  array Updated safe values to be saved.
     */
    public function update($new_instance, $old_instance) {
        $instance = $old_instance;
        $widget_fields = $this->widget_fields();
        foreach ($widget_fields as $widget_field) {
            extract($widget_field);
            $instance[$bizintro_widgets_name] = bizintro_widgets_updated_field_value($widget_field, $new_instance[$bizintro_widgets_name]);
        }
        return $instance;
    }

    /**
     * Back-end widget form.
     *
     * @see WP_Widget::form()
     *
     * @param   array $instance Previously saved values from database.
     *
     * @uses    bizintro_widgets_show_widget_field()        defined in widget-fields.php
     */
    public function form($instance) {
        $widget_fields = $this->widget_fields();
        foreach ($widget_fields as $widget_field) {
            extract($widget_field);
            $bizintro_widgets_field_value = !empty($instance[$bizintro_widgets_name]) ? esc_attr($instance[$bizintro_widgets_name]) : '';
            bizintro_widgets_show_widget_field($this, $widget_field, $bizintro_widgets_field_value);
        }
    }
}