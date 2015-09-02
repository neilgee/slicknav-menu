<?php     namespace ng_slicknav;

/*
Plugin Name: SlickNav Mobile Menu
Plugin URI: http://wpbeaches.com/using-slick-responsive-menus-genesis-child-theme/
Description: Using SlickNav Responsive Mobile Menus in WordPress
Author: Neil Gee
Version: 1.6.0
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


/*
 * Assign global variables
 *
 */


$plugin_url = WP_PLUGIN_URL . '/slicknav-mobile-menu';
$options = array();


/**
 * Register our text domain.
 */
function load_textdomain() {
  load_plugin_textdomain( 'slicknav-mobile-menu', false, basename( dirname( __FILE__ ) ) . '/languages' );
}
add_action( 'plugins_loaded', __NAMESPACE__ . '\\load_textdomain' );


//Script-tac-ulous -> All the Scripts and Styles Registered and Enqueued
function scripts_styles() {

  wp_register_script ( 'slicknavjs' , plugins_url( '/js/jquery.slicknav.min.js',  __FILE__ ), array( 'jquery' ), '1.0.4', false );
  wp_register_style ( 'slicknavcss' , plugins_url( '/css/slicknav.min.css',  __FILE__ ), '' , '1.0.4', 'all' );
  wp_register_script ( 'slicknav-init' , plugins_url( '/js/slick-init.js',  __FILE__ ), array( 'slicknavjs' ), '1.5.7', false );

  wp_enqueue_script( 'slicknavjs' );
  wp_enqueue_style( 'slicknavcss' );
  wp_enqueue_style( 'dashicons' );

$options = get_option( 'ng_slicknavmenu' );

 $data = array (

    'ng_slicknav' => array(
        'ng_slicknav_menu'              => esc_html( $options['ng_slicknav_menu'] ),
        'ng_slicknav_position'          => esc_html( $options['ng_slicknav_position'] ),
        'ng_slicknav_parent_links'      => (bool)$options['ng_slicknav_parent_links'], // this is a boolean true/false
        'ng_slicknav_child_links'       => (bool) $options['ng_slicknav_child_links'], // this is a boolean true/false
        'ng_slicknav_speed'             => (int)$options['ng_slicknav_speed'], // this is an integer
        'ng_slicknav_label'             => esc_html( $options['ng_slicknav_label'] ),
        'ng_slicknav_fixhead'           => (bool) $options['ng_slicknav_fixhead'], // this is a boolean true/false
        'ng_slicknav_brand'             => esc_html( $options['ng_slicknav_brand'] ),
        'ng_slicknav_search'            => (bool) $options['ng_slicknav_search'], // this is a boolean true/false
        'ng_slicksearch'                => home_url( '/' ),
        'ng_slicknav_closedsymbol'      => esc_html( $options['ng_slicknav_closedsymbol'] ),
        'ng_slicknav_openedsymbol'      => esc_html( $options['ng_slicknav_openedsymbol'] ),
        'ng_slicknav_alt'               => esc_html( $options['ng_slicknav_alt'] ),
        

    ),
);

  // Pass PHP variables to jQuery script
  wp_localize_script( 'slicknav-init', 'phpVars', $data );

  wp_enqueue_script( 'slicknav-init' );
}

add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\\scripts_styles' );

//Load Media Uploader Scripts
function media_uploader_scripts() {
    if ( isset( $_GET['page'] ) && $_GET['page'] == 'wpslicknav-menu' ) {
        wp_enqueue_media();
        wp_register_script( 'slicknav-brand-logo', plugins_url( '/js/slicknav-brand-uploader.js',  __FILE__ ), array( 'jquery' ), '1.4.3', false );
        wp_enqueue_script( 'slicknav-brand-logo' );
    }

}
add_action( 'admin_enqueue_scripts', __NAMESPACE__ . '\\media_uploader_scripts' );


