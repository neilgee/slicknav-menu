<?php     namespace ng_slicknav;

/*
Plugin Name: SlickNav Mobile Menu
Plugin URI: http://wpbeaches.com/using-slick-responsive-menus-genesis-child-theme/
Description: Using SlickNav Responsive Mobile Menus in WordPress
Author: Neil Gee
Version: 1.8.8
Author URI: http://wpbeaches.com
License: GPL-2.0+
License URI: http://www.gnu.org/licenses/gpl-2.0.txt
Text Domain: slicknav-mobile-menu
Domain Path: /languages/
*/


  // If called direct, refuse
  if ( ! defined( 'ABSPATH' ) ) {
          die;
  }


/**
 * Register our text domain.
 */
function load_textdomain() {
  load_plugin_textdomain( 'slicknav-mobile-menu', false, basename( dirname( __FILE__ ) ) . '/languages' );
}
add_action( 'plugins_loaded', __NAMESPACE__ . '\\load_textdomain' );

/*
 * Script-tac-ulous -> All the Scripts and Styles for SlickNav Registered and Enqueued
 */
function scripts_styles() {
  $options = get_option( 'ng_slicknavmenu' );
if ( $options !== false ) {
  wp_register_script( 'slicknavjs' , plugins_url( '/js/jquery.slicknav.min.js',  __FILE__ ), array( 'jquery' ), '1.0.10', false );
 // wp_register_script( 'slicknavjs' , plugins_url( '/js/jquery.slicknav-ng.js',  __FILE__ ), array( 'jquery' ), '1.0.10', false );
  wp_register_script( 'velocityjs' , plugins_url( '/js/velocity.min.js',  __FILE__ ), array( 'jquery' ), '1.0.10', false );
  // wp_register_style( 'slicknavcss' , plugins_url( '/css/slicknav.css',  __FILE__ ), '' , '1.0.10', 'all' );
  wp_register_style( 'slicknavcss' , plugins_url( '/css/slicknav.min.css',  __FILE__ ), '' , '1.0.10', 'all' );
  wp_register_script( 'slicknav-init' , plugins_url( '/js/slick-init.js',  __FILE__ ), array( 'slicknavjs' ), '1.8.0', false );

  wp_enqueue_script( 'slicknavjs' );
  wp_enqueue_style( 'slicknavcss' );

    // Add new plugin options defaults here, set them to blank, this will avoid PHP notices of undefined, if new options are introduced to the plugin and are not saved or udated then the setting will be defined.
    $options_default = array(

        'ng_slicknav_close_click'       => '',
        'ng_slicknav_search_text'       => '',
        'ng_slicknav_alt'               => '',
        'ng_slicknav_brand_text'        => '',
        'ng_slicknav_search'            => '',
        'ng_slicknav_closedsymbol'      => '',
        'ng_slicknav_openedsymbol'      => '',
        'ng_slicknav_fixhead'           => '',
        'ng_slicknav_child_links'       => '',
        'ng_slicknav_parent_links'      => '',
        'ng_slicknav_accordion'         => '',
        'ng_slicknav_animation_library' => '',
        'ng_slicknav_hidedesktop'       => '',
    );

    $options = wp_parse_args( $options, $options_default );

        // Enqueue Dashicons only if Search option is ticked
        if( (bool) $options['ng_slicknav_search'] == true ) {
                wp_enqueue_style( 'dashicons' );
        }
        // Enqueue Velocity library only if selected
        if( esc_html( $options['ng_slicknav_animation_library'] == 'velocity' )) {
                wp_enqueue_script( 'velocityjs' );
        }


   $data = array (

      'ng_slicknav' => array(
          'ng_slicknav_menu'              => esc_html( $options['ng_slicknav_menu'] ),
          'ng_slicknav_position'          => esc_html( $options['ng_slicknav_position'] ),
          'ng_slicknav_parent_links'      => (bool)$options['ng_slicknav_parent_links'],
          'ng_slicknav_close_click'       => (bool)$options['ng_slicknav_close_click'],
          'ng_slicknav_child_links'       => (bool) $options['ng_slicknav_child_links'],
          'ng_slicknav_speed'             => (int)$options['ng_slicknav_speed'],
          'ng_slicknav_label'             => esc_html( $options['ng_slicknav_label'] ),
          'ng_slicknav_fixhead'           => (bool) $options['ng_slicknav_fixhead'],
          'ng_slicknav_hidedesktop'       => esc_html( $options['ng_slicknav_hidedesktop']),
          'ng_slicknav_brand'             => esc_html( $options['ng_slicknav_brand'] ),
          'ng_slicknav_brand_text'        => $options['ng_slicknav_brand_text'],
          'ng_slicknav_search'            => (bool) $options['ng_slicknav_search'],
          'ng_slicknav_search_text'       => esc_html( $options['ng_slicknav_search_text'] ),
          'ng_slicksearch'                => home_url( '/' ),
          'ng_slicknav_closedsymbol'      => esc_html( $options['ng_slicknav_closedsymbol'] ),
          'ng_slicknav_openedsymbol'      => esc_html( $options['ng_slicknav_openedsymbol'] ),
          'ng_slicknav_alt'               => esc_html( $options['ng_slicknav_alt'] ),
          'ng_slicknav_accordion'         => (bool)$options['ng_slicknav_accordion'],
          'ng_slicknav_animation_library' => esc_html( $options['ng_slicknav_animation_library'] ),


      ),

  );
    //add filter
    $data = apply_filters( 'ng_slicknav_slickNavVars', $data );

    // Pass PHP variables to jQuery script
    wp_localize_script( 'slicknav-init', 'slickNavVars', $data );

    wp_enqueue_script( 'slicknav-init' );
  }
}

add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\\scripts_styles' );


// Get the inline CSS
require_once plugin_dir_path( __FILE__ ) . 'inc/inlinecss.php';

