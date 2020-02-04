<?php

namespace Drupal\miramarcustom\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Component\Utility\Unicode;

/**
 * Provides a 'Call to Action' block.
 *
 * @Block(
 *   id = "miramar_lrccheckcall",
 *   admin_label = @Translation("LRC Checkout Page Call to Action"),
 * )
 */
class MiramarCustomLibraryCheckoutCallBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    $pc = \Drupal::config('miramarcustom.settings')->get('prog_call');
    $build['#cache']['max-age'] = 0;
    $build['lrccocall']['content'] = [
      '#markup' => '
	<div class="call">
	<a href="https://caccl-sdccd.primo.exlibrisgroup.com/discovery/account?vid=01CACCL_SDCCD:SDMIRAMAR&section=overview" target="_blank">
	<span><i class="fa fa-chevron-right" aria-hidden="true"></i></span>
	Renew Online
	</a>
	</div>
	<div class="spacer" style="height:0.1em">&nbsp;</div>' . $pc
    ];

    return $build;
  }
  public function getCacheMaxAge() {
	return 0;
  }
}