//Set Responsive Nav to fire - change CSS ID of menu to suit
function responsive_menucss() {

      global $plugin_url;
      global $options;

      $options = get_option('ng_slicknavmenu');
        if ( $options !== '') {
        $ng_slicknav_menu                     = $options['ng_slicknav_menu'];
        $ng_slicknav_width                    = $options['ng_slicknav_width'];
        $ng_slicknav_background               = $options['ng_slicknav_background'];
        $ng_slicknav_button                   = $options['ng_slicknav_button'];
        $ng_slicknav_button_expand            = $options['ng_slicknav_button_expand'];
        $ng_slicknav_label_color              = $options['ng_slicknav_label_color'];
        $ng_slicknav_icon_color               = $options['ng_slicknav_icon_color'];
        $ng_slicknav_button_position          = $options['ng_slicknav_button_position'];
        $ng_slicknav_font                     = $options['ng_slicknav_font'];
        $ng_slicknav_label_size               = $options['ng_slicknav_label_size'];
        $ng_slicknav_submenu_position         = $options['ng_slicknav_submenu_position']; 
        $ng_slicknav_link_hover_color         = $options['ng_slicknav_link_hover_color'];
        $ng_slicknav_link_hover_color_submenu = $options['ng_slicknav_link_hover_color_submenu'];
        $ng_slicknav_search_color             = $options['ng_slicknav_search_color'];
        $ng_slicknav_link_color               = $options['ng_slicknav_link_color'];
        $ng_slicknav_font_case                = $options['ng_slicknav_font_case'];
        $ng_slicknav_label_shadow             = $options['ng_slicknav_label_shadow'];
        $ng_slicknav_icon_shadow              = $options['ng_slicknav_icon_shadow'];
        $ng_slicknav_label_weight             = $options['ng_slicknav_label_weight'];
        $ng_slicknav_fixhead                  = $options['ng_slicknav_fixhead'];


}?>

      <style>
            .slicknav_menu {
                display: none;
            }

            <?php 
            if( $ng_slicknav_fixhead == true) { ?>

            @media screen and (max-width: <?php echo $ng_slicknav_width; ?>px) {
            
              .slicknav_menu {
                position: fixed;
                width: 100%;
                left: 0;
                top: 0;
                z-index: 999;
              }

              html {
                padding-top: 45px;
              }

            }
              <?php } ?>
           
          @media screen and (max-width: <?php echo $ng_slicknav_width; ?>px) {

              <?php echo $ng_slicknav_menu; ?> {
                  display: none;
               }
               .slicknav_menu {
                  display: block;
                  background: <?php echo $ng_slicknav_background; ?>;
               }
               .slicknav_btn {
                  background-color:<?php echo $ng_slicknav_button; ?> ;
                  float: <?php echo $ng_slicknav_button_position; ?>;
               }
               a.slicknav_open {
                  background-color:<?php echo $ng_slicknav_button_expand; ?> ;
               }
               .slicknav_nav .slicknav_arrow {
                  float: <?php echo $ng_slicknav_submenu_position; ?>
               }
               .slicknav_menu .slicknav_menutxt {
                  color: <?php echo $ng_slicknav_label_color; ?>;
                  text-shadow: <?php echo $ng_slicknav_label_shadow; ?>;
                  font-size: <?php echo $ng_slicknav_label_size; ?>px;
                  font-weight: <?php echo $ng_slicknav_label_weight; ?>;
               }
               .slicknav_menu .slicknav_icon-bar {
                  background-color: <?php echo $ng_slicknav_icon_color; ?>;
                  box-shadow: <?php echo $ng_slicknav_icon_shadow; ?>;;
               }
               .slicknav_nav li a {
                  color: <?php echo $ng_slicknav_link_color; ?>;
                  text-transform: <?php echo $ng_slicknav_font_case; ?> ;
                  font-size: <?php echo $ng_slicknav_font; ?>px;
                  padding: 5px 10px;
               }
               .slicknav_nav a:hover {
                  background: <?php echo $ng_slicknav_link_hover_color; ?>;
               }
               .slicknav_nav .slicknav_row:hover{
                  background: <?php echo $ng_slicknav_link_hover_color_submenu; ?>;
               }
               .slicknav_nav input[type="submit"]{
                  background: <?php echo $ng_slicknav_search_color; ?>;
               }
           
              

             }
  

      

        </style>

<?php
}

add_action( 'wp_head', __NAMESPACE__ . '\\responsive_menucss' );



function slicknav_menu() {

    /*
     * Use the add options_page function
     * add_options_page( $page_title, $menu_title, $capability, $menu-slug, $function )
     */

     add_options_page(
        __( 'SlickNav Options Plugin','slicknav-mobile-menu' ), //$page_title
        __( 'SlickNav Menu', 'slicknav-mobile-menu' ), //$menu_title
        'manage_options', //$capability
        'wpslicknav-menu', //$menu-slug
        __NAMESPACE__ . '\\menu_options_page' //$function
      );
}
add_action( 'admin_menu', __NAMESPACE__ . '\\slicknav_menu' );



