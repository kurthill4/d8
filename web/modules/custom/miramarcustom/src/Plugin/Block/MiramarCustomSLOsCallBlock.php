<?php

namespace Drupal\miramarcustom\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Component\Utility\Unicode;

/**
 * Provides a 'Call to Action' block.
 *
 * @Block(
 *   id = "miramar_call",
 *   admin_label = @Translation("SLOs Page Call to Action"),
 * )
 */
class MiramarCustomSLOsCallBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {

    $build['slocall']['content'] = [
      '#markup' => '
<div class="menu-content-call hide-xs">
    <div class="call-menu">
				<div class="callbar">
				<a href="/campus/planning/outcomes/evidence">
				<span><i class="fa fa-chevron-right" aria-hidden="true"></i></span>
				Evidence of Assessment
				</a>
				</div>
				<div class="callbar">
				<a href="/campus/planning/outcomes/slo">
				<span><i class="fa fa-chevron-right" aria-hidden="true"></i></span>
				SLO/SUO Development
				</a>
				</div>
			</div>
	</div>'
    ];

    return $build;
  }
}
