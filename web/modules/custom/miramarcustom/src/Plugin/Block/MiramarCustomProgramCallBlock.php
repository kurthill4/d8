<?php

namespace Drupal\miramarcustom\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Component\Utility\Unicode;

/**
 * Provides a 'Call to Action' block.
 *
 * @Block(
 *   id = "miramar_pgmcall",
 *   admin_label = @Translation("Program Page Call to Action"),
 * )
 */
class MiramarCustomProgramCallBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    $pc = \Drupal::config('miramarcustom.settings')->get('prog_call');
    $build['#cache']['max-age'] = 0;
    $build['pgmcall']['content'] = [
      '#markup' => '
	<div class="call">
	<a href="http://schedule.sdccd.edu" target="_blank">
	<span><i class="fa fa-chevron-right" aria-hidden="true"></i></span>
	Class Schedule
	</a>
	</div>
	<div class="spacer" style="height:0.1em">&nbsp;</div>
	<div class="call">
	<a href="https://www.sdccd.edu/docs/StudentServices/catalogs/2018-2019/Miramar%202018-2019.pdf">
	<span><i class="fa fa-chevron-right" aria-hidden="true"></i></span>
	Course Catalog
	</a>
	</div>' . $pc
    ];

    return $build;
  }
}
