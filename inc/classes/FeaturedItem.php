<?php
namespace Rmcc;
use Timber\Timber;

class FeaturedItem extends Timber {

  public function __construct() {
    parent::__construct();
    
    // timber stuff. the usual stuff
    add_filter('timber/twig', array($this, 'add_to_twig'));
    add_filter('timber/context', array($this, 'add_to_context'));
    
    // shortcode for the markup
    add_shortcode('featured_content_item', 'featured_content_item'); // see inc/functions.php
    
    // enqueue plugin assets
    // add_action('wp_enqueue_scripts', array($this, 'featured_page_blocks_assets'));
  }
  
  public function featured_page_blocks_assets() {
    wp_enqueue_style(
      'featured-item',
      FEATURED_PAGE_BLOCKS_URL . 'public/css/featured-item.css'
    );
  }
  
  public function add_to_twig($twig) { 
    $twig->addExtension(new \Twig_Extension_StringLoader());
    return $twig;
  }

  public function add_to_context($context) {
    return $context;    
  }

}