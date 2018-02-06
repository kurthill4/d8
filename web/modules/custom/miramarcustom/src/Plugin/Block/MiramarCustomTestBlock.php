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
  public function build() {
    $intra = '';
    $imagepath = base_path() . drupal_get_path('theme', 'miramar');
    //$theIP = $_SERVER['REMOTE_ADDR'];

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

    if($theIP == '10.72.20.102' or substr($theIP,0,5) == '10.70' or !(\Drupal::currentUser()->isAnonymous()))
	$intra = '<li><a href="http://webissues.ics.sdmiramar.net/issue/report?url=' . $_SERVER['REQUEST_URI'] . '">Report Issues With This Page</a></li>';

    $build['test']['content'] = [
      '#markup' => '
        <h1>' . $theIP . '</h1>'
    ];

    return $build;
  }
}
