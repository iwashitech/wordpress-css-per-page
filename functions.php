<?php

function my_enqueue_styles() {
  global $template;
  $stylePath = get_stylesheet_directory() . "/css/style.css";
  wp_enqueue_style( 'my-style', get_theme_file_uri() . "/css/style.css", [], wp_date('Y-m-d-H-i-s', filemtime($stylePath)));
  
  if(!empty(get_per_page_css($template))) { 
  $perPageCSSPath = get_stylesheet_directory() . "/css/" . get_per_page_css($template) . ".css";
  wp_enqueue_style( 'my-per-page-css', get_theme_file_uri() . "/css/" . get_per_page_css($template) . ".css", [], wp_date('Y-m-d-H-i-s', filemtime($perPageCSSPath)));
  }
}
add_action( 'wp_enqueue_scripts', 'my_enqueue_styles' );

function get_per_page_css($template) {
  if (empty($template)) {
    return "";
  }

  $templateName = basename($template, ".php");
  if($templateName == "single") {
    return $templateName;
  } else if($templateName == "index") {
    return $templateName;
  }

  return "";
}