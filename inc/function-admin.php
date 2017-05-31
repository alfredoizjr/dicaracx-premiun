<?php

/*

@package dicracx-premiun

====================================================
            ADMIN PAGES
===================================================
*/

function dicaracx_premiun_add_page(){

   //Generate Dicaracx Admin Pages

  add_menu_page( 'Dicaracx theme Premiun', 'dicaracx premiun','manage_options', 'dicaracx_premiun', 'dicaracx_premiun_create_page', get_template_directory_uri().'/img/dicaracx-icon.png',89);
  
  //Generate Dicaracx sub Pages setting
  
  add_submenu_page( 'dicaracx_premiun', 'Dicaracx theme Premiun', 'General','manage_options', 'dicaracx_premiun', 'dicaracx_premiun_create_page' );

  // Generate Dicaracx sub pages css

  add_submenu_page( 'dicaracx_premiun', 'Dicaracx Css Options', 'Custom CSS', 'manage_options', 'dicaracx_premiun_css', 'dicaracx_premiun_settings_page' );

// activate custom settings

add_action( 'admin_init', 'dicaracx_custom_settings' );


}

// sidebar setting and fields

add_action( 'admin_menu','dicaracx_premiun_add_page');


function dicaracx_custom_settings(){

 // group of the settings

  //first name	
  register_setting( 'dicaracx-settings-group','first_name');
  //last name
  register_setting( 'dicaracx-settings-group','last_name');
   //Twhiter Handler
  register_setting( 'dicaracx-settings-group','twiter_handler','dicaracx_sanitize_twiter_handler');
   //Twhiter facebook
  register_setting( 'dicaracx-settings-group','facebook_handler');
     //Twhiter youtube
  register_setting( 'dicaracx-settings-group','youtube_handler');
  // section we going to use
  add_settings_section( 'dicaracx-sidebar-options', 'Sidebar Option','dicaracx_sidebar_options', 'dicaracx_premiun' );
  // field we declarate and we going use in our section

  add_settings_field( 'sidebar-name','Full name', 'dicaracx_sidebar_name', 'dicaracx_premiun', 'dicaracx-sidebar-options');
  add_settings_field( 'sidebar-twitter','Twitter handler', 'dicaracx_sidebar_twiter', 'dicaracx_premiun', 'dicaracx-sidebar-options');
  add_settings_field( 'sidebar-facebbok','Facebook handler', 'dicaracx_sidebar_facebook', 'dicaracx_premiun', 'dicaracx-sidebar-options');
  add_settings_field( 'sidebar-youtube','Youtube handler', 'dicaracx_sidebar_youtube', 'dicaracx_premiun', 'dicaracx-sidebar-options');
}

// section of sidebar full name
function dicaracx_sidebar_options(){
  
  echo 'Customize Your sidebar information';
}

// field of sidebar
function dicaracx_sidebar_name(){
 //first name field	
  $firstname = esc_attr( get_option( 'first_name' ));
  echo '<input type="text" name="first_name" value="'.$firstname.'" placeholder="First Name">';

  //last name field
  $lastname = esc_attr( get_option( 'last_name' ));
  echo '<input type="text" name="last_name" value="'.$lastname.'" placeholder="last name">';
}

// twitter

function dicaracx_sidebar_twiter(){

//twiter field
  $twiter = esc_attr( get_option( 'twiter_handler' ));
  echo '<input type="text" name="twiter_handler" value="'.$twiter.'" placeholder="Twitter handler">';

}


function dicaracx_sidebar_facebook(){

//twiter facebook
  $facebook = esc_attr( get_option( 'facebook_handler' ));
  echo '<input type="text" name="facebook_handler" value="'.$facebook.'" placeholder="facebook handler">';

}

function dicaracx_sidebar_youtube(){

//twiter youtube
  $youtube = esc_attr( get_option( 'youtube_handler' ));
  echo '<input type="text" name="youtube_handler" value="'.$youtube.'" placeholder="youtube handler">';

}


//Sanitazite setting

function dicaracx_sanitize_twiter_handler($input){
 // we try clear special character it s in the field	
   $output = sanitize_text_field( $input );
 // we going scape to the @ character
   $output = str_replace('@', '', $output);
   return $output;
} 


function dicaracx_premiun_create_page(){
//generate of our admin pages

   // calling template hedeling this settings
	require_once get_template_directory().'/inc/templates/dicaracx-admin.php';
}

function dicaracx_premiun_settings_page(){
 //generate of settings pages

 echo '<h2>Custom CSS</h2>';	
}