/*
 * Use the add options_page function
 * add_options_page( $page_title, $menu_title, $capability, $menu-slug, $function )
 */
function slicknav_menu() {

     add_options_page(
        __( 'SlickNav Options Plugin','slicknav-mobile-menu' ), //$page_title
        __( 'SlickNav Menu', 'slicknav-mobile-menu' ), //$menu_title
        'manage_options', //$capability
        'wpslicknav-menu', //$menu-slug
        __NAMESPACE__ . '\\menu_options_page' //$function
      );
}
add_action( 'admin_menu', __NAMESPACE__ . '\\slicknav_menu' );


/*
 * Add menu options pages
 *
 */
function menu_options_page() {

  if( !current_user_can( 'manage_options' ) ) {

    wp_die( "Hall and Oates 'Say No Go'" );
  }
  require( 'inc/options-page-wrapper.php' );
}


/**
 * Register our option fields
 *
 * @since 1.0.0
 */
function plugin_settings() {
  register_setting(
      'ng_settings_groups_zz', //option name
      'ng_slicknavmenu',// option group setting name and option name
      __NAMESPACE__ . '\\slicknav_validate_input' //sanitize the inputs
  );
  add_settings_section(
      'ng_slicknav_section', //declare the section id
      '', //page title
       __NAMESPACE__ . '\\ng_slicknav_section_callback', //callback function below
      'wpslicknav-menu' //page that it appears on
  );
  add_settings_field(
      'ng_slicknav_menu', //unique id of field
      'Add Menu to Replace', //title
       __NAMESPACE__ . '\\ng_slicknav_menu_callback', //callback function below
      'wpslicknav-menu', //page that it appears on
      'ng_slicknav_section' //settings section declared in add_settings_section
  );
  add_settings_field(
      'ng_slicknav_width', //unique id of field
      'Pixel Width to Switch to SlickNav', //title
       __NAMESPACE__ . '\\ng_slicknav_width_callback', //callback function below
      'wpslicknav-menu', //page that it appears on
      'ng_slicknav_section' //settings section declared in add_settings_section
  );
  add_settings_field(
    'ng_slicknav_hidedesktop',
    'Display Desktop Menu, leave at block, unless you are displaying it differently',
     __NAMESPACE__ . '\\ng_slicknav_hidedesktop_callback',
    'wpslicknav-menu',
    'ng_slicknav_section'
);
  add_settings_field(
      'ng_slicknav_fixhead',
      'Fix Menu to Head',
       __NAMESPACE__ . '\\ng_slicknav_fixhead_callback',
      'wpslicknav-menu',
      'ng_slicknav_section'
  );
  add_settings_field(
      'ng_slicknav_header',
      'Hide Main Header	',
       __NAMESPACE__ . '\\ng_slicknav_header_callback',
      'wpslicknav-menu',
      'ng_slicknav_section'
  );
  add_settings_field(
      'ng_slicknav_brand',
      'Image Logo - Enter a URL or upload an image for a logo, smaller is better here, like 45px in depth and up to 200px in width, default position is left, to swap to right change Menu Button Position (above) to left	',
       __NAMESPACE__ . '\\ng_slicknav_brand_callback',
      'wpslicknav-menu',
      'ng_slicknav_section'
  );
  add_settings_field(
      'ng_slicknav_alt',
      'Logo Alt Text	',
       __NAMESPACE__ . '\\ng_slicknav_alt_callback',
      'wpslicknav-menu',
      'ng_slicknav_section'
  );
  add_settings_field(
      'ng_slicknav_brand_text',
      'Text Logo - Enter text for Logo',
       __NAMESPACE__ . '\\ng_slicknav_brand_text_callback',
      'wpslicknav-menu',
      'ng_slicknav_section'
  );
  add_settings_field(
      'ng_slicknav_brand_text_color',
      'Text Logo Color',
       __NAMESPACE__ . '\\ng_slicknav_brand_text_color_callback',
      'wpslicknav-menu',
      'ng_slicknav_section'
  );
  add_settings_field(
      'ng_slicknav_button_position',
      'Menu Button Position',
       __NAMESPACE__ . '\\ng_slicknav_button_position_callback',
      'wpslicknav-menu',
      'ng_slicknav_section'
  );
  add_settings_field(
      'ng_slicknav_submenu_position',
      'SubMenu Indicator Position',
       __NAMESPACE__ . '\\ng_slicknav_submenu_position_callback',
      'wpslicknav-menu',
      'ng_slicknav_section'
  );
  add_settings_field(
      'ng_slicknav_background', //unique id of field
      'Menu Background Color', //title
       __NAMESPACE__ . '\\ng_slicknav_background_callback', //callback function below
      'wpslicknav-menu', //page that it appears on
      'ng_slicknav_section' //settings section declared in add_settings_section
  );
  add_settings_field(
      'ng_slicknav_button', //unique id of field
      'Menu Button Color', //title
       __NAMESPACE__ . '\\ng_slicknav_button_callback', //callback function below
      'wpslicknav-menu', //page that it appears on
      'ng_slicknav_section' //settings section declared in add_settings_section
  );
  add_settings_field(
      'ng_slicknav_button_expand', //unique id of field
      'Menu Button Color when Menu expanded', //title
       __NAMESPACE__ . '\\ng_slicknav_button_expand_callback', //callback function below
      'wpslicknav-menu', //page that it appears on
      'ng_slicknav_section' //settings section declared in add_settings_section
  );
  add_settings_field(
      'ng_slicknav_label_color',
      'Label Color',
       __NAMESPACE__ . '\\ng_slicknav_label_color_callback',
      'wpslicknav-menu',
      'ng_slicknav_section'
  );
  add_settings_field(
      'ng_slicknav_icon_color',
      'Hamburger Icon Color',
       __NAMESPACE__ . '\\ng_slicknav_icon_color_callback',
      'wpslicknav-menu',
      'ng_slicknav_section'
  );
  add_settings_field(
      'ng_slicknav_label_shadow',
      'Label Shadow',
       __NAMESPACE__ . '\\ng_slicknav_label_shadow_callback',
      'wpslicknav-menu',
      'ng_slicknav_section'
  );
  add_settings_field(
      'ng_slicknav_icon_shadow',
      'Icon Shadow',
       __NAMESPACE__ . '\\ng_slicknav_icon_shadow_callback',
      'wpslicknav-menu',
      'ng_slicknav_section'
  );
  add_settings_field(
      'ng_slicknav_link_color',
      'Link Color',
       __NAMESPACE__ . '\\ng_slicknav_link_color_callback',
      'wpslicknav-menu',
      'ng_slicknav_section'
  );
  add_settings_field(
      'ng_slicknav_link_hover_color',
      'Link Hover Color',
       __NAMESPACE__ . '\\ng_slicknav_link_hover_color_callback',
      'wpslicknav-menu',
      'ng_slicknav_section'
  );
  add_settings_field(
      'ng_slicknav_link_hover_background_color',
      'Link Hover Background Color',
       __NAMESPACE__ . '\\ng_slicknav_link_hover_background_color_callback',
      'wpslicknav-menu',
      'ng_slicknav_section'
  );
  add_settings_field(
      'ng_slicknav_search',
      'Show search field at bottom of Menu',
       __NAMESPACE__ . '\\ng_slicknav_search_callback',
      'wpslicknav-menu',
      'ng_slicknav_section'
  );
  add_settings_field(
      'ng_slicknav_search_text',
      'Search Label Name',
       __NAMESPACE__ . '\\ng_slicknav_search_text_callback',
      'wpslicknav-menu',
      'ng_slicknav_section'
  );
  add_settings_field(
      'ng_slicknav_search_icon_color',
      'Search Icon Color',
       __NAMESPACE__ . '\\ng_slicknav_search_icon_color_callback',
      'wpslicknav-menu',
      'ng_slicknav_section'
  );
  add_settings_field(
      'ng_slicknav_search_color',
      'Search Icon Background Color',
       __NAMESPACE__ . '\\ng_slicknav_search_color_callback',
      'wpslicknav-menu',
      'ng_slicknav_section'
  );
  add_settings_field(
      'ng_slicknav_font',
      'Font Size',
       __NAMESPACE__ . '\\ng_slicknav_font_callback',
      'wpslicknav-menu',
      'ng_slicknav_section'
  );
  add_settings_field(
      'ng_slicknav_label_size',
      'Label Font Size',
       __NAMESPACE__ . '\\ng_slicknav_label_size_callback',
      'wpslicknav-menu',
      'ng_slicknav_section'
  );
  add_settings_field(
      'ng_slicknav_label_weight',
      'Label Weight',
       __NAMESPACE__ . '\\ng_slicknav_label_weight_callback',
      'wpslicknav-menu',
      'ng_slicknav_section'
  );
  add_settings_field(
      'ng_slicknav_font_case',
      'Font Case',
       __NAMESPACE__ . '\\ng_slicknav_font_case_callback',
      'wpslicknav-menu',
      'ng_slicknav_section'
  );
  add_settings_field(
      'ng_slicknav_position',
      'Menu Position',
       __NAMESPACE__ . '\\ng_slicknav_position_callback',
      'wpslicknav-menu',
      'ng_slicknav_section'
  );
  add_settings_field(
      'ng_slicknav_label',
      'Menu Label Name',
       __NAMESPACE__ . '\\ng_slicknav_label_callback',
      'wpslicknav-menu',
      'ng_slicknav_section'
  );
  add_settings_field(
      'ng_slicknav_close_click',
      'Close Menu on Click	',
       __NAMESPACE__ . '\\ng_slicknav_close_click_callback',
      'wpslicknav-menu',
      'ng_slicknav_section'
  );
  add_settings_field(
      'ng_slicknav_parent_links',
      'Allow Parent Links',
       __NAMESPACE__ . '\\ng_slicknav_parent_links_callback',
      'wpslicknav-menu',
      'ng_slicknav_section'
  );
  add_settings_field(
      'ng_slicknav_child_links',
      'Show Child Links on Open',
       __NAMESPACE__ . '\\ng_slicknav_child_links_callback',
      'wpslicknav-menu',
      'ng_slicknav_section'
  );
  add_settings_field(
      'ng_slicknav_accordion',
      'Toggle Submenus',
       __NAMESPACE__ . '\\ng_slicknav_accordion_callback',
      'wpslicknav-menu',
      'ng_slicknav_section'
  );
  add_settings_field(
      'ng_slicknav_speed',
      'Speed of Menu open/close (Higher numbers are slower)',
       __NAMESPACE__ . '\\ng_slicknav_speed_callback',
      'wpslicknav-menu',
      'ng_slicknav_section'
  );
  add_settings_field(
      'ng_slicknav_animation_library',
      'Animation Library',
       __NAMESPACE__ . '\\ng_slicknav_animation_library_callback',
      'wpslicknav-menu',
      'ng_slicknav_section'
  );
  add_settings_field(
      'ng_slicknav_closedsymbol',
      'Closed Symbol, default &#9658;',
       __NAMESPACE__ . '\\ng_slicknav_closedsymbol_callback',
      'wpslicknav-menu',
      'ng_slicknav_section'
  );
  add_settings_field(
      'ng_slicknav_openedsymbol',
      'Opened Symbol, default &#9660;',
       __NAMESPACE__ . '\\ng_slicknav_openedsymbol_callback',
      'wpslicknav-menu',
      'ng_slicknav_section'
  );

}
add_action('admin_init', __NAMESPACE__ . '\\plugin_settings');



