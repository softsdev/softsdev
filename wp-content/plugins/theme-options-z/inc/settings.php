<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

defined('ABSPATH') or die('No script kiddies please!');

require_once 'functions.php';

add_action('admin_menu', 'toz_loadjs_add_page');

function toz_loadjs_add_page() {
    $mypage = add_options_page('Theme Options Z', 'Theme Options Z', 8, 'themeoptionsz', 'toz_loadjs_options_page');
    add_action("admin_print_scripts-$mypage", 'toz_loadjs_admin_head');
}

function toz_loadjs_options_page() {
    include 'admin_html.php';
}

function toz_loadjs_admin_head() {
    wp_enqueue_script('jquery');
    wp_enqueue_script('jquery-ui-core');
    wp_enqueue_script('jquery-ui-sortable');
    wp_enqueue_script('angularjs', TOZ_PLUGIN_URL . '/js/angular.min.js', array('jquery', 'jquery-ui-core' , 'jquery-ui-sortable'));
    wp_enqueue_script('angularjs-sortable', TOZ_PLUGIN_URL . '/js/sortable.js', array('angularjs'));
    wp_enqueue_script('toz-angularjs-app', TOZ_PLUGIN_URL . '/js/app.js', array('angularjs'));
    wp_enqueue_style('toz-stylesheet', TOZ_PLUGIN_URL . '/css/style.css');

    wp_localize_script(
            'toz-angularjs-app', 'tozLocalized', array(
                'templates' => TOZ_PLUGIN_URL . '/templates/',
                'images' => TOZ_PLUGIN_URL . '/images/',
                'ajaxurl' => admin_url('admin-ajax.php')
                    )
    );
    
}
