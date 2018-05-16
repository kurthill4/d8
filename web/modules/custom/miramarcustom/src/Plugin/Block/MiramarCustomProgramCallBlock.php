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

    $imagepath = base_path() . drupal_get_path('theme', 'miramar');

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
	<a href="https://studentweb.sdccd.edu/docs/catalogs/2017-2018/miramar.pdf#view=Fit&amp;pagemode=bookmarks">
	<span><i class="fa fa-chevron-right" aria-hidden="true"></i></span>
	Course Catalog
	</a>
	</div>
	<div class="spacer" style="height:0.1em">&nbsp;</div>
	<div class="call">
	<a href="#pgmSequence">
	<span><i class="fa fa-chevron-right" aria-hidden="true"></i></span>
	Classes to Take
	</a>
	</div>'
    ];

    return $build;
  }
}
