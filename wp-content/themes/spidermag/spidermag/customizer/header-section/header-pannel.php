<?php   
/**
 * Start of the Header Options
*/
$wp_customize->add_panel('spidermag_header_options', array(
  'capabitity' => 'edit_theme_options',
  'description' => esc_html__('Change the Header Settings from here as you want', 'spidermag'),
  'priority' => 5,
  'title' => esc_html__('Header Settings', 'spidermag')
));

/**
 * Default Customizer Remove Section 
*/
$wp_customize->get_section('background_image' )->priority = 113;

$wp_customize->get_section('title_tagline' )->panel = 'spidermag_header_options';
$wp_customize->get_section('title_tagline' )->priority = 0;

$wp_customize->get_section('colors' )->panel = 'spidermag_header_options';
$wp_customize->get_section('colors' )->priority = 1;
$wp_customize->get_section('header_image' )->panel = 'spidermag_header_options';

/**
 * header breaking news
**/ 
require spidermag_file_directory('spidermag/customizer/header-section/header-breaking.php');

/**
 * header show date and Weather
**/ 
require spidermag_file_directory('spidermag/customizer/header-section/header-utility.php');