/**
 * Sanitize our inputs
 *
 * @since 1.8.0
 */

function slicknav_validate_input( $input ) {
   // Create our array for storing the validated options
    $output = array();

    // Loop through each of the incoming options
    foreach( $input as $key => $value ) {
    	if( isset( $input['ng_slicknav_brand_text'] ) ) {

            // Keep HTML in this field
           $output['ng_slicknav_brand_text'] = wp_kses_post($input['ng_slicknav_brand_text']);
			//$output['ng_menu_html_carat'] = wp_filter_post_kses( wp_slash( $input['ng_menu_html_carat'] ) ); // wp_filter_post_kses() expects slashed

        } // end if

        // Check to see if the current option has a value. If so, process it.
        if( isset( $input[$key] ) ) {

            // Strip all HTML and PHP tags and properly handle quoted strings
            $output[$key] = strip_tags( stripslashes( $input[ $key ] ) );

        } // end if


    } // end foreach

    // Return the array processing any additional functions filtered by this action
    return apply_filters( 'slicknav_validate_input' , $output, $input );
}


/**
 * Register our section call back
 * (not much happening here)
 * @since 1.0.0
 */

function ng_slicknav_section_callback() {

}

/**
 * Main input field for menu selection to SlickNav
 *
 * @since 1.8.0
 */