function menu_options_page() {

    if( !current_user_can( 'manage_options' ) ) {

      wp_die( "Hall and Oates 'Say No Go'" );
    }

    global $plugin_url;
    global $options;

    //Escape and Assign the values from the submitted form to variables
    if( isset( $_POST['ng_slicknav_form_submitted'] ) ) {

        $hidden_field = esc_html( $_POST['ng_slicknav_form_submitted'] );

        if( $hidden_field == 'Y' ) {

          $ng_slicknav_menu                     = esc_html( $_POST['ng_slicknav_menu'] );
          $ng_slicknav_width                    = esc_html( $_POST['ng_slicknav_width'] );
          $ng_slicknav_background               = esc_html( $_POST['ng_slicknav_background'] );
          $ng_slicknav_button                   = esc_html( $_POST['ng_slicknav_button'] );
          $ng_slicknav_button_expand            = esc_html( $_POST['ng_slicknav_button_expand'] );
          $ng_slicknav_label_color              = esc_html( $_POST['ng_slicknav_label_color'] );
          $ng_slicknav_icon_color               = esc_html( $_POST['ng_slicknav_icon_color'] );
          $ng_slicknav_button_position          = esc_html( $_POST['ng_slicknav_button_position'] );
          $ng_slicknav_font                     = esc_html( $_POST['ng_slicknav_font'] );
          $ng_slicknav_label_size               = esc_html( $_POST['ng_slicknav_label_size']);
          $ng_slicknav_submenu_position         = esc_html( $_POST['ng_slicknav_submenu_position'] );
          $ng_slicknav_position                 = esc_html( $_POST['ng_slicknav_position'] );
          $ng_slicknav_label                    = esc_html( $_POST['ng_slicknav_label'] );
          $ng_slicknav_parent_links             = esc_html( isset($_POST['ng_slicknav_parent_links']) );
          $ng_slicknav_child_links              = esc_html( isset($_POST['ng_slicknav_child_links']) );
          $ng_slicknav_fixhead                  = esc_html( isset($_POST['ng_slicknav_fixhead']) );
          $ng_slicknav_speed                    = esc_html( $_POST['ng_slicknav_speed'] );
          $ng_slicknav_link_color               = esc_html( $_POST['ng_slicknav_link_color'] );
          $ng_slicknav_link_hover_color         = esc_html( $_POST['ng_slicknav_link_hover_color'] );
          $ng_slicknav_link_hover_color_submenu = esc_html( $_POST['ng_slicknav_link_hover_color_submenu'] );
          $ng_slicknav_font_case                = esc_html( $_POST['ng_slicknav_font_case'] );
          $ng_slicknav_label_shadow             = esc_html( $_POST['ng_slicknav_label_shadow'] );
          $ng_slicknav_icon_shadow              = esc_html( $_POST['ng_slicknav_icon_shadow'] );
          $ng_slicknav_label_weight             = esc_html( $_POST['ng_slicknav_label_weight'] );
          $ng_slicknav_brand                    = esc_html( $_POST['ng_slicknav_brand'] );
          $ng_slicknav_search                   = esc_html( isset($_POST['ng_slicknav_search']) );
          $ng_slicknav_search_color             = esc_html( $_POST['ng_slicknav_search_color']);
          $ng_slicknav_openedsymbol             = esc_html( $_POST['ng_slicknav_openedsymbol'] );
          $ng_slicknav_closedsymbol             = esc_html( $_POST['ng_slicknav_closedsymbol'] );
          $ng_slicknav_alt                      = esc_html( $_POST['ng_slicknav_alt'] );

          


          //Assign the above variables as values to the options db as a serialized array
          $options['ng_slicknav_menu']                     = $ng_slicknav_menu;
          $options['ng_slicknav_width']                    = $ng_slicknav_width;
          $options['ng_slicknav_background']               = $ng_slicknav_background;
          $options['ng_slicknav_button']                   = $ng_slicknav_button;
          $options['ng_slicknav_button_expand']            = $ng_slicknav_button_expand;
          $options['ng_slicknav_label_color']              = $ng_slicknav_label_color;
          $options['ng_slicknav_icon_color']               = $ng_slicknav_icon_color;
          $options['ng_slicknav_button_position']          = $ng_slicknav_button_position;
          $options['ng_slicknav_font']                     = $ng_slicknav_font;
          $options['ng_slicknav_label_size']               = $ng_slicknav_label_size;
          $options['ng_slicknav_submenu_position']         = $ng_slicknav_submenu_position;
          $options['ng_slicknav_position']                 = $ng_slicknav_position;
          $options['ng_slicknav_label']                    = $ng_slicknav_label;
          $options['ng_slicknav_parent_links']             = $ng_slicknav_parent_links;
          $options['ng_slicknav_child_links']              = $ng_slicknav_child_links;
          $options['ng_slicknav_fixhead']                  = $ng_slicknav_fixhead;
          $options['ng_slicknav_speed']                    = $ng_slicknav_speed;
          $options['ng_slicknav_link_color']               = $ng_slicknav_link_color;
          $options['ng_slicknav_link_hover_color']         = $ng_slicknav_link_hover_color;
          $options['ng_slicknav_link_hover_color_submenu'] = $ng_slicknav_link_hover_color_submenu;
          $options['ng_slicknav_font_case']                = $ng_slicknav_font_case;
          $options['ng_slicknav_label_shadow']             = $ng_slicknav_label_shadow;
          $options['ng_slicknav_icon_shadow']              = $ng_slicknav_icon_shadow;
          $options['ng_slicknav_label_weight']             = $ng_slicknav_label_weight;
          $options['ng_slicknav_brand']                    = $ng_slicknav_brand;
          $options['ng_slicknav_search']                   = $ng_slicknav_search;
          $options['ng_slicknav_search_color']             = $ng_slicknav_search_color;
          $options['ng_slicknav_closedsymbol']             = $ng_slicknav_closedsymbol;
          $options['ng_slicknav_openedsymbol']             = $ng_slicknav_openedsymbol;
          $options['ng_slicknav_alt']                      = $ng_slicknav_alt;


          $options['last_updated']     = time();

          update_option( 'ng_slicknavmenu', $options );

        }

    }

    $options = get_option('ng_slicknavmenu');

    if ( $options !== '') {
        //Retrieve the values for ng_slicknavmenu, assign variables for use
        $ng_slicknav_menu                     = $options['ng_slicknav_menu'];
        $ng_slicknav_width                    = $options['ng_slicknav_width'];
        $ng_slicknav_background               = $options['ng_slicknav_background'];
        $ng_slicknav_button                   = $options['ng_slicknav_button'];
        $ng_slicknav_button_expand            = $options['ng_slicknav_button_expand'];
        $ng_slicknav_label_color              = $options['ng_slicknav_label_color'];
        $ng_slicknav_icon_color               = $options['ng_slicknav_icon_color'];
        $ng_slicknav_button_position          = $options['ng_slicknav_button_position'];
        $ng_slicknav_font                     = $options['ng_slicknav_font'];
        $ng_slicknav_label_size               = $options['ng_slicknav_label_size'];
        $ng_slicknav_submenu_position         = $options['ng_slicknav_submenu_position'];
        $ng_slicknav_position                 = $options['ng_slicknav_position'];
        $ng_slicknav_label                    = $options['ng_slicknav_label'];
        $ng_slicknav_parent_links             = $options['ng_slicknav_parent_links'];
        $ng_slicknav_child_links              = $options['ng_slicknav_child_links'];
        $ng_slicknav_fixhead                  = $options['ng_slicknav_fixhead'];
        $ng_slicknav_speed                    = $options['ng_slicknav_speed'];
        $ng_slicknav_link_color               = $options['ng_slicknav_link_color'];
        $ng_slicknav_link_hover_color         = $options['ng_slicknav_link_hover_color'];
        $ng_slicknav_link_hover_color_submenu = $options['ng_slicknav_link_hover_color_submenu'];
        $ng_slicknav_font_case                = $options['ng_slicknav_font_case'];
        $ng_slicknav_label_shadow             = $options['ng_slicknav_label_shadow'];
        $ng_slicknav_icon_shadow              = $options['ng_slicknav_icon_shadow'];
        $ng_slicknav_label_weight             = $options['ng_slicknav_label_weight'];
        $ng_slicknav_brand                    = $options['ng_slicknav_brand'];
        $ng_slicknav_search                   = $options['ng_slicknav_search'];
        $ng_slicknav_search_color             = $options['ng_slicknav_search_color'];
        $ng_slicknav_openedsymbol             = $options['ng_slicknav_openedsymbol'];
        $ng_slicknav_closedsymbol             = $options['ng_slicknav_closedsymbol'];
        $ng_slicknav_alt                      = $options['ng_slicknav_alt'];
        

    }

   require( 'inc/options-page-wrapper.php' );
}


//Add in color picker functionality
function color_picker( $hook_suffix ) {
    // first check that $hook_suffix is appropriate for your admin page
    wp_enqueue_style( 'wp-color-picker' );
    wp_enqueue_script( 'slicknav-color-picker', plugins_url( '/js/color-picker.js', __FILE__ ), array( 'wp-color-picker' ), false, true );
}
add_action( 'admin_enqueue_scripts', __NAMESPACE__ . '\\color_picker' );


