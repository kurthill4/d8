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
<div class="menu-content-call">
	<div class="call-menu hide-xs" style="margin:0 auto">
		<div class="callbar">
			<a href="/campus/planning/framework/review">
			<span class="hide-xs"><i class="fa fa-chevron-right" aria-hidden="true"></i></span>
			Program Review
			</a>
		</div>
		<div class="callbar">
			<a href="/campus/planning/framework/alignment">
			<span class="hide-xs"><i class="fa fa-chevron-right" aria-hidden="true"></i></span>
			Alignment Taskforce
			</a>
		</div>
		<div class="callbar">
			<a href="/campus/planning/framework">
			<span class="hide-xs"><i class="fa fa-chevron-right" aria-hidden="true"></i></span>
			Integrated Planning
			</a>
		</div>
	</div>
</div>
<div class="planning-mobile hide-lg">
			<div class="call">
				<a href="/campus/planning/framework/review"><span><i class="fa fa-road" aria-hidden="true"></i>&nbsp;</span>Program Review</a>
			</div>
			<br style="height:0.5em" />
			<div class="call">
				<a href="/campus/planning/framework/alignment"><span><i class="fa fa-road" aria-hidden="true"></i>&nbsp;</span>Alignment Taskforce</a>
			</div>
			<br style="height:0.5em" />
			<div class="call">
				<a href="/campus/planning/framework"><span><i class="fa fa-road" aria-hidden="true"></i>&nbsp;</span>Integrated Planning</a>
			</div>
</div>'
    ];

    return $build;
  }
}
