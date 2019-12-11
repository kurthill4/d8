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
	<a href="http://libcat.sdccd.edu.libraryaccess.sdmiramar.edu:8080/ipac20/ipac.jsp?session=N449Q72976852.288&profile=mm&menu=account&ts=1449772976900" target="_blank">
	<span><i class="fa fa-chevron-right" aria-hidden="true"></i></span>
	Renew Online
	</a>
	</div>
	<div class="spacer" style="height:0.1em">&nbsp;</div>
	<div class="call">
	<a href="http://libcat.sdccd.edu/hipres/sdccd/newbooks/current.html">
	<span><i class="fa fa-chevron-right" aria-hidden="true"></i></span>
	New Titles
	</a>
	</div>' . $pc
    ];

    return $build;
  }
  public function getCacheMaxAge() {
	return 0;
  }
}