function ng_slicknav_menu_callback() {
$options = get_option( 'ng_slicknavmenu' );

if( !isset( $options['ng_slicknav_menu'] ) ) $options['ng_slicknav_menu'] = '';
echo '<input type="text" id="ng_slicknav_menu" name="ng_slicknavmenu[ng_slicknav_menu]" value="' . sanitize_text_field($options['ng_slicknav_menu']) . '" placeholder="Add menus here..." class="large-text" />';
echo '<span class="description">' . __( 'Add the Menu CSS Class or ID to be used as SickNav Menu, comma separate multiple menus','slicknav-mobile-menu') . '</span>';
}

/**
 * Main input field for width selection change menu to SlickNav
 *
 * @since 1.8.0
 */
function ng_slicknav_width_callback() {
$options = get_option( 'ng_slicknavmenu' );

if( !isset( $options['ng_slicknav_width'] ) ) $options['ng_slicknav_width'] = 600;
echo '<input type="number" class="regular-text" name="ng_slicknavmenu[ng_slicknav_width]" value="' . sanitize_text_field($options['ng_slicknav_width']) . '"/>';
}

/**
 * Main font size
 *
 * @since 1.8.0
 */
function ng_slicknav_font_callback() {
$options = get_option( 'ng_slicknavmenu' );

if( !isset( $options['ng_slicknav_font'] ) ) $options['ng_slicknav_font'] = 16;
echo '<input type="number" class="regular-text" name="ng_slicknavmenu[ng_slicknav_font]" value="' . sanitize_text_field($options['ng_slicknav_font']) . '"/>';
}

/**
 * Main label font size
 *
 * @since 1.8.0
 */
function ng_slicknav_label_size_callback() {
$options = get_option( 'ng_slicknavmenu' );

if( !isset( $options['ng_slicknav_label_size'] ) ) $options['ng_slicknav_label_size'] = 16;
echo '<input type="number" class="regular-text" name="ng_slicknavmenu[ng_slicknav_label_size]" value="' . sanitize_text_field($options['ng_slicknav_label_size']) . '"/>';
}

/**
 * Menu backgroud color
 *
 * @since 1.8.0
 */
function ng_slicknav_background_callback(){
$options = get_option( 'ng_slicknavmenu' );

if( !isset( $options['ng_slicknav_background'] ) ) $options['ng_slicknav_background'] = '#4c4c4c';
echo '<input type="text" class="color-picker" data-alpha="true" data-default-color="#4c4c4c" name="ng_slicknavmenu[ng_slicknav_background]" value="' . sanitize_text_field($options['ng_slicknav_background']) . '"/>';
}

/**
 * Menu button color
 *
 * @since 1.8.0
 */
function ng_slicknav_button_callback(){
$options = get_option( 'ng_slicknavmenu' );

if( !isset( $options['ng_slicknav_button'] ) ) $options['ng_slicknav_button'] = '#222222';
echo '<input type="text" class="color-picker" data-alpha="true" data-default-color="#222" name="ng_slicknavmenu[ng_slicknav_button]" value="' . sanitize_text_field($options['ng_slicknav_button']) . '"/>';
}

/**
 * Logo Text Color
 *
 * @since 1.8.0
 */
function ng_slicknav_brand_text_color_callback(){
$options = get_option( 'ng_slicknavmenu' );

if( !isset( $options['ng_slicknav_brand_text_color'] ) ) $options['ng_slicknav_brand_text_color'] = '#222222';
echo '<input type="text" class="color-picker" data-alpha="true" data-default-color="#222" name="ng_slicknavmenu[ng_slicknav_brand_text_color]" value="' . sanitize_text_field($options['ng_slicknav_brand_text_color']) . '"/>';
}



/**
 * Menu button expand color
 *
 * @since 1.8.0
 */
function ng_slicknav_button_expand_callback(){
$options = get_option( 'ng_slicknavmenu' );

if( !isset( $options['ng_slicknav_button_expand'] ) ) $options['ng_slicknav_button_expand'] = '#222222';
echo '<input type="text" class="color-picker" data-alpha="true" data-default-color="#222222" name="ng_slicknavmenu[ng_slicknav_button_expand]" value="' . sanitize_text_field($options['ng_slicknav_button_expand']) . '"/>';
}

/**
 * Label color
 *
 * @since 1.8.0
 */
function ng_slicknav_label_color_callback(){
$options = get_option( 'ng_slicknavmenu' );

if( !isset( $options['ng_slicknav_label_color'] ) ) $options['ng_slicknav_label_color'] = '#fff';
echo '<input type="text" class="color-picker" data-alpha="true" data-default-color="#fff" name="ng_slicknavmenu[ng_slicknav_label_color]" value="' . sanitize_text_field($options['ng_slicknav_label_color']) . '"/>';
}

