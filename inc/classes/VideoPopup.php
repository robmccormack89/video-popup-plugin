<?php
namespace Rmcc;
use Timber\Timber;

class VideoPopup extends Timber {

  public function __construct() {
    parent::__construct();
    
    // timber stuff. the usual stuff
    add_filter('timber/twig', array($this, 'add_to_twig'));
    add_filter('timber/context', array($this, 'add_to_context'));
    
    // shortcode for the markup
    add_shortcode('video_popup_secton', 'video_popup_secton'); // see inc/functions.php
    
    // enqueue plugin assets
    add_action('wp_enqueue_scripts', array($this, 'video_popup_assets'));
  }
  
  
  public function video_popup_assets() {
    wp_enqueue_style(
      'video-popup',
      VIDEO_POPUP_URL . 'public/css/video-popup.css'
    );
  }
  
  public function add_to_twig($twig) { 
    if(!class_exists('Twig_Extension_StringLoader')){
      $twig->addExtension(new \Twig_Extension_StringLoader());
    }
    return $twig;
  }

  public function add_to_context($context) {
    return $context;    
  }

}