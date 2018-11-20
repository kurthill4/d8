<?php

namespace Drupal\miramarcustom\Controller;
use Drupal\Core\Controller\ControllerBase;

class HomeController extends ControllerBase 
{
  /**
   * nocache
   */
  public function response() {
    $response = new Response();
    $response->setMaxAge(0);
    return $response;
  }
}
