<?php

namespace Drupal\miramarcustom\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Component\Utility\Unicode;

/**
 * Provides a 'Call to Action' block.
 *
 * @Block(
 *   id = "miramar_fincall",
 *   admin_label = @Translation("Financial Aid Page Call to Action"),
 * )
 */
class MiramarCustomFinancialCallBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {

    $build['fincall']['content'] = [
      '#markup' => '
	<div class="call">
	<a href="http://www.fafsa.gov" target="_blank">
	<span><i class="fa fa-chevron-right" aria-hidden="true"></i></span>
	Apply for Aid
	</a>
	</div>'
    ];

    return $build;
  }
}
