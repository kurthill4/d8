<?php

namespace Drupal\miramarcustom\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Component\Utility\Unicode;

/**
 * Provides a 'Call to Action' block.
 *
 * @Block(
 *   id = "miramar_call",
 *   admin_label = @Translation("Homepage Call to Action"),
 * )
 */
class MiramarCustomCallBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {

    $build['call']['content'] = [
      '#markup' => '
	<div class="container-full">
		<div class="row">
		<div class="homecall">
			<div class="col-lg-4 col-lg-offset-2 col-md-5 col-md-offset-1 col-sm-6">
				<div class="get-started">
				<a href="http://classschedule.sdccd.edu" target="_blank">
				<span><i class="fa fa-chevron-right" aria-hidden="true"></i></span>
				Class Schedule
				</a>
				</div>
			</div>
				<div class="col-lg-4 col-md-5 col-sm-6">
					<div class="get-started">
					<a href="http://classschedule.sdccd.edu">
					<span><i class="fa fa-chevron-right" aria-hidden="true"></i></span>
					Course Catalog
					</a>
				</div>
			</div>
			</div>
	</div>'
    ];

    return $build;
  }
}
