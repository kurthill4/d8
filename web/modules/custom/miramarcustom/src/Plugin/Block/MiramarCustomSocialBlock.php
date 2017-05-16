<?php

namespace Drupal\miramarcustom\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Component\Utility\Unicode;

/**
 * Provides a 'Social' block in the footer.
 *
 * @Block(
 *   id = "miramar_social",
 *   admin_label = @Translation("Miramar Social Media Links"),
 * )
 */
class MiramarCustomSocialBlock extends BlockBase {


  /**
   * {@inheritdoc}
   */
  public function build() {

    $build['social']['content'] = [
      '#markup' => '
        <div class="row">
          <div class="col-sm-4">
            <!-- Social Media -->
            <div class="social-media hide-xs">
              <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
              <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
              <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
              <a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
              <a href="#"><i class="fa fa-youtube" aria-hidden="true"></i></a>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="copyright">
              &copy; 2017 San Diego Miramar College | Disclaimer
            </div>
          </div>
        </div>'
    ];

    return $build;
  }
}
