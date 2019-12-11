<?php

namespace Drupal\miramarcustom\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Component\Utility\Unicode;

/**
 * Provides a 'Call to Action' block.
 *
 * @Block(
 *   id = "miramar_avcall",
 *   admin_label = @Translation("AV Page Call to Action"),
 * )
 */
class MiramarCustomAVCallBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    $pc = \Drupal::config('miramarcustom.settings')->get('prog_call');
    $build['#cache']['max-age'] = 0;
    $build['avcall']['content'] = [
      '#markup' => '
	<div class="callsmall hide-xs">
	<a href="http://libcat.sdccd.edu.libraryaccess.sdmiramar.edu:8080/hipres/sdccd/avsearch_miramar.html" target="_blank">
	<span><i class="fa fa-chevron-right" aria-hidden="true"></i></span>
	Video Collections
	</a>
	</div>
	<div class="call hide-lg">
	<a href="http://libcat.sdccd.edu.libraryaccess.sdmiramar.edu:8080/hipres/sdccd/avsearch_miramar.html" target="_blank">
	<span><i class="fa fa-chevron-right" aria-hidden="true"></i></span>
	Video Collections
	</a>
	</div>' . $pc
    ];

    return $build;
  }
  public function getCacheMaxAge() {
	return 0;
  }
}
