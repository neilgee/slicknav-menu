<?php

/*
 * Adding CSS inline
 */
function responsive_menucss() {

      $options = get_option('ng_slicknavmenu');

      $options_default = array(
          'ng_slicknav_menu'                        => '',
          'ng_slicknav_width'                       => '',
          'ng_slicknav_button'                      => '',
          'ng_slicknav_background'                  => '',
          'ng_slicknav_button_expand'               => '',
          'ng_slicknav_label_color'                 => '',
          'ng_slicknav_icon_color'                  => '',
          'ng_slicknav_button_position'             => '',
          'ng_slicknav_font'                        => '',
          'ng_slicknav_label_size'                  => '',
          'ng_slicknav_submenu_position'            => '',
          'ng_slicknav_link_color'                  => '',
          'ng_slicknav_link_hover_background_color' => '',
          'ng_slicknav_link_hover_color'            => '',
          'ng_slicknav_search_color'                => '',
          'ng_slicknav_font_case'                   => '',
          'ng_slicknav_label_shadow'                => '',
          'ng_slicknav_icon_shadow'                 => '',
          'ng_slicknav_label_weight'                => '',
          'ng_slicknav_fixhead'                     => '',
          'ng_slicknav_header'                      => '',
          'ng_slicknav_search_icon_color'           => '',
          'ng_slicknav_brand_text_color'           => '',



      );

      $options = wp_parse_args( $options, $options_default );


       if ( $options !== false ) {
       $ng_slicknav_menu                        = $options['ng_slicknav_menu'];
       $ng_slicknav_width                       = $options['ng_slicknav_width'];
       $ng_slicknav_background                  = $options['ng_slicknav_background'];
       $ng_slicknav_button                      = $options['ng_slicknav_button'];
       $ng_slicknav_button_expand               = $options['ng_slicknav_button_expand'];
       $ng_slicknav_label_color                 = $options['ng_slicknav_label_color'];
       $ng_slicknav_icon_color                  = $options['ng_slicknav_icon_color'];
       $ng_slicknav_button_position             = $options['ng_slicknav_button_position'];
       $ng_slicknav_font                        = $options['ng_slicknav_font'];
       $ng_slicknav_label_size                  = $options['ng_slicknav_label_size'];
       $ng_slicknav_submenu_position            = $options['ng_slicknav_submenu_position'];
       $ng_slicknav_link_hover_color            = $options['ng_slicknav_link_hover_color'];
       $ng_slicknav_link_hover_background_color = $options['ng_slicknav_link_hover_background_color'];
       $ng_slicknav_search_icon_color           = $options['ng_slicknav_search_icon_color'];
       $ng_slicknav_search_color                = $options['ng_slicknav_search_color'];
       $ng_slicknav_link_color                  = $options['ng_slicknav_link_color'];
       $ng_slicknav_font_case                   = $options['ng_slicknav_font_case'];
       $ng_slicknav_label_shadow                = $options['ng_slicknav_label_shadow'];
       $ng_slicknav_icon_shadow                 = $options['ng_slicknav_icon_shadow'];
       $ng_slicknav_label_weight                = $options['ng_slicknav_label_weight'];
       $ng_slicknav_fixhead                     = $options['ng_slicknav_fixhead'];
       $ng_slicknav_header                      = $options['ng_slicknav_header'];
       $ng_slicknav_brand_text_color            = $options['ng_slicknav_brand_text_color'];




        // All the user input CSS settings as set in SLicknav settings
        $slicknav_custom_css = "
                .slicknav_menu {
                    display: none;
                }
            @media screen and (max-width: {$ng_slicknav_width}px) {
                {$ng_slicknav_menu} {
                  display: none;
               }
               .slicknav_menu {
                  display: block;
                  background: {$ng_slicknav_background};
               }
               .slicknav_btn {
                  background-color:{$ng_slicknav_button};
                  float:{$ng_slicknav_button_position};
               }
               a.slicknav_open {
                  background-color:{$ng_slicknav_button_expand};
               }
               .slicknav_nav .slicknav_arrow {
                  float:{$ng_slicknav_submenu_position};
               }
               .slicknav_menu .slicknav_menutxt {
                  color: {$ng_slicknav_label_color};
                  text-shadow: none;
                  font-size: {$ng_slicknav_label_size}px;
                  font-weight: {$ng_slicknav_label_weight};
               }
               .slicknav_menu .slicknav_icon-bar {
                  background-color: {$ng_slicknav_icon_color};
                  box-shadow: none;
               }
               .slicknav_nav li a {
                  color: {$ng_slicknav_link_color};
                  text-transform: {$ng_slicknav_font_case};
                  font-size: {$ng_slicknav_font}px;
                  padding: 5px 10px;
               }
               .slicknav_nav a:hover,
               .slicknav_nav .slicknav_row:hover {
                  background: {$ng_slicknav_link_hover_background_color};
               }
               .slicknav_nav .menu-item a:hover,
               .slicknav_nav a span:hover {
                 color: {$ng_slicknav_link_hover_color};

               }

               .slicknav_nav input[type='submit']{
                  background: {$ng_slicknav_search_color};
                  color: {$ng_slicknav_search_icon_color};
               }
               .slicknav-logo-text a{
                 color: {$ng_slicknav_brand_text_color};
               }



           }";


               // Set CSS shadow for label
              if( $ng_slicknav_label_shadow == 1 )
             $slicknav_custom_css .= "
               .slicknav_menu .slicknav_menutxt {
                  text-shadow: 0 1px 3px #000;
               }";

               // Set CSS shadow for icon
              if( $ng_slicknav_icon_shadow == 1 )
             $slicknav_custom_css .= "
               .slicknav_menu .slicknav_icon-bar {
                  box-shadow: 0 1px 0 rgba(0,0,0,0.25);
               }";


              // If Menu button is set to left, move brand logo to right, set in Slicknav settings
             if( $ng_slicknav_button_position == "left"  )
            $slicknav_custom_css .= "
                  .slicknav_brand {
                     float: right;
                  }
                  .slicknav-logo-text {
                    float: right;
                  }";

            // Fix menu to position in header if set in Slicknav settings
              if( $ng_slicknav_fixhead == true )
            $slicknav_custom_css .= "
             @media screen and (max-width: {$ng_slicknav_width}px) {
                 .slicknav_menu {
                    position: fixed;
                    width: 100%;
                    left: 0;
                    top: 0;
                    z-index: 999999;
                }
                 html {
                    padding-top: 45px;
                 }
             }";

            //Hide header if option is clicked in SlickNav settings
            if( $ng_slicknav_header == true )
         $slicknav_custom_css .= "
            @media screen and (max-width:{$ng_slicknav_width}px) {
                 .site-header {
                    display: none;
                 }
            }";

  }
  // Add the above custom CSS via wp_add_inline_style
  wp_add_inline_style( 'slicknavcss', $slicknav_custom_css );
}


add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\\responsive_menucss' );
