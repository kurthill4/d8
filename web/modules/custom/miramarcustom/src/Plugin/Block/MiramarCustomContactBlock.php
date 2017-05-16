<?php

namespace Drupal\miramarcustom\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Component\Utility\Unicode;

/**
 * Provides a 'Contact' block.
 *
 * @Block(
 *   id = "miramar_contact",
 *   admin_label = @Translation("Miramar Contact"),
 * )
 */
class MiramarCustomContactBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {

    $imagepath = base_path() . drupal_get_path('theme', 'miramar');

    $build['contact']['content'] = [
      '#markup' => '
        <div class="row">
          <div class="col-sm-3">

            <!-- Address -->
            <div class="address">
              San Diego Miramar College<br />
              10440 Black Mountain Road<br />
              San Diego, CA 92126-2999<br />
              (619) 388-7800
            </div>

            <!-- Colleges -->
            <ul class="colleges hide-xs">
              <li><a href="#">San Diego Community College District</a></li>
              <li><a href="#">San Diego City College</a></li>
              <li><a href="#">San Diego Mesa College</a></li>
              <li><a href="#">San Diego Miramar College</a></li>
              <li><a href="#">San Diego Continuing Education</a></li>
            </ul>
          </div>
          <div class="col-sm-9 hide-xs">
            <div class="row">
              <div class="col-sm-4">
                <h4><img src="' . $imagepath . '/images/icon-building.png" alt=""></h4>
                <strong>Campus</strong>
                <ul class="campus">
                  <li><a href="#">Parking</a></li>
                  <li><a href="#">Safety</a></li>
                  <li><a href="#">Jobs</a></li>
                  <li><a href="#">President\'s Message</a></li>
                </ul>
              </div>
              <div class="col-sm-4">
                <h4><img src="' . $imagepath . '/images/icon-users.png" alt=""></h4>
                <strong>Miramar</strong>
                <ul class="miramar">
                  <li><a href="#">Resources for Industry Partners</a></li>
                  <li><a href="#">Resources for Faculty/Staff</a></li>
                  <li><a href="#">Clery Act Information</a></li>
                  <li><a href="#">The Miarmar College Foundation</a></li>
                  <li><a href="#">District Info</a></li>
                  <li><a href="#">Directory</a></li>
                </ul>
              </div>
              <div class="col-sm-4">
                <h4><img src="' . $imagepath . '/images/icon-note.png" alt=""></h4>
                <strong>Accreditation Information</strong>
                <ul class="acc-info">
                  <li><a href="#">Student Success Scorecard</a></li>
                  <li><a href="#">District Policies</a></li>
                  <li><a href="#">Smoking/Substance Policy</a></li>
                  <li><a href="#">Privacy Statement</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>'
    ];

    return $build;
  }
}