/**
 * Icon color
 *
 * @since 1.8.0
 */
function ng_slicknav_icon_color_callback(){
$options = get_option( 'ng_slicknavmenu' );

if( !isset( $options['ng_slicknav_icon_color'] ) ) $options['ng_slicknav_icon_color'] = '#fff';
echo '<input type="text" class="color-picker" data-alpha="true" data-default-color="#fff" name="ng_slicknavmenu[ng_slicknav_icon_color]" value="' . sanitize_text_field($options['ng_slicknav_icon_color']) . '"/>';
}

/**
 * Link color
 *
 * @since 1.8.0
 */
function ng_slicknav_link_color_callback(){
$options = get_option( 'ng_slicknavmenu' );

if( !isset( $options['ng_slicknav_link_color'] ) ) $options['ng_slicknav_link_color'] = '#fff';
echo '<input type="text" class="color-picker" data-alpha="true" data-default-color="rgba(0,0,0,0.85)" name="ng_slicknavmenu[ng_slicknav_link_color]" value="' . sanitize_text_field($options['ng_slicknav_link_color']) . '"/>';
}

/**
 * Link hover color
 *
 * @since 1.8.0
 */
function ng_slicknav_link_hover_color_callback(){
$options = get_option( 'ng_slicknavmenu' );

if( !isset( $options['ng_slicknav_link_hover_color'] ) ) $options['ng_slicknav_link_hover_color'] = '#222222';
echo '<input type="text" class="color-picker" data-alpha="true" data-default-color="#222222" name="ng_slicknavmenu[ng_slicknav_link_hover_color]" value="' . sanitize_text_field($options['ng_slicknav_link_hover_color']) . '"/>';
}

/**
 * Link background hover color
 *
 * @since 1.8.0
 */
function ng_slicknav_link_hover_background_color_callback(){
$options = get_option( 'ng_slicknavmenu' );

if( !isset( $options['ng_slicknav_link_hover_background_color'] ) ) $options['ng_slicknav_link_hover_background_color'] = 'rgba(204,204,204,0.3)';
echo '<input type="text" class="color-picker" data-alpha="true" data-default-color="rgba(204,204,204,0.3)" name="ng_slicknavmenu[ng_slicknav_link_hover_background_color]" value="' . sanitize_text_field($options['ng_slicknav_link_hover_background_color']) . '"/>';
}

/**
 * Show Search Field
 *
 * @since 1.8.0
 */
function ng_slicknav_search_callback(){
$options = get_option( 'ng_slicknavmenu' );
if( !isset( $options['ng_slicknav_search'] ) ) $options['ng_slicknav_search'] = '';

?>
  <fieldset>
  	<label for="ng_slicknav_search">
  		<input name="ng_slicknavmenu[ng_slicknav_search]" type="checkbox" id="ng_slicknav_search" value="1"<?php checked( 1, $options['ng_slicknav_search'], true ); ?> />
  		<span class="description"><?php esc_attr_e( 'Show Search Field', 'slicknav-mobile-menu' ); ?></span>
  	</label>
  </fieldset>
<?php
}

/**
 * Search Text
 *
 * @since 1.8.0
 */

function ng_slicknav_search_text_callback() {
$options = get_option( 'ng_slicknavmenu' );

if( !isset( $options['ng_slicknav_search_text'] ) ) $options['ng_slicknav_search_text'] = 'search...';
echo '<input type="text" id="ng_slicknav_search_text" name="ng_slicknavmenu[ng_slicknav_search_text]" value="' . sanitize_text_field($options['ng_slicknav_search_text']) . '" placeholder="search..." class="medium-text" />';
}


/**
 * Search icon color
 *
 * @since 1.8.0
 */
function ng_slicknav_search_icon_color_callback(){
$options = get_option( 'ng_slicknavmenu' );

if( !isset( $options['ng_slicknav_search_icon_color'] ) ) $options['ng_slicknav_search_icon_color'] = '#fff';
echo '<input type="text" class="color-picker" data-alpha="true" data-default-color="#fff" name="ng_slicknavmenu[ng_slicknav_search_icon_color]" value="' . sanitize_text_field($options['ng_slicknav_search_icon_color']) . '"/>';
}

/**
 * Search icon color background
 *
 * @since 1.8.0
 */
function ng_slicknav_search_color_callback(){
$options = get_option( 'ng_slicknavmenu' );

if( !isset( $options['ng_slicknav_search_color'] ) ) $options['ng_slicknav_search_color'] = '#222222';
echo '<input type="text" class="color-picker" data-alpha="true" data-default-color="#222222" name="ng_slicknavmenu[ng_slicknav_search_color]" value="' . sanitize_text_field($options['ng_slicknav_search_color']) . '"/>';
}

/**
 * Label Shadow
 *
 * @since 1.8.0
 */
function ng_slicknav_label_shadow_callback(){
$options = get_option( 'ng_slicknavmenu' );
if( !isset( $options['ng_slicknav_label_shadow'] ) ) $options['ng_slicknav_label_shadow'] = '';

?>
  <fieldset>
  	<label for="ng_slicknav_label_shadow">
  		<input name="ng_slicknavmenu[ng_slicknav_label_shadow]" type="checkbox" id="ng_slicknav_label_shadow" value="1"<?php checked( 1, $options['ng_slicknav_label_shadow'], true ); ?> />
  		<span class="description"><?php esc_attr_e( 'Add label shadow', 'slicknav-mobile-menu' ); ?></span>
  	</label>
  </fieldset>
<?php
}

/**
 * Icon shadow
 *
 * @since 1.8.0
 */
