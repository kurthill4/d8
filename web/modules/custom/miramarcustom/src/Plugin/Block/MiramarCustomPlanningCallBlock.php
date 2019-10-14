<?php

namespace Drupal\miramarcustom\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Component\Utility\Unicode;

/**
 * Provides a 'Call to Action' block.
 *
 * @Block(
 *   id = "miramar_plancall",
 *   admin_label = @Translation("Planning Page Call to Action"),
 * )
 */
class MiramarCustomPlanningCallBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {

    $build['plancall']['content'] = [
      '#markup' => '
<div class="menu-content-call hide-xs">
	<div class="call-menu" style="margin:0 auto">
		<div class="callbar">
		<a href="/campus/planning/framework/review">
		<span><i class="fa fa-chevron-right" aria-hidden="true"></i></span>
		Program Review
		</a>
		</div>
		<div class="callbar">
		<a href="/campus/planning/framework/alignment">
		<span><i class="fa fa-chevron-right" aria-hidden="true"></i></span>
		Alignment Taskforce
		</a>
		</div>
		<div class="callbar">
		<a href="/campus/planning/framework3">
		<span><i class="fa fa-chevron-right" aria-hidden="true"></i></span>
		Integrated Planning
		</a>
		</div>
	</div>
</div>
<div class="hide-lg">
	<p class="bold"><a href="/campus/planning/framework/review">Program Review</a></p>
	<p class="bold"><a href="/campus/planning/framework/alignment">Alignment Taskforce</a></p>
	<p class="bold"><a href="/campus/planning/framework">Integrated Planning Main</a></p>
</div>'
    ];

    return $build;
  }
}
