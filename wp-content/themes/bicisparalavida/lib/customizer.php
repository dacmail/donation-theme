<?php

namespace Roots\Sage\Customizer;

use Roots\Sage\Assets;

/**
 * Add postMessage support
 */
function customize_register($wp_customize) {
  $wp_customize->get_setting('blogname')->transport = 'postMessage';

  $wp_customize->add_section('ungrynerd_legal', array(
    'title' => __('Enlaces legales', 'ungrynerd')
  ));

  $wp_customize->add_setting('ungrynerd_legal');
  $wp_customize->add_control(new \WP_Customize_Control($wp_customize, 'ungrynerd_legal', array(
    'type' => 'text',
    'label' => __('Aviso legal', 'ungrynerd'),
    'section' => 'ungrynerd_legal',
    'settings' => 'ungrynerd_legal'
  )));

  $wp_customize->add_setting('ungrynerd_policy');
  $wp_customize->add_control(new \WP_Customize_Control($wp_customize, 'ungrynerd_policy', array(
    'type' => 'text',
    'label' => __('Politica de privacidad', 'ungrynerd'),
    'section' => 'ungrynerd_legal',
    'settings' => 'ungrynerd_policy'
  )));

  $wp_customize->add_setting('ungrynerd_contact');
  $wp_customize->add_control(new \WP_Customize_Control($wp_customize, 'ungrynerd_contact', array(
    'type' => 'text',
    'label' => __('Contacto', 'ungrynerd'),
    'section' => 'ungrynerd_legal',
    'settings' => 'ungrynerd_contact'
  )));

  $wp_customize->add_setting('ungrynerd_form_policy');
  $wp_customize->add_control(new \WP_Customize_Control($wp_customize, 'ungrynerd_form_policy', array(
    'type' => 'text',
    'label' => __('Politica de privacidad', 'ungrynerd'),
    'section' => 'ungrynerd_legal',
    'settings' => 'ungrynerd_form_policy'
  )));
}
add_action('customize_register', __NAMESPACE__ . '\\customize_register');

/**
 * Customizer JS
 */
function customize_preview_js() {
  wp_enqueue_script('sage/customizer', Assets\asset_path('scripts/customizer.js'), ['customize-preview'], null, true);
}
add_action('customize_preview_init', __NAMESPACE__ . '\\customize_preview_js');