function ng_slicknav_icon_shadow_callback(){
$options = get_option( 'ng_slicknavmenu' );
if( !isset( $options['ng_slicknav_icon_shadow'] ) ) $options['ng_slicknav_icon_shadow'] = '';

?>
  <fieldset>
  	<label for="ng_slicknav_icon_shadow">
  		<input name="ng_slicknavmenu[ng_slicknav_icon_shadow]" type="checkbox" id="ng_slicknav_icon_shadow" value="1"<?php checked( 1, $options['ng_slicknav_icon_shadow'], true ); ?> />
  		<span class="description"><?php esc_attr_e( 'Add icon shadow', 'slicknav-mobile-menu' ); ?></span>
  	</label>
  </fieldset>
<?php
}

/**
 * Menu Position
 *
 * @since 1.8.0
 */
function ng_slicknav_button_position_callback() {
  $options = get_option( 'ng_slicknavmenu' );

if( !isset( $options['ng_slicknav_button_position'] ) ) $options['ng_slicknav_button_position'] = 'right';

?>
<fieldset>
	<label title='g:i a'>
		<input type="radio" name="ng_slicknavmenu[ng_slicknav_button_position]" value="flex-end"<?php checked( 'flex-end', $options['ng_slicknav_button_position'], true ); ?> />
		<span><?php esc_attr_e( 'Right', 'slicknav-mobile-menu' ); ?></span>
	</label><br>
        <label title='g:i a'>
                <input type="radio" name="ng_slicknavmenu[ng_slicknav_button_position]" value="center"<?php checked( 'center', $options['ng_slicknav_button_position'], true ); ?> />
                <span><?php esc_attr_e( 'Center', 'slicknav-mobile-menu' ); ?></span>
        </label><br>

        <label title='g:i a'>
		<input type="radio" name="ng_slicknavmenu[ng_slicknav_button_position]" value="flex-start"<?php checked( 'flex-start', $options['ng_slicknav_button_position'], true ); ?> />
		<span><?php esc_attr_e( 'Left', 'slicknav-mobile-menu' ); ?></span>
	</label>
</fieldset>
<?php
}

/**
 * Menu Position
 *
 * @since 1.8.0
 */
function ng_slicknav_submenu_position_callback() {
  $options = get_option( 'ng_slicknavmenu' );

if( !isset( $options['ng_slicknav_submenu_position'] ) ) $options['ng_slicknav_submenu_position'] = 'right';

?>
<fieldset>
	<label title='g:i a'>
		<input type="radio" name="ng_slicknavmenu[ng_slicknav_submenu_position]" value="right"<?php checked( 'right', $options['ng_slicknav_submenu_position'], true ); ?> />
		<span><?php esc_attr_e( 'Right', 'slicknav-mobile-menu' ); ?></span>
	</label><br>
        <label title='g:i a'>
		<input type="radio" name="ng_slicknavmenu[ng_slicknav_submenu_position]" value="none"<?php checked( 'none', $options['ng_slicknav_submenu_position'], true ); ?> />
		<span><?php esc_attr_e( 'Left', 'slicknav-mobile-menu' ); ?></span>
	</label>
</fieldset>
<?php
}

/**
 * Menu Label Weight
 *
 * @since 1.8.0
 */
function ng_slicknav_label_weight_callback() {
  $options = get_option( 'ng_slicknavmenu' );

if( !isset( $options['ng_slicknav_label_weight'] ) ) $options['ng_slicknav_label_weight'] = 'normal';

?>
<select name="ng_slicknavmenu[ng_slicknav_label_weight]" id="ng_slicknav_label_weight">
	<option value="normal"<?php selected($options['ng_slicknav_label_weight'], 'normal'); ?> >Normal</option>
	<option value="bold"<?php selected ($options['ng_slicknav_label_weight'], 'bold'); ?> >Bold</option>
</select>
<?php
}

/**
 * Font Case
 *
 * @since 1.8.0
 */
function ng_slicknav_font_case_callback() {
  $options = get_option( 'ng_slicknavmenu' );

if( !isset( $options['ng_slicknav_font_case'] ) ) $options['ng_slicknav_font_case'] = 'none';

?>
<select name="ng_slicknavmenu[ng_slicknav_font_case]" id="ng_slicknav_font_case">
	<option value="none"<?php selected($options['ng_slicknav_font_case'], 'none'); ?> >None</option>
	<option value="capitalize"<?php selected ($options['ng_slicknav_font_case'], 'capitalize'); ?> >Capitalize</option>
  <option value="lowercase"<?php selected ($options['ng_slicknav_font_case'], 'lowercase'); ?> >Lowercase</option>
  <option value="uppercase"<?php selected ($options['ng_slicknav_font_case'], 'uppercase'); ?> >Uppercase</option>
</select>
<?php
}

/**
 * Menu position
 *
 * @since 1.8.0
 */

