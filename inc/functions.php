<?php

function video_popup_secton() {
  $context = Timber::context();
  $out = Timber::compile('video-section.twig', $context);
  return $out;
}