<?php

namespace Roots\Sage\Extras;

use Roots\Sage\Setup;
use Ungrynerd\DonateForm;

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
  return ' &hellip;';
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

function disable_emojicons_tinymce( $plugins) {
  if ( is_array( $plugins)) {
    return array_diff( $plugins, array( 'wpemoji'));
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
    'current' => max( 1, get_query_var('paged')),
    'prev_text' => '&larr;',
    'next_text' => '&rarr;',
    'add_args' => array($args)
  )
);

  if ($query->max_num_pages > 1) : ?>
    <ul class="pagination">
    <?php foreach ( $paginate as $page) {
      echo '<li>' . $page . '</li>';
    } ?>
  </ul>
  <?php endif;
}



// Register Custom Post Type
function ungrynerd_donation_posttype() {
  $labels = array(
    'name'                  => _x('Donaciones', 'Post Type General Name', 'ungrynerd'),
    'singular_name'         => _x('Donación', 'Post Type Singular Name', 'ungrynerd'),
    'menu_name'             => __('Donaciones', 'ungrynerd'),
    'name_admin_bar'        => __('Post Type', 'ungrynerd'),
    'archives'              => __('Item Archives', 'ungrynerd'),
    'attributes'            => __('Item Attributes', 'ungrynerd'),
    'parent_item_colon'     => __('Parent Item:', 'ungrynerd'),
    'all_items'             => __('All Items', 'ungrynerd'),
    'add_new_item'          => __('Add New Item', 'ungrynerd'),
    'add_new'               => __('Add New', 'ungrynerd'),
    'new_item'              => __('New Item', 'ungrynerd'),
    'edit_item'             => __('Edit Item', 'ungrynerd'),
    'update_item'           => __('Update Item', 'ungrynerd'),
    'view_item'             => __('View Item', 'ungrynerd'),
    'view_items'            => __('View Items', 'ungrynerd'),
    'search_items'          => __('Search Item', 'ungrynerd'),
    'not_found'             => __('Not found', 'ungrynerd'),
    'not_found_in_trash'    => __('Not found in Trash', 'ungrynerd'),
    'featured_image'        => __('Featured Image', 'ungrynerd'),
    'set_featured_image'    => __('Set featured image', 'ungrynerd'),
    'remove_featured_image' => __('Remove featured image', 'ungrynerd'),
    'use_featured_image'    => __('Use as featured image', 'ungrynerd'),
    'insert_into_item'      => __('Insert into item', 'ungrynerd'),
    'uploaded_to_this_item' => __('Uploaded to this item', 'ungrynerd'),
    'items_list'            => __('Items list', 'ungrynerd'),
    'items_list_navigation' => __('Items list navigation', 'ungrynerd'),
    'filter_items_list'     => __('Filter items list', 'ungrynerd'),
);
  $args = array(
    'label'                 => __('Donación', 'ungrynerd'),
    'description'           => __('Donaciones o trabajos realizados', 'ungrynerd'),
    'labels'                => $labels,
    'supports'              => array('title'),
    'hierarchical'          => false,
    'public'                => false,
    'show_ui'               => true,
    'show_in_menu'          => true,
    'menu_icon'             => 'dashicons-screenoptions',
    'menu_position'         => 5,
    'show_in_admin_bar'     => true,
    'show_in_nav_menus'     => true,
    'can_export'            => true,
    'has_archive'           => true,
    'exclude_from_search'   => true,
    'publicly_queryable'    => true,
    'rewrite'               => array( 'slug' => 'donacion'),
    'capability_type'       => 'page',
);
  register_post_type('un_donation', $args);

}
add_action('init',  __NAMESPACE__ . '\\ungrynerd_donation_posttype', 0);


function ungrynerd_remove_seo() {
  remove_meta_box('wpseo_meta', 'un_donation', 'normal');
}
add_action('add_meta_boxes', __NAMESPACE__ . '\\ungrynerd_remove_seo', 100);

function ungrynerd_new_var($vars) {
  $vars[] = "thanks";
  return $vars;
}
add_filter('query_vars', __NAMESPACE__ . '\\ungrynerd_new_var');


add_action('wp_ajax_new_donation', __NAMESPACE__ . '\\process_new_donation');
add_action('wp_ajax_nopriv_new_donation', __NAMESPACE__ . '\\process_new_donation');

function process_new_donation() {
  if ( empty($_POST) || !wp_verify_nonce($_POST['new_donation_nonce'], 'new_donation')) {
      echo 'You targeted the right function, but sorry, your nonce did not verify.';
      die();
  } else {
      $form = new DonateForm\DonateForm($_POST['donor_name'], $_POST['donor_email'], $_POST['donor_cp'], $_POST['accept_skoda']);
      $form->new_donation();
      $form->send_new_donation_email();
      wp_redirect(add_query_arg('thanks', 'yes', get_permalink($form->donation)));
  }
  die();
}

function ungrynerd_new_donation_status($value, $post_id, $field) {
  $donation = new DonateForm\DonateForm(get_field('donor_name', $post_id), get_field('donor_email', $post_id), get_field('donor_cp', $post_id));
  $donation->donation = $post_id;
  $donation->donationCode = get_the_title($post_id);
  $donation->send_new_status_email($value);
  return $value;
}
add_filter('acf/update_value/name=status', __NAMESPACE__ . '\\ungrynerd_new_donation_status', 10, 3);


/*
 * Add columns to un_donation post list
 */
function ungrynerd_add_acf_columns($columns) {
  return array(
    'title' => __('Codigo de seguimiento', 'ungrynerd'),
    'cp' => __('Codigo Postal', 'ungrynerd'),
    'status'   => __('Estado', 'ungrynerd'),
    'skoda'   => __('¿Cesión Skoda?', 'ungrynerd'),
    'date' => __('Fecha', 'ungrynerd')
  );
 }
 add_filter('manage_un_donation_posts_columns', __NAMESPACE__ . '\\ungrynerd_add_acf_columns', 20);

  /*
 * Add columns to un_donation post list
 */
 function ungryenrd_un_donation_custom_column($column, $post_id) {
  switch ($column) {
    case 'cp':
      echo get_post_meta($post_id, 'donor_cp', true);
      break;
    case 'status':
      $status_names = array('Pendiente de recepción', 'Recibida pendiente donar', 'Recibida despiece', 'Donada');
      $status = get_post_meta($post_id, 'status', true) ? get_post_meta($post_id, 'status', true) :  0;
      echo $status_names[$status];
      break;
    case 'skoda':
      $skoda = get_post_meta($post_id, 'skoda', true) ? 'Sí' : 'No';
      echo $skoda;
      break;
  }
 }
 add_action('manage_un_donation_posts_custom_column', __NAMESPACE__ . '\\ungryenrd_un_donation_custom_column', 10, 2);


add_filter('embed_oembed_html', function ($html, $url, $args) {
  $provider = '';
  if (preg_match("#https?://youtu\.be/.*#i", $url) || preg_match("#https?://(www\.)?youtube\.com/watch.*#i", $url)) {
    $provider = 'youtube';
  } elseif (preg_match("/vimeo.com\/([^&]+)/i", $url)) {
    $provider = 'vimeo';
  } elseif (preg_match("/twitch\/([^&]+)/i", $url)) {
    $provider = 'twitch';
  }
  if (!empty($provider)) {
    $html = "<div class='oembed " . $provider . "' >" . $html . "</div>";
  }
  return $html;
}, 10, 3);
