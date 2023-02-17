<?php
namespace Rmcc;

use Timber\Timber;

class VideoPopup extends Timber
{

  public function __construct()
  {
    parent::__construct();
    add_filter('timber/twig', array($this, 'add_to_twig'));
    add_filter('timber/context', array($this, 'add_to_context'));

    add_action('plugins_loaded', array($this, 'plugin_timber_locations'));
    add_action('plugins_loaded', array($this, 'plugin_text_domain_init'));
    add_action('wp_enqueue_scripts', array($this, 'plugin_enqueue_assets'));

    add_shortcode('video_popup_secton', 'video_popup_secton');
  }

  public function plugin_timber_locations()
  {
    // if timber::locations is empty (another plugin hasn't already added to it), make it an array
    if (!Timber::$locations)
      Timber::$locations = array();
    // add a new views path to the locations array
    array_push(
      Timber::$locations,
      VIDEO_POPUP_PATH . 'views'
    );
  }
  
  public function plugin_text_domain_init()
  {
    load_plugin_textdomain('video-popup', false, VIDEO_POPUP_BASE . '/languages');
  }

  public function plugin_enqueue_assets()
  {
    wp_enqueue_style(
      'video-popup',
      VIDEO_POPUP_URL . 'public/css/video-popup.css'
    );
    wp_enqueue_style(
      'uikit',
      'https://cdn.jsdelivr.net/npm/uikit@3.15.24/dist/css/uikit.min.css'
    );
    wp_enqueue_script(
      'uikit',
      'https://cdn.jsdelivr.net/npm/uikit@3.15.24/dist/js/uikit.min.js',
      array(),
      '3.15.24',
      false
    );
    wp_enqueue_script(
      'uikit-icons',
      'https://cdn.jsdelivr.net/npm/uikit@3.15.24/dist/js/uikit-icons.min.js',
      array(),
      '3.15.24',
      false
    );
  }

  public function add_to_twig($twig)
  {
    if (!class_exists('Twig_Extension_StringLoader')) {
      $twig->addExtension(new \Twig_Extension_StringLoader());
    }
    return $twig;
  }

  public function add_to_context($context)
  {
    return $context;
  }

}