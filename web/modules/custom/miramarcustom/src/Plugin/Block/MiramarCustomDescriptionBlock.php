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
        <div class="row">
          <div class="col-sm-4">
            <!-- Social Media -->
            <div class="social-media hide-lg">
              <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
              <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
              <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
              <a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
              <a href="#"><i class="fa fa-youtube" aria-hidden="true"></i></a>
            </div>
          </div>
        </div>'
    ];

    return $build;
  }
}
