<?php

function video_popup_secton() {
  
  // if timber::locations is empty (another plugin hasn't already added to it), make it an array
  if(!Timber::$locations) Timber::$locations = array();

  // add a new views path to the locations array
  array_push(
    Timber::$locations, 
    VIDEO_POPUP_PATH . 'views'
  );
  
  $context = Timber::context();
  
  Timber::render('video-section.twig', $context);
}