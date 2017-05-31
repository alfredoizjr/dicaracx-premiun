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
  register_setting( 'dicaracx-settings-group','first_name');
  // section we going to use
  add_settings_section( 'dicaracx-sidebar-options', 'Sidebar Option','dicaracx_sidebar_options', 'dicaracx_premiun' );
  // field we declarate and we going use in our section
  add_settings_field( 'sidebar-name','First Name', 'dicaracx_sidebar_name', 'dicaracx_premiun', 'dicaracx-sidebar-options');
}

// section of sidebar
function dicaracx_sidebar_options(){
  
  echo 'Customize Your sidebar information';
}

// field of sidebar
function dicaracx_sidebar_name(){
  $firstname = esc_attr( get_option( 'first_name' ));
  echo '<input type="text" name="first_name" value="'.$firstname.'" placeholder="First Name">';
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