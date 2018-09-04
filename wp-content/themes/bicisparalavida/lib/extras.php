<?php

namespace Roots\Sage\Extras;

use Roots\Sage\Setup;

/**
 * Add <body> classes
 */
function body_class($classes) {
  // Add page slug if it doesn't exist
  if (is_single() || is_page() && !is_front_page()) {
    if (!in_array(basename(get_permalink()), $classes)) {
      $classes[] = basename(get_permalink());
    }
  }

  // Add class if sidebar is active
  if (Setup\display_sidebar()) {
    $classes[] = 'sidebar-primary';
  }

  return $classes;
}
add_filter('body_class', __NAMESPACE__ . '\\body_class');

/**
 * Clean up the_excerpt()
 */
function excerpt_more() {
  return ' &hellip; <a href="' . get_permalink() . '">' . __('Continued', 'ungrynerd') . '</a>';
}
add_filter('excerpt_more', __NAMESPACE__ . '\\excerpt_more');


/**
 * inline svg helper
 */
function inline_svg($svg) {
  $output = '';
  if (empty($svg)) {
    return;
  }
  $svg_file_path = \get_template_directory() . "/dist/images/" . $svg . ".svg";
  return file_get_contents($svg_file_path);
}


/**
 * Remove WP version
 */
function wpsecure_remove_version() {
  return '';
}
add_filter('the_generator', __NAMESPACE__ . '\\wpsecure_remove_version');


/**
 * remove type attribute in script and style tags
 */
function hde_remove_type_attr($tag, $handle) {
  return preg_replace("/type=['\"]text\/(javascript|css)['\"]/", '', $tag);
}
add_filter('style_loader_tag', __NAMESPACE__ . '\hde_remove_type_attr', 10, 2);
add_filter('script_loader_tag', __NAMESPACE__ . '\hde_remove_type_attr', 10, 2);



/**
 * remove emojis support
 */
function disable_wp_emojicons() {
  remove_action('admin_print_styles', 'print_emoji_styles');
  remove_action('wp_head', 'print_emoji_detection_script', 7);
  remove_action('admin_print_scripts', 'print_emoji_detection_script');
  remove_action('wp_print_styles', 'print_emoji_styles');
  remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
  remove_filter('the_content_feed', 'wp_staticize_emoji');
  remove_filter('comment_text_rss', 'wp_staticize_emoji');

  add_filter('tiny_mce_plugins', __NAMESPACE__ . '\disable_emojicons_tinymce');
  add_filter('emoji_svg_url', '__return_false');
}
add_action('init', __NAMESPACE__ . '\disable_wp_emojicons');

function disable_emojicons_tinymce( $plugins ) {
  if ( is_array( $plugins ) ) {
    return array_diff( $plugins, array( 'wpemoji' ) );
  } else {
    return array();
  }
}


function ungrynerd_pagination($query=null) {
  global $wp_query;
  $query = $query ? $query : $wp_query;
  $big = 999999999;
  $args = array();
  $paginate = paginate_links( array(
    'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big, false))),
    'type' => 'array',
    'total' => $query->max_num_pages,
    'format' => '?paged=%#%',
    'mid_size' => 2,
    'end_size' => 1,
    'current' => max( 1, get_query_var('paged') ),
    'prev_text' => '&larr;',
    'next_text' => '&rarr;',
    'add_args' => array($args)
    )
  );

  if ($query->max_num_pages > 1) : ?>
    <ul class="pagination">
    <?php foreach ( $paginate as $page ) {
      echo '<li>' . $page . '</li>';
    } ?>
  </ul>
  <?php endif;
}
