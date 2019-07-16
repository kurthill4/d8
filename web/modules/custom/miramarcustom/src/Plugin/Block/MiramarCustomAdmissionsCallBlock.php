<?php

namespace Drupal\miramarcustom\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Component\Utility\Unicode;

/**
 * Provides a 'Call to Action' block.
 *
 * @Block(
 *   id = "miramar_admcall",
 *   admin_label = @Translation("Admissions Page Call to Action"),
 * )
 */
class MiramarCustomAdmissionsCallBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {

    $build['admcall']['content'] = [
      '#markup' => '
	<div class="call">
	<a href="http://my.sdccd.edu" target="_blank">
	<span><i class="fa fa-chevron-right" aria-hidden="true"></i></span>
	Transcripts
	</a>
	</div>
	<div class="spacer" style="height:0.1em">&nbsp;</div>
	<div class="call">
	<a href="https://www.sdccd.edu/students/fees.aspx">
	<span><i class="fa fa-chevron-right" aria-hidden="true"></i></span>
	Tuition &amp; Fees
	</a>
	</div>'
    ];

    return $build;
  }
}
