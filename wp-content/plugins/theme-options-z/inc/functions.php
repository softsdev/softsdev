<?php
defined('ABSPATH') or die('No script kiddies please!');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

add_action('wp_ajax_get_toz_options' , 'toz_get_option');
add_action('wp_ajax_nopriv_get_toz_options' , 'toz_get_option');

function toz_get_option($name = null , $isAjax = true) {
    $options = get_option('toz_options');

    // If options not found.
    if (false === $options) {
        if ($isAjax) {
            echo '0';die();
        }else {
            return false;            
        }
    }

    // isAjax when calling from Angular, so echo output, else return it.
    if ($isAjax) {
        echo json_encode($options); 
        die();
    }else {

        // @name String 
        // Find in @Options for name and return it. 
        if (isset($name)) {
            foreach ($options as $values) {
                if(isset($values->id) && $values->id == $name) {
                    return isset($values->value) ? $values->value : false;        
                }
            }
            
            // default return false; 
            return false;
        }

        return json_encode($options);
    }
    
}

/*
 *  toz_update_option function for updating options in database
 *  @options Array of Objects
 *  @return void
 */
function toz_update_option($options = null) {
	    // if ($optionsValidated = sanitize_options($options) ) {
			$optionsValidated = sanitize_options($options);
	    	update_option('toz_options', $optionsValidated );
        // }
    }


/*
 *  sanitize_options for sanitizing options name as per regular expression rules.
 *  @options Array of Objects
 *  @return Array of Objects Validated or false
 */
function sanitize_options($options = null) {
    //if (!is_null($options)){
        foreach ($options as $key=>$option) {
            // sanitize invalid type.
            if (!isset($option->name) OR trim($option->name) == "") {
                unset($options[$key]);
            }

            if (isset($option->name)) {
                if (! preg_match_all('/^[a-zA-Z0-9\s]*$/', $option->name)) {
                    unset($options[$key]);
                }
            }
        }
        // Using array_values to index array numerically.
        return array_values($options) ;
    //}
    return false; 
}



add_shortcode('toz_option', 'toz_option_shortcode');

/*
 *  toz_option_shortcode for creating shortcode which will render output of given option id
 *  @attrs array
 *  @return string
 */
function toz_option_shortcode($attrs) {
    if (isset($attrs['id'])) {
        return toz_get_option( $attrs['id'] , false);        
    }else {
        return false; 
    }
}

/*
 *  toz_option for rendering output of given option id, name will be neglated
 *  and also it's a wrapper function for toz_option_shortcode.
 *  @name   string
 *  @id     number
 *  @return string
 */
function toz_option($name , $id ){
    return toz_get_option( $id , false);
}



add_action('wp_ajax_save_toz_options' , 'toz_save_option');
add_action('wp_ajax_nopriv_save_toz_options' , 'toz_save_option');
/*
 *  toz_save_option for saving option array of objects to database.
 *  @php://input   array of objects
 *  @return void
 */
function  toz_save_option() {
    
    $postdata = file_get_contents("php://input");
    $data = json_decode($postdata);

    if (isset($data->options)) {
    	$options = json_decode($data->options);
        toz_update_option($options);        
    }

    echo toz_get_option(); 
    die();
}