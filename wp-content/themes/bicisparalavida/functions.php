<?php

/**
 * Composer autoload
 */
if (file_exists(__DIR__ . '/vendor/autoload.php')) {
  require_once __DIR__ . '/vendor/autoload.php';
}

/**
 * Load environment variables
 */
if (class_exists('Dotenv\Dotenv')) {
  $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
  if (file_exists(__DIR__ . '/.env')) {
    $dotenv->load();
  }
}

/**
 * Sage includes
 *
 * The $sage_includes array determines the code library included in your theme.
 * Add or remove files to the array as needed. Supports child theme overrides.
 *
 * Please note that missing files will produce a fatal error.
 *
 * @link https://github.com/roots/sage/pull/1042
 */
$sage_includes = [
  'lib/assets.php',    // Scripts and stylesheets
  'lib/extras.php',    // Custom functions
  'lib/setup.php',     // Theme setup
  'lib/titles.php',    // Page titles
  'lib/wrapper.php',   // Theme wrapper class
  'lib/customizer.php', // Theme customizer
  'lib/donateForm.php' // Donate form functions
];

foreach ($sage_includes as $file) {
  if (!$filepath = locate_template($file)) {
    trigger_error(sprintf(__('Error locating %s for inclusion', 'ungrynerd'), $file), E_USER_ERROR);
  }

  require_once $filepath;
}
unset($file, $filepath);

add_action(
  'template_redirect',
  function () {
    if (is_singular('post')) {
      global $wp_query;
      $wp_query->posts = [];
      $wp_query->post = null;
      $wp_query->set_404();
      status_header(404);
      nocache_headers();
    }
  }
);

if (function_exists('acf_add_options_page')) {
  acf_add_options_page(array(
    'page_title' => 'Bicis para la vida',
    'menu_title' => 'Bicis para la vida',
  ));
}
