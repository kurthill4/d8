<?php

namespace Drupal\miramarcustom\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Component\Utility\Unicode;

/**
 * Provides a 'Description' block.
 *
 * @Block(
 *   id = "miramar_description",
 *   admin_label = @Translation(" Miramar Footer Description"),
 * )
 */
class MiramarCustomDescriptionBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {

    $build['description']['content'] = [
      '#markup' => '
        <div class="row hide-lg">
          <div class="col-sm-12">
            <!-- Social Media -->
            <div class="social-media hide-lg">
              <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
              <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
              <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
              <a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
              <a href="#"><i class="fa fa-youtube" aria-hidden="true"></i></a>
            </div>
            <div class="address">
              San Diego Miramar College<br />
              10440 Black Mountain Road<br />
              San Diego, CA 92126-2999<br />
              (619) 388-7800
            </div>

          </div>
        </div>'
    ];

    return $build;
  }
}
