<?php

namespace Drupal\miramarcustom\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Component\Utility\Unicode;

/**
 * Provides a 'Test' block.
 *
 * @Block(
 *   id = "miramar_test",
 *   admin_label = @Translation("Miramar Test"),
 * )
 */
class MiramarCustomTestBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
   //$theIP = $_SERVER['REMOTE_ADDR'];


  public function build() {
    $imagepath = base_path() . drupal_get_path('theme', 'miramar');
 	if (!empty($_SERVER["HTTP_CLIENT_IP"]))
	{
	 //check for ip from share internet
	 $theIP = $_SERVER["HTTP_CLIENT_IP"];
	}
	elseif (!empty($_SERVER["HTTP_X_FORWARDED_FOR"]))
	{
	 // Check for the Proxy User
	 $theIP = $_SERVER["HTTP_X_FORWARDED_FOR"];
	}
	else
	{
	 $theIP = $_SERVER["REMOTE_ADDR"];
	}

    $build['test']['content'] = [
      '#markup' => '<h1>' . $theIP . '</h1>'
    ];

    return $build;
  }
}