function ng_slicknav_position_callback() {
$options = get_option( 'ng_slicknavmenu' );

if( !isset( $options['ng_slicknav_position'] ) ) $options['ng_slicknav_position'] = 'body';
echo '<input type="text" id="ng_slicknav_position" name="ng_slicknavmenu[ng_slicknav_position]" value="' . sanitize_text_field($options['ng_slicknav_position']) . '" placeholder="body" class="medium-text" />';
echo '<span class="description">' . __( 'Menu Position (body by default, using body puts the Menu at the top.
However you can adjust this location by adding in a CSS class','slicknav-mobile-menu') . '</span>';
}

/**
 * Menu position
 *
 * @since 1.8.0
 */

function ng_slicknav_label_callback() {
$options = get_option( 'ng_slicknavmenu' );

if( !isset( $options['ng_slicknav_label'] ) ) $options['ng_slicknav_label'] = 'MENU';
echo '<input type="text" id="ng_slicknav_label" name="ng_slicknavmenu[ng_slicknav_label]" value="' . sanitize_text_field($options['ng_slicknav_label']) . '" placeholder="MENU" class="medium-text" />';
echo '<span class="description">' . __( 'Menu Label ("MENU" by default, leave blank for no label and just the symbol)') . '</span>';
}

/**
 * Close on click option
 *
 * @since 1.8.0
 */
function ng_slicknav_close_click_callback(){
$options = get_option( 'ng_slicknavmenu' );
if( !isset( $options['ng_slicknav_close_click'] ) ) $options['ng_slicknav_close_click'] = '';

?>
  <fieldset>
  	<label for="ng_slicknav_close_click">
  		<input name="ng_slicknavmenu[ng_slicknav_close_click]" type="checkbox" id="ng_slicknav_close_click" value="1"<?php checked( 1, $options['ng_slicknav_close_click'], true ); ?> />
  		<span class="description"><?php esc_attr_e( 'Close menu on click', 'slicknav-mobile-menu' ); ?></span>
  	</label>
  </fieldset>
<?php
}

/**
 * Allow parent links
 *
 * @since 1.8.0
 */
function ng_slicknav_parent_links_callback(){
$options = get_option( 'ng_slicknavmenu' );
if( !isset( $options['ng_slicknav_parent_links'] ) ) $options['ng_slicknav_parent_links'] = '';

?>
  <fieldset>
  	<label for="ng_slicknav_parent_links">
  		<input name="ng_slicknavmenu[ng_slicknav_parent_links]" type="checkbox" id="ng_slicknav_parent_links" value="1"<?php checked( 1, $options['ng_slicknav_parent_links'], true ); ?> />
  		<span class="description"><?php esc_attr_e( 'Allow Parent Links', 'slicknav-mobile-menu' ); ?></span>
  	</label>
  </fieldset>
<?php
}

/**
 * Show Child Links on Open
 *
 * @since 1.8.0
 */
function ng_slicknav_child_links_callback(){
$options = get_option( 'ng_slicknavmenu' );
if( !isset( $options['ng_slicknav_child_links'] ) ) $options['ng_slicknav_child_links'] = '';

?>
  <fieldset>
  	<label for="ng_slicknav_child_links">
  		<input name="ng_slicknavmenu[ng_slicknav_child_links]" type="checkbox" id="ng_slicknav_child_links" value="1"<?php checked( 1, $options['ng_slicknav_child_links'], true ); ?> />
  		<span class="description"><?php esc_attr_e( 'Show Child Links on Open', 'slicknav-mobile-menu' ); ?></span>
  	</label>
  </fieldset>
<?php
}

/**
 * Toggle One SubMenu at a time
 *
 * @since 1.8.0
 */
function ng_slicknav_accordion_callback(){
$options = get_option( 'ng_slicknavmenu' );
if( !isset( $options['ng_slicknav_accordion'] ) ) $options['ng_slicknav_accordion'] = '';

?>
  <fieldset>
  	<label for="ng_slicknav_accordion">
  		<input name="ng_slicknavmenu[ng_slicknav_accordion]" type="checkbox" id="ng_slicknav_accordion" value="1"<?php checked( 1, $options['ng_slicknav_accordion'], true ); ?> />
  		<span class="description"><?php esc_attr_e( 'Toggle sub menus so only one is open at a time', 'slicknav-mobile-menu' ); ?></span>
  	</label>
  </fieldset>
<?php
}

/**
 * Hide Menu on Desktop
 *
 * @since 1.8.0
 */
 function ng_slicknav_hidedesktop_callback(){
    $options = get_option( 'ng_slicknavmenu' );
    if( !isset( $options['ng_slicknav_hidedesktop'] ) ) $options['ng_slicknav_hidedesktop'] = 'block';
    
    ?>
    <select name="ng_slicknavmenu[ng_slicknav_hidedesktop]" id="ng_slicknav_hidedesktop">
        <option value="block"<?php selected($options['ng_slicknav_hidedesktop'], 'block'); ?> >block</option>
        <option value="inline-block"<?php selected($options['ng_slicknav_hidedesktop'], 'inline-block'); ?> >inline-block</option>
        <option value="inline"<?php selected ($options['ng_slicknav_hidedesktop'], 'inline'); ?> >inline</option>
        <option value="flex"<?php selected ($options['ng_slicknav_hidedesktop'], 'flex'); ?> >flex</option>
        <option value="none"<?php selected ($options['ng_slicknav_hidedesktop'], 'none'); ?> >none</option>
    </select>

    <?php
    }


/**
 * Fix menu to head
 *
 * @since 1.8.0
 */
function ng_slicknav_fixhead_callback(){
$options = get_option( 'ng_slicknavmenu' );
if( !isset( $options['ng_slicknav_fixhead'] ) ) $options['ng_slicknav_fixhead'] = '';

?>
  <fieldset>
  	<label for="ng_slicknav_fixhead">
  		<input name="ng_slicknavmenu[ng_slicknav_fixhead]" type="checkbox" id="ng_slicknav_fixhead" value="1"<?php checked( 1, $options['ng_slicknav_fixhead'], true ); ?> />
  		<span class="description"><?php esc_attr_e( 'Fix menu to head', 'slicknav-mobile-menu' ); ?></span>
  	</label>
  </fieldset>
<?php
}

/**
 * Hide main header at mobile size
 *
 * @since 1.8.0
 */
function ng_slicknav_header_callback(){
$options = get_option( 'ng_slicknavmenu' );
if( !isset( $options['ng_slicknav_header'] ) ) $options['ng_slicknav_header'] = '';

?>
  <fieldset>
  	<label for="ng_slicknav_header">
  		<input name="ng_slicknavmenu[ng_slicknav_header]" type="checkbox" id="ng_slicknav_header" value="1"<?php checked( 1, $options['ng_slicknav_header'], true ); ?> />
  		<span class="description"><?php esc_attr_e( 'Hide Main Header in Mobile View', 'slicknav-mobile-menu' ); ?></span>
  	</label>
  </fieldset>
<?php
}

/**
 * Menu Speed
 *
 * @since 1.8.0
 */
function ng_slicknav_speed_callback() {
  $options = get_option( 'ng_slicknavmenu' );

if( !isset( $options['ng_slicknav_speed'] ) ) $options['ng_slicknav_speed'] = '400';

?>
<select name="ng_slicknavmenu[ng_slicknav_speed]" id="ng_slicknav_speed">
	<option value="200"<?php selected($options['ng_slicknav_speed'], '200'); ?> >200</option>
	<option value="400"<?php selected ($options['ng_slicknav_speed'], '400'); ?> >400</option>
  <option value="600"<?php selected ($options['ng_slicknav_speed'], '600'); ?> >600</option>
  <option value="800"<?php selected ($options['ng_slicknav_speed'], '800'); ?> >800</option>
  <option value="1000"<?php selected ($options['ng_slicknav_speed'], '1000'); ?> >1000</option>
  <option value="1200"<?php selected ($options['ng_slicknav_speed'], '1200'); ?> >1200</option>

</select>
<?php
}


/**
 * Animation Library
 *
 * @since 1.8.1
 */
function ng_slicknav_animation_library_callback() {
  $options = get_option( 'ng_slicknavmenu' );

if( !isset( $options['ng_slicknav_animation_library'] ) ) $options['ng_slicknav_animation_library'] = 'jquery';

?>
<select name="ng_slicknavmenu[ng_slicknav_animation_library]" id="ng_slicknav_animation_library">
	<option value="jquery"<?php selected($options['ng_slicknav_animation_library'], 'jquery'); ?> >jquery</option>
	<option value="velocity"<?php selected ($options['ng_slicknav_animation_library'], 'velocity'); ?> >velocity</option>
</select>
<?php
}

/**
 * Brand logo
 *
 * @since 1.8.0
 */

function ng_slicknav_brand_callback() {
$options = get_option( 'ng_slicknavmenu' );

if( !isset( $options['ng_slicknav_brand'] ) ) $options['ng_slicknav_brand'] = '';
echo '<input type="text" id="ng_slicknav_brand" name="ng_slicknavmenu[ng_slicknav_brand]" value="' . sanitize_text_field($options['ng_slicknav_brand']) . '" placeholder="" class="medium-text" />';
echo '<input id="upload_image_button" type="button" value="Upload Image" class="button-secondary" />';
}

/**
 * Text logo
 *
 * @since 1.8.0
 */

function ng_slicknav_brand_text_callback() {
$options = get_option( 'ng_slicknavmenu' );

if( !isset( $options['ng_slicknav_brand_text'] ) ) $options['ng_slicknav_brand_text'] = '';
echo '<input type="text" id="ng_slicknav_brand_text" name="ng_slicknavmenu[ng_slicknav_brand_text]" value="' . esc_attr($options['ng_slicknav_brand_text']) . '" placeholder="Text Logo" class="medium-text" />';
echo '<span class="description">' . __( 'Alternative to Image Logo') . '</span>';
}



/**
 * ALt text for logo
 *
 * @since 1.8.0
 */

function ng_slicknav_alt_callback() {
$options = get_option( 'ng_slicknavmenu' );

if( !isset( $options['ng_slicknav_alt'] ) ) $options['ng_slicknav_alt'] = '';
echo '<input type="text" id="ng_slicknav_alt" name="ng_slicknavmenu[ng_slicknav_alt]" value="' . sanitize_text_field($options['ng_slicknav_alt']) . '" placeholder="alt text" class="medium-text" />';
echo '<span class="description">' . __( 'alt text') . '</span>';
}


/**
 * Closed Symbol
 *
 * @since 1.8.0
 */

function ng_slicknav_closedsymbol_callback() {
$options = get_option( 'ng_slicknavmenu' );

if( !isset( $options['ng_slicknav_closedsymbol'] ) ) $options['ng_slicknav_closedsymbol'] = '';
echo '<input type="text" id="ng_slicknav_closedsymbol" name="ng_slicknavmenu[ng_slicknav_closedsymbol]" value="' . sanitize_text_field($options['ng_slicknav_closedsymbol']) . '" placeholder="&#9658;" class="medium-text" />';
}

/**
 * Opened Symbol
 *
 * @since 1.8.0
 */

function ng_slicknav_openedsymbol_callback() {
$options = get_option( 'ng_slicknavmenu' );

if( !isset( $options['ng_slicknav_openedsymbol'] ) ) $options['ng_slicknav_openedsymbol'] = '';
echo '<input type="text" id="ng_slicknav_openedsymbol" name="ng_slicknavmenu[ng_slicknav_openedsymbol]" value="' . sanitize_text_field($options['ng_slicknav_openedsymbol']) . '" placeholder="&#9660;" class="medium-text" />';
}



/*
 * Add in color picker functionality & media uploader
 *
 */
function backend_admin_page($hook) {
    if ( 'settings_page_wpslicknav-menu' != $hook ) { //set your plugin page
        return;
    }
    // Media Uploader
    wp_enqueue_media();
    wp_register_script( 'slicknav-brand-logo', plugins_url( '/js/slicknav-brand-uploader.js',  __FILE__ ), array( 'jquery' ), '1.7.4', false );
    wp_enqueue_script( 'slicknav-brand-logo' );

    // RGBA color picker for the color options
    wp_enqueue_style( 'wp-color-picker' );
    wp_enqueue_script( 'wp-color-picker-alpha', plugins_url( '/js/wp-color-picker-alpha.min.js',  __FILE__ ), array( 'wp-color-picker' ), '2.1.2', true );
}
add_action( 'admin_enqueue_scripts', __NAMESPACE__ . '\\backend_admin_page');
